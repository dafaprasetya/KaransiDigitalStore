@extends('core.core')

@section('title')
    Karansi Digital
@endsection

@section('content')
    @foreach ($kategori as $cat)
        <h1><a href="{{ route('pulsa',$cat->nama) }}">{{ $cat->nama }}</a></h1> <br>
    @endforeach
@endsection

