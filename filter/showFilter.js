function selectFilter(){
  var x = document.getElementById('mySelect').value;

  // alert(x);

  $.ajax({
    url:"showFilter.php", 
    method: "POST", 
    data:{
      idFilter : x
    },
    succes:function(data){
      $("#showFilterData").html(data);
    }
  })
}