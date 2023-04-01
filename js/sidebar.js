$(document).ready(() => {
  $(".show-side-bar").click(() => {
    if ($(window).width() < 600) {
      $(".side-bar").animate({left: "-15%"}, 500);
    }
    if ($(window).width() > 600 && $(window).width() < 900) {
      $(".side-bar").animate({left: 0}, 500);
    }
    $(".hide-side-bar").css("display", "flex");
    $(".show-side-bar").css("display", "none");
  });
  $(".hide-side-bar").click(() => {
    if ($(window).width() < 600) {
      $(".side-bar").animate({left: "-100%"}, 500);
    }
    if ($(window).width() > 600 && $(window).width() < 900) {
      $(".side-bar").animate({left: "-35%"}, 500);
    }
    $(".hide-side-bar").css("display", "none");
    $(".show-side-bar").css("display", "flex");
  });
});
