# Get proof of delivery

**Description** : Get proof of delivery file

**URL** : https://main.metakocka.si/rest/eshop/get_proof_of_delivery

**Type** : POST

**Request parameters**

| Parameter                        | Required/Optional | Description                           |
|----------------------------------|-------------------|---------------------------------------|
| secret_key                       | Required          | Generated API key.                    |
| company_id                       | Required          | Internal(MK) company id.              |
| buyer_order                      | Required          | Buyer order for sales order           |
| tracking_code                    | Required          | Tracking code linked with sales order |

**Respond**
* If ok, byte array file will be returned
* Otherwise, a JSON with an error message.

**Example** :
Request (POST - https://main.metakocka.si/rest/eshop/get_proof_of_delivery) :
```javascript
{
    "secret_key": "8899",
    "company_id": "16",
    "buyer_order": "566_2026",
    "tracking_code":"trackingCode1232"
}
```

Call can also return general error:
```javascript
{
    "opr_code": "6",
    "opr_desc": "Cannot find sales order with buyer order '5662'",
    "opr_time_ms": "0",
    "opr_time_no_lock_ms": "0"
}
```
