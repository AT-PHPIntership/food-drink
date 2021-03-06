## USER - API

### `GET` User Infomation
```
/api/profile
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
        "status": "Successfully",
        "code": 200
    },
    "data": {
        "user": {
            "id": 2,
            "name": "Ms. Heaven Jacobs",
            "email": "stark.emmie@yahoo.com",
            "role": 0,
            "created_at": "2018-07-16 04:35:50",
            "updated_at": "2018-07-16 04:35:50",
            "deleted_at": null,
            "user_info": {
                "id": 2,
                "user_id": 2,
                "address": "43671 Hildegard Turnpike\nWest Tessieshire, NM 76347-0095",
                "phone": "+1.359.643.7535",
                "avatar": "default-user-avatar.png",
                "created_at": "2018-07-16 04:35:53",
                "updated_at": "2018-07-16 04:35:53",
                "deleted_at": null,
                "avatar_url": "https://food-drink.com/images/users/default-user-avatar.png"
            },
            "shippings": [
                {
                    "id": 1,
                    "user_id": 2,
                    "address": "Quam necessitatibus qui qui temporibus accusantium. Possimus quas quia consequatur. Voluptatibus dignissimos enim et.",
                    "created_at": "1992-03-01 10:03:55",
                    "updated_at": "2008-12-16 17:23:08",
                    "deleted_at": null
                },
                {
                    "id": 25,
                    "user_id": 2,
                    "address": "Quaerat perferendis libero minima et ea quia et. Veritatis quis omnis rerum dolor aut voluptatem reprehenderit. A et labore ea vero similique.",
                    "created_at": "1984-12-27 06:50:17",
                    "updated_at": "1977-01-17 21:05:51",
                    "deleted_at": null
                }
            ]
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
 ### `POST` Register
```
/api/register
```
Register user

#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Parameter
| Field | Type | Required | Description |
|---|---|---|---|
| name | string | required | User name |
| email | string | required | User email |
| user_info | int | required | User info |
| address | string | optional | User address |
| phone | int | required | User phone |
| avatar | string | optional | User avatar |


#### Response - Success
``` json
{
    "meta": {
        "status": "Successfully",
        "code": 200
    },
    "data": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImNlNGNmNWRiNDJkYjc5YmZlOWQ4N2I3Yzc1MmI1MTUwNWZlNTRmYTY2MDFkNDhiMDM2MDIxN2QwYzgyMjNmYmViNWI5NWNiYzFlOWJhZmUxIn0.eyJhdWQiOiIzIiwianRpIjoiY2U0Y2Y1ZGI0MmRiNzliZmU5ZDg3YjdjNzUyYjUxNTA1ZmU1NGZhNjYwMWQ0OGIwMzYwMjE3ZDBjODIyM2ZiZWI1Yjk1Y2JjMWU5YmFmZTEiLCJpYXQiOjE1MjkyNTA1NjYsIm5iZiI6MTUyOTI1MDU2NiwiZXhwIjoxNTYwNzg2NTY2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.YAEL6lShLqNsIRWDLfrAztrA16-EeZjQMnjy-Lnh9Ij0mpdsF_-sqr0QZ-9bKf1NSx1V1xjGWaenKPC8DIDzZec0OK1Ign18EAytO4o1gJF_GcQBfn1_zejR59dV1XN-22yJxuplFAxrQR7BU6y_nL9AZhGeh4Z3tLIv7Tl4VPAF6zXke4WmiUc3shoWGsUI-4yxShwWqORwktYskk-lCjd-7I7c1IunAbvtF7D4RivmLThqUS7wXOVa-No49ScFBzdPxJpcMQIx_N0OzqLWO8K5ISElPh6tUFTTNg_8tOuSL1yLQLDJLHEVrx0VUUs2pEaGUAKQ452bALBk2sxn2ZXy8-OhyvnLd4i0upJI04bKz6gZQFvae_IgiqZnMye6bBEdPpKpf6xzK_Aqq1sG89KhzUF6X_O4IzUcfCJN1-0f3OcyeG332pyF31r7z1NaYbMxltQAkTghlcJE2JKz2XnA_hWVGebKVJifJ427kYlirqeHN00LEYe8uhBPi9YWLygYDITIUa0SFuWn2unlY2eMrm0eh-ZH1Q-e5DPAjD5rtf_b-pjICdOhaxQnHZbO8W0XxpYeoUchn3o_iBKMCp0qGnl-8YGQKg1uA3k7siZhhvKHe5WVpx13NMn6eunJU7kfyutVEBZIxsPysuVjvufMectlPWA-J-kbXxSA5bo",
        "data": {
            "id": 1,
            "name": "abcxyz",
            "email": "abcxyz@gmail.com",
            "user_info": {
                "id": 1,
                "user_id": 1,
                "address": "12 DN",
                "phone": "0913",
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
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email has already been taken."
        ]
    },
    "code": 422,
    "request": {
        "name": "abcxyz",
        "email": "abcxyz@gmail.com",
        "role": 1,
        "password": "123456789",
        "address": "12 Da Nang",
        "phone": "0913"
    }
}
```

### `PUT` Edit Profile
```
/api/profile
```
Edit profile

#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Parameter
| Field | Type | Required | Description |
|---|---|---|---|
| name | string | required | User name |
| email | string | required | User email |
| user_info | int | required | User info |
| address | string | optional | User address |
| phone | int | required | User phone |
| avatar | string | optional | User avatar |


#### Response - Success
``` json
{
    "meta": {
        "status": "Successfully",
        "code": 200
    },
    "data": {
        "id": 2,
        "name": "ahihi",
        "email": "frami.karina@treutel.com",
        "role": 0,
        "shippings": [
            {
                "id": 2,
                "user_id": 2,
                "address": "Consequatur voluptatem aut maxime non illum. Minima iure ratione nihil est. Voluptatem aliquam provident voluptatem aliquid hic nisi recusandae. Magnam eos impedit beatae ut unde assumenda.",
                "status": 0
            },
            {
                "id": 33,
                "user_id": 2,
                "address": "43048 Duane Village Suite 319\\nWatsicaville, ME 70645-8172",
                "status": 1
            }
        ],
        "user_info": {
            "id": 2,
            "user_id": 2,
            "address": "2dasdasd",
            "phone": "216486",
            "avatar_url": "http://192.168.33.10/images/users/default-user-avatar.png"
        }
    }
}
```
#### Response - Fail
``` json
{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email has already been taken."
        ]
    },
    "code": 422,
    "request": {
        "name": "abcxyz",
        "email": "abcxyz@gmail.com",
        "role": 1,
        "password": "123456789",
        "address": "12 Da Nang",
        "phone": "0913"
    }
}
```