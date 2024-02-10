<?php

namespace LaraZeus\ListGroup\Infolists;

use Filament\Infolists\Components\Component;
use Filament\Support\Concerns;
use Filament\Support\Concerns\HasHeading;

class ListEntry extends Component
{
    use Concerns\HasExtraAlpineAttributes;
    use HasHeading;

    protected string $view = 'zeus-list-group::infolists.list';

    protected bool $grouped = false;

    protected bool $list = false;

    final public function __construct(?string $label = null)
    {
        $this->label($label);
    }

    public static function make(?string $label = null): static
    {
        $static = app(static::class, ['label' => $label]);
        $static->configure();

        return $static;
    }

    public function grouped(bool $condition = true): static
    {
        $this->grouped = $condition;

        return $this;
    }

    public function isGrouped():bool
    {
        return $this->grouped;
    }

    public function list(bool $condition = true): static
    {
        $this->list = $condition;

        return $this;
    }

    public function isList():bool
    {
        return $this->list;
    }
}
