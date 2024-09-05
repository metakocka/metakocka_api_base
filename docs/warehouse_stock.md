# 1. JSON Examples
**URL** : https://main.metakocka.si/rest/eshop/v1/json/warehouse_stock

**Description** : return list of all product stock. We also have support for calling webhooks in case of change of stock.

Attribute                 | Type | Notes| MK SLO |
--------------------------|------|------|--------|
| wh_id_list | string | If attribute is set, you will limit response by given warehouse ids. | / |
| offset | int | see notes. | / |
| limit | int | see notes. | / |
| eshop_sync | bool | Product must be flag for e-commerce sync | Izmenjava - Spletna trg. |
| product_code_list | String | Limit respond by list of MK codes (or webshops SKU), separater with comma. | / |
| product_mk_id_list | String | Limit respond by list of MK ID, separater with comma | / |
| return\_expect\_order\_delivery\_date | bool | Response will have additional attribute "order_in_delivery" with a list of amounts and delivery dates per returned products. | / |
| return\_reservation\_without\_amount | bool | When set to true, the response will return products that are currently out of stock. | / |

If MetaKocka company is using reservations, amount will be return as :
* amount - stock amount
* reserved_amount - reservation amount
* free_amount - difference between (amount - reserved_amount)

If company is without reservations, only "amount" will be in respond.

