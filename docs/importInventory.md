# Warehouse inventory

**Description** : Used to create warehouse inventory.

**URL** : https://main.metakocka.si/rest/eshop/importInventory

**Type** : POST

**Data parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| secret_key | Required  | Generated API key. |
| company_id | Required  | Internal(MK) company id. |
| inventory_date | Required  | Document datetime. Example format: 2020-07-23+02:00.  |
| warehouse_list | Required  | Warehouse object list. |

**Warehouse object parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| mk_id | Required | Warehouse internal(MK) id. |
| product_list | Required | Product object list. |

**Product object parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| mk_id | Required | Product internal(MK) id. |
| amount | Required | Amount of the product. |


**Request example**
```json
{
  "secret_key": "API_KEY",
  "company_id": "COMPANY_ID",
  "inventory_date"  : "DATE",
  "warehouse_list" : [
    {
      "mk_id" : "WAREHOUSE_ID",
      "product_list": [
        {
          "mk_id": "PRODUCT_ID",
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
