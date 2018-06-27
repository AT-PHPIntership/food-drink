const ENABLE = 1;
const TYPE_REVIEW = 2;
const TYPE_COMMENT = 1;
var path = document.location.pathname;
$(document).ready(function () {
  const ENABLE = 1;
  // show review
  getData('/api' + path + '/posts?type='+ TYPE_REVIEW +'&status=' + ENABLE +'&sort=updated_at&order=desc', TYPE_REVIEW);
  // show comment
  getData('/api' + path + '/posts?type='+ TYPE_COMMENT +'&status=' + ENABLE +'&sort=updated_at&order=desc', TYPE_COMMENT);
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
        html+='<div class="review-ratting">\
                <img class="avatar-user-post" src="'+ post.user.user_info.avatar_url +'" >\
                <h5 id="user-name" class="entry-title display-inline">'+ post.user.name +'</h5>\
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
      $('#contain-posts'+ typePost).append(html);
    }
  });
};
