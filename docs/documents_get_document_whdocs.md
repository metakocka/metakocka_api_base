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
  "mk_id": "1600260667",
  "doc_type": "workorder",
  "opr_code": "0",
  "count_code": "DN-1152",
  "doc_date": "2015-09-26+02:00",
  "partner": {
    "mk_id": "1600054609",
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
  "sales_pricelist_code": "PC_115",
  "purchase_pricelist_list": [
    {
      "count_code": "PC-2011"
    },
    {
      "count_code": "narocilnica_cenik"
    }
  ],
  "discount_value": "10",
  "status_code": "Aktiven",
  "title": "REST test1",
  "offer_list": [
    {
      "count_code": "PP1_305"
    }
  ],
  "buyer_order": "narociloKupca1",
  "sales_order_list": [
    {
      "count_code": "PP-25282"
    }
  ],
  "contact_person_name": "Podobnik Blaž",
  "start_date": "2015-09-27+02:00",
  "produce_deadline_date": "2015-09-30+02:00",
  "finish_date": "2015-10-01+02:00",
  "caretaker_list": [
    {
      "count_code": "matic petek - PF onaon1",
      "email": "maticpetek@gmail.com"
    },
    {
      "count_code": "matic_delovno_mesto test",
      "email": "matic_delovno_mesto@gmail.com"
    }
  ],
  "sum_material": "5",
  "sum_work": "40.04",
  "sum_purchase": "45.04",
  "sum_sales_plan": "216",
  "sum_sales_realization": "98",
  "sum_roi": "52.96",
  "create_product_list": [
    {
      "product_mk_id": "1600000392",
      "product_count_code": "PA_115_PA",
      "product_code": "art1",
      "product_title": "art1",
      "product_workorder_desc": "izdelek - realizacija",
      "amount_plan": "2",
      "amount_realization": "1",
      "price_sales": "120",
      "price_purchase": "45.04",
      "discount_sales": "10",
      "sum_sales": "108",
      "material_list": [
        {
          "product_mk_id": "1600022698",
          "product_count_code": "asdfd",
          "product_code": "asdf",
          "product_title": "asfd",
          "warehouse_code": "test8_skl",
          "product_workorder_desc": "Material - plan",
          "amount_plan": "4",
          "amount_realization": "2",
          "price_purchase": "0",
          "price_purchase_plan": "1.4",
          "sum_purchase": "5",
          "when": "2015-09-28+02:00",
          "material_list": [
            {
              "product_mk_id": "1600022698",
              "product_count_code": "asdfd",
              "product_code": "asdf",
              "product_title": "asfd",
              "warehouse_code": "test8_skl",
              "product_workorder_desc": "material - realizacija",
              "amount_realization": "2",
              "price_purchase": "2.5",
              "sum_purchase": "5",
              "when": "2015-09-28+02:00"
            }
          ]
        }
      ],
      "work_list": [
        {
          "product_mk_id": "1600000028",
          "product_count_code": "PA_101_PA",
          "product_code": "pod sifra 2",
          "product_title": "pod naziv 2",
          "performer_name_list": [
            {
              "count_code": "Janez Novak",
              "email": "janez.novak@mail.com"
            },
            {
              "count_code": "Matic Petek - brez PF",
              "email": "mat....icpetek@gmail.com"
            }
          ],
          "product_workorder_desc": "plan delo",
          "amount_plan": "10",
          "amount_realization": "4",
          "price_purchase_plan": "10.01",
          "sum_purchase": "40.04",
          "when": "2015-09-28+02:00",
          "work_list": [
            {
              "product_mk_id": "1600000028",
              "product_count_code": "PA_101_PA",
              "product_code": "pod sifra 2",
              "product_title": "pod naziv 2",
              "performer_name_list": [
                {
                  "count_code": "matic petek - PF onaon1",
                  "email": "maticpetek@gmail.com"
                }
              ],
              "product_workorder_desc": "poraba delo",
              "amount_realization": "4",
              "price_purchase": "10.01",
              "sum_purchase": "40.04",
              "when": "2015-09-28+02:00"
            }
          ]
        }
      ]
    }
  ]
}
```

## Special paramethers
Paramether | Type | Description |
-----------|------|-------------|
show\_purchase\_price\_and\_allo\_cost | bool | get purchase price and purchase allocated cost for product.

###show\_purchase\_price\_and\_allo\_cost
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