# Decimal

Decimal is a ADIOS data type for representing decimal numbers. Their visual representation by the **UI/Input** class is exactly the same as of *Integers*. Will be saved in SQL as type *decimal* if not specified otherwise.

**Properties:**
- Default value: 0

## Parameters

| Parameter Name  | Used in          | Default value | Description                                                       |
| --------------- | ---------------- | ------------- | ----------------------------------------------------------------- |
| sql_definitions | create SQL table |               | Additional SQL properties                                         |
| byte_size       | create SQL table | 1             | Max byte size of the column                                       |
| decimals        | form + table     | 1             | How many decimal places should the saved numbers have             |
| sql_data_type   | create SQL table | decimal       | How the column should be stored (double, float, decimal, numeric) |
| format          | table            |               | Determines the format how the decimal number should be displayed  |

## Example

```php
"columnName" => [  
	"type" => "decimal",  
	"title" => "A Decimal Column",  
	"show_column" => TRUE,  
]
```