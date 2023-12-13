<!-- header -->
<div class="header">
	<div class="container">
		<ul>
			<li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
			<li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
			<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="{{ url('/')}}"><img src="{{asset("/site/images/logo3.jpg")}}"></a></h1>
		</div>
		<div class="search_product">
            <div class="col-md-6 header-middle">
                <form action="{{url('/search')}}" method="get">
                  <div class="search">
                      <input type="search"  name="search" id="search" onkeyup="searchProduct()" onfocus="dataShow()" onblur="dataHide()" placeholder="Search Product">
                  </div>
                  <div class="section_room">
                      <select id="country" onchange="change_country(this.value)" class="frm-field required">
                          <option value="null">All categories</option>
                          <option value="null">Electronics</option>
                          <option value="AX">kids Wear</option>
                          <option value="AX">Men's Wear</option>
                          <option value="AX">Women's Wear</option>
                          <option value="AX">Watches</option>
                      </select>
                  </div>
                  <div class="sear-sub">
                      <button type="submit"></button>
                  </div>
                  <div class="clearfix"></div>
              </form>

              <div id="suggestProduct">

              </div>

          </div>

        </div>



		<div class="col-md-3 header-right footer-bottom">
			{{-- <ul>
				<li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a>

				</li>
				<li><a class="fb" href="#"></a></li>
				<li><a class="twi" href="#"></a></li>
				<li><a class="insta" href="#"></a></li>
				<li><a class="you" href="#"></a></li>
			</ul> --}}

            @auth
            {{Auth::user()->name}}

            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" >
                   <i class="fas fa-sign-out-alt"> Logout</i>
                </button>
            </form>
            @endauth
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="{{ url('/')}}">Home <span class="sr-only">(current)</span></a></li>
					{{-- <li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">men's wear <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="mens.html"><img src="{{asset("/site/images/woo1.jpg")}}" alt=" "/></a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="mens.html">Clothing</a></li>
											<li><a href="mens.html">Wallets</a></li>
											<li><a href="mens.html">Footwear</a></li>
											<li><a href="mens.html">Watches</a></li>
											<li><a href="mens.html">Accessories</a></li>
											<li><a href="mens.html">Bags</a></li>
											<li><a href="mens.html">Caps & Hats</a></li>
										</ul>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="mens.html">Jewellery</a></li>
											<li><a href="mens.html">Sunglasses</a></li>
											<li><a href="mens.html">Perfumes</a></li>
											<li><a href="mens.html">Beauty</a></li>
											<li><a href="mens.html">Shirts</a></li>
											<li><a href="mens.html">Sunglasses</a></li>
											<li><a href="mens.html">Swimwear</a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">women's wear <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="womens.html">Clothing</a></li>
											<li><a href="womens.html">Wallets</a></li>
											<li><a href="womens.html">Footwear</a></li>
											<li><a href="womens.html">Watches</a></li>
											<li><a href="womens.html">Accessories</a></li>
											<li><a href="womens.html">Bags</a></li>
											<li><a href="womens.html">Caps & Hats</a></li>
										</ul>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="womens.html">Jewellery</a></li>
											<li><a href="womens.html">Sunglasses</a></li>
											<li><a href="womens.html">Perfumes</a></li>
											<li><a href="womens.html">Beauty</a></li>
											<li><a href="womens.html">Shirts</a></li>
											<li><a href="womens.html">Sunglasses</a></li>
											<li><a href="womens.html">Swimwear</a></li>
										</ul>
									</div>
									<div class="col-sm-6 multi-gd-img multi-gd-text ">
										<a href="womens.html"><img src="{{asset("/site/images/woo.jpg")}}" alt=" "/></a>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li> --}}


                    @foreach ($main_categories as $value => $description)
                     <li class=" menu__item"><a class="menu__link" href="electronics.html">{{ $description }}</a>

                    </li>
                    @endforeach
                    <li class=" menu__item"><a class="menu__link" href="codes.html">Short Codes</a></li>
					<li class=" menu__item"><a class="menu__link" href="contact.html">contact</a></li>
				  </ul>
				</div>
			  </div>
			</nav>
		</div>
		<div class="top_nav_right">
			<div class="cart box_1">
						<a href="checkout.html">
							<h3> <div class="total">
								<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
								<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>

							</h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->

@push('scripts')
   <script>
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

     function searchProduct(){
        let searchData=$("#search").val();

         if(searchData.length > 0 ){
            $.ajax({
             data:{'search': searchData},
             url: "/search_ajax",
             method: 'post',
             success: function(result) {
                $("#suggestProduct").html(result);
             }
          });
        }
        if(searchData.length < 1 ) $("#suggestProduct").html("");
     }


     function dataShow(){
        $("#suggestProduct").slideDown();
     }
     function dataHide(){
        $("#suggestProduct").slideUp();
     }
   </script>
@endpush


<style>
    .search_product{
        position: relative;
    }
    #suggestProduct{
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: whitesmoke;
        /* z-index: 999; */
    }
</style>
