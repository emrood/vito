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
 
 **Request:**
 ```json
 GET /api/roles HTTP/1.1
 Accept: application/json
 Content-Type: application/json
 Content-Length: xy
 
 ```
 **Successful Response:**
 ```json
[
    {
        "id": 1,
        "name": "Administrator",
        "created_at": "2020-09-10T15:37:13.000000Z",
        "updated_at": "2020-09-10T15:37:14.000000Z"
    },
    {
        "id": 2,
        "name": "Agent_out",
        "created_at": "2020-09-10T15:37:30.000000Z",
        "updated_at": "2020-09-10T15:37:30.000000Z"
    },
    {
        "id": 3,
        "name": "Agent_in",
        "created_at": "2020-09-10T15:37:40.000000Z",
        "updated_at": "2020-09-10T15:37:41.000000Z"
    },
    {
        "id": 4,
        "name": "Supervisor",
        "created_at": "2020-09-10T15:38:05.000000Z",
        "updated_at": "2020-09-10T15:38:05.000000Z"
    }
]
 ```
 
 **Request:**
  ```json
  GET /api/role/user HTTP/1.1
  Accept: application/json
  Content-Type: application/json
  Content-Length: xy
  
  {
      "user_id": 1,
  }
  
  ```
  **Successful Response:**
  ```json
  [
      {
          "id": 1,
          "name": "Administrator",
          "created_at": "2020-09-10T15:37:13.000000Z",
          "updated_at": "2020-09-10T15:37:14.000000Z",
          "pivot": {
              "user_id": 1,
              "role_id": 1
          }
      }
  ]
  ```
  
**Request: Get user assignation**
```json
GET /api/user/assign HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy
 
{
   "user_id": 1,
}
    
```
**Successful Response:**
```json
{
  "id": 1,
  "user_id": 3,
  "event_id": 2,
  "status": "enable",
  "event": {
          "id": 1,
      },

}
```

**Request: register user assignation**
```json
POST /api/user/assign HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy
 
{
   "user_id": 1,
   "event_id": 1,
}
    
```
**Successful Response:**
```json
{
  "error": false,
  "message": "Assign succes !",

}
```
  
  
   **Request:**
   ```json
   GET /api/user/devices HTTP/1.1
   Accept: application/json
   Content-Type: application/json
   Content-Length: xy
   
   {
         "user_id": 1,
   }
     
  ```
  **Successful Response:**
  ```json
   [
       {
           "id": 1,
           "model": "V2",
           "manufacturer": "LG",
           "user_id": 1,
           "uid": null,
           "imei": "561235495",
           "serial_number": "BGLODJ",
           "ip_address": "10.6.89.6",
           "mac_address": "fe:25:78:96",
           "status": "active",
           "deleted_at": null,
           "created_at": "2020-09-18T13:02:44.000000Z",
           "updated_at": "2020-09-18T13:02:45.000000Z"
       }
   ]
   ```
   
 **Request:**
 ```json
 GET /api/user/tickets HTTP/1.1
 Accept: application/json
 Content-Type: application/json
 Content-Length: xy
   
 {
    "user_id": 1,
 }
      
 ```
 **Successful Response:**
 ```json
 [
       {
             "id": 1708,
             "qr_code": "3A9D1DD43B",
             "image_path": "qrcodes/barcodes/3A9D1DD43B.svg",
             "event_id": 4,
             "user_id": 1,
             "status": "in",
             "created_at": "2020-09-11T11:06:17.000000Z",
             "updated_at": "2020-09-13T23:55:09.000000Z",
             "encoding": "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVV3N2Zz4K....",
             "checked": 1,
             "tag": "regular"
         },
         {
             "id": 1709,
             "qr_code": "B78A255E6A",
             "image_path": "qrcodes/barcodes/B78A255E6A.svg",
             "event_id": 4,
             "user_id": 1,
             "status": "in",
             "created_at": "2020-09-11T11:06:17.000000Z",
             "updated_at": "2020-09-13T23:55:46.000000Z",
             "encoding": "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVV3N2Zz4K....",
             "checked": 1,
             "tag": "regular"
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
 

**Request:**
```json
GET /api/tickets HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy

{
    "event_id": 4,
}

```
**Successful Response:**
```json
[
    {
        "id": 1708,
        "qr_code": "3A9D1DD43B",
        "image_path": "qrcodes/barcodes/3A9D1DD43B.svg",
        "event_id": 4,
        "user_id": 6,
        "status": "in",
        "created_at": "2020-09-11T11:06:17.000000Z",
        "updated_at": "2020-09-13T23:55:09.000000Z",
        "encoding": "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVV3N2Zz4K....",
        "checked": 1,
        "tag": "regular"
    },
    {
        "id": 1709,
        "qr_code": "B78A255E6A",
        "image_path": "qrcodes/barcodes/B78A255E6A.svg",
        "event_id": 4,
        "user_id": 6,
        "status": "in",
        "created_at": "2020-09-11T11:06:17.000000Z",
        "updated_at": "2020-09-13T23:55:46.000000Z",
        "encoding": "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVV3N2Zz4K....",
        "checked": 1,
        "tag": "regular"
    },
]
```

**Request:**
```json
GET /api/events/products HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy

