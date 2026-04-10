# Get messages

**Description** : Get complete thread of messages by type.

**URL** : https://main.metakocka.si/rest/eshop/get_message

**Type** : POST

**Request parameters**

| Parameter                        | Required/Optional | Description                                                                                                                             |
|----------------------------------|-------------------|-----------------------------------------------------------------------------------------------------------------------------------------|
| secret_key                       | Required          | Generated API key.                                                                                                                      |
| company_id                       | Required          | Internal(MK) company id.                                                                                                                |
| doc_id                           | Optional          | Document Metakocka ID. Get complete message thread related only to this document.                                                       |
| doc_type                         | Optional          | Document type. Example: sales_order                                                                                                     |
| type                             | Required          | Message type. Example: sms, viber, whatsapp                                                                                             |
| return_new_inbound_messages_from | Optional          | ISO Date time. Searches for all new inbound messages received from the specified date and returns the complete message thread for each. |

**Data parameters**

| Parameter      | Description                                                                          |
|----------------|--------------------------------------------------------------------------------------|
| type           | Message type.                                                                        |
| to_number      | Receiver's/customer's phone number                                                   |
| from_number    | Your phone number or name used to send outbound messages.                            |
| doc_type       | Document type. Example: sales_order                                                  |
| doc_id         | Document Metakocka ID.                                                               |
| doc_count_code | Document number                                                                      |
| customer_order | Document customer order                                                              |
| message_list   | Complete thread of messages with the customer and collection of all message threads. |
| message        | Message content.                                                                     |
| status         | Status of the message. Example: waiting, sending, ok, error, canceled                |
| direction      | Outbound = sent from MetaKocka. Inbound = received from customer.                    |
| create_time    | Time when message was created.                                                       |
| received_time  | Time when message was delivered.                                                     |
| seen_time      | Time when message was seen.                                                          |

**Example by document id** :
Request (POST - https://main.metakocka.si/rest/eshop/get_message) :
```javascript
{
    "secret_key": "8899",
    "company_id": "16",
    "type":"sms"
    "doc_type": "sales_order",
    "doc_id": "1200013782050"
}
```
**Example by new inbound messages** :
Request (POST - https://main.metakocka.si/rest/eshop/get_message) :
```javascript
{
    "secret_key": "8899",
    "company_id": "16",
    "type":"sms"
    "return_new_inbound_messages_from": "2026-01-22T13:07:37+02:00"
}
```
Respond :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "2380",
    "opr_time_no_lock_ms": "0",
    "message_list": [
        {
            "type": "sms",
            "to_number": "+386 1234567891",
            "from_number": "447000011122",
            "doc_type": "sales_order",
            "doc_id": "400000003591",
            "customer_order": "563",
            "doc_count_code": "PP-27771",
            "message_list": [
                {
                    "message": "Sent message as test",
                    "status": "ok",
                    "direction": "outbound",
                    "create_time": "2022-07-20T09:46:14+02:00",
                    "receive_time": "2022-07-20T09:46:14+02:00"
                },
                {
                    "message": "Customer sent this response",
                    "direction": "inbound",
                    "create_time": "2022-07-20T09:46:37+02:00",
                    "receive_time": "2022-07-20T09:46:37+02:00",
                    "seen_time": "2022-07-20T14:30:30+02:00"
                },
                {
                    "message": "May the force be with you!",
                    "status": "ok",
                    "direction": "outbound",
                    "create_time": "2022-07-20T14:30:35+02:00",
                    "receive_time": "2022-07-20T14:30:35+02:00"
                }
            ]
        },
        {
            "type": "sms",
            "to_number": "+386 1234567892",
            "from_number": "447000011122",
            "message_list": [
                {
                    "message":"Sent message #2",
                    "direction": "outbound",
                    "create_time": "2022-09-20T17:03:43+02:00",
                    "receive_time": "2022-09-20T17:03:43+02:00"
                }
            ]
        }
    ]
}
```

Call can also return general error:
```javascript
{
    "opr_code": "2",
    "opr_desc": "Type parameter must be set.",
    "opr_time_ms": "8"
}
```
