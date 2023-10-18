# DataTypeBool

This is a bool data type in ADIOS. It is saved as a **bool** (in comparison to Bool) in the SQL database.

**Properties**
- indexed by default
- default value: 0
- NOT NULL

The **View/Input** renders this data type as a checkbox.

## Parameters
| Name  | Type   | Description         |
|-------|--------|---------------------|
| sql_definitions | string | Additional SQL parameters to be supplied when creating the column, optional |


## Example
A column with the datatype bool may be defined like this:

```php
"columnName" => [
	"type" => "bool",
	"title" => "A Bool Column",
	"show_column" => false,
]
```
