# Window

The Window view allows you to create side windows with customizable content, such as entry details, lookups and more.

## Parameters

The Window view supports various parameters that can be utilized to meet specific design and functionality requirements:

| Property | Type   | Default value | Description                                          |
| -------- | ------ | ------------- | ---------------------------------------------------- |
| title    | string | Window        |                                                      |
| titleRaw | string |               |                                                      |
| subtitle | string | ''            |                                                      |
| content  | string | ''            | Html string (This includes Html from rendered views) |
| cssClass | string | ''            | Custom css class of the Window view                  |


## Usage

```php
$this->adios->view->Window([])->render();
```

## Functions

### setContent($content)

Sets the content inside the Window view. This can be any Html or **rendered** ADIOS view.

**Example:** Window view with a text field

```php
$this->adios->view->Window([
  "content" => $this->adios->view->Input([
    "type" => "text"
  ])->render(),
]);
```

### setTitle(string $title)

Sets the title.

**Example:** Window view with a title

```php
$this->adios->view->Window([])->setTitle("Example");
```
### setSubtitle(string $subtitle)

Sets the subtitle.

**Example:** Window view with a subtitle

```php
$this->adios->view->Window([])->setSubtitle("Example");
```

### setCloseButton(\ADIOS\Core\Views\Button $closeButton)

Sets the close button for the Window view.

**Example:** Window view with a close button

```php
$window = $this->adios->view->Window([]);
$window->setCloseButton(
      $this->adios->view->Button([
      'type' => 'close',
      'title' => 'close',
      'onclick' => "window_close('{$window->params['uid']}');",
  ]));
```

### setHeaderLeft(array $viewObjects = [])

Creates views inside the header aligned to the left

### setHeaderRight(array $viewObjects = [])

Creates views inside the header aligned to the right
