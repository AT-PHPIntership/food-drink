$( document ).ready(function() {
    console.log( "ready!" );
    $.get('api/products?sort=created_at&order=desc&limit=' + limit, function(data){
    
    });
});