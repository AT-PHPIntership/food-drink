## PRODUCT - API

### `GET` Product
```
/api/products
```
Get product
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json

#### Query Param
| Param | Type | Description |
|---|---|---|
| sort | string | Sort Product |
| sort_type | string | Type Sort Product |
| limit | string | Top Product |
| category | string | Get Product By Category |

##### Example
| URL | Description |
|---|---|
| /api/products?sort=new&limit=10 | Get Top 10 New product |
| /api/products?category=1 | Get Product By Category Food |

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
            "category_id": 1,
            "avg_rate": 4.5,
            "price": "161.00",
            "category": {
                "id": 1,
                "name": "food",
                "parent_id": "0"
            },
            "created_at": "2008-11-05 18:17:09",
            "updated_at": "2008-11-05 18:17:09",
            "deleted_at": null
        },
        {
            "id": 3,
            "name": "Aidan Hintz",
            "image": "default-product.jpg",
            "category_id": 2,
            "avg_rate": 4,
            "price": "129.00",
            "category": {
                "id": 2,
                "name": "drink",
                "parent_id": "0"
            },
            "created_at": "1987-02-01 15:20:34",
            "updated_at": "2008-11-05 18:17:09",
            "deleted_at": null
        },
        {
            "id": 5,
            "name": "Fredrick Schamberger",
            "image": "default-product.jpg",
            "category_id": 1,
            "avg_rate": 3.8,
            "price": "153.00",
            "category": {
                "id": 1,
                "name": "food",
                "parent_id": "0"
            },
            "created_at": "1987-02-01 15:20:34",
            "updated_at": "2008-11-05 18:17:09",
            "deleted_at": null
        },
        {
            "id": 6,
            "name": "Sebastian Reichert",
            "image": "default-product.jpg",
            "category_id": 1,
            "avg_rate": 3.7,
            "price": "96.00",
            "category": {
                "id": 3,
                "name": "apple",
                "parent_id": "1"
            },
            "created_at": "1987-02-01 15:20:34",
            "updated_at": "2008-11-05 18:17:09",
            "deleted_at": null
        },
        {
            "id": 8,
            "name": "Ahmad Mitchell",
            "image": "default-product.jpg",
            "category_id": 2,
            "avg_rate": 3.7,
            "price": "89.00",
            "category": {
                "id": 2,
                "name": "Ambrosia Apple",
                "parent_id": "3"
            },
            "created_at": "1987-02-01 15:20:34",
            "updated_at": "2008-11-05 18:17:09",
            "deleted_at": null
        },
        {
            "id": 12,
            "name": "Electa Hayes DDS",
            "image": "default-product.jpg",
            "category_id": 1,
            "avg_rate": 3.5,
            "price": "50.00",
            "category": {
                "id": 1,
                "name": "food",
                "parent_id": "0"
            },
            "created_at": "1987-02-01 15:20:34",
            "updated_at": "2008-11-05 18:17:09",
            "deleted_at": null
        },
        {
            "id": 14,
            "name": "Prof. Lula O'Kon V",
            "image": "default-product.jpg",
            "category_id": 1,
            "avg_rate": 3.4,
            "price": "195.00",
            "category": {
                "id": 1,
                "name": "food",
                "parent_id": "0"
            },
            "created_at": "1987-02-01 15:20:34",
            "updated_at": "2008-11-05 18:17:09",
            "deleted_at": null
        },
        {
            "id": 15,
            "name": "Prof. Lula O'Kon V",
            "image": "default-product.jpg",
            "category_id": 1,
            "avg_rate": 3.4,
            "price": "195.00",
            "category": {
                "id": 1,
                "name": "food",
                "parent_id": "0"
            },
            "created_at": "1987-02-01 15:20:34",
            "updated_at": "2008-11-05 18:17:09",
            "deleted_at": null
        },
        {
            "id": 21,
            "name": "Prof. Lula O'Kon V",
            "image": "default-product.jpg",
            "category_id": 2,
            "avg_rate": 3.4,
            "price": "195.00",
            "category": {
                "id": 2,
                "name": "drink",
                "parent_id": "0"
            },
            "created_at": "1987-02-01 15:20:34",
            "updated_at": "2008-11-05 18:17:09",
            "deleted_at": null
        },
        {
            "id": 22,
            "name": "Brionna Breitenberg",
            "image": "default-product.jpg",
            "category_id": 1,
            "avg_rate": 3.3,
            "price": "75.00",
            "category": {
                "id": 1,
                "name": "food",
                "parent_id": "0"
            },
            "created_at": "1987-02-01 15:20:34",
            "updated_at": "2008-11-05 18:17:09",
            "deleted_at": null
        }
    ]
}
```
