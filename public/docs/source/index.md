---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_2e1c96dcffcfe7e0eb58d6408f1d619e -->
## api/auth/register

> Example request:

```bash
curl -X POST "http://localhost:8000/api/auth/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/auth/register",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/auth/register`


<!-- END_2e1c96dcffcfe7e0eb58d6408f1d619e -->

<!-- START_a925a8d22b3615f12fca79456d286859 -->
## api/auth/login

> Example request:

```bash
curl -X POST "http://localhost:8000/api/auth/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/auth/login",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/auth/login`


<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_01b4f7a78fbe6f0a73ead095ad68c9c4 -->
## api/auth/register

> Example request:

```bash
curl -X GET "http://localhost:8000/api/auth/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/auth/register",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "message": "SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'name' cannot be null (SQL: insert into `users` (`guid`, `name`, `test`, `email`, `password`, `updated_at`, `created_at`) values (79f1fbbf-ab46-4d95-b853-07a4ffb067f8, , 0, , $2y$10$nxLpJo\/PQNWdwkpywLX03.rpt1gs\/3LpyXIVVVXlL9tZ5uzDGdlWS, 2018-02-28 05:53:54, 2018-02-28 05:53:54))"
}
```

### HTTP Request
`GET api/auth/register`

`HEAD api/auth/register`


<!-- END_01b4f7a78fbe6f0a73ead095ad68c9c4 -->

<!-- START_6978a0959240ec9da8cc7dfe703c4a4f -->
## api/auth/login

> Example request:

```bash
curl -X GET "http://localhost:8000/api/auth/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/auth/login",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "response": "error",
    "message": "invalid credentials"
}
```

### HTTP Request
`GET api/auth/login`

`HEAD api/auth/login`


<!-- END_6978a0959240ec9da8cc7dfe703c4a4f -->

<!-- START_b22a15d3b2fa896cba2eb96f1d65176f -->
## api/get/{what}

> Example request:

```bash
curl -X POST "http://localhost:8000/api/get/{what}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/get/{what}",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/get/{what}`


<!-- END_b22a15d3b2fa896cba2eb96f1d65176f -->

<!-- START_b391c93d7c5c4f06dda5b445507e7cde -->
## api/get/{what}

> Example request:

```bash
curl -X GET "http://localhost:8000/api/get/{what}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/get/{what}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/get/{what}`

`HEAD api/get/{what}`


<!-- END_b391c93d7c5c4f06dda5b445507e7cde -->

