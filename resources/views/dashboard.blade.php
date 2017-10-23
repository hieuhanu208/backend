<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GoFood </title>
	<base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="resource/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="resource/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="resource/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="resource/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="resource/assets/dest/css/style.css">
	<link rel="stylesheet" href="resource/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="resource/assets/dest/css/huong-style.css">
	<link rel="shortcut icon" type="image/png" href="image/go.png"/>
</head>
<body>

	@include('header')
	<div class="rev-slider">
	@yield('content')
	</div> <!-- .container -->
	
	@include('footer')


	<!-- include js files -->
	<script src="resource/assets/dest/js/jquery.js"></script>
	<script src="resource/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="resource/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="resource/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="resource/assets/dest/vendors/animo/Animo.js"></script>
	<script src="resource/assets/dest/vendors/dug/dug.js"></script>
	<script src="resource/assets/dest/js/scripts.min.js"></script>
	<script src="resource/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="resource/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="resource/assets/dest/js/waypoints.min.js"></script>
	<script src="resource/assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script src="resource/assets/dest/js/custom2.js"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
	<button onclick="topFunction()" id="myBtn" title="Go to Top"><i class="fa fa-angle-up fa-2x" style="color: #ED6326"></i></button>
	<!-- Scroll to Top -->
			<script>
			// When the user scrolls down 20px from the top of the document, show the button
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
				if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
					document.getElementById("myBtn").style.display = "block";
				} else {
					document.getElementById("myBtn").style.display = "none";
				}
			}

			// When the user clicks on the button, scroll to the top of the document
			function topFunction() {
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
			}
		</script>
		
		<script src="https://uhchat.net/code.php?f=e329c3"></script>
</body>
</html>
