# Get complaint

**Description** : return complaint by :
* doc_id or
* doc_count_code

**Example** :

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "complaint",
  "doc_id":"1600608202",
  or
  "doc_count_code":"1623"
}
```
Respond :
```javascript
{
    "mk_id": "1600608202",
    "doc_type": "complaint",
    "opr_code": "0",
    "count_code": "1623",
    "partner": {
        "mk_id": "180600025047",
        "business_entity": "false",
        "taxpayer": "false",
        "foreign_county": "false",
        "customer": "METAKOCKA, NAPREDNE SPLETNE APLIKACIJE, D.O.O",
        "street": "test 2",
        "post_number": "1000",
        "place": "Komenda",
        "country": "Slovenia",
        "count_code": "12565",
        "mk_address_id": "180600073437",
        "country_iso_2": "SI",
        "buyer": "true",
        "supplier": "false"
    },
    "currency_code": "RON",
    "status_code": "completed",
    "buyer_order": "PP-27402",
    "created_ts": "2023-05-31T14:08:07+02:00",
    "doc_link_list": [
        {
            "mk_id": "400000002886",
            "count_code": "PP-27402",
            "doc_type": "sales_order"
        },
        {
            "mk_id": "1600608202",
            "count_code": "1-MK-2346",
            "doc_type": "sales_bill_domestic"
        },
        {
            "mk_id": "400000002887",
            "count_code": "PP-27403",
            "doc_type": "sales_order"
        },
        {
            "mk_id": "1600608209",
            "count_code": "1-MK-2347",
            "doc_type": "sales_bill_credit_note",
            "sum_eur": "1.23",
            "sum_currency": "6.10"
        }
    ],
    "last_change_user": "Glavni account",
    "complaint_products": {
        "count_code": "90040",
        "mk_id": "1600600802",
        "code": "art123",
        "amount": "1",
        "price": "1.00",
        "discount": "7",
        "tax": "EX4"
    },
    "additional_data": "{\r\n  \"completed_status_datetime\" : \"2023-05-31 15:17:22\",\r\n  \"customer_received\" : \"2023-06-01\",\r\n  \"customer_notes\" : [],\r\n  \"supplier_notes\" : [ ]\r\n}",
    "last_change_ts": "2023-05-31T15:17:12+02:00",
    "claim_note": "complaint",
    "claim_description": "opis zahtevka",
    "reclamation_reason": "returnPayment",
    "reclamation_description": "To je opis napake",
    "reclamation_replacement": "true",
    "include_services": "false",
    "refund": "false",
    "damaged": "true",
    "warehouse_damaged": "oznaka1",
    "claim_reason": "test12",
    "claim_type": "reclamation",
    "sales_order_new_status": "shipped"
}
```
