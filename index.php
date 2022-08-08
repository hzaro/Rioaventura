<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
	<!-- IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

	<!-- Meta Tags -->
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>BIKINI TOURS</title>
	<meta name="description" content="RIO AVENTURA es una de las primeras empresas de rafting de Sudamérica, especializada en Turismo Aventura. En 1983 se introdujo el rafting en Argentina"/>	
	<meta name="author" content="Ipage"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<!-- <link rel="shortcut icon" href="images/favicon.png">
	<link rel="shortcut icon" href="images/favicon.png"> -->
	<link rel="icon" href="http://rioaventuramendoza.com/desarrollo/nueva_rio/images/favicon.png" />

	<!-- Stylesheets -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/style-responsive.css" rel="stylesheet" type="text/css" />
	<link href="css/project_style.css" rel="stylesheet" type="text/css" />
	<link href="css/isotope_animation.css" rel="stylesheet" type="text/css" />
	<link href="css/animation.css" rel="stylesheet" type="text/css" />
	<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css">
	<link href="css/responsiveslides.css" rel="stylesheet" type="text/css">
	<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.transitions.css" rel="stylesheet" type="text/css" />

	<!-- Style Switcher Stylesheets -->
	<link href="switcher/switcher.css" rel="stylesheet" type="text/css" />

	<!-- Color Scheme Layout -->
	<link href="css/colors/red.css" rel="stylesheet" type="text/css" id="layout-css" />
	<!-- <link href="css/colors/yellow.css" rel="stylesheet" type="text/css" id="layout-css" /> -->

	<!-- Google fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,300,800,300italic,700italic,800italic' rel='stylesheet' type='text/css'>

	<link href='//cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css' rel='stylesheet' type='text/css'>


	<link rel="stylesheet" href="css/ladda-themeless.min.css">
	<link rel="stylesheet" href="css/table.css">
	<!-- <link rel="stylesheet" href="js/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css"> -->
	<link rel="stylesheet" href="css/font-awesome-animation.min.css">
	<!-- jQuery -->
	<script type="text/javascript" src="js/vendor/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/vendor/jquery-ui.js"></script>
	<script type="text/javascript" src="js/vendor/jquery.browser.min.js"></script>
	<!-- <script type="text/javascript" src="js/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script> -->

	<!--[if IE]>
	<link rel="stylesheet" type="text/css"  href="css/ie_style.css"/><![endif]-->

	<script type="text/javascript">
	//For IE 10
	if(Function('/*@cc_on return document.documentMode===10@*/')()){
		var headHTML = document.getElementsByTagName('head')[0].innerHTML;
		headHTML    += '<link type="text/css" rel="stylesheet" href="css/ie_style.css">';
		document.getElementsByTagName('head')[0].innerHTML = headHTML;
	}

	//For IE 11
	if(navigator.userAgent.match(/Trident.*rv:11\./)) {
		var headHTML = document.getElementsByTagName('head')[0].innerHTML;
		headHTML    += '<link type="text/css" rel="stylesheet" href="css/ie_style.css">';
		document.getElementsByTagName('head')[0].innerHTML = headHTML;
	}
	</script>

	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="admin/sweetalert-master/dist/sweetalert.css">
	<link href="admin/assets/css/jquery.datetimepicker.min.css" rel="stylesheet" type="text/css"/>
	<link href="css/lightslider.css" rel="stylesheet" type="text/css"/>
	<?php						
		include 'db.php';  
		$bd=conectar_bd();
	?>

</head>

