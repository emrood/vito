# Vitoo API Documentation 

## Response Codes 
### Response Codes
```
200: Success
400: Bad request
401: Unauthorized
404: Cannot be found
405: Method not allowed
422: Unprocessable Entity 
50X: Server Error
```
### Error Codes Details
```
100: Bad Request
110: Unauthorized
120: User Authenticaion Invalid
130: Parameter Error
140: Item Missing
150: Conflict
160: Server Error
```
### Example Error Message
```json
http code 402
{
    "code": 120,
    "message": "invalid crendetials",
    "resolve": "The username or password is not correct."
}
```

## Login
**You send:**  Your  login credentials.
**You get:** An `Acces_token` with wich you can make further actions.

**Request:**
```json
POST /api/auth/login HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy

{
    "email": "foo@bar.com",
    "password": "1234567" 
}
```
**Successful Response:**
```json
HTTP/1.1 200 OK
Content-Type: application/json
Content-Length: xy

{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xOTIuMTY4LjEuMTEyOjgwMDBcL2FwaVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2MDAzMTAwNDIsImV4cCI6MTYwMDMxMzY0MiwibmJmIjoxNjAwMzEwMDQyLCJqdGkiOiJZRXZHc3Rqc1BEM01GQ21NIiwic3ViIjoxMCwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.8to1diCw4wJsd7c26VOQ0rfMZVCJdcou3wA1-DIvJzM",
    "token_type": "bearer",
    "expires_in": 3600,
    "data": "{\"id\":10,\"name\":\"Agent out\",\"email\":\"checkout@vitohaiti.online\",\"phone_number\":null,\"address\":null,\"sexe\":\"Male\",\"email_verified_at\":null,\"created_at\":\"2020-09-13T11:53:08.000000Z\",\"updated_at\":\"2020-09-13T11:53:08.000000Z\",\"status\":1,\"birthday\":null}"
}
```
**Failed Response:**
```json
HTTP/1.1 401 Unauthorized
Content-Type: application/json
Content-Length: xy

{
    "code": 120,
    "message": "invalid crendetials",
    "resolve": "The username or password is not correct."
}
``` 

## Register
**Request:**
```json
POST /api/auth/register HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy

{
    "name": "foo (required)",
    "email": "foo@bar.com (required)",
    "password": "12223456 (required)",
    "phone_number": "3333333",
    "address": "12223456",
    "sexe": "Male",
}
```
 **Successful Response:**
 ```json
 HTTP/1.1 200 OK
 Content-Type: application/json
 Content-Length: xy
 
 {
     "message": "Register Successfully"
 }
 ```
 **Failed Response:**
 ```json
 HTTP/1.1 401 Unauthorized
 Content-Type: application/json
 Content-Length: xy
 
 {
     "status": false,
     "errors": {
         "email": [
             "The email has already been taken."
         ]
     },
     "message": "The given data was invalid."
 }
 ```
 
 
 ## Users

 **Request:**
 ```json
 GET /api/users HTTP/1.1
 Accept: application/json
 Content-Type: application/json
 Content-Length: xy
```
**Successful Response:**
```json
 [
     {
         "id": 7,
         "name": "Emmanuel Noel",
         "email": "emrood@vitohaiti.online",
         "phone_number": null,
         "address": null,
         "sexe": "Male",
         "email_verified_at": null,
         "created_at": "2020-09-13T11:51:03.000000Z",
         "updated_at": "2020-09-13T11:51:03.000000Z",
         "status": 1,
         "birthday": null
     },
     {
         "id": 8,
         "name": "Michel Audin",
         "email": "handy@vitohaiti.online",
         "phone_number": null,
         "address": null,
         "sexe": "Male",
         "email_verified_at": null,
         "created_at": "2020-09-13T11:52:00.000000Z",
         "updated_at": "2020-09-13T11:52:00.000000Z",
         "status": 1,
         "birthday": null
     },
     
 ]
 ```
 
  ## Events
 
  **Request:**
  ```json
  GET /api/events HTTP/1.1
  Accept: application/json
  Content-Type: application/json
  Content-Length: xy
  ```
  **Successful Response:**
  ```json
  [
      {
          "id": 1,
          "uid": "dj",
          "name": "toto",
          "event_date": "2020-09-10 09:35:02",
          "address": null,
          "image_path": null,
          "ticket_qty": 200,
          "regular_qty": 0,
          "regular_price": 0,
          "vip_qty": 0,
          "vip_price": 0,
          "guest_qty": 0,
          "guest_price": 0,
          "user_id": 1,
          "deleted_at": null,
          "created_at": "2020-09-10T09:35:08.000000Z",
          "updated_at": "2020-09-10T09:35:09.000000Z",
          "status": 1,
          "ticket_price": 0,
          "currency": "HTG"
      },
      {
          "id": 2,
          "uid": "dbub",
          "name": "8748",
          "event_date": "2020-09-10 09:39:32",
          "address": null,
          "image_path": null,
          "ticket_qty": 50,
          "regular_qty": 0,
          "regular_price": 0,
          "vip_qty": 0,
          "vip_price": 0,
          "guest_qty": 0,
          "guest_price": 0,
          "user_id": 2,
          "deleted_at": null,
          "created_at": "2020-09-10T09:39:39.000000Z",
          "updated_at": "2020-09-10T09:39:40.000000Z",
          "status": 1,
          "ticket_price": 0,
          "currency": "HTG"
      }
  ]
  ```
  
## Events
   
**Request:**
```json
GET /api/events HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy
```
**Successful Response:**
```json
[
   {
     "id": 1,
     "uid": "dj",
     "name": "toto",
     "event_date": "2020-09-10 09:35:02",
    },
]
```

**Request:**
```json
GET /api/events/tickets HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy

{
    "event_id": 44,
}

```
**Successful Response:**
```json
[
   {
     "id": 1,
     "uid": "dj",
     "name": "toto",
     "event_date": "2020-09-10 09:35:02",
    },
]
```
