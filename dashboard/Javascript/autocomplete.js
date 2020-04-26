
// AJAX call for autocomplete 
$(document).ready(function () {
$("#search").keyup(function () {
  $.ajax({
    type: "POST",
    url: "readnames.php",
    data: 'keyword=' + $(this).val(),
    success: function (data) {
      $("#suggestion-box-readers").show();
      $("#suggestion-box-readers").html(data);
    }
  });
});
});

//To select name
function selectName(val) {
$("#search").val(val);
$("#suggestion-box-readers").hide();
}

$(document).ready(function () {
$("#search-books").keyup(function () {
  $.ajax({
    type: "POST",
    url: "readbooks.php",
    data: 'keyword=' + $(this).val(),
    success: function (data) {
      $("#suggestion-box-books").show();
      $("#suggestion-box-books").html(data);
    }
  });
});
});
//To select book
function selectBook(val) {
$("#search-books").val(val);
$("#suggestion-box-books").hide();
}


