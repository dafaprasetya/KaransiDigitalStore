@extends('core.core')
@section('title')
Karansi
@endsection

@section('content')
    @foreach ($produks->produk as $p)
        <h1><a href="{{ route('detail', $p->id) }}">{{ $p->nama }}</a></h1>

    @endforeach


@endsection


