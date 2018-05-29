function confirmDelete() {
  var result = confirm('Are you sure you want to delete?');
  if (result) {
    return true;
  } else {
    return false;
  }
}

$('.delete').click(function() {
  var id = $(this).data("id");
  var token = $(this).data("token");
  msg = Lang.get('product.admin.edit.delete_confirm');
  if (confirm(msg)){
    $.ajax({
      type: 'delete',
      url: '/admin/image/'+id,
      data: {
        'id': id,
        _token: token
      },
      success: function(data) {
        document.getElementById('image'+id).remove();
        document.getElementById('delete'+id).remove();
        document.getElementById('deleteImage'+id).remove();
			},
			statusCode: {
        400: function(result) {
          alert(result.responseText);
        }
      }
    });
  }
});
