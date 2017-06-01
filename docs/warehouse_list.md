# 1. JSON Examples
**URL** : https://main.metakocka.si/rest/eshop/v1/json/warehouse_list

**Description** : return list of all warehouses with additional states:
* warehause stock

Attribute                 | Type | Notes| MK SLO |
--------------------------|------|------|--------|
| return\_warehause\_stock | bool | If attribute is set, every product in warehouse will have "amount" attribute. In case the product was newer use on stock, attribute "amount" will still have value 0. | / |
| wh_id_list | string | If attribute is set, you will limit response by given warehouse ids. | / |
| offset | int | see notes. | / |
| limit | int | see notes. | / |

Notes :
* call will always return max 1000 records (limit = 1000). To get next window of results, you must set offset on value 1000. Applies only when returning warehouse stock.

## 1.1 Warehouse list
Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16"
}

Respond :
{
  "opr_code": "0",
  "opr_time_ms": "58",
  "offset": "0",
  "limit": "1000",
  "warehouse_list_count": "7",
  "warehouse_list": [
    {
      "mk_id": "1600000042",
      "mark": "oznaka1",
      "name": "moje skladisce",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "čebuljeva 19",
      "post": "1000",
      "place": "Komenda",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "false"
    },
    {
      "mk_id": "1600000067",
      "mark": "oznaka2",
      "name": "oznaka2",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "ulica2",
      "post": "1000",
      "place": "Komenda",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "true"
    },
    {
      "mk_id": "1600000142",
      "mark": "sk1",
      "name": "sk1",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "ulica",
      "post": "1000",
      "place": "Ljubljana",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "false",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "false"
    },
    {
      "mk_id": "1600000143",
      "mark": "sk2",
      "name": "sk2",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "ulica123",
      "post": "2001",
      "place": "Maribor1",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "false"
    },
    {
      "mk_id": "1600000215",
      "mark": "kos_1",
      "name": "Kosovnica 1",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "ulica1",
      "post": "1000",
      "place": "Komenda",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "false"
    },
    {
      "mk_id": "1600000216",
      "mark": "kos_2",
      "name": "kosovnica_2",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "ulica2",
      "post": "2001",
      "place": "Maribor",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "false"
    },
    {
      "mk_id": "1600000311",
      "mark": "glavno",
      "name": "Glavno",
      "same_address_as_company": "true",
      "main_warehouse": "false",
      "street": "Ljubljanska 1",
      "post": "3000",
      "place": "Celje",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "true"
    }
  ]
}

## 1.2 Warehouse list with stock
Request :
{
    "secret_key":"my_secret_key",
    "company_id":"16",
	  "return_warehause_stock":"true"
}

