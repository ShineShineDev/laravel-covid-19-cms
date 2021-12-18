$(document).ready(function () {

    $('.prevention').hover(function () {
        $(this).addClass('prevention-card');
    },function () {
        $(this).removeClass('prevention-card')
    });
    $('.open-panel').click(function () {
        $('.panel').toggle();
    });
    //go previous page
    $('.go-previous-page').click(function(){
        window.history.back();
    });
    //open and close active ,death ,recovered
    $('.active-close-btn').click(function () {
        $('.active-table').toggle();
    });
    $('.close-death-table').click(function () {
        $('.death-table').toggle();
    });
    $('.close-recovered-table').click(function () {
        $('.recovered-table').toggle();
    });
    $('.frame-pare').children().addClass('img-fluid');

    //hide parent element
    $('.del-parent-el').click(function () {
        $(this).parent().hide();
    });
    $('.del-parent-parent-el').click(function () {
        $(this).parent().parent().hide();
    });

    $('.go-situation-btn').hover(function () {
        $(this).children().show();
    });
    $('.go-situation-btn').mouseleave(function () {
        $(this).children().hide();
    });


});




// scrollReveal animation
window.sr = new ScrollReveal, sr.reveal(".toright", {
    origin: "left",
    duration: 900,
    distance: "90px"
}), sr.reveal(".toleft", {
    origin: "right",
    duration: 900,
    distance: "90px"
}), sr.reveal(".toup", {
    origin: "top",
    duration: 900,
    distance: "-90px"
}), sr.reveal(".todown", {
    origin: "top",
    duration: 900,
    distance: "90px"
}), window.onscroll = function() {

};