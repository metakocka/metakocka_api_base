**URL** : https://main.metakocka.si/rest/eshop/v1/get_document

# get_document - Bill

Valid doc_type :
* sales\_bill\_domestic
* sales\_bill\_foreign
* sales\_bill\_retail
* sales\_bill\_prepaid
* sales\_bill\_credit\_note
* purchase\_bill\_domestic
* purchase\_bill\_foreign
* purchase\_bill\_prepaid
* purchase\_bill\_credit\_note

**Example** :

Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_bill_domestic",
  "doc_id" : "1600203257"
}
```
Respond :
```javascript
{
    "mk_id": "1600203257",
    "doc_type": "sales_bill_domestic",
    "opr_code": "0",
    "count_code": "PRD1_493",
    "doc_date": "2015-05-07+02:00",
    "publish_ts": "2015-05-07T12:53:27+02:00",
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
        "tax_id_number": "SI78552478",
        "customer": "3D ART d.o.o.",
        "street": "Ulica 2",
        "post_number": "2000",
        "place": "Kamnik",
        "country": "Slovenia",
        "country_iso_2" : "SI",
        "count_code": "1000",
        "useCustomerAsContact": "false",
        "mk_id": "180600025047",
        "mk_address_id": "180600073437"
    },
    "service_to_date": "2015-05-07+02:00",
    "sales_pricelist_code": "PC_115",
    "discount_value": "10",
    "duo_payment": "2015-05-22+02:00",
    "currency_code": "EUR",
    "status_code": "Izdelan",
    "status_desc": "created",
    "title": "Naziv1",
    "pariteta": "Dostava kupcu",
    "doc_created_email": "maticpetek@gmail.com",
    "location_of_service": "1komenda",
    "offer_list": [
        {
            "count_code": "PP424"
        }
    ],
    "buyer_order": "nkupca1",
    "warehouse": "SK0005",
    "delivery_type": "Lasten prevzem",
    "notes": "opis2",
    "product_list": [
        {
            "mk_id": "1600063983",
            "code": "majica1sifra",
            "name_desc": "majica1 artikle opis",
            "amount": "2",
            "price": "3",
            "discount": "12",
            "tax": "EX4",
            "doc_desc": "Opis na računu"
        },
        {
            "mk_id": "1600063983",
            "code": "majica1sifra",
            "name_desc": "majica1 artikle opis",
            "amount": "2",
            "price_with_tax": "14.6754",
            "discount": "12",
            "tax": "EX4",
            "doc_desc": "Opis na računu"
        }
    ],
    "sum_basic": "20.33",
    "sum_discount": "13.67",
    "sum_tax_ex4": "4.47",
    "sum_all": "24.8",
    "furs_zoi": "2048f0a369e37b4258e741fc8ae9ffc2",
    "furs_eor": "34facd65-622b-745d-a541-30ab1f9d3ac1",
    "last_change_user": "Jaka Novak",
    "profit_center": "Profitni center 1",
    "profit_center_desc": "Profitni center 1 description"
}
```
### Example : Get detail payment information
Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_bill_domestic",
  "doc_id" : "1600203257",
  "show_payment_detail" : "true"
}
```
Respond :
```javascript
{
    "mk_id": "1600203257",
    "doc_type": "sales_bill_domestic",
    "opr_code": "0",
    "count_code": "PRD1_493",
    "doc_date": "2015-05-07+02:00",
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
        "street": "Ulica 2",
        "post_number": "2000",
        "place": "Kamnik",
        "country": "Slovenia",
        "count_code": "1000",
        "useCustomerAsContact": "false"
    },
    "service_to_date": "2015-05-07+02:00",
    "sales_pricelist_code": "PC_115",
    "discount_value": "10",
    "duo_payment": "2015-05-22+02:00",
    "currency_code": "EUR",
    "title": "Naziv1",
    "pariteta": "Dostava kupcu",
    "doc_created_email": "maticpetek@gmail.com",
    "location_of_service": "1komenda",
    "offer_list": [
        {
            "count_code": "PP424"
        }
    ],
    "buyer_order": "nkupca1",
    "warehouse": "SK0005",
    "delivery_type": "Lasten prevzem",
    "notes": "opis2",
    "product_list": [
        {
            "mk_id": "1600063983",
            "code": "majica1sifra",
            "name_desc": "majica1 artikle opis",
            "amount": "2",
            "price": "3",
            "discount": "12",
            "tax": "EX4",
            "doc_desc": "Opis na računu"
        },
        {
            "mk_id": "1600063983",
            "code": "majica1sifra",
            "name_desc": "majica1 artikle opis",
            "amount": "2",
            "price_with_tax": "14.6754",
            "discount": "12",
            "tax": "EX4",
            "doc_desc": "Opis na računu"
        }
    ],
    "mark_paid": [
        {
          "payment_type": "Transakcijski račun",
          "date": "15.03.2017",
          "amount": "1.895,01",
          "payment_tip": "Izdatek"
        },
        {
          "payment_type": "Transakcijski račun",
          "date": "20.03.2017",
          "amount": "53",
          "payment_tip": "Vračilo",
          "cashRegister": "Blagajna 1",
          "notes": "abcdsa"
        }    
    ],
    "sum_basic": "20.33",
    "sum_discount": "13.67",
    "sum_tax_ex4": "4.47",
    "sum_all": "24.8",
    "furs_zoi": "2048f0a369e37b4258e741fc8ae9ffc2",
    "furs_eor": "34facd65-622b-745d-a541-30ab1f9d3ac1"
}
```
### Example : get bill installment list
Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)
```javascript
{  
	"company_id": "16", 
	"secret_key": "8899",
	"doc_type" : "sales_bill_domestic",
	"doc_id" : "1600552358"
}
```
Repond :
```
{
    "mk_id": "1600552358",
    "doc_type": "sales_bill_domestic",
    "opr_code": "0",
    "count_code": "LJ-MK-559",
    "doc_date": "2017-05-18+02:00",
    "partner": {
        "mk_id": "1600552355",
        "business_entity": "false",
        "taxpayer": "false",
        "foreign_county": "false",
        "customer": "Janez Novak",
        "street": "Tehnološki park 21",
        "place": "Ljubljana",
        "country": "Slovenia",
        "count_code": "3282"
    },
    "receiver": {
        "mk_id": "1600552357",
        "business_entity": "false",
        "taxpayer": "false",
        "foreign_county": "false",
        "customer": "3D ART d.o.o.",
        "count_code": "3283"
    },
    "service_to_date": "2017-05-18+02:00",
    "duo_payment": "2017-05-20+02:00",
    "currency_code": "EUR",
    "doc_created_email": "maticpetek@gmail.com",
    "location_of_service": "a1",
    "packlist_accform_list": {
        "mk_id": "1600552361",
        "count_code": "D_4984"
    },
    "warehouse": "oznaka2",
    "notes": "test opomba",
    "product_list": [
        {
            "name": "testni artikel",
            "amount": "2",
            "price": "89.9",
            "discount": "15",
            "tax": "EX4"
        },
        {
            "mk_id": "1600000066",
            "code": "sktest1",
            "name_desc": "HTML<div><br></div><div><font color=\"#ff0000\">opis artikla</font></div><div><font color=\"#ff0000\"><br></font></div><div><font color=\"#ff0000\"><a href=\"www.google.com\">www.google.com</a></font></div>",
            "amount": "6",
            "price": "15.5",
            "discount": "5",
            "tax": "EX4"
        }
    ],
    "sum_basic": "241.18",
    "sum_discount": "31.62",
    "sum_tax_ex4": "53.06",
    "sum_all": "294.24",
    "installment_list": [
        {
            "mk_id": "1600552544",
            "installment_date": "2017-07-25+02:00",
            "installment_amount": "147.12",
            "installment_payed": "false"
        },
        {
            "mk_id": "1600552545",
            "installment_date": "2017-08-25+02:00",
            "installment_amount": "147.12",
            "installment_payed": "false"
        }
    ],
    "furs_zoi": "2048f0a369e37b4258e741fc8ae9ffc2",
    "furs_eor": "34facd65-622b-745d-a541-30ab1f9d3ac1"
}
```

