**URL** : https://main.metakocka.si/rest/eshop/v1/add_partner

# add_partner

**Description** : adds a new partner. 
When adding new partner, you must declare his default data such as street, post number, place, country. By default, their address type is saved as "Račun" which is used for billing process.

Supported attributes for partner:

| Attribute           	 | Type     	 | Notes                            	 | MK SLO                   	 |
|-----------------------|------------|------------------------------------|----------------------------|
| business_entity     	 | bool     	 | 	                                  | Pravna oseba (Da/Ne)    	  |
| taxpayer            	 | bool     	 | 	                                  | Davčni zavezanec (Da/Ne) 	 |
| foreign_county      	 | bool     	 | 	                                  | Tujina (Da/Ne)           	 |
| buyer               	 | bool     	 | Partner must be flag as buyer    	 | Kupec                    	 |
| supplier            	 | bool     	 | Partner must be flag as supplier 	 | Dobavitelj               	 |
| tax_id_number       	 | char,50  	 | Partner's tax number             	 | Davčna številka          	 |
| registration_number 	 | char,50  	 | Partner's registration number    	 | Matična številka         	 |
| customer            	 | char,100 	 | Partner's name                   	 | Naziv partnerja          	 |
| street              	 | char,150 	 | Partner's address                	 | Ulica                    	 |
| post_number         	 | char,20  	 | Partner's post number            	 | Poštna številka          	 |
| place               	 | char,100 	 | Partner's place                  	 | Kraj                     	 |
| province            	 | char,50  	 | Partner's provnice               	 | Pokrajina                	 |
| country             	 | char,50  	 | Partner's country                	 | Država                   	 |


Supported attributes for partner contact:

| Attribute            	| Type     	| Notes                                 	| MK SLO                                          	|
|----------------------	|----------	|---------------------------------------	|-------------------------------------------------	|
| useCustomerAsContact 	| bool     	| Use partner's name as contact name    	| Uporabi naziv partnerja za ime kontakta (Da/Ne) 	|
| contact              	| char,255 	| Partner's contact name                	| Ime kontakta                                    	|
| email                	| char,255 	| Partner's contact email               	| Email naslov kontakta                           	|
| gsm                  	| char,255 	| Partner's contact mobile phone number 	| GSM številka kontakta                           	|
| phone                	| char,255 	| Partner's contact phone number        	| Telefonska številka kontakta                    	|
| fax                  	| char,255 	| Partner's fax number                  	| Fax telefonska številka kontakta                	|


Additionally, you can add another partner's address in field partner_delivery_address and set delivery type for this address. Supported values are:
* Račun
* Dobava
* Poslovna enota

Supported attributes for partner delivery address:

| Attribute    	| Type     	| Notes        	| MK SLO                                      	|
|--------------	|----------	|--------------	|---------------------------------------------	|
| address_type 	| String   	| Address type 	| Tip naslova (Račun, Dobava, Poslovna enota) 	|
| street       	| char,150 	|              	| Ulica                                       	|
| post_number  	| char,20  	|              	| Poštna številka                             	|
| city         	| char,100 	|              	| Kraj                                        	|
| province     	| char,50  	|              	| Pokrajina                                   	|
| country      	| char,50  	|              	| Država                                      	|

**Example** :

Request (POST - https://main.metakocka.si/rest/eshop/v1/add_partner) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "partner": {
        "business_entity": "false",
        "taxpayer": "false",
        "buyer" : "true",
        "foreign_county": "false",
        "customer": "Test Uporabnik",
        "street": "Test, 4",
        "post_number": "54375",
        "place": "Test",
        "country": "Slovenija",
        "partner_contact": {
            "name": "Test Kontakt",
            "gsm": "54367865463",
            "email": "test@test.com"
        },
        "partner_delivery_address" : {
        	"address_type" : "Dobava",
        	"street" : "Tehnološki park 24",
        	"post_number" : "1000",
        	"city" : "Ljubljana",
        	"country" : "Slovenija"
        }
    }
}
```
Respond :
```javascript
{
    "mk_id": "228000046627",
    "mk_contact_id": "228000046630",
    "mk_address_id_list": [
        {
            "mk_id": "228000046628",
            "street": "Test, 4"
        },
        {
            "mk_id": "228000046629",
            "street": "Tehnološki park 24"
        }
    ]
}
```
