$(document).ready(() => {
  $("#fileInput").change(function () {
    $("#fileInputName").text(this.files[0].name);
  });
});
