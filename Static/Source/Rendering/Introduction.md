# Introduction

When designing your application in .yml files used by the [Prototype builder](Documentation/3.%20Prototype%20builder/Introduction.md), you will utilize rendering components. These components are individual elements that enable you to assemble your desired page.

## ADIOS rendering components

ADIOS provides all neccessary rendering components necessary for building your robust CRM applications. Here is list of all supported components:

1. [Button](Documentation/4.%20Rendering/Button.md)
2. [Form](Documentation/4.%20Rendering/Form.md)
3. [Input](Documentation/4.%20Rendering/Input.md)
4. [Table](Documentation/4.%20Rendering/Table.md)
5. [Tabs](Documentation/4.%20Rendering/Tabs.md)
6. [View](Documentation/4.%20Rendering/View.md)

Many other components are currently in progress...

## How to use

Every component in ADIOS is designed to be easy to use. The initialization of a new component consists of defining a render method and a set of parameters that define its complex functionality. In this documentation, we will discuss each of them and provide illustrative examples. If you haven't done so yet, we recommend dedicating some time to the [Prototype builder](Documentation/3.%20Prototype%20builder/Introduction.md) chapter, where we discussed the main principles of building a new application, as you will use these components in it.

```
RenderMethod: NameOfComponent
    Params:
        List of desired parameters of new component
```


## Render methods

Each component can be rendered using a specific render method, and the method used depends on the intended usage of the component. ADIOS offers the following rendering methods for use:

1. [View](###View)
2. [Action](###Action)

### View

The View render method in ADIOS immediately renders a component on the screen. 

```
array (
    'view' => 'Button',
        'params' => [
            'title' => 'button title',
            'text' => 'some text in button',
        ],
    ),
```

### Action

Since the Router always concludes with an Action, this render method proceeds through the HTTP request and then renders a new View for the component.

```
array (
    'action' => 'Button',
        'params' => [
            'title' => 'button title',
            'text' => 'some text in button',
        ],
    ),
```