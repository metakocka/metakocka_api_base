
# 1. JSON Example
**URL** : https://main.metakocka.si/rest/eshop/v1/json/delete_product_partner_code

Request:
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "mk_id":"1600000066",
    "product_partner_info": [
        {
          "mk_id":"1600444974"
        }
      ]    
}
```
Notes :

attribute "mk_id" is required for selection of updated record.

Respond:
```javascript
{
  "opr_code": "0",
  "opr_time_ms": "585"
}
```

