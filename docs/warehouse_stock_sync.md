# Sync stock
**URL** : https://main.metakocka.si/rest/eshop/sync_stock

**Description** : 
- update warehouse stock by inserting or updating inventory on previous day
- a new inventory is created for each warehouse if it does not already exist
- the total stock for all warehouses must be sent in one request
- if an item is in inventory and not present in the request it will be removed from stock


Attribute                 | Type | Notes|
--------------------------|------|------|
| secret_key | string | / |
| company_id | string | / |
| api_user_email | string | / |
| include_current_stock | bool | Add stock from todays invoices |

## 1.1 Basic call 
Request :
```javascript
{
    "secret_key": "1234",
    "company_id": "16",
    "api_user_email": "c16@api.com",
    "stock_list": [{
            "warehouse_id": "1600000042",
            "product_code": "WOOART1", // product_code or product_id is required
            "product_id": "1600000001", // product_code or product_id is required
            "amount": "100"
        }, {
            "warehouse_id": "1600456606",
            "product_code": "WOOART2",
            "amount": "200"
        }
    ]
}
```
Respond :
``` javascript
{
    "opr_code": "0",
    "opr_desc": "Sync successful",
    "opr_time_ms": "121",
    "stock_list": [
        {
            "product_code": "WOOART1",
            "product_id": "1600321961",
            "warehouse_id": "1600000042",
            "amount": "100"
        },
        {
            "product_code": "WOOART2",
            "product_id": "1600321892",
            "warehouse_id": "1600456606",
            "amount": "200"
        }
    ]
}
```

## 1.2 Add stock from todays invoices 
Request :
```javascript
{
    "secret_key": "1234",
    "company_id": "16",
    "api_user_email": "c16@api.com",
    "include_current_stock": "true",
    "stock_list": [{
            "warehouse_id": "1600000042",
            "product_code": "WOOART1",
            "amount": "100"
        }, {
            "warehouse_id": "1600456606",
            "product_code": "WOOART2",
            "amount": "200"
        }
    ]
}
```
Respond :
``` javascript
{
    "opr_code": "0",
    "opr_desc": "Sync successful",
    "opr_time_ms": "84",
    "stock_list": [
        {
            "product_code": "WOOART1",
            "product_id": "1600321961",
            "warehouse_id": "1600000042",
            "amount": "100",
            "current_day_invoice_amount": "0"
        },
        {
            "product_code": "WOOART2",
            "product_id": "1600321892",
            "warehouse_id": "1600456606",
            "amount": "200",
            "current_day_invoice_amount": "1"
        }
    ]
}
```


## 2.1 Response with removed stock
```javascript
{
    "secret_key": "1234",
    "company_id": "16",
    "api_user_email": "c16@api.com"
    "stock_list": [{
            "warehouse_id": "1600000042",
            "product_code": "WOOART1",
            "amount": "100"
        }, {
            "warehouse_id": "1600456606",
            "product_code": "WOOART3",
            "amount": "200"
        }
    ]
}
```
Respond :
``` javascript
{
    "opr_code": "0",
    "opr_desc": "Sync successful",
    "opr_time_ms": "152",
    "stock_list": [
        {
            "product_code": "WOOART1",
            "product_id": "1600321961",
            "warehouse_id": "1600000042",
            "amount": "100"
        },
        {
            "product_code": "WOOART3",
            "product_id": "1600495086",
            "warehouse_id": "1600456606",
            "amount": "200"
        }
    ],
    "stock_remove_list": {
        "product_code": "WOOART2",
        "product_id": "1600321892",
        "warehouse_id": "1600456606",
        "amount": "0"
    }
}
```

## 2.2 Response with errors
```javascript
{
    "secret_key": "1234",
    "company_id": "16",
    "api_user_email": "c16@api.com"
    "stock_list": [{
            "warehouse_id": "1600000043",
            "product_code": "WOOART1",
            "amount": "100"
        }, {
            "warehouse_id": "1600456606",
            "product_code": "WOOART4",
            "amount": "200"
        }
    ]
}

```
Respond :
``` javascript
{
    "opr_code": "0",
    "opr_desc": "Sync successful",
    "opr_time_ms": "21",
    "error_list": [
        {
            "product_code": "WOOART1",
            "warehouse_id": "1600000043",
            "error": "Warehouse not found"
        },
        {
            "product_code": "WOOART4",
            "warehouse_id": "1600456606",
            "error": "Product not found"
        }
    ]
}
```
