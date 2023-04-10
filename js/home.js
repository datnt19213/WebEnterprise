$(document).ready(() => {
  $(".show-more-content").click(() => {
    var txtHeight = $(".fb-text-paragraph").height();
    $(".fb-content-para").animate({height: txtHeight});
    $(".show-more-content").hide();
    $(".show-less-content").show();
  });
  $(".show-less-content").click(() => {
    $(".fb-content-para").css("height", "100px");
    $(".show-more-content").show();
    $(".show-less-content").hide();
  });
  $(".fb-list").scroll(() => {
    if ($("fb-list").scrollTop() < 0) {
      $(".fb-content-para").css("height", "100px");
      $(".show-more-content").show();
      $(".show-less-content").hide();
    }
  });
  if ($(window).width() < 900) {
    $(".hide-cmt").click(() => {
      $(".fb-comment").slideDown();
    });
    $(".fb-cmt").click(() => {
      $(".fb-comment").slideUp();
    });
  } else {
    $(".fb-comment").show();
  }
});
