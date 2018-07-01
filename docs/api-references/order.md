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

#### Query Param
| Param | Type | Description |
|---|---|---|
| sort | string | Sort Order |
| order | string | Type Sort Order |
| limit | number | Top Order |

##### Example   
| URL | Description |
|---|---|
| /api/orders?sort=created_at&order=asc&limit=5 | Sort order by create and get top 5 order |
#### Response

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
               "id": 2,
               "user_id": 1,
               "total": 1000,
               "status": 3,
               "address": "5125 Delbert LocksShaniefort, NY 03740-0073",
               "created_at": "2007-08-12 07:34:21",
               "updated_at": "1979-06-11 13:27:46",
           },
           {
               "id": 3,
               "user_id": 1,
               "total": 1000,
               "status": 2,
               "address": "5125 Delbert LocksShaniefort, NY 03740-0073",
               "created_at": "1989-09-05 00:16:59",
               "updated_at": "1988-07-20 16:34:45",
           },
           {
               "id": 4,
               "user_id": 1,
               "total": 1000,
               "status": 3,
               "address": "5125 Delbert LocksShaniefort, NY 03740-0073",
               "created_at": "1971-03-24 07:25:51",
               "updated_at": "1997-10-14 17:56:36",
           },
           {
               "id": 5,
               "user_id": 1,
               "total": 1000,
               "status": 3,
               "address": "5125 Delbert LocksShaniefort, NY 03740-0073",
               "created_at": "1983-04-19 01:12:45",
               "updated_at": "2017-08-14 03:12:07",
           },
           {
               "id": 6,
               "user_id": 1,
               "total": 1000,
               "status": 1,
               "address": "5125 Delbert LocksShaniefort, NY 03740-0073",
               "created_at": "2000-11-03 10:35:09",
               "updated_at": "1986-03-24 17:46:27",
               "note": {
                    "id": 1,
                    "user_id": 1,
                    "order_id": 3,
                    "content": "a",
                }
           },
       ],
       "first_page_url": "http://192.168.33.10/api/orders?page=1",
       "from": 1,
       "last_page": 1,
       "last_page_url": "http://192.168.33.10/api/orders?page=1",
       "next_page_url": null,
       "path": "http://192.168.33.10/api/orders",
       "per_page": 20,
       "prev_page_url": null,
       "to": 7,
       "total": 7
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
