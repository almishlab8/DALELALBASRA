<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dalel Albasra</title>

  <!-- Favicons -->
  <link href="favicon.ico" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/fancybox/jquery.fancybox.css') }}" rel="stylesheet" />

  <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css') }}" />

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
<style>
  .profile-text h6 {
    margin-top: 0px;
    margin-bottom: 10px;
    color: #7c7c7c;
}
*{
  font-family: 'Cairo', sans-serif ;

}
th {
    text-align: inherit;
}
tr {
    text-align: inherit;
}
table{
  direction: rtl;
}
.info{
  height: 70px;
}
.del {
    color: #ed5565 !important;
    font-size: large !important;
    margin-top: 0px !important;
}
.ede {
    color: #37bc9b !important;
    font-size: large !important;
    margin-top: 0px !important;
}
.lft{
  margin-top: 40px;
    margin-left: -30px;
}
.rit{
  margin-top: 40px;
    margin-right: -30px;
}
.weather-3 h3{
  color:#fff;
}
.label-theme02{
  color: #fff;
    background-color: #ac92ec;
    border-color: #967adc;
}
.modal-body {
  direction: rtl;
}
.mt {
    padding-top: 20px;
}
label{
  font-family: 'Cairo', sans-serif !important;

}
ul.sidebar-menu {
  direction: rtl;
}
.centered{
  direction: ltr;
}
ul.sidebar-menu li a i {
    font-size: 17px;
    padding-right: 10px;
    padding-left: 15px;
}
</style>
<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>Dalel<span>Albasra</span></b></a>
      <!--logo end-->
     
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
            <a class="logout" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('خروج') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
          </li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu " id="nav-accordion">
          <p class="centered"><a href="/"><img src="{{ asset('img/user.png')}}" class="img-circle" width="80"></a></p>
          @guest
          @if (Route::has('register'))
          <h5 class="centered">Admin</h5>
          @endif
          @else
          <h5 class="centered">{{ Auth::user()->name }}</h5>
          @endguest
          <li class="mt ">
            <a href="/companies">
              <i class="fa fa-list"></i>
              <span>الدليل</span>
              </a>
          </li>

          <li>
            <a href="/marketing">
              <i class="fa fa-ticket"></i>
              <span>التسويق</span>
              </a>
          </li>

          <li>
            <a href="/careers">
              <i class="fa fa-briefcase"></i>
              <span>الاعمال</span>
              </a>
          </li>

          <li>
            <a href="/phones">
              <i class="fa fa-phone"></i>
              <span>الهواتف المهمة</span>
              </a>
          </li>

          <li>
              <a href="/users">
                <i class="fa fa-user"></i>
                <span>مدراء النظام</span>
                </a>
            </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-users"></i>
              <span>التوظيف</span>
              </a>
            <ul class="sub">
              <li><a href="/jobs">الوظائف</a></li>
              <li><a href="/employees"> الموظفين</a></li>
            </ul>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3 style="float: right;padding: 20px;"><i class="fa fa-angle-left"></i>  @yield('pageName')</h3>
        <div class="row mt">
          <div class="col-lg-12">
          @yield('content')
          </div>
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Al-Atar Co.</strong>. All Rights Reserved
        </p>
        <div class="credits">

          Created adn Designed by <a href="https://unicode-iq.com/">UNICODE</a>
        </div>
        <a href="blank.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->

  
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('lib/jquery-ui-1.9.2.custom.min.js') }}"></script>
  <script src="{{ asset('lib/jquery.ui.touch-punch.min.js') }}"></script>
  <script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js') }}"></script>
  <script src="{{ asset('lib/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="{{ asset('lib/common-scripts.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <!--script for this page-->
    <script type="text/javascript">
    $(function() {
      //    fancybox
      jQuery(".fancybox").fancybox();
    });
  </script>
  <script src="{{ asset('lib/fancybox/jquery.fancybox.js') }}"></script>

  <!--script for this page-->

</body>

</html>
