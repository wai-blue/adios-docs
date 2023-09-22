# Prototype Builder

ADIOS is able to generate a full-fledged application based on a prototype written in YML files. This is thanks to the
Prototype Builder php script

## Arguments

| Argument       | Description                                                     |
|----------------|-----------------------------------------------------------------|
| input          | Path to YML prototype file                                      |
| autoloader     | Path to composer's autoloader file                              |
| output-folder  | Path to the folder, where you want your application to be built |
| salt           | Session salt for the application's session data                 |
| log            | Path to a log file                                              |
| root-url       | Root url of your application                                    |
| rewrite-base   | Base URL path                                                   |
| db-host        | MySQL server host                                               |
| db-port        | MySQL server port                                               |
| db-user        | MySQL server user                                               |
| db-password    | MySQL server password                                           |
| db-name        | Database name                                                   |
| admin-password | ADIOS default password for administrator account                |

## Build script example

A simple build script may look for example like this:

**Windows**
```shell
php .\vendor\ADIOS\src\CLI\build-prototype.php ^
  --input ./prototype/index.json ^
  --rewrite-base /prototype/ ^
  --root-url http://localhost/prototype ^
  --output-folder ./src ^
  --db-host localhost ^
  --db-port 3306 ^
  --db-user root ^
  --db-name prototype ^
  --admin-password abcde ^
```

**Linux**
```shell
php ./vendor/wai-blue/adios/src/CLI/build-prototype.php \
  --input ./prototype/index.json \
  --rewrite-base /prototype/ \
  --root-url http://localhost/prototype \
  --output-folder ./src \
  --db-host localhost \
  --db-port 3306 \
  --db-user bladeerp \
  --db-name bladeerp \
  --admin-password abcd
```

## Prototypes

### Introduction

Prototypes are YML files that describe the base functionality of an ADIOS application and also function as input for the
Prototype builder.

To create a prototype, begin by defining any necessary environment variables at the top of the prototype.
Ensure you have already specified them in your build script to avoid duplication.
```yml
ConfigEnv:
  db:                           # database credentials
    host: localhost
    login: root
    password: ""
    name: example_crm
  globalTablePrefix: proto      # prefix of SQL tables created by ADIOS
  rewriteBase: /prototype_crm/
ConfigApp:
  applicationName: Prototype CRM
  defaultAction: Home/Dashboard # Homepage after login
```

Next you can define your widgets - groups of models. For each model within a widget, ADIOS generates an SQL table
(based on your model specification) with basic CRUD functionality. After your application has been built by
ADIOS, you can further customise your application by programming callbacks etc. within the already generated files.
ADIOS saves you a lot of time by being able to generate the basic functionality itself, without you, the developer,
having to code everything yourself.

We advise you to take a look at our sample prototypes found
[here](https://github.com/wai-blue/ADIOS/tree/65f43186fc392140b1df3c2ed60db9a844137a24/docs/Prototype/examples)
to learn more about writing prototypes.

**Note:** Prototypes can also be written in JSON files, but it is recommended that you write them in YML files
instead.

### Defining models

Models can be defined inside widgets and can have various properties:

| Property              | Description                                   |
|-----------------------|-----------------------------------------------|
| sqlName               | Model SQL database name                       |
| urlBase               | URL to view all columns in the model          |
| lookupSqlValue        | Value to be returned on lookups               |
| tableTitle            | Title of the table showing all rows           |
| formTitleForInserting | Title of the form for inserting a new row     |
| formTitleForEditing   | Title of the form for editing an existing row |
| columns               | SQL table columns definitions                 |
| crud                  | Paths to actions which take care of CRUD      |
| indexes               | SQL indexes specification                     |

#### Parameters of each object under `columns` property:

The key of the objects define the names of the columns themselves.

| Property    | Description                                    |
|-------------|------------------------------------------------|
| title       | Column title when displaying in CRUD           |
| type        | ADIOS data type in SQL                         |
| byte_size   | Max byte size                                  |
| required    | Whether the column must be filled              |
| show_column | Whether the column should be displayed in CRUD |

**Note:** If the column is of `type: lookup`, you should also add the following parameters:

| Property           | Description                         |
|--------------------|-------------------------------------|
| model              | Path to the target model for lookup |
| foreignKeyOnUpdate | Behavior on foreign key update      |
| foreignKeyOnDelete | Behavior on foreign key delete      |

**Note:** If the column is of `type: int`, you can also make it into ENUM and add the parameter `enum_values`

#### `crud` property of a model looks like this:

```yml
crud:
  browse:
    action: Path/To/Browse/Action
  add:
    action: Path/To/Add/Action
  edit:
    action: Path/To/Edit/Action
```

It is however optional (all 3 parameters of it) and may also be generated automatically if not specified at all

#### Parameters of objects under `indexes` property:
The key of the objects define the name of the index.

| Property           | Description                       |
|--------------------|-----------------------------------|
| type               | Defines the type of the SQL index |
| columns            | Array of columns involved         |

### Defining actions

Actions are a way of interpreting data in ADIOS. They can be defined inside Widgets under the `actions:` property.
They are divided into 2 groups based on the `phpTemplate` parameter.

**Note:** If you want ADIOS to generate PHP code in a prototype, wrap it in these clauses: `{php php}`

- `phpTemplate: TwigRender`:

This `phpTemplate` allows you to render custom twig templates coded in the prototype.

**Usage:**

```yml
Model/ActionName:
  phpTemplate: TwigRender
  twig: >
    <div>
      Example twig template
      <div>You can also insert PHP parameters = {{ customerId }}</div>
    </div>
  params:
    customerId: "{php $this->params['customerId'] php}"
```

- `phpTemplate: ViewRender`:

This `phpTemplate` allows you to render various built-in ADIOS UI elements. You may specify which one using the `view`
property. Most popular views are Form, Table, Grid, Html, Chart etc. You can find more information about them in the
category `5. Views`

**Usage:**

```yml
Model/ActionName:
  phpTemplate: ViewRender
  view: ViewName
  params:
    displayMode: inline
    
    # View specific properties
    # ...
```

**Note:** The `displayMode:` property determines, how the action should be displayed. Supported modes are: `inline` or
`window` 

## Examples

**Example #1:** Basic widget with a model

```yml
Customers:
  faIcon: fa-address-book
  sidebar:
    Customers:
      url: Customers
  models:
    Customer:
      sqlName: customers
      urlBase: Customers
      tableTitle: Customers
      formTitleForInserting: New customer
      formTitleForEditing: Edit customer
      lookupSqlValue: "{%TABLE%}.name"
      columns:
        name:
          type: varchar
          title: Customer name
          required: true
        priority:
          type: int
          title: Priority
          enum_values:
            - High
            - Middle
            - Low
          show_column: true
```
**Example #2:** Model with a lookup column

```yml
Customer:
  sqlName: customers
  urlBase: company/customers
  tableTitle: Customers
  formTitleForInserting: New Customer
  formTitleForEditing: Customer

  crud:
    browse:
      action: customers/Browse

  columns:
    name:
      type: varchar
      title: Name
      byte_size: 10
      required: true
    role:
      type: lookup
      title: Customer role
      required: true
      model: Company/CustomerRoles
      foreignKeyOnUpdate: CASCADE
      foreignKeyOnDelete: RESTRICT
    balance:
      type: int
      title: Customer Balance
      required: true
```
