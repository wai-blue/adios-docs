# Chart

The Chart view displays data in charts using the [Chart.js](https://www.chartjs.org/) Javascript library.

## Properties

The Chart view supports various properties that can be used to meet its functionality requirements:

| Property                | Type          | Default value | Description                                                        |
|-------------------------|---------------|---------------|--------------------------------------------------------------------|
| type                    | string        | 'pie'         | pie, bar, line, radar, bubble, doughnut, polarArea, radar, scatter |
| datasets                | array         | []            | Array of dataset objects                                           |

You can also provide additional properties that will be utilized by the Chart.js object at a later stage, such as the
`options` property. For a deeper understanding of Chart.js functionality, please refer to its documentation. Everything
you define in properties will also be passed to the Chart.js object.

### Dataset object

You may configure the view to display static or dynamic data. These properties of datasets are used exclusively by
ADIOS.

**1.1 Display dynamic data based on a model**

| Proeprty    | Type    | Default value | Description                                                           |
|-------------|---------|---------------|-----------------------------------------------------------------------|
| model       | string  | ''            | Data source for the chart                                             |
| labelColumn | object  | []            | Contains column specification for chart labels. Look at **1.2 Usage** |
| dataColumns | array   | []            | Array of column names                                                 |
| where       | array   | []            | Where condition for choosing data                                     |
| function    | string  | ''            | Determines how the data should be processed                           |
| limit       | int     | 10            | Sets the limit on how many rows of data may be used for the chart     |

**Note:** If you don't want to specify dynamic labels, you may also define only a `labels` property instead of
labelColumn and pass to it an array of labels (strings).

**1.2 Usage** An example dataset may look like this:

```php
[
'model' => 'Path/To/Model',
'function' => '', # optional, supports: count, sum
'labelColumn' => [ 
  'column' => 'labels_column'
  # if the column is a foreign key, you can also specify:
  # 'model' => 'Path/To/ForeignModel'  : Target model based on the foreign key
  # 'lookup' => 'name'                 : Which column are you looking for on the target model
  ],
'dataColumns' => [
  'data_column' => ['type' => 'data']
  ],
'where' => [
  'model_id',
  '=',
  '1'
  ]
]
```

**2.1 Display static data**

| Proeprty | Type   | Default value | Description     |
|----------|--------|---------------|-----------------|
| data     | array  | []            | Array of data   |
| labels   | array  | []            | Array of labels |

**Note:** In this case, you may not use the `labelColumns` property instead of `labels`.

**2.2 Usage** An example dataset may look like this:

```php
[
'data' => [ /* ... */ ],
'labels' => [ /* ... */ ]
]
```

## Examples

**Example #1:** Simple static chart with styling properties for Chart.js library

```php
$this->adios->view->Chart([
  'type' => 'line',
  'datasets' => [
    [
      'data' => [1.00, 0.98, 0.99, 1.01, 1.01, 1.00],
      'labels' => ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6'],
      
      'label' => 'Exchange rate development',
      'fill' => 'true',
      'hoverOffset' => 4,
      'backgroundColor' => ['rgb(255, 99, 132)']
    ]
  ]
])->render();
```

**Example #2:** Dynamic chart based on the ExchangeRate model

```php
$this->adios->view->Chart([
      'type' => 'line',
      'datasets' => [
        [
          'model' => 'App/Path/To/Model',
          'labelColumn' => ['column' => 'date'],
          'dataColumns' => [['rate' => ['type' => 'data']]],
          'where' => ['currency_id', '=', '1'],

          'label' => 'Exchange rate development'
        ]
      ]
    ])->render();
```

**Example #3:** Chart.js example 
[combo bar/line chart](https://www.chartjs.org/docs/latest/samples/other-charts/combo-bar-line.html) recreated in ADIOS

```php
$this->adios->view->Chart([
      'type' => 'bar',
      'datasets' => [
        [
          'label' => 'Dataset 1',
          'data' => [10,30,40,-20,20,10,70],
          'borderColor' => 'rgb(255, 99, 132)',
          'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
          'backgroundColor' => 'rgb(255, 99, 132, 0.5)',
          'order' => 1,
        ],
        [
          'label' => 'Dataset 2',
          'data' => [50, 32, 68, 95, -20, -50, 0],
          'borderColor' => 'rgb(99, 132, 255)',
          'labels' => [], # Labels are always defined in the first dataset, but this property must stay
          'backgroundColor' => 'rgb(99, 132, 255, 0.5)',
          'type' => 'line',
          'order' => 0,
        ],
      ],
    ])->render();
```

## Notes
