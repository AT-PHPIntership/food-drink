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
