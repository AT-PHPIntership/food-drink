## PRODUCT - API

### `GET` Top 10 new product
```
/api/products?sort=new?limit=10
```
Get top 10 new product
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json

#### Response
```json
{
    "meta": {
        "status": "Successfully",
        "code": 200
    },
    "data": [
        {
            "name": "Aidan Hintz",
            "image": "default-product.jpg",
            "avg_rate": 4,
            "price": "129.00",
            "product_id": 11,
            "created_at": "2017-10-09 07:35:05"
        },
        {
            "name": "Alexanne O'Conner",
            "image": "default-product.jpg",
            "avg_rate": 2.9,
            "price": "58.00",
            "product_id": 5,
            "created_at": "2016-12-09 04:31:54"
        },
        {
            "name": "Fredrick Schamberger",
            "image": "default-product.jpg",
            "avg_rate": 3.8,
            "price": "153.00",
            "product_id": 1,
            "created_at": "2010-12-31 01:10:00"
        },
        {
            "name": "Joe Cassin DVM",
            "image": "default-product.jpg",
            "avg_rate": 4.5,
            "price": "161.00",
            "product_id": 12,
            "created_at": "2010-10-29 11:36:19"
        },
        {
            "name": "Ms. Jeanette Jakubowski III",
            "image": "default-product.jpg",
            "avg_rate": 1.5,
            "price": "108.00",
            "product_id": 15,
            "created_at": "2008-11-05 18:17:09"
        },
        {
            "name": "Prof. Lula O'Kon V",
            "image": "default-product.jpg",
            "avg_rate": 3.4,
            "price": "195.00",
            "product_id": 7,
            "created_at": "2001-04-16 23:29:16"
        },
        {
            "name": "Ahmad Mitchell",
            "image": "default-product.jpg",
            "avg_rate": 3.7,
            "price": "89.00",
            "product_id": 8,
            "created_at": "2000-09-26 06:24:48"
        },
        {
            "name": "Brionna Breitenberg",
            "image": "default-product.jpg",
            "avg_rate": 3.3,
            "price": "75.00",
            "product_id": 17,
            "created_at": "2000-04-04 21:02:00"
        },
        {
            "name": "Jeff Bahringer",
            "image": "default-product.jpg",
            "avg_rate": 2.3,
            "price": "46.00",
            "product_id": 16,
            "created_at": "1994-01-23 02:09:50"
        },
        {
            "name": "Derick Weissnat",
            "image": "default-product.jpg",
            "avg_rate": 2.9,
            "price": "116.00",
            "product_id": 20,
            "created_at": "1987-02-01 15:20:34"
        }
    ]
}
```

### `GET` Top 10 rate product
```
/api/products?sort=rate?limit=10
```
Get top 10 rate product
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json

#### Response
```json
{
    "meta": {
        "status": "Successfully",
        "code": 200
    },
    "data": [
        {
            "name": "Joe Cassin DVM",
            "image": "default-product.jpg",
            "avg_rate": 4.5,
            "price": "161.00"
        },
        {
            "name": "Aidan Hintz",
            "image": "default-product.jpg",
            "avg_rate": 4,
            "price": "129.00"
        },
        {
            "name": "Fredrick Schamberger",
            "image": "default-product.jpg",
            "avg_rate": 3.8,
            "price": "153.00"
        },
        {
            "name": "Sebastian Reichert",
            "image": "default-product.jpg",
            "avg_rate": 3.7,
            "price": "96.00"
        },
        {
            "name": "Ahmad Mitchell",
            "image": "default-product.jpg",
            "avg_rate": 3.7,
            "price": "89.00"
        },
        {
            "name": "Electa Hayes DDS",
            "image": "default-product.jpg",
            "avg_rate": 3.5,
            "price": "50.00"
        },
        {
            "name": "Prof. Lula O'Kon V",
            "image": "default-product.jpg",
            "avg_rate": 3.4,
            "price": "195.00"
        },
        {
            "name": "Prof. Lula O'Kon V",
            "image": "default-product.jpg",
            "avg_rate": 3.4,
            "price": "195.00"
        },
        {
            "name": "Prof. Lula O'Kon V",
            "image": "default-product.jpg",
            "avg_rate": 3.4,
            "price": "195.00"
        },
        {
            "name": "Brionna Breitenberg",
            "image": "default-product.jpg",
            "avg_rate": 3.3,
            "price": "75.00"
        }
    ]
}
```

### `GET` Product by category `Food` and `Drink`
```
/api/products?category=1
```
Get product by category food
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json

#### Response
```json
{
    "meta": {
        "status": "Successfully",
        "code": 200
    },
    "data": [
        {
            "id": 1,
            "name": "Joe Cassin DVM",
            "image": "default-product.jpg",
            "avg_rate": 4.5,
            "price": "161.00",
            "category": {
                "id": 1,
                "name": "food"
            }
        },
        {
            "id": 3,
            "name": "Aidan Hintz",
            "image": "default-product.jpg",
            "avg_rate": 4,
            "price": "129.00",
            "category": {
                "id": 2,
                "name": "drink"
            }
        },
        {
            "id": 5,
            "name": "Fredrick Schamberger",
            "image": "default-product.jpg",
            "avg_rate": 3.8,
            "price": "153.00",
            "category": {
                "id": 1,
                "name": "food"
            }
        },
        {
            "id": 6,
            "name": "Sebastian Reichert",
            "image": "default-product.jpg",
            "avg_rate": 3.7,
            "price": "96.00",
            "category": {
                "id": 1,
                "name": "food"
            }
        },
        {
            "id": 8,
            "name": "Ahmad Mitchell",
            "image": "default-product.jpg",
            "avg_rate": 3.7,
            "price": "89.00",
            "category": {
                "id": 2,
                "name": "drink"
            }
        },
        {
            "id": 12,
            "name": "Electa Hayes DDS",
            "image": "default-product.jpg",
            "avg_rate": 3.5,
            "price": "50.00",
            "category": {
                "id": 1,
                "name": "food"
            }
        },
        {
            "id": 14,
            "name": "Prof. Lula O'Kon V",
            "image": "default-product.jpg",
            "avg_rate": 3.4,
            "price": "195.00",
            "category": {
                "id": 1,
                "name": "food"
            }
        },
        {
            "id": 15,
            "name": "Prof. Lula O'Kon V",
            "image": "default-product.jpg",
            "avg_rate": 3.4,
            "price": "195.00",
            "category": {
                "id": 1,
                "name": "food"
            }
        },
        {
            "id": 21,
            "name": "Prof. Lula O'Kon V",
            "image": "default-product.jpg",
            "avg_rate": 3.4,
            "price": "195.00",
            "category": {
                "id": 2,
                "name": "drink"
            }
        },
        {
            "id": 22,
            "name": "Brionna Breitenberg",
            "image": "default-product.jpg",
            "avg_rate": 3.3,
            "price": "75.00",
            "category": {
                "id": 1,
                "name": "food"
            }
        }
    ],
    "pagination": {
            "total": 32,
            "per_page": 10,
            "count": 10,
            "current_page": 1,
            "total_pages": 4,
            "links": {
                "next": "http://192.168.33.10/api/product?category=1&page=2"
            }
}
```
