**URL** : https://main.metakocka.si/rest/eshop/v1/put_document_workorder

## Workorder

### Example : minimum head
```javascript
{
   "secret_key":"8899",
   "company_id":"16",
   "doc_date":"20.11.2015",   
   "start_date":"20.11.2015",      
   "partner":{
      "business_entity":"true",
      "taxpayer":"true",
      "tax_id_number":"SI10040073",
      "customer":"eshop 1",
      "street":"Slovenska cesta 100",
      "post_number":"1000",
      "place":"Ljubljana",
      "country":"Slovenia"
   }
}
```

### Example : full head
```javascript
{
   "secret_key":"8899",
   "company_id":"16",
   "doc_date":"20.11.2015",   
   "start_date":"21.11.2015",
   "discount_precent" : "11",
   "title" : "title1",
   "buyer_order" : "buyerorder1",
   "notes_header" : "notesheader1",
   "notes" : "notes1",
   "produce_deadline_date" : "22.11.2015",
   "finish_date" : "23.11.2015",
   "partner":{
      "business_entity":"true",
      "taxpayer":"true",
      "tax_id_number":"SI10040073",
      "customer":"eshop 1",
      "street":"Slovenska cesta 100",
      "post_number":"1000",
      "place":"Ljubljana",
      "country":"Slovenia"
   },
   "sales_pricelist_code" : "pricelist1",
   "purchase_pricelist_list": [
      {
         "count_code": "pricelist2"
      },
      {
         "count_code": "pricelist3"
      }
   ],   
   "status_code" : "status1",
   "offer_list": [
      {
         "count_code": "offer10"
      }
   ],      
   "sales_order_list": [
      {
         "count_code": "salesorder20"
      },
      {
         "count_code": "salesorder21"
      }      
   ]         
}
```

### Example : create product, material plan and material realization
```javascript
{  
   "secret_key":"8899",
   "company_id":"16",
   "doc_date":"20.11.2015",
   "start_date":"20.11.2015",
   "partner":{  
      "business_entity":"true",
      "taxpayer":"true",
      "tax_id_number":"SI10040073",
      "customer":"eshop 1",
      "street":"Slovenska cesta 100",
      "post_number":"1000",
      "place":"Ljubljana",
      "country":"Slovenia"
   },
   "create_product_plan_list":[  
      {  
         "product_code":"cp1",
         "amount_plan":"1",
         "price_sales":"1",
         "discount_sales":"1",
         "notes":"create_product_1",
         "material_plan_list":[  
            {  
               "product_code":"mp11",
               "amount_plan":"11",
               "price_purchase_plan":"11",
               "notes":"material_plan_1_1",
               "warehouse_code":"WHNaslov",
               "when":"2015-11-22+02:00",
               "material_realization_list":[  
                  {  
                     "product_code":"mp11",
                     "amount_realization":"6",
                     "price_purchase":"1,1",
                     "notes":"material_plan_1_1 usage",
                     "warehouse_code":"WHNaslov",
                     "when":"2015-11-22+02:00"
                  }
               ]
            }
         ]
      }
   ]
}
```

