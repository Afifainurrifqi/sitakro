<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Betler Multipurpose Forms HTML Template">
    <meta name="author" content="Ansonika">
    <title>SITAKRO Kemirigede | Sistem Informasi Data Mikro Desa Kemirigede</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="/assets3/img/Kemirigede.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="/assets3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets3/css/vendors.css" rel="stylesheet">
    <link href="/assets3/css/style.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="/assets3/css/custom.css" rel="stylesheet">
</head>

<body>

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->

	<div class="container-fluid">
	    <div class="row row-height">
	        <div class="col-lg-6 background-image p-0" data-background="url(/assets3/img/bg.png)">
	            <div class="content-left-wrapper opacity-mask" data-opacity-mask="rgba(13, 110, 253, 0.8)">

	                <div id="social">
	                    <ul>
	                        <li><a href="#0"><i class=""></i></a></li>
	                        <li><a href="#0"><i class=""></i></a></li>
	                    </ul>
	                </div>
	                <!-- /social -->
	                <div>
	                    <h1>SELAMAT DATANG DI</h1>
	                    <p>Sistem Informasi Data Mikro Desa Kemirigede Kecamatan Kanigoro Kabupaten Blitar</p>
	                    <a href="https://www.youtube.com/watch?v=l_nwLjT8Vzg&embeds_referring_euri=https%3A%2F%2Fsitakro.com%2F&source_ve_path=MjM4NTE" class="btn_1 black rounded pulse_bt plus_icon btn_play">Profil SITAKRO<i class="arrow_triangle-right"></i></a>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-6 d-flex flex-column content-right">
	            <div class="container my-auto py-5">
	                <div class="row">
	                    <div class="col-lg-9 col-xl-7 mx-auto position-relative">
							<h1 class="mb-3" style="text-align: center;"><img src="/assets3/img/logosi2.png" alt="" width="" height="55"></h1>
	                        <h2 class="mb-3" style="text-align: center;">MASUK</h2>
							<h3 class="mb-3" style="text-align: center;">SITAKRO Kemirigede</h3> </br>
	                        <form class="input_style_1" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input value="{{ old('email') }}" type="email" name="email" class="form-control" placeholder="Email" >
                                </div>
	                            <div class="form-group">
                                    <input value="{{ old('password') }}" name="password" type="password" class="form-control" placeholder="Password">
                                </div>
	                            <div class="clearfix mb-3">
	                            </div>
	                            <button type="submit" class="btn_1 full-width">Masuk</button>
	                        </form>
	                    </div>
	                </div>
	            </div>
	            <div class="container pb-3 copy">© Desa Kemirigede 2023 - Kabupaten Blitar</div>
				<div class="container pb-3 copy">by Tim Smart Village Nasional</div>
	        </div>
	    </div>
	    <!-- /row -->
	</div>
	<!-- /container -->

	<!-- COMMON SCRIPTS -->
    <script src="/assets3/js/common_scripts.js"></script>
	<script src="/assets3/js/common_func.js"></script>

</body>
</html>
