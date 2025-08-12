**URL** : https://main.metakocka.si/rest/eshop/v1/get_document

# get_document - Sales Order
**Example** :

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "1600202487"
}
```
Respond :
```javascript
{
	"mk_id": "1600203487",
	"doc_type": "sales_order",
	"opr_code": "0",
	"count_code": "PP-18495",
	"doc_date": "2015-05-08+02:00",
	"eshop_name": "Mimovrste",
	"salesOrderTrackingType":"bill",
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
	"sales_pricelist_code": "PC_115",
	"prepayment_value": "10",
	"discount_value": "20.12",
	"currency_code": "EUR",
	"status_code": "Novo naročilo",
	"status_desc": "new_order",
	"title": "naziv1",
	"pariteta": "Dostava kupcu",
	"doc_created_email": "m@m.com",
	"commercialist_email" : "m@m.com",
	"delivery_deadline": "2015-05-10+02:00",
	"finish_date": "2015-05-10+02:00",
	"offer_list": [{
			"count_code": "PP424"
		}
	],
	"buyer_order": "narocilo1",
	"warehouse": "oznaka1",
	"delivery_type": "Lasten prevzem",
	"priority": "1-Nizka",
	"notes_header": "Opis zgoraj",
	"notes": "Opis spodaj",
	"product_list": [{
			"mk_id": "1600162716",
			"code": "mkp1",
			"name": "MK prenos 1",
			"name_desc": "MK prenos 1 artikel opis",
			"unit": "kos",
			"amount": "2",
			"price": "10",
			"tax": "EX4",
			"doc_desc": "Opis na prodajnem naročilu"
		}, {
			"mk_id": "1600162716",
			"code": "mkp1",
			"name": "MK prenos 1",
			"name_desc": "MK prenos 1 artikel opis",
			"unit": "kos",
			"amount": "3",
			"price_with_tax": "15",
			"tax": "EX4",
			"doc_desc": "Opis na prodajnem naročilu"
		}
	],
	"sum_basic": "46.19",
	"sum_discount": "20.12",
	"sum_tax_ex4": "10.16",
	"sum_prepayment": "5.64",
	"sum_all": "56.35",
	"sum_paid": "10",
	"method_of_payment" : "paypal",
	"order_create_ts": "2015-05-08T12:13:15+02:00",
	"parcel_shop_id": "P100",
	"profit_center": "ProfitCenter1",
	"profit_center_desc": "ProfitCenter1 description",
	"doc_link_list": [{
			"mk_id": "1600373113",
			"count_code": "1-MK-1406",
			"doc_type": "sales_bill_domestic"
		}, {
			"mk_id": "400000006162",
			"count_code": "SK1_4336",
			"doc_type": "warehouse_packing_list"
		}, {
			"mk_id": "400000000161",
			"count_code": "PP-26755",
			"doc_type": "sales_order"
		}
	],
	"extra_column": [{
			"name": "ip",
			"value": "182.68.322.24"
		}, {
			"name": "store_url",
			"value": "https://myshop.com/v1/hr/radar/"
		}, {
			"name": "tracking_number",
			"value": "65407745"
		}
	],
	"shipped_date_expected_seller": "2015-05-15+02:00",
	"meta_data": [
    		{
        		"key":"meta_data_key1",
        		"value_string":"meta_data_value1"
    		},
    		{
        		"key":"meta_data_key2",
        		"value_string":"meta_data_value2"
    		}
	]
}
```
Request - by buyer order (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "buyer_order" : "79473216"
}
```

