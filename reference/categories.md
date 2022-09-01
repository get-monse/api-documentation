---
description: Get a full list of available categories at Monse
---

# Categories

{% swagger method="get" path="/transaction-categories" baseUrl="https://monse.app/v1" summary="List all categories" %}
{% swagger-description %}

{% endswagger-description %}

{% swagger-response status="200: OK" description="" %}
```javascript
[
    {
        "id": 1,
        "parent_id": null,
        "type": "expense",
        "level": 0,
        "accountable": 1,
        "slug": "food-expense",
        "icon": "restaurant",
        "name": "Food",
        "description": "Parent category for all expense transactions that are recognized as food related expenses. Respective transactions are categorised in level 1 categories.",
        "created_at": "2022-09-01T14:43:50.000000Z",
        "updated_at": "2022-09-01T14:43:50.000000Z"
  },
  
  // ...
]
```
{% endswagger-response %}
{% endswagger %}
