<!-- @extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        {{ __('Anda Berhasil Login Sebagai ') }} <b>{{ Auth::user()->name }}</b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tracking Covid</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="#">Tracking Covid</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="{{asset('assets/img/logo.png')}}" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#hero">Home</a></li>
          <li class="drop-down"><a href="#">Data Covid-19</a>
            <ul>
              <li><a href="#counts_indo">Data Covid Indonesia</a></li>
              <li><a href="#counts_global">Data Covid Global</a></li>
            </ul>
          </li>
          <li><a href="#covid">About</a></li>
          <li><a href="#prokes">Prokes</a></li>
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <!-- <a href="#" class="get-started-btn">Login</a> -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Tracking Covid</span></h2>
              <p class="animate__animated animate__fadeInUp">Tetap waspada, kendalikan virus, dan selamatkan banyak nyawa. <br>Patuhi selalu protokol kesehatan yang ada!</p>
            </div>
          </div>
        </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
<br><br><br><br>
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">
              <div class="section-title">
                <h2>Live Data</h2>
                <p>Data kasus Covid-19</p>
              </div>
        <div class="row no-gutters">

          <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-sad"></i>
              <span data-toggle="counter-up">{{$positif}}</span>
              <p><strong>Positif</strong></p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-simple-smile"></i>
              <span data-toggle="counter-up">{{$sembuh}}</span>
              <p><strong>Sembuh</strong></p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-crying"></i>
              <span data-toggle="counter-up">{{$meninggal}}</span>
              <p><strong>Meninggal</strong> </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

  <!-- Indonesia -->
  <section id="counts_indo">
            <div class="container">
              <div class="section-title">
                <h2>Indonesia</h2>
                <p>Data kasus Covid-19 Indonesia</p>
              </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="table-responsive">
                              <div class="box1">
                                <table class="table table-bordered">
                                    <thead class="card-header text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Provinsi</th>
                                            <th>Positif</th>
                                            <th>Sembuh</th>
                                            <th>Meninggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach ($output as $data)
                                            <tr>
                                                <td align="center">{{ $no++ }}</td>
                                                <td align="center">{{ $data->nama_provinsi}}</td>
                                                <td align="center">{{ $data->jumlah_positif }}</td>
                                                <td align="center">{{ $data->jumlah_sembuh }}</td>
                                                <td align="center">{{ $data->jumlah_meninggal }}</td>
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
  <!-- End Indonesia -->

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

    <!-- ======= About Section ======= -->
    <section id="covid" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <p>Covid-19</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              COVID-19 (coronavirus disease 2019) adalah penyakit yang disebabkan oleh jenis coronavirus baru yaitu Sars-CoV-2, yang dilaporkan pertama kali di Wuhan Tiongkok pada tanggal 31 Desember 2019.
            </p>
            <p>Untuk orang yang terindikasi virus Corona akan mengalami gejala seperti :</p>
            <ul>
              <li><i class="ri-check-double-line"></i> Batuk</li>
              <li><i class="ri-check-double-line"></i> Flu</li>
              <li><i class="ri-check-double-line"></i> Sakit tenggorokan</li>
              <li><i class="ri-check-double-line"></i> Sesak napas</li>
              <li><i class="ri-check-double-line"></i> Lesu dan letih</li>
              <li><i class="ri-check-double-line"></i> Bahkan pada beberapa kasus pasien akan mengalami pneumonia atau masalah pada paru-paru.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
              <img src="{{asset('assets/img/slide/ilus.png')}}" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->
