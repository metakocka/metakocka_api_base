**URL** : https://main.metakocka.si/rest/eshop/v1/get_document

# get_document - Purchase Order

**Example** :

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "purchase_order",
  "doc_id" : "1600202487"
}
```
Respond :
```javascript
{
    "mk_id": "1600202487",
    "doc_type": "purchase_order",
    "opr_code": "0",
    "count_code": "order1",
    "doc_date": "2026-07-13+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "supplier": "true",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia",
        "country_iso_2" : "SI",
        "count_code": "1600002672"
        "mk_id": "180600025047",
        "mk_address_id": "180600073437"
    },
    "receiver": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000002",
        "customer": "API partner 2",
        "street": "Slovenska cesta 200",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia",
        "country_iso_2" : "SI",
        "count_code": "1600002673"
        "mk_id": "180600025048",
        "mk_address_id": "180600073438"
    },
    "purchase_pricelist_code": "cenik_pr_1",
    "discount_value": "50",
    "currency_code": "EUR",
    "delivery_type": "GLS",
    "status_code": "Odprto",
    "status_desc": "open",
    "title": "narocilnica 1",
    "pariteta": "Lasten Prevzem",
    "delivery_date": "2014-11-22+02:00",
    "offer_number": "ponudba1",
    "warehouse_delivery": "glavni",
    "sales_order_list": [{
            "mk_id": "400000000161",
            "count_code": "PP-26755",
            "doc_type": "sales_order"
        }
    ],
    "doc_created_email": "acc@mail.com",
    "notes": "short description",
    "product_list": [{
            "mk_id": "1600162716",
            "code": "art1",
            "name": "MK prenos 1",
            "name_desc": "MK prenos 1 artikel opis",
            "unit": "kos",
            "amount": "1",
            "price": "100",
            "tax": "EX4",
            "doc_desc": "Opis na narocilnici"
        }
    ],
    "doc_link_list": [{
            "mk_id": "400000006162",
            "count_code": "PR1_4336",
            "doc_type": "warehouse_receiving_note"
        },
        {
            "mk_id": "400000003555",
            "count_code": "PP-27759",
            "doc_type": "sales_order"
        }
    ],
    "sum_basic": "50",
    "sum_discount": "50",
    "sum_tax_ex4": "11",
    "sum_prepayment": "0",
    "sum_all": "61",
    "sum_paid": "0",
    "profit_center": "ProfitCenter1",
    "profit_center_desc": "ProfitCenter1 description"
}
```