$(document).on('click','table tr td a',function (event) {
        event.preventDefault();
        var idPost = $(this).attr('id');
        var this_button = $(this);
        console.log(this_button);
          $.ajax({
            url: '/admin/post/active',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {idPost: idPost},
          })
          .done(function(data) {
            console.log(data);
            if(data.status == true) {
              this_button.replaceWith(data.html);
            }
          })     
      })
