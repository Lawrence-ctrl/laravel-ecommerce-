@extends('userview.layouts.usermaster')
@section('title','Products')
@section('content')
<div class="ht__bradcaump__area bg-image--6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Shop Grid</h2>
                    <nav class="bradcaump-content">
                      <a class="breadcrumb_item" href="index.html">Home</a>
                      <span class="brd-separetor">/</span>
                      @foreach ($category as $cat)
                      <span class="breadcrumb_item active">
                          @if($cat->id == request()->category) {{ $cat->category_name }} 
                          @endif
                     </span>
                      @endforeach
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Shop Page -->
<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                <div class="shop__sidebar">
                    <aside class="wedget__categories poroduct--cat">
                        <h3 class="wedget__title">Product Categories</h3>
                        <ul>
                            @foreach($category as $cat)
                            <li class="{{ request()->category == $cat->id ? "active": "" }}"><a href="{{ route('categories.index',['category' => $cat->id]) }}">{{ $cat->category_name }}<span>({{ $cat->products->count() }})</span></a></li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="wedget__categories pro--range">
                        <h3 class="wedget__title">Filter by price</h3>
                        <div class="content-shopby">
                            <div class="price_filter s-filter clear">
                                <form action="#" method="GET">
                                    <div id="slider-range"></div>
                                    <div class="slider__range--output">
                                        <div class="price__output--wrap">
                                            <div class="price--output">
                                                <span>Price :</span><input type="text" id="amount" readonly="">
                                            </div>
                                            <div class="price--filter">
                                                <a href="#">Filter</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </aside>
                    <aside class="wedget__categories poroduct--tag">
                        <h3 class="wedget__title">Product Tags</h3>
                        <ul>
                            <li><a href="#">Biography</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Cookbooks</a></li>
                            <li><a href="#">Health & Fitness</a></li>
                            <li><a href="#">History</a></li>
                            <li><a href="#">Mystery</a></li>
                            <li><a href="#">Inspiration</a></li>
                            <li><a href="#">Religion</a></li>
                            <li><a href="#">Fiction</a></li>
                            <li><a href="#">Fantasy</a></li>
                            <li><a href="#">Music</a></li>
                            <li><a href="#">Toys</a></li>
                            <li><a href="#">Hoodies</a></li>
                        </ul>
                    </aside>
                    <aside class="wedget__categories sidebar--banner">
                        <img src="{{asset('../userdesign/images/others/banner_left.jpg')}}" alt="banner images">
                        <div class="text">
                            <h2>new products</h2>
                            <h6>save up to <br> <strong>40%</strong>off</h6>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9 col-12 order-1 order-lg-2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
                            <div class="shop__list nav justify-content-center" role="tablist">
                                <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
                                <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
                            </div>
                            <p>Showing 1–12 of 40 results</p>
                            <div class="orderby__wrapper">
                                <span>Sort By</span>
                                <form>
                                    @csrf
                                <select class="shot__byselect" id="change">
                                    <option value="1">Default sorting</option>
                                    <option value="2">Hign to Low</option>
                                    <option value="3">Low to High</option>
                                </select>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab__container">
                    <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                        <div class="row">
                            <!-- Start Single Product -->
                     @foreach($bycat as $by)
                            <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="product__thumb">
                                    <a class="first__img" href="{{ route('details',$by->id) }}"><img src="../userdesign/images/product/{{ $by->product_images }}" alt="product image"></a>
                                    <a class="second__img animation1" href="{{ route('details',$by->id) }}"><img src="../userdesign/images/product/{{ $by->product_images }}" alt="product image"></a>
                                    <div class="hot__box">
                                        <span class="hot-label">BEST SALLER</span>
                                    </div>
                                </div>
                                <div class="product__content content--center">
                                    <h4><a href="single-product.html">{{ $by->product_name }}</a></h4>
                                    <ul class="prize d-flex">
                                        <li>{{ $by->product_price }}ကျပ်</li>
                                        <li class="old_prize">{{ $by->product_previous_price }}ကျပ်</li>
                                    </ul>
                                    <div class="action">
                                        <div class="actions_inner">
                                            <ul class="add_to_links">
                                                <li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
                                                <li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
                                                <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                                <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__hover--content">
                                        <ul class="rating d-flex">
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                       
                     <div class="row">
                         <div class="col-12 d-flex justify-content-center">
                            {{ $bycat->links() }}
                         </div>
                     </div>
                    </div>
                    <div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
                        <div class="list__view__wrapper">
                            <!-- Start Single Product -->
                            <div class="list__view">
                                <div class="thumb">
                                    <a class="first__img" href="single-product.html"><img src="{{asset('../userdesign/images/product/1.jpg')}}" alt="product images"></a>
                                    <a class="second__img animation1" href="single-product.html"><img src="{{asset('../userdesign/images/product/2.jpg')}}" alt="product images"></a>
                                </div>
                                <div class="content">
                                    <h2><a href="single-product.html">Ali Smith</a></h2>
                                    <ul class="rating d-flex">
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li class="on"><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                    <ul class="prize__box">
                                        <li>$111.00</li>
                                        <li class="old__prize">$220.00</li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                    <ul class="cart__action d-flex">
                                        <li class="cart"><a href="cart.html">Add to cart</a></li>
                                        <li class="wishlist"><a href="cart.html"></a></li>
                                        <li class="compare"><a href="cart.html"></a></li>
                                    </ul>

                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                    
                            <!-- End Single Product -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->
