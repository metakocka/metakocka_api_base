# Warehouse inventory

**Description** : Used to create warehouse inventory.

**URL** : https://main.metakocka.si/rest/eshop/import_inventory

**Type** : POST

**Data parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| secret_key | Required  | Generated API key. |
| company_id | Required  | Internal(MK) company id. |
| inventory_date | Required  | Document datetime. Example format: 2020-07-23+02:00.  |
| warehouse_list | Required  | Warehouse object list. |
| replace_inventory_id | Optional  | Inventory id for update. |

**Warehouse object parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| mark | Required | Warehouse code/mark. |
| mk_id | Optional | Warehouse internal(MK) id. It can be used as a replacement for mark. |
| product_list | Required | Product object list. |

**Product object parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| code | Required | Product SKU/code. |
| count_code | Required | Product ID/count code. Alternative to "code" parameter. |
| mk_id | Optional | Product internal(MK) id. It can be used as a replacement for count_code. |
| amount | Required | Amount of the product. |
| serial_number_value | Optional | Serial number text value |
| lot_number_value | Optional | Lot number text value |
| expiration_date_value | Optional | Expiry date of the product. Example format: 2020-07-23+02:00. |


**Request example**
```json
{
  "secret_key": "API_KEY",
  "company_id": "COMPANY_ID",
  "inventory_date"  : "DATE",
  "warehouse_list" : [
    {
      "mark" : "WAREHOUSE_CODE",
      "product_list": [
        {
          "count_code": "PRODUCT_ID",
          "amount": "PRODUCT_AMOUNT"
        }
      ]
    }
  ]
}
```

**Response example**
```json
{
  "opr_code": "0",
  "opr_time_ms": "27302"
}
```

**Error response example**
```json
{
  "opr_code": "5",
  "opr_desc": "Inventuri ni mogoče dodati, ker je artikel  PA-4044 - g1 - g1 (skladišče oznaka1) že vpisan na inventuri z datumom 13.05.2020",
  "opr_time_ms": "38071"
}
```

**Products not found - response example**
```json
{
  "opr_code": "2",
  "opr_desc": "Product with count_code X not found",
  "opr_time_ms": "223",
  "product_not_found_list": [
    {
      "count_code": "X",
      "amount": "1"
    },
    {
      "count_code": "Y",
      "amount": "2"
    }
  ]
}
```
