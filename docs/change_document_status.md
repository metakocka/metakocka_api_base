# change_document_status - change status for sales order (Order Management order)

**Description** : change status of sales order or warehouse receiving note, identified by the mk_id

**URL** : https://main.metakocka.si/rest/eshop/v1/change_document_status

**Type** : POST

**Data parameters**

| Parameter      | Required/Optional | Description                                                                           |
|----------------|-------------------|---------------------------------------------------------------------------------------|
| secret_key     | Required          | Generated API key.                                                                    |
| company_id     | Required          | Internal MK company id.                                                               |
| doc_type       | Required          | Supported types: "sales_order", "warehouse_receiving_note"                            |
| status_code    | Required          | New status of the document. It has the same value as description column in MetaKocka. |
| mk_id          | Required          | Unique internal document identifier                                                   |
| mk_id_list     | Required          | A list of unique internal document indentifiers. This or 'mk_id' can be used.         |
| buyer_order    | _Optional_        | May be used instead of mk_id for doc_type "sales_order"                               |
| api_user_email | _Optional_        | This parameter is used to identify the request user by his email                      |

*All Data parameters are type of "String".

**Request example - mk_id**
```javascript
{
  "secret_key" : "REMOVE_SECRET_KEY",
  "company_id" : "16",
  "doc_type" : "sales_order",
  "status_code" : "created",
  "mk_id" : "1600016978"
}
```

**Request example - mk_id_list**
```javascript
{
  "secret_key" : "REMOVE_SECRET_KEY",
  "company_id" : "16",
  "doc_type" : "sales_order",
  "status_code" : "created",
  "mk_id_list" : [400000003364,400000003363]
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
- status_code is the same value as description column in MetaKocka register form. See image below. 

![](change_document_status_1.png?raw=true)
