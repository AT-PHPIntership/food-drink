const ENABLE = 1;
const TYPE_REVIEW = 2;
const TYPE_COMMENT = 1;
var path = document.location.pathname;
var data_user = JSON.parse(localStorage.getItem('data'));
var url_delete = '/api/posts/';

$(document).ready(function () {
  const ENABLE = 1;
  // show review
  getData('/api' + path + '/posts?type='+ TYPE_REVIEW +'&status=' + ENABLE +'&sort=updated_at&order=desc', TYPE_REVIEW);
  // show comment
  getData('/api' + path + '/posts?type='+ TYPE_COMMENT +'&status=' + ENABLE +'&sort=updated_at&order=desc', TYPE_COMMENT);
  delPost();
});

function getData(url, typePost) {
  $.ajax({
    url: url,
    type: "GET",
    header: {
      'Accept': 'application/json',
    },
    success: function(response) {
      var html = '';
      response.data.data.forEach(post => {
        var stars = '';
        if (post.type == TYPE_REVIEW) {
          let rate = parseInt(Math.round(post.rate));
          for (i = 1; i <= 5; i++) {
            if (i <= rate) {
              stars += '<i class="fa fa-star"></i>';
            }
            else {
              stars += '<i class="fa fa-star-o"></i>'
            }
          }
        }
        var showAction = '';
        if(data_user.id == post.user_id){
          showAction =  '<a  class="delete-post" id="'+post.id+'"><i class="fa fa-trash"></i></a>'
        }
        html+='<div class="review-ratting" id="post-'+post.id+'">\
                <img class="avatar-user-post" src="'+ post.user.user_info.avatar_url +'" >\
                <h5 id="user-name" class="entry-title display-inline">'+ post.user.name +'</h5>\
                '+ showAction +'\
                <div class="rating" id="rating-post">'+ stars +'\
                </div>\
                <div class="entry-excerpt" id="content-post">'+ post.content +'</div>\
                <div class="entry-meta-data">\
                  <span class="date">\
                    <i class="fa fa-calendar" id="date-post">&nbsp;'+ moment(post.updated_at).fromNow() +'</i>\
                  </span>\
                </div>\
              </div>'
      });
      $('#contain-posts'+ typePost).html(html);
    }
  });
};
function delPost() {
  $(document).on('click', '.delete-post' ,function (event){    
    event.preventDefault();
    var postId = $(this).attr('id');
    confirm("You really want to delete this?")
    $.ajax({
      url: url_delete + postId,
      type: "DELETE",
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + localStorage.getItem('access_token'),
      },
      success: function(data) {
        $('#post-'+postId+'').remove();
      },
      error: function(data) {
        alert(data.responseJSON.error);
        }
    })
  })
}
