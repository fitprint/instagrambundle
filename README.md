# Instagram bundle

Бандл для создания виджетов Инстаграма

```twig
{{ render(controller('FitInstagramBundle:Default:widget', {
    template: 'FitWebBundle:Web/Widget:_instagram.html.twig',
    application: 'new_shape_russia',
    count: 9
})) }}
```

## Установка 

```
fit_instagram:
    applications:
        new_shape_russia:
            client_id: %instagramm application id%
```