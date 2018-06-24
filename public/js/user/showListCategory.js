var $jsBuildCategory = $('#js-build-category');
$(document).ready(function(){
  $.ajax({
    url: "/api/categories",
    type: "GET",
    success: function(response) {
      buildNav(response.data.data, $jsBuildCategory);
      toggle();
			$(".check-box-list input:checkbox").change(function(){
				$("input:checkbox[name='"+$(this).attr("name")+"']").not(this).prop("checked",false);
      });
    }
  });
});

function buildNav(data, container) {
  var ul = $('<ul></ul>');
  container.append(ul);
  $.each(data, function(i, val) {
    var newContainer = $(
												'<li>\
													<input type="checkbox" id="jtv'+ val.id +'" name="jtvc" class="filter-category" value="'+ val.id +'">\
													<label for="jtv'+ val.id +'">\
														<span class="button"></span>\
														<a href="#">'+val.name+'</a>\
													</label>\
												</li>'
											);
    container.children('ul').append(newContainer);
    $('#js-build-category ul').addClass('check-box-list');
    if (val.children) {
      buildNav(val.children, newContainer);
    }
  });
}

function toggle() {
  $('label a', $jsBuildCategory).click(function(e) {
    e.preventDefault();
    $(this).next().slideToggle(200);
  });
}