<body>

	<div id="load"></div>

	<!-- top-slider -->
	<section id="sec-home" class="zee_curve_container zee_b_curve_container">
		<!-- slider-default starts -->

		<ul id="light-slider" style="height: 100%;">
		    <li style="height: 100%;background-position: center !important;background-size: cover !important; background: radial-gradient(#0000004d, #0000004d), url(images/static_banner5.jpg);">
		    </li>
		    <li style="height: 100%;background-position: center !important;background-size: cover !important; background: radial-gradient(#0000004d, #0000004d), url(images/static_banner4.jpg);">
		    </li>
		    <li style="height: 100%;background-position: center !important;background-size: cover !important; background: radial-gradient(#0000004d, #0000004d), url(images/static_banner.jpg);">
		    </li>
		    <li style="height: 100%;background-position: center !important;background-size: cover !important; background: radial-gradient(#0000004d, #0000004d), url(images/static_banner7.jpg);">
		    </li>
		</ul>

		<div class="static_banner">

			<!-- header-menu-1 starts -->
			<div class="header-menu-1 menu-bar">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<!-- logo starts -->
							<div class="logo">
								<figure>
									<a href="index.php"><img src="images/logo.png" alt="Bikini Tours"></a>
								</figure>
							</div>
					

							<div class="header_nav_holder">
								<!--main-nav starts-->
								<nav class="main-nav">
									<ul  id="head-nav" class="top-nav">
										<li class="current">
											<a href="#sec-home">Home</a>
										</li>
										<li>
											<a href="#sec-about">Nosotros</a>
										</li>

										<li>
											<a href="#sec-services">Empresas</a>
										</li>
										<li>
											<a href="#sec-portfolio">Paquetes</a>
										</li>

										<li>
											<a href="#sec-contact">Contacto</a>
										</li>

										<li>
											<a class="cvboton"  href="">Oportunidades laborales</a>
										</li>										
										<!-- <li>
											<a style="margin-top: 15px;" class="modalCarrito" href="">
												<i style="color: #FF3131!important;" class="fa fa-shopping-cart fa-2x faa-ring animated"></i>
											</a>										
										</li> -->
									</ul>
								</nav>
								<!-- main-nav ends-->
								<!-- header_toggle_menu -->
								<div class="header_toggle_menu">
									<div class="menu_small_btn">
										<div class="open_menu toggle_top_menu_btn">
											<i class="fa fa-bars"></i>
										</div>
										<div class="close_menu toggle_top_menu_btn">
											<i class="fa fa-times"></i>
										</div>
									</div>
								</div>
								<!-- header_toggle_menu -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- header-menu-1 ends -->

			<div class="container">
				<div class="row">
					<!-- text_banner_holder starts -->
					<div class="text_banner_holder">
						<div class="col-xs-2">
							<div class="skew_shape">
							</div>
						</div>
						<div class="heading_wrap col-xs-10">
							<h2>Conocé y <span class="highlight">Disfrutá</span> Mendoza</h2>
							<!-- <h2>Rio  <span class="highlight">aventura</span> Mendoza</h2> -->
							<!-- <div class="logo">
								<figure> -->
									<!-- <a href="index.php"><img src="images/bikini-tours.png" style="height: 100px;margin-top: 30px;margin-bottom: 20px;"></a> -->
								<!-- </figure>
							</div> -->
							<!-- next_section starts -->
							<div class="next_section animated animate_infinite" data-animdelay="0.2s" data-animspeed="1.4s" data-animrepeat="1" data-animtype="bounce">
								<a href="javascript:void(0);" class="scroll_next_section">
									<i class="fa fa-angle-down"></i>
								</a>
							</div>
							<!-- next_section ends -->
						</div>
					</div>
					<!-- text_banner_holder ends -->
				</div>

				<!-- zee_curve_right starts -->
				<div class="zee_curve_right">
				</div>
				<!-- zee_curve_right ends -->
			</div>

		</div>
		<!-- slider-default ends -->
	</section>
	<!-- top-slider ends -->

	<!-- menu-bar starts -->
	<header class="menu-bar sticky-bar">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- logo starts -->
					<div class="logo">
						<figure>
							<img src="images/logo.png" alt="logo" class="main_logo">
						</figure>
						<div class="small_menu">
							<div class="menu_small_btn">
								<div class="open_menu toggle_main_menu_btn">
									<i class="fa fa-bars"></i>
								</div>
								<div class="close_menu toggle_main_menu_btn">
									<i class="fa fa-times"></i>
								</div>
							</div>
						</div>
					</div>
					<!-- logo ends -->

					<!--main-nav starts-->
					<nav class="main-nav">
						<ul id="top-nav" class="top-nav">

							<li class="current">
								<a href="#sec-home">Home</a>
							</li>
							<li>
								<a href="#sec-about">Nosotros</a>
							</li>

							<li>
								<a href="#sec-services">Empresas</a>
							</li>
							<li>
								<a href="#sec-portfolio">Paquetes</a>
							</li>

							<li>
								<a href="#sec-contact">Contacto</a>
							</li>

							<li>
								<a class="cvboton" href="">Oportunidades laborales</a>
							</li>

							<!-- <li>
								<a style="    margin-top: 15px;" class="modalCarrito" href=""><i style="    color: #FF3131!important;" class="fa fa-shopping-cart fa-2x faa-ring animated"></i></a>	
							</li> -->


						</ul>
						<span class="back_top">
							<a href="javascript:void(0);" class="back_to_top"><i class="fa fa-angle-up"></i></a>
						</span>
					</nav>
					<!-- main-nav ends-->
				</div>
			</div>
		</div>
	</header>
	<!-- menu-bar ends -->

	<!-- sec-about starts -->
	<section id="sec-about" class="section_holder">
		<div class="container section_container">
			<div class="row">
				<article>
					<div class="hgroup">
						<div class="col-xs-3 heading_cover">
							<h2>Nosotros</h2>
						</div>
						<div class="col-xs-1 skew_holder">
							<div class="skew_shape"></div>
						</div>
						<div class="col-xs-8 heading_cover">
							<h3>RIO AVENTURA es una de las primeras empresas de rafting de Sudamérica, especializada en Turismo Aventura. En 1983 se introdujo el rafting en Argentina creando RIO AVENTURA.
								<br>

							</h3>
						</div>
					</div>
				</article>
			</div>

			<div class="row">
				<!-- about_image starts -->
				<!-- <div class="col-sm-4 about_image">
					<img src="images/about_image.png" alt="About Us">
				</div> -->
				<!-- about_image ends -->

				<div class="col-sm-12 about_content_holder">

					<!-- About Details starts -->
					<div class="row">
						<!-- about_single starts -->
						<div class="col-sm-6 about_single">
							<div class="icon_holder">
								<i class="fa fa-check"></i>
							</div>
							<div class="about_right">
								<h4>Seriedad</h4>
								<p>Hoy en día Somos una pujante empresa de turismo aventura y turismo convencional con paquetes exclusivos, reconocida a nivel Nacional, con base central de operaciones en Potrerillos y expandiéndonos a la zona de Cacheuta</p>
							</div>
						</div>
						<!-- about_single ends -->

						<!-- about_single starts -->
						<div class="col-sm-6 about_single">
							<div class="icon_holder">
								<i class="fa fa-lightbulb-o"></i>
							</div>
							<div class="about_right">
								<h4>Innovación</h4>
								<p>Ofrecemos una manera diferente de viajar y descubrir uno de los mas espectaculares escenarios naturales del mundo. En el río como sendero podes probar divertidos rápidos, dos piscinas a orillas del río y un entorno sensacional con su flora y fauna autóctona.</p>
							</div>
						</div>
						<!-- about_single ends -->

						<!-- about_single starts -->
						<div class="col-sm-6 about_single">
							<div class="icon_holder">
								<i class="fa fa-building-o"></i>
							</div>
							<div class="about_right">
								<h4>Programas empresariales</h4>
								<p>Contamos además con especialización en Programas Empresariales, Programas de Team Building, Manejos de Grupos Estudiantiles y eventos especiales como Rafting Full Moon y after Rafting.</p>
							</div>
						</div>
						<!-- about_single ends -->

						<!-- about_single starts -->
						<div class="col-sm-6 about_single">
							<div class="icon_holder">
								<i class="fa fa-umbrella"></i>
							</div>
							<div class="about_right">
								<h4>Calidad</h4>
								<p>
									Nuestros pasajeros pueden disfrutar todos los días de una amplia variedad de actividades aventura: rafting, trekking, cabalgata, kayak y muchos mas, desde nuestra base de operaciones.</p>
								</div>
							</div>


							<!-- about_single ends -->

							<!-- learn_more_about us link starts
							<div class="col-sm-6 learn_more_about">
							<a href="javascript:void(0);" class="folio-link-url">Learn More About Us <i class="fa fa-long-arrow-right"></i></a>
						</div>
						learn_more_about us link ends -->

					</div>
					<!-- About Details ends -->
				</div>

			</div>
		</div>
	</section>
	<!-- sec-about ends -->

	<!-- zee_curve_container video_holder starts -->
	<section class="zee_curve_container zee_d_curve_container">
		<div class="zee_d_curve zee_d_curve_bg1">
			<div class="container">
				<!-- zee_curve_left starts -->
				<div class="zee_curve_left">
				</div>


				<a class="circle_button circle_button_top " href="//www.tripadvisor.com.ar/Attraction_Review-g312781-d6001749-Reviews-Rio_Aventura_Mendoza-Mendoza_Province_of_Mendoza_Cuyo.html" target="_blank"><i class="fa fa-comment"></i>Dejanos tu comentario haciendo click acá</a>

				<div class="row">
					<div class="testi_holder">


						<div>
							<center><img src="images/tripadvisorlogo.png" style="max-width: 100%;"></center>

						</div>
						<div class=" col-sm-10 span_center align_center">
							<div id="owl-feed">
								<div class="testi_single span_center">
									<div class="avatar">
										<img src="//media-cdn.tripadvisor.com/media/photo-l/05/fc/18/d8/martin-h.jpg" alt="">
									</div>
									<div class="testi_text">
										<h3>Pasé un excelente día en Río Aventura, donde realizamos raffting en el río mendoza, y pude disfrutar de sus piletas y solarium a la vera del río. Al atardecer se realizó una fiesta en el solarium de la pileta, con buena música y tragos, que duró hasta las 22.30 hs un día genial.<br>
											Todo el staff de Rio aventura son muy amables, macanudos y muy divertidos. Las instalaciones están en excelente estado.</h3>
											<h5> <span class="highlight">Martin H.</span></h5>
										</div>
									</div>
									<div class="testi_single span_center">
										<div class="avatar">
											<img src="//media-cdn.tripadvisor.com/media/photo-l/01/2e/70/a2/avatar073.jpg" alt="">
										</div>
										<div class="testi_text">
											<h3>Si Van a Mendoza no pueden dejar de hacer rafting es muy apasionante, la pasan mejor una vez que se caen al agua, tranquilos no pasa nada, luego de ese momento lo disfrutan aún más.</h3>
											<h5> <span class="highlight">Walter G</span></h5>
										</div>
									</div>
									<div class="testi_single span_center">
										<div class="avatar">
											<img src="//media-cdn.tripadvisor.com/media/photo-l/01/2e/70/6b/avatar049.jpg" alt="">
										</div>
										<div class="testi_text">
											<h3>Raftig y canopy en zona Potrerillos. Se puede llegar solo o contratar traslado (si estan en auto, no tiene sentido contratar el traslado). El rafting muy lindo. El canopy también, pero podría durar un poco más..</h3>
											<h5> <span class="highlight">CarlosArgentina68</span></h5>
										</div>
									</div>



								</div>


							</div>
						</div>
					</div>

					<!-- zee_curve_left ends

					<div class="video_holder">
					<div class="col-sm-6 span_center align_center">
					<div class="button_holder">
					<a class="play-button" href="//www.youtube.com/watch?v=a6Ymtt2H-w4" rel="prettyPhoto[gallery1]" title="Rafting en rio mendoza"></a>
				</div>
				<blockquote class="home_quote">
				<p>"Hicieron que mi viaje sea inolvidable"</p>
				<strong> &ndash; john perez</strong>
			</blockquote>
		</div>
	</div>

	zee_curve_right starts -->



	<div class="zee_curve_right">
	</div>
	<!-- zee_curve_right ends -->
