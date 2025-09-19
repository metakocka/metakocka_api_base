## 1. SMS

**Description** : Send SMS using selected provider :
* type : must be "sms"
* to_number
* message
* sender_message_id
* eshop_sync_id :  Found at : MetaKocka -> Additional Settings -> Notifications -> Connections -> ID in grid

***Notes*** 
* for two way communication, you must (a) notify MetaKocka support to get the suitable provider and (b) do not specified sender_message_id paramether.  
* for Abandoned cart connection, please provide AC id (return value of AC [put_document](/docs/documents_put_document_abandoned_cart.md) call) as parameter "abandoned_cart_id" (String)

**Example** :
Request (POST - https://main.metakocka.si/rest/eshop/send_message) :
```javascript
{
	"secret_key" : "8899",
	"company_id" : "16",
	"message_list" : [
		    {
			"type" : "sms",			
			"eshop_sync_id" : "1600374782",
			"to_number" : "41 111 222",
			"message" : "message content",
			"sender_message_id" : "sms1"				
                    },
                    {
			"type" : "sms",			
			"eshop_sync_id" : "1600374782",
			"to_number" : "41 111 222 123",
			"message" : "message content",
			"sender_message_id" : "sms2"				
		    }
	]
}
```
Respond :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "1803",
    "message_list": [
        {
            "mk_id": "19",
            "sender_message_id": "sms1",
            "status": "ok"
        },
        {
            "error_desc": "to_number : Telefonska številka ni veljavna",
            "sender_message_id": "sms2",
            "status": "error"
        }
    ]
}
```

Call can also return general error:
```javascript
{
    "opr_code": "2",
    "opr_desc": "Polje message_list je obvezno.",
    "opr_time_ms": "8"
}
```
