**URL** : https://main.metakocka.si/rest/eshop/v1/get_document

# get_document - Workorder

**Example** :

Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "workorder",
  "doc_id" : "1600260667"
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
    "country_iso_2" : "SI",
    "count_code": "1000",
    "useCustomerAsContact": "false",
    "mk_id": "180600025047",
    "mk_address_id": "180600073437"
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
  "status_desc": "active",
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
  "create_product_realization_list": [
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
      "material_plan_list": [
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
          "material_realization_list": [
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
      "work_plan_list": [
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
          "work_realization_list": [
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
