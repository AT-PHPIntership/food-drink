$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
/* Create new Item */
$(".create-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-category").find("form").attr("action");
    console.log(form_action);
    var name = $("#create-category").find("input[name='category']").val();
    var parent_id = $("#create-category").find(":selected").val();
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{'name':name, 'parent_id':parent_id}
    }).done(function(data){
        $(".modal").modal('hide');
    }).fail(function (data) {
       var json_data = JSON.parse(data.responseText);
       $('#errors-input-name').text(json_data['errors'].name);
    });
});
