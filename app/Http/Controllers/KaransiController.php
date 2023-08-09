<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderList;
use App\Models\Produk;
use App\Models\PulsaModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class KaransiController extends Controller
{
    public function index()
    {

        $pulsa = Produk::all();
        $cat = Category::all();
        return view('index', ['pulsa'=>$pulsa, 'kategori' => $cat]);
    }
    public function produk($nama)
    {
        $produk = Category::where('nama',$nama)->first();


        return view('pulsa', ['produks'=> $produk]);
    }


    public function detail($id, Request $request)
    {
        $pulsa = Produk::findOrFail($id);


        return view('detail', ['pulsa'=>$pulsa]);
    }



    public function order(Request $request)
    {
        $namalengkap =  $request['namalengkap'];
        $email =  $request['email'];
        $tujuan =  $request['tujuan'];
        $order = new OrderList;
        $order->nama_depan = $request['namaD'];
        $order->nama_belakang = $request['namaB'];
        $order->email = $request['email'];
        $order->tujuan = $request['tujuan'];
        $order->harga = $request['harga'];
        $order->status = $request['status'];
        $order->tr_id = $request['tr_id'];
        $request->validate([
            'namaD' => 'required',
            'namaB' => 'required',
            'email'=> 'required',
            'tujuan' =>  'required',
        ]);
        $order->save();
        // return redirect()->route('detail')->with('success', 'sedang diproses oleh admin');
        return response()->json(['success'=>'berhasil']);
    }


    public function payment($id,Request $request)
    {
        $pulsa = Produk::findOrFail($id);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'Mid-server-ZrJFZ5WgTRkuIQjwd0wsuuAi';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $request->validate([
            'namaD' => 'required',
            'namaB' => 'required',
            'email'=> 'required',
            'tujuan' =>  'required',
        ]);
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => (int)$pulsa->harga,
            ),
            'customer_details' => array(
                'first_name' => $request->get('namaD'),
                'last_name' => $request->get('namaB'),
                'email' => $request->get('email'),
                'phone' => $request->get('tujuan'),
            ),
            'item_details' => array([
                "id"=> $pulsa->id,
                "price"=> $pulsa->harga,
                "tujuan"=>$request->get('tujuan'),
                "quantity"=> 1,
                "name"=> $pulsa->nama
            ]),

        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // return view('payment', ['snapToken'=>$snapToken, 'request' => $request]);
        return response()->json([
            'snapToken'=>$snapToken,
            'first_name'=>$request->get('namaD'),
            'last_name'=>$request->get('namaB'),
            'email'=>$request->get('email'),
            'harga'=>(int)$pulsa->harga,
            'tujuan' => $request->get('tujuan'),
        ]);
    }
}
