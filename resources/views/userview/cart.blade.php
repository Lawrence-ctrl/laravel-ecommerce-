@extends('userview.layouts.usermaster')
@section('title','Cart')
@section('content')
        <div class="ht__bradcaump__area bg-image--3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Shopping Cart</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{ url('/') }}">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Shopping Cart</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(session()->has('status'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            <strong>Success!</strong>{{ session()->get('status')}}
        </div>
        @endif
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <form action="#">               
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $c)
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="../userdesign/images/product/{{ $c->model->product_images }}" alt="product img"></a></td>
                                            <td class="product-name"><a href="#">{{ $c->model->product_name }}</a></td>
                                            <td class="product-price"><span class="amount">{{ $c->model->product_price }}</span></td>
                                            <form method="POST">
                                                @csrf
                                            <td class="product-quantity"><input type="number" name="qty" data-id={{ $c->rowId }} id="qry" value="{{ $c->qty }}"></td>
                                            </form>
                                            <td class="product-subtotal">{{ $c->subtotal() }}</td>
                                            <td class="product-remove"><a href="{{ route('cart.remove', $c->rowId) }}">X</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                        <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                {{-- <li><a href="#">Coupon Code</a></li>
                                <li><a href="#">Apply Code</a></li> --}}
                                <li><a href="{{ route('categories.index') }}">Continue Shopping</a></li>
                                <li><a href="">Check Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cartbox-total d-flex justify-content-between">
                                <ul class="cart__total__list">
                                    <li>Tax (1%)</li>
                                    <li>Sub Total</li>
                                </ul>
                                <ul class="cart__total__tk">
                                    <li>{{ Cart::tax() }}</li>
                                    <li>{{ Cart::subtotal() }}</li>
                                </ul>
                            </div>
                            <div class="cart__total__amount">
                                <span>Grand Total</span>
                                <span>{{ Cart::total() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <!-- cart-main-area end -->
		<!-- Footer Area -->
        @include('userview.includes.footer')
        @push('js')
            <script>
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
                $(document).ready(function(){
                    $('td > #qry').each(function(index,element){
                        $(element).on('change',function(){
                           var value = this.value;
                           var id = $(this).data('id');
                            $.ajax({
                                url: "{{ route('cart.update') }}",
                                method: "POST",
                                dataType: "json",
                                data: { value:value, id:id },
                                success:function(response) {
                                    window.location.href = "{{ route('cart.cart') }}";
                                }
                            });
                        })
                    });
                });
            </script>
        @endpush
