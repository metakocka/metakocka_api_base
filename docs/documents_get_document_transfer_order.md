**URL** : https://main.metakocka.si/rest/eshop/v1/get_document

# get_document - Transfer order

**Example** :
* Either "doc_id" or "doc_count_code" can be used for identification.

Request : (POST - https://main.metakocka.si/rest/eshop/v1/get_document)
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "transfer_order",
  "doc_id" : "1600260667"
  or
  "doc_count_code : "DocumentCountCode"
}
```
Respond :
```javascript
{
  {
    "company_id": "16",
    "mk_id": "1600624994",
    "doc_type": "transfer_order",
    "opr_code": "0",
    "count_code": "SM_131",
    "doc_date": "2024-12-10+02:00",
    "product_list": [
        {
            "count_code": "7012",
            "mk_id": "1600615068",
            "code": "artPrevzemTest2",
            "name": "artPrevzemTest2",
            "amount": "1",
            "microlocation": "m1",
            "target_microlocation": "m1",
            "amount_original": "1"
        },
        {
            "count_code": "PA-4143",
            "mk_id": "1600123008",
            "code": "lt1",
            "name": "lot test 1",
            "amount": "1",
            "microlocation": "m1",
            "target_microlocation": "m1",
            "lot_number_value": "lot1",
            "amount_original": "1"
        },
        {
            "count_code": "26298",
            "mk_id": "1600200038",
            "code": "exp_dateCode",
            "name": "exp_date",
            "amount": "1",
            "microlocation": "m1",
            "target_microlocation": "m1",
            "expiration_date_value": "2024-03-14+02:00",
            "amount_original": "1"
        },
        {
            "count_code": "a14150",
            "mk_id": "1600124751",
            "code": "dnser",
            "name": "DN serijska",
            "amount": "1",
            "microlocation": "m1",
            "target_microlocation": "m1",
            "serial_number_value": "213213",
            "amount_original": "1"
        }
    ],
    "warehouseIdFrom": "1600000067",
    "warehouseIdTo": "1600263862",
    "warehouse_mark_from": "oznaka2",
    "warehouse_mark_to": "nas1"
}
```
