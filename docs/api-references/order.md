## ORDER - API

### `GET` Orders
```
/api/orders
```
Get list all order
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json|
|Authorization|{token_type} {access_token}|

#### Response
```json
{
    "meta": {
        "status": "Successfully",
        "code": 200
    },
    "data": {
        "id": 3,
        "user_id": 31,
        "total": 1000,
        "status": 3,
        "order_details": [
            {
                "id": 6,
                "order_id": 3,
                "product_id": 9,
                "quantity": 5,
                "price": "199.00",
                "preview": "Maiores eos eaque mollitia repellendus nihil nam iure. Voluptas qui consequatur ea et voluptatum. Molestiae eligendi qui quaerat maiores nesciunt. Fugit aut dolorem nobis mollitia at.",
                "address": "796 Alysha Stravenue Suite 924\nLake Norbertstad, IN 80794-6694",
                "name_product": "Bernie Mayert",
                "image": "default-product.jpg",
                "image_url": "http://192.168.33.10/images/products/default-product.jpg"
            },
            {
                "id": 28,
                "order_id": 3,
                "product_id": 10,
                "quantity": 10,
                "price": "178.00",
                "preview": "Corporis perspiciatis dolore libero sint laborum. In inventore qui minima sunt dolorem laborum. Dolorem et repudiandae non dolor sunt.",
                "address": "3386 Theodora Drive\nGuyview, WY 35416",
                "name_product": "Sarina Satterfield",
                "image": "default-product.jpg",
                "image_url": "http://192.168.33.10/images/products/default-product.jpg"
            }
        ]
    }
}
```
#### Response - Fail
``` json
{
    "error" : "Page not found",
    "code" : 404
}
```

### `GET` Order Detail
```
api/orders/{order}
```
Show order detail
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json |
|Authorization|{token_type} {access_token}|

#### Parameters
| Field | Type | Required | Description |
|---|---|---|---|
| order | int | required | order's id |

#### Response - Success
```json
{
    "meta": {
        "status": "Successfully",
        "code": 200
    },
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 3,
                "order_id": 5,
                "product_id": 13,
                "quantity": 4,
                "price": "49.00",
                "preview": "Quam fugit ratione ut ullam autem doloribus. Quis inventore saepe aut aut porro corrupti quam.",
                "address": "70813 Upton Rue\nWillytown, KS 95823-6140",
                "name_product": "Loy Kris",
                "image": "default-product.jpg",
                "image_product_url": "http://192.168.33.10/images/products/default-product.jpg"
            },
            {
                "id": 7,
                "order_id": 5,
                "product_id": 11,
                "quantity": 4,
                "price": "45.00",
                "preview": "Ducimus natus est maxime dolor enim voluptatibus hic. Deserunt qui non delectus et. Autem reprehenderit molestias itaque enim est eum. Molestiae possimus suscipit eaque ea.",
                "address": "16207 Littel Plain Apt. 222\nLake Kennedi, AK 88921-5425",
                "name_product": "Carole Rohan",
                "image": "default-product.jpg",
                "image_product_url": "http://192.168.33.10/images/products/default-product.jpg"
            }
        ],
        "first_page_url": "http://192.168.33.10/api/orders/5?unit=2&page=1",
        "from": 1,
        "last_page": 4,
        "last_page_url": "http://192.168.33.10/api/orders/5?unit=2&page=4",
        "next_page_url": "http://192.168.33.10/api/orders/5?unit=2&page=2",
        "path": "http://192.168.33.10/api/orders/5",
        "per_page": "2",
        "prev_page_url": null,
        "to": 2,
        "total": 8
    }
}
```

#### Response - Fail
``` json
{
    "error" : "Page not found",
    "code" : 404
}
```
