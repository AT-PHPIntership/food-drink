## USER - API

### `GET` User Infomation
```
/api/user
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
    "error": "Page not found",
    "code": 404,
}
```

### `POST` Login
```
/api/login
```
Login User
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Query Param
| Key | Value | Description |
|---|---|---|
| email | email | User's Email |
| password | password | User's Password |

#### Response - Success
```json
{
    "meta": {
        "status": "Successfully",
        "code": 200
    },
    "data": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijg1M2Q3Y2U1ODdhNWZmY2I1MDNlZWFmZGRjNmNlYjNlOWZmM2Q4NDFlNTJlMTljZjYzMTk3MGE2MTRiNGFjZDljMzYzODAwMGI0OTlhZDNjIn0.eyJhdWQiOiIzIiwianRpIjoiODUzZDdjZTU4N2E1ZmZjYjUwM2VlYWZkZGM2Y2ViM2U5ZmYzZDg0MWU1MmUxOWNmNjMxOTcwYTYxNGI0YWNkOWMzNjM4MDAwYjQ5OWFkM2MiLCJpYXQiOjE1MjkwMzE4NDMsIm5iZiI6MTUyOTAzMTg0MywiZXhwIjoxNTYwNTY3ODQzLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.C1IE07D9AThUsVC2kmfRJRUvfKlySYQvBIIfQ0i2dTI-Afrr_Sm_uy5UJjh95OOO191abyKNYo6ak4kSHQzyNwYdXFCVyc9wX8UrgqDmhXEycJFCBNQTuF3rgs0z-01qurz3FoRcHoQ3BeXBdXDgl2FW6haBFj705U6PvcUuge1rlZs90K6fODz4CysW5U-5qYp10wA7-2kI1RDsnhHEga8crtFQxh2ugNSrCrNF8bozu0OSq8YgUUUdoOwSBmGYruYHWjtGPYTVlRKoNdsCELnscq_z-9FrvNQtSaWmV7wbLq3ydE1Nb4vkRI4C469hw53G31MSLTxDRk_QGjLLwtmeu5H69yAPAGvGYUjFP3vfJlyksJcZMqtX1Zd4v5wQwnddGv186riLbSMwHCDoUXUpQV903kNqGIez600EV0V3VQk8FLtH-_jMtIE21X838ED8Cx7KQNJOke9if2yjagDOpMx7V11siSEO72rCkmP2hYOpXE1Xa1vhVTcp3k708hEngNvtXnVLerui8r1vEA8M4we1tyIuuDCtOCsaIpNE7fIqrH4sK4gDQOVhLL0rGBiiqxtL3MsCwl87KKRAL2LsZXvsUh6EF7Tq-Hu1xJgwNrcNGs3xDkkxxLEtiVg1bcMzsbdGy7C9PJKEoJ02B7mhBMZ3l9KKOyVoSHe_4n4",
        "user": {
            "id": 1,
            "name": "admin",
            "email": "admin@test.com",
            "role": 1,
            "user_info": {
                "id": 1,
                "user_id": 1,
                "address": "227 Kerluke Fields\nWest Brennan, TX 08544-6989",
                "phone": "821-248-2046",
                "avatar": "default-user-avatar.png",
                "avatar_url": "http://192.168.33.10/images/users/default-user-avatar.png"
            }
        }
    }
}
```
#### Response - Fail
``` json
{
    "error": "Unauthorised",
    "code": 401
}
```
### `POST` Logout
```
/api/logout
```
Logout User
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer $token

#### Response
 _Success_
 