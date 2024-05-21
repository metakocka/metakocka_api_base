# Search document by tracking code

**Description** : Used to search sales order by tracking code/return tracking code.

**URL** : https://main.metakocka.si/rest/eshop/v1/search_tracking_code

**Type** : POST

**Data parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| secret_key | Required  | Generated API key. |
| company_id | Required  | Internal(MK) company id. |
| tracking_code | Required  | Tracking code or return tracking code. |
| sticker_code | Optional  | Sticker number/barcode. Can be used instead of tracking_code. |


**Request example**
```json
{
  "secret_key": "API_KEY",
  "company_id": "COMPANY_ID",
  "tracking_code"  : "TRACKING_CODE"
}
```

**Response example**
```json
{
  "opr_code": "0",
  "mk_id" : "1600000000012",
  "count_code": "PP-123456796",
  "buyer_order": "PP-123456796",
  "tracking_code": "1234567891117",
  "return_tracking_code": "1234567891113"
}
```

**Error response example**
```json
{
  "opr_code": "6",
  "opr_desc": "Tracking code X not found",
  "opr_time_ms": "12"
}
```