</div>
</div>
</section>
<!-- zee_curve_container video_holder ends -->



<!-- sec-services starts -->
<section id="sec-services" class="section_holder">
	<div class="container section_container">
		<div class="row">
			<article>
				<div class="hgroup">
					<div class="col-xs-3 heading_cover">
						<h2>Team building</h2>
					</div>
					<div class="col-xs-1 skew_holder">
						<div class="skew_shape"></div>
					</div>
					<div class="col-xs-8 heading_cover">
						<h3>En Rio Aventura nos basamos en tres pilares fundamentales para la construcción de un equipo de trabajo: <br>
							Liderazgo, trabajo en equipo y confianza personal así como en el grupo a fin de lograr un grupo de alto rendimiento, productivo y con objetivos comunes.
						</h3>
					</div>
				</div>
			</article>
		</div>

		<div class="row">
			<!-- service_single starts -->
			<div class="col-sm-6 service_single">
				<div class="icon_holder">
					<div class="icon_shape">
						<i class="fa fa-coffee"></i>
					</div>
				</div>
				<div class="service_right">

					<h4>Compartir</h4>
					<p>Comenzamos con un desayuno grupal en nuestra base de operaciones situada en  potrerillos ( lujan de cuyo), la cual es única no solo en la provincia, sino que se encuentra entre las mas destacadas del país por los servicios con los que cuenta y el entorno de montaña, rio  y naturaleza andina que la rodea.</p>


				</div>
			</div>
			<!-- service_single ends -->

			<!-- service_single starts -->
			<div class="col-sm-6 service_single">
				<div class="icon_holder">
					<div class="icon_shape">
						<i class="fa fa-group"></i>
					</div>
				</div>
				<div class="service_right">


					<h4>Trabajo en equipo</h4>
					<p>En el agua estaremos atentos ya que las características  aguas “achocolatadas”  del Rio Mendoza harán que todo el equipo este conectado y remando juntos para llevar la balsa neumática a buen destino, sin olvidarnos al llegar de realizar el característico grito de victoria;          Contaremos en todo momento con la atenta vigilancia del kayak de seguridad que seguirá de cerca nuestros movimientos. </p>


				</div>
			</div>
			<!-- service_single ends -->

			<!-- service_single starts -->
			<div class="col-sm-6 service_single">
				<div class="icon_holder">
					<div class="icon_shape">
						<i class="fa fa-bullhorn"></i>
					</div>
				</div>
				<div class="service_right">
					<h4>LIDERAZGO </h4>
					<p>Luego de un ameno momento y una sobremesa procederemos a realizar un trekking de aproximadamente 1 hora de recorrido y Para sacarle el máximo provecho a la majestuosa vista del Cordón del Plata y a al cerro mirador organizaremos una búsqueda del tesoro durante el recorrido, orientada a identificar y potenciar lideres positivos dentro del grupo.</p>

				</div>
			</div>
			<!-- service_single ends -->

			<!-- service_single starts -->
			<div class="col-sm-6 service_single">
				<div class="icon_holder">
					<div class="icon_shape">
						<i class="fa fa-child"></i>
					</div>
				</div>
				<div class="service_right">
					<h4>Confianza personal</h4>
					<p>La ultima actividad que desarrollaremos será un desafío individual nuevo para el descenso vertical desde un cerro de aproximadamente 25 metros en el que sujetos por cuerdas y arneses  enfrentaremos la altura y la adrenalina de confiar en las capacidades personales de cada individuo.</p>

				</div>
			</div>
			<!-- service_single ends -->

		</div>
	</div>
</section>
<!-- sec-services ends -->

<!-- zee_curve_container feed_holder starts -->
<section class="zee_curve_container zee_d_curve_container bottom_grey">
	<div class="zee_d_curve zee_d_curve_bg2">
		<div class="container">
			<!-- zee_curve_left starts -->
			<div class="zee_curve_left">
			</div>
			<!-- zee_curve_left ends -->

			<div class="row">
				<div class="testi_holder">
					<div class=" col-sm-10 span_center align_center">
						<div id="owl-feed">
							<div class="testi_single span_center">
								<div class="avatar">
									<img src="images/luna.png" alt="">
								</div>
								<div class="testi_text">
									<h3>Viví la experiencia del rafting de luna llena.</h3>
									<h5> <span class="highlight">Rio Aventura Mendoza</span></h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- zee_curve_right starts -->
			<div class="zee_curve_right">
			</div>
			<!-- zee_curve_right ends -->
		</div>
	</div>
</section>
<!-- zee_curve_container Feed_holder ends -->

