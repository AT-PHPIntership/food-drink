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
            "name": "food",
            "parent_id": 0,
            "created_at": "2018-06-05 09:51:29",
            "updated_at": "2018-06-05 09:51:29",
            "deleted_at": null,
            "level": 0,
            "sub_category": [
                {
                    "id": 3,
                    "name": "apple",
                    "parent_id": 1,
                    "created_at": "2018-06-05 09:51:29",
                    "updated_at": "2018-06-05 09:51:29",
                    "deleted_at": null,
                    "level": 1,
                    "sub_category": [
                        {
                            "id": 4,
                            "name": "Gala Apple",
                            "parent_id": 3,
                            "created_at": "2018-06-05 09:51:29",
                            "updated_at": "2018-06-05 09:51:29",
                            "deleted_at": null,
                            "level": 2
                        },
                        {
                            "id": 5,
                            "name": "Ambrosia Apple",
                            "parent_id": 3,
                            "created_at": "2018-06-05 09:51:29",
                            "updated_at": "2018-06-05 09:51:29",
                            "deleted_at": null,
                            "level": 2
                        },
                        {
                            "id": 6,
                            "name": "Envy Apple",
                            "parent_id": 3,
                            "created_at": "2018-06-05 09:51:29",
                            "updated_at": "2018-06-05 09:51:29",
                            "deleted_at": null,
                            "level": 2
                        },
                        {
                            "id": 14,
                            "name": "ahihia",
                            "parent_id": 3,
                            "created_at": "2018-06-07 07:33:34",
                            "updated_at": "2018-06-07 07:33:34",
                            "deleted_at": null,
                            "level": 0
                        }
                    ]
                },
                {
                    "id": 11,
                    "name": "asdasd",
                    "parent_id": 1,
                    "created_at": "2018-06-07 07:32:16",
                    "updated_at": "2018-06-07 07:32:16",
                    "deleted_at": null,
                    "level": 0,
                    "sub_category": []
                }
            ]
        },
        {
            "id": 2,
            "name": "drink",
            "parent_id": 0,
            "created_at": "2018-06-05 09:51:29",
            "updated_at": "2018-06-05 09:51:29",
            "deleted_at": null,
            "level": 0,
            "sub_category": [
                {
                    "id": 7,
                    "name": "Beer",
                    "parent_id": 2,
                    "created_at": "2018-06-05 09:51:29",
                    "updated_at": "2018-06-05 09:51:29",
                    "deleted_at": null,
                    "level": 1,
                    "sub_category": [
                        {
                            "id": 8,
                            "name": "Lager Beer",
                            "parent_id": 7,
                            "created_at": "2018-06-05 09:51:29",
                            "updated_at": "2018-06-05 09:51:29",
                            "deleted_at": null,
                            "level": 2
                        },
                        {
                            "id": 9,
                            "name": "Ale Beer",
                            "parent_id": 7,
                            "created_at": "2018-06-05 09:51:29",
                            "updated_at": "2018-06-05 09:51:29",
                            "deleted_at": null,
                            "level": 2
                        },
                        {
                            "id": 10,
                            "name": "Way Beer",
                            "parent_id": 7,
                            "created_at": "2018-06-05 09:51:29",
                            "updated_at": "2018-06-05 09:51:29",
                            "deleted_at": null,
                            "level": 2
                        }
                    ]
                },
                {
                    "id": 12,
                    "name": "ahihi",
                    "parent_id": 2,
                    "created_at": "2018-06-07 07:33:00",
                    "updated_at": "2018-06-07 07:33:00",
                    "deleted_at": null,
                    "level": 0,
                    "sub_category": []
                },
                {
                    "id": 13,
                    "name": "aa",
                    "parent_id": 2,
                    "created_at": "2018-06-07 07:33:13",
                    "updated_at": "2018-06-07 07:33:13",
                    "deleted_at": null,
                    "level": 0,
                    "sub_category": []
                }
            ]
        },
    ]
}
```