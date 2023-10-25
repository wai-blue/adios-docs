# Data types

DataType is an ADIOS class, that defines the basic functionality of all ADIOS datatypes.

> You may find the list all available Data types under the `Data Types` folder/section

## Functions
This is a list of the base functions that the data types themselves adapt and should all support.

### sqlCreateString (string)
This function returns an SQL-formatted string used in CREATE TABLE queries

**Parameters:**
- string `$table_name`: DEPRECATED! name of the table
- string `$col_name`: name of the column to be created
- array<string, mixed> `$params`: any paramters of the column (e.g. default value)


### sqlValueString (void)
This function returns the SQL-formatted string used in INSERT or UPDATE queries

**Parameters:**
- string `$table_name`: DEPRECATED! name of the table
- string `$col_name`: name of the column to be created
- mixed `$value`: value to be inserted or updated
- array<string, mixed> `$params`: any paramters of the column (e.g. default value)


### toHtml (string)
This function returns the HTML-formatted string of the given value

**Parameters:**
- mixed `$value`: determines the value to be formatted
- mixed `$params`: configuration of the HTML output


### getInputHtml (string)
This function returns the HTML-formatted string of the input for this data type

**Parameters:**
- mixed `$params`: input parameters


### toCSV (string)
This function returns the CSV-formatted string of the given value

**Parameters:**
- mixed `$value`: determines the value to be formatted
- mixed `$params`: configuration of the HTML output

### translate (string)
This function is used to translate strings inside Data types. It directly links to the adios function with name and signature almost alike.

**Parameters:**
- string `$string`: string to be translated
- array `$vars`: contains variables for the translation string

> :bulb: Translation strings may contain variables, their syntax is {{ variableName }}. The `$vars` array is a dictionary style formed array. The keys of the array are the names of the variables and the items are the values themselves.


### fromString (string)
This function takes one parameter and returns it as a string.

**Parameters:**
- string or null `$value`: a value to be converted to string

### columnDefinitionPostProcess (array)
This function performs custom post-processing of a column definition. Can be useful for example when the column definition is generated by the prototype builder

**Parameters:**
- mixed `$colDef`: original column definition

### validate (bool)
This function returns true

**Parameters:**
- `$value`

### getDefaultValue (bool)
This function returns the default value of the column

**Parameters:**
- array `$params`: parameters of the data type