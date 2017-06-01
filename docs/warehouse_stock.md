# 1. JSON Examples
**URL** : https://main.metakocka.si/rest/eshop/v1/json/warehouse_stock

**Description** : return list of all product stock

Attribute                 | Type | Notes| MK SLO |
--------------------------|------|------|--------|
| wh_id_list | string | If attribute is set, you will limit response by given warehouse ids. | / |
| offset | int | see notes. | / |
| limit | int | see notes. | / |

## 1.1 Basic call
Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
	  "offset":"0",
	  "limit":"10"
}

Respond :
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

## 1.1 With wh_id_list
Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
	  "wh_id_list":"1600000067,1600000042,1600430213"
}

Respond :
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
      "warehouse_id": "1600000067",
      "mk_id": "1600397819",
      "count_code": "16896",
      "title": "GU10 60x3014 SMD 6,5W Warmweiß",
      "amount": "0",
      "reserved_amount": "3",
      "free_amount": "-3",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000067",
      "mk_id": "1600397818",
      "count_code": "16895",
      "title": "GU10 54x3528SMD 3W Warmweiß",
      "amount": "0",
      "reserved_amount": "3",
      "free_amount": "-3",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000067",
      "mk_id": "1600280113",
      "count_code": "21827",
      "title": "na23 test",
      "amount": "10",
      "microlocation": "A1",
      "unit": "kos"
    },
    {
      "warehouse_id": "1600000067",
      "mk_id": "1600220960",
      "count_code": "20767",
      "title": "Add-on Modul Bar",
      "amount": "1",
      "unit": "kos"
    }
  ]
}
