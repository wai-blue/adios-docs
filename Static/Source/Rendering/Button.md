# Button

The Button component in ADIOS provides a interactive element that allows users to trigger specific actions or events within the application.

## Properties

The Button component supports various properties that can be utilized to meet specific design and functionality requirements:

1. type: Type of the button. Supported values for this parameter are: 'save', 'search', 'apply', 'close', 'copy', 'add', 'delete', 'cancel', 'confirm'.
2. href: The URL for the button when used as a link.
3. faIcon: The Font Awesome icon to be displayed alongside the button text.
4. text: The text displayed on the button.
5. textRaw: The raw text displayed on the button, not processed.
6. class: Additional CSS classes for additional styling of the button.
7. onClick: The JavaScript function to be executed when the button is clicked.
8. title: The text that appears when hovering over the button.
9. style: Inline CSS styles to customize the button.
10. disabled: A boolean property to disable the button and prevent user interaction. The default value is FALSE.

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

1. Each supported type of button has a predefined Font Awesome icon corresponding to its type.