### Example : get bill document information
Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)

```javascript
{  
	"company_id": "16", 
	"secret_key": "8899",
	"doc_type" : "sales_bill_domestic",
	"doc_id" : "1600552358"
    "return_document_info" : "true"
}
```
Response can be viewed here: [example](/docs/documents_get_document_sales_order.md#get_document---sales-order-with-document-information)
## Special paramethers
| Paramether                              | Type | Description                                                                                                                         |
|-----------------------------------------|------|-------------------------------------------------------------------------------------------------------------------------------------|
| show\_last\_payment\_date               | bool | return last payment date and sum payment amount also for partially paid bills. Last payment date do not include credit notes.       |
| show\_product\_compound                 | bool | return product compound                                                                                                             |
| show\_allocated\_cost                   | bool | get allocated costs for products.                                                                                                   |
| show\_sales\_order\_method\_of\_payment | bool | get method of payment from sales order (if document link exist)                                                                     |
| show\_tax\_factor                       | bool | get tax factor and tax description for each product                                                                                 |
| show\_product\_detail                   | bool | get product detail for each product                                                                                                 |
| show\_purchase\_price\_and\_allo\_cost  | bool | get product purchase price and allocation costs [example](/docs/documents_get_document_whdocs.md#show_purchase_price_and_allo_cost) |

### show\_last\_payment\_date

Notes :
* you will get additional return paramethers - last\_paid\_date and last\_paid\_sum

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
    "doc_type": "sales_bill_domestic",
    [... remove ...]
	"sum_basic": "4",
	"sum_tax_ex4": "0.88",
	"sum_prepayment": "3",
	"sum_all": "4.88",
	"sum_paid": "3",
	"sum_full_paid_when": "2015-09-07+02:00",
	"sum_creditnote": "2.44",
	"last_paid_date": "06.09.2015",
	"last_paid_sum": "3"  ,
    	"furs_zoi": "2048f0a369e37b4258e741fc8ae9ffc2",
    	"furs_eor": "34facd65-622b-745d-a541-30ab1f9d3ac1"  
}
```

### show\_product\_compound
Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_bill_domestic",
  "doc_id" : "1600203257",
  "show_product_compound" : "true"
}
```
Respond :
```javascript
{
    "mk_id": "1600203257",
    "doc_type": "sales_bill_domestic",
    [... remove ...]
  "product_list": [
        {
            "mk_id": "1600316237",
            "code": "kuhinja10",
            "amount": "1",
            "price": "10",
            "tax": "EX4",
            "compound_type": "compound",
            "compounds": [
                {
                    "product_mk_id": "1600316235",
                    "product_count_code": "30170",
                    "product_code": "stol10",
                    "product_title": "stol10",
                    "amount": "4",
                    "purchase_unit_factor": "0,125"
                },
                {
                    "product_mk_id": "1600316236",
                    "product_count_code": "30171",
                    "product_code": "miza10",
                    "product_title": "miza10",
                    "amount": "1",
                    "purchase_unit_factor": "0,5"
                }
            ]
        },
    ],
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
  "doc_type" : "sales_bill_domestic",
  "doc_id" : "1600203257",
  "show_allocated_cost" : "true"
}
```
Respond :
```javascript
{
    "mk_id": "1600203257",
    "doc_type": "sales_bill_domestic",
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

### show\_sales\_order\_method\_of\_payment
Notes :
* you will get additional return parameter - method\_of\_payment

Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_bill_domestic",
  "doc_id" : "1600203257",
  "show_sales_order_method_of_payment" : "true"
}
```
Respond :
```javascript
{
    "mk_id": "1600203257",
    "method_of_payment": "PayPal"
}
```

### show\_tax\_factor
Notes :
* you will get additional return parameters - tax\_factor and tax\_desc

Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_bill_domestic",
  "doc_id" : "1600203257",
  "show_tax_factor" : "true"
}
```
Respond :
```javascript
{
    "mk_id": "1600574102",
    "doc_type": "sales_bill_domestic",
    "opr_code": "0",
    [... remove ...]
    "product_list": [
        {
            "mk_id": "1600159377",
            "code": "0E-NGAF-OBG2",
            "amount": "2",
            "price": "3",
            "discount": "0",
            "tax": "EX4",
            "tax_factor": "0.22",
            "tax_desc": "22"
        }
    ]
}
```
### show\_product\_detail

Notes :
* you will get additional return parameters:
  * "type" with values: material, service, compound or bills_of_materials
  * "mk_row_id" : internal row id
* "show_product_detail" is also supported for /search query

Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_bill_domestic",
  "doc_id" : "1600203257",
  "show_product_detail" : "true"
}
```
Respond :
```javascript
{
    "mk_id": "1600203257",
    "doc_type": "sales_bill_domestic",
    "opr_code": "0",
    [... remove ...]
    "product_list": [
        {
            "mk_id": "1600159377",
            "code": "art1",
            "amount": "2",
            "price": "3",
            "discount": "0",
            "tax": "EX4",
            "type":"material",
            "mk_row_id":"1600598394"
        }
    ]
}
```

