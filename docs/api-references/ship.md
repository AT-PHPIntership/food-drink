## SHIPPING - API

### `POST` Create - Shipping Address
```
/api/ship
```
#### Request Headers
| Key | Value |
|---|---|
|Accept|application\json|
|Authorization|{token_type} {access_token}|

#### Query Param
| Param | Type | Description |
|---|---|---|
| address | string | shipping Address |

#### Sample Request
```json
{
	"address": "21 Trần Duy Hưng",
}
```

#### Response 
```json
{
    "meta": {
        "status": "Successfully",
        "code": 200
    },
    "data": {
        "user": {
            "id": 1,
            "name": "admin",
            "email": "admin@test.com",
            "role": 1,
            "provider_user_id": null,
            "provider": null,
            "user_info": {
                "id": 1,
                "user_id": 1,
                "address": "773 Lucious Lakes\nAllyfort, UT 18232",
                "phone": "251.639.0934 x858",
                "avatar": "default-user-avatar.png",
                "avatar_url": "https://food-drink.com/images/users/default-user-avatar.png"
            },
            "shippings": [
                {
                    "id": 1,
                    "user_id": 1,
                    "address": "21 Trần Duy Hưng",
                    "status": 0
                },
                {
                    "id": 2,
                    "user_id": 1,
                    "address": "21 Thanh Sơn Đà Nẵng",
                    "status": 2
                }
            ]
        }
    }
}
```
