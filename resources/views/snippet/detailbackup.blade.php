
<!-- end check out section -->
<h1></h1>
<h5></h5>
<p>{{ $pulsa->deskripsi }}</p>
{{-- <form action="{{ route('beli') }}" method="post"> --}}
<form id='bayar' data-href="{{ route('bayar', $pulsa->id) }}">
    @csrf
    <label for="namaD">Nama Depan :</label>
    <input type="text" name="namaD" id="namaD" placeholder="Nama Depan">
    <br>
    <br>
    <label for="namaB">Nama Belakang</label>
    <input type="text" name="namaB" id="namaB" placeholder="Nama Belakang">
    <br>
    <br>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" placeholder="Masukan Email">
    <br>
    <br>
    <label for="tujuan">Nomor HP</label>
    <input type="text" name="tujuan" id="tujuan" placeholder="Nomor HP">
    <br>
    <br>
    <h1 id='success'></h1>
    <input type="submit" id="lanjutkan" value="Lanjutkan">
</form>
<div id="kirim" data-href="{{ route('beli') }}" ></div>
