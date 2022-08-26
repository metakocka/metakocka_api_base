
# 1. JSON Example
**URL** : https://main.metakocka.si/rest/eshop/v1/json/product_update

Notes :
* Pricelist: instead of "tax" you can use "tax_factor" (Example : "tax_factor":"0.22")

Request :
```javascript
{
    "secret_key":"my_secreat_key",
    "company_id":"16",
    "count_code":"eshop_001",
    "code":"eshop_001_sif",
    "barcode": "987654321",
    "name":"artikel eshop_001",
    "name_desc": "artikel eshop_001 - daljsi opis",    
    "unit":"kos",
    "service":"false",
    "sales":"true",
    "purchasing":"false",
    "height":"12.23",
    "depth":"4.12",
    "weight":"6.3",
    "localization":[
      {
         "language":"en",
         "name":"en name",
         "name_desc":"en desc"
      },
      {
         "language":"de",
         "name":"de name",
         "name_desc":"de desc"
      }
   ],
    "categories" :[
      {"category":"Sadje"},
      {"category":["Sadje", "Hruška"]}
    ],
    "pricelist" :[
      {
         "count_code" : "CENIK_001",
         "price_def": [
            {
              "amount_from" : "0",
              "amount_to" : "6",
              "discount" : "5",
              "tax" : "220",
              "price" : "8",
              "price_with_tax" : "10"
            },
            {
              "amount_from" : "6",
              "amount_to" : null,
              "discount" : "5",
              "tax" : "220",
              "price" : "8",
              "price_with_tax" : "10"
            }
         ]
      }
    ]
}
```
Notes :
* attribute "count\_code" or "mk\_id" is required for selection of updated record.
* to remove value from "name_desc" or "barcode" field, insert value "$REMOVE_STRING_VALUE$" into fields. Empty or null value will not change current value. 

Respond : 
```javascript
{
    "opr_code":"0",
    "opr_time_ms":"33",
    "mk_id":"1600001744",
    "count_code":"eshop_002"
}
```

## 1.2 Attachments

**Data parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| attachment_list | Optional | Attachment object list |
| remove_not_send_attachments | Optional | Removes all attachments from product. Attachments from the same request are added |


**Attachment object parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| file_name | Required | Filename with extension |
| source_url/data_b64 | Required | Public url of the file (pdf, image,...) or base64 encoded file |

Request :
```javascript
{
    "secret_key": "8899",
    "count_code": "89693",
    "company_id": 16,
    "remove_not_send_attachments":true,
    "attachment_list" : [
          {
            "file_name" : "example.pdf", 
            "source_url" : "PUBLIC_URL_TO_PDF"
          },
          {
            "file_name" : "example.jpg", 
            "data_b64" : "BASE64_ENCODED_JPG"
          }
        ]
}
```

## 1.3 Packaging waste

See [Packaging waste](/docs/product_add.md#17-packaging-waste) at product_add for more info.