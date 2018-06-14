## POST - API

### `GET` Post
```
/api/products/{product}/posts
```
Get product
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json

#### Query Param
| Param | Type | Required | Description |
|---|---|---|
| product | int | required | Product's id |
| sort | string | No | Sort Product |
| order | string | No | Type Sort Product |
| type | int | No | Get Product By Type |

##### Example
| URL | Description |
|---|---|
| /api/products{product}/posts?sort=updated_at | Get Post and sort by updated_at |
| /api/products{product}/posts?type=1 | Get Product By Type Comment |

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
                "id": 19,
                "name": "Joany Boehm",
                "price": "187.00",
                "quantity": 2,
                "category_id": 8,
                "preview": "Fugiat commodi aliquid tempore consequatur ad. Aspernatur ut quaerat cumque voluptatibus quisquam ut doloremque nesciunt.",
                "description": "Sequi enim ea quia nihil. Est autem adipisci dicta. Consectetur neque nam ab ut et veritatis.",
                "avg_rate": 3.8,
                "sum_rate": 9,
                "total_rate": 21,
                "created_at": "1980-11-04 03:26:30",
                "updated_at": "1996-01-22 20:35:36",
                "deleted_at": null,
                "category": {
                    "id": 8,
                    "name": "Lager Beer",
                    "parent_id": 7,
                    "created_at": "2018-06-14 01:02:47",
                    "updated_at": "2018-06-14 01:02:47",
                    "deleted_at": null,
                    "level": 2
                },
                "images": [
                    {
                        "id": 2,
                        "image": "default-product.jpg",
                        "product_id": 19,
                        "created_at": "2018-06-14 01:02:47",
                        "updated_at": "2018-06-14 01:02:47",
                        "deleted_at": null,
                        "image_url": "http://192.168.33.10/images/products/default-product.jpg"
                    },
                    {
                        "id": 6,
                        "image": "default-product.jpg",
                        "product_id": 19,
                        "created_at": "2018-06-14 01:02:47",
                        "updated_at": "2018-06-14 01:02:47",
                        "deleted_at": null,
                        "image_url": "http://192.168.33.10/images/products/default-product.jpg"
                    }
                ]
            },
            {
                "id": 8,
                "name": "Wanda Koepp",
                "price": "30.00",
                "quantity": 2,
                "category_id": 8,
                "preview": "In quod aliquam ea non. Reiciendis porro ut quae. Qui autem consequuntur vero quos praesentium. Distinctio eum iure est eos. Quo impedit provident tenetur molestias et.",
                "description": "Suscipit velit incidunt velit vel ipsum. Aut quo beatae esse quo quia dolores quo. In sit possimus consequatur vel et quidem. Natus reiciendis nam assumenda suscipit consequatur ut qui.",
                "avg_rate": 2.3,
                "sum_rate": 12,
                "total_rate": 10,
                "created_at": "1994-11-30 18:53:29",
                "updated_at": "2010-08-04 16:52:50",
                "deleted_at": null,
                "category": {
                    "id": 8,
                    "name": "Lager Beer",
                    "parent_id": 7,
                    "created_at": "2018-06-14 01:02:47",
                    "updated_at": "2018-06-14 01:02:47",
                    "deleted_at": null,
                    "level": 2
                },
                "images": [
                    {
                        "id": 14,
                        "image": "default-product.jpg",
                        "product_id": 8,
                        "created_at": "2018-06-14 01:02:47",
                        "updated_at": "2018-06-14 01:02:47",
                        "deleted_at": null,
                        "image_url": "http://192.168.33.10/images/products/default-product.jpg"
                    }
                ]
            },
            {
                "id": 18,
                "name": "Annalise Harber IV",
                "price": "35.00",
                "quantity": 8,
                "category_id": 1,
                "preview": "Maiores numquam dolores ad nihil error veritatis. At et eius voluptatem ut tenetur.",
                "description": "Aspernatur nesciunt possimus dolor deleniti voluptatibus ducimus. Voluptas repudiandae quae maxime ducimus nisi debitis aspernatur tempore. Sequi et corporis quos ut numquam ut aliquam.",
                "avg_rate": 1,
                "sum_rate": 1,
                "total_rate": 36,
                "created_at": "1995-02-21 09:51:56",
                "updated_at": "1986-04-03 06:15:49",
                "deleted_at": null,
                "category": {
                    "id": 1,
                    "name": "food",
                    "parent_id": 0,
                    "created_at": "2018-06-14 01:02:47",
                    "updated_at": "2018-06-14 01:02:47",
                    "deleted_at": null,
                    "level": 0
                },
                "images": [
                    {
                        "id": 23,
                        "image": "1528938624_524e30e771dba8110c0241a0882023d0.jpg",
                        "product_id": 18,
                        "created_at": "2018-06-14 01:10:24",
                        "updated_at": "2018-06-14 01:10:24",
                        "deleted_at": null,
                        "image_url": "http://192.168.33.10/images/products/1528938624_524e30e771dba8110c0241a0882023d0.jpg"
                    }
                ]
            }
        ],
        "first_page_url": "http://192.168.33.10/api/products?sort=avg_rate&order=desc&page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://192.168.33.10/api/products?sort=avg_rate&order=desc&page=1",
        "next_page_url": null,
        "path": "http://192.168.33.10/api/products",
        "per_page": 20,
        "prev_page_url": null,
        "to": 20,
        "total": 20
    }
}
```