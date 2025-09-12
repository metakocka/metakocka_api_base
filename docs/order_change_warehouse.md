# Order Change Warehouse
**Description** : API search / replace of rules for Warehouse mapping. See more on https://metakocka.freshdesk.com/a/solutions/articles/3000128367 

## get_order_change_warehouse 
**URL** : https://main.metakocka.si/rest/eshop/v1/get_order_change_warehouse

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
    "opr_time_ms": "11435",
    "opr_time_no_lock_ms": "0",
    "change_list": [
        {
            "from_status_list": "created",
            "from_warehouse_mark_list": "2010",
            "from_delivery_type_list": "Helpship DPD Estonija",
            "product_code_list": "1831121178777",
            "to_warehouse_mark": "1011",
            "to_delivery_type": "DPD Estonija"
        },
        {
            "from_status_list": "created",
            "from_warehouse_mark_list": "2010",
            "from_delivery_type_list": "Helpship DPD Estonija",
            "product_code_list": "1831121178883",
            "to_warehouse_mark": "1011",
            "to_delivery_type": "DPD Estonija"
        },
        {
            "from_status_list": "created",
            "from_warehouse_mark_list": "2010",
            "from_delivery_type_list": "Helpship DPD Estonija",
            "product_code_list": "1831121179118",
            "to_warehouse_mark": "1011",
            "to_delivery_type": "DPD Estonija"
        }
    ]
}    
```

## replace_order_change_warehouse
**URL** : https://main.metakocka.si/rest/eshop/v1/replace_order_change_warehouse

**Description** : replace all current rules. Warning : it is not possible to insert / update / delete specific rules. Only the whole rule set. 
We recommend to first read all rules with get function and then replace them with the new set.

Request :
```javascript
{
    "secret_key": "my_secret_key",
    "company_id": 16,
    "change_list": [
        {
            "from_status_list": "problem,duplicate",
            "from_warehouse_mark_list": "sk1,sk2",
            "from_delivery_type_list": "POST_IT,SDA IT",
            "product_code_list": "art2",
            "to_warehouse_mark": "test3",
            "to_delivery_type": "Standard"
        },
        {
            "from_status_list": "problem",
            "product_code_list": "socw,art2",
            "to_delivery_type": "Standard"
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
