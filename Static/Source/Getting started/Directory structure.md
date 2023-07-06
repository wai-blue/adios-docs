# Directory structure

ADIOS application's root folder looks like this:

```
bin/                  // script files used for building the project
log/                  // app's log
upload/               // where your uploaded files are stored
src/                  // all source code of your application
  Widgets/            // app's widgets
    Customers/        // this is a widget
      Actions/        // implementation of controllers ("actions") of the widget
      Exceptions/     // custom exceptions of your widget
      Models/         // definition of models in the widget
      Templates/      // TWIG templates for the controllers
      Main.php        // "main" class of the widget
  Assets/             // all assets used in your app
    images/
    css/
    js/
  ConfigApp.php       // default configuration of your app
  Init.php            // initial configuration
vendor/               // libraries, packages, and dependencies
ConfigEnv.php         // environment-specific configuration of your app
```  

There are many in-built features like **routing** that respect this folder structure. This means that you don't have to use routers if your application doesn't require a highly complex structure. You just need to respect this folder structure.