# Button

The Button component in ADIOS provides a interactive element that allows users to trigger specific actions or events within the application.

## Properties

The Button component supports various properties that can be utilized to meet specific design and functionality requirements:

| Property name | Type    | Description                                                           | Supported value | Default            |
| ------------- | ------- | --------------------------------------------------------------------- | --------------- | ------------------ |
| type          | string  | Type of the button                                                    | save            | faIcon             | fas fa-check |
|               |         |                                                                       |                 | text               | Save |
|               |         |                                                                       |                 | class              | btn-success |
|               |         |                                                                       |                 | onClick            | element_id'_save() |
|               |         |                                                                       | search          | faIcon             | as fa-search |
|               |         |                                                                       |                 | text               | Search |
|               |         |                                                                       |                 | class              | btn-light |
|               |         |                                                                       |                 | onClick            | element_id'_search() |
|               |         |                                                                       | apply           | faIcon             | fas fa-check |
|               |         |                                                                       |                 | text               | Apply |
|               |         |                                                                       |                 | class              | btn-success |
|               |         |                                                                       |                 | onClick            | element_id'_apply() |
|               |         |                                                                       | close           | faIcon             | fas fa-times |
|               |         |                                                                       |                 | class              | btn-light |
|               |         |                                                                       |                 | title              | Close |
|               |         |                                                                       |                 | onClick            | element_id'_close() |
|               |         |                                                                       | copy            | faIcon             | fas fa-copy |
|               |         |                                                                       |                 | text               | Copy |
|               |         |                                                                       |                 | class              | btn-secondary |
|               |         |                                                                       |                 | onClick            | element_id'_copy() |
|               |         |                                                                       | add             | faIcon             | fas fa-plus |
|               |         |                                                                       |                 | text               | Add |
|               |         |                                                                       |                 | onClick            | element_id'_add() |
|               |         |                                                                       | delete          | faIcon             | fas fa-trash-alt |
|               |         |                                                                       |                 | class              | text-danger |
|               |         |                                                                       |                 | title              | Delete |
|               |         |                                                                       |                 | onClick            | element_id'_delete() |
|               |         |                                                                       | cancel          | faIcon             | app/x-mark-3.png |
|               |         |                                                                       |                 | text               | Cancel |
|               |         |                                                                       |                 | onClick            | element_id'_cancel() |
|               |         |                                                                       | confirm         | faIcon             | app/ok.png |
|               |         |                                                                       |                 | text               | Confirm |
|               |         |                                                                       |                 | onClick            | element_id'_confirm() |
| href          | string  | The URL for the button when used as a link                            |                 | javascript:void(0) |
| faIcon        | string  | The Font Awesome icon to be displayed alongside the button text       |                 |                    |
| text          | string  | The text displayed on the button                                      |                 |                    |
| textRaw       | string  | The raw text displayed on the button, not processed                   |                 |                    |
| class         | string  | Additional CSS classes for additional styling of the button           |                 |                    |
| onClick       | string  | The JavaScript function to be executed when the button is clicked     |                 |                    |
| title         | string  | The text that appears when hovering over the button                   |                 |                    |
| style         | string  | Inline CSS styles to customize the button                             |                 |                    |
| disabled      | boolean | A boolean property to disable the button and prevent user interaction |                 | FALSE              |

## Usage

1. Ensure that you have correctly followed the structure of the prototype builder.
2. Place the button component in the desired location within your .yml file hierarchy.
3. Define the necessary properties for the button according to your requirements.

```
array (
    'view' => 'Button',
        'params' => [
            'title' => 'button title',
            'text' => 'some text in the button',
        ],
    ),
```

## Examples

Will be added later...

## Notes

1. Each supported type of button has a predefined Font Awesome icon corresponding to its type, as well as properties for 'type', 'class', and 'onClick'.
