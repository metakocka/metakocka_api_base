## Warehouse documents - update
You can update specific fields on warehouse documents (see table below).

| Parameter               | Notes                                       |
|-------------------------|---------------------------------------------|
| mk_id                   | Required for identification.                |
| partner                 |                                             |
| receiver                |                                             |
| client                  |                                             |
| title                   |                                             |
| status_code             |                                             |
| warehouse               |                                             |
| currency_code           |                                             |
| buyer_order             |                                             |
| commercialist_email     |                                             |
| write_off               |                                             |
| discount_percent        |                                             |
| discount_value          |                                             |
| pariteta                |                                             |
| profit_center           |                                             |
| sales_pricelist_code    | Only for delivery_note and packing_list     |
| purchase_pricelist_code | Only for receiving_note and acceptance_note |
| packlist_code           | Only for acceptance_note                    |
| packlist_date           | Only for acceptance_note                    |
| delivery_type           |                                             |
| delivery_type           |                                             |
| product_list            | Supported insert, update, delete            |
| notes                   |                                             |
| order_list              |                                             |
| receiving_note_list     |                                             |
| offer_list              |                                             |
| workorder_list          |                                             |
| sales_order_list        |                                             |
| delivery_note_list      |                                             |
| extra_column            |                                             |
| meta_data               |                                             |


All values will change only if the new value is different from the previous value.


**URL**: https://main.metakocka.si/rest/eshop/v1/update_document

**Type**: POST


## Warehouse docs (delivery note, packing list, etc)
| doc_type                    | SLO              | EN                        |
|-----------------------------|------------------|---------------------------|
| warehouse\_delivery\_note   | Nalog za odpremo | Delivery note             |
| warehouse\_packing\_list    | Dobavnica        | Packing list              |
| warehouse\_receiving\_note  | Nalog za prevzem | Inbound order             |
| warehouse\_acceptance\_note | Prevzemnica      | Goods received note       |

**Request**:
```javascript
{
    "secret_key": "8899",
    "company_id": "16",
    "mk_id": "400000008986",
    "doc_type": "warehouse_delivery_note",
    "title": "This is title",
    "buyer_order": "MK1223312",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "province": "Severna primorska",
        "country": "Slovenia"
    },
    "offer_list": [
    	{
    		"count_code": "37"
    	},
    	{
    		"count_code": "38"
    	}    	
    ],
    "sales_order_list": [
    	{
    		"count_code": "232"
    	}   	
    ],
    "workorder_list": [
    	{
    		"count_code": "431"
    	}   	
    ],
    "discount_value": "15",
    "currency_code": "EUR",
    "doc_created_email": "m@m.com",    
    "sales_pricelist_code": "cenik_se_1",
    "status_code": "delno_aktiven",
    "warehouse": "glavni",
    "notes": "to so notes.",
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price": "100",
            "tax": "EX4"
        }
    ]
}
```

Respond:
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "416",
    "opr_time_no_lock_ms": "415",
    "document_type_short": "SK_DO",
    "mk_id": "400000008986",
    "count_code": "SK_1337"
}
```

## Warehouse docs - update partner, receiver, client
Request:
```javascript
{  
  "mk_id": "400000008986",
  "secret_key": "8899",
  "company_id": "16",  
  "doc_type": "warehouse_delivery_note",
  
  "partner": {
          "business_entity": "false",
          "taxpayer": "true",
          "foreign_county": "false",
          "tax_id_number": "SI20000001",
          "customer": "API partner 1",
          "street": "Slovenska cesta 23",
          "post_number": "1000",
          "place": "Ljubljana",
          "province": "Severna primorska",
          "country": "Slovenia",
          "partner_contact": {
              "name": "Jaka Novak",
              "phone": "05 320 24 82",
              "fax": "05 320 24 62",
              "gsm": "071 333 442",
              "email": "test3@test.co.uk"
          }
  },
  "receiver": {
          "business_entity": "false",
          "taxpayer": "true",
          "foreign_county": "false",
          "tax_id_number": "SI20000002",
          "customer": "API partner 5",
          "street": "Slovenska cesta 55",
          "post_number": "1000",
          "place": "Ljubljana",
          "country": "Slovenia",
          "partner_contact": {
              "name": "Rok Doltar",
              "phone": "05 320 24 81",
              "fax": "05 320 24 81",
              "gsm": "071 333 441",
              "email": "test@test.co.uk"
          }
  },
    "client": {
          "business_entity": "false",
          "taxpayer": "true",
          "foreign_county": "false",
          "tax_id_number": "SI20000003",
          "customer": "API Client",
          "street": "Slovenska cesta 100",
          "post_number": "1000",
          "place": "Ljubljana",
          "country": "Slovenia",
          "partner_contact": {
              "name": "Janko Nepridiprav",
              "gsm": "123 456 789",
              "email": "janko@test.co.uk"
          }
  }
}
```

## Warehouse docs - updating products
**Notes**
- Product quantity (amount) must be greater than 0. If set to 0 or left empty, an error will be thrown.
- To update product "mk_row_id" is required.
- To delete product "mk_row_id" and "mark_delete = true" are required.
  Request:
```javascript
{  
  "mk_id": "400000008986",
  "secret_key": "8899",
  "company_id": "16",  
  "doc_type": "warehouse_delivery_note",
  
  "product_list": [
        {
            "count_code": "6893",
            "mk_id": "1600604262",
            "code": "art1",
            "name": "art1",
            "name_desc": "Artikel1",
            "amount": "10",
            "price": "4.233766",
            "tax": "EX4",
            "microlocation": "m2",
            "serial_number_value": "s1,s2",
            "lot_number_value": "l1",
            "expiration_date_value": "2020-03-02+02:00"
        },
        {
            "count_code": "6893",
            "mk_id": "1600604262",
            "mk_row_id": "1600627620",
            "code": "Art2",
            "name": "Art2",
            "amount": "2",
            "price_with_tax": "10",
            "tax": "EX4",
            "packaging_waste_paper":"10"
            "packaging_waste_wood":"11"
        },
         {
            "mark_delete": true,
            "mk_id": "1600604262",
            "mk_row_id": "1600627620",
            "code": "Art3",
            "name": "Art3",
            "amount": "2",
            "price_with_tax": "10",
            "tax": "EX4"
        }
    ]
}
```