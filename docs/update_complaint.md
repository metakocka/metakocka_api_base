# Update complaint

**Description** : Used to update reclamations, returns and replacements.

**URL** : https://main.metakocka.si/rest/eshop/update_complaint

**Type** : POST

**Body data parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| secret_key | Required  | Generated API key. |
| company_id | Required  | Internal(MK) company id. |
| claim_id | Required  | Internal(MK) complaint id. |
| claim_type | Required  | Type of complaint - reclamation, return or replacement. |
| claim_status | Required  | Dynamic registry key for complaint status defined in app. Predefined statuses: draft, progress, completed |
| claim_note | Optional  | Complaint note - text. |

**Request example**
```json
{
  "secret_key": "API_KEY",
  "company_id": "COMPANY_ID",
  "claim_id": "COMPLAINT_ID",
  "claim_type": "reclamation",
  "claim_status": "completed_refunded",
  "claim_note"  : "Complaint notes - text"
}
```

**Response example**
```json
{
  "opr_code": "0",
  "opr_time_ms": "23"
}
```

**Error response example**
```json
{
  "opr_code": "6",
  "opr_desc": "claim_id is required",
  "opr_time_ms": "1"
}
```