### Example : complex example with create product, material plan and material realization
```javascript
{  
   "secret_key":"8899",
   "company_id":"16",
   "doc_date":"20.11.2015",
   "start_date":"20.11.2015",
   "partner":{  
      "business_entity":"true",
      "taxpayer":"true",
      "tax_id_number":"SI10040073",
      "customer":"eshop 1",
      "street":"Slovenska cesta 100",
      "post_number":"1000",
      "place":"Ljubljana",
      "country":"Slovenia"
   },
   "create_product_plan_list":[  
      {  
         "product_code":"cp1",
         "amount_plan":"1",
         "price_sales":"1",
         "discount_sales":"1",
         "notes":"create_product_1",
         "material_plan_list":[  
            {  
               "product_code":"mp11",
               "amount_plan":"11",
               "price_purchase_plan":"11",
               "notes":"material_plan_1_1",
               "warehouse_code":"WHNaslov",
               "when":"2015-11-22+02:00",
               "material_realization_list":[  
                  {  
                     "product_code":"mp11",
                     "amount_realization":"6",
                     "price_purchase":"1,1",
                     "notes":"material_plan_1_1 usage",
                     "warehouse_code":"WHNaslov",
                     "when":"2015-11-22+02:00"
                  }
               ]
            },
            {  
               "product_code":"mp12",
               "amount_plan":"12",
               "price_purchase_plan":"12",
               "notes":"material_plan_1_2",
               "warehouse_code":"WHNaslov",
               "when":"2015-11-22+02:00"
            }
         ],
         "work_plan_list":[  
            {  
               "product_code":"wpl11",
               "amount_plan":"11",
               "price_purchase_plan":"11",
               "notes":"work_plan_1_1",
               "when":"2015-11-22+02:00",
               "performer_name_list":[  
                  {  
                     "count_code":"Janez Novak"
                  }
               ],
               "work_realization_list":[  
                  {  
                     "product_code":"wpl11",
                     "amount_realization":"7",
                     "price_purchase":"10",
                     "notes":"work_plan_1_1 usage",
                     "when":"2015-11-22+02:00",
                     "performer_name_list":[  
                        {  
                           "count_code":"Janez Novak"
                        }
                     ]
                  }
               ]
            },
            {  
               "product_code":"wpl12",
               "amount_plan":"12",
               "price_purchase_plan":"12",
               "notes":"work_plan_1_2",
               "when":"2015-11-22+02:00",
               "performer_name_list":[  
                  {  
                     "count_code":"Janez Novak"
                  }
               ]
            }
         ]
      },
      {  
         "product_code":"cp2",
         "amount_plan":"2",
         "price_sales":"2",
         "discount_sales":"2",
         "notes":"create_product_2",
         "material_plan_list":[  
            {  
               "product_code":"mp21",
               "amount_plan":"21",
               "price_purchase_plan":"21",
               "notes":"material_plan_2_1",
               "warehouse_code":"WHNaslov",
               "when":"2015-11-22+02:00"
            }
         ],
         "work_plan_list":[  
            {  
               "product_code":"wpl21",
               "amount_plan":"21",
               "price_purchase_plan":"21",
               "notes":"work_plan_2_1",
               "when":"2015-11-22+02:00",
               "performer_name_list":[  
                  {  
                     "count_code":"Janez Novak"
                  }
               ]
            }
         ]
      }
   ]
}
```

### Example : "izdelava-vsi" work plan
```javascript
{
  "company_id" : "16",
  "partner" : {
    "tax_id_number" : "SI10020030",
    "business_entity" : "true",
    "street" : "Janševa ulica 16a",
    "country" : "Slovenia",
    "post_number" : "1000",
    "taxpayer" : "false",
    "customer" : "Company d.o.o.",
    "place" : "Ljubljana"
  },
  "secret_key" : "8899",
  "start_date" : "28.11.2016",
  "work_list" : [
    {
      "product_code" : "S-SKLAD",
      "amount_plan" : 93,
      "performer_name_list" : [
        {
          "email" : "user@user.com"
        }
      ],
      "when" : "28.11.2016, 09:32",
      "type" : "work_plan"
    }
  ],
  "doc_date" : "28.11.2016"
}
```

### Example : "izdelava-vsi" work realization
```javascript
{
  "company_id" : "16",
  "partner" : {
    "tax_id_number" : "SI10020030",
    "business_entity" : "true",
    "street" : "Janševa ulica 16a",
    "country" : "Slovenia",
    "post_number" : "1000",
    "taxpayer" : "false",
    "customer" : "Company d.o.o.",
    "place" : "Ljubljana"
  },
  "secret_key" : "8899",
  "start_date" : "28.11.2016",
  "work_list" : [
    {
      "product_code" : "S-SKLAD",
      "amount_realization" : 93,
      "performer_name_list" : [
        {
          "email" : "user@user.com"
        }
      ],
      "when" : "28.11.2016, 09:32",
      "type" : "work"
    }
  ],
  "doc_date" : "28.11.2016"
}
```