# get_document - Sales Order with delivery service events
**Example** :

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "1600202487",
  "return_delivery_service_events" : "true"
}
```
Respond :
```javascript
{
  	...
	"delivery_service_events": [
		{
			"event_code": "-1",
			"event_date": "2017-10-11T14:28:54+02:00",
			"event_status": "Dodana koda za sledenje: 5853626"
		},
		{
			"event_code": "0",
			"event_date": "2017-10-11T14:28:54+02:00",
			"event_status": "Data sent"
		},
		{
			"event_code": "0",
			"event_date": "2017-10-11T14:28:54+02:00",
			"event_status": "APL - registration"
		}
    	]
}
```

# get_document - Sales Order with delivery stats
**Example** :

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "1600202487",
  "return_delivery_stats" : "true"
}
```
Respond :
```javascript
{
  	...
	"delivery_stats": {
            "order_create_ts": "2020-06-26+02:00",
            "date_delivery_service_accepted": "2020-07-10+02:00",
            "date_first_delivery": "2020-07-13+02:00",
            "date_delivery_finished": "2020-07-13+02:00",
            "first_delivery_date": "2020-07-13+02:00",
            "last_delivery_service_event_code": "3.120",
            "last_delivery_service_event_date": "2020-07-13+02:00",
            "last_delivery_service_event_place": "Ansfelden",
            "all_delivery_service_place": "10.07.2020,Anthering;13.07.2020,Ansfelden",
            "tracking_last_event": "2020-07-17T18:52:58+02:00"
        }
    	]
}
```
# get_document - Sales Order with document information
**Example** :

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "400000000725",
  "return_document_info" : "true"
}
```
Respond :
```javascript
{
  	...
	    "document_info": [
            {
                "user_email": "test@gmail.com",
                "name": "Glavni",
                "surname": "account",
                "operation_type": "NEW",
                "operation_time": "2020-11-19T12:12:07+02:00"
            },
            {
                "user_email": "test@gmail.com",
                "name": "Glavni",
                "surname": "account",
                "operation_type": "CHANGE",
                "operation_time": "2020-11-27T11:10:43+02:00"
            },
            {
                "user_email": "test@gmail.com",
                "name": "Glavni",
                "surname": "account",
                "operation_type": "CUSTOM",
                "notes": "Naročilo preneseno na račun 1-MK-1545",
                "operation_time": "2020-11-27T11:11:08+02:00"
            },
            {
                "user_email": "test@gmail.com",
                "name": "Glavni",
                "surname": "account",
                "operation_type": "DOCUMENT_STATUS_CHANGE",
                "value_previous": "Novo",
                "value_new": "Pripravljen za odpremo",
                "operation_time": "2020-11-27T11:11:08+02:00"
            }
        ]
}
```

# get_document - Sales order with attachments
**Example** :
POST - https://main.metakocka.si/rest/eshop/v1/get_document

**Data parameters**

| Parameter        | Required/Optional | Description     |
|------------------|-------------------|-----------------|
| show_attachments | Optional          | Default "false" |

Request :
```json
{
  "secret_key": "8899",
  "company_id": "16",
  "doc_type": "sales_order",
  "doc_id": "400000000725",
  "show_attachments": "true"
}
```
Response :
```json
{
  ...
    "attachment_list": [
        {
            "source_url": "PUBLIC_FILE_URL"
        }
    ]
}
```

# get_document - Sales order with product metadata
**Example** :
POST - https://main.metakocka.si/rest/eshop/v1/get_document

**Data parameters**

| Parameter             | Required/Optional | Description                                                  |
|-----------------------|-------------------|--------------------------------------------------------------|
| show_product_metadata | Optional          | Default "false". Paramater also works with /search endpoint. |

Request :
```json
{
  "secret_key": "8899",
  "company_id": "16",
  "doc_type": "sales_order",
  "doc_id": "400000000725",
  "show_product_metadata": "true"
}
```
Response :
```json
{
  ...
  "product_list": [
    {
      "count_code": "PA_115_PA",
      "mk_id": "1600000392",
      "code": "art1",
      "name": "art1",
      "unit": "kos",
      "amount": "1",
      "price": "1",
      "discount": "0",
      "tax": "EX4",
      "meta_data": [
        {
          "display_key": "Design ID",
          "display_value": "87cd01c179014823bd4bdf8a8cb3facc",
          "key": "Design ID",
          "value_string": "87cd01c179014823bd4bdf8a8cb3facc"
        },
        {
          "display_key": "Tile ID",
          "display_value": "0",
          "key": "Tile ID",
          "value_string": "0"
        }
      ]
    }
  ]
}
```

# get_document - Sales Order with credit value
**Example** :

Notes:
* Also works with /search endpoint

**Request Data parameters**

| Parameter       | Required/Optional | Description     |
|-----------------|-------------------|-----------------|
| show_sum_credit | Optional          | Default "false" |

**Response Data parameters**

| Parameter  | Description                                                                      |
|------------|----------------------------------------------------------------------------------|
| sum_credit | A positive number that contains the sum of credit values of all linked invoices. |

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "1600202487",
  "show_sum_credit " : "true"
}
```
Respond :
```javascript
{
    ...
    "sum_basic": "165.57",
    "sum_tax_ex4": "36.43",
    "sum_all": "202",
    "sum_paid": "202",
    "sum_credit": "50",
    "profit_center": "DEMO",
    "profit_center_desc": "DEMO description",
    "bank_ref_number": "25990",
    "method_of_payment": "PayPal",
    ...
}
```

# get_document - Sales Order with split orders
**Example** :

Notes:
* Also works with /search endpoint

**Request Data parameters**