<br>

    <!-- ======= Services Section ======= -->
    <section id="prokes" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Prokes</h2>
          <p>Protokol kesehatan</p>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
              <img src="{{asset('assets/img/prokes/masker.png')}}" class="img-fluid" alt="">
              </div>
              <h4><a href="">Memakai masker</a></h4>
              <p>Selalu menggunakan masker jika keluar rumah</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
              <img src="{{asset('assets/img/prokes/sd.png')}}" class="img-fluid" alt="">
              </div>
              <h4><a href="">Social Distancing</a></h4>
              <p>Jaga jarak dengan orang lain sejauh 6 langkah atau 2 meter</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
              <img src="{{asset('assets/img/prokes/washhand.png')}}" class="img-fluid" alt="">
              </div>
              <h4><a href="">Mencuci tangan</a></h4>
              <p>Terapkan kebersihan dari mencuci tangan memakai sabun dengan air yang mengalir, terutama setelah mengerjakan sesuatu serta mencuci tangan sebelum dan sesudah makan.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
              <img src="{{asset('assets/img/prokes/handsanitizer.png')}}" class="img-fluid" alt="">
              </div>
              <h4><a href="">Memakai Handsanitizer</a></h4>
              <p>Selalu bawa dan gunakan handsanitizer</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
              <img src="{{asset('assets/img/prokes/kerumun.png')}}" class="img-fluid" alt="">
              </div>
              <h4><a href="">Hindari Kerumunan</a></h4>
              <p>Hindari berkumpul dengan banyak orang, dan terapkan selalu social distancing</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
              <img src="{{asset('assets/img/prokes/jabatangan.png')}}" class="img-fluid" alt="">
              </div>
              <h4><a href="">Hindari Kontak fisik</a></h4>
              <p>Dalam keadaan pandemi seperti ini usahakan untuk tidak melakukan kontak fisik salah satunya berjabat tangan agar mencegah penyebaran virus</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
              <img src="{{asset('assets/img/prokes/csuhu.png')}}" class="img-fluid" alt="">
              </div>
              <h4><a href="">Mengecek Suhu Tubuh</a></h4>
              <p>Lakukan pemeriksaan suhu tubuh setidaknya 2x sehari</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
              <img src="{{asset('assets/img/prokes/stayhome.png')}}" class="img-fluid" alt="">
              </div>
              <h4><a href="">Stay at Home</a></h4>
              <p>Tetap berdiam diri jika tidak ada keperluan yang penting agar dapat mencegah rantai penyebaran virus covid-19</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->



    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Check our Team</p>
        </div>

        <div class="row">
        <div class="col-xl-2 col-lg-5 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="{{asset('assets/img/team/team-1.jpg')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <span>Hadi</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-lg-5 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="{{asset('assets/img/team/team-1.jpg')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <span>Lukman</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-lg-5 col-md-6" data-wow-delay="0.2s">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <img src="{{asset('assets/img/team/team-3.jpg')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <span>M. Fadlan</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-xl-2 col-lg-5 col-md-6" data-wow-delay="0.2s">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <img src="{{asset('assets/img/team/team-3.jpg')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <span>Puput</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-lg-5 col-md-6" data-wow-delay="0.3s">
            <div class="member" data-aos="zoom-in" data-aos-delay="400">
              <img src="{{asset('assets/img/team/team-4.jpg')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <span>Raiza</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> -->
    <!-- End Team Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <!-- <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Apa indikasi seseorang terkena virus COVID 19?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Untuk orang yang terindikasi virus Corona akan mengalami gejala seperti batuk, flu, sakit tenggorokan, sesak napas, lesu dan letih bahkan pada beberapa kasus pasien akan mengalami pneumonia atau masalah pada paru-paru.
            </p>
          </div>
        </div> -->
        <!-- End F.A.Q Item-->
<!-- 
        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Apa yang dimaksud dengan kampanye 3M COVID-19?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Kampanye 3M : Memakai Masker, Menjaga Jarak Aman, dan Mencuci Tangan, merupakan satu paket protokol kesehatan yang sangat diperlukan oleh masyarakat untuk mencegah penularan COVID-19. Himbauan ini perlu dipatuhi dan dijalankan secara disiplin, mengingat langkah ini adalah rekomendasi dari para ahli dan dokter.
            </p>
          </div>
        </div> -->
        <!-- End F.A.Q Item-->
<!-- 
        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Apakah virus COVID-19 dapat menyebar lewat udara?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Hingga artikel ini diterbitkan, dalam situs resminya WHO menyebut bahwa virus Corona umumnya hanya menular melalui kontak dengan droplet dari saluran pernapasan orang yang terinfeksi, bukan melalui udara.
            </p>
          </div>
        </div> -->
        <!-- End F.A.Q Item-->
<!-- 
        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Mengapa kita harus memakai masker ketika keluar rumah saat pandemi COVID-19?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Menggunakan masker pada saat pandemi COVID-19 merupakan hal yang wajib dipakai terutama ketika bepergian keluar rumah. Masker menjadi hal yang esensial karena mampu menangkal virus ataupun bakteri yang akan masuk ke mulut ataupun hidung seseorang.
            </p>
          </div>
        </div> -->
        <!-- End F.A.Q Item-->

        <!-- <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="500">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Organ tubuh apa saja yang bisa diserang oleh virus COVID-19?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Virus yang menyebabkan Covid-19 atau SARS-CoV-2 akan menyerang seluruh bagian paru-paru orang yang tertular.
            </p>
          </div>
        </div> -->
        <!-- End F.A.Q Item-->

      </div>
    </section>
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div class="row">

          <div class="col-lg-6  ">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>SMK Assalaam Bandung</h3>
                  <p>Jalan Situ Tarate Jl. Cibaduyut Raya, Cangkuang Kulon, Kec. Dayeuhkolot, Kota Bandung, Jawa Barat 40265</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@smkassalaambandung.sch.id</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>022 5420-220</p>
                </div>
              </div>
            </div>

          </div>

            <div class="col-lg-4">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31682.610660871127!2d107.6138842334961!3d-6.9707735451389325!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x658cc60fbe5017b9!2sSMK%20Assalaam%20Bandung!5e0!3m2!1sid!2sid!4v1613442138711!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>2021</span></strong>.
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/Tracking Covid-responsive-bootstrap-template/ -->
        Designed by <a href="">R</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

    <script>
    $(document).ready(function(){
    $('#datatable').DataTable();
    });
    </script>

</body>

</html>