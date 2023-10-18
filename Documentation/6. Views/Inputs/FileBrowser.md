# FileBrowser

The FileBrowser view alows you access, browse and modify your Upload folder.

## Properties

The FileBrowser view supports various properties that can be utilized to meet functionality requirements:

| Property | Type   | Default value | Description                                                             |
| -------- | ------ | ------------- | ----------------------------------------------------------------------- |
| mode     | string |               | Mode for the file browser **Options**: `[select' , 'browse']`           |
| subdir   | string |               | Relative path to a subdirectory in the Upload folder                    |
| onchange | string |               | Custom Javascript code executing when selecting a file in `select` mode |
| value    | string |               | Path to a file                                                          |

## Usage

```php
(new \ADIOS\Core\Views\Inputs\FileBrowser($this->adios, []))->render();
```

## Examples

**Example #1:** File browser in the `browse` mode

```php
(new \ADIOS\Core\Views\Inputs\FileBrowser($this->adios, [
  'mode' => 'browse'
]))
```

**Example #2:** File browser in the `select` mode pointing to an image subdirectory

```php
(new \ADIOS\Core\Views\Inputs\FileBrowser($this->adios, [
  'mode' => 'select',
  'subdir' => '/img'
]))
```

**Example #3:** File browser with a preselected file 

```php
(new \ADIOS\Core\Views\Inputs\FileBrowser($this->adios, [
  'value' => '/file.txt',
]))
```

## Notes
- If the file browser has the `subdir` parameter set, the user won't be able to move up the file directory, only to the set folder's subdirectories