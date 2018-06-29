$(document).ready(function () {
  $.ajax({
    type: 'GET',
    url: '/api/orders',
    headers: { 'authorization': 'Bearer '+ localStorage.getItem('access_token') },
    success: function (response){
      console.log(response);
      getListOrder(response);
    }
  });
});

function getListOrder(response) {
  var html = '';
  // response.data.data.forEach(element => {
  $.each(response.data.data, function (index, element) {
    html += '<tr>\
              <td class="cart_product">'+ (index + 1) +'</td>\
              <td class="cart_description">'+ element.created_at +'</td>\
              <td class="price">$'+ element.total +'</td>\
              <td class="qty">'+ element.status +'</td>\
              <th class="qty function">\
                <a href="">Detail</a>\
                <a href="">Delete</a>\
              </th>\
            </tr>';
  });
  $('#show-orders').append(html);
}