var $jsBuildCategory = $('#js-build-category');
$(document).ready(function(){
  $.ajax({
    url: "/api/categories",
    type: "GET",
    success: function(response) {
      console.log(response);
      buildNav(response.data.data, $jsBuildCategory);
      toggle();
    }
  });
});

function buildNav(data, container) {
  var ul = $('<ul></ul>');
  container.append(ul);
  $.each(data, function(i, val) {
    var newContainer = $(
                        '<li>\
                          <input type="radio" id="jtv'+ val.id +'" name="jtvc" class="filter-category change-type" value="'+ val.id +'">\
                          <a href="#">'+val.name+'</a>\
                        </li>'
                      );
    container.children('ul').append(newContainer);
    $('#js-build-category ul').addClass('check-box-list-categories');
    if (val.children) {
      buildNav(val.children, newContainer);
    }
  });
}

function toggle() {
  $('a', $jsBuildCategory).click(function(e) {
    e.preventDefault();
    $(this).next().slideToggle(200);
  });
}
