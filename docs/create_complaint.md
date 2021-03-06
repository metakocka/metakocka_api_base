# Create complaint

**Description** : Used to create reclamations, returns and replacements.

**URL** : https://main.metakocka.si/rest/eshop/create_complaint

**Type** : POST

**Data parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| secret_key | Required  | Generated API key. |
| company_id | Required  | Internal(MK) company id. |
| api_user_email | Required  | Internal(MK) user email. |
| claim_type | Required  | Type of complaint - reclamation, return or replacement. |
| claim_reason | Optional  | Complaint reason - text/description. |
| sales_order_count_code | Required  | Sales order number. |
| datetime | Optional  | Document datetime of creation. Default datetime is now. Example ISO format: 2020-06-11T17:59:59+02:00.  |
| partner | Optional  | Partner object defining bank info for complaint.  |
| complaint_products | Required  | Product object list to dispute. |
| replacement_products | Optional  | Product object list for replacement. |
| attachment_list | Optional  | Attachment object list. |

**Partner object parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| iban | Required | IBAN/account number of the partner. |
| swift | Required | Bank swift. |
| bank_name | Required | Bank name. |
| bank_street | Optional | Bank street. |
| bank_place | Optional | Bank place. |
| bank_country_code | Optional | Country code - ISO standard. Example: SI = Slovenia. |
| partner_id | Optional | Internal(MK) partner id, default value is chosen by the sales order partner. |
| partner_address_id | Optional | Internal(MK) address id, default value is chosen by the sales order partner. |

**Product object parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| count_code | Required | Product ID/count code. |
| mk_id | Optional | Product internal(MK) id. It can be used as a replacement for count_code. |
| amount | Required | Amount of the product. |

**Attachment object parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| file_name | Required | Filename with extension |
| source_url/data_b64 | Required | Public url of the file (pdf, image,...) or base64 encoded file |

**Request example**
```json
{
  "secret_key": "API_KEY",
  "company_id": "COMPANY_ID",
  "api_user_email": "CREATOR_EMAIL",
  "claim_type": "reclamation",
  "claim_reason": "TEXT",
  "datetime": "2020-06-11T11:59:59+02:00",
  "sales_order_count_code"  : "SALES_ORDER_NUMBER",
  "partner" : {
    "iban": "IBAN",
    "swift": "BANK_SWIFT",
    "bank_name": "BANK_NAME",
    "bank_street": "BANK_STREET",
    "bank_place": "BANK_PLACE",
    "bank_country_code": "COUNTRY_ISO_CODE"
  },
  "complaint_products": [
    {
      "count_code": "PRODUCT_ID",
      "amount": "AMOUNT"
    }
  ],
  "replacement_products": [
    {
      "count_code": "PRODUCT_ID",
      "amount": "AMOUNT"
    }
  ],
  "attachment_list" : [
    {
      "file_name" : "FILE_NAME.pdf",
      "source_url" : "PUBLIC_SOURCE_URL"
    }
  ]
}
```

**Response example**
```json
{
  "opr_code": "0",
  "opr_time_ms": "189"
}
```

**Error response example**
```json
{
  "opr_code": "6",
  "opr_desc": "datetime is not valid",
  "opr_time_ms": "6"
}
```
