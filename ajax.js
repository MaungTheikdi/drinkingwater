$('#purchase_delete').click(function() {

    $purchase_delete = $('#purchase_delete').val();

  $.ajax({
      url: "purchase_ajax_insert.php",
      method: "GET",
      data: {
          purchase_delete: $purchase_delete
      },
      success: function(dataabc) {
          $.ajax({
              url: "purchase_ajax_select.php",
              success: function(dataabc) {
                  $("#tableOne").html(dataabc);
              }
          });
      }
  });

});