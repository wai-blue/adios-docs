# Button

The Table component is one of the most important elements for data visualization. It offers extensive customization options, allowing developers to adjust the entire component to their needs. Beyond its role as a data renderer, the Table component includes additional functionalities, such as the ability to export data to CSV format or import data from a CSV file.

## Properties

The Table component supports various properties that can be utilized to meet functionality requirements:

| Property                    | Type    | Description                                                    | Default  |
| --------------------------- | ------- | -------------------------------------------------------------- | -------- |
| Core parameters             |
| title                       | string  |                                                                | '        |
| tag                         | string  |                                                                | '        |
| page                        | int     |                                                                | 1        |
| refreshAction               | string  |                                                                | UI/table |
| onClick                     | string  |                                                                | '        |
| columnsOrder                | array   |                                                                | []       |
| form_data                   | array   |                                                                | []       |
| Database focused parameters |
| where                       | string  | Specifies a 'WHERE' clause for SQL query                       | '        |
| having                      | string  | Specifies a 'having' clause for SQL query                      | '        |
| orderBy                     | string  | Determines the display order for selected items                | '        |
| itemsPerPage                | int     | Specifies the number of items displayed on a single table page | 25       |
| Render focused parameters   |
| showTitle                   | boolean |                                                                | TRUE     |
| showPaging                  | boolean |                                                                | TRUE     |
| showColumnTitles            | boolean |                                                                | TRUE     |
| showColumnsFilter           | boolean |                                                                | TRUE     |
| showControls                | boolean |                                                                | TRUE     |
| showAddButton               | boolean |                                                                | TRUE     |
| showPrintButton             | boolean |                                                                | TRUE     |
| showSearchButton            | boolean |                                                                | TRUE     |
| showExportCsvButton         | boolean |                                                                | TRUE     |
| showImportCsvButton         | boolean |                                                                | FALSE    |
| allow_order_modification    | boolean |                                                                | TRUE     |
| buttons                     | array   |                                                                | []       |

## Usage

1. Ensure that you have correctly followed the structure of the prototype builder.
2. Place the table component in the desired location within your .yml file hierarchy.
3. Define the necessary properties for the table according to your requirements.

```
$view = $this->adios->view->create(
      'Table',
      array_merge(
        [
          'windowParams' => $this->params['windowParams'] ?? [],
        ],
        array (
          'displayMode' => 'inline',
          'model' => 'name of model',
          'orderBy' => 'start_date desc',
        )
      )
    );
```

## Examples

Will be added later...

## Notes
