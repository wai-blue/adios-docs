# Dashboard

The Dashboard view is a customizable workspace for every ADIOS user. It can be customized to your liking, and you can save presets for future use. The Dashboard also displays cards for each module that your application is working with.

## Properties

The Dashboard view supports various properties that can be utilized to meet functionality requirements:

| Property       | Type   | Default value              | Description                                       |
|----------------|--------|----------------------------|---------------------------------------------------|
| title          | string | 'Dashboard'                | Title of the view                                 |
| saveAction     | string | '/UI/Dashboard/SaveConfig' | Path to action to save the current configuration  |
| addCardsAction | string | '/UI/Dashboard/AddCards'   | Path to action to add cards to the current preset |

Additionally, you may utilize the GET variable **preset** with a number to specify which preset should be loaded


## Usage

```php
$this->adios->view->Dashboard([
  'title' => 'View Title',
  'saveAction' => '/Path/To/Action',
  'addCardsAction' => '/Path/To/Action',
])->render();
```

## Examples

**Example #1:** Basic Dashboard view, this is also very dependent on saveAction and addCardsAction parameter

```php
$this->adios->view->Dashboard([
  'title' => 'Dashboard',
  'saveAction' => '/UI/Dashboard/SaveConfig',
  'addCardsAction' => '/UI/Dashboard/AddCards'
])->render();
```

**Example #2:** Like in the example above, parameters can be optionally specified but are also set to their default values automatically.
It is however recommended, to supply `$this->params`, in case you would like to change them later.

```php
$this->adios->view->Dashboard($this->params)->render();
```

**Example #3:** Alternatively, an empty array also works just fine

```php
$this->adios->view->Dashboard([])->render();
```

## Creating Dashboard cards

*Cards* function as a link to an already existing *Action*, which they display. You may specify them inside a model
like so:

```php
public function cards($cards = []) {
  return parent::cards([
    "Model/Card1" => [
      'action' => 'path/To/Action',
      'params' => [
        'parameter_one' => 1,
        'parameter_two' => 'lorem ipsum',
      ],
    ]
  ]);
}
```

## Usage

This example demonstrates how you can define cards inside a model

```php
class Currency extends \ADIOS\Core\Model {

  use \App\Widgets\Sandbox\Models\Callbacks\Currency;
  
  public function cards($cards = []) {
    return parent::cards([
      'Currency/Table' => [
        'action' => 'sandbox/Currency/Table',
        'params' => [
          'currency_id' => 1,
          'title' => 'Currency Table',
        ],
      ],
      'Currency/Chart' => [
        'action' => 'sandbox/Currency/Chart',
        'params' => [
          'currency_id' => 1,
        ],
      ]
    ]);
  }
}
```