Respond :
{  
   "opr_code":"0",
   "opr_time_ms":"886",
   "return_warehause_stock":"true",
   "offset":"0",
   "limit":"1000",
   "warehouse_list_count":"34",
   "warehouse_list":[  
      {  
         "mk_id":"1600000042",
         "mark":"oznaka1",
         "name":"moje skladisce",
         "same_address_as_company":"false",
         "main_warehouse":"false",
         "street":"čebuljeva 19",
         "post":"1000",
         "place":"Komenda",
         "country":"Slovenija",
         "default_microloc_id":"1600128800",
         "include_in_stock_info":"true",
         "active":"true",
         "warehouse_type":"normal",
         "show_product_free_stock":"false",
         "product_list":[  
            {  
               "count_code":"20755",
               "mk_id":"1600220924",
               "name":"3DCONNEXION SPACEMOUSE PRO WIRELESS",
               "amount_detail":[  
                  {  
                     "microloc":"B1",
                     "amount":"500"
                  }
               ]
            },
            {  
               "count_code":"20753",
               "mk_id":"1600220918",
               "name":"3DCONNEXION SPACEPILOT PRO",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-3",
                     "reserved_amount":"3"
                  }
               ]
            },
            {  
               "count_code":"20726",
               "mk_id":"1600220837",
               "name":"BAUTAB",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-10",
                     "reserved_amount":"10"
                  }
               ]
            },
            {  
               "count_code":"20644",
               "mk_id":"1600220591",
               "name":"3-LETNA VZDRŽEVALNA POGODBA ZWCAD+ ARCH",
               "unit_factor":"2",
               "amount_detail":[  
                  {  
                     "microloc":"A1",
                     "amount":"100"
                  }
               ]
            },
            {  
               "count_code":"20643",
               "mk_id":"1600220588",
               "name":"3-LETNA VZDRŽEVALNA POGODBA ZWCAD+ MECH",
               "amount_detail":[  
                  {  
                     "amount":"-5"
                  }
               ]
            }
         ]
      },
      {  
         "mk_id":"1600000067",
         "mark":"oznaka2",
         "name":"oznaka2",
         "same_address_as_company":"false",
         "main_warehouse":"false",
         "street":"ulica2",
         "post":"1000",
         "place":"Komenda",
         "country":"Slovenija",
         "default_microloc_id":"1600128800",
         "include_in_stock_info":"true",
         "active":"true",
         "warehouse_type":"normal",
         "show_product_free_stock":"true",
         "product_list":[  
            {  
               "count_code":"6967",
               "mk_id":"96600034074",
               "name":"¨PRALNI STROJ KORTING WK6101",
               "amount_detail":[  
                  {  
                     "microloc":"A1",
                     "amount":"1"
                  }
               ]
            },
            {  
               "count_code":"16906",
               "mk_id":"1600412484",
               "name":"Igor test",
               "amount_detail":[  
                  {  
                     "microloc":"B1",
                     "amount":"103"
                  }
               ]
            },
            {  
               "count_code":"16903",
               "mk_id":"1600412398",
               "name":"Inverter Schweißgerät NTF ARC200M",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-1",
                     "reserved_amount":"1"
                  }
               ]
            },
            {  
               "count_code":"16897",
               "mk_id":"1600397820",
               "name":"Liefermethode: DHL",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-1",
                     "reserved_amount":"1"
                  }
               ]
            },
            {  
               "count_code":"16896",
               "mk_id":"1600397819",
               "name":"GU10 60x3014 SMD 6,5W Warmweiß",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-3",
                     "reserved_amount":"3"
                  }
               ]
            },
            {  
               "count_code":"16895",
               "mk_id":"1600397818",
               "name":"GU10 54x3528SMD 3W Warmweiß",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-3",
                     "reserved_amount":"3"
                  }
               ]
            },
            {  
               "count_code":"21827",
               "mk_id":"1600280113",
               "name":"na23 test",
               "amount_detail":[  
                  {  
                     "microloc":"A1",
                     "amount":"10"
                  }
               ]
            },
            {  
               "count_code":"20767",
               "mk_id":"1600220960",
               "name":"Add-on Modul Bar",
               "amount_detail":[  
                  {  
                     "amount":"1"
                  }
               ]
            },
            {  
               "count_code":"20767",
               "mk_id":"1600220960",
               "name":"Add-on Modul Bar",
               "amount_detail":[  
                  {  
                     "microloc":"B1",
                     "amount":"1"
                  }
               ]
            },
            {  
               "count_code":"20755",
               "mk_id":"1600220924",
               "name":"3DCONNEXION SPACEMOUSE PRO WIRELESS",
               "amount_detail":[  
                  {  
                     "microloc":"A1",
                     "amount":"50"
                  }
               ]
            },
            {  
               "count_code":"20357",
               "mk_id":"1600153076",
               "name":"Povezan MS 1",
               "amount_detail":[  
                  {  
                     "microloc":"B1",
                     "amount":"1"
                  }
               ]
            },
            {  
               "count_code":"PA_117_PA",
               "mk_id":"1600000544",
               "name":"n117",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-2",
                     "reserved_amount":"2"
                  }
               ]
            },
            {  
               "count_code":"PA_115_PA",
               "mk_id":"1600000392",
               "name":"art1",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-10",
                     "reserved_amount":"10"
                  }
               ]
            },
            {  
               "count_code":"PA_108_PA",
               "mk_id":"1600000168",
               "name":"sestav_del_2",
               "amount_detail":[  
                  {  
                     "microloc":"B1",
                     "amount":"1"
                  }
               ]
            },
            {  
               "count_code":"PA_107_PA",
               "mk_id":"1600000167",
               "name":"sestav_del_1",
               "amount_detail":[  
                  {  
                     "microloc":"B1",
                     "amount":"2"
                  }
               ]
            },
            {  
               "count_code":"PA_102_PA",
               "mk_id":"1600000066",
               "name":"sktest1",
               "amount_detail":[  
                  {  
                     "microloc":"A1",
                     "amount":"30"
                  }
               ]
            }
         ]
      },
      {  
         "mk_id":"1600000142",
         "mark":"sk1",
         "name":"sk1",
         "same_address_as_company":"false",
         "main_warehouse":"false",
         "street":"ulica",
         "post":"1000",
         "place":"Ljubljana",
         "country":"Slovenija",
         "default_microloc_id":"1600128800",
         "include_in_stock_info":"false",
         "active":"true",
         "warehouse_type":"normal",
         "show_product_free_stock":"false",
         "product_list":[  
            {  
               "count_code":"6967",
               "mk_id":"96600034074",
               "name":"¨PRALNI STROJ KORTING WK6101",
               "amount_detail":[  
                  {  
                     "microloc":"A1",
                     "amount":"-10"
                  }
               ]
            },
            {  
               "count_code":"21792",
               "mk_id":"1600230944",
               "name":"1,3mm HVLP H-827P Spritzpistole Lackierpistole + 1,7mm Düsensatz",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-4",
                     "reserved_amount":"4"
                  }
               ]
            },
            {  
               "count_code":"20754",
               "mk_id":"1600220921",
               "name":"3DCONNEXION SPACEMOUSE PRO",
               "amount_detail":[  
                  {  
                     "microloc":"A1",
                     "amount":"-2"
                  }
               ]
            },
            {  
               "count_code":"PA_8_PA",
               "mk_id":"1600049952",
               "name":"normativ_1",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-3",
                     "reserved_amount":"3"
                  }
               ]
            },
            {  
               "count_code":"PA_2_PA",
               "mk_id":"1600043799",
               "name":"8400 Cradle",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-102",
                     "reserved_amount":"102"
                  }
               ]
            },
            {  
               "count_code":"PA_182_PA",
               "mk_id":"1600034641",
               "name":"a1111",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-68",
                     "reserved_amount":"68"
                  }
               ]
            },
            {  
               "count_code":"PA_175_PA",
               "mk_id":"1600031319",
               "name":"gogo_test_c",
               "amount_detail":[  
                  {  
                     "amount":"2"
                  }
               ]
            },
            {  
               "count_code":"PA_125_PA",
               "mk_id":"1600001059",
               "name":"a1",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-36",
                     "reserved_amount":"36"
                  }
               ]
            },
            {  
               "count_code":"art_cenik_test",
               "mk_id":"1600000206",
               "name":"art_cenik_test_2",
               "amount_detail":[  
                  {  
                     "amount":"10"
                  }
               ]
            },
            {  
               "count_code":"PA_102_PA",
               "mk_id":"1600000066",
               "name":"sktest1",
               "amount_detail":[  
                  {  
                     "amount":"-10"
                  }
               ]
            },
            {  
               "count_code":"PA_102_PA",
               "mk_id":"1600000066",
               "name":"sktest1",
               "amount_detail":[  
                  {  
                     "microloc":"A1",
                     "amount":"-4"
                  }
               ]
            },
            {  
               "count_code":"art2",
               "mk_id":"1600000051",
               "name":"art2 nazic opis",
               "amount_detail":[  
                  {  
                     "amount":"10"
                  }
               ]
            },
            {  
               "mk_id":"null",
               "amount_detail":[  
                  {  
                     "amount":"0",
                     "free_amount":"-2",
                     "reserved_amount":"2"
                  }
               ]
            }
         ]
      },
      {  
         "mk_id":"1600000143",
         "mark":"sk2",
         "name":"sk2",
         "same_address_as_company":"false",
         "main_warehouse":"false",
         "street":"ulica123",
         "post":"2001",
         "place":"Maribor1",
         "country":"Slovenija",
         "default_microloc_id":"1600128800",
         "include_in_stock_info":"true",
         "active":"true",
         "warehouse_type":"normal",
         "show_product_free_stock":"false",
         "product_list":[  
            {  
               "count_code":"PA_115_PA",
               "mk_id":"1600000392",
               "name":"art1",
               "amount_detail":[  
                  {  
                     "amount":"20"
                  }
               ]
            },
            {  
               "count_code":"PA_102_PA",
               "mk_id":"1600000066",
               "name":"sktest1",
               "amount_detail":[  
                  {  
                     "amount":"10"
                  }
               ]
            }
         ]
      },
      {  
         "mk_id":"1600000215",
         "mark":"kos_1",
         "name":"Kosovnica 1",
         "same_address_as_company":"false",
         "main_warehouse":"false",
         "street":"ulica1",
         "post":"1000",
         "place":"Komenda",
         "country":"Slovenija",
         "default_microloc_id":"1600128800",
         "include_in_stock_info":"true",
         "active":"true",
         "warehouse_type":"normal",
         "show_product_free_stock":"false",
         "product_list":[  
            {  
               "count_code":"art_cenik_test",
               "mk_id":"1600000206",
               "name":"art_cenik_test_2",
               "amount_detail":[  
                  {  
                     "amount":"-10"
                  }
               ]
            }
         ]
      },
      {  
         "mk_id":"1600000216",
         "mark":"kos_2",
         "name":"kosovnica_2",
         "same_address_as_company":"false",
         "main_warehouse":"false",
         "street":"ulica2",
         "post":"2001",
         "place":"Maribor",
         "country":"Slovenija",
         "default_microloc_id":"1600128800",
         "include_in_stock_info":"true",
         "active":"true",
         "warehouse_type":"normal",
         "show_product_free_stock":"false",
         "product_list":[  
            {  
               "count_code":"art_cenik_test",
               "mk_id":"1600000206",
               "name":"art_cenik_test_2",
               "amount_detail":[  
                  {  
                     "amount":"10"
                  }
               ]
            }
         ]
      },
      {  
         "mk_id":"1600000311",
         "mark":"glavno",
         "name":"Glavno",
         "same_address_as_company":"true",
         "main_warehouse":"false",
         "street":"Ljubljanska 1",
         "post":"3000",
         "place":"Celje",
         "default_microloc_id":"1600128800",
         "include_in_stock_info":"true",
         "active":"true",
         "warehouse_type":"normal",
         "show_product_free_stock":"true",
         "product_list":[  
            {  
               "count_code":"16906",
               "mk_id":"1600412484",
               "name":"Igor test",
               "amount_detail":[  
                  {  
                     "microloc":"A1",
                     "amount":"350"
                  }
               ]
            },
            {  
               "count_code":"PA_115_PA",
               "mk_id":"1600000392",
               "name":"art1",
               "amount_detail":[  
                  {  
                     "microloc":"B1",
                     "amount":"-10"
                  }
               ]
            },
            {  
               "count_code":"PA_108_PA",
               "mk_id":"1600000168",
               "name":"sestav_del_2",
               "amount_detail":[  
                  {  
                     "microloc":"A1",
                     "amount":"-1"
                  }
               ]
            },
            {  
               "count_code":"PA_107_PA",
               "mk_id":"1600000167",
               "name":"sestav_del_1",
               "amount_detail":[  
                  {  
                     "microloc":"A1",
                     "amount":"-2"
                  }
               ]
            }
         ]
      }
   ]
}

