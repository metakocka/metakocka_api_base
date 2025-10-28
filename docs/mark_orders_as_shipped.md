# mark_orders_as_shipped -  mark sales orders as shipped

| Parameter           | Required/Optional | Description                      |
|---------------------|-------------------|----------------------------------|
| sales_order_id_list | Required          | List of valid sales order's ids. |
| customer_order_list | Required          | List of valid customer orders    |

**Type** : POST

**URL** : https://main.metakocka.si/rest/eshop/v1/mark_orders_as_shipped

**Request example - sales_order_id_list**
```javascript
{
    "company_id":"16",
    "secret_key":"8899",
    "sales_order_id_list":["400000001642","400000001643","400000001644"]
}
```
**Request example - customer_order_list**
```javascript
{
    "company_id":"16",
    "secret_key":"8899",
    "customer_order_list":["CustomerOrder1","CustomerOrder2","CustomerOrder3"]
}
```

**Respond example**
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "94"
}
```
