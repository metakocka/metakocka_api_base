**URL** : https://main.metakocka.si/rest/eshop/v1/get_document

# get_document - Warehouse docs
Valid doc_type :
* warehouse\_delivery\_note
* warehouse\_packing\_list
* warehouse\_receiving\_note
* warehouse\_acceptance\_note
* warehouse\_inventory

**Example** :

Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "warehouse_delivery_note",
  "doc_id" : "1600204441",
  "show_purchase_price_and_allo_cost" : true
}
```
Respond :
```javascript
{
    "mk_id": "1600204441",
    "doc_type": "warehouse_delivery_note",
    "opr_code": "0",
    "count_code": "SK1_2472",
    "doc_date": "2015-05-12+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI11111111",
        "customer": "Customer d.o.o.",
        "street": "Glavarjeva ulica 1",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia",
        "country_iso_2" : "SI",
        "count_code": "1000",
        "useCustomerAsContact": "false",
        "mk_id": "180600025047",
        "mk_address_id": "180600073437"
    },
    "receiver": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI11111111",
        "customer": "Customer d.o.o.",
        "street": "Glavarjeva ulica 1",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia",
        "country_iso_2" : "SI",
        "count_code": "1000",
        "useCustomerAsContact": "false",
        "mk_id": "180600025047",
        "mk_address_id": "180600073437"
    },
    "doc_created_email": "maticpetek@gmail.com",
    "warehouse": "oznaka1",
    "notes": "",
    "product_list": [
        {
            "mk_id": "1600204437",
            "code": "art d1",
            "amount": "1",
            "price": "8",
            "tax": "EX3",
            "price_purchase": "5",
            "allocated_code_purchase": "1.5",
            "allocated_cost_sales": "0.5"
        }
    ],
    "sum_basic": "8",
    "sum_tax_ex3": "0.76",
    "sum_all": "8.76",
    "status_code": "Odpremljen",
    "status_desc": "shipped"
}
```

## Get warehouse inventory
Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)

| Paramether       | Required/Optional | Description                                                            |
|------------------|-------------------|------------------------------------------------------------------------|
| doc\_id          | Optional          | Inventory ID (mk_id)                                                   |
| import\_date     | Optional          | Exact import time in ISO format (Example: "2021-12-21T11:33:15+02:00") |
| limit\_warehouse | Optional          | Limit output by warehouse mark or name                                 |
| doc\_date        | Optional          | Inventory date in ISO format (Example: "2021-12-21+02:00")             |
* doc_id, doc_date or import_date is required for identification

```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "warehouse_inventory",
  "doc_id" : "52000004002"
}
```
Respond :
```javascript
{
    "mk_id": "52000004002",
    "doc_type": "warehouse_inventory",
    "opr_code": "0",
    "doc_date": "2021-02-05+02:00",
    "import_date": "2021-02-05T20:52:11+02:00",
    "import_user": "Glavni account",
    "warehouse_list": [
        {
            "mk_id": "1600376715",
            "mark": "warehouse1",
            "name": "warehouseName",
            "warehouse_type": "normal",
            "product_list": [
                {
                    "count_code": "87659",
                    "mk_id": "1600559955",
                    "code": "0012",
                    "name": "Artikel 1",
                    "unit": "kos",
                    "microlocation": "m1",
                    "serial_number_value": "TempSerial",
                    "lot_number_value": "TempLot",
                    "expiration_date_value": "2023-07-03+02:00",
                    "amount_warehouse": "0",
                    "amount_new": "1",
                    "amount_diff": "1",
                    "purchase_price":"10"	
                },
                {
                    "count_code": "86114",
                    "mk_id": "1600558410",
                    "code": "0013",
                    "name": "EVO II POKRIVALO PROTI TOČI L",
                    "unit": "kos",
                    "microlocation": "m1",
                    "amount_warehouse": "4",
                    "amount_new": "1",
                    "amount_diff": "-3",
                    "purchase_price":"5"
                }
                .....
            ]
        }
        .....
    ]
}
```

## Special paramethers
| Paramether                             | Type | Description                                                   |
|----------------------------------------|------|---------------------------------------------------------------|
| show\_purchase\_price\_and\_allo\_cost | bool | get purchase price and purchase allocated cost for product.   |
| show\_last\_payment\_date              | bool | see [Bill example](/docs/documents_get_document_bill.md)      |
| show\_allocated\_cost                  | bool | get allocated costs for products.                             |

### show\_purchase\_price\_and\_allo\_cost
Notes :
* you will get additional return paramethers - price\_purchase, allocated\_code\_purchase, allocated\_cost\_sales

Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_bill_domestic",
  "doc_id" : "1600203257",
  "show_last_payment_date" : "true"
}
```
Respond :
```javascript
{
    "mk_id": "1600203257",
    "doc_type": "warehouse_delivery_note",
    [... remove ...]
    "product_list": [
        {
            "mk_id": "1600204437",
            "code": "art d1",
            "amount": "1",
            "price": "8",
            "tax": "EX3",
            "price_purchase": "5",
            "allocated_code_purchase": "1.5",
            "allocated_cost_sales": "0.5"
        }
    ]
    [... remove ...]    
}
```
### show\_allocated\_cost

Notes :
* you will get additional return parameter - allocated\_cost\_list

Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "warehouse_receiving_note",
  "doc_id" : "1600203257",
  "show_allocated_cost" : "true"
}
```
Respond :
```javascript
{
    "mk_id": "1600203257",
    "doc_type": "warehouse_receiving_note",
    [... remove ...]
    "product_list": [
        {
            "mk_id": "1600204437",
            "code": "art d1",
            "amount": "1",
            "price": "8",
            "tax": "EX3",
            "allocated_cost_list": [
                {
                  "type": "Transport",
                  "value": "2.5000000000"
              }
           ]
        }
    ]
    [... remove ...]    
}
```
