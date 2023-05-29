$.ajax({
  url: "your_php_program.php",
  type: "GET",
  dataType: "json",
  success: function(data) {
    // Do something with the data
    console.log(data);
  },
  error: function(xhr, status, error) {
    // Handle error
    console.error(error);
  }
});