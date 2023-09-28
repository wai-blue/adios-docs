# Settings Panel

The Setting Panel input allows you to generate settings forms for your widgets at ease. The settings form consists of
inputs with descriptions / titles and inputs. You may also split it up into more tabs to avoid making the form too
cluttered or complicated.

## Writing the template

To achieve the intended functionality of the Settings Panel you may use the `template` property.
The object supplied to `template` property should contain a list of `items` or a list of `tabs`, if you'd like to split
the form into multiple tabs, as mentioned above.

  * A tab object inside the `tabs` property may contain the following properties:

| Property | Description                  |
|----------|------------------------------|
| title    | Title of the tab             |
| items    | List of items inside the tab |

  * An item object inside the `items` property (whether inside a tab or not) may contain the following properties:

| Property    | Description                                                         |
|-------------|---------------------------------------------------------------------|
| title       | Title of the item                                                   |
| description | Additional description to the item                                  |
| input       | ADIOS view to render inside the item (e.g. Input or any other view) |
| html        | If `input` property isn't supplied: raw HTML code to render instead |

> :bulb: The Settings Panel may have tabs, each with items containing the inputs. Each item contains one input.
> Additionally you may also add items directly to the template without any tabs.

## Examples

**Example #1:** Simple settings panel with an HTML code

```php
$settingsPanel = new \ADIOS\Core\Views\Inputs\SettingsPanel($adios, [
  'template' => [
    'items' => [
      [
        'title' => 'Announcement title',
        'input' => new Input($this->adios, ['type' => 'varchar']),
        'description' => '* max. length: 256 characters'
      ],
      '<p>Announcement description</p><textarea></textarea>'
    ]
  ]
]);
```

> :bulb: You may insert an HTML item also simply as a string.

**Example #2:** More comprehensive Settings panel split into 2 tabs

```php
$settingsPanel = new \ADIOS\Core\Views\Inputs\SettingsPanel($this->adios, [
  'template' => [
    'tabs' => [
      [
        'title' => 'Content',
        'items' => [
          [
            'title' => 'Announcement title',
            'input' => new Input($this->adios, ['type' => 'varchar']),
            'description' => '* max. length: 256 characters'
          ],
          [
            'title' => 'Announcement description',
            'html' => '<textarea></textarea>'
          ],
          '<p>Release date</p><input type="date">'
        ]
      ],
      [
        'title' => 'Settings',
        'items' => [
          [
            'title' => 'Priority?',
            'input' => new Input($this->adios, ['type' => 'bool']),
            'description' => 'Announcement will be pinned to top'
          ]
        ]
      ]
    ]
  ]
]);
```

**Note:** To test the examples, don't forget to use the `render()` method:

```php
$settingsPanel->render();
```
