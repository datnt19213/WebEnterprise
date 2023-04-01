$(document).ready(() => {
  $(".nav-respo").click(() => {
    $(".menu-bar").slideToggle("fast");
    $(".sub-menu-link").hide();
  });
  $(".link-lists").click(() => {
    $(".sub-menu-link").slideToggle("fast");
  });
});
