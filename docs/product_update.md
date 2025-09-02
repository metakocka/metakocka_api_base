
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
    "activated" : "true",
    "purchasing":"false",
    "height":"12.23",
    "depth":"4.12",
    "weight":"6.3",
    "minimal_order_quantity": "10"     
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
              "price_with_tax" : "10",
              "lowest_price_30_days": "6"
            },
            {
              "amount_from" : "6",
              "amount_to" : null,
              "discount" : "5",
              "tax" : "220",
              "price" : "8",
              "price_with_tax" : "10",
              "lowest_price_30_days": "6"
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

**Notes**
* If a file with the same case-sensitive file_name already exists on the product, the existing file(s) will be deleted, and the new file will be added.

**Data parameters**

| Parameter                   | Required/Optional | Description                                                                       |
|-----------------------------|-------------------|-----------------------------------------------------------------------------------|
| attachment_list             | Optional          | Attachment object list                                                            |
| remove_not_send_attachments | Optional          | Removes all attachments from product. Attachments from the same request are added |


**Attachment object parameters**

| Parameter           | Required/Optional | Description                                                    |
|---------------------|-------------------|----------------------------------------------------------------|
| file_name           | Required          | Filename with extension                                        |
| source_url/data_b64 | Required          | Public url of the file (pdf, image,...) or base64 encoded file |

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


## 1.4 Compound


### -Add compound

**Product parameters**
|Parameter| Required/Optional | Description |
|----|------------|------
| service | Required/Optional(if product parameter complete_set is added) | Product as a service |
| complete_set | Required/Optional(if parameter service is added) | Product as a service and compound |
| compound_type | Required | Required value = "compound" |
| confirm_save_change_product_service | Optional | To confirm if we want to change product as a service |

Note :
- if product is already in use on any document, invoice,... a warning will be shown to recalculate stock.   
   To confirm, we need to add aditional parameter confirm_save_change_product_service

**Compound parameters**

Notes :
* Parameter "product_count_code" or "product_mk_id" is required if we want to add existing product as compound.
* If "product_count_code" and "product_mk_id" is not set or no product is found, and if all valid required parameters are provided, then new product will be created and then added as a compound.

|Parameter| Required/Optional | Description |
|----|------------|------
| product_mk_id | Optional | Product id |
| product_count_code | Optional | Product count code | 
| amount | Required | add amount |
| purchase_unit_factor | Required | Purchase unit factor |
| supplier_id | Required | Supplier identification |
| purchase_price | Required | Purchase price |
| n_of_workers | Required | number of workers |
| workplace_id | Required | workplace id |
| unit | Required | Measurement unit |
| categories | optional | Categories list |


Request :

```javascript
{
    "secret_key": "8899",
    "count_code": "30888",
    "company_id": 16,
    "service": "true",
    "compound_type":"compound",
    "compounds": [
        {
            "product_mk_id": "1600386560",
            "product_title": "table",
            "amount": "1543",
            "purchase_unit_factor": "0,5",
            "supplier_id": "1600036997",
            "purchase_price": "4",
            "n_of_workers": "2",
            "row_order": "1",
            "workplace_id": "1600567744",
            "unit": "m2"
        }
    ]    
}
```
Respond :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "66",
    "mk_id": "1600386552",
    "count_code": "30888"
}
```
#
### - Update compound

**Product parameters**

Notes :
* Parameter 'count_code' or 'mk_id' must be set for update operation

|Parameter| Required/Optional | Description |
|----|------------|------
| compound_type | Required | Required value = "compound" |


**Compound parameters**

Notes :
* Parameter "mk_id" is required parameter for updating existing compound on product.

|Parameter| Required/Optional | Description |
|----|------------|------
| mk_id | Required | Compound id in product |
| amount | Required | add amount |
| purchase_unit_factor | Required | Purchase unit factor |
| supplier_id | Required | Supplier identification |
| purchase_price | Required | Purchase price |
| n_of_workers | Required | number of workers |
| workplace_id | Required | workplace id |
| unit | Required | Measurement unit |
| categories | optional | Categories list |

Request :

```javascript
{
    "secret_key": "8899",
    "count_code": "30888",
    "company_id": 16,
    "service": "true",
    "compound_type": "compound",
    "compounds": [
        {
            "mk_id": "1600385171",
            "amount": "1",
            "purchase_unit_factor": "0,5",
            "supplier_id": "1600036997",
            "purchase_price": "4",
            "n_of_workers": "2",
            "workplace_id": "1600567744",
            "unit": "m2",
        }
    ]
}
```
Respond : 

```javascript
{
    "opr_code": "0",
    "opr_time_ms": "66",
    "mk_id": "1600386552",
    "count_code": "30888"
}
```

##
### -Delete compound

**Product parameters**


|Parameter| Required/Optional | Description |
|----|------------|------
| secret_key | Required | Generated API key |
| company_id | Required | Company identification number |
| mk_id | Required/Optional(if count_code is provided) | Product Identification number |
| count_code | Required/Optional(if mk_id is provided) | Product count code |
| compound_type | Required | Required value = "compound" |


**Compound parameters**

Notes :
* Parameter "mk_id" is required parameter for deleting existing compound on product.

|Parameter| Required/Optional | Description |
|----|------------|------
| mk_id | Required |mk id |
| mark_delete | Required | Sets compound for delete | 

  
  Request :
  
```javascript
{
    "secret_key": "8899",
    "count_code": "30888",
    "company_id": 16,
    "compound_type": "compound",
    "compounds": [
        {
            "mark_delete": "true",
            "mk_id": "1600386560"
        }
    ]
}
```
Respond : 

```javascript
{
    "opr_code": "0",
    "opr_time_ms": "66",
    "mk_id": "1600386552",
    "count_code": "30888"
}
```

## 1.5 Pricelist update
By default, update will change current product on pricelist (if exist). This is because of change history. You can also delete product and insert new one. Use paramether "pricelist_remove_product_before_add" : "true" in product level. 
