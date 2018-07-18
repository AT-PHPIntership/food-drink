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
                "created_at": "2007-08-12 07:34:21",
                "updated_at": "1979-06-11 13:27:46",
                "status_order": "rejected"
            },
            {
                "id": 3,
                "user_id": 1,
                "total": 1000,
                "status": 2,
                "created_at": "1989-09-05 00:16:59",
                "updated_at": "1988-07-20 16:34:45",
                "status_order": "accepted",
            },
            {
                "id": 4,
                "user_id": 1,
                "total": 1000,
                "status": 3,
                "created_at": "1971-03-24 07:25:51",
                "updated_at": "1997-10-14 17:56:36",
                "status_order": "rejected",
            },
            {
                "id": 5,
                "user_id": 1,
                "total": 1000,
                "status": 3,
                "created_at": "1983-04-19 01:12:45",
                "updated_at": "2017-08-14 03:12:07",
                "status_order": "rejected",
            },
            {
                "id": 6,
                "user_id": 1,
                "total": 1000,
                "status": 1,
                "created_at": "2000-11-03 10:35:09",
                "updated_at": "1986-03-24 17:46:27",
                "status_order": "pending",
            }
        ],
        "first_page_url": "http://192.168.33.10/api/orders?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://192.168.33.10/api/orders?page=1",
        "next_page_url": null,
        "path": "http://192.168.33.10/api/orders",
        "per_page": 20,
        "prev_page_url": null,
        "to": 5,
        "total": 5
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
        "order_details": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "order_id": 33,
                    "product_id": 13,
                    "quantity": 3,
                    "price": "142.00",
                    "name_product": "Prof. Jacinto Reichel",
                    "image": "default-product.jpg",
                    "created_at": "1980-08-21 18:01:41",
                    "updated_at": "1997-02-01 12:28:38",
                    "deleted_at": null,
                    "image_url": "http://192.168.33.10/images/products/default-product.jpg"
                },
                {
                    "id": 2,
                    "order_id": 33,
                    "product_id": 10,
                    "quantity": 4,
                    "price": "81.00",
                    "name_product": "Mr. Hobart Strosin II",
                    "image": "default-product.jpg",
                    "created_at": "2004-01-26 20:00:33",
                    "updated_at": "2016-07-29 10:01:10",
                    "deleted_at": null,
                    "image_url": "http://192.168.33.10/images/products/default-product.jpg"
                }
            ],
            "first_page_url": "http://192.168.33.10/api/orders/33?limit=2&page=1",
            "from": 1,
            "last_page": 5,
            "last_page_url": "http://192.168.33.10/api/orders/33?limit=2&page=5",
            "next_page_url": "http://192.168.33.10/api/orders/33?limit=2&page=2",
            "path": "http://192.168.33.10/api/orders/33",
            "per_page": "2",
            "prev_page_url": null,
            "to": 2,
            "total": 9
        },
        "order": {
            "id": 33,
            "user_id": 1,
            "total": 1000,
            "status": 1,
            "address": "412 Runolfsdottir Green\nSouth Abigayleland, AR 96874-2086",
            "created_at": "1980-02-11 08:57:53",
            "updated_at": "2010-06-30 07:51:25",
            "deleted_at": null,
            "status_order": "pending"
        }
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

### `POST` Orders
```
/api/orders
```
Create new order
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json|
|Authorization|{token_type} {access_token}|

#### Query Param
| Param | Type | Description |
|---|---|---|
| user_id | string | Id Of User |
| Total | number | total order |

#### Response - Success
```json
{
    "meta": {
        "status": "Successfully",
        "code": 201
    },
    "data": {
        "order": {
            "total": "2000",
            "address": "43048 Duane Village Suite 319\\nWatsicaville, ME 70645-8172",
            "status": 1,
            "user_id": 2,
            "id": 37,
            "status_order": "pending",
            "order_details": [
                {
                    "id": 37,
                    "order_id": 37,
                    "product_id": 16,
                    "quantity": 1,
                    "price": "200.00",
                    "name_product": "e3232",
                    "image": "default-product.jpg",
                    "image_url": "http://192.168.33.10/images/products/default-product.jpg"
                }
            ]
        },
        "user": {
            "id": 2,
            "name": "Prof. Loyce Padberg",
            "email": "luna28@yahoo.com",
            "role": 0,
            "shippings": [
                {
                    "id": 11,
                    "user_id": 2,
                    "address": "Nisi aut unde error. Cum modi eligendi aspernatur ullam. Est quisquam itaque rerum nesciunt. Deserunt quaerat vel commodi voluptatibus minima et.",
                    "status": 0,
                },
                {
                    "id": 32,
                    "user_id": 2,
                    "address": "43048 Duane Village Suite 319\\nWatsicaville, ME 70645-8172",
                    "status": 0,
                }
            ]
        }
    }
}
```

### `PUT` Orders
```
/api/orders/{order}/cancel
```
Update order
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json|
|Authorization|{token_type} {access_token}|

#### Query Param
| Param | Type | Description |
|---|---|---|
| user_id | string | order's id |

#### Response - Success
```json
    "meta": {
        "status": "Successfully",
        "code": 200
    },
    "data": {
        "id": 4,
        "user_id": 1,
        "total": 1000,
        "status": 3,
        "address": "2251 Dahlia Keys Apt. 706\nPort Kearamouth, MN 82585",
        "created_at": "1992-03-14 05:50:32",
        "updated_at": "1997-02-01 12:35:02",
        "deleted_at": null,
        "status": "rejected",
        "notes": [
            {
                "id": 6,
                "user_id": 1,
                "order_id": 4,
                "content": "asaasdasdasdasd",
                "created_at": "2018-07-05 02:30:45",
                "updated_at": "2018-07-05 02:30:45"
            },
            {
                "id": 6,
                "user_id": 1,
                "order_id": 4,
                "content": "asaasdasdasdasd",
                "created_at": "2018-07-05 02:30:45",
                "updated_at": "2018-07-05 02:30:45"
            },
        ]
    }
```
### `PUT` Update Order And Order_Detail
```
/api/orders/{order}
```
Update Order

#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json|
|Authorization|{token_type} {access_token}|

#### Sample Request
```json
{
	"quantity": 3,
	"total": 6,
	"address": "70813 Upton Rue\nWillytown",
}
```
#### Request Body
| Key | Type | Description |
|---|---|---|
| quantity | number | Numbers Of Product |
| total | number | Total Order |
| address | string | Receiver's Address |

#### Response - Success
```json
{
    "meta": {
        "status": "Successfully",
        "code": 200
    },
    "data": {
        "id": 26,        
        "user_id": 1,
        "total": 6,
        "status": 1,
        "status_order": "pending",
        "address": "70813 Upton Rue\nWillytown, KS 95823-6140",
        "order_details": [
            {
                "id": 18,
                "product_id": 1,
                "order_id": 26,
                "quantity": 3,
                "price": 2,
                "name_product": "Loy Kris",
                "image": "default-product.jpg",
                "image_url": "http://192.168.33.10/images/products/default-product.jpg"
            },
            {
                "id": 19,
                "product_id": 1,
                "order_id": 26,
                "quantity": 3,
                "price": 2,
                "name_product": "Loy Kris",
                "image": "default-product.jpg",
                "image_url": "http://192.168.33.10/images/products/default-product.jpg"
            }
        ]
    }
}
```

#### Response - Fail
```json
{
    "error": {
        "title": [
            "The name field is required."
        ]
    },
    "code": 422
}
```