<!-- sec-simple-text starts -->
<section id="sec-simple-text" class="section_holder bg_grey">
	<div class="container section_container">
		<div class="row">
			<!-- simple_text -->
			<div class="col-sm-12">
				<div class="simple_text align_center">
					<div class="col-sm-8 text_holder span_center">
						<h4>NUESTRA BASE DE OPERACIONES</h4>
						<p>Nuestra base, Reconocida y única a nivel nacional esta situada en Ruta Nacional Nº 7 Km 55, Potrerillos, Mendoza Argentina.<br>
							Cuenta con servicios de Resto Exclusivo con variada oferta de platos, 2 Piletas situadas a orillas del Rio Mendoza, Lockers personales, duchas de Agua caliente, Palestra de escalada y todas las comodidades que harán a los pasajeros disfrutar de un combinado de actividades y relax en el marco de los mejores paisajes de la Cordillera de los Andes Mendocina.
						</p>
					</div>
					<div class="image_holder">
						<img src="images/devices_image.jpg" alt="devices image">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- sec-simple-text ends -->

<!-- sec-portfolio starts -->
<section id="sec-portfolio" class="section_holder bg_grey zee_curve_container zee_b_curve_container bottom_grey">
	<div class="container section_container section_curve_container">

		<div class="row">
			<article>
				<div class="hgroup">
					<div class="col-xs-3 heading_cover">
						<h2>Paquetes</h2>
					</div>
					<div class="col-xs-1 skew_holder">
						<div class="skew_shape"></div>
					</div>
					<div class="col-xs-8 heading_cover">
						<!-- work_nav starts -->
						<nav class="work_nav">
							<ul id="filters">
								<li class="current">
									<a data-filter="*" href="#"><i class="fa fa-th-large"></i> Todas</a>
								</li>
								<li>
									<a data-filter=".alta_montana" href="#">Alta montaña</a>
								</li>
								<li>
									<a data-filter=".bodegas" href="#">Bodegas</a>
								</li>
								<li>
									<a data-filter=".convensionales" href="#"> Convensionales </a>
								</li>
								<li>
									<a data-filter=".aventura" href="#">Aventura</a>
								</li>
							</ul>
						</nav>
						<!-- work_nav ends-->
					</div>
				</div>
			</article>
		</div>


		<div class="row">
			<div class="col-sm-12">
				<!-- Porfolio Listing starts -->
				<div class="work_listing" id="container">

					<!-- <div class="work_item isotope-item aventura paquetes info" data-toggle="modal" data-target=".bs-example-modal-lg" data-IdPaquete="1"  data-link="projects/rafting.html" data-id="1">
						<div class="single_work animated" data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeInUp">
							<figure class="view view-second">
								<img src="images/portfolio/rafting.jpg" alt="">
								<div class="mask">
								</div>
							</figure>
						</div>
					</div> -->

					<?php

						$query = "SELECT * FROM paquetes_bikini_tours WHERE habilitado=1";
						$sql = $query;
					    $sth=$bd->prepare($sql);
					    $sth->execute(array()); 


			    		while($datos=$sth->fetch(PDO::FETCH_ASSOC)){			        
			    	?>	

						<div class="work_item isotope-item info <?php echo $datos['filtro']; ?>" data-toggle="modal" data-target=".bs-example-modal-lg" data-IdPaquete="<?php echo $datos['id']; ?>">
							<div class="single_work animated" data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeInUp">
								<figure class="view view-second">
									<img src="<?php echo $datos['mini_img']; ?>" alt="">
									<div class="mask">
									</div>
								</figure>

								<div class="banda-nombre">
									<div class="contenedor-externo">
										  <div class="color-banda">
										  	<div class="tamano-banda">
										  		<div class="contenedor-texto">
													<h3><?php echo $datos['titulo']; ?></h3>
												</div>
										  	</div>
									   </div> 
									</div>		
								</div>
							</div>
						</div>


					<?php  } ?>


				</div>
			</div>
		</div>
		

		<!-- zee_curve_right starts -->
		<div class="zee_curve_right">
		</div>
		<!-- zee_curve_right ends -->

		
		<!-- MODAL INFO -->
		<div class="modal fade bs-example-modal-lg" id="modal_info" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
			    <div class="modal-content" id="relleno">
				    <!-- Contenido por Ajax -->
			    </div>
			</div>
		</div>
		<!-- END MODAL INFO -->

		<!-- MODAL COMPRA -->
    	<div class="modal fade" id="modalCompraWeb" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
	            <div class="modal-content" id="rellenoDeCompra">	                
	                <!-- Llena contenido por Ajax  -->	                
	            </div>  
            </div>                      
        </div>
        <!-- END MODAL COMPRA -->

        <!-- MODAL METODO -->
        <div class="modal fade" id="modalMetodoPagoWeb" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
	            <div class="modal-content" id="rellenoMetodoWeb">              
	                <div class="container-fluid">

	                  <div class="row" style="margin-top: 40px; margin-bottom: 20px;text-align: center;">

	                    <div class="col-xs-12">
	                      <h4 style="font-size: 20px;margin-bottom: 50px;">¿Con qué medio quieres pagar?</h4>
	                    </div>

	                    <div class="col-xs-6">
	                      <button id="mercadopagoImagenWeb" type="button" class="btn btn-primary btn-sm btn-mercado indigo" style="height: 45px;width: 100%;border-radius: 5px;">
	                        <img class="mercad" src="images/mercadopago.png" style="max-height: 28px;margin: 4px auto;">
	                      </button> 
	                    </div>
	                    <div class="col-xs-6">
	                      <div id="paypal-button-web"></div>
	                    </div>

	                  </div>

	                </div>              
	            </div>
	        </div>
        </div>
        <!-- END MODAL METODO -->

	</div>
