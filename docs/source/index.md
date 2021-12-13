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


<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Register api

> Example request:

```bash
curl -X POST "http://localhost/api/register" 
```

```javascript
const url = new URL("http://localhost/api/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/register`


<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Login api

> Example request:

```bash
curl -X POST "http://localhost/api/login" 
```

```javascript
const url = new URL("http://localhost/api/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/login`


<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_65cc9fbacf683268ac227e5ff99d780f -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/loans" 
```

```javascript
const url = new URL("http://localhost/api/loans");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/loans`


<!-- END_65cc9fbacf683268ac227e5ff99d780f -->

<!-- START_df9454c320551a9b7960e85ac05be291 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/loans/1" 
```

```javascript
const url = new URL("http://localhost/api/loans/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/loans/{id}`


<!-- END_df9454c320551a9b7960e85ac05be291 -->

<!-- START_ea2f38bb95fe732c124873a826570d66 -->
## api/loans/accept/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/api/loans/accept/1" 
```

```javascript
const url = new URL("http://localhost/api/loans/accept/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/loans/accept/{id}`


<!-- END_ea2f38bb95fe732c124873a826570d66 -->

<!-- START_bb903d6d9d13a0c9b9f8149f3e5fb00a -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/loans/save-loan" 
```

```javascript
const url = new URL("http://localhost/api/loans/save-loan");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/loans/save-loan`


<!-- END_bb903d6d9d13a0c9b9f8149f3e5fb00a -->

<!-- START_275d5e4cd3f545d79f7684f17a7d4a56 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/loans/update-loan/1" 
```

```javascript
const url = new URL("http://localhost/api/loans/update-loan/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/loans/update-loan/{id}`


<!-- END_275d5e4cd3f545d79f7684f17a7d4a56 -->

<!-- START_b8b84638b37db27f6e645113f5c6b9c4 -->
## api/repay/{loan}
> Example request:

```bash
curl -X POST "http://localhost/api/repay/1" 
```

```javascript
const url = new URL("http://localhost/api/repay/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/repay/{loan}`


<!-- END_b8b84638b37db27f6e645113f5c6b9c4 -->


