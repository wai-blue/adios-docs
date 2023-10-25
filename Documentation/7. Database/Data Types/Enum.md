# Enum

Enum is an ADIOS data type which is used to save predefined, distinct values. It is saved as an *Enum* in the SQL Database.

> :bulb: This data type isn't rendered by the **UI/Input** at all.

## Parameters

| Parameter Name  | Used in          | Default value | Description                           |
| --------------- | ---------------- | ------------- | ------------------------------------- |
| sql_definitions | create SQL table |               |             |
| enum_values     | everywhere       |               | List of possible values of the column, string with values separated by a comma |

## Example

```php
"columnName" => [
	"type" => "enum",
	"title" => "An Enum Column",
	"enum_values" => 'Red,Green,Blue'
	"show_column" => TRUE,
]
```