</section>
<!-- sec-portfolio ends -->

		

		<div id="gisperto">

		</div>

		<!-- zee_curve_container folio_stats starts -->
		<!-- <section class="zee_curve_container zee_d_curve_container bottom_grey"> -->
		<section class="zee_curve_container zee_d_curve_container">
			<div class="zee_d_curve zee_d_curve_bg3">
				<div class="container">
					<!-- zee_curve_left starts -->
					<div class="zee_curve_left">
					</div>
					<!-- zee_curve_left ends -->

					<!-- .folio_stats starts -->
					<div class="folio_stats">
						<div class="row">
							<div class="col-sm-12 curve_heading">
								<h4>Momentos Compartidos</h4>
							</div>

							<div class="col-sm-3">
								<!-- stats_single starts -->
								<div class="stats_single">
									<div class="icon_holder">
										<div class="stats_icon">
											<i class="fa fa-life-buoy"></i>
										</div>
									</div>
									<div class="stats_hgroup">
										<h3 class="countPercentage animated" data-percentageto="12587" data-animdelay="35"><span>9000</span></h3>
										<h4>Excursiones hechas</h4>
									</div>
								</div>
								<!-- stats_single ends -->
							</div>

							<div class="col-sm-3">
								<!-- stats_single starts -->
								<div class="stats_single">
									<div class="icon_holder">
										<div class="stats_icon">
											<i class="fa fa-cutlery"></i>
										</div>
									</div>
									<div class="stats_hgroup">

										<h3 class="countPercentage animated" data-percentageto="2114" data-animdelay="35"><span>1800</span></h3>
										<h4>Asados comidos</h4>
									</div>
								</div>
								<!-- stats_single ends -->
							</div>

							<div class="col-sm-3">
								<!-- stats_single starts -->
								<div class="stats_single">
									<div class="icon_holder">
										<div class="stats_icon">
											<i class="fa fa-circle"></i>
										</div>
									</div>
									<div class="stats_hgroup">
										<h3 class="countPercentage animated" data-percentageto="211" data-animdelay="211"><span>100</span></h3>
										<h4>Rafting de luna llena</h4>
									</div>
								</div>
								<!-- stats_single ends -->
							</div>

							<div class="col-sm-3">
								<!-- stats_single starts -->
								<div class="stats_single">
									<div class="icon_holder">
										<div class="stats_icon">
											<i class="fa fa-sun-o"></i>
										</div>
									</div>
									<div class="stats_hgroup">
										<h3 class="countPercentage animated" data-percentageto="32" data-animdelay="15"><span>3</span></h3>
										<h4>Pool Rafting</h4>
									</div>
								</div>
								<!-- stats_single ends -->
							</div>

						</div>
					</div>
					<!-- .folio_stats ends -->

					<!-- zee_curve_right starts -->
					<div class="zee_curve_right">
					</div>
					<!-- zee_curve_right ends -->
				</div>
			</div>
		</section>
		<!-- zee_curve_container folio_stats ends -->


		<!-- sec-contact starts -->
		<section id="sec-contact" class="section_holder">
			<div class="container section_container">
				<div class="row">
					<article>
						<div class="hgroup">
							<div class="col-xs-3 heading_cover">
								<h2>Contactate con nosotros</h2>
							</div>
							<div class="col-xs-1 skew_holder">
								<div class="skew_shape"></div>
							</div>
							<div class="col-xs-8 heading_cover">
								<h3>No dudes en enviarnos tu consulta!</h3>
							</div>
						</div>
					</article>
				</div>

				<div class="row">
					<!-- contact_info starts -->
					<div class="col-sm-3">
						<div class="contact_info align_center">
							<i class="fa fa-phone"></i>
							<h4 class="contact_title">Teléfono</h4>
							<p class="contact_description">+54 (0261) 429 2299</p>
						</div>
					</div>
					<!-- contact_info ends -->

					<!-- contact_info starts -->
					<div class="col-sm-3">
						<div class="contact_info align_center">
							<i class="fa fa-whatsapp"></i>
							<h4 class="contact_title">Whatsapp</h4>
							<p class="contact_description">+54 9 261 517 4184</p>
						</div>
					</div>
					<!-- contact_info ends -->

					<!-- contact_info starts -->
					<div class="col-sm-3">
						<div class="contact_info align_center">
							<i class="fa fa-map-marker"></i>
							<h4 class="contact_title">Oficina</h4>
							<p class="contact_description">Sarmiento 784, Ciudad,  Mendoza  </p>
						</div>
					</div>
					<!-- contact_info ends -->

					<!-- contact_info starts -->
					<div class="col-sm-3">
						<div class="contact_info align_center">
							<i class="fa fa-envelope-o"></i>
							<h4 class="contact_title">Email</h4>
							<p class="contact_description">Reservas@rioaventuramendoza.com / Turismo@rioaventuramendoza.com</p>
						</div>
					</div>
					<!-- contact_info ends -->

					<!-- <div  class="contact_form animated" data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeInRight">
						<form id="formContacto" novalidate  method="post" action="contacto_action.php">
							<div class="col-sm-6">
								<span class="field_single">
									<input type="text" placeholder="Nombre" value="" name="nombre">
								</span>

								<span class="field_single">
									<input type="email" placeholder="Email" value="" name="email">
								</span>
								<span class="field_single">
									<input type="tel" placeholder="Telefono" value="" name="telefono">
								</span>
							</div>
							<div class="col-sm-6">
								<span class="field_single">
									<textarea placeholder="Consulta" name="consulta"></textarea>
								</span>
								// COMENTAR // <a href="javascript:void(0);" class="button button-arrow">Submit <i class="fa fa-long-arrow-right"></i></a>
								// COMENTAR // <input class="button button-arrow" type="submit" value="Enviar">
								<input type="hidden" value="1" name="enviar">
								<button id="btnEnviarC" type="submit" class="btn btn-primary ladda-button" data-style="expand-right" data-size="l"><span class="ladda-label">Enviar</span></button>
							</div>
						</form>
					</div> -->

					<div class="animated" data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeInRight">
						<form id="formContacti">
							<div class="col-sm-6">
								<span class="field_single">
									<input id="nombrec" type="text" placeholder="Nombre" value="" name="nombre" required>
								</span>

								<span class="field_single">
									<input id="emailc" type="email" placeholder="Email" value="" name="email" required>
								</span>
								<span class="field_single">
									<input id="telc" type="tel" placeholder="Telefono" value="" name="telefono" required>
								</span>
							</div>
							<div class="col-sm-6">
								<span class="field_single">
									<textarea id="msjc" placeholder="Consulta" name="consulta" required></textarea>
								</span>
								<!--<a href="javascript:void(0);" class="button button-arrow">Submit <i class="fa fa-long-arrow-right"></i></a>-->
								<!--<input class="button button-arrow" type="submit" value="Enviar">-->
								<input type="hidden" value="1" name="enviar">
								<!-- <button id="btnEnviarC" type="submit" class="btn btn-primary ladda-button" data-style="expand-right" data-size="l"><span class="ladda-label">Enviar</span></button> -->

								<!-- <button id="submiti" type="submit" class="btn btn-default">ENVIAR</button> -->
								<a id="submiti" class="btn btn-primary">ENVIAR</a>

							</div>
						</form>
					</div>

				</div>
			</div>
		</section>
		<!-- sec-contact ends -->

		<!-- sec-map starts -->
		<section class="sec-map zee_curve_container zee_t_curve_container">

			<div class="container">
				<!-- zee_curve_left starts -->
				<div class="zee_curve_left">
				</div>

				<!-- circle_button -->
				<a class="circle_button circle_button_top toggle_section_button toggle_map_button" href="#map_contact"><i class="fa fa-exchange"></i>Hacé click para ir a la base en potrerillos</a>
				<!-- circle_button -->
			</div>

			<div class="map_mask">
			</div>
			<div id="map_contact" class="google_map">
			</div>

			<div id="mapa2" class="google_map" style="display:none">
				<h3></h3>
			</div>
		</section>
		<!-- sec-map ends -->

		<!-- footer start -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-4">
						<div id="copyright" class="clearfix">
							<p id="ipagelogo">
								<a href="https://ipage.com.ar/" target="_blank"><img src="images/LogoIpage.png" ></a>
							</p>
						</div>
					</div>
					<div class="col-md-12 col-lg-4 no-padd">
						<div id="copyright" class="clearfix">
							<p class="logos-footer">
								<img src="images/logo-huellas-chico.png">
							</p>
							<p class="logos-footer">
								<img src="images/logo-rio.png">
							</p>
							<p class="logos-footer">
								<img src="images/bikini-white.png">
							</p>
						</div>
					</div>
					<div class="col-md-12 col-lg-4">
						<ul class="sm_links align_center">
							<li>
								<a href="//www.facebook.com/pages/Rio-Aventura-Mendoza/454638477957577?fref=ts" target="_blank" class="sm_icon">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="sm_icon">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="sm_icon">
									<i class="fa fa-linkedin"></i>
								</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="sm_icon">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
						</ul>
					</div>

				</div>
			</div>

			<div class="modal modal-carrito fade" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><span class="fa fa-shopping-cart "></span> Carrito</h4>
						</div>
						<div class="modal-body">
							<h3>Items</h3>
							<table class="table table-items table-condensed table-striped">
								<thead>
									<th> <h5>Paquete</h5> </th>
									<th> <h5><span class="fa fa-users"></span> Personas</h5> </th>
									<th> <h5><span class="fa fa-calendar"></span> Fecha</h5> </th>
									<th> <h5><span class="fa fa-bus"></span> Transporte</h5> </th>
									<th> <h5><span class="fa fa-dollar"></span> Precio del transporte</h5> </th>
									<th> <h5><span class="fa fa-dollar"></span> Precio</h5> </th>
									<th> <h5><span class="fa fa-dollar"></span> Subtotal</h5> </th>
									<th> <h5></h5> </th>
								</thead>
								<tbody></tbody>
								<tfoot>
									<th colspan="6" class="label-total"> <h3><span class="fa fa-dollar"></span> Total:</h3> </th>
									<th colspan="2" class="price-total"> 0 </th>
								</tfoot>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Seguir comprando</button>
							<button type="button" class="btn btn-primary procesar-carrito" data-total=""><span class="fa fa-gift"></span> Comprar</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

		</footer>
		<!-- footer end -->

		<!-- Modernizr -->
		<script type='text/javascript' src='js/vendor/modernizr-2.6.2.min.js'></script>

		<!-- Sticky JS file -->
		<script type='text/javascript' src='js/jquery.sticky.js'></script>

		<!-- Navigation Scroll TO JS file -->
		<script type='text/javascript' src='js/jquery.scrollTo.js'></script>
		<script type='text/javascript' src='js/jquery.nav.js'></script>

		<!--  Pretty Photo JS -->
		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>

		<!-- Masonary Isotope -->
		<script type='text/javascript' src='js/jquery.isotope.js'></script>

		<!-- VideoJs JS file HTML WebM and Mp3 Player -->
		<!--<script type='text/javascript' src="js/video.js"></script>-->

		<!-- jQuery Easing -->
		<!--<script type="text/javascript" src="js/jquery.easing.min.js"></script>-->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
		<script src="//cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
		<!-- Responsive Slides -->
		<script type="text/javascript" src="js/responsiveslides.min.js"></script>

		<script src="js/carrito.js" charset="utf-8"></script>
		<!-- Flex slider for team section -->
		<script type="text/javascript" src="js/jquery.flexslider.js"></script>

		<!-- Fit Videos for youtube and vimeo etc -->
		<script type="text/javascript" src="js/jquery.fitvids.js"></script>

		<!-- Google Maps Library -->
		<!-- <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false&amp;language=es"></script> -->
		<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false&amp;language=es&key=AIzaSyCAUq92RoaiwG3l9D4AsCF_IUxRYHsWQOA"></script>
		<script type='text/javascript' src='js/gmap3.js'></script>

		<!-- Animation Jquery -->
		<script src="js/animation.js"></script>

		<!-- Owl Carousel for feature portfolio -->
		<script src="js/owl.carousel.js"></script>

		<!-- Query Loader for images -->
		<script src="js/jquery.queryloader2.js"></script>

		<!-- GreyScale for IE 10 and 11 -->
		<script type='text/javascript' src='js/grayscale_functions.js'></script>
		<script type='text/javascript' src='js/grayscale.js'></script>

		<!-- Main and Project Loading JS files -->
		<script type='text/javascript' src='js/main_home.js'></script>
		<script type='text/javascript' src='js/project_script.js'></script>

		<!-- form scripts -->
		<script type='text/javascript' src='js/vendor/jquery.validate.min.js'></script>
		<script type='text/javascript' src='js/script_mail.js'></script>


		<script type='text/javascript' src='js/jquery-scrollto.js'></script>
		<script type='text/javascript' src='js/gisperto.js'></script>
		<script type='text/javascript' src='js/formValidation.min.js'></script>
		<script src="//oss.maxcdn.com/bootbox/4.2.0/bootbox.min.js"></script>

		<script src="js/spin.min.js"></script>
		<script src="js/ladda.min.js"></script>

		<script type="text/javascript">
		$(document).ready(function(){
			"use strict";

			/* preloaders calling only for home */
			if ( !$.browser.msie ) {
				$("body").queryLoader2({
					barColor: "#444444",
					backgroundColor: "#ffffff",
					percentage: true,
					barHeight: 3,
					completeAnimation: "fade",
					minimumTime: 200
				});
			}else{
				$('#load').hide();
			}

			/* Team Slider with Carausel */
			$('#carousel').flexslider({
				animation: "slide",
				controlNav: false,
				directionNav: false,
				slideshow: true,
				itemWidth: 291,
				itemMargin: 2,
				minItems: 4, // use function to pull in initial value
				maxItems: 4, // use function to pull in initial value
				asNavFor: '#slider'
			});

			$('#slider').flexslider({
				animation: "slide",
				controlNav: false,
				directionNav: false,
				animationLoop: false,
				slideshow: false,
				sync: "#carousel",
				start: function(slider) {
					// stats_bar animation for team member
					$('.flex-active-slide').find('.stats_bar').each(function() {
						var el = $(this);
						var percent = el.data('percent');
						el.animate({width: percent+'%'}, 1000);
					});
				},
				before: function(slider) {
					// stats_bar animation for team member
					$('.flex-active-slide').find('.stats_bar').each(function() {
						var el = $(this);
						var percent = el.data('percent');
						el.animate({width: 0}, 0);
					});

				},
				after: function(slider) {
					// stats_bar animation for team member
					$('.flex-active-slide').find('.stats_bar').each(function() {
						var el = $(this);
						var percent = el.data('percent');
						el.animate({width: percent+'%'}, 1000);
					});
				}
			});

			// This Page Javascript
			/* testimonial slider */
			$("#owl-feed").owlCarousel({
				autoPlay: 3000, //Set AutoPlay to 3 seconds
				items : 1,
				pagination : true,
				paginationNumbers: false,
				stopOnHover: true,
				navigation: false,
				transitionStyle : "goDown",
				itemsDesktop : false,
				itemsDesktopSmall : false,
				itemsTablet: false,
				itemsMobile : false
			});
			/* Featured portfolio caraousel Starts */
			$("#featured-portfolio").owlCarousel({
				autoPlay: 3000,
				items : 5,
				/*itemsDesktop : [1199,4],
				itemsDesktopSmall : [979,3],*/
				itemsCustom : [
					[0, 1],
					[390, 2],
					[768, 3],
					[980, 4],
					[1400, 5]
				],
				navigation : true,
				pagination : false,
				navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			});
			/* Featured portfolio caraousel Ends */

			/* Slider on Blog Posts as Gallery Starts */
			$(".rslides").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 500,
				maxwidth: 800,
				prevText: "",
				nextText: "",
				namespace: "transparent-btns"
			});
			/* Slider on Blog Posts as Gallery Ends */

		});
		</script>

		<!-- style-switcher starts -->


		<!-- style-switcher ends -->

		<!-- Style switcher -->
		<script src="switcher/switcher.js" type="text/javascript"></script>
		<script src="switcher/jquery.cookie.js" type="text/javascript"></script>
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-47741703-1', 'auto');
		ga('send', 'pageview');

		</script>


		<script src="js/bootbox.min.js"></script>
		<script>
			$(document).on("click", ".alerta", function(e) {
				bootbox.dialog({
					title: "This is a form in a modal.",
					message: '<div class="row">  ' +
					'<div class="col-md-12"> ' +
					'<form class="form-horizontal"> ' +
					'<div class="form-group"> ' +
					'<label class="col-md-4 control-label" for="name">Nombre</label> ' +
					'<div class="col-md-4"> ' +
					'<input id="name" name="name" type="text" placeholder="Nombre" class="form-control input-md"> ' +
					'</div> ' +
					'<br><label class="col-md-4 control-label" for="name">Apellido</label> ' +
					'<div class="col-md-4"> ' +
					'<input id="name" name="name" type="text" placeholder="Apellido" class="form-control input-md"> ' +
					'<span class="help-block">Here goes your name</span> </div> ' +
					'</div> ' +
					'<div class="form-group"> ' +
					'<label class="col-md-4 control-label" for="awesomeness">How awesome is this?</label> ' +
					'<div class="col-md-4"> <div class="radio"> <label for="awesomeness-0"> ' +
					'<input type="radio" name="awesomeness" id="awesomeness-0" value="Really awesome" checked="checked"> ' +
					'Really awesome </label> ' +
					'</div><div class="radio"> <label for="awesomeness-1"> ' +
					'<input type="radio" name="awesomeness" id="awesomeness-1" value="Super awesome"> Super awesome </label> ' +
					'</div> ' +
					'</div> </div>' +
					'</form> </div>  </div>',
					buttons: {
						success: {
							label: "Save",
							className: "btn-success",
							callback: function () {
								var name = $('#name').val();
								var answer = $("input[name='awesomeness']:checked").val()
								Example.show("Hello " + name + ". You've chosen <b>" + answer + "</b>");
							}
						}
					}
				});
			});
		</script>