### Invoice with foreign invoice number
If invoice is published for country with foreign tax number, parameter count_code_foreign_country will be added with given country ISO code.

Respond :
```javascript
{
    "mk_id": "1600203257",
    "doc_type": "sales_bill_foreign",
    "count_code": "HR-MK-8",
    "count_code_foreign_country": "HR"
    ..........................
}
```

### Linked invoice to prepaid bill
If prepaid invoice is linked to a sales invoice, the linked invoice will be displayed in 'doc_link_list' list.

Respond :
```javascript
{
    "mk_id": "1600203257",
    "doc_type": "sales_bill_prepaid",
    "count_code":  "1-MK-2062",
    ............
    "doc_link_list": [
                {
                    "mk_id": "1600598025",
                    "count_code": "1-MK-2063",
                    "doc_type": "sales_bill_foreign"
                }
    ],
    ............
}
```
If sales invoice is linked to a prepaid invoice, the prepaid invoice will be displayed in 'doc_link_list' list.

Respond :
```javascript
{
    "mk_id": "1600598025",
    "doc_type": "sales_bill_foreign",
    "count_code":  "1-MK-2063",
    ............
    "doc_link_list": [
                {
                    "mk_id": "1600203257",
                    "count_code": "1-MK-2062",
                    "doc_type": "sales_bill_prepaid"
                }
    ],
    ............
}
```