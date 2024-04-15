# Add attachment

**Description** : Used to add attachments to any document.

**URL** : https://main.metakocka.si/rest/eshop/add_attachment

**Type** : POST

**Data parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| secret_key | Required  | Generated API key. |
| company_id | Required  | Internal(MK) company id. |
| document_id | Required  | Internal(MK) document id. |
| document_type | Required  | Internal(MK) document type. |
| attachment_list | Required | Attachment object list |

**Attachment object parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| file_name | Required | Filename with extension |
| source_url/data_b64 | Required | Public url of the file (pdf, image,...) or base64 encoded file |

**Request example**

```json
{
  "secret_key": "8899",
  "company_id": "16",
  "document_id": "89693",
  "document_type": "RRR",
  "attachment_list": [
    {
      "file_name": "example.pdf",
      "source_url": "PUBLIC_URL_TO_PDF"
    },
    {
      "file_name": "example.jpg",
      "data_b64": "BASE64_ENCODED_JPG"
    }
  ]
}
```
**Success response example**
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
  "opr_desc": "file_name is required",
  "opr_time_ms": "6"
}
```
