# FormComplex

```php
\ADIOS\Core\Views\FormComplex\Template->render() {
  foreach (items) {
    if (item is string) => Input
    else adios->view->create()
  }
}
```

```php
\ADIOS\Core\Views\FormComplex\Column->render() {
  $html = "<column>";
  $html .= parent::render();
  $html .= "</column>";
}
```

```php
$theForm = new \ADIOS\Core\Views\FormComplex(
  $adios,
  [
    'model' => 'App/Widgets/AddressBook/Models/Contact',
    'template' => [
      [
        'view' => \ADIOS\Core\Views\FormComplex\Column::class extends Template,
        'params' => [
          'cssClass' => 'col-8',
          'items' => [
            [
              'view' => \ADIOS\Core\Views\FormComplex\Tabs::class extends Template,
              'params' => [
                'cssClass' => '...',
                'title' => 'Basic information',
                'items' => [
                  [
                    'view' => \ADIOS\Core\Views\FormComplex\Group::class extends Template,
                    'params' => [
                      'title' => 'Full name',
                      'items' => [
                        'first_name',
                        'middle_name',
                        'last_name',
                        'id_com_contact_person:LOOKUP:title_before'
                      ]
                    ]
                  ],
                  [
                    'view' => \ADIOS\Core\Views\FormComplex\Group::class extends Template,
                    'params' => [
                      'title' => 'Contact details',
                      'items' => [
                        'email',
                        [
                          'view' => \ADIOS\Core\Views\Input::class,
                          'params' => [
                            'column' => 'email',
                          ],
                        ]
                        'phone'
                      ]
                    ],
                  ],
                  [
                    'view' => \ADIOS\Core\Views\Table::class,
                    'params' => [
                      'model' => \App\Widgets\AddressBook\Models\ContactAddress::class,
                      'where' => [
                        'id_contact',
                        '=',
                        $this->params['id'],
                      ]
                    ]
                  ]
                ]
              ]
            ]
          ]
        ]
      ]
    ]
  ]
);
```

```yaml
view: \ADIOS\Core\Views\FormComplex
template:
  - view: \ADIOS\Core\Views\FormComplex\Column
    params:
      cssClass: col-8
      items:
        - view: \ADIOS\Core\Views\FormComplex\Tabs
          title: Contact details
          items:
            - first_name
            - last_name
```
