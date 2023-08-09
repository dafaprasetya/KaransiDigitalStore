@extends('core.core')
@section('title')
Karansi | {{ $pulsa->nama }}
@endsection

@section('content')
@include('snippet.navbar')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Karansi Checkout</p>
                    <h1>{{ $pulsa->nama }}</h1>
                    <p>{{ $pulsa->harga }}</p>
                    <a href="#checkout" class="boxed-btn">Checkout</a>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<!-- check out section -->
<section id="checkout"></section>
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Informasi Pembeli
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <form id='bayar' data-href="{{ route('bayar', $pulsa->id) }}">
                                            @csrf
                                            <p><input type="text" name="namaD" id="namaD" placeholder="Nama Depan" required></p>
                                            <p><input type="text" name="namaB" id="namaB" placeholder="Nama Belakang" required></p>
                                            <p><input type="email" name="email" id="email" placeholder="Masukan Email" required></p>
                                            <hr>
                                            <p><input type="number" name="tujuan"  id="tujuan" placeholder="Nomor Target" required></p>
                                            <input type="submit" id="lanjutkan" value="Lanjutkan" style="color: white">
                                            <br>
                                            <br>
                                            <small class="text-muted" id="sulit" style="margin-left: 10px; display: none" >
                                                <a href="#detailtr" data-toggle="modal" data-target="#detailtr" >Lihat detail transaksi</a> . Mengalami kesulitan?, hubungi <a target="_blank" href="https://wa.me/085936689343?text=Hallo%20Kak,%20saya%20mengalami%20kesulitan%20dalam%20bertransaksi%20di%20web%20karansi.my.id">admin</a>
                                            </small>
                                        </form>
                                        <div id="kirim" data-href="{{ route('beli') }}" ></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="detailtr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="col-lg-12" style="margin-bottom: 25px">
                <div class="container text-center" id="qrcodee">
                    <h3 id="onpend">QR Code</h3>

                    <img src="{{ asset('img/karansi/karansilogo.jpeg') }}" height="250" alt="qrcode" id="kris" srcset="">
                </div>
            </div>
            <div class="col-lg-12" style="margin-bottom: 25px">
                <div class="container text-center" id="berhasill">
                    <h4 id="bankva"></h4>
                </div>
            </div>
            <div class="col-lg-12" style="margin-bottom: 25px">
                <div class="container text-center" id="berhasill">
                    <h4>ID:</h4>
                    <h4 id="trid"></h4>
                    <p>Screenshoot agar tidak hilang</p>
                </div>
            </div>

        </div>

    </div>
    </div>
</div>



@include('snippet.footer')
@endsection
