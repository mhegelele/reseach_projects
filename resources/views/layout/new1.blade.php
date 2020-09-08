<!DOCTYPE html>
<html>
<head>
<title>Research Project Database</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/font.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/li-scroller.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/jquery.fancybox.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/reg.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/card.css')}}">

<script src="{{ url('js/jquery.min.js')}}"></script> 
<script type="text/javascript"></script>
<style type="text/css">
 div#navigation {
  float: left;
  width: 800px;
  height: 100%;
  color: #ffffff;
  background-color: #666;
  border: 1px solid #000;
  padding: 45px;
}
#navigation a {
  display: block;
  text-decoration: none;
} 
.search1 input[type=text] {
  width: 200px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 8px 15px 8px 30px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

.search1 input[type=text]:focus {
  width: 70%;
}

.button1 {
  /* background-color: #4CAF50; Green */
  background-color: #2F76A5;
  border: none;
  color: white;
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  border-radius: 4px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
.button1:hover {
  background-color: #3e8e41;
}
.centers ul {
 
  list-style-type: none;
}
 
.centers li {
  
  float: left;
  margin-right: 0px;
    list-style-type: none;
  color:white;
  text-decoration: none;
    display: block;
  padding-right: 50px;
}
 
.centers  li:last-child {
  
}
 
.centers li a {
 
  
  width:350px;
    display: block
  font: 20ps;

  padding-top:20px;
  padding-right:60px;
  text-transform: uppercase;

 
}
 .citation{
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
  /*border-radius: 5px;*/
  box-shadow:1px 1px 2px #002633;
  border-left:4px solid #002633;
  padding: 5px 10px;
  margin-top: 15px;
}
.centers  li a:hover {
   background-color:#e7e7e7;
   color:black;
}
 
.nimr-center{
     width:100%;
     font-size: 20sp;
     padding: 5px;
     text-transform: uppercase;
    
}
</style>
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="fluid_container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12" style="margin-left: 2%; margin-right: 2%; width:  96%; ">
        <div class="header_top" style="background-color:#2F76A5">
          <div class="header_top_left">
                      </div>
          <div class="header_top_right" style="margin-left: 50%;">
            <p id="demo">

 
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
         <div class="header_bottom">
<img alt="BANNER" src="{{ url('images/logo11.jpg')}}"class="img-responsive">
           </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          @if(Auth::check())


 <li class="active"><a href="{{ url('')}}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                
                    <li class="{{ Request::segment(1) === 'add-project' ? 'active' : null }}" >
                      <a href="{{url('add-project')}}">Add Project</a>
                    </li>
                    <li class="{{ Request::segment(1) === 'uploaded-project' && 'progress_project' ? 'active' : null }}">
                      <a href="{{url('uploaded-project')}}">Research Projects</a>
                    </li>
            @if(Auth::user()->level === 'Admin')
            <li class="{{ Request::segment(1) === 'manage' ? 'active' : null }}">
              <a href="{{url('manage')}}">Manage</a>
            </li>
    
            @endif
            <li><a href="{{url('logout')}}">Logout</a></li>
          @else
           <li class="active"><a href="{{ url('')}}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
           <li class="nav-right"><a href="{{ route('login') }}">Login</a></li>  
          
          @endif
                
        </ul>


      </div>
    </nav>
  </section>

    @yield('content')


    <footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
          <h2>Physical Address</h2>
      <div class="margin-left-70 margin-bottom-30">
                <p>National Institute for Medical Research<br>
                   3 Barack Obama Drive<br>
                   P.O Box 9653<br>11101 Dar es Salaam, <br> Tanzania
                </p>               
              </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Email Address</h2>
                         <div class="float-left">
                </div>
              <div class="margin-left-70 margin-bottom-30">
                  <p>hq@nimr.or.tz<br>info@nimr.or.tz
                  </p>           
              </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Contact numbers</h2>
             <strong>Tel:</strong>  +255 22 2121400  <br>
                     <strong>Fax:</strong> +255 22 2121360
                  </p>           
          </div>
        </div>
      </div>
    </div>

    <div class="footer_bottom">
      <p class="copyright"> &copy; 2020 <a href="">National Institute for Medical Research</a></p>
      <p class="developer">Developed By Alice Jonathan: Contact 0717-592556</p>
    </div>
<script>
var d = new Date();
document.getElementById("demo").innerHTML = d.getFullYear();
</script>
  
    <script>
var d = new Date();
var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday","Friday", "Saturday"];
document.getElementById("demo").innerHTML = days[d.getDay()] + "," +" " + months[d.getMonth()] + " " +d.getDate() + " " + ","  + d.getFullYear();
</script>
 <script type="text/javascript">
        jQuery(document).ready( function () {
        $("#append").click( function(e) {
          e.preventDefault();
        $(".inc").append('<div>\
                          <textarea  class="form-control" type="text" name="name_objective[]" id="publication-citation" placeholder="Specific Objectives" ></textarea>\
               <a href="#" class="remove_this fa fa-minus primary" style="color:red"></a>\
                <br>\
                        </div>');
        return false;
        });

 $("#appendi").click( function(e) {
          e.preventDefault();
        $(".inci").append('<div>\
                           <input class="form-control" type="text" name="inst_name[]"  placeholder="Institutions/Centres">\
               <a href="#" class="remove_this fa fa-minus primary" style="color:red"></a>\
                <br>\
                        </div>');
        return false;
        });
 $("#append1").click( function(e) {
          e.preventDefault();
        $(".inc1").append('<div>\
                              <input type="text" placeholder="Sponsor" id="birthday" name="sponsor[]" class="form-control" >\
               <a href="#" class="remove_this fa fa-minus primary" style="color:red"></a>\
                <br>\
                        </div>');
        return false;
        });
 $("#append2").click( function(e) {
          e.preventDefault();
        $(".inc2").append('<div>\
                              <input class="form-control" placeholder="Publication (if applicable)" type="text" name="publication[]" >\
               <a href="#" class="remove_this fa fa-minus primary" style="color:red"></a>\
                <br>\
                        </div>');
        return false;
        });


    jQuery(document).on('click', '.remove_this', function() {
        jQuery(this).parent().remove();
        return false;
        });
  
  });
</script> 

<script type="text/javascript">
        jQuery(document).ready( function () {
        $("#appenda").click( function(e) {
          e.preventDefault();
        $(".inca").append('<div>\     <br>\
          \<div class="col-md-2">\
          \</div>\
                \<div class="col-md-2">\       <input class="form-control" type="text" name="fname[]"  placeholder="First name" id="author">\
      \</div>\
      <div class="col-md-2">\
      <input class="form-control" type="text" name="lname[]"  placeholder="Middle name">\
      \</div>\
      \<div class="col-md-2">\
        <input class="form-control" type="text" name="sname[]"  placeholder="Surname">\
      \</div>\
      \<div class="col-md-4">\
        <select class="form-control" type="text" name="role[]" >\
        <option value="" selected disabled>Choose Investigator</option>\
        <option value="Principal Investigator">Principal Investigator</option>\
        <option value="Co Investigators">Co Investigators</option>\
        </select>\
      \</div>\ <div class="col-md-1 pull-right">\
      <a href="#" class="remove_this fa fa-minus " style="color:red"></a>\
      \</div>\
         <br>\
                          </div>');
        return false;
        });

    jQuery(document).on('click', '.remove_this', function() {
        jQuery(this).parent().remove();
        return false;
        });

  });
</script>

<script src="{{ url('assets/js/jquery.min.js')}}"></script> 
<script src="{{ url('assets/js/wow.min.js')}}"></script> 
<script src="{{ url('assets/js/bootstrap.min.js')}}"></script> 
<script src="{{ url('assets/js/slick.min.js')}}"></script> 
<script src="{{ url('assets/js/jquery.li-scroller.1.0.js')}}"></script> 
<script src="{{ url('assets/js/jquery.newsTicker.min.js')}}"></script> 
<script src="{{ url('assets/js/jquery.fancybox.pack.js')}}"></script> 
<script src="{{ url('assets/js/custom.js')}}"></script>
</body>
</html>