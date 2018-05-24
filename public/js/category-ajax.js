$(".create-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-category").find("form").attr("action");
    var name = $("#create-category").find("input[name='category']").val();
    var parent_id = $("#create-category").find("option[name='parent']").val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('#csrf-token').attr('content')
        },
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{'name':name, 'parent_id':parent_id}
    }).done(function(data){
        getPageData();
    });
});
