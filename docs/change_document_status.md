# change_document_status - change status for sales order (Order Management order)

**Description** : change status of sales order, identified by mk_id

**URL** : https://main.metakocka.si/rest/eshop/v1/change_document_status

**Type** : POST

**Request example**
```javascript
{
  "secret_key" : "REMOVE_SECRET_KEY",
  "company_id" : "16",
  "doc_type" : "sales_order",
  "status_code" : "created",
  "mk_id" : "1600016978",
}
```

**Respond example**
```javascript
{
  "opr_code":"0",
  "opr_time_ms":"38"
}
```

**Request example - identified request user by his email**
```javascript
{
  "secret_key" : "REMOVE_SECRET_KEY",
  "company_id" : "16",
  "doc_type" : "sales_order",
  "status_code" : "created",
  "mk_id" : "1600016978",
  "api_user_email" : "test@metakocka.si"
}
```

**Request example - identified request by buyer order**
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type" : "sales_order",
  	"status_code" : "created",
  	"buyer_order" : "79473216"
}
```

**Notes**
- status_code is the some value as description column in MetaKocka register form. See image below. 

![](change_document_status_1.png?raw=true)
