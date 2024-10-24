<?php
session_start();
include_once('phplib/view.php');
include_once('phplib/controler.php');

$product_details=getproductdetailsbyid(base64_decode($_GET['id']));

function getuserdata(){
	// Database connection
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'mobee';
	$mysqli = new mysqli($host, $username, $password, $database);
	
	// Check connection
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}
	
	
	
	// Check if the user is logged in
	// session_start(); // Start the session if not already started

	// Check if the user is logged in
	if (isset($_SESSION['UserEmail']) && isset($_SESSION['UserFullName'])) {
		// Retrieve session variables
		$userEmail = $_SESSION['UserEmail'];
		
		// Prepare a query to fetch customer_id based on session email
		$query = "SELECT customer_id FROM mobee_user WHERE customer_email = ?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('s', $userEmail);
		$stmt->execute();
		$result = $stmt->get_result();
		
		// Check if a user was found
		if ($result->num_rows > 0) {
			// Fetch customer_id
			$userData = $result->fetch_assoc();
			$customer_id = $userData['customer_id'];
			
			// Return customer_id
			return $customer_id;
		} else {
			// No user found
			return null;
		}
	} else {
		// User is not logged in, redirect to login.php
		header("Location: login.php");
		exit(); // Ensure no further code is executed
	}
	}
// Function to insert values into user_history table
function insertUserHistory($customer_id, $product_id, $timestamp = null) {
    // Database connection parameters
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'mobee';

    // Create a new connection
    $mysqli = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // Prepare an SQL statement for execution
    $stmt = $mysqli->prepare("INSERT INTO user_history (customer_id, product_id, timestamp) VALUES (?, ?, ?)");

    // If no timestamp is provided, use NULL to let the database use the default value
    if ($timestamp === null) {
        $timestamp = null;
    }

    // Bind parameters to the SQL query
    $stmt->bind_param("iis", $customer_id, $product_id, $timestamp);

    // Execute the query
    if ($stmt->execute()) {
       // echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $mysqli->close();
}

// Example usage
$user_id = getuserdata();
$item_id =$product_details['product_id'];
insertUserHistory($user_id, $item_id);


?>

<!DOCTYPE html>
<html>
<head>
<title>Shoppers | <?php echo base64_decode($_GET['name']); ?> </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
 <script src='js/okzoom.js'></script>
  <script>
    $(function(){
      $('#example').okzoom({
        width: 175,
        height: 175,
        border: "1px solid black",
        shadow: "0 0 5px #000"
      });
    });
  </script>
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<link href="single/css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<!--flex slider-->
<script defer src="single/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="single/css/flexslider.css" type="text/css" media="screen" />
<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
	  $('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	  });
	});
</script>
<!--flex slider-->
<script src="single/js/imagezoom.js"></script>
<!-- //js --> 
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<!-- web-fonts --> 

<script type="text/javascript" src="single/js/move-top.js"></script>
<script type="text/javascript" src="single/js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script type="text/javascript">
	$(document).ready(function() {
	
		var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
		};
		
		$().UItoTop({ easingType: 'easeOutQuart' });
		
	});
</script>
<!-- //smooth-scrolling-of-move-up --> 


<style type="text/css">
	body {
		background-image: url(images/bg2.png);
		background-size: 100%;
		background-repeat: repeat-y;
	}
	.inner {
		background-color: #fff;
		-webkit-box-shadow: 0px 0px 31px 1px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 31px 1px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 31px 1px rgba(0,0,0,0.75);
	}
	.wthree_banner_bottom_left_grid:hover
			{
    -webkit-animation: flash 1s;
    animation: flash 1s;
			}
	.wthree_banner_bottom_left {
		padding: 10px;
	}
	.singleppt {
		margin: 0px 60px;
	}
</style>


</head>
	
