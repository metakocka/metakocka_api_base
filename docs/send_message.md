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

### Sender Name

For SMS, Viber, and WhatsApp, `sender_message_id` is not really an id — it's a string literal: whatever value you pass is what appears as the sender name on the message shown to the recipient.

* It's recommended to also set up a sender name in MetaKocka -> Additional Settings -> Notifications -> Connections -> Add Sender Id.
* For **Slovenia** and **Poland**, registering the sender name with the provider is **required** — contact MetaKocka support to register it.

---

### 1. SMS

**Description** : Send SMS using selected provider :
* `type` : must be `"sms"`
* `to_number` (**required**) : recipient phone number, validated for correct format
* `message` (**required**) : message content
* `sender_message_id` (optional) : string literal — the sender name shown to the recipient. See [Sender Name](#sender-name) above.
* `eshop_sync_id` (optional) : id of the SMS connection to send through. Found at : MetaKocka -> Additional Settings -> Notifications -> Connections -> ID in grid. If omitted, the most recently created SMS connection is used.

***Notes***
* for two-way communication (replies routed back to you), your company must have a registered phone number set up with MetaKocka support for a 2-way-capable provider. When sending through such a number, omit `sender_message_id` — the sender must display as the registered phone number itself so replies can be routed back. This only applies to SMS.
* see [Sender Name](#sender-name) above; required for Slovenia and Poland.
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
* `sender_message_id` (optional) : string literal — the sender name shown to the recipient. See [Sender Name](#sender-name) above.
* `eshop_sync_id` (optional) : id of the Viber connection to send through. Found at : MetaKocka -> Additional Settings -> Notifications -> Connections -> ID in grid. If provided, it must point to a Viber-type connection, otherwise the call fails with "Not valid value for eshop_sync_id". If omitted, the most recently created Viber connection is used.

***Notes***
* see [Sender Name](#sender-name) above; required for Slovenia and Poland.
* depending on your Viber connection (`eshop_sync`) setup, message templates may be required — contact MetaKocka support to set these up. Custom (free-form) messages are only available for the "eshop_sync viber promo" connection type.
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
* `sender_message_id` (optional) : string literal — the sender name shown to the recipient. See [Sender Name](#sender-name) above.
* `eshop_sync_id` (optional) : id of the WhatsApp connection to send through. Found at : MetaKocka -> Additional Settings -> Notifications -> Connections -> ID in grid. If provided, it must point to a WhatsApp-type connection, otherwise the call fails with "Not valid value for eshop_sync_id". If omitted, the most recently created WhatsApp connection is used.

***Notes***
* see [Sender Name](#sender-name) above; required for Slovenia and Poland.
* WhatsApp only supports sending via pre-approved message templates — custom/free-form messages are not supported. Contact MetaKocka support to have templates created before using this type.
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

### 4.1 Email events

**Description** : Look up delivery/tracking events (sent, opened, clicked, bounced, ...) for previously sent emails, using the `mk_id` values returned by `send_message` for `type = email` (see **Result** at the top of this page — `mk_id` is the row id in **email_queue**).

**Endpoint**: `POST https://main.metakocka.si/rest/eshop/get_email_events`

* `secret_key` (**required**) : Generated API key, tied to the company session.
* `company_id` (**required**) : Internal(MK) company id.
* `mk_id_list` (**required**) : array of `mk_id` values to look up events for.

***Notes***
* Rate limit : max **1000** ids per request. Exceeding it returns error `"mk_id_list size cannot be more than 1000"`.
* If an `mk_id` is invalid or has no events, it's still returned in the result with an empty `events` array — no error.
* Duplicate ids in `mk_id_list` are deduped in the response (one entry per unique `mk_id`, in input order).

**Response** : array with one entry per requested `mk_id`, each containing an `events` array with `event_time`, `event_type`, `event_sub_type`. Events are populated from AWS SES delivery notifications as they arrive, so `events` may be empty right after sending and fill in over time.

| `event_type`     | Occurs when...                                                                    | Possible `event_sub_type`                    |
|------------------|-------------------------------------------------------------------------------------|-----------------------------------------------|
| `send`           | the email was accepted by the sending mail server.                                  | `null`                                          |
| `delivered`      | the email was successfully delivered to the recipient's mail server.                | `null`                                          |
| `open`           | the recipient opened the email.                                                     | `null`                                          |
| `click`          | the recipient clicked a link in the email.                                          | `null`                                          |
| `hard_bounce`    | the email permanently failed to deliver (e.g. mailbox doesn't exist).               | see below                                       |
| `soft_bounce`    | the email temporarily/undeterminedly failed to deliver (may still succeed on retry).| see below                                       |
| `delivery_delay` | delivery was delayed and is being retried.                                          | see below                                       |
| `complaint`      | the recipient (or their mail provider) reported the message as spam/abuse.          | see below                                       |

`event_sub_type` gives the specific reason for a `hard_bounce` / `soft_bounce` / `delivery_delay` / `complaint` event (`null` for `send` / `delivered` / `open` / `click`) :

| `event_sub_type`                | Applies to                        |
|----------------------------------|------------------------------------|
| `General`                        | bounce, delivery_delay             |
| `MailboxFull`                    | bounce, delivery_delay             |
| `AttachmentRejected`             | bounce                             |
| `ContentRejected`                | bounce                             |
| `CustomTimeoutExceeded`          | bounce                             |
| `EmailValidationSuppressed`      | bounce                             |
| `MessageTooLarge`                | bounce                             |
| `NoEmail`                        | bounce                             |
| `OnAccountSuppressionList`       | bounce                             |
| `OnTenantSuppressionList`        | bounce                             |
| `Suppressed`                     | bounce                             |
| `UnsubscribedRecipient`          | bounce                             |
| `InternalFailure`                | delivery_delay                     |
| `SpamDetected`                   | delivery_delay                     |
| `RecipientServerError`           | delivery_delay                     |
| `IPFailure`                      | delivery_delay                     |
| `TransientCommunicationFailure`  | delivery_delay                     |
| `BYOIPHostNameLookupUnavailable` | delivery_delay                     |
| `Undetermined`                   | delivery_delay                     |
| `SendingDeferral`                | delivery_delay                     |
| `Abuse`                          | complaint                          |
| `Auth_Failure`                   | complaint                          |
| `Fraud`                          | complaint                          |
| `Not_Spam`                       | complaint                          |
| `Other`                          | complaint                          |
| `Virus`                          | complaint                          |

**Example** :
Request (POST - https://main.metakocka.si/rest/eshop/get_email_events) :
```javascript
{
	"secret_key" : "8899",
	"company_id" : "16",
	"mk_id_list" : [
		11,
		22,
		33
	]
}
```
Respond :
```javascript
[
    {
        "mk_id": 11,
        "events": [
            {
                "event_time": "2026-08-20T09:46:14+02:00",
                "event_type": "send",
                "event_sub_type": null
            },
            {
                "event_time": "2026-08-20T09:47:02+02:00",
                "event_type": "open",
                "event_sub_type": null
            }
        ]
    },
    {
        "mk_id": 22,
        "events": [
            {
                "event_time": "2026-08-20T09:50:11+02:00",
                "event_type": "hard_bounce",
                "event_sub_type": "MailboxFull"
            }
        ]
    },
    {
        "mk_id": 33,
        "events": []
    }
]
```

Call can also return general error:
```javascript
{
    "opr_code": "2",
    "opr_desc": "mk_id_list is required",
    "opr_time_ms": "5"
}
```

---
