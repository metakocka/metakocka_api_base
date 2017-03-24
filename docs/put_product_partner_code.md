
# 1. JSON Example
**URL** : https://main.metakocka.si/rest/eshop/v1/json/put_product_partner_code

Request:
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "mk_id":"1600000066",
    "product_partner_info": [
        {
          "product_code": "t12345",
          "product_name": "sifra_partner",
          "partner_id": "1600113924"
        }, 
        {
          "product_code": "asd",
          "product_name": "pp_partner",
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
  "opr_time_ms": "13474",
  "mk_id": "1600000066",
  "count_code": "PA_102_PA",
  "product_partner_info_mk_id": [
    "1600444923",
    "1600444924"
  ]
} 
```

