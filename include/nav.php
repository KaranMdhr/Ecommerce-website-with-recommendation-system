<body>
<!-- header -->
<div class="container inner">
	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="#">MobeeShoppers</a>
		</div>
		<div class="w3l_search">
			<form action="search.php" method="get">
				<input type="text" name="search" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<input type="submit" value=" ">
			</form>
		</div>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> My Account <span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								
								<?php
									if(isset($_SESSION['UserEmail']) && isset($_SESSION['UserFullName']))
									{
										echo "
											<li><a href='order.php?name=WW91ciBPcmRlciBIaXN0b3J5'>Order History</a></li>
											<li><a href='myaccount.php?name=TXkgQWNjb3VudA=='>Account</a></li>
											<li><a href='order.php?name=WW91ciBPcmRlciBIaXN0b3J5'>Track Order</a></li>
											<li><a href='logout.php'>Log Out</a></li>
										";
									}
									else
									{
										echo "
											<li><a href='login.php?name=".base64_encode('User Login')."'>Login</a></li>
								<li><a href='register.php?name=".base64_encode('Create New Account')."'>Sign Up</a></li>
										";
									}
								?>
								
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="product_list_header">  
			<form action="cart.php?name=Q2FydA==" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="View cart" class="button" />
                </fieldset>
            </form>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="contact.php">Contact Us</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products" style="background-color: #000; background-image: url('img/bg.png');">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<a href="index.php"><img src="img/logo.png" img id="logo" class="logo2"></a>
			</div>
			<div class="w3ls_logo_products_left">
				<a href="index.php"><img src="img/mobile2.png" img id="wallpaper" class="logo2"></a>
				
			</div>
			<div class="w3ls_logo_products_left">
				<a href="index.php"><h2 id="navtopic"style="color:red; font-family: verdana;">MOBEE SHOPPERS</h2></a>
				
			</div>
			
			
			<div class="w3ls_logo_products_left1">
				
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a></li>
					<li><i class="fa fa-laptop" aria-hidden="true"></i><a href="about.php">About Us</a></li>
					<li><i class="fa fa-gift" aria-hidden="true"></i><a href="allproduct.php">Products</a></li>
				
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->