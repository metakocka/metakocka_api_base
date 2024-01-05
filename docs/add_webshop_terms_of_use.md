# add_webshop_terms_of_use - Add terms of use file to webshop

**Description** : Add terms of use file to webshop, identified by the mk_id or name

**URL** : https://main.metakocka.si/rest/eshop/v1/add_webshop_terms_of_use

**Type** : POST

**Data parameters**

| Parameter       | Required/Optional | Description             |
|-----------------|-------------------|-------------------------|
| secret_key      | Required          | Generated API key.      |
| company_id      | Required          | Internal MK company ID. |
| eshop_sync_name | Required          | Eshop name              |
| eshop_sync_id   | Required          | Internal MK eshop ID    |
| file_name       | Required          | File name               |
| file_content    | Required          | Base64 encoded file     |

* All Data parameters are type of "String".
* Either eshop_sync_name or eshop_sync_id is required. If both are set, ID has priority.

**Request example**
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "eshop_sync_id":"1600359372",
    "file_name":"termsOfUse.pdf",
    "file_content":"JVBERi0xLjQKJeLjz9MKNCAwI/UM2MbO5d4bWOnUqvKute7tmfP..."
}
```

**Respond example**
```javascript
{
  "opr_code":"0",
  "opr_time_ms":"38"
}
```

**Request example - eshop identified by name**
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "eshop_sync_name":"MK Demo trgovina",
    "file_name":"termsOfUse.pdf",
    "file_content":"JVBERi0xLjQKJeLjz9MKNCAwI/UM2MbO5d4bWOnUqvKute7tmfP..."
}
```