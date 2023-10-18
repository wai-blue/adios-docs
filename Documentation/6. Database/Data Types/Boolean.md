# Boolean

This is a boolean data type in ADIOS. It is saved as a **boolean** (in comparison to Bool) in the SQL database.

**Properties**
- indexed by default
- default value: 0
- NOT NULL

The **View/Input** renders this data type as a checkbox.

## Parameters

| Parameter Name  | Used in          | Default value | Description                                                    |
| --------------- | ---------------- | ------------- | -------------------------------------------------------------- |
| sql_definitions | create SQL table |               | Additional SQL definitions to be used when creating the column |

## Example

```php
"columnName" => [  
      "type" => "boolean",  
      "title" => "A Boolean Column",  
      "show_column" => false,  
]
```
