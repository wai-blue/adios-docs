# Time

This data type represents time in ADIOS. It is saved as a **time** in the SQL database.  

> 💡 When you render the Time data type in a form, the Time column is rendered as an input text box with three control inputs rendered. You can click and drag these control boxes to add or substract hours, minutes and seconds.

![Preview of the color data type](../../../resources/examples/datatypes/TimePicker.png)

**Properties**
- default value: '00:00:00'

## Parameters

| Parameter Name  | Used in          | Default value | Description |
| --------------- | ---------------- | ------------- | ----------- |
| sql_definitions | create SQL table |               | Additional SQL definitions to be specified |
| format          | form + table     | "H:i:s" | Determines the PHP format of displaying the time |
| null value          | create SQL table     | false | Determines if NULL value is allowed in the column of the SQL table |
| null value          | create SQL table     | false | Determines if NULL value is allowed in the column of the SQL table |
| required          | create SQL table, form + table     | false | Determines if the column is required |
## Example

```php
"columnName" => [  
	"type" => "time",  
	"format" => "H:i:s",  
	"show_column" => TRUE,  
]
```