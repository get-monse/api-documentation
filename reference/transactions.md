---
description: Each transaction it's and income or expenses in a user bank account.
---

# Transactions

<figure><img src="../.gitbook/assets/image (1) (2).png" alt=""><figcaption></figcaption></figure>

### Endpoints

{% swagger baseUrl="https://monse.app/v1" method="get" path="/transactions" summary="List and filter your transactions" %}
{% swagger-description %}

{% endswagger-description %}

{% swagger-parameter in="query" name="page" type="integer" %}
Page number.
{% endswagger-parameter %}

{% swagger-parameter in="query" name="per-page" type="integer" %}
Number of items per page.&#x20;

Max value, it's 30.
{% endswagger-parameter %}

{% swagger-parameter in="query" name="include" type="string" %}
You can add one or multiple of category, bankAccount and bankAccount.bank.



Separated by comma.
{% endswagger-parameter %}

{% swagger-parameter in="query" name="filter[text]" type="string" %}
Filter transaction by concept or notes.
{% endswagger-parameter %}

{% swagger-parameter in="query" name="base-fiat" type="string" %}
In which currency do you want the transactions.
{% endswagger-parameter %}

{% swagger-parameter in="header" name="authorization" type="string" %}
Bearer token of the user.



**Example:**&#x20;

Bearer eyJ0eXAiOiJK…abJfpQc07c\_eig-Eok
{% endswagger-parameter %}

{% swagger-response status="200" description="List of transactions" %}
```javascript
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "bank_account_id": 1,
      "category_id": 20,
      "status": "booked",
      "type": "expense",
      "from": [],
      "to": [],
      "concept": "Any random concept for a transaction",
      "notes": null,
      "amount": -73640,
      "currency": "USD",
      "booked_at": "2022-08-14T00:00:00.000000Z",
      "created_at": "2022-08-14T22:13:58.000000Z",
      "updated_at": "2022-08-14T22:13:58.000000Z",
      "deleted_at": null,
      "category": {
        "id": 20,
        "parent_id": 17,
        "type": "expense",
        "level": 1,
        "accountable": 1,
        "slug": "transportation-expenses-expense",
        "icon": "emoji_transportation",
        "name": "Transportation expenses",
        "description": "All transactions that are recognized as payments for public transportation, taxi, toll roads, department of motor vehicles and car inspections",
        "created_at": "2022-08-14T22:13:56.000000Z",
        "updated_at": "2022-08-14T22:13:56.000000Z"
      },
      
      // ...
    }
  ],
  "first_page_url": "http://monse.test/v1/transactions?include=category%2CbankAccount%2CbankAccount.bank&per-page=1&page=1",
  "from": 1,
  "last_page": 32,
  "last_page_url": "http://monse.test/v1/transactions?include=category%2CbankAccount%2CbankAccount.bank&per-page=1&page=32",
  "links": [
    {
      "url": null,
      "label": "&laquo; Previous",
      "active": false
    },
    {
      "url": "http://monse.test/v1/transactions?include=category%2CbankAccount%2CbankAccount.bank&per-page=1&page=1",
      "label": "1",
      "active": true
    },
    {
      "url": "http://monse.test/v1/transactions?include=category%2CbankAccount%2CbankAccount.bank&per-page=1&page=2",
      "label": "2",
      "active": false
    },
    
    // ...
    
    {
      "url": "http://monse.test/v1/transactions?include=category%2CbankAccount%2CbankAccount.bank&per-page=1&page=2",
      "label": "Next &raquo;",
      "active": false
    }
  ],
  "next_page_url": "http://monse.test/v1/transactions?include=category%2CbankAccount%2CbankAccount.bank&per-page=1&page=2",
  "path": "http://monse.test/v1/transactions",
  "per_page": 30,
  "prev_page_url": null,
  "to": 1,
  "total": 32
}
```
{% endswagger-response %}

{% swagger-response status="401" description="Permission denied" %}

{% endswagger-response %}
{% endswagger %}

{% swagger method="put" path="/transactions/{id}" baseUrl="https://monse.app/v1" summary="Update a transaction" %}
{% swagger-description %}

{% endswagger-description %}

{% swagger-parameter in="path" type="Integer" %}
Transaction ID
{% endswagger-parameter %}

{% swagger-parameter in="body" required="false" name="category_id" type="Integer" %}
New transaction category
{% endswagger-parameter %}

{% swagger-parameter in="body" name="notes" type="String" %}
New transaction notes
{% endswagger-parameter %}

{% swagger-response status="204: No Content" description="Transaction updated successfully" %}
```javascript
{
    // Response
}
```
{% endswagger-response %}

{% swagger-response status="401: Unauthorized" description="Permission denied" %}
```javascript
{
    // Response
}
```
{% endswagger-response %}
{% endswagger %}

{% swagger method="delete" path="/transactions/{id}" baseUrl="https://monse.app/v1" summary="Delete a transaction" %}
{% swagger-description %}
The transaction will be marked as deleted and this action can't be undone.
{% endswagger-description %}

{% swagger-parameter in="query" type="Integer" %}
Transaction ID
{% endswagger-parameter %}

{% swagger-response status="204: No Content" description="Transaction deleted" %}
```javascript
{
    // Response
}
```
{% endswagger-response %}

{% swagger-response status="401: Unauthorized" description="Permission denied" %}
```javascript
{
    // Response
}
```
{% endswagger-response %}
{% endswagger %}
