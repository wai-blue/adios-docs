# Input

The Table view is one of the most important elements for data visualization. It offers extensive customization options, allowing developers to adjust the entire view to their needs. Beyond its role as a data renderer, the Table view includes additional functionalities, such as the ability to export data to CSV format or import data from a CSV file.

## Properties

The Input view supports various properties that can be utilized to meet functionality requirements:

| Property                                     | Type   | Default value  | Description                                                                                                                                                  |
| -------------------------------------------- | ------ | -------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| model                                        | string |                | Path to model                                                                                                                                                |
| column                                       | string |                | Specific column in a database table                                                                                                                          |
| type                                         | string |                | Predefined types of an input. **Options:** `['char', 'varchar', 'int', 'float', 'text', 'password', 'date', 'datetime', 'lookup', 'image', 'file', 'color']` |
| value                                        | string |                | The value of an input (boolean values are interchangeable with 1,0 or Y,N)                                                                                   |
| html_attributes                              | string |                | Additional HTML atributes                                                                                                                                    |
| placeholder                                  | string |                | Greyed out hint text inside an input                                                                                                                         |
| readonly                                     | bool   | false          | Enables/Disables the editing of an input                                                                                                                     |
| default_date_value                           | string |                | Default value of a Date input                                                                                                                                |
| max_date                                     | string |                | The maximum allowed date user can choose                                                                                                                     |
| min_date                                     | string |                | The minimum allowed date user can choose                                                                                                                     |
| enum_values                                  | array  |                | Values for a select input                                                                                                                                    |
| decimals                                     | int    |                | Precision of decimal numbers                                                                                                                                 |
| interface                                    | string |                | Changes the text area to a specific editor. **Options**: `['text', 'plain_text', 'json_editor','formatted_text', 'single_line']`                             |
| ⚠️ **[deprecated]** show_file_browser        | bool   | true           |                                                                                                                                                              |
| ⚠️ **[deprecated]** show_download_url_button | bool   | true           |                                                                                                                                                              |
| show_open_button                             | bool   | true           | Enables/Disables the Show button after uploding a file                                                                                                       |
| show_delete_button                           | bool   | true           | Enables/Disables the Delete button after uploding a file                                                                                                     |
| table                                        | string |                | Name of the database table                                                                                                                                   |
| not_selected_text                            | string | [Not Selected] | Special first empty value for a select input                                                                                                                 |
| input_style                                  | string |                | **Options**: `['slider' for type 'int'; 'autocomplete', 'select' for type 'lookup']`                                                                         |
| max                                          | int    | 100            | Sets the maximum value of a slider                                                                                                                           |
| min                                          | int    | 1              | Sets the minimum value of a slider                                                                                                                           |
| step                                         | int    | 2              | Sets the step value of a slider                                                                                                                              |
| onchange                                     | string |                | Custom Javascript function ⚠️warning! Only safe for slider                                                                                                   |
| lookup_detail_enabled                        | bool   | true           | Enables/Disables the button to open the details of the selected entry                                                                                        |
| lookup_detail_onclick                        | string |                | Custom Javascript for the entry detail button                                                                                                                |
| lookup_search_enabled                        | bool   | true           | Enables/Disables the search button                                                                                                                           |
| lookup_search_onclick                        | string |                | Custom Javascript for the search button                                                                                                                      |
| lookup_add_enabled                           | bool   | false          | Enables/Disables the button to add another entry to the table                                                                                                |
| lookup_add_onclick                           | string |                | Custom Javascript for the add button                                                                                                                         |
| ⚠️ **[deprecated]** gc_function              | string |                |                                                                                                                                                              |
| unit                                         | string |                | Adds a hint for the unit of the values behind an input                                                                                                       |
| translate_value                              | bool   | false          | Specifies the value to translate from the dictionary                                                                                                         |
| disabled                                     | bool   | false          | Disables the input and excludes it from form submitting                                                                                                      |

## Usage

```php
$this->adios->view->Input([
  'model' => 'Path/To/Your/Model'
])->render();
```

## Examples

**Example #1:**  Basic input for one line text

```php
    $adios->view->create('Input', [
      'type' => 'varchar',
      'value' => 'Hello World',
    ]);
```

**Example #2:** Input for an autocomplete search bar for VAT list

```php
 $this->adios->view->Input([
      'model' => 'App/Widgets/Finance/MainBook/Models/Vat',
      'type' => 'lookup'
 ]);
```

**Example #3:** A select input with a list of values

```php
 $this->adios->view->Input([
      'type' => 'varchar',
      'enum_values' => ['One', 'Two', 'Three']
 ]);

```

## Notes
