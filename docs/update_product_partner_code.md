
# 1. JSON Example
**URL** : https://main.metakocka.si/rest/eshop/v1/json/update_product_partner_code

Request:
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "mk_id":"1600000066",
    "product_partner_info": [
        {
          "mk_id":"1600444939",	
          "product_code": "bbb",
          "partner_id": "1600106702"
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
  "opr_time_ms": "181",
  "mk_id": "1600000066",
  "count_code": "PA_102_PA",
  "product_partner_info_mk_id": [
    "1600444939",
    "1600444940"
  ]
}
```

