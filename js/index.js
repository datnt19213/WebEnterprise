$(document).ready(() => {
  var a = true;
  $(".nav-respo").click(() => {
    $(".menu-bar").slideToggle("fast");
    $(".sub-menu-link").hide();
  });
  $(".list-sort").click(() => {
    if ($(window).width() < 900) {
      $(".sorts").slideToggle("fast");
      $(".l-categories").hide();
    }
  });
  $(".list-cate").click(() => {
    if ($(window).width() < 900) {
      $(".l-categories").slideToggle("fast");
      $(".sorts").hide();
      $(".list-sort").hide();
      if (a == false) {
        $(".list-sort").show(100);
        a = true;
      } else {
        $(".list-sort").hide();
        a = false;
      }
    }
  });
  $(".logout-show").longpress(() => {
    $(".log-out").slideToggle("fast");
  });
});
