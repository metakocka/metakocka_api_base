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
