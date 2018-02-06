**URL** : https://main.metakocka.si/rest/eshop/v1/update_partner

# update_partner

**Description** : update an existing partner. 

You can declare which partner you want to update by following parameters:
* mk_id
* count_code

**Example** :

Following example will add new contact to existing address (mandatory parameter mk_address_id). If you want to update existing contact, you must declare *mk_id*. It will also update existing address (we search address by parameter mk_id) and add new address for existing partner.

Request (POST - https://main.metakocka.si/rest/eshop/v1/update_partner) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "partner": {
    	"mk_id" : "228000046627",
        "street": "Test 1234",
        "post_number": "2000",
        "partner_contact_list": [
	        {
	        	"mk_address_id" : "228000046629",
	            "name": "Test Kontakt",
	            "gsm": "031111222",
	            "email": "test123@test.com"
	        }
        ],
        "partner_delivery_address_list" : [
        	{
        	"mk_id" : "228000046629",
        	"address_type" : "Poslovna enota",
        	"street" : "Tehnološki park 21",
        	"post_number" : "1000",
        	"city" : "Ljubljana",
        	"country" : "Slovenija"
        	},
        	{
        	"address_type" : "Poslovna enota",
        	"street" : "Stegne 21c",
        	"post_number" : "1000",
        	"city" : "Ljubljana",
        	"country" : "Slovenija"
        	}
        ]
        
    }
}
```
Respond :
```javascript
{
    "partner_list_count": "1",
    "partner_list": [
        {
            "mk_id": "228000046627",
            "business_entity": "false",
            "taxpayer": "false",
            "foreign_county": "false",
            "customer": "Test Uporabnik",
            "count_code": "32156793",
            "partner_contact_list": [
                {
                    "mk_id": "228000046630",
                    "mk_address_id": "228000046628",
                    "contact_address": "Test, 4",
                    "name": "Test Kontakt",
                    "gsm": "54367865463",
                    "email": "test@test.com"
                },
                {
                    "mk_id": "228000046634",
                    "mk_address_id": "228000046629",
                    "contact_address": "Tehnološki park 21",
                    "name": "Test Kontakt",
                    "gsm": "031111222",
                    "email": "test123@test.com"
                }
            ],
            "partner_delivery_address_list": [
                {
                    "mk_id": "228000046628",
                    "address_type": "Račun",
                    "street": "Test, 4",
                    "post_number": "54375",
                    "city": "Test",
                    "country": "Slovenija",
                    "language": "Slovenski"
                },
                {
                    "mk_id": "228000046629",
                    "address_type": "Poslovna enota",
                    "street": "Tehnološki park 21",
                    "post_number": "1000",
                    "city": "Ljubljana",
                    "country": "Slovenija",
                    "language": "Slovenski"
                },
                {
                    "mk_id": "228000046633",
                    "address_type": "Poslovna enota",
                    "street": "Stegne 21c",
                    "post_number": "1000",
                    "city": "Ljubljana",
                    "country": "Slovenija",
                    "language": "Slovenski"
                }
            ]
        }
    ]
}
```
