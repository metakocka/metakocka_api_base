## send_message

**Endpoint**: `POST https://main.metakocka.si/rest/eshop/send_message`
`send_message` supports sending 4 message types in a single call, mixed freely within `message_list`: **sms**, **viber**, **whatsapp**, **email**.

Every message in `message_list` must have a `type` field with one of these values. Fields required/optional depend on the `type`, see per-type sections below.

**Result** : The response `message_list` returns one entry per input message, matched by `sender_message_id`. The `mk_id` field in each result is **not** a single global id space — it refers to a different table depending on `type`:
* `type = sms | viber | whatsapp` → `mk_id` is the id of the row created in **message_queue**.
* `type = email` → `mk_id` is the id of the row created in **email_queue**.
  
Call can also return general error:
```javascript
{
    "opr_code": "2",
    "opr_desc": "Polje message_list je obvezno.",
    "opr_time_ms": "8"
}
```
---

### 1. SMS

**Description** : Send SMS using selected provider :
* `type` : must be `"sms"`
* `to_number` (**required**) : recipient phone number, validated for correct format
* `message` (**required**) : message content
* `sender_message_id` (optional) : your own id, echoed back in the response to correlate results
* `eshop_sync_id` (optional) : id of the SMS connection to send through. Found at : MetaKocka -> Additional Settings -> Notifications -> Connections -> ID in grid. If omitted, the most recently created SMS connection is used.

***Notes***
* for two way communication, you must (a) notify MetaKocka support to get the suitable provider and (b) do not specify the `sender_message_id` parameter.
* for Abandoned cart connection, please provide AC id (return value of AC [put_document](/docs/documents_put_document_abandoned_cart.md) call) as parameter `abandoned_cart_id` (String)

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

---

### 2. Viber

**Description** : Send a Viber message using a connected Viber provider :
* `type` : must be `"viber"`
* `to_number` (**required**) : recipient phone number
* `message` (**required**) : message content
* `sender_message_id` (optional) : your own id, echoed back in the response to correlate results
* `eshop_sync_id` (optional) : id of the Viber connection to send through. Found at : MetaKocka -> Additional Settings -> Notifications -> Connections -> ID in grid. If provided, it must point to a Viber-type connection, otherwise the call fails with "Not valid value for eshop_sync_id". If omitted, the most recently created Viber connection is used.

***Notes***
* for Abandoned cart connection, please provide AC id (return value of AC [put_document](/docs/documents_put_document_abandoned_cart.md) call) as parameter `abandoned_cart_id` (String)

**Example** :
Request (POST - https://main.metakocka.si/rest/eshop/send_message) :
```javascript
{
	"secret_key" : "8899",
	"company_id" : "16",
	"message_list" : [
		{
			"type" : "viber",
			"eshop_sync_id" : "1600374782",
			"to_number" : "41 111 222",
			"message" : "message content",
			"sender_message_id" : "viber1"
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
            "mk_id": "22",
            "sender_message_id": "viber1",
            "status": "ok"
        }
    ]
}
```

---

### 3. WhatsApp

**Description** : Send a WhatsApp message using a connected WhatsApp provider :
* `type` : must be `"whatsapp"`
* `to_number` (**required**) : recipient phone number
* `message` (**required**) : message content
* `sender_message_id` (optional) : your own id, echoed back in the response to correlate results
* `eshop_sync_id` (optional) : id of the WhatsApp connection to send through. Found at : MetaKocka -> Additional Settings -> Notifications -> Connections -> ID in grid. If provided, it must point to a WhatsApp-type connection, otherwise the call fails with "Not valid value for eshop_sync_id". If omitted, the most recently created WhatsApp connection is used.

***Notes***
* for Abandoned cart connection, please provide AC id (return value of AC [put_document](/docs/documents_put_document_abandoned_cart.md) call) as parameter `abandoned_cart_id` (String)

**Example** :
Request (POST - https://main.metakocka.si/rest/eshop/send_message) :
```javascript
{
	"secret_key" : "8899",
	"company_id" : "16",
	"message_list" : [
		{
			"type" : "whatsapp",
			"eshop_sync_id" : "1600374782",
			"to_number" : "41 111 222",
			"message" : "message content",
			"sender_message_id" : "wa1"
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
            "mk_id": "31",
            "sender_message_id": "wa1",
            "status": "ok"
        }
    ]
}
```

---

### 4. Email

**Description** : Send an email :
* `type` : must be `"email"`
* `email_subject` (**required**)
* `email_to_list` (**required**) : comma-separated list of recipient addresses, each validated for format
* `email_from` (**required**) : sender address, must belong to a domain/email already verified as a sending identity in MetaKocka's email settings for this company (SPF/DKIM verified via AWS SES). Using an unverified or third-party domain (e.g. an address on a domain you don't control) will pass this call as "ok" but the email will silently fail to send later.
* `email_sender_name` (optional) : display name for the sender
* `email_cc_list` (optional) : comma-separated list, validated for format if present
* `email_bc_list` (optional) : comma-separated list (Bcc), validated for format if present
* `email_html_body` (optional) : HTML body content
* `sender_message_id` (optional) : your own id, echoed back in the response to correlate results
* `attached_file_list` (optional) : array of attachments, each with `file_name`, `content_type`, and `file_data_base64` (base64-encoded file content)

***Notes***
* for Abandoned cart connection, please provide AC id (return value of AC [put_document](/docs/documents_put_document_abandoned_cart.md) call) as parameter `abandoned_cart_id` (String)
* `to_number` / `eshop_sync_id` do not apply to this type and are ignored.

**Example** :
Request (POST - https://main.metakocka.si/rest/eshop/send_message) :
```javascript
{
	"secret_key" : "8899",
	"company_id" : "16",
	"message_list" : [
		{
			"type" : "email",
			"email_from" : "shop@example.com",
			"email_sender_name" : "Example Shop",
			"email_to_list" : "customer@example.com",
			"email_cc_list" : "sales@example.com",
			"email_subject" : "Your order confirmation",
			"email_html_body" : "<p>Thank you for your order.</p>",
			"sender_message_id" : "email1",
			"attached_file_list" : [
				{
					"file_name" : "invoice.pdf",
					"content_type" : "application/pdf",
					"file_data_base64" : "JVBERi0xLjQK..."
				}
			]
		}
	]
}
```
Respond :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "412",
    "message_list": [
        {
            "mk_id": "884",
            "sender_message_id": "email1",
            "status": "ok"
        }
    ]
}
```

---
