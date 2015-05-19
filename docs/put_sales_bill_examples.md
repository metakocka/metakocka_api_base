**URL** : https://main.metakocka.si/rest/eshop/v1/json/put_sales_bill
#JSON Example


```javascript
{
   "secret_key":"my_secret",
   "company_id":"16",
   "foreign" : "true",   
   "count_code":"eshop001",
   "bill_date":"12.03.2011",
   "payment_date":"12.03.2011",
   "location_of_service":"Komenda",
   "warehouse":"glavno skladisce",
   "buyer_order":"narocilo 123",
   "title" : "Nakup igrače",
   "partner":{
      "business_entity":"true",
      "taxpayer":"true",
      "foreign_county":"false",
      "tax_id_number":"SI10040073",
      "customer":"eshop 1",
      "street":"Slovenska cesta 100",
      "post_number":"1000",
      "place":"Ljubljana",
      "country":"Slovenia",
      "partner_contact": {
         "name": "Rok Doltar",
         "phone": "05 320 24 88",
         "fax": "05 320 24 84",
         "gsm": "071 333 444",
         "email": "test@test.co.uk"
       },
      "partner_delivery_address": {
         "street": "Ljubljanska 25",
         "post_number": "1001",
         "city": "Ljubljana",
         "country": "Slovenija"
      }
   },
   "mark_paid":[
      {
            "payment_type":"Transakcijski račun",
            "date":"12.03.2011"
      }
   ],
   "product_list":[
      {
         "count_code":"2",
         "amount":"10",
         "price":"11",
         "discount":"12",
         "tax":"085"         
      },
      {
         "code":"eshop_artikel_1",
         "amount":"20",
         "price_with_tax":"21",
         "discount":"22",
         "tax":"200"         
      },
      {
         "count_code":"eshop_artikel_2",
         "code":"eshop_artikel_2",
         "name":"eshop_artikel_2",
         "name_desc":"eshop_artikel_2 opis",
         "unit":"kom",
         "service":"false",
         "sales":"true",
         "purchasing":"false",
         "amount":"30",
         "price":"31",
         "discount":"32",
         "tax":"000"
      }      
   ]   
}
```

#Document discount as percent
* use paramether "discount\_percent". Value must be number,
* all products must also have "discount" attribute with the some value

```javascript
{
   "secret_key":"8899",
   "company_id":"16",
   "count_code":"eshop002",
   "bill_date":"3.3.2015",
   "payment_date":"3.3.2015",
   "location_of_service":"Komenda",
   "warehouse":"glavno skladisce",
   "buyer_order":"narocilo 123",
   "partner":{
      "business_entity":"true",
      "taxpayer":"true",
      "foreign_county":"false",
      "tax_id_number":"SI10040073",
      "customer":"eshop 1",
      "street":"Slovenska cesta 100",
      "post_number":"1000",
      "place":"Ljubljana",
      "country":"Slovenia"
   },  
   "discount_percent" : "11",
   "product_list":[
      {
         "count_code":"2",
         "amount":"10",
         "price":"11",
         "discount":"11",
         "tax":"085"        
      }     
   ]   
}   
```

#Document discount as value
* use paramether "discount\_value". Value must be number.

```javascript
{
   "secret_key":"8899",
   "company_id":"16",
   "count_code":"eshop003",
   "bill_date":"3.3.2015",
   "payment_date":"3.3.2015",
   "location_of_service":"Komenda",
   "warehouse":"glavno skladisce",
   "buyer_order":"narocilo 123",
   "partner":{
      "business_entity":"true",
      "taxpayer":"true",
      "foreign_county":"false",
      "tax_id_number":"SI10040073",
      "customer":"eshop 1",
      "street":"Slovenska cesta 100",
      "post_number":"1000",
      "place":"Ljubljana",
      "country":"Slovenia"
   },  
  "discount_value" : "20",
   "product_list":[
      {
         "count_code":"2",
         "amount":"10",
         "price":"11",
         "tax":"085"        
      }     
   ]  
}
```
