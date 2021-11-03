
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
    <link href="{{asset('dist/antler/css/filter.css')}}" rel="stylesheet" media="all" onload="if(media!='all')media='all'">
    <link href="{{asset('dist/antler/css/style.min.css')}}" rel="stylesheet">
    <!-- Custom color styles -->
    <link href="{{asset('dist/antler/css/colors/pink.css')}}" rel="stylesheet" title="pink" media="none" onload="if(media!='all')media='all'"/>
    <link href="{{asset('dist/antler/css/colors/blue.css')}}" rel="stylesheet" title="blue" media="none" onload="if(media!='all')media='all'"/>
    <link href="{{asset('dist/antler/css/colors/green.css')}}" rel="stylesheet" title="green" media="none" onload="if(media!='all')media='all'"/>  
  </head>
  <body>
  <!-- ***** LOADING PAGE ****** -->
  <div id="spinner-area">
    <div class="spinner">
      <div class="double-bounce1"></div>
      <div class="double-bounce2"></div>
    </div>
  </div>
  <!-- ***** UPLOADED MENU FROM HEADER.HTML ***** -->
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
                    <a href="{{url('/')}}#home">Home</a>
                  </li>
                  <li class="menu-item menu-item-has-children">
                    <a href="{{url('/')}}#about">About Mira</a>
                  </li>
                  <li class="menu-item menu-item-has-children">
                    <a href="{{url('/')}}#roadmap">Roadmap</a>
                  </li>
                  <li class="menu-item menu-item-has-children">
                    <a href="{{url('/')}}#news">News</a>
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
                  <a class="click-action" href="{{url('/')}}#home">Home</a>
                </div>
                <div class="menu-item">
                  <a class="click-action" href="{{url('/')}}#about">Abouts Mira</a>
                </div>
                <div class="menu-item">
                  <a class="click-action" href="{{url('/')}}#roadmap">Roadmap</a>
                </div>
                <div class="menu-item">
                  <a class="click-action" href="{{url('/')}}#news">News</a>
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
  <!-- ***** BANNER ***** -->
  <div class="top-header">
    <div class="total-grad-inverse"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="heading">{{$data->title}}</div>
            {{-- <div class="subheding">{{$data->title}}</div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** BLOG DETAILS ***** -->
  <section class="shopping blog sec-normal sec-bg2 motpath">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="wrap-blog">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="sec-normal pt-0">
                  <div class="sec-main sec-bg1">
                    <div class="action-content">
                      <img data-src="{{asset('images/news/'.$data->image)}}" class="img-responsive lazyload" alt="photo" >
                    </div>
                    <div class="row text-blog">
                      <div class="col-sm-12 col-md-12 col-lg-6 p-0">
                        <div class="timer">
                          <i class="icon-calendar"></i>
                          <span class="pl-2 pr-4"> {{$data->created_at}}</span>
                        </div>
                      </div>
                      {{-- <div class="col-sm-12 col-md-12 col-lg-6 p-0">
                        <div class="social-icon">
                          <a href=""><i class="fab fa-facebook-f"></i></a>
                          <a href=""><i class="fab fa-twitter"></i></a>
                          <a href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                      </div> --}}
                    </div><hr>
                    <div class="heading blog"><a href="#">{{$data->title}}</a></div>
                    <div class="blog-info">
                      {!! $data->content !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- sidebar -->
        <div class="col-md-4">
          <aside class="sidebar">
            {{-- <div class="cd-filter-block checkbox-group">
              <label><a href=""><i class="fas fa-search"></i></a></label>
              <input type="text" class="input" placeholder="Search..."/>
            </div> --}}
            <div class="posts">
              <div class="tabs">
                <div class="tabs-header">
                  <ul class="list">
                    <li class="active">Most popular</li>
                  </ul>
                </div>
                <div class="tabs-content">
                  <div class="tabs-item active">
                    @foreach($random as $key => $value)
                      <div class="item-wrap">
                        <a href="{{route('newsDetail',$value->slug)}}"><img data-src="{{asset('images/news/'.$value->image)}}" class="img lazyload" alt=""></a>
                        <div class="heading-article"><a href="{{route('newsDetail',$value->slug)}}">{{$value->title}}</a></div>
                        <a href="{{route('newsDetail',$value->slug)}}" class="c-grey"><small><i class="far fa-file-alt"></i> {{substr($value->content, 0, 20)}}...</small></a>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
  
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
  <!-- ***** UPLOADED FOOTER FROM FOOTER.HTML ***** -->
  <footer class="footer" id="contact">
    <img class="logo-bg logo-footer" src="{{asset('dist/antler/symbol.svg')}}" alt="logo">
    <div class="container">
      <div class="footer-top">
        <div class="row">
          <div class="col-md-12 text-center">
            <a><img class="svg logo-footer" src="{{asset('images/logo/mira.png')}}" alt="logo"></a>
            <div class="copyrigh">© {{date('Y')}} {{ config('app.name') }} - All rights reserved</div>
            <div class="soc-icons">
              <a href="https://facebook.com/Miracoin.Official"><i class="fab fa-facebook-f"></i></a>
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
  <script defer src="{{asset('dist/antler/js/popper.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/bootstrap.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/jquery.circliful.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/jquery.countdown.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/jquery.magnific-popup.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/slick.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/owl.carousel.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/isotope.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/jquery.scrollme.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/swiper.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/lazysizes.min.js')}}"></script>
  <script defer src="{{asset('dist/antler/js/scripts.min.js')}}"></script>
</body>
</html>