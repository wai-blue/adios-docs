# Model
Core implementation of database model. Extends from Eloquent's model and adds own functionalities. You can see more about Eloquent [here](https://laravel.com/docs/10.x/eloquent).

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
$model->getFullUrlBase($params);
```

### findForeignKeyModels()

Searches for and returns the names of the models from the foreign keys of the model

```php
$model->findForeignKeyModels($params);
```

### getEnumValues()

Returns an array of table items as enumeration values. The value of items is set based on the lookup value set in a model.

```php
$model->findForeignKeyModels($params);
```
### associateKey($input, $key)
TODO

Returns the associete key from an array.

```php
$model->associateKey($input, $key);
```
### sqlQuery($query)

Executes the SQL query and returns the result.

```php
$model->sqlQuery($query);
```

ROUTING
TBA

### columns(array $columns = [])

Defines the model's columns and returns them. Byte size of the type is automaticaly set if not defined. `char` type is ⚠️ **[deprecated]**.

```php
$model->columns([
  "company_name" =>
    array (
      'title' => 'Company Name',
      'type' => 'varchar',
      'byte_size' => 150,
      'required' => true,
      'showColumn' => true,
    )
]);
```

### columnNames()

Returns an array of the model's column names.

```php
$model->columnNames();
```

### indexes(array $indexes = [])

Creates new indexes for the model and return TRUE/FALSE upon copletion

```php
$model->indexes([])
```

### indexNames()

Returns the names of the model's indexes.

```php
$model->indexNames()
```

### normalizeRowData(array $data, string $lookupKeyPrefix = "")

Parses the $data containing strings as a result of DB fetch operation and converts the value of each column to the appropriate PHP type. E.g. columns of type 'int' or 'lookup' will have integer values.

```php
$model->normalizeRowData($data, "tableName")
```

### getRelationships()

⚠️ **[deprecated]**

### getExtendedData($item)

⚠️ **[deprecated]**

### getById(int $id)

Return the row of a table with the corresponding ID.

```php
$model->getById(1);
```

### getAll(string $keyBy = "id", $withLookups = FALSE, $processLookups = FALSE)

Returns all rows of a model's table.

```php
$model->getAll();
```
### getAllCached()

Returns all rows of a model's table and caches the results.

```php
$model->getAllCached();
```

### getQueryWithLookups($callback = NULL)

TODO

```php
$model->getQueryWithLookups();
```
### getWithLookups($callback = NULL, $keyBy = 'id', $processLookups = FALSE)

TODO

```php
$model->getWithLookups();
```
### insertRow($data)

Creates a new row in a model's table. Ruturns TRUE if succesfull.

```php
$model->insertRow($data);
```
### insertRowWithId($data)

Creates a new row in a model's table with a set ID. Ruturns TRUE if succesfull.

```php
$model->insertRowWithId($data);
```
### insertOrUpdateRow($data)

Creates new row or updates a row in a model's table. Ruturns TRUE if succesfull.

```php
$model->insertRowWithId($data);
```
### insertRandomRow($data = [], $dictionary = [])

Generates and inserts a row into a model's table with random values acoording to a column's type.

```php
$model->insertRandomRow($data,$dictionary);
```
### updateRow($data, $id)

Updates a specific row in a model's table.

```php
$model->updateRow($data, 5);
```
### deleteRow($id)

Deletes a specific row in a model's table.

```php
$model->deleteRow(1)
```
### copyRow($id)

Copies and creates a row in a model's table. Returns TRUE if succesfull.

```php
$model->copyRow(1)
```
### search($query)

⚠️ **[deprecated]**

### pdoPrepareAndExecute(string $query, array $variables)

Prepares and executes an SQL query like Insert, Delete, etc.. and return TRUE if success.

```php
$model->pdoPrepareAndExecute($queryString, []);
```
### pdoPrepareExecuteAndFetch(string $query, array $variables, string $keyBy = "")

Prepares and executes an SQL Select statment and returns the rows.

```php
$model->pdoPrepareExecuteAndFetch($queryString, [], "name");
```

### lookupWhere($initiatingModel = NULL,$initiatingColumn = NULL,$formData = [],$params = [])

TODO

```php
$model->lookupWhere($initiatingModel, $initiatingColumn, $formData, $params);
```
### lookupOrder($initiatingModel = NULL,$initiatingColumn = NULL,$formData = [],$params = [])

TODO

```php
$model->lookupOrder($initiatingModel, $initiatingColumn, $formData, $params);
```
### lookupQuery($initiatingModel = NULL,$initiatingColumn = NULL,$formData = [],$params = [],$having = "TRUE")

TODO

```php
$model->lookupQuery($initiatingModel, $initiatingColumn, $formData, $params, "TRUE");
```
### lookupSqlQuery($initiatingModel = NULL,$initiatingColumn = NULL,$formData = [],$params = [],$having = "TRUE")

TODO

```php
$model->lookupSqlQuerys($initiatingModel, $initiatingColumn, $formData, $params, "TRUE");
```
### lookupSqlValue($tableAlias = NULL)

Returns the `lookupSqlValue` parameter. If the `tableAlias` is not empty, returns a modified `lookupSqlValue` string.

```php
$model->lookupSqlValue();
```
### tableParams($params, $table)

Allows you to modify the parameters of the model's table before rendering. For full list of table parameters see [Table view]("../5. Views/Table.html"). You can override this funtion for additional functionality, for example based on the result of an IF statment you can change a parameter of the table.

```php
$model->tableParams($params, $table);