{
    "event_id": 4,
}

```
**Successful Response:**
```json
[
    {
        "id": 1,
        "event_id": 4,
        "product_id": 1,
        "price": 250,
        "currency": "HTG",
        "initial": 300,
        "sold": 0,
        "deleted_at": null,
        "created_at": "2020-09-18T12:13:29.000000Z",
        "updated_at": "2020-09-18T12:13:30.000000Z",
        "product": {
            "id": 1,
            "name": "Woowo",
            "barcode": "123456",
            "image_path": null,
            "deleted_at": null,
            "created_at": "2020-09-18T16:11:59.000000Z",
            "updated_at": "2020-09-18T16:11:59.000000Z"
        }
    }
]

 ## Products

 **Request:**
 ```json
 GET /api/products HTTP/1.1
 Accept: application/json
 Content-Type: application/json
 Content-Length: xy
```
**Successful Response:**
```json
 [
     {
         "id": 1,
         "name": "Prestige",
         "barcode": "123456",
         "image_path": "img/products/prestige.png",
         "deleted_at": null,
         "created_at": "2020-09-18T16:11:59.000000Z",
         "updated_at": "2020-09-18T16:11:59.000000Z"
     }
 ]
 ```
 
 **Request:**
 ```json
 POST /api/products HTTP/1.1
 Accept: application/json
 Content-Type: application/json
 Content-Length: xy
 
 {
     "name": "Heineken",
     "barcode": "123456789",
 }
 
 ```
 **Successful Response:**
 ```json
{
    "error": false,
    "message": "Product saved !"
}
 ```
 
 
**Request:**
```json
POST /api/products/sold HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy
 
{
    "event_id": 4,
    "barcode": "025887458",
    "quantity": 1,
    "cashier_user_id": 1,
    "stock_user_id": 1,
}
 
```
**Successful Response:**
```json
{
    "error": false,
    "message": "Sale registered !"
}
```
 
  
**Request:**
```json
POST /api/products/initial HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy
   
{
   "event_id": 4,
   "product_id": 6,
   "initial": 500,
}
    
```
**Successful Response:**
```json
{
   "error": false,
   "message": "Stock registered !"
}
```
  
  
 ## Devices

 **Request:**
 ```json
 GET /api/devices HTTP/1.1
 Accept: application/json
 Content-Type: application/json
 Content-Length: xy
```
**Successful Response:**
```json
 [
     {
         "id": 1,
         "model": "V2",
         "manufacturer": "LG",
         "user_id": 1,
         "uid": null,
         "imei": "561235495",
         "serial_number": "BGLODJ",
         "ip_address": "10.6.89.6",
         "mac_address": "fe:25:78:96",
         "status": "active",
         "deleted_at": null,
         "created_at": "2020-09-18T13:02:44.000000Z",
         "updated_at": "2020-09-18T13:02:45.000000Z"
     }
 ]
 ```

**Request:**
```json
POST /api/devices HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy
   
{
   "model": "Galaxy S5",
   "manufacturer": "Samsung",
   "imei": "s25dojif87986",
   "mac_address": "fe:89:09:08:98:09",
   "ip_address": "110.98.23.4",
   "user_id": 1,
}
    
```
**Successful Response:**
```json
{
   "error": false,
   "message": "Device registered !"
}
```

 ## Pointofsales

 **Request:**
 ```json
 GET /api/pointofsales HTTP/1.1
 Accept: application/json
 Content-Type: application/json
 Content-Length: xy
```
**Successful Response:**
```json
 [
     {
         "id": 1,
         "model": "P2",
         "manufacturer": "Mobiware",
         "user_id": 1,
         "uid": null,
         "imei": "561235495",
         "serial_number": "BGO987GYH",
         "ip_address": "10.6.89.6",
         "mac_address": "fe:25:78:96",
         "status": "active",
         "deleted_at": null,
         "created_at": "2020-09-18T13:02:44.000000Z",
         "updated_at": "2020-09-18T13:02:45.000000Z"
     }
 ]
 ```

**Request:**
```json
POST /api/pointofsales HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy
   
{
   "model": "V2",
   "manufacturer": "Sunmi",
   "imei": "s25dojif87986",
   "mac_address": "fe:89:09:08:98:09",
   "ip_address": "110.98.23.4",
   "user_id": 1,
}
    
```
**Successful Response:**
```json
{
   "error": false,
   "message": "Pointofsale registered !"
}
```

