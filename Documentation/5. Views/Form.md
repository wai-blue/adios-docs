# Form 

The Form view is one of the most important elements for data manipulating such a inserting and editing records from the database. Also it offers extensive customization options, allowing developers to adjust the entire form to their needs.

## Properties

The Form view supports various properties that can be utilized to meet functionality requirements:

| Property                         | Type   | Default value       | Description                                                                                |
|----------------------------------|--------|---------------------| ------------------------------------------------------------------------------------------ |
| model                            | string | ''                  | Path to model                                                                              |
| uid                              | string | ''                  | Html identifier, if it is empty ADIOS will generate it automatically                       |
| title                            | string | ''                  |                                                                                            |
| title_params                     | array  | []                  |                                                                                            |
| ⚠️ **[deprecated]** formatter    | string | 'ui_form_formatter' |                                                                                            |
| defaultValues                    | array  |                     | Default values for inputs. *Example #1*                                                    |
| readonly                         | bool   | false               | All columns in the form will be disabled, the show and close buttons will also be disabled |
| template                         | array  | []                  |                                                                                            |
| content                          | array  | []                  |                                                                                            |
| show_save_button                 | bool   | true                |                                                                                            |
| save_button_params               | array  | []                  |                                                                                            |
| show_close_button                | bool   | true                |                                                                                            |
| close_button_params              | array  | []                  |                                                                                            |
| show_delete_button               | bool   | true                |                                                                                            |
| delete_button_params             | array  | []                  |                                                                                            |
| show_copy_button                 | bool   | false               |                                                                                            |
| copy_button_params               | array  | []                  |                                                                                            |
| formType                         | string | 'window'            |                                                                                            |
| ⚠️ **[deprecated]** windowParams | array  | []                  |                                                                                            |
| ⚠️ **[deprecated]** width        | int    | 700                 |                                                                                            |
| ⚠️ **[deprecated]** height       | int    | 0                   |                                                                                            |
| ⚠️ **[deprecated]** onclose      | string | ''                  |                                                                                            |
| onload                           | string | ''                  | Custom JavaScript function that renders after html document onload                         |
| javascript                       | string | ''                  | Custom JavaScript function that renders with the Form view                                 |
| displayMode                      | string | 'window'            | The rendering type of the form: **Options:**  `['desktop', 'window']`                      |

## Usage

```php
$this->adios->view->Form([
  'model' => 'Path/To/Your/Model'
])->render();
```

## Examples

**Example #1:** Form for the VAT with default value for the column ratio.

```php
$this->adios->view->Form([
  'model' => 'App/Widgets/Finance/MainBook/Models/Vat',
  'defaultValues' => [
    'ratio' => 20
  ]
]);
```

**Example #2:** Form for the VAT with read-only inputs.

```php
$this->adios->view->Form([
  'model' => 'App/Widgets/Finance/MainBook/Models/Vat',
  'readonly' => true
]);
```

**Example #3:** Form for the VAT with custom inputs order

```php
$this->adios->view->Form([
  'model' => 'App/Widgets/Finance/MainBook/Models/Vat',
  'columns' => [
    [
      'rows' => [
        'id_fin_accounting_period',
        'ratio'
      ]
    ]
  ]
]);
```

**Example #4:** Form for the VAT with custom tabs windows

```php
$this->adios->view->Form([
  'model' => 'App/Widgets/Finance/MainBook/Models/Vat',
  'template' => [
    'columns' => [
      [
        'tabs' => [
          'Main' => [ # Tab Main with form input ratio
            'ratio'
          ],
          'Other' => [ # Other tab called Other with another form inputs
            'id_fin_accounting_period',
            'id_fin_book_account'
          ]
        ]
      ]
    ]
  ]
])
```

**Example #5:** Form with Grid content

By using the parameter content, you are able to insert another View inside the Form, which is then able to also display
the form inputs. This way, you are able to reach recursion and nest any views indefinitely to your liking.

```php
$this->adios->view->Form([
  'model' => 'App/Widgets/Finance/MainBook/Models/Vat',
  'content' => [
    'view' => 'ADIOS/Core/Views/Tabs',
    'params' => [
      'tabs' => [
        [
          'title' => 'First Tab',
          'content' => [
            'view' => '/ADIOS/Core/Views/Grid',
            'params' => [
              'layout' => ['A A', 'B C'],
              'areas' => [
                'A' => [
                  'item' => [
                    'view' => 'Table',
                    'params' => [
                      'model' => 'App/Widgets/Finance/MainBook/Models/AccountingPeriod',
                      'showColumns' => ['name', 'start_date', 'end_date']
                      ]
                    ]
                  ],
                'B' => ['item' => 'id_fin_accounting_period'],
                'C' => ['item' => 'id_fin_book_account'],
              ]
            ]
          ]
        ],
        [
          'title' => 'Second tab',
          'content' => [
            'view' => '/ADIOS/Core/Views/Grid',
            'params' => [
              'layout' => ['A B'],
              'areas' => [
                'A' => ['item' => 'ratio'],
                'B' => ['item' => [
                  'view' => 'Html',
                  'html' => 'This is an example HTML View.'                
                ]]
              ]
            ]
          ]
        ]
      ]   
    ]   
  ]
])
```

## Notes
