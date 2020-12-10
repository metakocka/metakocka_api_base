# Inner warehouse transfer order

**Description** : Create warehouse transfer orders between two warehouses.

**URL** : https://main.metakocka.si/rest/eshop/v1/put_document_transfer_order

**Type** : POST

**Data parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| secret_key | Required  | Generated API key. |
| company_id | Required  | Internal MK company id. |
| doc_date | Required  | Document datetime.  |
| count_code | _Optional_  | Count code of new transfer order. |
| warehouseIdFrom | Required  | Original/source warehouse of the product_list. |
| warehouseIdTo | Required  | Final warehouse to transfer product_list. |
| product_list | Required | Product object list to transfer between warehouses. |

**Product object parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| mk_id/count_code | Required | Product internal id or product count code. |
| amount | Required | Amount of product to transfer. |
| microlocation | _Optional_ | Location name of the final warehouse. |


**Request example**
```json
{
  "secret_key": "API_KEY",
  "company_id": "COMPANY_ID",
  "count_code": "1/2020",
  "doc_date": "2020-11-16+02:00",
  "warehouseIdFrom": 1600000042,
  "warehouseIdTo": 1600000067,
  "product_list": [
    {
      "mk_id": "1600176633",
      "amount": "2.000"
    }
  ]
}
```

**Response example**
```json
{
  "opr_code": "0",
  "opr_time_ms": "742",
  "mk_id": "1600375403"
}
```

