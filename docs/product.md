#product_add – dodajanje artiklov
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

**Primer odgovora**
```javascript
{
    "opr_code":"0",
    "opr_time_ms":"33",
    "mk_id":"1600001744",
    "count_code":"eshop_002"
}
```

**Primer kode**
```php
<?php
    require_once("Pest.php");
 
    $url = 'https://main.metakocka.si/rest/eshop/v1/json/product_add';
    $company_id = '16';
    $secret_key = 'my_secret_key';
 
    $requestJSON = array (
        'secret_key'=>$secret_key, 'company_id'=>$company_id, 'count_code'=>'eshop_001',
        'code'=>'eshop_001_sif', 'name'=>'artikel eshop_001', 'name_desc'=>'artikel eshop_001 - daljsi opis',    
        'unit'=>'kos', 'service'=>'false', 'sales'=>'true', 'purchasing'=>'false', 'height'=>'12.23',
        'depth'=>'4.12', 'weight'=>'6.3'
    );
 
    echo '<html><body>';
    echo '<b>URL</b> : '.$url.'<br/>';
    echo '<b>POST data</b> : '.json_encode($requestJSON).'<br/>';
    echo '<hr/>';
    echo '<b>Request start...</b><br/>';
    $pest = new Pest($url);
    $thing = $pest->post('', 'application/json', json_encode($requestJSON));
 
    echo '<b>Respond : </b>'.$thing;
    echo '</body></html>';    
?>
```
**Primer klica z razširjenimi parametri**
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
    "extra_column": [
        {
            "name": "ime_artikla_nas_sistem",
            "value": "T-SHIRT 4"
        },
        {
            "name": "ime_pakiranja",
            "value": "KOS 4"
        }
    ]
}
```


#product_update – sprememba opisa
Opis : izvedba popravkov podatkov na artiklu. V primeru konflikta s pravili za zagotavljanje konsistentnosti podatkov, metoda vrne ustrezno napako.
URL : https://main.metakocka.si/rest/eshop/v1/json/product_update

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

Opombe :
- oblika zahtevka in odgovor je praktično enako kot v primeru partner_add klica,
- edina razlika je v tem, da mora biti podani "count_code" ali "mk_id" atribut za identifikacijo artikla.









