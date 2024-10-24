<?php
include_once('include/header.php');
include_once('include/nav.php');
include_once('phplib/view.php');
include_once('phplib/controler.php');

?>
<!DOCTYPE html>
<html>
<head>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

<script src="js/jquery-1.11.1.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
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

<link rel="stylesheet" href="css/star-rating.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="css/themes/krajee-fa/theme.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="css/themes/krajee-svg/theme.css" media="all" type="text/css"/>
    <link rel="stylesheet" href="css/themes/krajee-uni/theme.css" media="all" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/star-rating.js" type="text/javascript"></script>
    <script src="js/themes/krajee-fa/theme.js" type="text/javascript"></script>
    <script src="js/themes/krajee-svg/theme.js" type="text/javascript"></script>
    <script src="js/themes/krajee-uni/theme.js" type="text/javascript"></script>
</head>
	<style type="text/css">
		.rating-container .caption {
		display: none;
	}
	.rating-container .clear-rating {
    padding-right: 5px;
    display: none !important;
}

	</style>



<div class="col-sm-8 col-sm-offset-2">
<?php 
if (isset($_POST['btnSubmit'])) {
    // Ensure that the createreview function exists
    if (function_exists('createreview')) {
        createreview($_POST['txtProductId'], $_POST['txtTitle'], $_POST['txtComment'], $_POST['txtRate']);
    } else {
        echo "<div class='alert alert-danger'>Error: Review function not found.</div>";
    }
} ?>
<form action="add_review.php?productid=<?php echo $_GET['productid']; ?>" method="post"> 
	<div class="row">
		<div class="form-group col-sm-12">
  			<label for="usr">Title:</label>
  			<input type="text" class="form-control" name="txtTitle" id="txtTitle" required>
		</div>
		<div class="form-group col-sm-12">
  			<label for="usr">Rating:</label>
  			<input type="text" id="txtRate" class="kv-uni-star rating-loading" name="txtRate"   value="3" data-size="xs" title="" >
		</div>
		<div class="form-group col-sm-12">
  			<label for="usr">Comment:</label>
  			<textarea class="form-control" required name="txtComment" id="txtComment"></textarea>
		</div>
		<input type="hidden" name="txtProductId" id="txtProductId" value="<?php echo base64_decode($_GET['productid']); ?>">
		<div class="form-group col-sm-12">
  			<button class="btn btn-success" name="btnSubmit" id="btnSubmit"> Comment Now</button>
		</div>
	</div>
</form>	
</div>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
 $(document).on('ready', function () {
        $('.kv-gly-star').rating({
            containerClass: 'is-star'
        });
        $('.kv-gly-heart').rating({
            containerClass: 'is-heart',
            defaultCaption: '{rating} hearts',
            starCaptions: function (rating) {
                return rating == 1 ? 'One heart' : rating + ' hearts';
            },
            filledStar: '<i class="glyphicon glyphicon-heart"></i>',
            emptyStar: '<i class="glyphicon glyphicon-heart-empty"></i>'
        });
        $('.kv-fa').rating({
            theme: 'krajee-fa',
            filledStar: '<i class="fa fa-star"></i>',
            emptyStar: '<i class="fa fa-star-o"></i>'
        });
        $('.kv-fa-heart').rating({
            defaultCaption: '{rating} hearts',
            starCaptions: function (rating) {
                return rating == 1 ? 'One heart' : rating + ' hearts';
            },
            theme: 'krajee-fa',
            filledStar: '<i class="fa fa-heart"></i>',
            emptyStar: '<i class="fa fa-heart-o"></i>'
        });
        $('.kv-uni-star').rating({
            theme: 'krajee-uni',
            filledStar: '&#x2605;',
            emptyStar: '&#x2606;'
        });
        $('.kv-uni-rook').rating({
            theme: 'krajee-uni',
            defaultCaption: '{rating} rooks',
            starCaptions: function (rating) {
                return rating == 1 ? 'One rook' : rating + ' rooks';
            },
            filledStar: '&#9820;',
            emptyStar: '&#9814;'
        });
        $('.kv-svg').rating({
            theme: 'krajee-svg',
            filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
            emptyStar: '<span class="krajee-icon krajee-icon-star"></span>'
        });
        $('.kv-svg-heart').rating({
            theme: 'krajee-svg',
            filledStar: '<span class="krajee-icon krajee-icon-heart"></span>',
            emptyStar: '<span class="krajee-icon krajee-icon-heart"></span>',
            defaultCaption: '{rating} hearts',
            starCaptions: function (rating) {
                return rating == 1 ? 'One heart' : rating + ' hearts';
            },
            containerClass: 'is-heart'
        });

        $('.rating,.kv-gly-star,.kv-gly-heart,.kv-uni-star,.kv-uni-rook,.kv-fa,.kv-fa-heart,.kv-svg,.kv-svg-heart').on(
                'change', function () {
                    console.log('Rating selected: ' + $(this).val());
                });
    });
</script>


<script>
	function showHint() {
		var str=document.getElementById("txtEmail").value;
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "sendnewsletter.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
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

</body>
</html>