<!DOCTYPE HTML>
<html>
    <head>
        <title>SIMEC :: @yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('public/theme') }}/images/icons/favicon.png"  type="image/png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="SIMEC School Management System" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="{{ asset('public/theme') }}/vendor/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="{{ asset('public/theme') }}/vendor/css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="{{ asset('public/theme') }}/vendor/css/morris.css" type="text/css"/>
        <link href="{{ asset('public/theme') }}/vendor/fontawesome/css/all.css" rel="stylesheet"> 
        <!-- <script src="{{ asset('theme') }}/vendor/js/jquery-2.1.4.min.js"></script> -->
        <script src="{{ asset('public/theme') }}/vendor/jquery/jquery.min.js"></script>
        <script src="{{ asset('public') }}/ckeditor/ckeditor.js"></script>
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('public/theme') }}/vendor/css/icon-font.min.css" type='text/css' />
        <link rel="stylesheet" href="{{ asset('public/theme') }}/vendor/css/table-style.css" type='text/css' />
        <link rel="stylesheet" href="{{ asset('public/theme') }}/vendor/css/simec.css" type='text/css' />
    </head> 
    <body>
       <div class="page-container">
            <!--/sidebar-menu-->
            <div class="sidebar-menu">
                <header class="logo1">
                    <a href="#" class="sidebar-icon">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                        <img src="{{ asset('public/theme') }}/images/logo.png" style="width:95%;height:100px;padding: 10px;">
                    </a>
                </header>
                <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                <div class="menu">
                    <ul id="menu" >
                        <!-- <li>
                            <a href="./">
                                <i class="fas fa-tachometer-alt"></i> <span>&nbsp;Dashboard</span>
                                <div class="clearfix"></div>
                            </a>
                        </li> -->
                        <li id="menu-academico" >
                            <a href="#"><i class="fas fa-money-check-alt" aria-hidden="true"></i>
                                <span> &nbsp;Accounts</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./set-monthly-fee') }}">&nbsp;Set Monthly Fee for Student</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./setup-income-expanse-head') }}">&nbsp;Set Income/Expanse Head</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./fee-type') }}">&nbsp;Set Fee Type</a></li>
                            </ul>
                        </li>
                        <li id="menu-academico" >
                            <a href="#"><img src="{{ asset('public/theme') }}/images/icons/bdt.png" style="height: 20px; width: 20px;">
                                <span> &nbsp;Income</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./fee-collection') }}">&nbsp;Fee Collection</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./') }}">&nbsp;Other Collections</a></li>
                            </ul>
                        </li>
                        <li id="menu-academico" >
                            <a href="#"><img src="{{ asset('public/theme') }}/images/icons/bdt.png" style="height: 20px; width: 20px;">
                                <span> &nbsp;Expanse</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./') }}">&nbsp;Examination Expanse</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./') }}">&nbsp;Other Expanse</a></li>
                            </ul>
                        </li>
                        <li id="menu-academico" >
                            <a href="#"><i class="fas fa-school" aria-hidden="true"> </i>
                                <span> &nbsp;Academic</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./sessions') }}">&nbsp;Sessions</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./classes') }}">&nbsp;Classes</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./sections') }}">&nbsp;Sections</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./new-registration') }}">&nbsp;New Registration</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./exams') }}"> Set Examinations</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./committee') }}">&nbsp;Committee</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./generate-id-card') }}">ID Cards</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./tc-certification') }}">&nbsp;TC & Certifications</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./notices') }}">&nbsp;Notices</a></li>
                            </ul>
                        </li>
                        <li id="menu-academico" >
                            <a href="#"><i class="fas fa-user-tie" aria-hidden="true"></i>
                                <span> &nbsp;Teachers</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./teachers') }}">&nbsp;All Teachers</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./teacher-attendance') }}">&nbsp;Attendance</a></li>
                            </ul>
                        </li>
                        <li id="menu-academico" >
                            <a href="#"><i class="fas fa-user-graduate" aria-hidden="true"> </i>
                                <span> &nbsp;Students</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./students/create') }}">New Students</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./all-students') }}">All Students</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="./">Parents</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./take-attendance') }}">Attendance</a></li>
                            </ul>
                        </li>
                        <li id="menu-academico" >
                            <a href="#"><i class="fas fa-book-reader" aria-hidden="true"></i>
                                <span> &nbsp;Disciplines</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./disciplines') }}">All Disciplines</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="./">Discipline Evaluation</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="./">Reports</a></li>
                            </ul>
                        </li>
                        <li id="menu-academico" >
                            <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                <span> &nbsp;Study Materials</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./subjects') }}">Subjects</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./syllabus') }}">Syllabus</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="./">Assignments</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="./">Notes</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="./">Routines</a></li>
                            </ul>
                        </li>
                        <li id="menu-academico" >
                            <a href="#"><i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                                <span> &nbsp;Home Works</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./home-works') }}">Create Home Work</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./view-home-works') }}">Evaluate</a></li>
                                <!-- <li id="menu-academico-avaliacoes" ><a href="./">Reports</a></li> -->
                            </ul>
                        </li>
                        <!-- <li id="menu-academico" >
                            <a href="#"><i class="fas fa-newspaper" aria-hidden="true"></i>
                                <span> &nbsp;Examinations</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./exams') }}">Examinations</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="./">Scheduling Exam</a></li>
                            </ul>
                        </li> -->
                        <li id="menu-academico" >
                            <a href="#"><i class="fas fa-swatchbook" aria-hidden="true"></i>
                                <span> &nbsp;Results</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./set-grades') }}">Set Grade & Marks</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./assign-marks-play-to-five') }}">Assign Marks (Play-Five)</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./assign-marks-six-to-eight') }}">Assign Marks (Six-Eight)</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./assign-marks') }}">Assign Marks (Nine-Ten)</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./view-results') }}">View Results (Play-Five)</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./view-results-six-to-eight') }}">View Results (Six-Eight)</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./view-results') }}">View Results (Nine-Ten)</a></li>
                            </ul>
                        </li>
                        <li id="menu-academico" >
                            <a href="#"><i class="fa fa-bullhorn" aria-hidden="true"></i>
                                <span> &nbsp;Notice Board</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./allnotices') }}">Notices</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="./">Result Publish</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="./">View Results</a></li>
                            </ul>
                        </li>
                        <li id="menu-academico" >
                            <a href="#"><i class="fas fa-users-cog" aria-hidden="true"></i>
                                <span> &nbsp;User Setting</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="./">Role Setting</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="./">Convert to Users</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="./">Assign Roles</a></li>
                            </ul>
                        </li>
                        <li id="menu-academico" >
                            <a href="#"><i class="fas fa-cogs" aria-hidden="true"></i>
                                <span> &nbsp;Site Setting</span> <span class="fa fa-angle-right" style="float: right"></span>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="{{ url('./basic-setting') }}">Basic Settings</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="./">Social Settings</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="./">Privacy Policy</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>        
        </div>

        <!--/content-inner-->
        <div class="left-content">
            <div class="mother-grid-inner">
              <!--header start here-->
                <div class="header-main">
                    <div class="logo-w3-agile">
                        <h1><a href="{{ url('./dashboard') }}">SIMEC</a></h1>
                    </div>
                    <div class="w3layouts-left">
                        <!--search-box-->
                        <div class="w3-search-box">
                            <form action="#" method="post">
                                <input type="text" placeholder="Search..." required=""> 
                                <input type="submit" value="">                  
                            </form>
                        </div><!--//end-search-box-->
                        <div class="clearfix"> </div>
                    </div>
                    <div class="w3layouts-right">
                        <div class="profile_details_left"><!--notifications of menu start -->
                            <ul class="nofitications-dropdown">
                                <li class="dropdown head-dpdn">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="notification_header">
                                                <h3>You have 3 new messages</h3>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">
                                               <div class="user_img"><img src="{{ asset('public/theme') }}/images/in11.jpg" alt=""></div>
                                               <div class="notification_desc">
                                                <p>Lorem ipsum dolor</p>
                                                <p><span>1 hour ago</span></p>
                                                </div>
                                               <div class="clearfix"></div> 
                                            </a>
                                        </li>
                                        <li>
                                            <div class="notification_bottom">
                                                <a href="#">See all messages</a>
                                            </div> 
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown head-dpdn">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="notification_header">
                                                <h3>You have 3 new notification</h3>
                                            </div>
                                        </li>
                                        <li><a href="#">
                                            <div class="user_img"><img src="{{ asset('public/theme') }}/images/in8.jpg" alt=""></div>
                                           <div class="notification_desc">
                                            <p>Lorem ipsum dolor</p>
                                            <p><span>1 hour ago</span></p>
                                            </div>
                                          <div class="clearfix"></div>  
                                         </a></li>
                                         <li>
                                            <div class="notification_bottom">
                                                <a href="#">See all notifications</a>
                                            </div> 
                                        </li>
                                    </ul>
                                </li>   
                                <li class="dropdown head-dpdn">
                                    <a href="{{ url('./') }}" target="_blank"><i class="fa fa-eye"></i></a>
                                </li>   
                                <div class="clearfix"> </div>
                            </ul>
                            <div class="clearfix"> </div>
                        </div>
                        <!--notification menu end -->
                        <div class="clearfix"> </div>               
                    </div>
                    <div class="profile_details w3l">       
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="profile_img">   
                                        <span class="prfil-img"><img src="{{ asset('public/theme') }}/images/demo.png" alt=""> </span> 
                                        <div class="user-name">
                                            <p>{{ Auth::user()->name }}</p>
                                            <span>Admin</span>
                                        </div>
                                        <i class="fa fa-angle-down"></i>
                                        <i class="fa fa-angle-up"></i>
                                        <div class="clearfix"></div>    
                                    </div>  
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
                                    <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
                                    <li> 
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> {{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>   
                </div>
                <!--heder end here-->

                    @yield('mainContent')

                <!--copy rights start here-->
                <div class="copyrights">
                     <p>© 2018-2019 . All Rights Reserved | Design by  <a href="http://simecsystem.com/" target="_blank">SIMEC System Ltd.</a> </p>
                </div>  
                <!--COPY rights end here-->
            </div>
        </div>
        
        <script>
            function printtag(tagid) {
                var hashid = "#"+ tagid;
                var tagname =  $(hashid).prop("tagName").toLowerCase() ;
                var attributes = ""; 
                var attrs = document.getElementById(tagid).attributes;
                  $.each(attrs,function(i,elem){
                    attributes +=  " "+  elem.name+" ='"+elem.value+"' " ;
                  })
                var divToPrint= $(hashid).html() ;
                var head = "<html><head>"+ $("head").html() + "</head>" ;
                var allcontent = head + "<body  onload='window.print()' >"+ "<" + tagname + attributes + ">" +  divToPrint + "</" + tagname + ">" +  "</body></html>"  ;
                var newWin=window.open('','Print-Window');
                newWin.document.open();
                newWin.document.write(allcontent);
                newWin.document.close();
               // setTimeout(function(){newWin.close();},10);
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
              // Header JS
                var navoffeset=$(".header-main").offset().top;
                $(window).scroll(function(){
                    var scrollpos=$(window).scrollTop();
                    if(scrollpos >=navoffeset){
                        $(".header-main").addClass("fixed");
                    }else{
                        $(".header-main").removeClass("fixed");
                    }
                });

                // Scroll bar JS
                scroll();
                function scroll(){
                    // $("html").niceScroll({styler:"fb",cursorcolor:"#1b93e1", cursorwidth: '6', cursorborderradius: '10px', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});
                    $("html").niceScroll({styler:"fb",cursorcolor:"#ff4a43", cursorwidth: '15', cursorborderradius: '0', background: '#1b93e1', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});

                    $(".scrollbar1").niceScroll({styler:"fb",cursorcolor:"#1b93e1", cursorwidth: '15', cursorborderradius: '0',autohidemode: 'false', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0'});

                    
                    
                    $(".scrollbar1").getNiceScroll();
                    if ($('body').hasClass('scrollbar1-collapsed')) {
                        $(".scrollbar1").getNiceScroll().hide();
                    }
                }

                // Side bar Script
                sidebar_controll();
                function sidebar_controll(){
                    var toggle = true;
                                        
                    $(".sidebar-icon").click(function() {
                        if (toggle)
                        {
                            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                            $("#custom_logo").html('<img src="{{ asset('theme') }}/images/icons/favicon.png" style="width:95%; height:100px; padding: 15px 5px 15px 5px;" >');
                            $("#menu span").css({"position":"absolute"});
                        }
                        else
                        {
                            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                            $("#custom_logo").html('<img src="{{ asset('theme') }}/images/logo.png" style="width:95%;height:100px;padding: 10px;" >');
                            setTimeout(function() {
                                $("#menu span").css({"position":"relative"});
                            }, 400);
                        }       
                        toggle = !toggle;
                    });
                }

                // Responsice Css Table
                $('#table').basictable();

                $('#table-breakpoint').basictable({
                    breakpoint: 768
                });

                $('#table-swap-axis').basictable({
                    swapAxis: true
                });

                $('#table-force-off').basictable({
                    forceResponsive: false
                });

                $('#table-no-resize').basictable({
                    noResize: true
                });

                $('#table-two-axis').basictable();

                $('#table-max-height').basictable({
                    tableWrapper: true,
                    breakpoint: 640
                 });
            });
        </script>
        <script src="{{ asset('public/theme') }}/vendor/js/jquery.nicescroll.js"></script>
        <script src="{{ asset('public/theme') }}/vendor/js/bootstrap.min.js"></script>
        <script src="{{ asset('public/theme') }}/vendor/js/jquery.basictable.min.js"></script>
    </body>
</html>