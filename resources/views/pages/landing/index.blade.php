@php
use App\Helpers\Utils;
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kretek Asli</title>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon.png') }}">
    <link rel="yandex-tableau-widget" href="{{ asset('img/favicon.png') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('landing/images/favicons/mstile-144x144.png')}}">
    <meta name="msapplication-config" content="{{asset('landing/images/favicons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('landing/css/main.css')}}">
    {{-- Date CSS --}}
    <link href="{{ asset('assets/vendor/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/flatpickr/material_blue.css') }}" rel="stylesheet">
    {{-- Noty --}}
    <link href="{{ asset('assets/vendor/noty/noty.css') }}" rel="stylesheet">
    <style>
      html {
        scroll-behavior: smooth;
      }
    </style>
    <script>
      var base_url = "{{ url('').'/' }}"
    </script>
  </head>
  <body class="webpage">
    <div class="wrap animsition" data-animsition-in-class="fade-in" data-animsition-in-duration="1000" data-animsition-out-class="fade-out" data-animsition-out-duration="800">
      <header class="header">
        <div class="header-cnt">
          <div class="header-logo"><span class="header-logo-main"><img src="{{ asset('img/logo.png') }}" width="120" alt=""></span><span class="header-logo-small"></span></div>
          <div class="container">
            <div class="header-inner js-header-inner">
              <div class="header-top">
                <nav class="header-nav">
                  <ul class="header-nav-list">
                    <li class="nav-item active"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#keunggulan">Keunggulan Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#artikel">Artikel Terkini</a></li>
                    <li class="nav-item"><a class="nav-link" href="#hubungi">Hubungi Kami</a></li>
                  </ul>
                </nav>
              </div>
              <div class="header-bottom">
                <ul class="header-social">
                  <li class="header-social__item"><a class="header-social__link" href="http://facebook.com/kretekbandung">
                      <svg width="20" height="19" viewbox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.968 9.55518C19.968 4.48154 15.4975 0.367676 9.98399 0.367676C4.47051 0.367676 0 4.48154 0 9.55518C0 14.1407 3.6504 17.9416 8.42399 18.6315V12.2118H5.88832V9.55518H8.42399V7.53105C8.42399 5.22885 9.9149 3.95613 12.1952 3.95613C13.2876 3.95613 14.4304 4.13578 14.4304 4.13578V6.39697H13.1708C11.9313 6.39697 11.5435 7.1049 11.5435 7.83252V9.55518H14.3123L13.8702 12.2118H11.544V18.6323C16.3176 17.9429 19.968 14.142 19.968 9.55518V9.55518Z" fill="white"></path>
                      </svg></a></li>
                  <li class="header-social__item"><a class="header-social__link" href="https://www.tiktok.com/@kretekbandung">
                    <svg width="20" height="18" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 0 1-5.201 1.743l-.002-.001.002.001a2.895 2.895 0 0 1 3.183-4.51v-3.5a6.329 6.329 0 0 0-5.394 10.692 6.33 6.33 0 0 0 10.857-4.424V8.687a8.182 8.182 0 0 0 4.773 1.526V6.79a4.831 4.831 0 0 1-1.003-.104z"/>
                    </svg>    
                  </a></li>
                  <li class="header-social__item"><a class="header-social__link" href="https://www.instagram.com/kretekasli_bandung">
                      <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.4703 16.0418C14.5202 16.0389 15.5262 15.6538 16.2685 14.9707C17.0109 14.2875 17.4294 13.3618 17.4325 12.3957V5.1043C17.4294 4.13818 17.0109 3.21246 16.2685 2.52931C15.5262 1.84616 14.5202 1.46109 13.4703 1.4582H5.5468C4.49693 1.46109 3.49095 1.84616 2.74858 2.52931C2.0062 3.21246 1.58775 4.13818 1.58462 5.1043V12.3957C1.58775 13.3618 2.0062 14.2875 2.74858 14.9707C3.49095 15.6538 4.49693 16.0389 5.5468 16.0418H13.4703ZM13.4703 17.5H5.5468C2.496 17.5 0 15.2031 0 12.3957V5.1043C0 2.29688 2.496 0 5.5468 0H13.4703C16.5211 0 19.0171 2.29688 19.0171 5.1043V12.3957C19.0171 15.2031 16.5211 17.5 13.4703 17.5Z" fill="white"></path>
                        <path d="M14.6589 12.3955C14.4238 12.3955 14.194 12.4597 13.9985 12.5798C13.8031 12.7 13.6507 12.8708 13.5608 13.0707C13.4708 13.2706 13.4473 13.4905 13.4931 13.7026C13.539 13.9148 13.6522 14.1097 13.8184 14.2627C13.9847 14.4156 14.1964 14.5198 14.427 14.562C14.6576 14.6042 14.8965 14.5825 15.1137 14.4998C15.3309 14.417 15.5165 14.2768 15.6471 14.0969C15.7777 13.917 15.8474 13.7056 15.8474 13.4893C15.8478 13.3455 15.8173 13.2032 15.7577 13.0703C15.698 12.9375 15.6105 12.8168 15.5001 12.7152C15.3896 12.6135 15.2585 12.533 15.1141 12.4781C14.9698 12.4233 14.8151 12.3952 14.6589 12.3955ZM9.50855 11.6666C10.1355 11.6666 10.7483 11.4955 11.2695 11.175C11.7908 10.8545 12.197 10.399 12.4369 9.86601C12.6768 9.33304 12.7396 8.74657 12.6173 8.18077C12.495 7.61496 12.1931 7.09524 11.7498 6.68732C11.3066 6.2794 10.7418 6.0016 10.1269 5.88905C9.51207 5.77651 8.87476 5.83427 8.29558 6.05504C7.7164 6.2758 7.22136 6.64965 6.87308 7.12932C6.52479 7.60898 6.33889 8.17292 6.33889 8.7498C6.33979 9.52313 6.67403 10.2646 7.26826 10.8114C7.86249 11.3582 8.66818 11.6658 9.50855 11.6666ZM9.50855 13.1248C8.56824 13.1248 7.64905 12.8682 6.86722 12.3875C6.08538 11.9068 5.47601 11.2235 5.11617 10.424C4.75633 9.62462 4.66218 8.74495 4.84563 7.89628C5.02907 7.04762 5.48187 6.26807 6.14677 5.65621C6.81167 5.04436 7.6588 4.62768 8.58104 4.45887C9.50328 4.29006 10.4592 4.3767 11.3279 4.70783C12.1967 5.03896 12.9392 5.59972 13.4616 6.31918C13.984 7.03865 14.2628 7.88451 14.2628 8.7498C14.2628 9.91013 13.7619 11.0229 12.8703 11.8434C11.9787 12.6639 10.7695 13.1248 9.50855 13.1248Z" fill="white"></path>
                      </svg></a></li>
                </ul>
                <div class="header-contacts"><a class="header-contacts__link" href="tel:+23254523235">+2 325 452 32 35</a>
                  <p class="header-contacts__copyright">© Rifki Pratama Oktavian</p>
                </div>
              </div>
            </div>
          </div>
          <div class="header-phone">
            <ul class="header-social">
              <li class="header-social__item"><a class="header-social__link" href="http://facebook.com/kretekbandung">
                  <svg width="20" height="19" viewbox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.968 9.55518C19.968 4.48154 15.4975 0.367676 9.98399 0.367676C4.47051 0.367676 0 4.48154 0 9.55518C0 14.1407 3.6504 17.9416 8.42399 18.6315V12.2118H5.88832V9.55518H8.42399V7.53105C8.42399 5.22885 9.9149 3.95613 12.1952 3.95613C13.2876 3.95613 14.4304 4.13578 14.4304 4.13578V6.39697H13.1708C11.9313 6.39697 11.5435 7.1049 11.5435 7.83252V9.55518H14.3123L13.8702 12.2118H11.544V18.6323C16.3176 17.9429 19.968 14.142 19.968 9.55518V9.55518Z" fill="white"></path>
                  </svg></a></li>
              <li class="header-social__item"><a class="header-social__link" href="https://www.tiktok.com/@kretekbandung">
                  <svg fill="#000000" width="20" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"><path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 0 1-5.201 1.743l-.002-.001.002.001a2.895 2.895 0 0 1 3.183-4.51v-3.5a6.329 6.329 0 0 0-5.394 10.692 6.33 6.33 0 0 0 10.857-4.424V8.687a8.182 8.182 0 0 0 4.773 1.526V6.79a4.831 4.831 0 0 1-1.003-.104z"/></svg>    
                  </a></li>
              <li class="header-social__item"><a class="header-social__link" href="https://www.instagram.com/kretekasli_bandung">
                  <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.4703 16.0418C14.5202 16.0389 15.5262 15.6538 16.2685 14.9707C17.0109 14.2875 17.4294 13.3618 17.4325 12.3957V5.1043C17.4294 4.13818 17.0109 3.21246 16.2685 2.52931C15.5262 1.84616 14.5202 1.46109 13.4703 1.4582H5.5468C4.49693 1.46109 3.49095 1.84616 2.74858 2.52931C2.0062 3.21246 1.58775 4.13818 1.58462 5.1043V12.3957C1.58775 13.3618 2.0062 14.2875 2.74858 14.9707C3.49095 15.6538 4.49693 16.0389 5.5468 16.0418H13.4703ZM13.4703 17.5H5.5468C2.496 17.5 0 15.2031 0 12.3957V5.1043C0 2.29688 2.496 0 5.5468 0H13.4703C16.5211 0 19.0171 2.29688 19.0171 5.1043V12.3957C19.0171 15.2031 16.5211 17.5 13.4703 17.5Z" fill="white"></path>
                    <path d="M14.6589 12.3955C14.4238 12.3955 14.194 12.4597 13.9985 12.5798C13.8031 12.7 13.6507 12.8708 13.5608 13.0707C13.4708 13.2706 13.4473 13.4905 13.4931 13.7026C13.539 13.9148 13.6522 14.1097 13.8184 14.2627C13.9847 14.4156 14.1964 14.5198 14.427 14.562C14.6576 14.6042 14.8965 14.5825 15.1137 14.4998C15.3309 14.417 15.5165 14.2768 15.6471 14.0969C15.7777 13.917 15.8474 13.7056 15.8474 13.4893C15.8478 13.3455 15.8173 13.2032 15.7577 13.0703C15.698 12.9375 15.6105 12.8168 15.5001 12.7152C15.3896 12.6135 15.2585 12.533 15.1141 12.4781C14.9698 12.4233 14.8151 12.3952 14.6589 12.3955ZM9.50855 11.6666C10.1355 11.6666 10.7483 11.4955 11.2695 11.175C11.7908 10.8545 12.197 10.399 12.4369 9.86601C12.6768 9.33304 12.7396 8.74657 12.6173 8.18077C12.495 7.61496 12.1931 7.09524 11.7498 6.68732C11.3066 6.2794 10.7418 6.0016 10.1269 5.88905C9.51207 5.77651 8.87476 5.83427 8.29558 6.05504C7.7164 6.2758 7.22136 6.64965 6.87308 7.12932C6.52479 7.60898 6.33889 8.17292 6.33889 8.7498C6.33979 9.52313 6.67403 10.2646 7.26826 10.8114C7.86249 11.3582 8.66818 11.6658 9.50855 11.6666ZM9.50855 13.1248C8.56824 13.1248 7.64905 12.8682 6.86722 12.3875C6.08538 11.9068 5.47601 11.2235 5.11617 10.424C4.75633 9.62462 4.66218 8.74495 4.84563 7.89628C5.02907 7.04762 5.48187 6.26807 6.14677 5.65621C6.81167 5.04436 7.6588 4.62768 8.58104 4.45887C9.50328 4.29006 10.4592 4.3767 11.3279 4.70783C12.1967 5.03896 12.9392 5.59972 13.4616 6.31918C13.984 7.03865 14.2628 7.88451 14.2628 8.7498C14.2628 9.91013 13.7619 11.0229 12.8703 11.8434C11.9787 12.6639 10.7695 13.1248 9.50855 13.1248Z" fill="white"></path>
                  </svg></a></li>
            </ul><a class="header-phone__link" href="tel:+628988789898">+628988789898</a>
          </div>
          <div class="header-burger js-header-burger">
            <div class="header-burger-inner"><span class="header-burger-line"></span><span class="header-burger-line"></span><span class="header-burger-line"></span></div>
          </div>
        </div>
      </header>
      <main class="main">
        <section class="hero" id="beranda">
          <div class="hero-bg js-hero" style="background-image: url({{ asset('img/kretek1.jpg') }}); filter: brightness(50%);"></div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-6 offset-xl-6 aos-init aos-animate" data-aos="fade">
                <div class="hero-cnt">
                  <h1 class="hero-title"><span>KRETEK ASLI</span>  BANDUNG</h1>
                  <div class="hero-items">
                    {{-- <div class="hero-btns"> <a class="hero-btn popup-youtube" href="https://www.youtube.com/shorts/TmkzF5Nsw5k"><i class="svg-image-play"></i></a></div> --}}
                    <div class="hero-descr">Temukan solusi masalah tulang otot dan sendi terbaik di Bandung hanya di klinik kami, yang telah dipercaya oleh ribuan pasien</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="section create" id="keunggulan">
          <div class="container">
            <div class="create-items row">
              <div class="col-xl-6 create-item aos-init aos-animate" data-aos="fade"> 
                <div class="title-wrap">
                  <h2 class="title js-title">Keunggulan Kretek Bandung</h2>
                  <div class="title-line js-title-line"></div>
                </div>
                <div class="create-item__descr">Kretek Bandung ini menjadi salah satu tempat yang patut dipertimbangkan dalam menjaga kesehatan tulang belakang demi menjaga kenyamanan tubuh selama beraktivitas.</div>
              </div>
              <div class="col-xl-6 create-item aos-init aos-animate" data-aos="fade">
                <div class="create-item__img create-item__img--long js-long-img"><img src="{{ asset('img/kretek2.jpg') }}" alt=""></div>
              </div>
            </div>
          </div>
          
          <div class="planing-cnt" style="margin-top: 50px;">
            <div class="planing-steps">
              <div class="planing-step">
                <div class="container">
                  <div class="planing-step__items">
                    <div class="planing-step__item aos-init aos-animate" data-aos="fade">
                      <h3 class="planing-step__title planing-step__title--pt">Bersertifikat Internasional & Nasional</h3>
                      <div class="planing-step__descr">Kretek Bandung, hadir sebagai pilihan pengobatan alternatif yang telah terbukti legal, aman, dan terpercaya dengan berbagai keunggulan yang semakin membuatnya menjadi pilihan utama bagi banyak orang, Serta terapis berpengalaman dan kretek asli sudah mempunyai izin dari Dinas Kesehatan Kab/Kota.</div>
                    </div>
                    <div class="planing-step__item aos-init aos-animate" data-aos="fade">
                      <div class="planing-step__img"><img class="" src="{{asset('img/kretek3.jpg')}}" alt=""></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="planing-step planing-step--mb">
                <div class="container">
                  <div class="planing-step__items planing-step__items--reverse">
                    <div class="planing-step__item aos-init aos-animate" data-aos="fade">
                      <div class="planing-step__img"><img class=" js-img-left" src="{{asset('img/kretek4.jpg')}}" alt=""></div>
                    </div>
                    <div class="planing-step__item aos-init aos-animate" data-aos="fade">
                      <h3 class="planing-step__title">Aman, Legal & Terpercaya</h3>
                      <div class="planing-step__descr">Di Kretek Bandung, pengobatan dilakukan oleh terapis wanita & laki-laki yang profesional dan berpengalaman. Mereka tidak hanya terampil dalam teknik kretek maupun reposisi, tetapi juga memiliki pendekatan yang lembut dan penuh perhatian, menciptakan suasana yang nyaman dan penuh rasa aman bagi setiap klien.</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="planing-step">
                <div class="container">
                  <div class="planing-step__items">
                    <div class="planing-step__item aos-init aos-animate" data-aos="fade">
                      <h3 class="planing-step__title">10000+ Pasien</h3>
                      <div class="planing-step__descr">Kretek Bandung sudah membantu mengatasi keluhan lebih dari 10.000+ pasien, menjadikannya sebagai salah satu tempat yang patut dipertimbangkan dalam menjaga kesehatan tulang belakang demi kenyamanan tubuh selama beraktivitas. Sebagai solusi masalah tulang, otot, dan sendi terbaik di Bandung, Kretek Bandung terus berkomitmen memberikan pelayanan yang profesional dan terpercaya.</div>
                    </div>
                    <div class="planing-step__item aos-init aos-animate" data-aos="fade">
                      <div class="planing-step__img"><img src="{{asset('img/kretek6.jpg')}}" alt=""></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="section section--gray service" id="layanan">
          <div class="container mb-5" >
            <div class="service-cnt row">
              <div class="col-xl-12 service-title-wrap aos-init aos-animate" data-aos="fade">
                <div class="title-wrap">
                  <h2 class="title js-title">Layanan Kami</h2>
                  <div class="title-line js-title-line"></div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="room-items js-grid mx-5">
            <div class="room-item grid-item grid-sizer">
              <div class="room-item__img"><img src="{{asset('img/menu1.png')}}" alt=""></div>
              <div class="room-item__cnt">
                <div class="room-item__info">
                  <h2 class="room-item__title">KRETEK FLASH <br>Rp. 100.000</h2>
                  <div class="room-item__descr">Rasakan sensasi kretek fullbody untuk Anda yang memiliki keluhan pegal-pegal dan ingin coba kretek untuk relaksasi dan kebugaran, Cukup membayar 100 ribu rupiah dengan durasi 10 sampai 15 menit.</div>
                </div>
                <div class="room-item__btns"><a class="room-item__btn" href="#hubungi"><i class="svg-image-btn-arrow"></i></a></div>
              </div>
            </div>
            <div class="room-item grid-item">
              <div class="room-item__img"><img src="{{asset('img/menu2.png')}}" alt=""></div>
              <div class="room-item__cnt">
                <div class="room-item__info">
                  <h2 class="room-item__title">FISIKAL PROBLEM <br>Rp. 150.000</h2>
                  <div class="room-item__descr">Bantu penanganan fokus pada 1 keluhan fisik yang ingin diatasi. Cukup membayar 150 ribu rupiah dengan durasi 15 menit.</div>
                </div>
                <div class="room-item__btns"><a class="room-item__btn" href="#hubungi"><i class="svg-image-btn-arrow"></i></a></div>
              </div>
            </div>
            <div class="room-item grid-item">
              <div class="room-item__img"><img src="{{asset('img/menu3.png')}}" alt=""></div>
              <div class="room-item__cnt">
                <div class="room-item__info">
                  <h2 class="room-item__title">SPORT MASSAGE / INJURY <br>Rp. 200.000</h2>
                  <div class="room-item__descr">Terapi pijat kombinasi cedera olahraga dan gerakan dasar kretek. Cukup membayar 200 ribu rupiah dengan durasi 30 menit.</div>
                </div>
                <div class="room-item__btns"><a class="room-item__btn" href="#hubungi"><i class="svg-image-btn-arrow"></i></a></div>
              </div>
            </div>
            <div class="room-item grid-item">
              <div class="room-item__img"><img src="{{asset('img/menu4.png')}}" alt=""></div>
              <div class="room-item__cnt">
                <div class="room-item__info">
                  <h2 class="room-item__title">Kretek Asli <br>Rp. 200.000</h2>
                  <div class="room-item__descr">Fullbody kretek dan fokus pada satu titik keluhan. Cukup membayar 200 ribu rupiah dengan durasi 20-25 menit.</div>
                </div>
                <div class="room-item__btns"><a class="room-item__btn" href="#hubungi"><i class="svg-image-btn-arrow"></i></a></div>
              </div>
            </div>
            <div class="room-item grid-item">
              <div class="room-item__img"><img src="{{asset('img/menu5.png')}}" alt=""></div>
              <div class="room-item__cnt">
                <div class="room-item__info">
                  <h2 class="room-item__title">KRETEK ASLI RETOS <br>Rp. 300.000</h2>
                  <div class="room-item__descr">Kretek Fullbody + Keluhan + Reposisi tulang otot sendi. Cukup membayar 300 ribu rupiah dengan durasi 30-40 menit.</div>
                </div>
                <div class="room-item__btns"><a class="room-item__btn" href="#hubungi"><i class="svg-image-btn-arrow"></i></a></div>
              </div>
            </div>
            <div class="room-item grid-item">
              <div class="room-item__img"><img src="{{asset('img/menu6.png')}}" alt=""></div>
              <div class="room-item__cnt">
                <div class="room-item__info">
                  <h2 class="room-item__title">Totok Darah (Al Fashdu) <br>Rp. 100.000</h2>
                  <div class="room-item__descr">Pengobatan dengan cara mengeluarkan darah dari pembuluh darah vena. Disarankan untuk yang mempunyai keluhan hipertensi, kolesterol, asam urat, diabetes. Cukup membayar 100 ribu rupiah dengan durasi 30 menit.</div>
                </div>
                <div class="room-item__btns"><a class="room-item__btn" href="#hubungi"><i class="svg-image-btn-arrow"></i></a></div>
              </div>
            </div>
            <div class="room-item grid-item">
              <div class="room-item__img"><img src="{{asset('img/menu7.png')}}" alt=""></div>
              <div class="room-item__cnt">
                <div class="room-item__info">
                  <h2 class="room-item__title">Bekam Basah <br>Rp. 100.000</h2>
                  <div class="room-item__descr">Bekam basah, cangkir akan dibiarkan menempel dalam waktu yang ditentukan, biasanya sekitar 3 menit. kemudian ditusukan jarum kecil pada kulit agar darah kotor keluar. Efektif untuk yang mempunyai penyakit dalam seperti hipertensi. Cukup membayar 100 ribu rupiah.</div>
                </div>
                <div class="room-item__btns"><a class="room-item__btn" href="#hubungi"><i class="svg-image-btn-arrow"></i></a></div>
              </div>
            </div>
            <div class="room-item grid-item">
              <div class="room-item__img"><img src="{{asset('img/menu8.png')}}" alt=""></div>
              <div class="room-item__cnt">
                <div class="room-item__info">
                  <h2 class="room-item__title">Bekam Kering <br>Rp. 100.000</h2>
                  <div class="room-item__descr">Bekam kering, cangkir akan dibiarkan menempel dalam waktu yang ditentukan, biasanya sekitar 3 menit. Berfungsi untuk menarik otot dalam atau mengeluarkan angin dalam tubuh dan melenturkan otot. Cukup membayar 100 ribu rupiah.</div>
                </div>
                <div class="room-item__btns"><a class="room-item__btn" href="#hubungi"><i class="svg-image-btn-arrow"></i></a></div>
              </div>
            </div>
          </div>
        </section>
        <section class="section section--gray news" id="artikel">
          <div class="container">
            <div class="news-cnt">
              <div class="news-info">
                <h2 class="news-title">Artikel Terkini</h2>
                <div class="news-img"><img src="{{ asset('img/kretek9.jpg') }}" alt=""></div>
                <ul class="news-list">
                  <li class="news-list__item js-news-item aos-init aos-animate" data-aos="fade"><a class="news-list__link active js-news-link" href="https://www.tvonenews.com/lifestyle/kesehatan/282091-pentingnya-menjaga-perawatan-tulang-belakang-demi-kenyamanan-tubuh">Pentingnya Menjaga Perawatan Tulang Belakang Demi Kenyamanan Tubuh <span class="news-list__arrow"><i class="svg-image-news-arrow"></i></span></a></li>
                  <li class="news-list__item js-news-item aos-init aos-animate" data-aos="fade"><a class="news-list__link js-news-link" href="https://timesindonesia.co.id/indonesia-positif/522608/kretek-asli-pengobatan-alternatif-populer-untuk-kesehatan-tulang-otot-dan-sendi#google_vignette">Kretek Bandung, Pengobatan Alternatif Populer untuk Kesehatan Tulang Otot dan Sendi <span class="news-list__arrow"><i class="svg-image-news-arrow"></i></span></a></li>
                  <li class="news-list__item js-news-item aos-init aos-animate" data-aos="fade"><a class="news-list__link js-news-link" href="https://pressrelease.kontan.co.id/news/nyamanprofesional-kretek-asli-hadirkan-terapis-wanita-untuk-perawatan-tulang-sendi">Nyaman & Profesional, Kretek Bandung Hadirkan Terapis Wanita untuk Perawatan Tulang & Sendi <span class="news-list__arrow"><i class="svg-image-news-arrow"></i></span></a></li>
                  <li class="news-list__item js-news-item aos-init aos-animate" data-aos="fade"><a class="news-list__link js-news-link" href="https://wartaekonomi.co.id/read553046/kretek-asli-pengobatan-alternatif-bersertifikasi-di-bandung">Kretek Bandung, Pengobatan Alternatif Bersertifikasi di Bandung <span class="news-list__arrow"><i class="svg-image-news-arrow"></i></span></a></li>
                  <li class="news-list__item js-news-item aos-init aos-animate" data-aos="fade"><a class="news-list__link js-news-link" href="https://dinamikapos.com/2024/12/27/kretek-asli-tawarkan-solusi-masalah-postur-tubuh-dengan-teknologi-table-traction/">Kretek Bandung Tawarkan Solusi Masalah Postur Tubuh dengan Teknologi Table Traction <span class="news-list__arrow"><i class="svg-image-news-arrow"></i></span></a></li>
                  <li class="news-list__item js-news-item aos-init aos-animate" data-aos="fade"><a class="news-list__link js-news-link" href="https://propublish.id/kretek-asli-hadirkan-chatbot-untuk-mempermudah-pendaftaran-online/">Kretek Bandung Hadirkan Chatbot untuk Mempermudah Pendaftaran Online <span class="news-list__arrow"><i class="svg-image-news-arrow"></i></span></a></li>
                </ul>
              </div>
              <div class="news-img-wrap aos-init aos-animate" data-aos="fade">
                <div class="news-img js-news-img active"><a class="news-img__link" href="https://www.tvonenews.com/lifestyle/kesehatan/282091-pentingnya-menjaga-perawatan-tulang-belakang-demi-kenyamanan-tubuh"> <img src="{{ asset('img/berita1.jpg') }}" alt=""></a></div>
                <div class="news-img js-news-img"><a class="news-img__link" href="https://timesindonesia.co.id/indonesia-positif/522608/kretek-asli-pengobatan-alternatif-populer-untuk-kesehatan-tulang-otot-dan-sendi#google_vignette"> <img src="{{ asset('img/berita2.jpg') }}" alt=""></a></div>
                <div class="news-img js-news-img"><a class="news-img__link" href="https://pressrelease.kontan.co.id/news/nyamanprofesional-kretek-asli-hadirkan-terapis-wanita-untuk-perawatan-tulang-sendi"> <img src="{{ asset('img/berita3.jpg') }}" alt=""></a></div>
                <div class="news-img js-news-img"><a class="news-img__link" href="https://wartaekonomi.co.id/read553046/kretek-asli-pengobatan-alternatif-bersertifikasi-di-bandung"> <img src="{{ asset('img/berita4.jpg') }}" alt=""></a></div>
                <div class="news-img js-news-img"><a class="news-img__link" href="https://dinamikapos.com/2024/12/27/kretek-asli-tawarkan-solusi-masalah-postur-tubuh-dengan-teknologi-table-traction/"> <img src="{{ asset('img/berita5.jpg') }}" alt=""></a></div>
                <div class="news-img js-news-img"><a class="news-img__link" href="https://propublish.id/kretek-asli-hadirkan-chatbot-untuk-mempermudah-pendaftaran-online/"> <img src="{{ asset('img/berita6.jpg') }}" alt=""></a></div>
              </div>
            </div>
          </div>
        </section>
        <section class="section contact" id="hubungi">
          <div class="contact-cnt">
            <div class="container">
              <div class="title-wrap aos-init aos-animate" data-aos="fade">
                <h2 class="title js-title">Hubungi kami</h2>
                <div class="title-line js-title-line"></div>
              </div>
              <div class="contact-items row">
                <div class="col-xl-6 contact-item">
                  <div class="contact-info">
                    <div class="contact-info__phone aos-init aos-animate" data-aos="fade"><a class="contact-info__phone-link" href="tel:+628988789898">+628988789898</a></div>
                    <div class="contact-info__addr aos-init aos-animate" data-aos="fade"><a class="contact-info__addr-link" href="#">Jl. Muara Baru No.25, Situsaeur, Kec. Bojongloa Kidul, Kota Bandung, <span>Jawa Barat 40233.</span></a></div>
                    <ul class="contact-info__list">
                      <li class="contact-info__item aos-init aos-animate" data-aos="fade"><span class="contact-info__title">Ikuti kami:</span>
                        <ul class="contact-info__social">
                          <li class="contact-info__social-item"><a class="contact-info__social-link" href="http://facebook.com/kretekbandung" target="_blank">
                              <svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 6H9L8.625 9H6V18H2.10938V9H0V6H2.10938V3.98438C2.10938 2.67188 2.4375 1.6875 3.09375 1.03125C3.75 0.34375 4.84375 0 6.375 0H9V3H7.40625C6.8125 3 6.42188 3.09375 6.23438 3.28125C6.07812 3.46875 6 3.78125 6 4.21875V6Z" fill="black"></path>
                              </svg></a></li>
                          <li class="contact-info__social-item"><a class="contact-info__social-link" href="https://www.tiktok.com/@kretekbandung" target="_blank">
                              <svg fill="#000000" width="20" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"><path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 0 1-5.201 1.743l-.002-.001.002.001a2.895 2.895 0 0 1 3.183-4.51v-3.5a6.329 6.329 0 0 0-5.394 10.692 6.33 6.33 0 0 0 10.857-4.424V8.687a8.182 8.182 0 0 0 4.773 1.526V6.79a4.831 4.831 0 0 1-1.003-.104z"/></svg>    
                          </a></li>
                          <li class="contact-info__social-item"><a class="contact-info__social-link" href="https://www.instagram.com/kretekasli_bandung" target="_blank">
                              <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M13.4703 16.0418C14.5202 16.0389 15.5262 15.6538 16.2685 14.9707C17.0109 14.2875 17.4294 13.3618 17.4325 12.3957V5.1043C17.4294 4.13818 17.0109 3.21246 16.2685 2.52931C15.5262 1.84616 14.5202 1.46109 13.4703 1.4582H5.5468C4.49693 1.46109 3.49095 1.84616 2.74858 2.52931C2.0062 3.21246 1.58775 4.13818 1.58462 5.1043V12.3957C1.58775 13.3618 2.0062 14.2875 2.74858 14.9707C3.49095 15.6538 4.49693 16.0389 5.5468 16.0418H13.4703ZM13.4703 17.5H5.5468C2.496 17.5 0 15.2031 0 12.3957V5.1043C0 2.29688 2.496 0 5.5468 0H13.4703C16.5211 0 19.0171 2.29688 19.0171 5.1043V12.3957C19.0171 15.2031 16.5211 17.5 13.4703 17.5Z" fill="black"></path>
                                <path d="M14.6589 12.3955C14.4238 12.3955 14.194 12.4597 13.9985 12.5798C13.8031 12.7 13.6507 12.8708 13.5608 13.0707C13.4708 13.2706 13.4473 13.4905 13.4931 13.7026C13.539 13.9148 13.6522 14.1097 13.8184 14.2627C13.9847 14.4156 14.1964 14.5198 14.427 14.562C14.6576 14.6042 14.8965 14.5825 15.1137 14.4998C15.3309 14.417 15.5165 14.2768 15.6471 14.0969C15.7777 13.917 15.8474 13.7056 15.8474 13.4893C15.8478 13.3455 15.8173 13.2032 15.7577 13.0703C15.698 12.9375 15.6105 12.8168 15.5001 12.7152C15.3896 12.6135 15.2585 12.533 15.1141 12.4781C14.9698 12.4233 14.8151 12.3952 14.6589 12.3955ZM9.50855 11.6666C10.1355 11.6666 10.7483 11.4955 11.2695 11.175C11.7908 10.8545 12.197 10.399 12.4369 9.86601C12.6768 9.33304 12.7396 8.74657 12.6173 8.18077C12.495 7.61496 12.1931 7.09524 11.7498 6.68732C11.3066 6.2794 10.7418 6.0016 10.1269 5.88905C9.51207 5.77651 8.87476 5.83427 8.29558 6.05504C7.7164 6.2758 7.22136 6.64965 6.87308 7.12932C6.52479 7.60898 6.33889 8.17292 6.33889 8.7498C6.33979 9.52313 6.67403 10.2646 7.26826 10.8114C7.86249 11.3582 8.66818 11.6658 9.50855 11.6666ZM9.50855 13.1248C8.56824 13.1248 7.64905 12.8682 6.86722 12.3875C6.08538 11.9068 5.47601 11.2235 5.11617 10.424C4.75633 9.62462 4.66218 8.74495 4.84563 7.89628C5.02907 7.04762 5.48187 6.26807 6.14677 5.65621C6.81167 5.04436 7.6588 4.62768 8.58104 4.45887C9.50328 4.29006 10.4592 4.3767 11.3279 4.70783C12.1967 5.03896 12.9392 5.59972 13.4616 6.31918C13.984 7.03865 14.2628 7.88451 14.2628 8.7498C14.2628 9.91013 13.7619 11.0229 12.8703 11.8434C11.9787 12.6639 10.7695 13.1248 9.50855 13.1248Z" fill="black"></path>
                              </svg></a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-xl-6 contact-item">
                  <form class="contact-form" id="myForm" action="{{ route('landing.appointment') }}" method="POST">
                    @csrf
                    <h3 class="contact-form__title aos-init aos-animate" data-aos="fade"><span>Konsultasi Sekarang</span><br> Kami Siap Membantu Menangani Keluhan Tulang, Otot, dan Sendi Anda.</h3>
                    <div class="form-group aos-init aos-animate" data-aos="fade">
                      <label for="">Nama Lengkap *</label>
                      <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap *">
                    </div>
                    <div class="form-group-items">
                      <div class="form-group aos-init aos-animate" data-aos="fade">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" id="email" name="meta[email]" placeholder="Email">
                      </div>
                      <div class="form-group aos-init aos-animate" data-aos="fade">
                        <label for="kontak">Kontak (Nomor Aktif)</label>
                        <input class="form-control" type="text" id="kontak" name="meta[kontak]" placeholder="Kontak">
                      </div>
                    </div>
                    <div class="form-group-items">
                      <div class="form-group aos-init aos-animate" data-aos="fade">
                        <label for="tanggal_lahir">Tanggal Lahir *</label>
                        <input class="form-control" type="date" id="tanggal_lahir" name="meta[tanggal_lahir]" placeholder="Tanggal Lahir *">
                      </div>
                      <div class="form-group aos-init aos-animate" data-aos="fade">
                        <label for="jenis_kelamin">Jenis Kelamin *</label>
                        <select name="meta[jenis_kelamin]" id="jenis_kelamin" class="form-control">
                          <option value="PRIA">Pria</option>
                          <option value="WANITA">Wanita</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group-items">
                      <div class="form-group aos-init aos-animate" data-aos="fade">
                        <label for="appointment_date">Tanggal Janji Temu *</label>
                        <input class="form-control" type="datetime-local" id="appointment_date" name="appointment_date" placeholder="Tanggal Janji Temu *">
                      </div>
                      <div class="form-group aos-init aos-animate" data-aos="fade">
                        <label for="layanan">Pilih Layanan *</label>
                        <select name="service" id="service" class="form-control">
                          @foreach($services as $item)
                            <option value="{{ $item->uid }}">{{ ucwords(strtolower($item->nama)) }} - {{ Utils::rupiah($item->harga) }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group aos-init aos-animate" data-aos="fade">
                      <label for="keluhan">Keluhan *</label>
                      <textarea class="form-control" id="keluhan" name="keluhan" cols="30" rows="10" placeholder="Keluhan"></textarea>
                    </div>
                    <div class="form-group aos-init aos-animate" data-aos="fade">
                      <label for="alamat">Alamat</label>
                      <textarea class="form-control" id="alamat" name="meta[alamat]" cols="30" rows="10" placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group aos-init aos-animate" data-aos="fade">
                      <input class="btn contact-form__btn" type="button" onclick="save()" value="Buat Janji Temu">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <footer class="footer">
        <div class="container-big">
          <div class="footer-items">
            <div class="footer-item">
              <div class="footer-logo"><span class="footer-logo-main"><img src="{{ asset('img/logo.png') }}" width="120" alt=""></span><span class="footer-logo-small"></span></div>
            </div>
            <div class="footer-item">
              <p class="copyright">© Rifki Pratama Oktavian <br> All Rights Resevered</p>
            </div>
            <div class="footer-item footer-item--hide">
              <ul class="footer-social">
                <li class="footer-social__item"><a class="footer-social__link" href="http://facebook.com/kretekbandung"> 
                    <svg width="20" height="19" viewbox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M19.968 9.55518C19.968 4.48154 15.4975 0.367676 9.98399 0.367676C4.47051 0.367676 0 4.48154 0 9.55518C0 14.1407 3.6504 17.9416 8.42399 18.6315V12.2118H5.88832V9.55518H8.42399V7.53105C8.42399 5.22885 9.9149 3.95613 12.1952 3.95613C13.2876 3.95613 14.4304 4.13578 14.4304 4.13578V6.39697H13.1708C11.9313 6.39697 11.5435 7.1049 11.5435 7.83252V9.55518H14.3123L13.8702 12.2118H11.544V18.6323C16.3176 17.9429 19.968 14.142 19.968 9.55518V9.55518Z" fill="black"></path>
                    </svg></a></li>
                <li class="footer-social__item"><a class="footer-social__link" href="https://www.tiktok.com/@kretekbandung"> 
                    <svg fill="#000000" width="20" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"><path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 0 1-5.201 1.743l-.002-.001.002.001a2.895 2.895 0 0 1 3.183-4.51v-3.5a6.329 6.329 0 0 0-5.394 10.692 6.33 6.33 0 0 0 10.857-4.424V8.687a8.182 8.182 0 0 0 4.773 1.526V6.79a4.831 4.831 0 0 1-1.003-.104z"/></svg>    
                  </a></li>
                <li class="footer-social__item"><a class="footer-social__link" href="https://www.instagram.com/kretekasli_bandung"> 
                    <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13.4703 16.0418C14.5202 16.0389 15.5262 15.6538 16.2685 14.9707C17.0109 14.2875 17.4294 13.3618 17.4325 12.3957V5.1043C17.4294 4.13818 17.0109 3.21246 16.2685 2.52931C15.5262 1.84616 14.5202 1.46109 13.4703 1.4582H5.5468C4.49693 1.46109 3.49095 1.84616 2.74858 2.52931C2.0062 3.21246 1.58775 4.13818 1.58462 5.1043V12.3957C1.58775 13.3618 2.0062 14.2875 2.74858 14.9707C3.49095 15.6538 4.49693 16.0389 5.5468 16.0418H13.4703ZM13.4703 17.5H5.5468C2.496 17.5 0 15.2031 0 12.3957V5.1043C0 2.29688 2.496 0 5.5468 0H13.4703C16.5211 0 19.0171 2.29688 19.0171 5.1043V12.3957C19.0171 15.2031 16.5211 17.5 13.4703 17.5Z" fill="black"></path>
                      <path d="M14.6589 12.3955C14.4238 12.3955 14.194 12.4597 13.9985 12.5798C13.8031 12.7 13.6507 12.8708 13.5608 13.0707C13.4708 13.2706 13.4473 13.4905 13.4931 13.7026C13.539 13.9148 13.6522 14.1097 13.8184 14.2627C13.9847 14.4156 14.1964 14.5198 14.427 14.562C14.6576 14.6042 14.8965 14.5825 15.1137 14.4998C15.3309 14.417 15.5165 14.2768 15.6471 14.0969C15.7777 13.917 15.8474 13.7056 15.8474 13.4893C15.8478 13.3455 15.8173 13.2032 15.7577 13.0703C15.698 12.9375 15.6105 12.8168 15.5001 12.7152C15.3896 12.6135 15.2585 12.533 15.1141 12.4781C14.9698 12.4233 14.8151 12.3952 14.6589 12.3955ZM9.50855 11.6666C10.1355 11.6666 10.7483 11.4955 11.2695 11.175C11.7908 10.8545 12.197 10.399 12.4369 9.86601C12.6768 9.33304 12.7396 8.74657 12.6173 8.18077C12.495 7.61496 12.1931 7.09524 11.7498 6.68732C11.3066 6.2794 10.7418 6.0016 10.1269 5.88905C9.51207 5.77651 8.87476 5.83427 8.29558 6.05504C7.7164 6.2758 7.22136 6.64965 6.87308 7.12932C6.52479 7.60898 6.33889 8.17292 6.33889 8.7498C6.33979 9.52313 6.67403 10.2646 7.26826 10.8114C7.86249 11.3582 8.66818 11.6658 9.50855 11.6666ZM9.50855 13.1248C8.56824 13.1248 7.64905 12.8682 6.86722 12.3875C6.08538 11.9068 5.47601 11.2235 5.11617 10.424C4.75633 9.62462 4.66218 8.74495 4.84563 7.89628C5.02907 7.04762 5.48187 6.26807 6.14677 5.65621C6.81167 5.04436 7.6588 4.62768 8.58104 4.45887C9.50328 4.29006 10.4592 4.3767 11.3279 4.70783C12.1967 5.03896 12.9392 5.59972 13.4616 6.31918C13.984 7.03865 14.2628 7.88451 14.2628 8.7498C14.2628 9.91013 13.7619 11.0229 12.8703 11.8434C11.9787 12.6639 10.7695 13.1248 9.50855 13.1248Z" fill="black"></path>
                    </svg></a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <script src="{{asset('landing/js/jquery.min.js')}}"></script>
    <script src="{{asset('landing/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('landing/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('landing/js/packery-mode.pkgd.min.js')}}"></script>
    <script src="{{asset('landing/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('landing/js/animsition.min.js')}}"></script>
    <script src="{{asset('landing/js/aos.js')}}"></script>
    <script src="{{asset('landing/js/mixitup.min.js')}}"></script>
    <script src="{{asset('landing/js/main.js')}}"></script>
    
    <script src="{{ asset('assets/vendor/jquery-block-ui/jquery-block-ui.js') }}"></script>
    {{-- Noty JS --}}
    <script src="{{ asset('assets/vendor/noty/noty.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/global.js') }}"></script>
    
    <script>
      function save(){
        $('#response_container').empty();
        Ryuna.blockUI();
        let el_form = $('#myForm')
        let target = el_form.attr('action')
        let formData = new FormData(el_form[0])
      
        $.ajax({
          url: target,
          data: formData,
          processData: false,
          contentType: false,
          type: 'POST',
        }).done((res) => {
          if(res?.status == true){
            let html = '<div class="alert alert-success alert-dismissible fade show">'
            html += `${res?.message}`
            html += '</div>'
            Ryuna.noty('success', '', res?.message)
            $('#response_container').html(html)
            Ryuna.unblockUI()
      
            el_form[0].reset()
            if($('[name="_method"]').val() == undefined) {
              // $('[name="appointment"]').val(null).trigger('change')
              // $('[name="branch"]').val(null).trigger('change')
              // $('[name="jobposition"]').val(null).trigger('change')
            }
          }
        }).fail((xhr) => {
          if(xhr?.status == 422){
            let errors = xhr.responseJSON.errors
            let html = '<div class="alert alert-danger alert-dismissible fade show">'
            html += '<ul>';
            for(let key in errors){
              html += `<li>${errors[key]}</li>`;
            }
            html += '</ul>'
            html += '</div>'
            $('#response_container').html(html)
            Ryuna.unblockUI()
          }else{
            let html = '<div class="alert alert-danger alert-dismissible fade show">'
            html += `${xhr?.responseJSON?.message}`
            html += '</div>'
            Ryuna.noty('error', '', xhr?.responseJSON?.message)
            $('#response_container').html(html)
            Ryuna.unblockUI()
          }
        })
      }
      $(document).ready(function() {
        // Saat scroll terjadi
        $(window).on('scroll', function() {
          var scrollPos = $(document).scrollTop();

          $('section').each(function() {
            var sectionTop = $(this).offset().top - 100; // offset biar agak awal aktif
            var sectionBottom = sectionTop + $(this).outerHeight();
            var id = $(this).attr('id');

            if (scrollPos >= sectionTop && scrollPos < sectionBottom) {
              $('.nav-item').removeClass('active'); // hapus dulu active
              $('.nav-item a[href="#' + id + '"]').parent().addClass('active'); // tambah active di li terkait
            }
          });
        });
        const daySchedule = @json($day_schedule);
        const morningSchedule = @json($morning_schedule);  // ["07:00", "12:00"]
        const afternoonSchedule = @json($afternoon_schedule); // ["14:00", "17:00"]

        const dayMap = {
            Sunday: 0,
            Monday: 1,
            Tuesday: 2,
            Wednesday: 3,
            Thursday: 4,
            Friday: 5,
            Saturday: 6,
        };

        const activeDays = daySchedule.map(day => dayMap[day]);

        // Fungsi untuk padding angka jadi 2 digit
        const pad = (n) => n.toString().padStart(2, '0');

        // Set minDate saat halaman dimuat
        window.addEventListener('DOMContentLoaded', () => {
            const input = document.getElementById('appointment_date');
            const now = new Date();

            const formattedNow = `${now.getFullYear()}-${pad(now.getMonth() + 1)}-${pad(now.getDate())}T${pad(now.getHours())}:${pad(now.getMinutes())}`;
            input.min = formattedNow;
        });

        function isTimeAllowed(date) {
            const hours = date.getHours();
            const minutes = date.getMinutes();
            const totalMinutes = hours * 60 + minutes;

            const [mStartH, mStartM] = morningSchedule[0].split(":").map(Number);
            const [mEndH, mEndM] = morningSchedule[1].split(":").map(Number);
            const [aStartH, aStartM] = afternoonSchedule[0].split(":").map(Number);
            const [aEndH, aEndM] = afternoonSchedule[1].split(":").map(Number);

            const morningStartMin = mStartH * 60 + mStartM;
            const morningEndMin = mEndH * 60 + mEndM;
            const afternoonStartMin = aStartH * 60 + aStartM;
            const afternoonEndMin = aEndH * 60 + aEndM;

            return (
                (totalMinutes >= morningStartMin && totalMinutes <= morningEndMin) ||
                (totalMinutes >= afternoonStartMin && totalMinutes <= afternoonEndMin)
            );
        }

        document.getElementById('appointment_date').addEventListener('change', function () {
            const input = this.value;
            if (!input) return;

            const selectedDate = new Date(input);
            const now = new Date();

            // Cek apakah tanggal di masa lalu
            if (selectedDate < now) {
                alert("Tidak dapat memilih waktu di masa lalu.");
                this.value = '';
                return;
            }

            const day = selectedDate.getDay();

            if (!activeDays.includes(day)) {
                alert("Hari yang dipilih tidak termasuk hari layanan.");
                this.value = '';
                return;
            }

            if (!isTimeAllowed(selectedDate)) {
                alert("Waktu yang dipilih di luar jam layanan (pagi: " + morningSchedule.join(" - ") + ", siang: " + afternoonSchedule.join(" - ") + ").");
                this.value = '';
                return;
            }
        });


        
      });
    </script>
  </body>
</html>