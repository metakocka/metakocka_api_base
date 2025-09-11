**URL** : https://main.metakocka.si/rest/eshop/v1/source_stock

**Description** : if company is using external ERP for stock management (Navision, Vasco), you can use this call to get stock information. Values will be reduce for current day created invoices and credit notes. For Example :
* we have product P1 and stock on external ERP is 100
* in our ERP we have 1x invoice with sell amount 3 of P1 and 1x credit note with return amount 1. 
* return stock will be 100 - 3 + 1 = 97

Attribute                 | Type | Notes| Required |
--------------------------|------|------|----------|
| wh_id_list | string | If attribute is set, you will limit response by given warehouse ids. | no       |
| product_mk_id_list | String | Limit respond by list of MK ID, separater with comma | no       |

## 1.1 Basic call - no reservations
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
    "opr_time_ms": "145",
    "opr_time_no_lock_ms": "0",
    "stock_list": [
        {
            "warehouse_id": "155900000003",
            "warehouse_mark": "1011",
            "mk_id": "155958282108",
            "count_code": "1736",
            "code": "3831121199116",
            "amount": "620",
            "unit": "kos"
        },
        {
            "warehouse_id": "155947994462",
            "warehouse_mark": "1013",
            "mk_id": "155958282108",
            "count_code": "1736",
            "code": "3831121199116",
            "amount": "119",
            "unit": "kos"
        },
        {
            "warehouse_id": "155936102156",
            "warehouse_mark": "2010",
            "mk_id": "155958282108",
            "count_code": "1736",
            "code": "3831121199116",
            "amount": "4670",
            "unit": "kos"
        }
    ]
}
```
