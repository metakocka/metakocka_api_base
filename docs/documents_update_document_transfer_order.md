# Transfer order update

**Description** : Update warehouse transfer order

**URL** : https://main.metakocka.si/rest/eshop/v1/update_document

**Type** : POST

**Data parameters**

| Parameter       | Required/Optional | Description                                                                            |
|-----------------|-------------------|----------------------------------------------------------------------------------------|
| secret_key      | Required          | Generated API key.                                                                     |
| company_id      | Required          | Internal MK company id.                                                                |
| mk_id           | Required          | Internal Transfer order ID                                                             |
| doc_type        | Required          | warehouse_transfer_order                                                               |
| doc_date        | _Optional_        | Document datetime.                                                                     |
| count_code      | _Optional_        | Count code of new transfer order.                                                      |
| warehouseIdFrom | _Optional_        | Original/source warehouse of the product_list.                                         |
| warehouseIdTo   | _Optional_        | Final warehouse to transfer product_list.                                              |
| product_list    | _Optional_        | Product object list to transfer between warehouses. Always send full list of products. |
| confirmed       | _Optional_        | Confirm transfer order                                                                 |

**Product object parameters**

| Parameter        | Required/Optional | Description                                |
|------------------|-------------------|--------------------------------------------|
| mk_id/count_code | Required          | Product internal id or product count code. |
| amount           | Required          | Amount of product to transfer.             |
| microlocation    | _Optional_        | Location name of the final warehouse.      |
| confirmed        | _Optional_        | Set product as confirmed                   |


**Request example**
```json
{
  "secret_key": "8899",
  "company_id": "16",
  "doc_type" : "warehouse_transfer_order",
  "doc_date": "2022-10-05+02:00",
  "warehouseIdFrom": 1600567628,
  "warehouseIdTo": 1600000142,
  "mk_id":"1600600067",
  "product_list": [
    {
      "mk_id": "1600592808",
      "amount": "2.000"
    }
  ]
}
```

**Response example**
```json
{
  "opr_code": "0",
  "opr_time_ms": "742"
}
```

