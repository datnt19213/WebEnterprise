$(document).ready(function () {
  //   if ($.cookie("lastPage")) {
  //     $("#content-load")
  //       .find(".section-content")
  //       .load($.cookie("lastPage") + " .section-content");
  //   }

  var lastPage = localStorage.getItem("lastPage"); // Retrieve the last visited page from local storage
  if (lastPage) {
    $("#content-load")
      //   .find(".section-content")
      .load(lastPage + "#content-load"); // Load the last visited page
  }
  // Add an event listener for the sidebar links
  $(".bar-category-nav").click(function (event) {
    event.preventDefault(); // Prevent the default link behavior
    var url = $(this).attr("href"); // Get the URL of the clicked page
    $("#content-load")
      //   .find(".section-content")
      .load(url + "#content-load");
    // $("#content-load").load(url); // Load the content of the clicked page into the content container
    // $.cookie("lastPage", url);
    localStorage.setItem("lastPage", url);
  });
});
