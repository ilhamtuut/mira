
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    <link rel="shortcut icon" href="{{asset('images/logo/favicon.png')}}" />
    <!-- Fonts -->
    <link href="{{asset('dist/antler/fonts/cloudicon/cloudicon.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="{{asset('dist/antler/fonts/fontawesome/css/all.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="{{asset('dist/antler/fonts/opensans/opensans.css')}}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <!-- CSS styles -->
    <link href="{{asset('dist/antler/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/antler/css/owl.carousel.min.css')}}" rel="stylesheet" media="all" onload="if(media!='all')media='all'">
    <link href="{{asset('dist/antler/css/swiper.min.css')}}" rel="stylesheet" media="all" onload="if(media!='all')media='all'">
    <link href="{{asset('dist/antler/css/animate.min.css')}}" rel="stylesheet" media="all" onload="if(media!='all')media='all'">
    <link href="{{asset('dist/antler/css/style.min.css')}}" rel="stylesheet">
    <!-- Custom color styles -->
    <link href="{{asset('dist/antler/css/colors/pink.css')}}" rel="stylesheet" title="pink" media="none" onload="if(media!='all')media='all'"/>
    <link href="{{asset('dist/antler/css/colors/blue.css')}}" rel="stylesheet" title="blue" media="none" onload="if(media!='all')media='all'"/>
    <link href="{{asset('dist/antler/css/colors/green.css')}}" rel="stylesheet" title="green" media="none" onload="if(media!='all')media='all'"/>
    <style type="text/css">
      .nav-menu .main-menu a:hover{
        color: #fff;
      }
      .news-img{
        width: 100%;
        border-top-left-radius:15px;
        border-top-right-radius:15px;
        margin-bottom: 5px;
      }
      .news-title{
        font-size: 18px;
        font-weight: 700;
        color: #212122;
      }
      .news-description{
        font-size: 14px;
        color: grey;
      }
      .carousel-indicators li{
        background-color: #212122;
      }

      .owl-carousel .owl-item img{
        z-index: -1;
      }

      @media (max-width:991px){
        .line-dashed{
          display: none;
        }
      }

      @media (max-width: 767px){
        /*.owl-carousel .owl-item img{
          width: 70%;
        }
        .custom-element-right{
          display: block!important;
        }*/
      }
    </style>
  </head>
  <body>
  <!-- ***** LOADING PAGE ****** -->
  {{-- <div id="spinner-area">
    <div class="spinner">
      <div class="double-bounce1"></div>
      <div class="double-bounce2"></div>
    </div>
  </div> --}}

  <!-- ***** HEADER ***** -->
  <header>
    <!-- ***** NAV MENU ****** -->
    <div class="menu-wrap">
      <div class="nav-menu">
        <div class="container">
          <div class="row">
            <div class="col-2 col-md-2">
              <a href="{{url('/')}}">
                  <img alt="Logo" src="{{asset('images/logo/mira.png')}}" height="36px" />
              </a>
            </div>
            <nav id="menu" class="col-10 col-md-10">
              <div class="navigation float-right">
                <button class="menu-toggle">
                <span class="icon"></span>
                <span class="icon"></span>
                <span class="icon"></span>
                </button>
                <ul class="main-menu nav navbar-nav navbar-right">
                  <li class="menu-item menu-item-has-children">
                    <a href="#home">Home</a>
                  </li>
                  <li class="menu-item menu-item-has-children">
                    <a href="#about">About Mira</a>
                  </li>
                  <li class="menu-item menu-item-has-children">
                    <a href="#roadmap">Roadmap</a>
                  </li>
                  <li class="menu-item menu-item-has-children">
                    <a href="#news">News</a>
                  </li>
                  <li class="menu-item menu-item-has-children">
                    <a data-toggle="modal" data-target="#contactUs">Contact Us</a>
                  </li>
                  <li class="menu-item menu-item-has-children">
                    <a href="{{route('faq')}}">FAQ</a>
                  </li>
                  <li class="menu-item">
                    {{-- <a class="pr-0 mr-0" href="{{asset('file/whitepaper_v3.pdf')}}" download> <div class="btn btn-default-yellow-fill question"><span>Whitepaper</span> <i class="fas fa-download pl-1"></i> </div></a> --}}
                    <a class="pr-0 mr-0" href="{{route('earn.index')}}"> <div class="btn btn-default-yellow-fill question"><span>DeFi</span> <i class="fas fa-user pl-1"></i> </div></a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- ***** NAV MENU MOBILE ****** -->
    <div id="nav-menu-mobile" class="menu-wrap mobile">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <a href="{{url('/')}}"><img class="svg logo-menu" src="{{asset('images/logo/mira.png')}}" alt="logo Antler"></a>
          </div>
          <div class="col-6">
            <nav class="nav-menu">
              <button id="nav-toggle" class="menu-toggle">
                <span class="icon"></span>
                <span class="icon"></span>
                <span class="icon"></span>
              </button>
              <div class="main-menu">
                <div class="menu-item">
                  <a class="click-action" href="#home">Home</a>
                </div>
                <div class="menu-item">
                  <a class="click-action" href="#about">Abouts Mira</a>
                </div>
                <div class="menu-item">
                  <a class="click-action" href="#roadmap">Roadmap</a>
                </div>
                <div class="menu-item">
                  <a class="click-action" href="#news">News</a>
                </div>
                <div class="menu-item menu-last">
                  <a class="click-action" data-toggle="modal" data-target="#contactUs">Contact Us</a>
                </div>
                <div class="menu-item">
                  <a class="click-action" href="{{route('faq')}}">FAQ</a>
                </div>
                <div>
                  {{-- <a href="{{asset('file/whitepaper_v3.pdf')}}" download><div class="btn btn-default-yellow-fill mt-3">Whitepaper <i class="fas fa-download pl-1"></i></div></a> --}}
                  <a href="{{route('earn.index')}}"><div class="btn btn-default-yellow-fill mt-3">DeFi <i class="fas fa-user pl-1"></i></div></a>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** SLIDER ***** -->
  <section id="home" class="owl-carousel owl-theme owl-loaded owl-drag scrollme">
    {{-- <div class="full h-100 sec-bg6">
      <div class="vc-parent">
        <div class="vc-child">
          <div class="top-banner">
            <div class="container animateme" data-when="exit" data-from="0" data-to="0.75" data-opacity="0" data-translatey="-100">
              <img class="custom-element-right" style="width: 40%; max-height: 400px;" src="{{asset('images/logo/icon.png')}}" alt="Dedicated Server">
              <h1 class="heading">Mira Finance <br>Decentralized <br><span class="animatype c-pink">Finance Revolution</span></h1>
              <!-- <a href="{{route('register')}}" class="btn btn-default-yellow-fill">Join Us</a> -->
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- <div class="full h-100 sec-bg6">
      <div class="vc-parent">
        <div class="vc-child">
          <div class="top-banner">
            <div class="container animateme" data-when="exit" data-from="0" data-to="0.75" data-opacity="0" data-translatey="-100">
              <img class="custom-element-right" src="{{asset('images/logo/laptop.png')}}" alt="Cloud VPS Server">
              <h1 class="heading">Project Mira Finance <br>Decentralized</h1>
              <h3 class="subheading">
                Project Mira Finance Decentralized was DEFI Project. <br>Mira Project Was Staking with Decentralized Systems
              </h3>
              <a href="{{route('register')}}" class="btn btn-default-pink-fill">Join Us</a>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <div class="full h-100 sec-bg6 motpath-w">
      <div class="vc-parent">
        <div class="vc-child">
          <div class="top-banner">
            <div class="container animateme" data-when="exit" data-from="0" data-to="0.75" data-opacity="0" data-translatey="-100">
              <img class="custom-element-right" src="{{asset('images/logo/laptop.png')}}" alt="Cloud VPS Server">
              <h1 class="heading">Mira.id <br> Decentralized Finance</h1>
              <h4 class="text-white mb-5">
                Financial revolution with decentralized finance
              </h4>
              <a href="{{asset('file/whitepaper_v3.pdf')}}" download class="btn btn-default-yellow-fill">Whitepaper <i class="fas fa-download pl-1"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** PRICING TABLES ***** -->
  <section class="pricing special sec-up-slider">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4">
          <div class="wrapper first text-left">
            <div class="top-content" style="min-height: 400px;">
              <img class="svg mb-3" src="{{asset('dist/antler/fonts/svg/wallet.svg')}}" alt="">
              <div class="title"><a class="c-pink" href="https://tronscan.org/#/token20/TJ6CjSftX7ifUoBtK2VcvAKzcut9cnfrhq">MIRA</a></div>
              <div class="fromer">Mira gives power to the community and enables access to an on-chain decision making model. It will be the principial token for staking in the MIRA platform. <br><br></div>
              <a href="https://tronscan.org/#/token20/TJ6CjSftX7ifUoBtK2VcvAKzcut9cnfrhq" class="btn btn-default-yellow-fill">Go to Tronscan</a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
          <div class="wrapper text-left">
            <div class="top-content" style="min-height: 400px;">
              <img class="svg mb-3" src="{{asset('dist/antler/fonts/svg/cloudup.svg')}}" alt="">
              <div class="title"><a class="c-pink" href="{{route('earn.index')}}">STAKING</a></div>
              <div class="fromer">In order to use the service, you simply deposit your preferred amount of asset. After depositing, you will earn passive income based on the protocol’s monetary policy.</div>
              <a href="{{route('earn.index')}}" class="btn btn-default-yellow-fill">DeFi MIRA</a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
          <div class="wrapper third text-left">
            <div class="top-content" style="min-height: 400px;">
              <img class="svg mb-3" src="{{asset('dist/antler/fonts/svg/technology.svg')}}" alt="">
              <div class="title"><a class="c-pink" href="https://tronscan.org/#/contract/TJ6CjSftX7ifUoBtK2VcvAKzcut9cnfrhq">KEY FEATURE</a></div>
              <div class="fromer">MIRA consist of DeFi trading features that enable staking liquidity and we can earn while sleep. <br><br><br></div>
              <a href="https://tronscan.org/#/contract/TJ6CjSftX7ifUoBtK2VcvAKzcut9cnfrhq" class="btn btn-default-yellow-fill">Staking Contract</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** LOAD BALANCING ***** -->
  <section class="balancing sec-normal sec-bg3 motpath-w pb-80" id="about">
    <div class="h-services">
      <div class="container">
        <div class="randomline">
          <div class="bigline"></div>
          <div class="smallline"></div>
        </div>
        <div class="row" style="padding-bottom: 30px;">
          <div class="col-sm-12 text-left">
            <h2 class="section-heading text-white">About Mira</h2>
            <p class="section-subheading mb-0">Decentralized Finance</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-left">
            <p class="section-subheading">Mira is a decentralised platform that enables different features for staking and coinvesting. Mira is the governance token that enables access to an on-chain decision model where users can participate as stakers.<br><br> MIRA holders are incentivised to stake their tokens on liquidity pools  which comes from the protocol’s inflationary monetary policy. These rewards tokens are distributed to MIRA stakers every 10 day, provided their collateralisation does not fall below the target threshold.</p><br><br>
          </div>
          <div class="col-md-6">
            <div class="wrap-service load text-center">
              <div class="wow animated fadeInUp fast text-center">
                <img class="img-fluid mb-3" src="{{asset('images/logo/wpp.png')}}" alt="Load">
              </div>
              {{-- <h3 class="text-white">MIRA Allocation</h3> --}}
              {{-- <a href="{{asset('file/whitepaper_v3.pdf')}}" download class="btn btn-default-yellow-fill">Whitepaper</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** FEATURES ***** -->
  <section id="roadmap" class="history-section feat01 motpath sec-bg4 sec-normal">
    <div class="container">
      <div class="randomline">
        <div class="bigline"></div>
        <div class="smallline"></div>
      </div>
      <div class="row" style="padding-bottom: 50px;">
        <div class="col-sm-12 text-left">
          <h2 class="section-heading">Roadmap Mira</h2>
          <p class="section-subheading mb-0">Decentralized Finance</p>
        </div>
      </div>
      <div class="sec-main sec-bg1">
        <div class="row" style="padding-bottom: 0px;">
          <div class="col-md-12 col-lg-6 wow animated fadeInUp fast">
            <img style="width: 100%;" class="svg first" src="{{asset('images/logo/road1.png')}}" alt="dns redundant">
          </div>
          <div class="col-md-12 col-lg-5 offset-lg-1">
            <div class="info-content">
              <h4>Q4-2020</h4>
              <p>Team Recruitment, Planning, Building Website and Social Media and Private Sale Start</p>
            </div>
          </div>
          <span class="line-dashed" style="margin-top: 90px;margin-left: 50px;position: relative;border-left: 5px dashed #c33e69;height: 50px;"></span>
          <span class="line-dashed" style="margin-top: 44px;position: relative;border-bottom: 5px dashed #c33e69;width: 58%;"></span>
          <span class="line-dashed" style="position: relative;border-right: 5px dashed #c33e69;height: 100px;margin-top: -51px;"></span>
        </div>
        <hr>
        <div class="row" style="padding-bottom: 0px;">
          <div class="col-md-12 col-lg-5">
            <div class="info-content">
              <h4>Q1-2021</h4>
              <p>Presale, Prepare Listing On Several Big Exchanger, Increase Community</p>
            </div>
          </div>
          <div class="col-md-12 col-lg-6 offset-lg-1 wow animated fadeInUp fast">
            <img style="width: 100%;" class="svg second" src="{{asset('images/logo/road6.png')}}" alt="backups">
          </div>
          <span class="line-dashed" style="margin-left: 50px;position: relative;border-left: 5px dashed #c33e69;height: 50px;"></span>
          <span class="line-dashed" style="margin-top: 45px;position: relative;border-bottom: 5px dashed #c33e69;width: 58%;"></span>
          <span class="line-dashed" style="position: relative;border-right: 5px dashed #c33e69;height: 120px;margin-bottom: -160px;"></span>
        </div>
        <hr>
        <div class="row" style="padding-bottom: 0px;">
          <div class="col-md-12 col-lg-6 wow animated fadeInUp fast">
            <img style="width: 100%;" class="svg third" src="{{asset('images/logo/road7.jpg')}}" alt="monitoring 24/7/365">
          </div>
          <div class="col-md-12 col-lg-5 offset-lg-1">
            <div class="info-content">
              <h4>Q2-2021</h4>
              <p>Development Mira Financial Decentralized Project</p>
            </div>
          </div>
          <span class="line-dashed" style="margin-top: 89px;margin-left: 50px;position: relative;border-left: 5px dashed #c33e69;height: 50px;"></span>
          <span class="line-dashed" style="margin-top: 44px;position: relative;border-bottom: 5px dashed #c33e69;width: 58%;"></span>
          <span class="line-dashed" style="position: relative;border-right: 5px dashed #c33e69;height: 220px;margin-top: -172px;"></span>
        </div>
        <hr>
        <div class="row" style="padding-bottom: 0px;">
          <div class="col-md-12 col-lg-5">
            <div class="info-content">
              <h4>Q3-2021</h4>
              <p>Implementation Mira Financial Decentralized Project</p>
            </div>
          </div>
          <div class="col-md-12 col-lg-6 offset-lg-1 wow animated fadeInUp fast">
            <img style="width: 100%;" class="svg second" src="{{asset('images/logo/road2.png')}}" alt="backups">
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- <section class="services sec-normal motpath sec-bg4" id="roadmap">
    <div class="container">
      <div class="service-wrap">
        <div class="row">
          <div class="col-sm-12 text-left">
            <h2 class="section-heading">Roadmap Mira</h2>
            <p class="section-subheading">Decentralized Finance</p>
          </div>
          <div class="col-sm-12 col-md-3 wow animated fadeInUp fast">
            <div class="service-section text-center">
              <img class="svg" src="{{asset('dist/antler/fonts/svg/window.svg')}}" alt="">
              <div class="title">Q3-2020</div>
              <p class="subtitle">
                Team Recruitment, Planning, Building Website and Social Media and Private Sale Start
              </p>
            </div>
          </div>
          <div class="col-sm-12 col-md-3 wow animated fadeInUp">
            <div class="service-section text-center">
              <img class="svg" src="{{asset('dist/antler/fonts/svg/window.svg')}}" alt="">
              <div class="title">Q4-2020</div>
              <p class="subtitle">
                Presale, Prepare Listing On Several Big Exchanger, Increase Community
              </p>
            </div>
          </div>
          <div class="col-sm-12 col-md-3 wow animated fadeInUp fast">
            <div class="service-section text-center">
              <img class="svg" src="{{asset('dist/antler/fonts/svg/window.svg')}}" alt="">
              <div class="title">Q1-2021</div>
              <p class="subtitle">
                Development Mira Financial Decentralized Project
              </p>
            </div>
          </div>
          <div class="col-sm-12 col-md-3 wow animated fadeInUp fast">
            <div class="service-section text-center">
              <img class="svg" src="{{asset('dist/antler/fonts/svg/window.svg')}}" alt="">
              <div class="title">Q2-2021</div>
              <p class="subtitle">
                Implementation Mira Financial Decentralized Project
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <br>
  <!-- ***** CASE STUDY ***** -->
  <section class="casestudy pb-80">
    <div class="container">
      <div class="sec-main sec-up bg-pink mb-0">
        <img data-src="{{asset('dist/antler/casestudy.png')}}" class="lazyload" alt="Case Study">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-9">
            <div class="slider-container slider-filter">
              <div class="slider-wrap">
                <div class="swiper-container main-slider" data-autoplay="4000" data-touch="1" data-mouse="0" data-slides-per-view="responsive" data-loop="1" data-speed="1200" data-mode="horizontal" data-xs-slides="1" data-sm-slides="1" data-md-slides="1" data-lg-slides="1">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <h3 class="author">Featured</h3>
                      <div class="content-info">
                        <p>Token Transaction Very fast with 2,000 TPS (transactions per second) Fee Transaction with Cheap Fee just 0,1 to 3 TRX per Transaction</p><br>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <h3 class="author mb-0">Featured</h3>
                      <p>Fully Decentralized</p>
                      <div class="content-info">
                        <p>MIRA was Safe and Secure because using Tron Blockchain Technology</p><br>
                      </div>
                    </div>
                  </div>
                  <div class="pagination vertical-mode pagination-index"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="balancing sec-normal sec-bg3 motpath-w pb-80" id="allocation">
    <div class="h-services">
      <div class="container">
        <div class="randomline">
          <div class="bigline"></div>
          <div class="smallline"></div>
        </div>
        <div class="row" style="padding-bottom: 30px;">
          <div class="col-sm-12 text-left">
            <h2 class="section-heading text-white">Mira Allocation</h2>
            {{-- <p class="section-subheading mb-0">Decentralized Finance</p> --}}
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="wrapper text-left" style="background-color: #aa9f9f1c; padding: 15px;border-radius: 5px;">
                <div class="title text-white">Name : MIRA</div>
                <div class="title text-white">Ticker Name : MIRA</div>
                <div class="title text-white">Total Supply : 1,200,000.00000000 MIRA</div>
                <div class="title text-white">Decimal : 18</div>
                <div class="title text-white">Smart Contract : TJ6CjSftX7ifUoBtK2VcvAKzcut9cnfrhq</div>
            </div>
          </div>
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="wrap-service load text-center">
              <div class="wow animated fadeInUp fast text-center">
                <img class="img-fluid mb-3" src="{{asset('images/logo/alocation.png')}}" alt="Load">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** HELP ***** -->
  {{-- <section class="services sec-normal motpath sec-bg3" id="our_team" style="padding-bottom: 20px;">
    <div class="container">
      <div class="service-wrap">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2 class="section-heading text-white">Our Team</h2>
            <p class="section-subheading">Mira Team</p>
          </div>
          <div class="col-sm-12 col-md-3 wow animated fadeInUp fast">
            <div class="service-section text-center">
              <img style="width: 60%;" src="{{asset('images/dev/ceo.png')}}" alt="">
              <div class="title">Gunawan Wibi Sono</div>
              <p class="subtitle">CEO</p>
            </div>
          </div>
          <div class="col-sm-12 col-md-3 wow animated fadeInUp">
            <div class="service-section text-center">
              <img style="width: 60%;" src="{{asset('images/dev/cto.png')}}" alt="">
              <div class="title">Anugrah Dimas</div>
              <p class="subtitle">CTO</p>
            </div>
          </div>
          <div class="col-sm-12 col-md-3 wow animated fadeInUp fast">
            <div class="service-section text-center">
              <img style="width: 60%;" src="{{asset('images/dev/md.png')}}" alt="">
              <div class="title">Lufti</div>
              <p class="subtitle">Marketing Director</p>
            </div>
          </div>
          <div class="col-sm-12 col-md-3 wow animated fadeInUp fast">
            <div class="service-section text-center">
              <img style="width: 60%;" src="{{asset('images/dev/uxd.png')}}" alt="">
              <div class="title">Nanda Mahendra Dhata</div>
              <p class="subtitle">UI/UX Disigner</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <section class="balancing sec-normal sec-bg3 motpath-w pb-80" id="news">
    <div class="h-services">
      <div class="container">
        <div class="randomline">
          <div class="bigline"></div>
          <div class="smallline"></div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 class="text-white">News About Mira</h1>
            <p class="section-subheading">Our Partnership</p><br><br>
          </div>
          <div class="col-md-12">
            <div class="wrap-service load text-center">
              <div class="wow animated fadeInUp fast text-center">
                <a style="margin-right: 20px;" href="https://xangle.io/" target="_blank"><img width="150px" src="{{asset('images/logo/xangle.png')}}"></a>
                <a href="https://www.rekeningku.com/market-detail/MIRA-IDR"><img height="65px" src="{{asset('images/logo/rekeningku.jpg')}}"></a>
              </div>
            </div>
          </div>
        </div>
        @if(count($data) > 0)
        <h5><a class="text-white" href="{{route('news')}}">See all news</a></h5>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                @foreach($data as $key => $value)
                  <div class="col-sm-12 col-md-4 mt-4">
                    <div class="sec-sec sec-bg1">
                      <img class="news-img" src="{{asset('images/news/'.$value->image)}}" alt="news" border="0"/>
                      <div class="news-title c-pink">{{$value->title}}</div>
                      <div class="news-description mb-4">{{substr($value->content, 0, 100)}}...</div>
                      <a href="{{route('newsDetail',$value->slug)}}" class="btn btn-default-yellow-fill">Read more</a>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        @else
          {{-- <h5 class="text-white text-center">News Empty</h5> --}}
        @endif
      </div>
    </div>
  </section>
  <!-- ***** FOOTER ***** -->

  <!-- modal -->

  <div class="modal fade" id="contactUs" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="exampleModalScrollableTitle">Contact Us</h5>
        </div>
        <form action="{{route('send.mail')}}" method="POST">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                <input class="form-control" id="email" name="email" type="text" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input class="form-control" id="subject" name="subject" type="text" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea class="form-control" type="text" id="message" name="message" placeholder="Message"></textarea>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-xs btn-default-fill mr-2" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-xs btn-default-purple-fill" value="submit"><i class="fa fa-envelope"></i> Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalBanner" tabindex="-1" role="dialog" aria-hidden="true" style="background: transparent;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div style="position: absolute; color: white; top: 10px; right: 10px; z-index: 1;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <img src="{{asset('images/banner-exhange.png')}}" style="width: 100%;">
        </div>
    </div>
  </div>

  <footer class="footer" id="contact">
    <img class="logo-bg logo-footer" src="{{asset('dist/antler/symbol.svg')}}" alt="logo">
    <div class="container">
      <div class="footer-top">
        <div class="row">
          <div class="col-md-12 text-center">
            <a><img class="svg logo-footer" src="{{asset('images/logo/mira.png')}}" alt="logo"></a>
            <div class="copyrigh">© {{date('Y')}} {{ config('app.name') }} - All rights reserved</div>
            <div class="soc-icons">
              <a href="https://www.facebook.com/Miracoin.Official"><i class="fab fa-facebook-f"></i></a>
              <a href="https://www.youtube.com/channel/UCbPE9c1ALCU4ojDRqRi9F8Q"><i class="fab fa-youtube"></i></a>
              <a href="https://twitter.com/mira_Coin"><i class="fab fa-twitter"></i></a>
              <a href="https://www.instagram.com/mira_coin"><i class="fab fa-instagram"></i></a>
              <a href="https://t.me/mira_defi"><i class="fab fa-telegram"></i></a>
              <a href="https://linkedin.com/in/mira-coin-4679a61b5"><i class="fab fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ***** BUTTON GO TOP ***** -->
  <a href="#0" class="cd-top"> <i class="fas fa-angle-up"></i> </a>
  <!-- Javascript -->
  <script src="{{asset('dist/antler/js/jquery.min.js')}}"></script>
  <script src="{{asset('dist/antler/js/typed.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/popper.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/bootstrap.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/jquery.countdown.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/jquery.magnific-popup.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/slick.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/owl.carousel.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/isotope.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/jquery.scrollme.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/swiper.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/lazysizes.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/wow.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/scripts.min.js')}}"></script>
  <script type="text/javascript">
    $('.click-action').on('click', function () {
      $('#nav-menu-mobile').removeClass('active');
    });
  </script>
  <script type="text/javascript">
    $(window).on('load', function() {
        $('#modalBanner').modal('show');
    });
</script>
</body>
</html>
