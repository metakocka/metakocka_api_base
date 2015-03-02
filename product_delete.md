
# 1. JSON Example
**URL** : https://main.metakocka.si/rest/eshop/v1/json/product_delete

Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "count_code":"eshop_003"
}
```
Notes :
* attribute "count\_code" or "mk\_id" is required for selection of updated record.

Respond : 
```javascript
{
    "opr_code":"0",
    "opr_time_ms":"33",
    "mk_id":"1600001744",
    "count_code":"eshop_002"
}
```