| Parameter         | Required/Optional | Description     |
|-------------------|-------------------|-----------------|
| show_split_orders | Optional          | Default "false" |

**Response Data parameters**

| Parameter    | Description                   |
|--------------|-------------------------------|
| split_orders | A list of split sales orders. |

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "1600202487",
  "show_split_orders " : "true"
}
```
Respond :
```javascript
{
    "mk_id": "1600202487",
    "doc_type": "sales_order",
    "opr_code": "0",
    "count_code": "PP-27408",
    "doc_date": "2023-06-14+02:00",
    "bank_ref_number": "27408",
    "commercialist_email": "mail@gmail.com",
    "salesOrderTrackingType": "bill",
    "created_ts": "2023-06-14T14:30:04+02:00",
    "split_orders": [
        {
            "mk_id": "400000002893",
            "doc_type": "sales_order",
            "opr_code": "0",
            "count_code": "PP-27409",
            "doc_date": "2023-06-14+02:00",
            "partner": {
                "mk_id": "1600000019",
                "business_entity": "true",
    ...
}
```

# get_document - Sales Order with stickers
**Example** :

Notes:
* Also works with /search endpoint
* Sticker url is read from linked invoice or delivery note

**Request Data parameters**

| Parameter           | Required/Optional | Description     |
|---------------------|-------------------|-----------------|
| return_stickers_url | Optional          | Default "false" |

**Response Data parameters**

| Parameter    | Description                                                                                                                  |
|--------------|------------------------------------------------------------------------------------------------------------------------------|
| sticker_list | A list of sticker objects.                                                                                                   |
| url          | Url to the sticker                                                                                                           |
| valid_until  | Date time when url becomes inaccessible. This url is active 7 days from creation. After 7 days a new link will be generated. |

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "1600202487",
  "return_stickers_url" : "true"
}
```
Respond :
```javascript
{
    "mk_id": "1600202487",
    "doc_type": "sales_order",
    "opr_code": "0",
    "count_code": "PP-27408",
    "doc_date": "2023-06-14+02:00",
    "salesOrderTrackingType": "bill",
    "created_ts": "2023-06-14T14:30:04+02:00",
    "sticker_list": [
        {
            "url": "https://metakocka-generated-stickers-dev.s3.amazonaws.com/16/File.pdf?AWSAccessKeyId=key&Expires=1703000406&Signature=sign%3D",
            "valid_until": "2023-12-19T16:40:06+02:00"
        }
    ]
    ...
}
```

# get_document - Sales Order products with linked invoice serial data
**Example** :

Notes:
* If a Sales Order is linked to an invoice, the serial data from that invoice's product, which is linked with the Sales Order's product, will overwrite the serial data on the Sales Order's product.
* Only "lot_number_value" is currently supported
* Also works with /search endpoint

**Request Data parameters**

| Parameter                               | Required/Optional | Description     |
|-----------------------------------------|-------------------|-----------------|
| read_product_serial_from_linked_invoice | Optional          | Default "false" |

**Response Data parameters**

| Parameter        | Description                                                |
|------------------|------------------------------------------------------------|
| lot_number_value | Lot number set on the product linked with the Sales Order. |

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "1600202487",
  "read_product_serial_from_linked_invoice" : "true"
}
```
Respond :
```javascript
{
    "mk_id": "1600202487",
    "doc_type": "sales_order",
    "opr_code": "0",
    "count_code": "PP-27408",
    "doc_date": "2023-06-14+02:00",
    "created_ts": "2023-06-14T14:30:04+02:00",
    "warehouse": "nas1",
    "product_list": [
        {
            "count_code": "PA-4143",
            "mk_id": "1600123008",
            "code": "lt1",
            "amount": "10",
            "price": "55",
            "discount": "0",
            "tax": "EX4",
            "microlocation": "m1",
            "lot_number_value": "33"
        }
    ]
    ...
}
```

# get_document - Sales Order with tracking url
**Example** :

Notes:
* Also works with /search endpoint

**Request Data parameters**

| Parameter         | Required/Optional | Description     |
|-------------------|-------------------|-----------------|
| show_tracking_url | Optional          | Default "false" |

**Response Data parameters**

| Parameter    | Description                       |
|--------------|-----------------------------------|
| tracking_url | Tracking url for delivery service |
| tracking_page_url | Url for tracking page |

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "1600202487",
  "show_tracking_url " : "true"
}
```
Respond :
```javascript
{
    "mk_id": "1600202487",
    "doc_type": "sales_order",
    "opr_code": "0",
    "count_code": "PP-27408",
    "doc_date": "2023-06-14+02:00",
    "bank_ref_number": "27408",
    "commercialist_email": "mail@gmail.com",
    "salesOrderTrackingType": "bill",
    "created_ts": "2023-06-14T14:30:04+02:00",
    "extra_column": [
        {
            "name": "tracking_number",
            "value": "TS600511111"
        },
        {
            "name": "tracking_url",
            "value": "https://gls-group.eu/SI/sl/sledenje-posiljki?match=TS600511111"
        },
	{
            "name": "tracking_page_url",
            "value": "https://dev4main.metakocka.si/rest/trackingpage/show/2374/237400000061/503522969"
        }
    ]
}
```
# get_document - Sales Order purchase prices
You can get the FIFO purchase price, last purchase price, and price from the pricelist for products on order.

Requirements : see https://metakocka.freshdesk.com/a/solutions/articles/3000124471 for the required settings on your metakocka account.

Notes :
* FIFO purchase price : order must have an invoice and this invoice must be older than the current date
* price from pricelist : see https://metakocka.freshdesk.com/a/solutions/articles/3000124471 for details on how it works
* if the product is a compound product, the call will return values for every separate product in this compound. Paramether "amount" is how many peaces of product is inside compound.
* paramether "return_purchase_price" is supported in get_document and search call.

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "1600202487",
  "return_purchase_price " : "true"
}
```

Respond :
```javascript
{
    "mk_id": "400000001382",
    "doc_type": "sales_order",
    "opr_code": "0",
    "count_code": "PP-27574",
    "doc_date": "2024-06-11+02:00",
    "partner": {
        "mk_id": "1600256350",
        .....
    },
    "receiver": {
        "mk_id": "1600256350",
        .....
    },
    "product_list": [
        {
            "count_code": "PA-4166",
            "mk_id": "1600129495",
            "code" : "toy_1x_car_2x_teddybear",
            "name" : "Toy : Car + 2x Teddy Bear",
            .....
            "purchase_price_list": [
                {
                    "mk_id": "160055555",
                    "code": "car",
                    "stock_price" : "2.5",
                    "stock_allocation_cost" : "0.3",                    
                    "last_price" : "2.1",
                    "last_allocation_cost" : "0.2",                    
                    "pricelist_price": "2.7",
                    "amount" : "1"
                },
                {
                    "mk_id": "160066666",
                    "code": "teddybear",
                    "stock_price" : "3.7",
                    "stock_allocation_cost" : "0.2",                    
                    "last_price" : "3.2",
                    "last_allocation_cost" : "0.4",                    
                    "pricelist_price": "2.9",
                    "amount" : "2"
                }                
            ]
        },
        {
            "count_code": "30852",
            "mk_id": "1600339495",
            "code": "delivery_service",
            ....
            "purchase_price_list": [
                {
                    "code": "delivery_service",
                    "pricelist_price": "1.4",
                    "amount" : "1"                    
                }
            ]
        }
    ]
}
```

Notes :
* The first product "Toy : Car + 2 x Teddy Bear" (code toy_1x_car_2x_teddybear) is a compound product from "car" and "teddybear" material products. The parameter purchase_price_list will contain the purchase price for every product. In this case "code" parameter will not match.
* The second product "delivery_service" is a service and the product in purchase_price_list array has the same code as the parent product.

# get_document - Sales Order with associated tracking numbers
**Example** :

Notes:
* Also works with /search endpoint
* 'associated_tracking_numbers' is returned only when 'tracking_number' is present as well

**Request Data parameters**

| Parameter                          | Required/Optional | Description     |
|------------------------------------|-------------------|-----------------|
| return_associated_tracking_numbers | Optional          | Default "false" |

**Response Data parameters**

| Parameter                   | Description                           |
|-----------------------------|---------------------------------------|
| associated_tracking_numbers | Tracking numbers separated by commas. |
Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "1600202487",
  "return_associated_tracking_numbers " : "true"
}
```
Respond :
```javascript
{
    "mk_id": "1600202487",
    "doc_type": "sales_order",
    "opr_code": "0",
    "count_code": "PP-27408",
    "doc_date": "2023-06-14+02:00",
    "bank_ref_number": "27408",
    "commercialist_email": "mail@gmail.com",
    "salesOrderTrackingType": "bill",
    "created_ts": "2023-06-14T14:30:04+02:00",
    "extra_column": [
                {
                    "name": "tracking_number",
                    "value": "TrackingCodeMain"
                },
                {
                    "name": "associated_tracking_numbers",
                    "value": "TrackingCode1,TracklingCode2"
                }
            ],
}
```

## Special paramethers
* show\_last\_payment\_date - see [Bill example](/docs/documents_get_document_bill.md)