</body>
</html>



<!-- Include bootbox.js -->




<!-- The login modal. Don't display it initially -->
<form id="formCV" method="post" action="cv_action.php" class="form-horizontal" style="display: none;">
	<div class="form-group">
		<label class="col-xs-3 control-label">Nombre</label>
		<div class="col-xs-5">
			<input type="text" class="form-control" name="nombre" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-xs-3 control-label">Apellido</label>
		<div class="col-xs-5">
			<input name="apellido" type="text" class="form-control" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-3 control-label">Email</label>
		<div class="col-xs-5">
			<input name="email" type="email" class="form-control" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-xs-3 control-label">Experiencias laborales</label>
		<div class="col-xs-5">
			<textarea class="form-control" name="experiencias"></textarea>
		</div>
	</div>


	<div class="thumbnail"><img src="" alt="" id="img_upload" width="200" height="200">

		<input type="file" name="foto" id="foto"><br />
		<a id="btn_eliminar" style="cursor:pointer" class="btn btn-light-grey" data-dismiss="fileupload">

			<input type="hidden" name="enviar" value="1" />

			<div class="form-group">
				<div class="col-xs-5 col-xs-offset-3">
					<button id="btnEnviar" type="submit" class="btn btn-primary ladda-button" data-style="expand-right" data-size="l"><span class="ladda-label">Enviar</span></button>
				</div>
			</div>
		</form>

	<script>
		$(document).ready(function() {
			var postData;
			var formURL;
			var l;						$('.modalCarrito').on('click', function() {				$(".modal-carrito").modal("show")			});

			// Login button click handler
			$('.cvboton').on('click', function() {
				bootbox
				.dialog({
					title: '¡Forma parte del equipo de RIOS!',
					message: $('#formCV'),
					show: false // We will show it manually later
				})
				.on('shown.bs.modal', function() {
					$('#formCV')
					.show()                             // Show the login form
					.formValidation('resetForm', true); // Reset form
				})
				.on('hide.bs.modal', function(e) {
					// Bootbox will remove the modal (including the body which contains the login form)
					// after hiding the modal
					// Therefor, we need to backup the form
					$('#formCV').hide().appendTo('body');
				})
				.modal('show');
			});

			$("#formCV").submit(function(e)
			{
				window.onbeforeunload = confirmExit;

				postData = $(this).serializeArray();
				ultimo=postData.length;

				formURL = $(this).attr("action");

				l = Ladda.create($("#btnEnviar").get(0));
				l.start();
				$("#formCV :input").prop("disabled", true);


				if($("#foto").val()!='')
				{
					var foto= $("#foto").get(0);
					var data_foto=foto.files[0];

					var reader = new FileReader();
					reader.readAsDataURL(data_foto);

					reader.onload = function(e) {
						var dataURL = reader.result;
						//alert(dataURL);
						tamanio=foto.files[0].size;
						if(tamanio>586900)
						{
							l.stop();
							bootbox.alert("La foto no puede exceder los 500KiB");
							$("#formCV :input").prop("disabled", false);
							window.onbeforeunload = null;
							return false;
						}

						postData[ultimo]={ name: "foto", value: dataURL };
						ajaxForm();
					}
				}
				else
				{
					ajaxForm();
				}

				e.preventDefault();
			});

			function ajaxForm()
			{
				$.ajax(
					{
						url : formURL,
						type: "POST",
						data : postData,
						dataType: "json",
						success:function(data, textStatus, jqXHR)
						{
							if(data.estado=='ok')
							{
								l.stop();
								bootbox.alert("Enviado correctamente",function(){
									bootbox.hideAll();
									$("#formCV :input").prop("disabled", false);
									window.onbeforeunload = null;
								});
							}
							else
							{
								l.stop();
								bootbox.alert("Error al enviar.");
								$("#formCV :input").prop("disabled", false);
								window.onbeforeunload = null;
							}
						},
						error: function(jqXHR, textStatus, errorThrown)
						{
							l.stop();
							bootbox.alert("Error al enviar.");
							$("#formCV :input").prop("disabled", false);
							window.onbeforeunload = null;
						}
					});
			}

			$("#foto").on("change",function(){
				if($("#foto").val()!="")
				{
					var foto= $("#foto").get(0);
					var data_foto=foto.files[0];

					var reader = new FileReader();
					reader.readAsDataURL(data_foto);

					reader.onload = function(e) {
						var dataURL = reader.result;

						$("#img_upload").attr("src",dataURL);
					}
				}
			});

			$("#btn_eliminar").on("click",function(){
				$("#img_upload").attr("src","");
				$("#foto").val();
			});



			$("#submiti").on('click', function(){

		       	if ($('#nombrec').val()==""||$('#emailc').val()==""||$('#telc').val()==""||$('#msjc').val()==""){
		          alert("Debe completar todos los campos");
		        }
		        else{
		          	$.ajax({
						type: 'POST',
						url: 'phpmailer/pruebam.php',
						data: $('#formContacti').serialize(),
						dataType: 'json',
						success:function(data){
							if(data.estado=='ok'){
								alert("Enviado correctamente!");
							}
							else{
								alert("Error al Enviar");
							}
						}						
					});
		        }

			});

			


			// $("#formContacto").submit(function(e)
			// {
			// 	window.onbeforeunload = confirmExit;

			// 	postData = $(this).serializeArray();
			// 	ultimo=postData.length;

			// 	formURL = $(this).attr("action");

			// 	var l2 = Ladda.create($("#btnEnviarC").get(0));
			// 	l2.start();
			// 	$("#formContacto :input").prop("disabled", true);


			// 	$.ajax(
			// 		{
			// 			url : formURL,
			// 			type: "POST",
			// 			data : postData,
			// 			dataType: "json",
			// 			success:function(data, textStatus, jqXHR)
			// 			{
			// 				if(data.estado=='ok')
			// 				{
			// 					l2.stop();
			// 					bootbox.alert("Enviado correctamente",function(){
			// 						bootbox.hideAll();
			// 						$("#formContacto :input").prop("disabled", false);
			// 						window.onbeforeunload = null;
			// 					});
			// 				}
			// 				else
			// 				{
			// 					l2.stop();
			// 					bootbox.alert("Error al enviar.");
			// 					$("#formContacto :input").prop("disabled", false);
			// 					window.onbeforeunload = null;
			// 				}
			// 			},
			// 			error: function(jqXHR, textStatus, errorThrown)
			// 			{
			// 				l2.stop();
			// 				bootbox.alert("Error al enviar.");
			// 				$("#formContacto :input").prop("disabled", false);
			// 				window.onbeforeunload = null;
			// 			}
			// 		});

			// 		e.preventDefault();
			// 	});

			// 	function confirmExit()
			// 	{
			// 		return "El formulario de contacto se esta enviando. Seguro quieres cerrar la pagina?";
			// 	}
			// });

		});
	</script>


	<script src="js/lightslider.js"></script>
	<script type="text/javascript">
	    $(document).ready(function() {
	        $("#light-slider").lightSlider({
	            item: 1,
	            autoWidth: false,
	            slideMove: 1, // slidemove will be 1 if loop is true
	            slideMargin: 0,


	            // addClass: '',
	            // mode: "slide",
	            mode: "fade",
	            useCSS: true,
	            cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
	            easing: 'linear', //'for jquery animation',////

	            speed: 1500, //ms'
	            auto: true,
	            pauseOnHover: false,
	            loop: true,
	            slideEndAnimation: true,
	            pause: 3000,

	            keyPress: false,
	            controls: true,
	            prevHtml: '',
	            nextHtml: '',

	            rtl:false,
	            adaptiveHeight:false,

	            vertical:false,
	            verticalHeight:500,
	            vThumbWidth:100,

	            thumbItem:10,
	            pager: true,
	            gallery: false,
	            galleryMargin: 5,
	            thumbMargin: 5,
	            currentPagerPosition: 'middle',

	            enableTouch:true,
	            enableDrag:true,
	            freeMove:true,
	            swipeThreshold: 40,

	            responsive : [],

	            onBeforeStart: function (el) {},
	            onSliderLoad: function (el) {},
	            onBeforeSlide: function (el) {},
	            onAfterSlide: function (el) {},
	            onBeforeNextSlide: function (el) {},
	            onBeforePrevSlide: function (el) {}
	        });
	    });
	</script>

	<!-- <script src="admin/assets/plugins/jquery/jquery-2.2.0.min.js"></script> -->
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script type="text/javascript">
	 	(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
	</script>
	<script src="admin/sweetalert-master/dist/sweetalert.min.js"></script>
	<script src="js/script_pagos.js"></script>
	<script src="admin/assets/js/jquery.datetimepicker.full.js"></script>
	<script>
		$('.info').on('click',function(){
          // extraer dato dato de id y almacenar en variable
          var iD = $(this).attr('data-IdPaquete');
          // Enviar esa variable al archivo que va a traer por ajax
          $.get( "projects/modal_info.php",{  iD:iD } , function( data ) {
            $( "#relleno" ).html( data );              
          });
      	});


		$('#modal_info').on('click','.adquirir',function(){
		// $('.adquirir').on('click',function(){
          // extraer dato de id y almacenar en variable
          var iD = $(this).attr('data-IdPaquete');
          var categoria = $(this).attr('data-cat');
          // Enviar esa variable al archivo que va a traer por ajax
          $.get( "projects/modal_compra.php",{  iD:iD,categoria:categoria } , function( data ) {
            $( "#rellenoDeCompra" ).html( data );  
            $('#fecha_paquete_web').datetimepicker({
              format:'d/m/Y',
              minDate: 0,
              timepicker: false,
            });          
            var precioPaquete = $('#precio_paquete').html();
            var cantPersonas = $('#cant_personas').val();
            var precioTransporte = $('#precio_transporte').val()
            $('#subtotal').html(Number(precioTransporte)+Number(precioPaquete)); 
            // $('#total').html(cantPersonas*precioPaquete);
            $('#total').html((cantPersonas*precioTransporte)+(cantPersonas*precioPaquete));  
          });
      	});

      	$('#modalCompraWeb').on('submit', '#form_modalCompraWeb', function(e){
          e.preventDefault();       
          validar_ipage();
      	});


      	$(document).ready(function() {   
			$('#modalCompraWeb').on('input', '#cant_personas', function(){
			    var precioPaquete = $('#precio_paquete').html();
			    var cantPersonas = $('#cant_personas').val();
			    var precioTransporte = $('#precio_transporte').val();
			    var porPersona = parseInt(precioTransporte) + parseInt(precioPaquete);
			    // $('#subtotal').html(porPersona);
			    $('#subtotal').html(Number(precioTransporte)+Number(precioPaquete));
			    $('#total').html((cantPersonas*precioTransporte)+(cantPersonas*precioPaquete));
			});
		    $('#modalCompraWeb').on('change', '#precio_transporte', function(){
			    var precioPaquete = $('#precio_paquete').html();
			    var cantPersonas = $('#cant_personas').val();
			    var precioTransporte = $('#precio_transporte').val();
			    var porPersona = parseInt(precioTransporte) + parseInt(precioPaquete);
			    // $('#subtotal').html(porPersona);
			    $('#subtotal').html(Number(precioTransporte)+Number(precioPaquete));
			    $('#total').html((cantPersonas*precioTransporte)+(cantPersonas*precioPaquete));
			});
		});
	</script>


	