OR

public function tableParams($params, $table) {
  if ((int) $params['id_staff'] > 0) {
      $params["show_controls"] = FALSE;
  }

  return $params;
};

```
### tableRowCSSFormatter($data)

Allows you to change the CSS of a table row by overriding this function in a model.

```php
public function tableCellCSSFormatter($data)
  {
    if ($data['column'] == "type"){
      return "background-color: blue; color: white;";
    }
  }
```
### tableCellCSSFormatter($data)

Allows you to change the CSS of a table cell by overriding this function in a model.

```php
public function tableCellCSSFormatter($data)
  {
    if ($data['row']['date'] < date('Y-m-d H:i:s')) {
      return "background-color: red; color: yellow;";
    }
  }
```
### tableCellHTMLFormatter($data)

Allows you to modify the table cell value by overriding this function in a model.
TODO

```php
public function tableCellHTMLFormatter($data)
{
  switch ($data['column']) {
    case "id_staff":
      if ($data['row']['id_staff'] > 5) {
        return 'Access denied';
      } else {
        return $data['html'];
      }
      break;
    default:
      return $data['html'];
      break;
  }
}
```
### tableCellCSVFormatter($data)

Allows you to modify the table cell value in the CSV export by overriding this function in a model.
TODO

```php
public function tableCellCSVFormatter($data)
{
  switch ($data['column']) {
    case "id_staff":
      if ($data['row']['id_staff'] > 5) {
        return '';
      } else {
        return $data['html'];
      }
      break;
    default:
      return $data['html'];
      break;
  }
}
```

### onTableBeforeInit($tableObject)

⚠️ **[deprecated]**
TODO

```php
$model->onTableBeforeInit($tableObject);
```
### onTableAfterInit($tableObject)

⚠️ **[deprecated]**
TODO

```php
$model->onTableAfterInit($tableObject);
```
### onTableAfterDataLoaded($tableObject)

⚠️ **[deprecated]**
TODO

```php
$model->onTableAfterDataLoaded($tableObject);
```

### columnValidate(string $column, $value)

Checks the valitidy of a value for a column. Returns bool.

```php
$model->columnValidate("id_staff",$value);
```

### onFormBeforeInit($formObject)

⚠️ **[deprecated]**
TODO

```php
$model->onFormBeforeInit($formObject);
```
### onFormAfterInit($formObject)

⚠️ **[deprecated]**
TODO

```php
$model->onFormAfterInit($formObject);
```
### formParams($data, $params)

Allows you to modify the parameters of the model's form before rendering. For full list of form parameters and additional information see [Form view]("../5. Views/Form.html"). You can override this funtion for additional functionality, for example based on the result of an IF statment you can change a parameter of the form.

```php
$model->formParams($data, $params);

OR

