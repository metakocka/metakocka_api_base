# mark_orders_as_shipped -  mark sales orders as shipped

| Parameter           | Required/Optional                 | Description                       |
|---------------------|-----------------------------------|-----------------------------------|
| sales_order_id_list | One selection method is required. | List of valid sales order's ids.  |
| customer_order_list | One selection method is required. | List of valid customer orders.    |
| country             | Required with `status_code`.      | Buyer's country name or ISO code. |
| status_code         | Required with `country`.          | Sales order status                |

**Type** : POST

**URL** : https://main.metakocka.si/rest/eshop/v1/mark_orders_as_shipped

**Notes**

- Use exactly one selection method: `sales_order_id_list`, `customer_order_list`, or both `country` and `status_code`.
- The `country` and `status_code` selection marks as shipped all orders with the selected buyer country and status.

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
**Request example - country and status_code**
```javascript
{
    "company_id":"16",
    "secret_key":"8899",
    "country":"SI",
    "status_code":"created"
}
```

**Respond example**
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "94"
}
```
