# Button

The Button view in ADIOS provides a interactive element that allows users to trigger specific actions or events within the application.

## Parameters

The Button view supports various parameters that can be utilized to meet specific design and functionality requirements:

| Property   | Type     | Default value   | Description                                                                                                                            |
| ---------- | -------- | --------------- | ---------------------------------------------------------------------------------------------------------------------------------------|
| type       | string   | ''              | Predefined type of button. **Options:**  `['save', 'search', 'apply', 'copy', 'close', 'add', 'delete', 'cancel', 'confirm', 'print']` |
| href       | string   | ''              | The URL for the button when used as a link                                                                                             |
| faIcon     | string   | ''              | The Font Awesome icon to be displayed alongside the button text                                                                        |
| text       | string   | ''              | The text displayed on the button                                                                                                       |
| textRaw    | string   | ''              | The raw text displayed on the button, not processed                                                                                    |
| class      | string   | ''              | Additional CSS classes                                                                                                                 |
| onclick    | string   | ''              | The JavaScript function to be executed after button is clicked                                                                         |
| title      | string   | ''              | Text that appears when hovering over the button                                                                                        |
| style      | string   | ''              | Inline CSS styles                                                                                                                      |
| disabled   | bool     | false           | Disabled/enabled                                                                                                                       |

## Usage

```php
$this->adios->view->Button([
    'type' => 'delete',
    'title' => 'Delete item',
    'text' => 'Delete item',
    'onclick' => 'alert()'
])->render();
```

## Examples

**Example #1:** Disabled button

```php
$this->adios->view->Button([
    'type' => 'confirm',
    'text' => 'Disabled button',
    'disabled' => true
]);
```

**Example #2:** Button with custom onclick function

```php
$this->adios->view->Button([
    'text' => 'Your function',
    'onclick' => 'yourFunction()'
]);
```

## Notes

1. Each supported type of button has a predefined Font Awesome icon corresponding to its type, as well as properties for 'type', 'class', and 'onClick'.