<body>
<!-- header -->
<div class="container inner">
		<div class="agileits_header">
		<div class="w3l_offers">
			<a href="offer.php">Special Offers !</a>
		</div>
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
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
			<h2><a href="contact.php">Contact</a></h2>
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
			<div class="w3ls_logo_products_left"  align="center">
				<a href="index.php"><img src="img/logo.png" class="logo2"></a>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items" style="color:#fff;">
					<li><a href="index.php" style="color:#fff;">Home</a><i>/</i></li>
					<li><a href="about.php" style="color:#fff;">About Us</a><i>/</i></li>
					<li><a href="products.php" style="color:#fff;">Products</a><i>/</i></li>
					<li><a href="services.php" style="color:#fff;">Services</a></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email" >
					<li style="color:#fff;"><i class="fa fa-phone" style="color:#fff;" aria-hidden="true"></i>9849965145</li>
					<li style="color:#fff;"><i class="fa fa-envelope-o" style="color:#fff;" aria-hidden="true"></i><a href="mailto:boyemo728@gmail.com" style="color:#fff;">boyemo728@gmail.com</a></li>
				</ul>
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
				<li><?php if(isset($_GET['name'])){echo "<span>|</span>".base64_decode($_GET['name']);} ?></li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<?php
							viewcategories();
						?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<div  class="w3l_banner_nav_right_banner3" 
			style="background:url(images/1.jpg) no-repeat 0px 0px;
						background-size:cover;
	                    background-size:cover;
	                    -moz-background-size:cover;
	                   -o-background-size:cover;
	                   -ms-background-size:cover;">
				
			</div>
			
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

	<!-- products -->








	</div>
	<div class="products singleppt">	 
		<div class="container ">  
			<div class="single-page">
				<div class="single-page-row" id="detail-21">
					<div class="col-md-6 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<?php viewproductimagebyid(base64_decode($_GET['id'])); ?>
							</ul>
						</div>
					</div>
					<div class="col-md-6 single-top-right">
						<h3 class="item_name"><?php echo $product_details['product_name']; ?></h3>
						<p>Processing Time: Item will be shipped out within 2-3 working days. </p>
						<p><strong>Product Code</strong> :<? echo $product_details['SKU']; ?></p>
						
						<div class="single-price">
							<ul>
								<li>Rs. <?php echo $product_details['selling']; ?>/- </li>  
								<li><del>Rs. <?php echo $product_details['price']; ?>/-</del></li> 
								<li><span class="w3off">10% OFF</span</li> 
								<li><!--Ends on: June,5th--></li>
								<li><a href="#"><i class="fa fa-gift" aria-hidden="true"></i> Coupon</a></li>
							</ul>	

						</div> 

						
						<div class="rating">
							<?php
						$product_id = $product_details['product_id']; // Assuming you have the product ID available
						ratingView($product_id);
						// echo ("id : ".$product_id);
						
							?>
						</div>
						<p class="single-price-text"><?php echo $product_details['description']; ?></p>
						

						<form action="javascript:void(0);" method="post">
								<fieldset>
									<input type="hidden" name="amount" id="price" value="<?php echo $product_details['selling']; ?>" />
									<input type="hidden" name="productid" id="productid" value="<?php echo $product_details['product_id']; ?>" />
									<button type="submit" onclick="AddToCart()" name="submit" class="w3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
									<span id="txtStatus"></span>	
								</fieldset>
							</form>
						
					</div>
					
				   <div class="clearfix"> </div>  
				</div>
			</div> 
			
		</div>
	</div>

	
	<!-- <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
	<div class="container">
			<h3>Recommendations</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<div id="recommendations">

					</div>
					<div class="clearfix"> </div>
				</div>
		</div>
	</div> -->

	<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
	<div class="container">
			<h3>Similar PriceRange Products</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<?php displayprice(base64_decode($_GET['id'])); ?>
					<div class="clearfix"> </div>
				</div>
		</div>
	</div>
	<!--//products--> 



	<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
	<div class="container">
			<h3>Similar Product by category</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<?php displayRecommendation(base64_decode($_GET['id'])); ?>
					<div class="clearfix"> </div>
				</div>
		</div>
	</div>
	<!--//products--> 



<!-- brands -->
	<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
		<div class="container">
			<h3>You may also like</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<?php viewhomeproduct();  ?>
					<div class="clearfix"> </div>
				</div>
		</div>
	</div>
<!-- //brands -->

<?php
include_once('include/footer.php');
?>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>


<!-- recomendation -->
<script>
        // Function to display recommendations
        // function displayRecommendations(data) {
        //     const recommendationsDiv = document.getElementById('recommendations');
        //     let html = '<ul>';
        //     data.forEach(product => {
        //         html += `<li>
        //             <h3>${product.product_name}</h3>
        //             <p>${product.description}</p>
        //             <p>Price: ${product.price}</p>
		// 			<img src="admin/Upload/Products/${product.image}"/>
        //         </li>`;
        //     });
        //     html += '</ul>';
        //     recommendationsDiv.innerHTML = html;
        // }

		// <a href='singleproduct.php?id=".base64_encode($row['product_id'])."&name=".base64_encode($row['product_name'])."'>


		// <a href='singleproduct.php?id=${productIdA}&name=${productNameA}' class='snipcart-details'>Add To Cart</a>

		//  function displayRecommendations(data) {
		// 	 const recommendationsDiv = document.getElementById('recommendations');
		// 	 let html = '<div class="agile_top_brands_grids">';
		// 	 data.forEach(product => {
		// 		console.log(product)
				
		// let productIdA = <?php   echo base64_encode($product['id']); ?>;
 		// let productNameA = "<?php echo base64_encode($product['name']); ?>";
        //         html += `<div class='col-md-3 top_brand_left'>
		// 			<div class='hover14 column'>
		// 				<div class='agile_top_brand_left_grid'>
							
		// 					<div class='agile_top_brand_left_grid1'>
		// 						<figure>
		// 							<div class='snipcart-item block' >
		// 								<div class='snipcart-thumb'>
											
		// 									<img src='admin/Upload/Products/${product.image}' style='height:195.5px;width:124.75;' alt=''  class='img-responsive' />
		// 									<p>${product.product_name}</p>
		// 									<h4>Rs. ${product.selling}/- <span>Rs.${product.price}/-</span></h4>
		// 									<strong>Product Code :</strong>${product.SKU}
		// 								</div>
		// 								<div class='snipcart-details top_brand_home_details'>
		// 									 <a href='singleproduct.php?id=${productIdA}&name=${productNameA}' class='snipcart-details'>Add To Cart</a>

		// 								</div>
		// 							</div>
		// 						</figure>
		// 					</div>
		// 				</div>
		// 			</div>
		// 		</div>`;
        //     });
        //     html += '</div>';
        //     recommendationsDiv.innerHTML = html;
        // }

	

        // Fetch recommendations from the PHP file
		// let id = (<?php echo $product_details['product_id']?>);
        // fetch('algorithms.php?id='+id)
        //     .then(response => response.json())
        //     .then(data => {
		// 		console.log(data)
		// 		displayRecommendations(data)})
        //     .catch(error => console.error('Error fetching recommendations:', error));

	
    </script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>

<script>
function AddToCart()
{
	var a=document.getElementById("price").value;
	var b=document.getElementById("productid").value;
 	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtStatus").innerHTML = this.responseText;
        }
    };
    var url="addtocart.php?productid="+b+"&price="+a;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}
</script>

</body>
</html>