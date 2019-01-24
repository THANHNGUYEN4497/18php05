<!DOCTYPE html>
<html>
<head>
<base href="{{asset('')}}" />
<script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="js/bootstrap.js"></script>
  <!-- owl carousel -->
  <script src="js/owl.carousel.js"></script>
  <!-- common JS -->
  <script src="js/common.js"></script>
   <!-- Font Awesome -->
  <link rel="stylesheet" href="css/animate.css">
   <!-- Boostrap 4 -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- style css header -->
  <link rel="stylesheet" href="css/headerHome.css">
  <!-- style css footer -->
  <link rel="stylesheet" href="css/footerHome.css">
  <link rel="stylesheet" href="css/ResponsiveCommon.css">
  <!-- style fontawesome css  -->
  <link rel="stylesheet" href="css/font-awesome.css">
  <!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<link href="https://fonts.googleapis.com/css?family=Acme|Anton|Oswald:200,300,400,500,600,700&amp;subset=vietnamese" rel="stylesheet">
@yield('styleHome')
</head>
<style type="text/css" media="screen">
</style>
<body >
	<div class="wrapper">
		@include('home.header.headerHomePage')

<!--  -----------------------------------area-content--------------------------------------  -->
		<div class="content-wrapper">
			<section class="content-header">
			</section> <!-- end_content_header -->
			<section class="content-homepage">
				@yield('homepage')
			</section><!--  end_content -->
		</div> <!-- end_content_wrapper -->
<!--  -----------------------------------end area-content--------------------------------------  -->

		@include('home.footer.footerHomePage')
	</div> <!-- end_wrapper -->
</body>
</html>
