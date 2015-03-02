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