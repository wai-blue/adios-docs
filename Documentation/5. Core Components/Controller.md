# Controller
Core implementation of ADIOS controller.
Controller is fundamendal class for generating HTML content of each ADIOS call.
Controllers can be rendered using Twig template or using custom render() method.

## Properties

The Controller class supports various class variables that can be utilized to meet specific design and functionality requirements:

| Property                               | Type   | Default value | Description|
| -------------------------------------- | ------ | ------------- | ---- |
| adios                                  | ?\ADIOS\Core\Loader   | null            | Reference to ADIOS object|
| gtp                                    | ?string | null            | Shorthand for "global table prefix" |
| params                                    | array | []            | Array of parameters (arguments) passed to the controller |
| permissionsByUserRole | array | []            | TRUE/FALSE array with permissions for the user role |
| requiresUserAuthentication | bool | TRUE            | If set to FALSE, the rendered content of controller is available to public |
| hideDefaultDesktop | bool | FALSE            | If set to TRUE, the default ADIOS desktop will not be added to the rendered content |
| cliSAPIEnabled | bool | TRUE            | If set to FALSE, the controller will not be rendered in CLI |
| webSAPIEnabled | bool | TRUE            | If set to FALSE, the controller will not be rendered in WEB |
| dictionary | array  | []            | TODO |
| name                              | string | ''            | Full name of the controller. |
| shortName                              | string | ''            | Short name of the controller. Useful for debugging purposes |
| uid                              | string | ''            | Unique ID generated for the controller |
| controller                              | string | ''            | Language dictionary for the context of the controller |
| myRootFolder                              | string | ''            | Root folder of the controller |
| twigTemplate                              | string | ''            | Twig template file that the controller belongs to |

## Functions

### init()

Initializes the controller.

```php
$controller->init();
```
### overrideConfig($config, $params)

Used to change the current ADIOS configuration before calling preRender(). Returns the changed ADIOS configuration.

```php
$controller->overrideConfig($config, $params);

Example:
public static function overrideConfig($config, $params = [])
{
  $config['hide_default_desktop'] = TRUE;
  return $config;
}
```
### renderJson()

If the controller shall only return JSON, this method must be overriden.

```php
$controller->renderJson();
```
### prepareViewAndParams()

If the controller shall return the HTML of the view, this method must be overriden. Returns the view to be used to render the HTML.

```php
$controller->prepareViewAndParams();
```
### preRender()

Used to return values for TWIG renderer. Applies only in TWIG template of the controller. Returns the values for controller's TWIG template.

```php
$controller->preRender();

Example:
public function preRender()
{
  $this->cascada->setTwigParams([
    "idLogin" => $id,
  ]);
}
```
### onAfterDesktopPreRender($params)

Callback to modify TWIG params for Desktop.twig template. Returns the values for controller's TWIG template.

```php
$controller->onAfterDesktopPreRender($params);

Example:
public function onAfterDesktopPreRender($params)
{
  $params["searchButton"] = [
    "display" => TRUE
  ];
  return $params;
}
```
### translate(string $string, array $vars = [])

Shorthand for ADIOS core translate() function. Uses own language dictionary. Returns a translated string.

```php
$controller->translate("Example text");
```
### render()

Renders the content of requested controller using Twig template. In most cases is this method overriden.

```php
$controller->render();

OR 

public function render() {
  /*Your
  Code*/
}
```
