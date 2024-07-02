Create delivery service stickers for given list of sales orders. Input parameter is list of sales order mk_id and/or customer_order. You can get these parameters as result of creating new sales order (REST [put_document](https://github.com/metakocka/metakocka_api_base/blob/master/docs/documents_put_document_sales_order.md#example-full-request-)) or as search result (REST [search](https://github.com/metakocka/metakocka_api_base/blob/master/docs/search_examples.md#search-sales-order-with-given-status)). Service will then generate stickers and for every success order (opr_code = 0) it will return tracking code and link to public URL for file download. If their is an error (opr_code > 0), error message will be in paramether error_desc. All successful generate sticker will also be join together in one PDF (see parameter generate_sticker_join_document)

**Example** :
Request (POST - https://main.metakocka.si/rest/eshop/v1/generate_sticker) :
```javascript
{
	"secret_key": "8899",
	"company_id": "16",
	"order_id_list" : [1600370797,1600370778]
}
```

Request (POST - https://main.metakocka.si/rest/eshop/v1/generate_sticker) :
 * If customer order does not exist, an error will be returned
 * Both customer_order_list and order_id_list can be used in the same request.
```javascript
{
	"secret_key": "8899",
	"company_id": "16",
	"customer_order_list":["PP-27578","PP-27579","PP-27013"]
}
```

Respond :
```javascript
{
	"opr_code": "0",
	"opr_time_ms": "11721",
	"generate_sticker": [
		{
			"opr_code": "0",
			"opr_time_ms": "0",
			"mk_id": "1600370778",
			"sales_order_count_code": "PP-26617",
			"sales_order_customer_order": "PP-26617",
			"sticker_public_url": "https://metakocka-generated-stickers-dev.s3-eu-west-1.amazonaws.com/16/67f7fe691b25a7779.pdf",
			"tracking_code": "CF001622134SI",
			"carrier_tracking_code":"1234111234"
		},{
			"opr_code": "1",
			"opr_time_ms": "0",
			"error_desc": "Napačna poštna številka | ",
			"mk_id": "1600370797",
			"sales_order_count_code": "PP-26618",
			"sales_order_customer_order": "PP-26618",
			"tracking_code": "CF001622125SI"
		}		
	],
	"generate_sticker_join_document": "https://metakocka-generated-stickers-dev.s3-eu-west-1.amazonaws.com/16/21839e4cd0c05489dba6b65c26d6d493957.pdf",
	"measure_time": "generateOrderLabels = 11598,generate_sticker_join_document = 116"
}
```

Call can also return general error :
```javascript
{
	"opr_code": "6",
	"opr_desc": "Trenutno podprto tiskanje samo za eno vrsto dostavne službe. Seznam računov : <b>posta_slovenije :</b>1-MK-1158, <b>logo :</b>1-MK-1159",
	"opr_time_ms": "108"
}
```
