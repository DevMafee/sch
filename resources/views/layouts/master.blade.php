<!DOCTYPE HTML>
<html>
	<head>
		<title>SIMEC :: @yield('title')</title>
		<link rel="shortcut icon" href="{{ asset('public/theme') }}/images/icons/favicon.png"  type="image/png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="SIMEC School Management System" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- Bootstrap Core CSS -->
		<link href="{{ asset('public/theme') }}/vendor/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="{{ asset('public/theme') }}/vendor/css/style.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="{{ asset('theme') }}/vendor/css/morris.css" type="text/css"/>
		<!-- Graph CSS -->
		<link href="{{ asset('public/theme') }}/vendor/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('public/theme') }}/vendor/css/jquery-ui.css"> 
		<!-- jQuery -->
		<!-- <script src="js/jquery-2.1.4.min.js"></script> -->
		<script src="{{ asset('public/theme') }}/vendor/jquery/jquery.min.js"></script>
		<!-- //jQuery -->
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<!-- lined-icons -->
		<link rel="stylesheet" href="{{ asset('public/theme') }}/vendor/css/icon-font.min.css" type='text/css' />
		<!-- //lined-icons -->
		
	</head> 
	<body>
		<div class="main-wthree" style="background-image: url('{{ asset('public/theme')  }}/images/going.jpg'); background-size: cover;">
			<div class="container">
				<div class="sin-w3-agile" style="padding: 20px; margin: 3em auto; background-color: #520A7C; opacity: 0.92;">

					@yield('mainContent')
					
					<div class="footer">
						<p>&copy; 2018-2019 SIMEC System Ltd. All Rights Reserved | Design by <a href="http://simecsystem.com" target="_blank">SIMEC System Ltd</a></p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>