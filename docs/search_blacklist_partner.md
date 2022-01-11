# Search blacklist partner

**Description** : Returns blacklisted partner.

**URL** : https://main.metakocka.si/rest/eshop/v1/search_blacklist_partner

**Type** : POST

**Body data parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| secret_key | Required  | Generated API key. |
| company_id | Required  | Internal(MK) company id. |
| api_user_email | Required  | Internal(MK) user email. |
| partner_email | Optional  | Partner email address |
| partner_phone_number | Optional  | Partner GSM number |
| partner_name | Optional  | Partner full name |

**Request example**
```json
{
  "secret_key": "API_KEY",
  "company_id": "COMPANY_ID",
  "api_user_email": "CREATOR_EMAIL",
  "partner_email": "TEXT"
}
```

**Response example**
```json
{
  "opr_code": "0",
  "opr_time_ms": "189",
  "partner_list_count": "NUMBER_OF_RESULTS",
  "partner_list": [
    {
      "customer": "PARTNER_NAME",
      "email": "PARTNER_EMAIL"
    }
  ]
}
```
