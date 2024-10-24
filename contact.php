<?php
include_once('include/header.php');
include_once('include/nav.php');
include_once('phplib/view.php');
if(!isset($_GET['name']))
{
 echo "<script>window.open('contact.php?name=Q29udGFjdCB1cyBmb3IgbW9yZQ==','_self');</script>";
}
?>
<!-- mail -->
		<div class="mail">
			<h3>Contact us at</h3>
			<div class="agileinfo_mail_grids">
				<div class="col-md-4 agileinfo_mail_grid_left">
					<ul>
						<li><i class="fa fa-home" aria-hidden="true"></i></li>
						<li>address<span>Kathmandu, Nayabazzar</span></li>
					</ul>
					<ul>
						<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
						<li>email<span><a href="mailto:boyemo728@gmail.com">boyemo728@gmail.com</a></span></li>
					</ul>
					<ul>
						<li><i class="fa fa-phone" aria-hidden="true"></i></li>
						<li>call to us<span>9849965145</span></li>
					</ul>
				</div>
				<div class="col-md-8 agileinfo_mail_grid_right">
					<!-- <form action="javascript:void(0);" method="get">
						<div class="col-md-6 wthree_contact_left_grid">
							<input type="text" name="Name" value="Name*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name*';}" required="true">
							<input type="email" name="Email" value="Email*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email*';}" required="true">
						</div>
						<div class="col-md-6 wthree_contact_left_grid">
							<input type="text" name="Telephone" value="Telephone*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone*';}" required="">
							<input type="text" name="Subject" value="Subject*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject*';}" required="true">
						</div>
						<div class="clearfix"> </div>
						<textarea  name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
						<input type="reset" onclick="alert('Thank You');" value="Submit">
						<input type="reset" value="Clear">
					</form> -->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //mail -->
<!-- map -->
	<div class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7063.9935059200725!2d85.2936626328078!3d27.71738652999822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18ef67a22d9f%3A0xedf3e2c86d367586!2sPrime%20College!5e0!3m2!1sen!2snp!4v1723776535873!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
<!-- //map -->
<?php  
include_once('include/footer.php');
?>