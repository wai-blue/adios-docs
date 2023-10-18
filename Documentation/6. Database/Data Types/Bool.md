⚠️ **[deprecated]** 
# DataTypeBool

DataType Bool is a deprecated boolean datatype. In SQL it is converted to **char(1)**, indexed by default.

It's default value is FALSE `N`, otherwise it can also be `Y` for TRUE.
It is rendered as a checkbox by the **Views/Input** view.

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
	"show_column" => False,
]
```
