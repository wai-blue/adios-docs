# Introduction

This chapter will focus on the basic principles of the ADIOS framework. Like many other frameworks, ADIOS uses the MVC (Model-View-Controller) architecture. The principles of this architecture closely resemble those found in other applications we are familiar with. It is important to mention that ADIOS is a lightweight framework for rapid application development, which has brought several changes to this architecture, that we will further discuss in order to understand the framework.

## Widgets

A widget in ADIOS is an standalone piece of code that resides within your application. Every widget implements *models*, *views* and *controllers*, that are needed for its functionality. With ADIOS, you have the flexibility to easily copy widgets from other apps or delete them as needed, while the framework takes care of managing the related dependencies and processes.

Every widget implements *models*, *views* and *controllers*:

  * models are implemented in the Models/ folder
  * views are implemented in the Templates/ folder
  * controllers are implemented in Actions/ folder

## ADIOS view of MVC architecture

**Models**: This component handles data used in your application. It helps to retrieve the data from the database and then perform some operation.

**Actions**: In ADIOS, controllers are referred to as 'actions'. When creating a new widget, certain tasks need to be performed by the widget, such as rendering new HTML output and handling user interaction. 'Actions' in ADIOS are in principle the same as controllers, but their responsibilities are divided across multiple files. Despite having multiple files, there is no need to configure routing manually for each action. ADIOS automatically assigns a URL to each action based on the widget's name and the relative path to the action's file within the Actions/ folder.

**Views**: This component contains the code responsible for displaying data to the user interface on the user's browser.


For more information about the basics of ADIOS, please refer to the following links within this chapter:

[Bacis programming concepts](Bacis%20programming%20concepts.md)
[Loader](Loader.md)
[Routing](Routing.md)
[Action (the controller)](Action%20(the%20controller).md)
[View](View.md)
[Model](Model.md)
[Permissions.md](Permissions.md)
[Widget.md](Widget.md)