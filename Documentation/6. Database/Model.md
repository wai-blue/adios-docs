# Model
Core implementation of database model. Extends from Eloquent's model and adds own functionalities.

## Properties

The Model class supports various class variables that can be utilized to meet specific design and functionality requirements:

| Property                               | Type   | Default value | Description                                                                                                                                                           |
| -------------------------------------- | ------ | ------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| fullName                               | string | ''            | Full name of the model. Useful for getModel() function                                                                                                                |
| shortName                              | string | ''            | Short name of the model. Useful for debugging purposes                                                                                                                |
| adios                                  | mixed  | ''            | Reference to ADIOS object                                                                                                                                             |
| gtp                                    | string | ''            | Shorthand for "global table prefix"                                                                                                                                   |
| sqlName                                | string | ''            | Name of the table in SQL database. Used together with global table prefix.                                                                                            |
| urlBase                                | string | ''            | URL base for management of the content of the table. If not empty, ADIOS automatically creates URL addresses for listing the content, adding and editing the content. |
| tableTitle                             | string | ''            | Readable title for the table listing.                                                                                                                                 |
| formTitleForEditing                    | string | ''            | Readable title for the form when editing content.                                                                                                                     |
| formTitleForInserting                  | string | ''            | Readable title for the form when inserting content.                                                                                                                   |
| lookupSqlValue                         | string | ''            | SQL-compatible string used to render displayed value of the record when used as a lookup.                                                                             |
| isJunctionTable                        | bool   | FALSE         | If set to TRUE, the SQL table will not contain the ID autoincrement column                                                                                            |
| storeRecordInfo                        | bool   | FALSE         | If set to TRUE, the SQL table will contain the `record_info` column of type JSON                                                                                      |
| ⚠️ **[deprecated]** languageDictionary | array  | ''            | Language dictionary for the context of the model                                                                                                                      |

## Functions

### getConfig(string $configName)

Retrieves value of configuration parameter.

```php
$model->getConfig("configName");
```

### setConfig(string $configName, $value)

Sets the value of configuration parameter.

```php
$model->setConfig("configName", $value);
```

### translate(string $string, $context, $toLanguage,  array $vars = [])

Shorthand for ADIOS core translate() function. Uses own language dictionary.

```php
$model->translate("string", $arrayOfVariables);
```

### hasSqlTable()

CHECK: Check if the SQL table exists

### isInstalled()

Checks whether model is installed.

```php
$model->isInstalled();
```

### getCurrentInstalledVersion()

Gets the current installed version of the model. Used during installing upgrades.

```php
$model->getCurrentInstalledVersion();
```

### upgrades()

Returns list of available upgrades. This method must be overriden by each model.

```php
$model->upgrades();
```

### install()

Installs the first version of the model into SQL database. Automatically creates indexes.

```php
$model->install();
```

### hasAvailableUpgrades()

Check if there are updates to the model.

```php
$model->hasAvailableUpgrades();
```

### dropTableIfExists()

Drops the database table of the model, if it exists.

```php
$model->dropTableIfExists();
```

### createSqlForeignKeys()

Create foreign keys for the SQL table. Called when all models are installed.

```php
$model->getFullTableSqlName();
```
### createSqlForeignKeys()

Returns full name of the model's SQL table

```php
$model->getFullTableSqlName();
```

### getFullUrlBase($params)

Returns full relative URL path for model. Used when generating URL paths for tables, forms, etc...

```php
$model->getFullTableSqlName($params);
```
