# Table

The Table view is one of the most important elements for data visualization. It offers extensive customization options, allowing developers to adjust the entire view to their needs. Beyond its role as a data renderer, the Table view includes additional functionalities, such as the ability to export data to CSV format or import data from a CSV file.

## Properties

The Table view supports various properties that can be utilized to meet functionality requirements:

| Property               | Type          | Default value | Description                                                          |
| ---------------------- | ------------- | ------------- | -------------------------------------------------------------------- |
| model                  | string        | ''            | Path to model                                                        |
| uid                    | string        | ''            | Html identifier, if it is empty ADIOS will generate it automatically |
| title                  | string        | ''            |                                                                      |
| ⚠️ **[deprecated]** tag | string        | ''            |                                                                      |
| page                   | int           | 1             | Current page in pagination                                           |
| where                  | string\|array | ''            | WHERE SQL condition                                                  |
| having                 | string        | ''            | HAVING SQL condition                                                 |
| orderBy                | string        | ''            | ORDER BY SQL condition                                               |
| itemsPerPage           | int           | 25            | Items per page for pagination                                        |
| onclick                | string        | ''            | JavaScript function call                                             |
| showTitle              | bool          | true          |                                                                      |
| showPaging             | bool          | true          |                                                                      |
| showColumnTitles       | bool          | true          |                                                                      |
| showColumnsFilter      | bool          | true          |                                                                      |
| showControls           | bool          | true          |                                                                      |
| showAddButton          | bool          | true          |                                                                      |
| showPrintButton        | bool          | true          |                                                                      |
| showSearchButton       | bool          | true          |                                                                      |
| showExportCsvButton    | bool          | true          |                                                                      |
| showImportCsvButton    | bool          | true          |                                                                      |
| columnsOrder           | array         | []            | The order of the columns in the table                                |
| readonly               | bool          | false         | Add, Search, Export, Import buttons will be disabled                 |

## Usage

```php
$this->adios->view->Table([
  'model' => 'Path/To/Your/Model'
])->render();
```

## Examples

**Example #1:** Table for the VAT list filtered by SQL condition where and order by condition

```php
$this->adios->view->Table([
  'model' => 'App/Widgets/Finance/MainBook/Models/Vat',
  'where' => [
    ['ratio', '>', 30]
  ],
  'orderBy' => 'ratio DESC'
]);
```

**Example #2:** Table for the VAT list filtered by SQL inline condition where

```php
$this->adios->view->Table([
  'model' => 'App/Widgets/Finance/MainBook/Models/Vat',
  'where' => 'ratio > 30' #inline where condition
]);
```

**Example #3:** The table for the VAT list with the changed order of the columns in the table

```php
$this->adios->view->Table([
  'model' => 'App/Widgets/Finance/MainBook/Models/Vat',
  'columnsOrder' => ['id_fin_book_account', 'id_fin_accounting_period', 'ratio']
]);
```

## Notes
