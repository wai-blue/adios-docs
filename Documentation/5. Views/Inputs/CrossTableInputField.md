# CrossTableInputField

The CrossTableInputField Input is used to render and edit data of a foreign key model. 
## Property table

| Property | Type | Description |
|----------|------|-------------|
| model    | string | Path to the main model |
| cross_model | string | Path to a foreign model |
| cross_key_column | string | Name of the foreign key column on the main model |
| cross_key_value | string | Foreign key value |
| key_by | string | How should the values array be keyed, check the $itemValues property below  |
| columns | integer | Number of columns to be displayed |
| input_callback | string | Path to a function that renders an input |

## Usage

```php
(new \ADIOS\Core\Views\Inputs\CrossTableInputField($adios, [
	# view properties
]))
```
## Examples

**Example #1:**
```php
return (new \ADIOS\Core\Views\Inputs\CrossTableInputField($this->adios, [  
    'model' => 'App/Widgets/Common/AddressBook/Models/Contact',  
    'cross_model' => 'App/Widgets/Common/AddressBook/Models/Person',  
    'cross_key_column' => 'id_com_contact',  
    'cross_key_value' => '15',  
    'key_by' => 'id',  
    'input_callback' => 'ADIOS\Actions\UI\Debug::input_callback',
    'columns' => 4, 
    'items' => [  
      [ 'title' => 'ID' ],  
      [ 'title' => 'Contact ID' ],  
      [ 'title' => 'First Name' ],  
      [ 'title' => 'Last Name' ],  
      [ 'title' => 'Middle Name' ],  
      [ 'title' => 'Title Before' ],  
      [ 'title' => 'Title After' ],  
      [ 'title' => 'Email' ],  
      [ 'title' => 'Phone' ],  
      [ 'title' => 'LinkedIn' ]
    ]
]))->render();
```

In this example, ADIOS renders a CrossTableInputField of the `cross_model`, which is referenced in the column with the name `cross_key_column` in `model`.  It specifically chooses the model with id 15, as stated in `cross_key_value`. The final view will also be split into 4 columns, based on the `columns` property. The inputs rendered are defined by the `items` property.

![[CrossTableInputField_example_01.png]]

## input_callback function

To render a CrossTableInputField, you also need to code an input_callback function. You can use the following one to take inspiration. It is also required to render the examples.

```php
static function input_callback($view, $inputElementId, $itemUID, $itemValues): string  
{  
  $itemValues = array_values(array_values($itemValues)[0]);  
  $inputProperties = explode('_', $inputElementId); # UUIIDD_input_123  
  $inputNumber = $inputProperties[sizeof($inputProperties) - 1];  
  
  $input = new Input($view->adios, [  
    'type' => 'varchar',  
    'value' => $itemValues[$inputNumber]  
  ]);  
  
  return $input->render();  
}
```

> :bulb: It is recommended that this function is static. Although you have to code it yourself, it enables you to fully customize the input view and doesn't limit you to sticking to the given properties even when using prototype builder.

### $itemValues property

To display the data desired, the `input_callback` function gets all the retrieved data together as an array supplied in the `$itemValues` argument. All rows from the foreign model, that suit the given condition ( foreign key equals the `cross_key_value` view property, there can also be more ) are stored as items in the `$itemValues` array. Key to these items are the values of the `key_by` view property. 

The example function above gets rid of the keys, takes only the first array, then gets rid of the keys of that array as well and then displays always the `$inputNumber`-th value in the final array, where `$inputNumber` is the last number returned in the `$inputElementId` argument - it is the number of how many inputs have already been rendered, like variable `i` in a for cycle.

**An `$itemValues` array may look like this:**

```php
array(2) {
    [3] => array(11) {
        ["id"] => string(1) "3"
        ["id_com_contact"] => string(2) "15"
        ["first_name"] => string(6) "Auctor"
        ["last_name"] => string(8) "Molestie"
        ["middle_name"] => string(6) "Auctor"
        ["title_before"] => string(9) "Malesuada"
        ["title_after"] => string(13) "Ligula luctus"
        ["email"] => string(14) "2Ligula luctus"
        ["phone"] => string(6) "Mauris"
    },
    [7] => array(11) {
        ["id"] => string(1) "7"
        ["id_com_contact"] => string(2) "15"
        ["first_name"] => string(6) "Mauris"
        ["last_name"] => string(9) "Facilisis"
        ["middle_name"] => string(6) "Auctor"
        ["title_before"] => string(9) "Vulputate"
        ["title_after"] => string(8) "Molestie"
        ["email"] => string(10) "6Facilisis"
        ["phone"] => string(5) "Massa"
    }
}
```

> :bulb: Notice, that the two items are keyed by their `id` key values because the views property `key_by` was 'id'. They could also be keyed for example by their `first_name` key values *as long as these are unique.*