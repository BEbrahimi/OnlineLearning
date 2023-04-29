/**
 * Created by Bashir Ebrahimi on 8/30/2023.
 */

jQuery(document).ready(function(){
    $.simpleTicker($("#ticker-fade"),{
        speed:1000,
        delay:10000,
        easing:'swing',
        effectType:'fade'
    });
});
$(document).ready(function() {
    $('.countdown').final_countdown({
        start: '1362139200',
        end: '1388461320',
        now: '1387461319',

        seconds: {
            borderColor: '#7995D5',
            borderWidth: '6'
        },
        minutes: {
            borderColor: '#ACC742',
            borderWidth: '6'
        },
        hours: {
            borderColor: '#ECEFCB',
            borderWidth: '6'
        },
        days: {
            borderColor: '#FF9900',
            borderWidth: '6'
        }}, function() {

        alert('ختم تخفیف')
    });
});
/* randum ticker*/
jQuery(document).ready(function(){
$('#vertical-ticker').totemticker({
    row_height      : '77px',
    next            : '#ticker-next',
    previous        : '#ticker-previous',
    stop            : '#stop',
    start           : '#start',
    max_items       :   3,
    stopmouse       :false,

})
});
/*Bootstrap tooltip*/
jQuery(document).ready(function() {
 $('[data-toggle="tooltip"]').tooltip();
});
//boot slide menu
$('#slide-nav').BootSideMenu({

    // 'left' or 'right'
    side: "right",

    // animation speed
    duration: 500,

    // restore last menu status on page refresh
    remember: true,

    // auto close
    autoClose: false,

    // push the whole page
    pushBody: false,

    // close on click
    closeOnClick: true,

    // width
    width: "15%",

    // icons
    icons: {
        left: 'glyphicon glyphicon-chevron-left',
        right: 'glyphicon glyphicon-chevron-right',
        down: 'glyphicon glyphicon-chevron-down'
    },

    // 'dracula', 'darkblue', 'zenburn', 'pinklady', 'somebook'
    theme: '',

});
// owl slider related post
$('.owl-carousel').owlCarousel({
    rtl: true,
    loop: true,
    margin: 0,
    // dots:false,
    // nav: true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
})
//show hiden password
$(document).ready(function(){
    $('#password').password('hide');
});
//=========================================================== dropdown
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