<!-- Footer Area -->
<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
    <div class="footer-static-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__widget footer__menu">
                        <div class="ft__logo">
                            <a href="index.html">
                                <img src="{{asset('../userdesign/images/logo/3.png') }}" alt="logo">
                            </a>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered duskam alteration variations of passages</p>
                        </div>
                        <div class="footer__content">
                            <ul class="social__net social__net--2 d-flex justify-content-center">
                                <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                <li><a href="#"><i class="bi bi-google"></i></a></li>
                                <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                                <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                            </ul>
                            <ul class="mainmenu d-flex justify-content-center">
                                <li><a href="index.html">Trending</a></li>
                                <li><a href="index.html">Best Seller</a></li>
                                <li><a href="index.html">All Product</a></li>
                                <li><a href="index.html">Wishlist</a></li>
                                <li><a href="index.html">Blog</a></li>
                                <li><a href="index.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright__wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="copyright">
                        <div class="copy__right__inner text-left">
                            <p>Copyright <i class="fa fa-copyright"></i> <a href="https://freethemescloud.com/">Free themes Cloud.</a> All Rights Reserved</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="payment text-right">
                        <img src="images/icons/payment.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- //Footer Area -->
<!-- QUICKVIEW PRODUCT -->
<div id="quickview-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal__container" role="document">
            <div class="modal-content">
                <div class="modal-header modal__header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-product">
                        <!-- Start product images -->
                        <div class="product-images">
                            <div class="main-image images">
                                <img alt="big images" src="{{ asset('../userdesign/images/product/big-img/1.jpg') }}">
                            </div>
                        </div>
                        <!-- end product images -->
                        <div class="product-info">
                            <h1>Simple Fabric Bags</h1>
                            <div class="rating__and__review">
                                <ul class="rating">
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                </ul>
                                <div class="review">
                                    <a href="#">4 customer reviews</a>
                                </div>
                            </div>
                            <div class="price-box-3">
                                <div class="s-price-box">
                                    <span class="new-price">$17.20</span>
                                    <span class="old-price">$45.00</span>
                                </div>
                            </div>
                            <div class="quick-desc">
                                Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
                            </div>
                            <div class="select__color">
                                <h2>Select color</h2>
                                <ul class="color__list">
                                    <li class="red"><a title="Red" href="#">Red</a></li>
                                    <li class="gold"><a title="Gold" href="#">Gold</a></li>
                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                </ul>
                            </div>
                            <div class="select__size">
                                <h2>Select size</h2>
                                <ul class="color__list">
                                    <li class="l__size"><a title="L" href="#">L</a></li>
                                    <li class="m__size"><a title="M" href="#">M</a></li>
                                    <li class="s__size"><a title="S" href="#">S</a></li>
                                    <li class="xl__size"><a title="XL" href="#">XL</a></li>
                                    <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
                                </ul>
                            </div>
                            <div class="social-sharing">
                                <div class="widget widget_socialsharing_widget">
                                    <h3 class="widget-title-modal">Share this product</h3>
                                    <ul class="social__net social__net--2 d-flex justify-content-start">
                                        <li class="facebook"><a href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
                                        <li class="linkedin"><a href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                                        <li class="pinterest"><a href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                        <li class="tumblr"><a href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="addtocart-btn">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
   <script>
       $(document).ready(function() {
            $('#change').on('change',function() {
                var value = this.value;
                  $.ajax({
                    url: {{ route('categories.index',['category' => request()->category])}},
                    method : "POST",
                    dataType :'json',
                    data: {value:value},
                    success:function() {
                        location.reload();
                    }
                  });
            })
       });  
    </script>
@endpush
