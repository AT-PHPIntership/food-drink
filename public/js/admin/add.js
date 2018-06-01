function confirmDelete() {
  var result = confirm('Are you sure you want to delete?');
  if (result) {
    return true;
  } else {
    return false;
  }
}

// delete image in edit product
var delImg = [];
$('.delete').click(function() {
  var id = $(this).data("id");
  var token = $(this).data("token");
  msg = Lang.get('product.admin.edit.delete_confirm');
  if (confirm(msg)){
    delImg.push(id);
    document.getElementById('delImage').value = delImg;
    document.getElementById('delete'+id).remove();
    document.getElementById('deleteImage'+id).remove();  
  }
});

//change status order
$(document).ready(function () {
  $('.status').click(function () {
    var status = $(this).val();
    var id = $(this).data("id");
    console.log(status);
    msg = Lang.get('order.admin.index.confirm_status');
    if (confirm(msg)){
      $.ajax({
        url: 'order/'+id+'/updateStatus',
        type: 'PUT',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        data: {
          "status": status
        }
      });
    }
  })
})
