## Post - API

### `DELETE` Post
```
api/posts/{post}
```
Delete The Post
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json
|Authorization|{token_type} {access_token}|
#### Response
```json
{
    "data": {
        "id": 20,
        "user_id": 8,
        "product_id": 8,
        "content": "con chim non tren canh cay",
        "rate": "1.00",
        "type": "2",
        "status": "0",
        "user": {
            "id": 8,
            "name": "ngoc trinh"
        },
        "product": {
            "id":8,
            "name": "money",
        },
        "created_at": "2018-02-08 01:24:23",
        "updated_at": "2018-02-08 02:24:23",
        "deleted_at": "2018-02-08 03:24:23"
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

#### Sample Request
```json
{
	"content": "Repellendus qui adipisci ut nesciunt veniam a dolores",
	"rate": 3,
    "product": 8,
}
```

#### Response
```json
{
    "data": {
        "id": 20,
        "name": "Mychim",
        "user_id": 8,
        "product_id": 8,
        "content": "Repellendus qui adipisci ut nesciunt veniam a dolores",
        "rate": "1.00",
        "type": "2",
        "status": "0",
        "user": {
            "id": 8,
            "name": "ngoc trinh"
        },
        "product": {
            "id":8,
            "name": "money",
        },
        "created_at": "2018-02-08 01:24:23",
        "updated_at": "2018-02-08 02:24:23",
        "deleted_at": "2018-02-08 03:24:23"
    }
}
```
