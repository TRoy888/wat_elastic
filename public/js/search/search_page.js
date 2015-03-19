$(document).ready(function(){
  $('#search').keypress(function (e) {
    var key = e.which;
    if(key == 13){
      $.post('search', {'query_text':$('#search').val()}, function(result){
        // alert(result);
        console.log(result);
      });
      return false;
    }
  });
});
