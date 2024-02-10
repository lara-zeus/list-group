---
title: Usage
weight: 4
---

## In Forms

to use @zeus list-group in your infolist:

```php
\LaraZeus\ListGroup\Infolists\ListEntry::make('items')
    // show the item list using 'list-disc'
    ->list()
    // set state
    ->state(function ($record) {
        ListItem::make()
            ->id(1)
            ->url('#1')
            ->color('info')
            ->label('Hi'),
        ListItem::make()
            ->id(2)
            ->color('danger')
            ->url('#2')
            ->label('Hi2'),
        }
    ),
,
```