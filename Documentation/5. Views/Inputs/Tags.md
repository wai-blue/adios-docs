# Tags 

Tags are one of the existing types for displaying input. The Tags input provides a dynamic input for inserting tags or selected tags from already initialized set of tags.

## Properties

The Tags input view supports various properties that can be utilized to meet functionality requirements:

| Property     | Type         | Default value | Description                                                          |
| ------------ | ------------ | ------------- | -------------------------------------------------------------------- |
| model        | string       | ''            | Path to model                                                        |
| tagColumn    | string       | 'tag'         | A column from the model into which the entered tags will be inserted |
| initialsTags | string(json) | '[""]'        | Initial tags to be displayed on initialization of the Tags input     |

## Usage

```php
(new \ADIOS\Core\Views\Inputs\Tags($this->adios, [
  'model' => 'Path/To/Your/Model',
]))->render();
```

## Examples

**Example #1:** The Tags input for the model category, where the column name is defined as the tag column.

```php
(new \ADIOS\Core\Views\Inputs\Tags($this->adios, [
  'model' => 'App/Widgets/Common/AddressBook/Models/Category',
  'tagColumn' => 'name'
]));
```

## Notes