public function formParams($data, $params) {
if ((int) $params['id_staff'] > 5) {
    $params["columns"]["user_name"]["readonly"] = FALSE;
}

return $params;
};
```

### recordValidate($data)

Validates the form data. Validates if the types of the values are correct and if the values are required or not.

```php
$model->recordValidate($data)
```
### recordSave($data)

Saves the form data to the model's database table. This function also validates the data.

```php
$model->recordSave($data)
```
### recordDelete(int $id)

Deletes a specific row in the model's table.

```php
$model->recordDelete(5);
```

### cards(array $cards = [])

TODO

```php
$model->cards([]);
```
### cardsParams($params)
TODO

Allows you to modify the parameters of the model's cards before rendering. For full list of cards parameters see [Cards view]("../5. Views/Cards.html"). You can override this funtion for additional functionality, for example based on the result of an IF statment you can change a parameter of the cards.

```php
$model->cardsParams($params);

OR

public function cardsParams($params) {
  if ((int) $params['id_staff'] > 0) {
      $params["show_controls"] = FALSE;
  }

  return $params;
};
```
### treeParams($params)
TODO

Allows you to modify the parameters of the model's tree before rendering. For full list of tree parameters see [Tree view]("../5. Views/Tree.html"). You can override this funtion for additional functionality, for example based on the result of an IF statment you can change a parameter of the tree.

```php
$model->treeParams($params);

OR

public function treeParams($params) {
  if ((int) $params['id_staff'] > 0) {
      $params["show_controls"] = FALSE;
  }

  return $params;
};
```
### onBeforeInsert(array $data)

Allows you to manipulate the data before the insertion of a new row by overriding this function in the model.

```php
public function onBeforeInsert($data) {

  /*Your
  Code*/

  return $data;
};
```
### onBeforeUpdate(array $data)

Allows you to manipulate the data before the update of a row by overriding this function in the model.

```php
public function onBeforeUpdate($data) {

  /*Your
  Code*/

  return $data;
};
```
### onBeforeSave(array $data)

Allows you to manipulate the data before the insetion or update of a row by overriding this function in the model. Prefered method.

```php
public function onBeforeSave($data) {

  /*Your
  Code*/

  return $data;
};
```
### onBeforeDelete(array $id)

Allows you to manipulate the row id before deletion of the row by overriding this function in the model.

```php
public function onBeforeDelete($id) {

  /*Your
  Code*/

  return $id;
};
```
### onAfterInsert(array $data, $returnValue)

Returns the new data after insertion and allows you to manipulate this new data by overriding this function in the model.

```php
public function onAfterInsert($data, $returnValue) {

  /*Your
  Code*/

  return $data;
};
```
### onAfterUpdate(array $data, $returnValue)

Returns the new data after a row update and allows you to manipulate this new data by overriding this function in the model.

```php
public function onAfterUpdate($data, $returnValue) {

  /*Your
  Code*/

  return $data;
};
```
### onAfterSave(array $data, $returnValue)

Returns the new data after a row update or insertion and allows you to manipulate this new data by overriding this function in the model.

```php
public function onAfterSave($data, $returnValue) {

  /*Your
  Code*/

  return $data;
};
```
### onAfterDelete(int $id)

Returns the id of a deleted row and allows you to manipulate with the id by overriding this function in the model.

```php
public function onAfterDelete($id) {

  /*Your
  Code*/

  return $id;
};
```
### getQuery($columns = NULL)

Returns the id of a deleted row and allows you to manipulate with the id by overriding this function in the model.

```php
$model->getQuery([]);
```
### addLookupsToQuery($query, $lookupsToAdd = NULL)

TODO

```php
$model->addLookupsToQuery($query,$lookupsToAdd);
```
### addCrossTableToQuery($query, $crossTableModelName, $resultKey = '')

TODO

```php
$model->addCrossTableToQuery($query, $crossTableModelName, $resultKey);
```
### processLookupsInQueryResult($rows)

TODO

```php
$model->processLookupsInQueryResult($rows);
```
### fetchRows($eloquentQuery, $keyBy = 'id', $processLookups = TRUE)

TODO

```php
$model->fetchRows($eloquentQuery,'id', TRUE);
```
### countRowsInQuery($eloquentQuery)

TODO

```php
$model->countRowsInQuery($eloquentQuery);
```
