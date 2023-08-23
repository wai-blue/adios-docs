# Table

The Table view is one of the most important elements for data visualization. It offers extensive customization options, allowing developers to adjust the entire view to their needs. Beyond its role as a data renderer, the Table view includes additional functionalities, such as the ability to export data to CSV format or import data from a CSV file.

## Parameters

The Table view supports various parameters that can be utilized to meet functionality requirements:

| Property            | Type   | Default value | Description |
|---------------------|--------|---------------|-------------|
| model               | string | ''            |             |
| uid                 | string | ''            |             |
| title               | string | ''            |             |
| tag                 | string | ''            |             |
| page                | int    | 1             |             |
| where               | string | ''            |             |
| having              | string | ''            |             |
| orderBy             | string | ''            |             |
| itemsPerPage        | int    | 25            |             |
| onclick             | string | ''            |             |
| showTitle           | bool   | true          |             |
| showPaging          | bool   | true          |             |
| showColumnTitles    | bool   | true          |             |
| showColumnsFilter   | bool   | true          |             |
| showControls        | bool   | true          |             |
| showAddButton       | bool   | true          |             |
| showPrintButton     | bool   | true          |             |
| showSearchButton    | bool   | true          |             |
| showExportCsvButton | bool   | true          |             |
| showImportCsvButton | bool   | true          |             |
| columnsOrder        | array  | []            |             |

## Usage

```php
$this->adios->view->Table([
  'model' => 'Path/To/Your/Model'
]);
```

## Examples

## Notes
