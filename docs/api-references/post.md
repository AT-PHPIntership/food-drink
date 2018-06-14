## Post - API
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
|---|---|---|---|
| product | int | required | Product's id |
| sort | string | optional | Sort Product |
| order | string | optional | Type Sort Product |
| type | int | optional | Get Product By Type |

##### Example
| URL | Description |
|---|---|
| /api/products/{product}/posts?type=2&sort=updated_at | Get Post by type review and sort by updated_at |

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
                "user_id": 8,
                "product_id": 13,
                "content": "Numquam similique veritatis totam perferendis cum natus architecto. In aut dolorum aut similique magnam. Non nulla consequatur nisi totam. Velit vel explicabo ut optio quia id eveniet.",
                "rate": 0,
                "type": 2,
                "created_at": "2017-02-27 15:02:14",
                "updated_at": "2015-04-03 15:38:59",
                "deleted_at": null,
                "status": 0,
                "user": {
                    "id": 8,
                    "name": "Prof. Nestor Reinger III",
                    "email": "verna53@hessel.com",
                    "role": 0,
                    "created_at": "2018-06-14 01:02:45",
                    "updated_at": "2018-06-14 01:02:45",
                    "deleted_at": null,
                    "user_info": {
                        "id": 8,
                        "user_id": 8,
                        "address": "67100 Pierre Islands\nMedhurstbury, NJ 05891",
                        "phone": "241-312-4635",
                        "avatar": "default-user-avatar.png",
                        "created_at": "2018-06-14 01:02:47",
                        "updated_at": "2018-06-14 01:02:47",
                        "deleted_at": null,
                        "avatar_url": "http://192.168.33.10/images/users/default-user-avatar.png"
                    }
                }
            },
            {
                "id": 15,
                "user_id": 24,
                "product_id": 13,
                "content": "In eius nobis modi dolores et nesciunt voluptas cumque. Est deleniti id minus. Rerum laboriosam ut eveniet minus dolore alias quia neque.",
                "rate": 0,
                "type": 1,
                "created_at": "2013-03-24 12:12:53",
                "updated_at": "1986-09-21 01:29:40",
                "deleted_at": null,
                "status": 0,
                "user": {
                    "id": 24,
                    "name": "Dr. Jarod Bruen DVM",
                    "email": "pfeffer.sarah@hotmail.com",
                    "role": 0,
                    "created_at": "2018-06-14 01:02:46",
                    "updated_at": "2018-06-14 01:02:46",
                    "deleted_at": null,
                    "user_info": {
                        "id": 24,
                        "user_id": 24,
                        "address": "87329 Corkery Valleys\nNew Melvinstad, MI 77391",
                        "phone": "+1-515-744-9589",
                        "avatar": "default-user-avatar.png",
                        "created_at": "2018-06-14 01:02:47",
                        "updated_at": "2018-06-14 01:02:47",
                        "deleted_at": null,
                        "avatar_url": "http://192.168.33.10/images/users/default-user-avatar.png"
                    }
                }
            }
        ],
        "first_page_url": "http://192.168.33.10/api/products/13/posts?page=1",
        "from": 1,
        "last_page": 2,
        "last_page_url": "http://192.168.33.10/api/products/13/posts?page=2",
        "next_page_url": "http://192.168.33.10/api/products/13/posts?page=2",
        "path": "http://192.168.33.10/api/products/13/posts",
        "per_page": 5,
        "prev_page_url": null,
        "to": 5,
        "total": 6
    }
}
```

### `DELETE` Post
```
api/posts/{post}
```
Delete The Post
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json |
|Authorization|{token_type} {access_token}|
#### Parameters
| Field | Type | Description |
| --- | --- | --- |
| id | Number | Id of post |

#### Response success
| Field | Type | Description |
|---|---|---|
| meta | Object | Object meta |
| status | String | Status result |
| code | Number | HTTP status code |
#### Response
```json
{
     "meta": {
        "status": "Successfully",
        "code": 200
    },
}
```
#### Response fail
```json
{
    "meta": {
        "status": "Failed",
        "code": 404,
    },
    "error": {
        "message": "Data not found!",
    }
}
```
### `POST` Post
```
/api/posts
```
Create New Post
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json
|Authorization|{token_type} {access_token}|

#### Parameters
| Key | Type | Required | Description |
|---|---|---|---|
| content | String | optional | content post |
| rate | Integer | optional | rate post |
| product | Integer | required | id product |

#### Response - Success
```json
{
    "meta": {
        "status": "Successfully",
        "code": 200,
    },
    "data": {
        "id": 145,
        "content": " Consequuntur beatae est quidem adipisci officia",
        "status": 2,
        "user_id": 1,
        "product_id": 1,
        "rate": 4,
        "type": 2,
        "created_at": "2018-03-06 08:53:31",
        "updated_at": "2018-03-06 08:53:31",
        "user": {
            "id": 8,
            "name": "Prof. Nestor Reinger III",
            "email": "verna53@hessel.com",
            "role": 0,
            "created_at": "2018-06-14 01:02:45",
            "updated_at": "2018-06-14 01:02:45",
            "deleted_at": null,
            "user_info": {
                "id": 8,
                "user_id": 8,
                "address": "67100 Pierre Islands\nMedhurstbury, NJ 05891",
                "phone": "241-312-4635",
                "avatar": "default-user-avatar.png",
                "created_at": "2018-06-14 01:02:47",
                "updated_at": "2018-06-14 01:02:47",
                "deleted_at": null,
                "avatar_url": "http://192.168.33.10/images/users/default-user-avatar.png"
            },
        },
        "product": {
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
        },
    }
}
