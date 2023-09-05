# Grid

The CSS Grid Layout Module offers a grid-based layout system, with rows and columns, making it easier to design web pages without having to use floats and positioning. Learn more about the Grid system [https://www.w3schools.com/css/css_grid.asp](https://www.w3schools.com/css/css_grid.asp).

## Properties

The Grid view supports various properties that can be utilized to meet functionality requirements:

| Property  | Type  | Default value | Description                                                       |
| --------- | ----- | ------------- | ----------------------------------------------------------------- |
| layout    | array | []            |                                                                   |
| layoutSm  | array | []            | For resolution larger than 576px  (Small devices)                 |
| layoutMd  | array | []            | For resolution larger than 768px  (Medium devices)                |
| layoutLg  | array | []            | For resolution larger than 992px  (Large devices)                 |
| layoutXl  | array | []            | For resolution larger than 1200px (X-Large devices)               |
| layoutXXl | array | []            | For resolution larger than 1400px (XX-Large devices)              |
| areas     | array | []            | Specifies how to display columns and rows, using named grid items |

## Usage

```php
$this->adios->view->Grid([
  'layout' => ['A', 'B'],
  'areas' => [
    'A' => [
      'html|action|view'
    ],
    'B' => [
      'html|action|view'
    ]
  ]
])->render();
```

## Examples

**Example #1:** Grid used for the custom form with area A and area B. Where in area A is renders custom HTML and area B renders Form view.

```php
return $this->adios->view->Grid([
  'layout' => ['A', 'B'],
  'areas' => [
    'A' => [
      'html' => '<h1 class="p-0 m-1">Hello world</h1>'
    ],
    'B' => [
      'view' => 'Form',
      'params' => [
        'displayMode' => 'inline',
        'model' => 'App/Widgets/Finance/MainBook/Models/Vat',
      ]
    ] 
  ]
])->render();
```

## Notes
