# Html

The ManyToMany view generates a field with checkboxes from the set relational table.

## Properties

The ManyToMany view supports various properties that can be utilized to meet functionality requirements:

| Property | Type   | Default value | Description |
| -------- | ------ | ------------- | ----------- |
| model     | string |               | Path to a model |
| columns     | int |     3          | Choice for a list of column sizes **Options** `[1 for 12 columns, 2 for 6 columns, 3 for 4 columns, 4 for 3 columns, 6 for 2 columns]` |
| relation[0]     | string |               | Source column |
| relation[1]     | string |               | Destination column |
| Order     | string |   id asc            | Column and order to order the table by |
| Contraints     | string |   TRUE            | Constraints on the source and destination column |

## Usage

```php
(new \ADIOS\Core\Views\Inputs\ManyToMany($this->adios, []))->render();
```

## Examples

**Example #1:** Html view with an image

```php
$adios->view->Html([
  'html' => '<img scr="path/to/image">',
]);
```

**Example #2:** Html view with an ordered list

```php
$adios->view->Html([
  'html' => '
  <ol>
    <li>Example 1</li>
    <li>Example 2</li>
    <li>Example 3</li>
  </ol>
  '
]);
```

**Example #3:** Html view with a paragraph with a link

```php
$adios->view->Html([
  'html' => '<p>Example <a href="url">paragraph</a> </p>',
]);
```

## Notes