Request with wh_id_list :
{
    "secret_key":"my_secret_key",
    "company_id":"16",
	  "return_warehause_stock":"true",
	  "wh_id_list":"1600000067,1600000042,1600430213"
}

Respond :
{
  "opr_code": "0",
  "opr_time_ms": "114",
  "return_warehause_stock": "true",
  "wh_id_list": "1600000067,1600000042,1600430213",
  "offset": "0",
  "limit": "1000",
  "warehouse_list_count": "3",
  "warehouse_list": [
    {
      "mk_id": "1600000067",
      "mark": "oznaka2",
      "name": "oznaka2",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "ulica2",
      "post": "1000",
      "place": "Komenda",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "true",
      "product_list": [
        {
          "count_code": "6967",
          "mk_id": "96600034074",
          "name": "¨PRALNI STROJ KORTING WK6101",
          "amount_detail": [
            {
              "microloc": "A1",
              "amount": "1"
            }
          ]
        },
        {
          "count_code": "16906",
          "mk_id": "1600412484",
          "name": "Igor test",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "103"
            }
          ]
        },
        {
          "count_code": "16903",
          "mk_id": "1600412398",
          "name": "Inverter Schweißgerät NTF ARC200M",
          "amount_detail": [
            {
              "amount": "0",
              "free_amount": "-1",
              "reserved_amount": "1"
            }
          ]
        },
        {
          "count_code": "16897",
          "mk_id": "1600397820",
          "name": "Liefermethode: DHL",
          "amount_detail": [
            {
              "amount": "0",
              "free_amount": "-1",
              "reserved_amount": "1"
            }
          ]
        },
        {
          "count_code": "16896",
          "mk_id": "1600397819",
          "name": "GU10 60x3014 SMD 6,5W Warmweiß",
          "amount_detail": [
            {
              "amount": "0",
              "free_amount": "-3",
              "reserved_amount": "3"
            }
          ]
        },
        {
          "count_code": "16895",
          "mk_id": "1600397818",
          "name": "GU10 54x3528SMD 3W Warmweiß",
          "amount_detail": [
            {
              "amount": "0",
              "free_amount": "-3",
              "reserved_amount": "3"
            }
          ]
        },
        {
          "count_code": "21827",
          "mk_id": "1600280113",
          "name": "na23 test",
          "amount_detail": [
            {
              "microloc": "A1",
              "amount": "10"
            }
          ]
        },
        {
          "count_code": "20767",
          "mk_id": "1600220960",
          "name": "Add-on Modul Bar",
          "amount_detail": [
            {
              "amount": "1"
            }
          ]
        },
        {
          "count_code": "20767",
          "mk_id": "1600220960",
          "name": "Add-on Modul Bar",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "1"
            }
          ]
        },
        {
          "count_code": "20755",
          "mk_id": "1600220924",
          "name": "3DCONNEXION SPACEMOUSE PRO WIRELESS",
          "amount_detail": [
            {
              "microloc": "A1",
              "amount": "50"
            }
          ]
        },
        {
          "count_code": "20357",
          "mk_id": "1600153076",
          "name": "Povezan MS 1",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "1"
            }
          ]
        },
        {
          "count_code": "PA_117_PA",
          "mk_id": "1600000544",
          "name": "n117",
          "amount_detail": [
            {
              "amount": "0",
              "free_amount": "-2",
              "reserved_amount": "2"
            }
          ]
        },
        {
          "count_code": "PA_115_PA",
          "mk_id": "1600000392",
          "name": "art1",
          "amount_detail": [
            {
              "amount": "0",
              "free_amount": "-10",
              "reserved_amount": "10"
            }
          ]
        },
        {
          "count_code": "PA_108_PA",
          "mk_id": "1600000168",
          "name": "sestav_del_2",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "1"
            }
          ]
        },
        {
          "count_code": "PA_107_PA",
          "mk_id": "1600000167",
          "name": "sestav_del_1",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "2"
            }
          ]
        },
        {
          "count_code": "PA_102_PA",
          "mk_id": "1600000066",
          "name": "sktest1",
          "amount_detail": [
            {
              "microloc": "A1",
              "amount": "30"
            }
          ]
        }
      ]
    },
    {
      "mk_id": "1600000042",
      "mark": "oznaka1",
      "name": "moje skladisce",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "čebuljeva 19",
      "post": "1000",
      "place": "Komenda",
      "country": "Slovenija",
      "default_microloc_id": "1600128800",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "false",
      "product_list": [
        {
          "count_code": "6967",
          "mk_id": "96600034074",
          "name": "¨PRALNI STROJ KORTING WK6101",
          "amount_detail": [
            {
              "microloc": "A1",
              "amount": "9990"
            }
          ]
        },
        {
          "count_code": "16946",
          "mk_id": "1600444357",
          "name": "dn_prenosi_obracunan",
          "amount_detail": [
            {
              "amount": "-21"
            }
          ]
        },
        {
          "count_code": "16906",
          "mk_id": "1600412484",
          "name": "Igor test",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "-3"
            }
          ]
        },
        {
          "count_code": "21827",
          "mk_id": "1600280113",
          "name": "na23 test",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "100"
            }
          ]
        },
        {
          "count_code": "21821",
          "mk_id": "1600264993",
          "name": "povezmed1",
          "amount_detail": [
            {
              "microloc": "A1",
              "amount": "100"
            }
          ]
        },
        {
          "count_code": "21818",
          "mk_id": "1600245729",
          "name": "Češnje",
          "amount_detail": [
            {
              "microloc": "A1",
              "amount": "-12"
            }
          ]
        },
        {
          "count_code": "20783",
          "mk_id": "1600221942",
          "name": "povezani1",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "-1"
            }
          ]
        },
        {
          "count_code": "20767",
          "mk_id": "1600220960",
          "name": "Add-on Modul Bar",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "9999"
            }
          ]
        },
        {
          "count_code": "20767",
          "mk_id": "1600220960",
          "name": "Add-on Modul Bar",
          "amount_detail": [
            {
              "amount": "-8"
            }
          ]
        },
        {
          "count_code": "20755",
          "mk_id": "1600220924",
          "name": "3DCONNEXION SPACEMOUSE PRO WIRELESS",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "500"
            }
          ]
        },
        {
          "count_code": "20753",
          "mk_id": "1600220918",
          "name": "3DCONNEXION SPACEPILOT PRO",
          "amount_detail": [
            {
              "amount": "0",
              "free_amount": "-3",
              "reserved_amount": "3"
            }
          ]
        },
        {
          "count_code": "20726",
          "mk_id": "1600220837",
          "name": "BAUTAB",
          "amount_detail": [
            {
              "amount": "0",
              "free_amount": "-10",
              "reserved_amount": "10"
            }
          ]
        },
        {
          "count_code": "20644",
          "mk_id": "1600220591",
          "name": "3-LETNA VZDRŽEVALNA POGODBA ZWCAD+ ARCH",
          "unit_factor": "2",
          "amount_detail": [
            {
              "microloc": "A1",
              "amount": "100"
            }
          ]
        },
        {
          "count_code": "20643",
          "mk_id": "1600220588",
          "name": "3-LETNA VZDRŽEVALNA POGODBA ZWCAD+ MECH",
          "amount_detail": [
            {
              "amount": "-5"
            }
          ]
        },
        {
          "count_code": "20384",
          "mk_id": "1600180814",
          "name": "1111",
          "amount_detail": [
            {
              "amount": "0",
              "free_amount": "-2",
              "reserved_amount": "2"
            }
          ]
        },
        {
          "count_code": "20383",
          "mk_id": "1600173011",
          "name": "tuji1",
          "amount_detail": [
            {
              "amount": "-2"
            }
          ]
        },
        {
          "count_code": "20357",
          "mk_id": "1600153076",
          "name": "Povezan MS 1",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "100"
            }
          ]
        },
        {
          "count_code": "20126",
          "mk_id": "1600081555",
          "name": "10 Stück Spannhülsen Ø 3,2mm für Brennertyp 17/18/26 WIG Brenner Gerät NEU! ",
          "amount_detail": [
            {
              "amount": "0",
              "free_amount": "-6",
              "reserved_amount": "6"
            }
          ]
        },
        {
          "count_code": "PA_8_PA",
          "mk_id": "1600049952",
          "name": "normativ_1",
          "amount_detail": [
            {
              "amount": "0",
              "free_amount": "-2",
              "reserved_amount": "2"
            }
          ]
        },
        {
          "count_code": "PA_175_PA",
          "mk_id": "1600031319",
          "name": "gogo_test_c",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "100"
            }
          ]
        },
        {
          "count_code": "PA_171_PA",
          "mk_id": "1600030028",
          "name": "konj",
          "unit_factor": "10",
          "amount_detail": [
            {
              "microloc": "A1",
              "amount": "-5"
            }
          ]
        },
        {
          "count_code": "153/2011",
          "mk_id": "1600020599",
          "name": "art10",
          "unit_factor": "1000",
          "amount_detail": [
            {
              "amount": "0",
              "free_amount": "-13",
              "reserved_amount": "13"
            }
          ]
        },
        {
          "count_code": "PA_132_PA",
          "mk_id": "1600001117",
          "name": "test10",
          "amount_detail": [
            {
              "amount": "0",
              "free_amount": "-131",
              "reserved_amount": "131"
            }
          ]
        },
        {
          "count_code": "PA_123_PA",
          "mk_id": "1600000728",
          "name": "artikel 3",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "100"
            }
          ]
        },
        {
          "count_code": "PA_121_PA",
          "mk_id": "1600000726",
          "name": "artikel 1",
          "amount_detail": [
            {
              "microloc": "A1",
              "amount": "100"
            }
          ]
        },
        {
          "count_code": "PA_121_PA",
          "mk_id": "1600000726",
          "name": "artikel 1",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "100"
            }
          ]
        },
        {
          "count_code": "PA_117_PA",
          "mk_id": "1600000544",
          "name": "n117",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "100"
            }
          ]
        },
        {
          "count_code": "PA_115_PA",
          "mk_id": "1600000392",
          "name": "art1",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "100",
              "free_amount": "90",
              "reserved_amount": "10"
            }
          ]
        },
        {
          "count_code": "art_cenik_test",
          "mk_id": "1600000206",
          "name": "art_cenik_test_2",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "100"
            }
          ]
        },
        {
          "count_code": "16938",
          "mk_id": "1600000160",
          "name": "Uvoz 1",
          "amount_detail": [
            {
              "microloc": "B1",
              "amount": "100"
            }
          ]
        },
        {
          "count_code": "PA_102_PA",
          "mk_id": "1600000066",
          "name": "sktest1",
          "amount_detail": [
            {
              "microloc": "A1",
              "amount": "-5"
            }
          ]
        }
      ]
    },
    {
      "mk_id": "1600430213",
      "mark": "avtera",
      "name": "Avtera",
      "same_address_as_company": "false",
      "main_warehouse": "false",
      "street": "Cesta ljubljanske brigade 33b",
      "post": "1000",
      "place": "Ljubljana",
      "country": "Slovenija",
      "default_microloc_id": "1600128799",
      "include_in_stock_info": "true",
      "active": "true",
      "warehouse_type": "normal",
      "show_product_free_stock": "false",
      "product_list": [
        {
          "count_code": "PA_101_PA",
          "mk_id": "1600000028",
          "name": "pod naziv 2a",
          "amount_detail": [
            {
              "microloc": "A1",
              "amount": "6"
            }
          ]
        }
      ]
    }
  ]
}
