**URL** : https://main.metakocka.si/rest/eshop/v1/get_document

# get_document - Warehouse docs
Valid doc_type :
* warehouse\_delivery\_note
* warehouse\_packing\_list
* warehouse\_receiving\_note
* warehouse\_acceptance\_note

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
        "tax_id_number": "SI78552478",
        "customer": "3D ART d.o.o.",
        "street": "Glavarjeva ulica 49",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia",
        "count_code": "1000",
        "useCustomerAsContact": "false"
    },
    "receiver": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI78552478",
        "customer": "3D ART d.o.o.",
        "street": "Glavarjeva ulica 49",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia",
        "count_code": "1000",
        "useCustomerAsContact": "false"
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
    "sum_all": "8.76"
}
```

## Special paramethers
Paramether | Type | Description |
-----------|------|-------------|
show\_purchase\_price\_and\_allo\_cost | bool | get purchase price and purchase allocated cost for product. |
show\_last\_payment\_date | bool | see [Bill example](/docs/documents_get_document_bill.md) |
show\_allocated\_cost | bool | get allocated costs for products. |

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
