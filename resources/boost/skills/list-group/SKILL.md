---
name: zeus-list-group
description: Display lists or grouped link items with icons, colors, and tooltips in Filament infolists and tables using Lara Zeus List Group.
---

# Lara Zeus List Group

## Overview & Requirements
`lara-zeus/list-group` provides `ListEntry` (for Filament Infolists), `ListColumn` (for Filament Tables), and the `ListItem` item builder to render linked, icon-decorated, and tooltip-enabled item lists.

- **Package**: `lara-zeus/list-group` (Free / MIT)
- **Requirements**: PHP `^8.1`, `filament/filament` `^5.0`, `spatie/laravel-package-tools` `^1.16`

## Installation
```bash
composer require lara-zeus/list-group
```

Add the package's Blade views to your Tailwind / Filament theme content paths:

```js
'./vendor/lara-zeus/list-group/resources/views/**/*.blade.php',
```

## Configuration & Migrations
None. `ListGroupServiceProvider` registers only the `zeus-list-group` views. There are no config files or database migrations.

## Filament Panel Registration
None. This package provides Infolist and Table components rather than a `Plugin` class.

## Core Usage

### Infolist `ListEntry`
```php
use LaraZeus\ListGroup\Infolists\ListEntry;
use LaraZeus\ListGroup\Item\ListItem;

ListEntry::make('items')
    ->heading('Quick Links')
    ->list() // optional: adds list-disc styling (or ->grouped() for bordered card list)
    ->state(fn ($record): array => [
        ListItem::make()
            ->id(1)
            ->label('Docs')
            ->url('https://larazeus.com')
            ->icon('heroicon-o-book-open')
            ->color('info')
            ->tooltip('Open documentation')
            ->openInNewTab(true),
        ListItem::make()
            ->id(2)
            ->label('Issues')
            ->url('#issues')
            ->color('danger'),
    ])
```

### Table `ListColumn`
`LaraZeus\ListGroup\Table\ListColumn` renders each `ListItem` (or associative array) as a clickable `<x-filament::badge>` link in a table cell:

```php
use LaraZeus\ListGroup\Item\ListItem;
use LaraZeus\ListGroup\Table\ListColumn;

ListColumn::make('links')
    ->state(fn ($record): array => $record->links->map(fn ($link) =>
        ListItem::make()
            ->id($link->id)
            ->label($link->title)
            ->url($link->url)
            ->icon('heroicon-o-link')
            ->color('primary')
    )->all())
```

## Common Pitfalls & Anti-Patterns
- **Omitting `->id(...)` on `ListItem`**: `$id` has no default value on `ListItem`, so `toArray()` throws an uninitialized property error unless `->id(...)` is called.
- **Omitting `->url(...)` on `ListItem`**: The Blade views access `$item['url']` directly; always provide `->url(...)` (e.g., `'#'` if non-navigating).
- **Using `->iconColor(...)`**: Deprecated on `ListItem`; use `->color(...)` instead.
- **Returning a single `ListItem` instead of an array/collection**: `state()` must return an iterable of `ListItem` instances (or associative arrays with `label`, `url`, `color`, `icon`, `tooltip`, `isNewTab`).
