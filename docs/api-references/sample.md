## Flappy Api - Just sample API

### `GET` Birds
```
/api/birds
```
Get list all birds with paginate
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json

#### Response
```json
{
    "data": [
        {
            "id": 1,
            "name": "Chimchitbong",
            "category_id": 9,
            "image": "http://hoichim.test/images/birds/image.png",
            "description": "beteoteo",
            "category": {
                "id": 9,
                "name": "I can fly"
            }
        },
        {
            "id": 2,
            "name": "Chimcanhcut",
            "category_id": 8,
            "image": "http://hoichim.test/images/birds/image.png",
            "description": "beonucnic",
            "category": {
                "id": 8,
                "name": "I can't fly"
            }
        },
        {
            "id": 3,
            "name": "Chimcanhcut",
            "category_id": 8,
            "image": "http://hoichim.test/images/birds/image.png",
            "description": "beonucnic",
            "category": {
                "id": 8,
                "name": "I can't fly"
            }
        },
        {
            "id": 4,
            "name": "Dadieu",
            "category_id": 8,
            "image": "http://hoichim.test/images/birds/image.png",
            "description": "Tonhuvoi",
            "category": {
                "id": 8,
                "name": "I can't fly"
            }
        },
        {
            "id": 5,
            "name": "Chimdaibang",
            "category_id": 9,
            "image": "http://hoichim.test/images/birds/image.png",
            "description": "Chimcuacacloaichim",
            "category": {
                "id": 8,
                "name": "I can fly"
            }
        },
    ],
    "meta": {
        "pagination": {
            "total": 134,
            "count": 5,
            "per_page": 5,
            "current_page": 1,
            "total_pages": 26,
            "links": {
                "next": "http://hoichim.test/birds?page=2"
            }
        }
    }
}
```

### `POST` Birds
```
/api/birds
```
Create new bird
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json
|Authorization|{token_type} {access_token}|

#### Parameters
| Key | Type | Required | Description |
|---|---|---|---|
| name | String | required | Bird name |
| category | Integer | required | Bird category |
| image | String | optional | Bird image |
| description | String  | optional | Bird information |

#### Sample Request
```json
{
	"name": "Mychim",
	"category": 8,
	"image": "",
	"description": "Bird",
}
```

#### Response
```json
{
    "data": {
        "id": 20,
        "name": "Mychim",
        "category_id": 8,
        "image": "http://hoichim.test/images/birds/image.png",
        "description": "Bird",
        "category": {
            "id": 8,
            "name": "I can't fly"
        },
        "created_at": "2018-02-08 01:24:23",
        "updated_at": "2018-02-08 01:24:23",
        "deleted_at": ""
    }
}
```

### `PUT` Birds
```
/api/birds/20
```
Update the bird
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json
|Authorization|{token_type} {access_token}|

#### Parameters
| Key | Type | Required | Description |
|---|---|---|---|
| name | String | required | Bird name |
| category | Integer | required | Bird category |
| image | String | optional | Bird image |
| description | String  | optional | Bird information |

#### Sample Request
```json
{
	"name": "Mychim",
	"category": 8,
	"image": "http://hoichim.test/images/birds/mybird.png",
	"description": "Bird",
}
```

#### Response
```json
{
    "data": {
        "id": 20,
        "name": "Mychim",
        "category_id": 8,
        "image": "http://hoichim.test/images/birds/mybird.png",
        "description": "Bird",
        "category": {
            "id": 8,
            "name": "I can't fly"
        },
        "created_at": "2018-02-08 01:24:23",
        "updated_at": "2018-02-08 02:24:23",
        "deleted_at": ""
    }
}
```

### `PUT` Birds - Validation
```
/api/birds/20
```
Update the bird error validation
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json
|Authorization|{token_type} {access_token}|

#### Parameters
| Key | Type | Required | Description |
|---|---|---|---|
| name | String | required | Bird name |
| category | Integer | required | Bird category |
| image | String | optional | Bird image |
| description | String  | optional | Bird information |

#### Sample Request
```json
{
	"name": "",
	"category": 8,
	"image": "http://hoichim.test/images/birds/mybird.png",
	"description": "Bird Update",
}
```

#### Response
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


### `DELETE` Birds
```
/api/birds/20
```
Delete the bird
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
        "name": "Mychim",
        "category_id": 8,
        "image": "http://hoichim.test/images/birds/mybird.png",
        "description": "Bird",
        "category": {
            "id": 8,
            "name": "I can't fly"
        },
        "created_at": "2018-02-08 01:24:23",
        "updated_at": "2018-02-08 02:24:23",
        "deleted_at": "2018-02-08 03:24:23"
    }
}
```
