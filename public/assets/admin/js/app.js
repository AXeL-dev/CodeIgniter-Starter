'use strict'

$(document).ready(function () {
    messageclosebuttonactions()
    colorize();
    $(".ui.accordion").accordion();//accordion trigger
    $(".ui.rating").rating();//rating trigger
    $(".ui.dropdown").dropdown();//dropdown and select trigger

    //sidebar trigger
    $("#toc").sidebar({
        dimPage: true,
        transition: "overlay",
        mobileTransition: "uncover"
    });
    $("#toc").sidebar("attach events", ".launch.button, .view-ui, .launch.item");
    $(".sidemenu").niceScroll({ cursorcolor: "#ddd", cursorwidth: 5, cursorborderradius: 0, cursorborder: 0, scrollspeed: 50, autohidemode: true, zindex: 9999999, bouncescroll: true });//sidebar scrool trigger by nicescroll
    //sidebar trigger

    $("body").niceScroll({ cursorcolor: "#ddd", cursorwidth: 5, cursorborderradius: 0, cursorborder: 0, scrollspeed: 50, autohidemode: true, zindex: 9999999 });//body scroll tigger by nicescroll
    
});

//Sidebar And Navbar Coloring Function (This button on Footer)
function colorize() {
    var a = topmenu_color;
    var b = leftmenu_color;

    $(".colorlist li a").on("click", function (b) {
        var c = $(this).attr("data-addClass");
        b.preventDefault();
        $(".navmenu, .sidemenu2").removeClass(a).addClass(c);
        $("input[type=\"hidden\"][name=\"dashboard_topmenu_color\"]").val(c);
        a = c;
    });

    $(".sidecolor li a").on("click", function (a) {
        var c = $(this).attr("data-addClass");
        a.preventDefault();
        $(".sidemenu, .sidebar").removeClass(b).addClass(c);
        $(".accordion").removeClass("inverted").addClass("inverted");
        $("input[type=\"hidden\"][name=\"dashboard_leftmenu_color\"]").val(c);
        b = c;
    });

    /*$(".colorize").popup({
        on: "click"
    });*/
}
//Sidebar And Navbar Coloring Function (This button on Footer)

//Message element close button trigger function
function messageclosebuttonactions() {
    $(".message .close").on("click", function () {
        $(this).closest(".message").transition("fade");
    });
}
//Message element close button trigger function
