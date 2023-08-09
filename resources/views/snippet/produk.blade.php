<!-- product section -->

<div class="product-section mt-150 mb-150" id="produk">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>Produk</h3>
                    <p>Kami menyedikan jasa top-up pulsa dan game</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($kategori as $cat)
                <div class="col-lg-6 col-md-4 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="#{!! str_replace(' ', '-', $cat->nama) !!}" data-toggle="modal" data-target="#{!! str_replace(' ', '-', $cat->nama) !!}"><img src="{{ asset('img/products/product-img-1.jpg') }}" alt=""></a>
                        </div>
                        <h3>{{ $cat->nama }}</h3>
                        <p>{{ $cat->deskripsi }}</p>
                        <br>

                        <a href="#{!! str_replace(' ', '-', $cat->nama) !!}" data-toggle="modal" data-target="#{!! str_replace(' ', '-', $cat->nama) !!}" class="cart-btn"><i class="fas fa-shopping-cart"></i>Beli</a>
                    </div>
                </div>


                <div class="modal fade bd-example-modal-lg" id="{!! str_replace(' ', '-', $cat->nama) !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $cat->nama }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">

                            @forelse ($cat->produk->chunk(3) as $p)
                            <div class="row">

                                @foreach ($p as $produk)

                                <div class="col-lg-4 col-md-4 text-center">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="{{ route('detail', $produk->id) }}"><img src="{{ asset('img/products/product-img-1.jpg') }}"></a>
                                        </div>
                                        <h5>{{ $produk->nama }}</h5>
                                        {{-- <p>{{ $cat->deskripsi }}</p> --}}

                                        <p>{{ $produk->deskripsi }}</p>
                                        <a href="{{ route('detail', $produk->id) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i>Beli</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @empty

                            <div class="col-lg-12 col-md-4 text-center">
                                <h3 style="margin: 100px" class="text-muted">Coming Soon</h3>
                            </div>
                            @endforelse
                        </div>

                    </div>
                    </div>
                </div>



            @endforeach

        </div>
    </div>
</div>
<!-- end product section -->

