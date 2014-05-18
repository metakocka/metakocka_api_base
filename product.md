# product_add – dodajanje artiklov
Opis : Dodajanje novih artiklov. Če že obstaja artikel z enako count_code in code (to v praksi pomeni enaki artikel), dobimo napako. Ob uspešnem dodajanju dobimo tudi interno oznako artikla.
URL : https://main.metakocka.si/rest/eshop/v1/json/product_add

**Primer klica**
```javascript
{
    "secret_key":"my_secreat_key",
    "company_id":"16",
    "count_code":"eshop_001",
    "code":"eshop_001_sif",
    "name":"artikel eshop_001",
    "name_desc": "artikel eshop_001 - daljsi opis",    
    "unit":"kos",
    "service":"false",
    "sales":"true",
    "purchasing":"false",
    "height":"12.23",
    "depth":"4.12",
    "weight":"6.3",
}
```
