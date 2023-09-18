# Title

The Title view adds an easy and fast way of adding headers to your application.

## Properties

The Title view supports various properties that can be utilized to meet functionality requirements:

| Property                                     | Type   | Default value  | Description                    |
| -------------------------------------------- | ------ | -------------- | -------------------------------|
| ⚠️ **[deprecated]** fixed                    | bool |                | Adds 'fixed' class to a Title |


## Basic Usage

```php
$this->adios->view->Title()->setTitle("Header 1")->render();
```
## Functions

### setTitle(string $title)

Sets the title

```php
$adios->view->Title()->setTitle("Header 1");
```

### setLeftContent(array $viewObjects = [])

This function allows you to add views below a Title view, for example a leading paragraph. This view is then aligned to the left.

**Example:** A Title view with an Input view aligned to the left

```php
$adios->view->Title([])->setTitle("Header 1")->setLeftContent([
  $this->adios->view->Input([
    'type' => 'varchar',
    'enum_values' => ['One', 'Two', 'Three']
  ])
])
```

### setRightContent(array $viewObjects = [])

This function allows you to add views below a Title view, for example a leading paragraph. This view is then aligned to the right.

**Example:** A Title view with a Table view aligned to the right for the VAT list filtered by SQL condition where and order by condition 

```php
$adios->view->Title([])->setTitle("Header 1")->setLeftContent([
  $this->adios->view->Table([
    'model' => 'App/Widgets/Finance/MainBook/Models/Vat',
    'where' => [
      ['ratio', '>', 30]
    ],
    'orderBy' => 'ratio DESC'
  ])
])
```

## Notes
`setLeftContent()` and `setRightContent()` functions can be used simultaneously on one Title view. 
