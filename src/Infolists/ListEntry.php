<?php

namespace LaraZeus\ListGroup\Infolists;

use Filament\Infolists\Components\Entry;
use Filament\Schemas\Components\Concerns\HasHeading;
use Filament\Support\Concerns\HasExtraAlpineAttributes;

class ListEntry extends Entry
{
    use HasExtraAlpineAttributes;
    use HasHeading;

    protected string $view = 'zeus-list-group::infolists.list';

    protected bool $grouped = false;

    protected bool $list = false;

    public function grouped(bool $condition = true): static
    {
        $this->grouped = $condition;

        return $this;
    }

    public function isGrouped(): bool
    {
        return $this->grouped;
    }

    public function list(bool $condition = true): static
    {
        $this->list = $condition;

        return $this;
    }

    public function isList(): bool
    {
        return $this->list;
    }
}
