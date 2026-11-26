## Lara Zeus List Group (`lara-zeus/list-group`)

Provides Filament Infolist (`ListEntry`) and Table (`ListColumn`) components to render grouped or bulleted lists of linked items with icons, tooltips, and colors via `ListItem`.

### Key Classes
- Infolist Entry: `LaraZeus\ListGroup\Infolists\ListEntry` (extends `Filament\Infolists\Components\Entry`, supports `heading()`, `grouped()`, `list()`)
- Table Column: `LaraZeus\ListGroup\Table\ListColumn` (extends `Filament\Tables\Columns\Column`, renders items as badge links)
- Item Builder: `LaraZeus\ListGroup\Item\ListItem` (`Arrayable` DTO with `make()`, `id()`, `label()`, `url()`, `icon()`, `color()`, `tooltip()`, `badge()`, `openInNewTab()`)
- ServiceProvider: `LaraZeus\ListGroup\ListGroupServiceProvider` (package name: `zeus-list-group`, loads views)
- No Filament `Plugin` class, config file, or migrations.

### Rules & Anti-Patterns
- **Always call `->id(...)` and `->url(...)` on `ListItem`**: `ListItem::$id` is uninitialized by default (calling `toArray()` without `->id()` throws an `Error`), and the Blade views read `$item['url']` directly without a null-coalescing fallback.
- **Return an array of `ListItem` (or arrays) from `->state(...)`**: `ListEntry` and `ListColumn` iterate over `$getState`.
- **Avoid deprecated `ListItem::iconColor()`**: Use `->color(...)` instead.
- **Include package views in Tailwind content**: Ensure `./vendor/lara-zeus/list-group/resources/views/**/*.blade.php` is scanned by your Filament theme/Tailwind setup so utility classes compile.
