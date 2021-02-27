<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tracking Covid</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Free landing page website template">
	<meta name="author" content="The Develovers">

	<!-- CORE CSS -->
	<link href="{{asset('assets/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	
	<!-- THEME CSS -->
	<link href="{{asset('assets/assets/css/main.css')}}" rel="stylesheet" type="text/css">
	
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CRoboto:300,400,700" rel="stylesheet">
</head>
<body data-spy="scroll">

    <?php
        $datapositif = file_get_contents("https://api.kawalcorona.com/positif");
        $positif = json_decode($datapositif, TRUE);
        $datasembuh = file_get_contents("https://api.kawalcorona.com/sembuh");
        $sembuh = json_decode($datasembuh, TRUE);
        $datameninggal = file_get_contents("https://api.kawalcorona.com/meninggal");
        $meninggal = json_decode($datameninggal, TRUE);
        $dataid = file_get_contents("https://api.kawalcorona.com/indonesia");
        $id = json_decode($dataid, TRUE);
        $dataidprovinsi = file_get_contents("https://api.kawalcorona.com/indonesia/provinsi");
        $idprovinsi = json_decode($dataidprovinsi, TRUE);
        $datadunia= file_get_contents("https://api.kawalcorona.com/");
        $dunia = json_decode($datadunia, TRUE);
    ?>

	<!-- WRAPPER -->
	<div id="wrapper">

		<!-- NAVBAR -->
		<nav id="main-navbar" class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<i class="fa fa-bars"></i>
				</button>
				<a href="#" class="navbar-brand">
          <img src="{{asset('/assets/assets/ico/logo.png')}}" width="48" height="45" alt="">
				</a>
				<div id="main-nav-collapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav nav-onepage">
						<li class="active"><a href="#home">HOME</a></li>
						<li><a href="#livedata">Live Data</a></li>
						<li><a href="#global">Global</a></li>
						<li><a href="#provinsi">Provinsi</a></li>
						<li><a href="#prokes">Prokes</a></li>
						<li><a href="#contact">CONTACT</a></li>
					</ul>
				</div>
				
			</div>
		</nav>
		<!-- END NAVBAR -->

		<!-- HERO SECTION -->
		<section id="home" class="hero-unit-fullscreen parallax-window" data-parallax="scroll" data-image-src="{{asset('assets/assets/img/bg.png')}}">
			<div class="overlay"></div>
			<div class="container">
				<div class="hero-content">
					<h1 class="hero-heading">Tracking Covid</h1>
					<p class="lead">Tetap waspada, kendalikan virus, selamatkan banyak nyawa <br> Patuhi selalu protokol kesehatan yang ada!</p>
				</div>
			</div>
		</section>
		<!-- END HERO SECTION -->

		<!-- livedata -->
		<section id="livedata">
			<div class="container">
				<div class="section-heading">
					<h2 class="heading">Coronavirus Global & Indonesia Live Data</h2>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="icon-info icon-info-center">
						<img src="https://img.icons8.com/emoji/100/000000/weary-face.png"/>
							<h3 class="title">Positif</h3>
							<h2 class="mb-0 number-font"><?php echo $positif['value'] ?></h2>
							<p class="text-white mb-0">ORANG</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="icon-info icon-info-center">
							<img src="https://img.icons8.com/emoji/100/000000/slightly-smiling-face.png"/>							
							<h3 class="title">Sembuh</h3>
							<h2 class="mb-0 number-font"><?php echo $sembuh['value'] ?></h2>
							<p class="text-white mb-0">ORANG</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="icon-info icon-info-center">
							<img src="https://img.icons8.com/emoji/100/000000/loudly-crying-face.png"/>
							<h3 class="title">Meninggal</h3>
							<h2 class="mb-0 number-font"><?php echo $meninggal['value'] ?></h2>
							<p class="text-white mb-0">ORANG</p>
						</div>
					</div>
				</div>
					<div class="col-md-12">
						<div class="icon-info icon-info-center">
						<img src="https://img.icons8.com/emoji/100/000000/indonesia-emoji.png"/>
							<h3 class="title">Indonesia</h3>
							<h2 class="mb-0 number-font"><?php echo $positif['value'] ?> POSITIF, &nbsp&nbsp <?php echo $sembuh['value'] ?> SEMBUH, &nbsp&nbsp<?php echo $meninggal['value'] ?> MENINGGAL</h2>
						</div>
					</div>
			</div>
		</section>
		<!-- END livedata -->

		<!-- global -->
		<section id="global">
			<div class="container">
				<div class="section-heading">
					<h2 class="heading">Kasus Coronavirus Global</h2>
				</div>
                         <div style="height:600px;overflow:auto;margin-right:15px;">
                                 <table class="table table-striped"  fixed-header  >
                                 <thead>
                                     <tr>
                                     <th scope="col">No</th>
                                     <th scope="col">Negara</th>
                                     <th scope="col">Positif</th>
                                     <th scope="col">Sembuh</th>
                                     <th scope="col">Meninggal</th>
                                     </tr>
                                 </thead>
                                 <tbody>
             
                                 @php
                                     $no = 1;    
                                 @endphp
                                 <?php
                                     for ($i= 0; $i <= 23; $i++){
             
                                     
                                     ?>
                                 <tr>
                                     <td> <?php echo $i+1 ?></td>
                                     <td> <?php echo $dunia[$i]['attributes']['Country_Region'] ?></td>
                                     <td> <?php echo $dunia[$i]['attributes']['Confirmed'] ?></td>
                                     <td><?php echo $dunia[$i]['attributes']['Recovered']?></td>
                                     <td><?php echo $dunia[$i]['attributes']['Deaths']?></td>
                                 </tr>
                                     <?php 
                                 
                                 } ?>
                                 </tbody>
                                 </table>
                     </div>
			</div>
		</section>
		<!-- END global -->

		<!-- provinsi -->
		<section id="provinsi">
			<div class="container">
				<div class="section-heading">
					<h2 class="heading">Kasus Coronavirus provinsi</h2>
				</div>
                <div style="height:600px;overflow:auto;margin-right:15px;">
                        <table class="table table-striped"  fixed-header  >
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Negara</th>
                            <th scope="col">Positif</th>
                            <th scope="col">Sembuh</th>
                            <th scope="col">Meninggal</th>
                            </tr>
                        </thead>
						<tbody>

						@php
							$no = 1;    
						@endphp
						<?php
							for ($i= 0; $i <= 23; $i++){
							
							?>
						<tr>
							<td> <?php echo $i+1 ?></td>
							<td> <?php echo $idprovinsi[$i]['attributes']['Provinsi'] ?></td>
							<td> <?php echo $idprovinsi[$i]['attributes']['Kasus_Posi'] ?></td>
							<td> <?php echo $idprovinsi[$i]['attributes']['Kasus_Semb'] ?></td>
							<td> <?php echo $idprovinsi[$i]['attributes']['Kasus_Meni'] ?></td>
						</tr>
							<?php 
						
						} ?>
						</tbody>
                    	</table>
                </div>
			</div>
		</section>
		<!-- END provinsi -->

				
  <!-- Global -->
  <section id="counts_global">
            <div class="container">
              <div class="section-title">
                <h2>Global</h2>
                <p>Data kasus Covid-19 Global</p>
              </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card-body">
                          <div style="height:600px;overflow:auto;margin-right:15px;">
                            <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <thead class="card-header text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Negara</th>
                                            <th>Positif</th>
                                            <th>Sembuh</th>
                                            <th>Meninggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach ($dunia as $data)
                                            <tr>
                                            <td> {{$no++}}</td>
                                            <td> {{ $data['attributes']['Country_Region']}} </td>
                                            <td> {{$data['attributes']['Confirmed']}} </td>
                                            <td> {{$data['attributes']['Recovered']}} </td>
                                            <td> {{$data['attributes']['Deaths']}} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
  <!-- End Global -->

		<!-- prokes -->
		<section id="prokes">
			<div class="container">
				<div class="section-heading">
					<h2 class="heading">Protokol kesehatan Covid-19</h2>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="icon-info icon-info-center">
						<img src="https://img.icons8.com/doodle/100/000000/social-distancing.png"/>
							<p class="text-white mb-0">Menjaga jarak / Social distancing</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="icon-info icon-info-center">
						<img src="https://img.icons8.com/clouds/100/000000/protection-mask.png"/>	
							<p class="text-white mb-0">Selalu gunakan masker</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="icon-info icon-info-center">
						<img src="https://img.icons8.com/doodle/100/000000/wash-your-hands.png"/>
							<p class="text-white mb-0">Mencuci tangan dengan sabun pada air yang mengalir</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="icon-info icon-info-center">
						<img src="https://img.icons8.com/fluent/100/000000/soap-dispenser.png"/>
							<p class="text-white mb-0">Menggunakan handsanitizer</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="icon-info icon-info-center">
						<img src="{{asset('assets/assets/img/nocrowd.png')}}" width="<" height="<">
							<p class="text-white mb-0">Hindari kerumunan</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="icon-info icon-info-center">
						<img src="{{asset('assets/assets/img/hand.png')}}" width="100" height="100">
							<p class="text-white mb-0">Hindari kontak fisik / Berjabat tangan</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- END prokes -->

		<!-- CONTACT -->
		<section id="contact">
			<div class="container">
				<div class="section-heading">
					<h2 class="heading">CONTACT</h2>
				</div>
				<div class="row">
					<div class="col-md-4">
						<p>
							<strong><i class="icon icon_pin_alt"></i> ADDRESS</strong>
							<br>
							<span>12345 North Main Street <br> New York 123456</span>
						</p>
						<br>
						<p>
							<strong><i class="icon icon_phone"></i> PHONE</strong>
							<br>
							<span>Phone 1: 1-(558) 968-0400 (Quotation)</span>
							<br>
							<span>Phone 2: 1-(558) 968-1234 (General Inquiries)</span>
						</p>
						<br>
						<p>
							<strong><i class="icon icon_mail"></i> EMAIL</strong>
							<br>
							<span>Email  : <a href="mailto:hello@yourdomain.com">hello@yourdomain.com</a></span>
						</p>
					</div>
					<div class="col-md-8">
						<form id="contact-form" class="form-horizontal form-minimal">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="contact-name" class="control-label sr-only">Name</label>
										<input type="text" class="form-control" id="contact-name" placeholder="Name (required)" required>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="contact-email" class="control-label sr-only">Email</label>
										<input type="email" class="form-control" id="contact-email" placeholder="Email (required)" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="contact-subject" class="control-label sr-only">Subject</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="contact-subject" placeholder="Subject (optional)">
								</div>
							</div>
							<div class="form-group">
								<label for="contact-message" class="control-label sr-only">Message</label>
								<div class="col-sm-12">
									<textarea class="form-control" id="contact-message" name="contact-message" rows="5" cols="30" placeholder="Message (required)" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary">Submit Message</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- END CONTACT -->

		<!-- FOOTER -->
		<footer class="footer-minimal">
			<div class="container">
				<nav>
					<ul class="list-unstyled list-inline margin-bottom-30px">
						<li><a href="#">About</a></li>
						<li><a href="#">Help</a></li>
					</ul>
				</nav>
				<ul class="list-inline social-icons social-icons-circle">
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-rss"></i></a></li>
					<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
				</ul>
				<p class="copyright-text">Designed &amp; Crafted by <a href="https://www.themeineed.com/" target="_blank">The Develovers</a></p>
			</div>
		</footer>
		<!-- END FOOTER -->
	</div>
	<!-- END WRAPPER -->

	<!-- JAVASCRIPT -->
	<script src="{{asset('assets/assets/js/jquery-2.1.1.min.js')}}"></script>
	<script src="{{asset('assets/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/assets/js/plugins/scrolling/jquery.scrollTo-1.4.3.1-min.js')}}"></script>
	<script src="{{asset('assets/assets/js/plugins/scrolling/jquery.localscroll-1.2.7-min.js')}}"></script>
	<script src="{{asset('assets/assets/js/plugins/parallax/parallax.min.js')}}"></script>
	<script src="{{asset('assets/assets/js/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets/assets/js/landee.js')}}"></script>
	
</body>

</html>