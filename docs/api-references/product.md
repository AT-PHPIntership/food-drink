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
| limit | number | Top Product |
| category | int | Get Product By Category |

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
            "id": 11,
            "name": "Mr. Rickey Lowe DVM",
            "price": "141.00",
            "quantity": 9,
            "category_id": 7,
            "preview": "Et enim inventore sed incidunt fugit aut quia. Et sed et doloremque adipisci ad. Et non qui minus recusandae doloribus est reiciendis.",
            "description": "Odit corporis sunt iusto a culpa. Voluptatem omnis tenetur exercitationem possimus eum quia maiores. Quia et ut facilis voluptatem et eligendi ad. Rem eum libero sequi sit.",
            "avg_rate": 1.2,
            "sum_rate": 15,
            "total_rate": 34,
            "created_at": "1978-06-26 08:42:07",
            "updated_at": "2016-11-07 16:00:42",
            "deleted_at": null,
            "category": {
                "id": 7,
                "name": "Beer",
                "parent_id": 2,
                "created_at": "2018-06-06 07:32:14",
                "updated_at": "2018-06-06 07:32:14",
                "deleted_at": null,
                "level": 1
            },
            "images": [
                {
                    "id": 9,
                    "image": "default-product.jpg",
                    "product_id": 9,
                    "created_at": "2018-06-06 07:32:15",
                    "updated_at": "2018-06-06 07:32:15",
                    "deleted_at": null
                }
            ]
        },
        {
            "id": 1,
            "name": "Karen Leffler",
            "price": "47.00",
            "quantity": 15,
            "category_id": 4,
            "preview": "Laudantium repudiandae velit dolores veniam ut et. Aut dolor eius voluptas. Sed voluptatem recusandae voluptas et dolorem odit.",
            "description": "Et vitae ducimus explicabo repellat. Quibusdam natus quod qui et corporis. Velit doloribus recusandae accusantium veritatis necessitatibus eius ullam.",
            "avg_rate": 1.4,
            "sum_rate": 3,
            "total_rate": 38,
            "created_at": "1979-06-07 03:03:06",
            "updated_at": "1991-04-27 22:54:46",
            "deleted_at": null,
            "category": {
                "id": 4,
                "name": "Gala Apple",
                "parent_id": 3,
                "created_at": "2018-06-06 07:32:14",
                "updated_at": "2018-06-06 07:32:14",
                "deleted_at": null,
                "level": 2
            },
            "images": [
                {
                    "id": 1,
                    "image": "default-product.jpg",
                    "product_id": 1,
                    "created_at": "2018-06-06 07:32:15",
                    "updated_at": "2018-06-06 07:32:15",
                    "deleted_at": null
                },
                {
                    "id": 6,
                    "image": "default-product.jpg",
                    "product_id": 1,
                    "created_at": "2018-06-06 07:32:15",
                    "updated_at": "2018-06-06 07:32:15",
                    "deleted_at": null
                },
                {
                    "id": 11,
                    "image": "default-product.jpg",
                    "product_id": 1,
                    "created_at": "2018-06-06 07:32:15",
                    "updated_at": "2018-06-06 07:32:15",
                    "deleted_at": null
                }
            ]
        },
        {
            "id": 8,
            "name": "Dr. Jamaal Beier Jr.",
            "price": "26.00",
            "quantity": 9,
            "category_id": 1,
            "preview": "Velit similique quo saepe in. Voluptatem ad iusto recusandae molestias. Nobis et ut qui qui.",
            "description": "Debitis magnam omnis repellendus rerum et quisquam dolor. Excepturi ratione occaecati doloremque facilis nam unde. Quod aspernatur aut distinctio voluptatum soluta dolorem.",
            "avg_rate": 4.4,
            "sum_rate": 15,
            "total_rate": 62,
            "created_at": "1980-06-04 23:40:38",
            "updated_at": "1994-12-14 17:50:31",
            "deleted_at": null,
            "category": {
                "id": 1,
                "name": "food",
                "parent_id": 0,
                "created_at": "2018-06-06 07:32:14",
                "updated_at": "2018-06-06 07:32:14",
                "deleted_at": null,
                "level": 0
            },
            "images": [
                {
                    "id": 3,
                    "image": "default-product.jpg",
                    "product_id": 8,
                    "created_at": "2018-06-06 07:32:15",
                    "updated_at": "2018-06-06 07:32:15",
                    "deleted_at": null
                }
            ]
        },
        {
            "id": 12,
            "name": "Alessandro Cartwright",
            "price": "121.00",
            "quantity": 8,
            "category_id": 10,
            "preview": "Assumenda repellendus delectus expedita. Doloribus sapiente molestiae et doloribus. Est quis provident aut voluptas voluptas.",
            "description": "Eligendi aut aut illum quis. Qui rerum perferendis similique sed exercitationem animi necessitatibus. Voluptatem quia adipisci sint quae.",
            "avg_rate": 4,
            "sum_rate": 1,
            "total_rate": 79,
            "created_at": "1983-05-18 12:37:40",
            "updated_at": "1988-10-13 18:23:41",
            "deleted_at": null,
            "category": {
                "id": 10,
                "name": "Way Beer",
                "parent_id": 7,
                "created_at": "2018-06-06 07:32:14",
                "updated_at": "2018-06-06 07:32:14",
                "deleted_at": null,
                "level": 2
            },
            "images": [
                {
                    "id": 9,
                    "image": "default-product.jpg",
                    "product_id": 9,
                    "created_at": "2018-06-06 07:32:15",
                    "updated_at": "2018-06-06 07:32:15",
                    "deleted_at": null
                }
            ]
        },
        {
            "id": 9,
            "name": "Darron Torphy",
            "price": "113.00",
            "quantity": 5,
            "category_id": 8,
            "preview": "Esse quas molestiae officiis cum officia quam. Libero nobis corrupti esse temporibus tempore labore. Qui qui suscipit accusamus deserunt illum.",
            "description": "In sed at sit voluptatem. Error doloremque in dicta. Impedit voluptatem illum eveniet ullam et saepe qui.",
            "avg_rate": 2.9,
            "sum_rate": 5,
            "total_rate": 19,
            "created_at": "1985-04-02 13:46:44",
            "updated_at": "1988-11-11 14:52:23",
            "deleted_at": null,
            "category": {
                "id": 8,
                "name": "Lager Beer",
                "parent_id": 7,
                "created_at": "2018-06-06 07:32:14",
                "updated_at": "2018-06-06 07:32:14",
                "deleted_at": null,
                "level": 2
            },
            "images": [
                {
                    "id": 9,
                    "image": "default-product.jpg",
                    "product_id": 9,
                    "created_at": "2018-06-06 07:32:15",
                    "updated_at": "2018-06-06 07:32:15",
                    "deleted_at": null
                }
            ]
        },
    ]
}
```