## 1.1 Basic call - no reservations
Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
	  "offset":"0",
	  "limit":"10"
}
```
Respond :
``` javascript
{
  "opr_code": "0",
  "opr_time_ms": "135",
  "offset": "0",
  "limit": "10",
  "stock_list": [
    {
      "warehouse_id": "1600240696",
      "mk_id": "96600034074",
      "count_code": "6967",
      "title": "¨PRALNI STROJ KORTING WK6101",
      "amount": "47",
      "microlocation": "A1",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600214157",
      "mk_id": "96600034074",
      "count_code": "6967",
      "title": "¨PRALNI STROJ KORTING WK6101",
      "amount": "1559",
      "microlocation": "A1",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600214157",
      "mk_id": "96600034074",
      "count_code": "6967",
      "title": "¨PRALNI STROJ KORTING WK6101",
      "amount": "-3",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000042",
      "mk_id": "96600034074",
      "count_code": "6967",
      "title": "¨PRALNI STROJ KORTING WK6101",
      "amount": "9990",
      "microlocation": "A1",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000142",
      "mk_id": "96600034074",
      "count_code": "6967",
      "title": "¨PRALNI STROJ KORTING WK6101",
      "amount": "-10",
      "microlocation": "A1",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000067",
      "mk_id": "96600034074",
      "count_code": "6967",
      "title": "¨PRALNI STROJ KORTING WK6101",
      "amount": "1",
      "microlocation": "A1",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000042",
      "mk_id": "1600444357",
      "count_code": "16946",
      "title": "dn_prenosi_obracunan",
      "amount": "-21",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000067",
      "mk_id": "1600412484",
      "count_code": "16906",
      "title": "Igor test",
      "amount": "103",
      "microlocation": "B1",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000042",
      "mk_id": "1600412484",
      "count_code": "16906",
      "title": "Igor test",
      "amount": "-3",
      "microlocation": "B1",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000311",
      "mk_id": "1600412484",
      "count_code": "16906",
      "title": "Igor test",
      "amount": "350",
      "microlocation": "A1",
      "unit": "kos"
    }
  ]
}
```
## 1.1 With wh_id_list - with reservations

Request :
``` javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
	  "wh_id_list":"1600000067,1600000042,1600430213"
}
```
Respond :
``` javascript
{
  "opr_code": "0",
  "opr_time_ms": "109",
  "wh_id_list": "1600000067,1600000042,1600430213",
  "offset": "0",
  "limit": "1000",
  "stock_list": [
    {
      "warehouse_id": "1600000067",
      "mk_id": "96600034074",
      "count_code": "6967",
      "title": "¨PRALNI STROJ KORTING WK6101",
      "amount": "1",
      "microlocation": "A1",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000067",
      "mk_id": "1600412484",
      "count_code": "16906",
      "title": "Igor test",
      "amount": "103",
      "microlocation": "B1",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000067",
      "mk_id": "1600412398",
      "count_code": "16903",
      "title": "Inverter Schweißgerät NTF ARC200M",
      "amount": "0",
      "reserved_amount": "1",
      "free_amount": "-1",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000067",
      "mk_id": "1600397820",
      "count_code": "16897",
      "title": "Liefermethode: DHL",
      "amount": "0",
      "reserved_amount": "1",
      "free_amount": "-1",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000042",
      "mk_id": "96600034074",
      "count_code": "6967",
      "title": "¨PRALNI STROJ KORTING WK6101",
      "amount": "9990",
      "microlocation": "A1",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600430213",
      "mk_id": "1600000028",
      "count_code": "PA_101_PA",
      "title": "pod naziv 2a",
      "amount": "6",
      "microlocation": "A1",
      "unit": "kos",
      "unit2": "m"
    }
  ]
}
```

## 1.1 With order in delivery

Request :
``` javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "return_expect_order_delivery_date":true
}
```
Respond :
``` javascript
{
    "opr_code": "0",
    "opr_time_ms": "86",
    "offset": "0",
    "limit": "1000",
    "stock_list": [
        {
            "warehouse_id": "1600129888",
            "mk_id": "1600000392",
            "count_code": "PA_115_PA",
            "code": "art1",
            "title": "art1",
            "amount": "1",
            "reserved_amount": "0",
            "free_amount": "1",
            "unit": "kos",
            "unit2": "blok",
            "unit_factor": "2"
        },
        {
            "warehouse_id": "1600263862",
            "mk_id": "1600000392",
            "count_code": "PA_115_PA",
            "code": "art1",
            "title": "art1",
            "amount": "10",
            "reserved_amount": "6",
            "free_amount": "4",
            "microlocation": "m1",
            "unit": "kos",
            "unit2": "blok",
            "unit_factor": "2"
        },
        {
            "warehouse_id": "1600000311",
            "mk_id": "1600000392",
            "count_code": "PA_115_PA",
            "code": "art1",
            "title": "art1",
            "amount": "-41",
            "reserved_amount": "54",
            "free_amount": "-95",
            "unit": "kos",
            "unit2": "blok",
            "unit_factor": "2"
        },
        {
            "warehouse_id": "1600263862",
            "mk_id": "1600000392",
            "count_code": "PA_115_PA",
            "code": "art1",
            "title": "art1",
            "amount": "863,75",
            "reserved_amount": "6",
            "free_amount": "857,75",
            "unit": "kos",
            "unit2": "blok",
            "unit_factor": "2"
        }
    ],
    "order_in_delivery": [
        {
            "mk_id": "1600000392",
            "expect_order_amount": "17",
            "export_order_delivery_date": "2020-10-24",
            "warehouse_id": "1600263862",
            "warehouse_mark": "nas1",
	    "status": "Odprta"
        },
        {
            "mk_id": "1600000392",
            "expect_order_amount": "9",
            "export_order_delivery_date": "2020-10-25",
            "warehouse_id": "1600263862",
            "warehouse_mark": "nas1",
	    "status": "Odprta"
        }
    ]
}
```
## 1.1 Return reservations without stock
Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "wh_id_list":"1600194133",
    "return_reservation_without_stock":"true"
}
```
Respond :
``` javascript
{
    "opr_code": "0",
    "opr_time_ms": "19",
    "wh_id_list": "1600194133",
    "offset": "0",
    "limit": "1000",
    "stock_list_count": "6",
    "stock_list": [
        {
            "warehouse_id": "1600194133",
            "mk_id": "1600540916",
            "count_code": "16916",
            "code": "nagode_nabava",
            "title": "nagode_nabava",
            "amount": "97",
            "reserved_amount": "7",
            "free_amount": "90",
            "microlocation": "A1",
            "unit": "kos"
        },
        {
            "warehouse_id": "1600194133",
            "mk_id": "1600540704",
            "count_code": "16915",
            "code": "nagode",
            "title": "nagode",
            "amount": "16",
            "reserved_amount": "0",
            "free_amount": "16",
            "microlocation": "A1",
            "unit": "kos"
        },
        {
            "warehouse_id": "1600194133",
            "mk_id": "1600540704",
            "count_code": "16915",
            "code": "nagode",
            "title": "nagode",
            "amount": "-5",
            "reserved_amount": "0",
            "free_amount": "-5",
            "unit": "kos"
        },
        {
            "warehouse_id": "1600194133",
            "mk_id": "1600540704",
            "count_code": "16915",
            "code": "nagode",
            "title": "nagode",
            "amount": "1000",
            "reserved_amount": "0",
            "free_amount": "1000",
            "microlocation": "B1",
            "unit": "kos"
        },
        {
            "warehouse_id": "1600194133",
            "mk_id": "1600147687",
            "count_code": "20350",
            "code": "s1",
            "title": "stol",
            "amount": "0",
            "reserved_amount": "1",
            "free_amount": "-1",
            "unit": "kos"
        },
        {
            "warehouse_id": "1600194133",
            "mk_id": "1600000066",
            "count_code": "PA_102_PA",
            "code": "sktest1",
            "title": "sktest1",
            "amount": "5",
            "reserved_amount": "0",
            "free_amount": "5",
            "microlocation": "B1",
            "unit": "kg",
            "unit2": "g",
            "unit_factor": "1000"
        }
    ]
}
```
