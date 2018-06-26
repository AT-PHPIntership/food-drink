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
        "id": 3,
        "user_id": 31,
        "total": 1000,
        "status": 3,
        "created_at": "1982-07-04 21:11:53",
        "updated_at": "2013-06-15 18:30:21",
        "deleted_at": null,
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
                "created_at": "1972-04-22 19:16:21",
                "updated_at": "1993-04-28 19:22:28",
                "deleted_at": null,
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
                "created_at": "1974-10-26 22:54:26",
                "updated_at": "1992-07-15 05:44:16",
                "deleted_at": null,
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
