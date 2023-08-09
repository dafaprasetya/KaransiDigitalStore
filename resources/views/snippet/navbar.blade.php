<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('img/karansi/karansilogonobg.png') }}" height="50" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">

                        @if (Route::is('detail'))
                        <ul>

                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>
                                <div class="header-icons">

                                </div>
                            </li>
                        </ul>
                        @else

                        <ul>
                            <li><a href="#produk">Produk</a></li>

                            <li><a href="#">Contact Admin</a>
                                <ul class="sub-menu">
                                    <li><a target="_blank" href="https://wa.me/085936689343">Dims</a></li>

                                </ul>
                            </li>
                            <li><a href="#produk">Shop</a>
                                <ul class="sub-menu">
                                    @foreach ($kategori as $cat)
                                    <li><a href="#{!! str_replace(' ', '-', $cat->nama) !!}" data-toggle="modal" data-target="#{!! str_replace(' ', '-', $cat->nama) !!}" >{{ $cat->nama }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <div class="header-icons">
                                    {{-- <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a> --}}
                                </div>
                            </li>
                        </ul>
                        @endif
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->
<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Search For:</h3>
                        <input type="text" placeholder="Keywords">
                        <button type="submit">Search <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->
