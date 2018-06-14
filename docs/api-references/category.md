## CATEGORY - API

### `GET` Category
```
/api/categories
```
Get list categories

#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json

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
                "id": 1,
                "name": "food",
                "parent_id": 0,
                "level": 0,
                "children": [
                    {
                        "id": 3,
                        "name": "apple",
                        "parent_id": 1,
                        "level": 1,
                        "children": [
                            {
                                "id": 4,
                                "name": "Gala Apple",
                                "parent_id": 3,
                                "level": 2
                            },
                            {
                                "id": 5,
                                "name": "Ambrosia Apple",
                                "parent_id": 3,
                                "level": 2
                            },
                            {
                                "id": 6,
                                "name": "Envy Apple",
                                "parent_id": 3,
                                "level": 2
                            }
                        ]
                    }
                ]
            },
            {
                "id": 2,
                "name": "drink",
                "parent_id": 0,
                "level": 0,
                "children": [
                    {
                        "id": 7,
                        "name": "Beer",
                        "parent_id": 2,
                        "level": 1,
                        "children": [
                            {
                                "id": 8,
                                "name": "Lager Beer",
                                "parent_id": 7,
                                "level": 2
                            },
                            {
                                "id": 9,
                                "name": "Ale Beer",
                                "parent_id": 7,
                                "level": 2
                            },
                            {
                                "id": 10,
                                "name": "Way Beer",
                                "parent_id": 7,
                                "level": 2
                            }
                        ]
                    }
                ]
            }
        ],
        "first_page_url": "http://192.168.33.10/api/categories?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://192.168.33.10/api/categories?page=1",
        "next_page_url": null,
        "path": "http://192.168.33.10/api/categories",
        "per_page": 20,
        "prev_page_url": null,
        "to": 2,
        "total": 2
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
