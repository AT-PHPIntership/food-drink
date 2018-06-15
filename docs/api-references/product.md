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
| order | string | Type Sort Product |
| limit | number | Top Product |
| category | int | Get Product By Category |

##### Example
| URL | Description |
|---|---|
| /api/products?sort=created_at&limit=10 | Get Top 10 New product |
| /api/products?sort=avg_rate&limit=10 | Get Top 10 Rate product |
| /api/products?category=1 | Get Product By Category Food |

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
                "id": 1,
                "name": "Doris Ledner Sr.",
                "price": "51.00",
                "quantity": 8,
                "category_id": 4,
                "preview": "Id est sed enim soluta ipsum. Adipisci et sunt veniam impedit sunt qui. Ea ipsam mollitia molestiae nam facere libero perspiciatis.",
                "description": "Quia culpa voluptates provident esse voluptatum laborum. Aut sed quo non rerum quam voluptatibus. Quo non saepe doloribus rerum unde.",
                "avg_rate": 2.9,
                "sum_rate": 8,
                "total_rate": 62,
                "created_at": "1998-07-13 20:41:07",
                "updated_at": "1990-10-20 17:15:32",
                "deleted_at": null,
                "category": {
                    "id": 4,
                    "name": "Gala Apple",
                    "parent_id": 3,
                    "created_at": "2018-06-13 04:33:41",
                    "updated_at": "2018-06-13 04:33:41",
                    "deleted_at": null,
                    "level": 2
                },
                "images": []
            },
            {
                "id": 2,
                "name": "Solon Price",
                "price": "50.00",
                "quantity": 1,
                "category_id": 4,
                "preview": "Aliquid illo eos commodi modi itaque repellat. Excepturi est asperiores vero incidunt. Et quisquam at eaque laudantium. Quibusdam exercitationem et velit laboriosam ipsum sed ipsa.",
                "description": "Dolores et itaque non dicta nemo maxime quidem omnis. Hic sit unde occaecati optio voluptatum. Ducimus distinctio non corrupti voluptates sint. Doloribus iste sit corrupti modi reprehenderit et.",
                "avg_rate": 2.2,
                "sum_rate": 12,
                "total_rate": 43,
                "created_at": "1983-11-30 13:42:30",
                "updated_at": "1981-07-06 01:25:33",
                "deleted_at": null,
                "category": {
                    "id": 4,
                    "name": "Gala Apple",
                    "parent_id": 3,
                    "created_at": "2018-06-13 04:33:41",
                    "updated_at": "2018-06-13 04:33:41",
                    "deleted_at": null,
                    "level": 2
                },
                "images": [
                    {
                        "id": 3,
                        "image": "default-product.jpg",
                        "product_id": 2,
                        "created_at": "2018-06-13 04:33:41",
                        "updated_at": "2018-06-13 04:33:41",
                        "deleted_at": null,
                        "image_url": "http://192.168.33.10/images/products/default-product.jpg"
                    }
                ]
            },
            {
                "id": 3,
                "name": "Larue Koch",
                "price": "113.00",
                "quantity": 10,
                "category_id": 6,
                "preview": "Molestias rerum et occaecati. Sunt rerum est nihil aut. Consequuntur nam voluptas reprehenderit fugit impedit. Dolorum vel dolorem iusto nam fuga.",
                "description": "Ea debitis eligendi asperiores praesentium. Facilis vel similique dolor id error nostrum accusantium. Quis facere et est est et qui.",
                "avg_rate": 3,
                "sum_rate": 15,
                "total_rate": 43,
                "created_at": "2001-08-03 19:03:08",
                "updated_at": "2001-08-16 12:58:47",
                "deleted_at": null,
                "category": {
                    "id": 6,
                    "name": "Envy Apple",
                    "parent_id": 3,
                    "created_at": "2018-06-13 04:33:41",
                    "updated_at": "2018-06-13 04:33:41",
                    "deleted_at": null,
                    "level": 2
                },
                "images": [
                    {
                        "id": 8,
                        "image": "default-product.jpg",
                        "product_id": 3,
                        "created_at": "2018-06-13 04:33:41",
                        "updated_at": "2018-06-13 04:33:41",
                        "deleted_at": null,
                        "image_url": "http://192.168.33.10/images/products/default-product.jpg"
                    }
                ]
            },
            {
                "id": 4,
                "name": "Herman Blanda",
                "price": "24.00",
                "quantity": 15,
                "category_id": 3,
                "preview": "Est in tenetur consequatur ut. Assumenda quidem dolor dolorum sapiente aut occaecati aut. Magnam autem dolores quia necessitatibus ut ut iure.",
                "description": "Assumenda voluptatem facere soluta totam eaque minima. Iusto officia est fugit sed sint saepe. Possimus mollitia similique similique maiores amet.",
                "avg_rate": 2.9,
                "sum_rate": 10,
                "total_rate": 65,
                "created_at": "2016-05-22 06:56:46",
                "updated_at": "1988-08-06 23:09:35",
                "deleted_at": null,
                "category": {
                    "id": 3,
                    "name": "apple",
                    "parent_id": 1,
                    "created_at": "2018-06-13 04:33:41",
                    "updated_at": "2018-06-13 04:33:41",
                    "deleted_at": null,
                    "level": 1
                },
                "images": [
                    {
                        "id": 17,
                        "image": "default-product.jpg",
                        "product_id": 4,
                        "created_at": "2018-06-13 04:33:41",
                        "updated_at": "2018-06-13 04:33:41",
                        "deleted_at": null,
                        "image_url": "http://192.168.33.10/images/products/default-product.jpg"
                    }
                ]
            },
            {
                "id": 5,
                "name": "Katarina Sauer",
                "price": "148.00",
                "quantity": 3,
                "category_id": 8,
                "preview": "Dicta pariatur consectetur et sed. Quidem in animi impedit placeat vitae nisi est. Et perspiciatis soluta nostrum beatae.",
                "description": "Et culpa aut adipisci praesentium quae aspernatur rerum. Aspernatur ut voluptas illum aut ratione nihil et.",
                "avg_rate": 4,
                "sum_rate": 6,
                "total_rate": 62,
                "created_at": "1995-12-10 12:04:39",
                "updated_at": "2015-05-18 03:37:45",
                "deleted_at": null,
                "category": {
                    "id": 8,
                    "name": "Lager Beer",
                    "parent_id": 7,
                    "created_at": "2018-06-13 04:33:41",
                    "updated_at": "2018-06-13 04:33:41",
                    "deleted_at": null,
                    "level": 2
                },
                "images": []
            },
            {
                "id": 6,
                "name": "Filomena Hilll",
                "price": "79.00",
                "quantity": 13,
                "category_id": 8,
                "preview": "Iure nemo veniam dolor voluptate. Fugiat consequuntur voluptatum reiciendis optio non numquam. Sunt reiciendis consectetur quia.",
                "description": "Nostrum ipsa sunt officiis nemo ab praesentium cum. Est illum omnis numquam inventore quibusdam ipsum et. Asperiores nisi aut quas deleniti nobis quas qui. Temporibus aut sint enim rerum ut sunt.",
                "avg_rate": 1.1,
                "sum_rate": 12,
                "total_rate": 69,
                "created_at": "2012-01-01 12:53:50",
                "updated_at": "2016-10-08 12:01:29",
                "deleted_at": null,
                "category": {
                    "id": 8,
                    "name": "Lager Beer",
                    "parent_id": 7,
                    "created_at": "2018-06-13 04:33:41",
                    "updated_at": "2018-06-13 04:33:41",
                    "deleted_at": null,
                    "level": 2
                },
                "images": [
                    {
                        "id": 16,
                        "image": "default-product.jpg",
                        "product_id": 6,
                        "created_at": "2018-06-13 04:33:41",
                        "updated_at": "2018-06-13 04:33:41",
                        "deleted_at": null,
                        "image_url": "http://192.168.33.10/images/products/default-product.jpg"
                    }
                ]
            }
        ],
        "first_page_url": "http://192.168.33.10/api/products?limit=6&page=1",
        "from": 1,
        "last_page": 4,
        "last_page_url": "http://192.168.33.10/api/products?limit=6&page=4",
        "next_page_url": "http://192.168.33.10/api/products?limit=6&page=2",
        "path": "http://192.168.33.10/api/products",
        "per_page": "6",
        "prev_page_url": null,
        "to": 6,
        "total": 20
    }
}
```
### `GET` Product Detail
```
/api/products/{products}
```
Get product
##### Example
| URL | Description |
|---|---|
| /api/products/5 | Get Product Detail by id = 5|
#### Response
```json
{
    "meta": {
        "status": "Successfully",
        "code": 200
    },
    "data": {
        "id": 4,
        "name": "Herman Blanda",
        "price": "24.00",
        "quantity": 15,
        "category_id": 3,
        "preview": "Est in tenetur consequatur ut. Assumenda quidem dolor dolorum sapiente aut occaecati aut. Magnam autem dolores quia necessitatibus ut ut iure.",
        "description": "Assumenda voluptatem facere soluta totam eaque minima. Iusto officia est fugit sed sint saepe. Possimus mollitia similique similique maiores amet.",
        "avg_rate": 2.9,
        "sum_rate": 10,
        "total_rate": 65,
        "created_at": "2016-05-22 06:56:46",
        "updated_at": "1988-08-06 23:09:35",
        "deleted_at": null,
        "images": [
            {
                "id": 17,
                "image": "default-product.jpg",
                "product_id": 4,
                "created_at": "2018-06-13 04:33:41",
                "updated_at": "2018-06-13 04:33:41",
                "deleted_at": null,
                "image_url": "http://192.168.33.10/images/products/default-product.jpg"
            }
        ],
        "category": {
            "id": 3,
            "name": "apple",
            "parent_id": 1,
            "created_at": "2018-06-13 04:33:41",
            "updated_at": "2018-06-13 04:33:41",
            "deleted_at": null,
            "level": 1
        }
    }
}
```
