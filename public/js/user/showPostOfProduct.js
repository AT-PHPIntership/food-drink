var $url = document.location.pathname;
const ENABLE = 1;
getData('/api' + $url + '/posts?status=' + ENABLE);
// get data api show post of product
function getData(url) {
    $.ajax({
        url: url,
        type: "GET",
        header: {
            'Accept': 'application/json',
        },
        success: function(response) {
           showPosts(response.data.data);
           
        }
    });
    
};

// show post to view
function showPosts(data) {
    const TYPE_REVIEW = 2;
    const TYPE_COMMENT = 1;
    var html = '';
    data.forEach(post => {
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
        html+='<div class="col-sm-12">\
                    <img class="avatar-user-post" src="'+ post.user.user_info.avatar_url +'" >\
                    <h5 class="entry-title display-inline">\
                        <a href="single_post.html" id="user-name">'+ post.user.name +'</a>\
                    </h5>\
                    <div class="entry-meta-data">\
                        <span class="date">\
                            <i class="fa fa-calendar" id="date-post">&nbsp;'+ post.created_at +'</i>\
                        </span>\
                    </div>\
                    <div class="rating" id="rating-post">'+ stars +'\
                    </div>\
                    <div class="entry-excerpt" id="content-post">'+ post.content +'</div>\
                </div>'
    });
    $('#contain-posts').append(html);
}
