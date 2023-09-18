# Html

The Html view alows you to insert custom HTML into your pages.

## Properties

The Html view supports various properties that can be utilized to meet functionality requirements:

| Property | Type   | Default value | Description |
| -------- | ------ | ------------- | ----------- |
| html     | string |               | Html string |

## Usage

```php
$this->adios->view->Html([
  'html' => '<p>Example</p>'
  ])->render();
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
