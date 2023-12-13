@extends('site.layouts.app')
@section('title','checkout')
@section('content')
<div class="page-head">
	<div class="container">
		<h3>Check Out</h3>
	</div>
</div>
<div class="checkout">
	<div class="container">
		<h3>My Shopping</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>Price</th>
					</tr>
				</thead>
                 @foreach ($cartCollection as $cart)
                 <tr class="rem1">
                    <td class="invert-closeb">
                        <a href="{{url("/cart/remove/$cart->id")}}">
                            <div class="rem">
                                <div class="close1"> </div>
                            </div>
                        </a>
                        {{-- <script>$(document).ready(function(c) {
                            $('.close1').on('click', function(c){
                                $('.rem1').fadeOut('slow', function(c){
                                    $('.rem1').remove();
                                });
                                });
                            });
                       </script> --}}
                    </td>
                    <td class="invert-image"><a href="single.html"><img style="width: 50px; height: 50px;" src="{{asset("/storage/".$cart->attributes->featured_image)}}" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                         <div class="quantity">
                            <div class="quantity-select">
                                {{-- <a href="{{url("cart/remove_one_product/$cart->id")}}"> --}}
                                <div class="entry value-minus" onclick="removeProduct({{$cart->id}})">&nbsp;</div>
                                 <input type="number" id="cart_value_{{$cart->id}}" value="{{$cart->quantity}}">
                                {{-- <div class="entry value" id="cart_value_{{$cart->id}}"><span>{{ $cart->quantity }}</span></div> --}}
                                {{-- <a href="{{url("cart/add_one_product/$cart->id")}}"> --}}
                                <div class="entry value-plus" onclick="addProduct({{ $cart->id }})">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">{{ $cart->name }}</td>
                    <td class="invert">{{ $cart->price }}</td>
                </tr>

                 @endforeach

								{{-- <!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity--> --}}
			</table>
		</div>
		<div class="checkout-left">

				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="{{ url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
				</div>
				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4>Shopping basket</h4>
					<ul>
						<li>Hand Bag <i>-</i> <span>$45.99</span></li>
						<li>Watches <i>-</i> <span>$45.99</span></li>
						<li>Sandals <i>-</i> <span>$45.99</span></li>
						<li>Wedges <i>-</i> <span>$45.99</span></li>
						<li>Total <i>-</i> <span>$183.96</span></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
	</div>
</div>
@endsection

@push('scripts')

<script>
     function addProduct(id){
            $.ajax({
                url: "/cart/add_one_product/"+id,
                success: function(result){
                   var old=$("#cart_value_"+id).val()*1+1;
                   $("#cart_value_"+id).val(old);
                }
            });
       }
       function removeProduct(id){
        $.ajax({
            url:"/cart/remove_one_product/"+id,
            success: function(result){
               var old=$("#cart_value_"+id).val()-1;
               $("#cart_value_"+id).val(old);
            }
       });
       }
</script>

@endpush
