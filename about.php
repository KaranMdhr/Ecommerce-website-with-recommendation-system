<?php
include_once('include/header.php');
include_once('include/nav.php');
include_once('phplib/view.php');
include_once('phplib/controler.php');
if(!isset($_GET['name']))
{
	echo "<script>window.open('about.php?name=".base64_encode('About Us')."','_self');</script>";
}
?>

<!-- about -->
		<div class="privacy about">
			<h3>About Us</h3>
			
			<div class="agile_about_grids">
				<div class="col-md-6 agile_about_grid_right">
					<br><img src="images/sammsungg.jpg" alt=" " class="img-responsive" />
				</div>
				<div class="col-md-6 agile_about_grid_right">
				<p class="animi" align="justify">Founded in 2024, Mobee-Shoppers began with a simple mission on Baseline Road: to offer transparent pricing and a personalized shopping experience in the mobile world. We were one of the first mobile shops to openly list our prices on our website—no tricks, no hidden fees—so you’d always know exactly what you’re paying for.

From those early days, we’ve grown into a trusted mobile device outlet, and it’s all thanks to the support of customers like you. Our values are rooted in honesty and reliability, which has helped us thrive in an industry that’s always changing.

We get it—tech specs can be confusing, and sometimes overwhelming. That’s why we make it our goal to explain every feature in plain language, so you can feel confident in your choice. There’s no need for complicated jargon, just simple, honest advice to help you find the phone that’s right for you.

Our sales team isn’t just knowledgeable—they’re passionate about helping you find the perfect device. Whether you're after the latest model or just something that fits your lifestyle, they’ll work with you to find the best option at the best price. We carry a wide range of mobile phones and tablets from top brands, all backed by full warranties from the manufacturers. Plus, our team can guide you step by step, so you're up and running in no time.

At Mobee-Shoppers, we’re more than a mobile store. We’re here to make sure every customer leaves happy, informed, and ready to enjoy their new device.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //about -->

<!-- testimonials -->
	<!-- <div class="testimonials">
		<div class="container">
			<h3>Testimonials</h3>
				<div class="w3_testimonials_grids">
					<div class="wmuSlider example1 animated wow slideInUp" data-wow-delay=".5s">
						<div class="wmuSliderWrapper">
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="col-md-6 w3_testimonials_grid">
										<p><i class="fa fa-quote-right" aria-hidden="true"></i>Mobee-Shoppers is the best Mobile Shop than Mobile-Island in our Town</p>
										<h4>Pehasara Wickramathunga<span>Owner [Mobile-Island]</span></h4>
									</div>
									<div class="col-md-6 w3_testimonials_grid">
										<p><i class="fa fa-quote-right" aria-hidden="true"></i>Seeing his shop, I decided to close my shop and set up a phone shop like his.</p>
										<h4>Mohommad Nasik <span>Owner [Juicy]</span></h4>
									</div>
									<div class="clearfix"> </div>
								</div>
							</article>
							
							
						</div>
					</div>
					<script src="js/jquery.wmuSlider.js"></script> 
					<script>
						$('.example1').wmuSlider();         
					</script> 
				</div>
		</div>
	</div> -->
<!-- //testimonials -->
<?php
include_once('include/footer.php');
?>