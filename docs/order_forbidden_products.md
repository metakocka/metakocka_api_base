# Order Forbidden Products
**Description** : API search / replace of rules for Forbidden products. See more on https://metakocka.freshdesk.com/a/solutions/articles/3000133665 

## get_order_change_warehouse 
**URL** : https://main.metakocka.si/rest/eshop/v1/get_order_forbidden_products

**Description** : return list of all rules

Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16"
}
```
Respond :
``` javascript
{
    "opr_code": "0",
    "opr_time_ms": "29",
    "opr_time_no_lock_ms": "0",
    "change_list": [
        {
            "forbidden_country_list": "Slovenia",
            "forbidden_status_list": "shipped",
            "product_code_list": "forbidden1",
            "to_status": "shipped_error"
        },
        {
            "forbidden_country_list": "Germany,Austria",
            "forbidden_status_list": "shipped",
            "product_code_list": "art1,art2",
            "to_status": "problem"
        }
    ]
} 
```

## replace_order_change_warehouse
**URL** : https://main.metakocka.si/rest/eshop/v1/replace_order_forbidden_products

**Description** : replace all current rules. Warning : it is not possible to insert / update / delete specific rules. Only the whole rule set. 
We recommend to first read all rules with get function and then replace them with the new set.

Request :
```javascript
{
    "secret_key": "my_secret_key",
    "company_id": 16,
    "change_list": [
        {
            "forbidden_country_list": "Slovenia",
            "forbidden_status_list": "shipped",
            "product_code_list": "forbidden1",
            "to_status": "shipped_error"
        },
        {
            "forbidden_country_list": "Germany,Austria",
            "forbidden_status_list": "shipped",
            "product_code_list": "art1,art2",
            "to_status": "problem"
        }
    ]
}
```
Respond :
``` javascript
{
    "opr_code": "0",
    "opr_time_ms": "48",
    "opr_time_no_lock_ms": "0"
} 
```

Respond with error :
``` javascript
{
    "opr_code": "6",
    "opr_desc": "Cannot find product with code = art22",
    "opr_time_ms": "35",
    "opr_time_no_lock_ms": "0"
} 
```
