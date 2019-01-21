$(document).ready(function() {

 // addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
 // function hideURLbar(){ window.scrollTo(0,1); }

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
                $("#custom_logo").html('<img src="./images/icons/favicon.png" style="width:95%; height:100px; padding: 15px 5px 15px 5px;" >');
                $("#menu span").css({"position":"absolute"});
            }
            else
            {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                $("#custom_logo").html('<img src="./images/logo.png" style="width:95%;height:100px;padding: 10px;" >');
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
        tableWrapper: true
     });
    
});


                     
     
  