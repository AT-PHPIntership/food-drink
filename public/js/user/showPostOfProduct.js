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

var DURATION_IN_SECONDS = {
  epochs: ['year', 'month', 'day', 'hour', 'minute'],
  year: 31536000,
  month: 2592000,
  day: 86400,
  hour: 3600,
  minute: 60
};

function getDuration(seconds) {
  var epoch, interval;
  for (var i = 0; i < DURATION_IN_SECONDS.epochs.length; i++) {
    epoch = DURATION_IN_SECONDS.epochs[i];
    interval = Math.floor(seconds / DURATION_IN_SECONDS[epoch]);
    if (interval >= 1) {
      return {
        interval: interval,
        epoch: epoch
      };
    }
  }
};

function timeSince(date) {
  var seconds = Math.floor((new Date() - new Date(date)) / 1000);
  var duration = getDuration(seconds);
  var suffix = (duration.interval > 1 || duration.interval === 0) ? 's' : '';
  return duration.interval + ' ' + duration.epoch + suffix;
};

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
                    <i class="fa fa-calendar" id="date-post">&nbsp;'+ timeSince(post.updated_at) +'</i> '+ Lang.get('cart.ago') +'\
                  </span>\
                </div>\
              </div>'
      });
      $('#contain-posts'+ typePost).append(html);
    }
  });
};
