# ADIOS - documentation

You've arrived at the right place to explore the documentation for the [ADIOS](https://github.com/wai-blue/ADIOS) framework.

We prepared for you ADIOS documentation in two versions, now it's up to you, which option you use:

1. [static website](https://wai-blue.github.io/adios-docs/html)
2. [adios-docs repository](https://github.com/wai-blue/adios-docs)

## About ADIOS

ADIOS is a lightweight rapid application development framework for PHP 8 based on the MVC architecture, designed to simplify the development of robust CRM applications. It stands on the concept of being a framework with a small footprint, prioritizing efficiency, performance, and speed as key features. With only a little coding, you can create application with complete CRUD functionality, containing complex inputs such as dates, WYSIWYG editors, or autocomplete, and able to manage complex data structures.

One of the notable advantages of ADIOS is the elimination of router configuration. By simply creating a file, the routing table updates automatically.

ADIOS provides built-in UI components for CRUD operations, removing the need for importing additional components. UI/Table and UI/Form components are are in-built.

Thanks to the powerful form templating engine in ADIOS you can easily create complex forms. Whether it's tabs, grids, inputs, or dashboards, you can achieve them with just a few lines of code.

You have free hands over customization of your application.

If you're curious about how ADIOS compares to other frameworks, we prepared a detailed comparison between ADIOS and Laravel in the [Framework comparison.md](Documentation/1.%20Introduction/Framework-comparison.md) file.

## Create your first CRM application (in a few minutes)

To begin your journey with ADIOS, follow these steps:  

1. Go to the desired location, where you want to create or save your project within it.
2. Now you need only these simple commands to create your first CRM application:

For linux:
```
composer create-project wai-blue/adios-app
cd adios-app
./bin/build.sh
```

For windows:
```
composer create-project wai-blue/adios-app
cd adios-app
cd bin
build.bat
```

This will create an ADIOS application based on the [AddressBook.yml prototype](resources/examples/prototype-builder-yaml/AddressBook.yml) which you can further customize.

Sounds interesting? The documentation will always be available here, ready for you.

## Want to contribute?

ADIOS is an open-source MIT licensed framework. You can use it for free for both personal and commercial projects.

We will be happy for any contributions to the project:

  * UI componets
  * Language dictionaries
  * Skins
  * Plugins
  * Prototype builder templates
  * Sample applications
  * Documentation
  * Unit tests
  * And anything else...

Enjoy!

## Want to donate? Buy us a beer.

Thank you :-)
