TBA

  

## Properties

  

The Input view supports various properties that can be utilized to meet functionality requirements:

  

| Property                 | Type   | Default value | Description                                                                                                                                                 |
| ------------------------ | ------ | ------------- |:----------------------------------------------------------------------------------------------------------------------------------------------------------- |
| model                    | string |               | Path to model                                                                                                                                               |
| column                   | string |               | Specific column in a database table                                                                                                                         |
| type                     | string |               | Predefined types of a input. **Options:** `['char', 'varchar', 'int', 'float', 'text', 'password', 'date', 'datetime', 'lookup', 'image', 'file', 'color']` |
| value                    | string |               | The value of the input (bool values are interchangeable with 1,0 or Y,N)                                                                                    |
| html_attributes          | string |               | Additional HTML atributes                                                                                                                                   |
| placeholder              | string |               | Greyed out hint text                                                                                                                                        |
| readonly                 | bool   | false         | Makes the input not editable                                                                                                                                |
| default_date_value       | string |               | Default value of a Date input                                                                                                                               |
| max_date                 | string |               | The maximum allowed date user can choose                                                                                                                    |
| min_date                 | string |               | The minimum allowed date user can choose                                                                                                                    |
| enum_values              | array  |               | Values for a select input                                                                                                                                   |
| decimals                 | int    |               | Number of numbers behind a dot                                                                                                                              |
| interface                | string |               | Changes the text area to a specific editor. **Options**: `['text', 'plain_text', 'json_editor','formatted_text', 'single_line']`                            |
| show_file_browser        | bool   | true          |                                                                                                                                                             |
| show_download_url_button | bool   | true          |                                                                                                                                                             |
| show_open_button         | bool   | true          |                                                                                                                                                             |
| show_delete_button       | bool   | true          |                                                                                                                                                             |
| table                    | string |               | Name of the database table                                                                                                                                  |
| not_selected_text        | string |               |                                                                                                                                                             |
| input_style              | string |               | **Options**: `['slider' for type 'int']`                                                                                                                    |
| lookup_detail_enabled    | bool   | true          |                                                                                                                                                             |
| lookup_detail_onclick    | string |               |                                                                                                                                                             |
| lookup_search_enabled    | bool   | true          |                                                                                                                                                             |
| lookup_search_onclick    | string |               |                                                                                                                                                             |
| lookup_add_enabled       | bool   | false         |                                                                                                                                                             |
| lookup_add_onclick       | string |               |                                                                                                                                                             |
| gc_function              | string |               |                                                                                                                                                             |
| unit                     | string |               |                                                                                                                                                             |
| translate_value          | bool   | false         |                                                                                                                                                             |
| disabled                 | bool   | false         | Disables the input and excludes it from submitting                                                                                                          |
## Usage

  

```php

$this->adios->view->Input([

  'model' => 'Path/To/Your/Model'

])->render();

```

  

## Examples