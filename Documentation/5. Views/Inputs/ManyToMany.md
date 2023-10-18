# ManyToMany

The ManyToMany view generates a field with checkboxes from the source and destination columns.

## Properties

The ManyToMany view supports various properties that can be utilized to meet functionality requirements:

| Property   | Type             | Default value | Description                                                             |
| ---------- | ---------------- | ------------- | ----------------------------------------------------------------------- |
| model      | string           |               | Path to a model                                                         |
| columns    | int              | 3             | Number of columns that will be generated to put checkboxes into (max 6) |
| relation   | array of strings |               | Name of the lookup source and lookup destination columns                 |
| order      | string           | id asc        | Column to order the table by                                            |
| contraints | array of strings | TRUE          | Where clause constraints on the source and destination column           |

## Usage

```php
(new \ADIOS\Core\Views\Inputs\ManyToMany($this->adios, [
  "model" => "Path/To/A/Model",
  "relation" => ["lookup_column1", "lookup_column2"],
]))->render();
```

## Examples

**Example #1:** ManyToMany view creating a checkbox field based on two lookup columns

```php
(new \ADIOS\Core\Views\Inputs\ManyToMany($this->adios, [
  "model" => "App/Widgets/Finance/MainBook/Models/BookAccount",
  "relation" => ["id_fin_accounting_period", "id_parent"],
]))->render();
```

**Example #2:** ManyToMany view creating a checkbox field based on two lookup columns while organizing checkboxes into 3 columns

```php
(new \ADIOS\Core\Views\Inputs\ManyToMany($this->adios, [
  "model" => "App/Widgets/Finance/MainBook/Models/BookAccount",
  "relation" => ["id_fin_accounting_period", "id_parent"],
  "columns" => 3
]))->render();
```

**Example #3:** ManyToMany view creating a checkbox field with where clause constraints

```php
(new \ADIOS\Core\Views\Inputs\ManyToMany($this->adios, [
  "model" => "App/Widgets/Finance/MainBook/Models/BookAccount",
  "relation" => ["id_fin_accounting_period", "id_parent"],
  "constraints" => ["id_fin_accounting_period" => 3, "id_parent" => NULL ]
]))->render();
```

## Notes
 - You need to have a minimun of two lookup columns in a model.