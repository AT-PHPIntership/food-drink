## USER API

### `GET` User Infomation
```
/api/users/{user}
```
Get user's infomation
#### Request Headers
| Key | Value |
|---|---|
| Accept | application\json |
| Authorization | {token_type} {access_token} |

#### Parameter
| Field | Type | Required | Description |
|---|---|---|---|
| user | int | required | User's id |
```json
{
    "meta": {
        "status": "successfuly",
        "code": 200
    },
    "data": {
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
}
```
#### Response - Fail
```json
{
    "meta": {
        "status": "failed",
        "code": 404
    },
    "error": {
        "message": "data not found"
    }
}
```
