$(document).ready(function() {
  //change the integers below to match the height of your upper dive, which I called
  //banner.  Just add a 1 to the last number.  console.log($(window).scrollTop())
  //to figure out what the scroll position is when exactly you want to fix the nav
  //bar or div or whatever.  I stuck in the console.log for you.  Just remove when
  //you know the position.
  $(window).scroll(function () { 
    if ($(window).scrollTop() > 150) {
      $('header .nav-desktop nav').addClass('fixed-top');
    }
    if ($(window).scrollTop() < 150) {
      $('header .nav-desktop nav').removeClass('fixed-top');
    }
    if ($(window).scrollTop() > 60) {
      $('header .meanmenu-reveal').addClass('fixed-top');
    }
    if ($(window).scrollTop() < 60) {
      $('header .meanmenu-reveal').removeClass('fixed-top');
    }
  });

  $('.meanmenu-reveal').click(function(){
    $('.mean-bar').toggleClass('fixed-top');
  });
});
