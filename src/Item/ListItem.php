<?php

namespace LaraZeus\ListGroup\Item;

use Illuminate\Contracts\Support\Arrayable;

final class ListItem implements Arrayable
{
    protected int | string $id;

    protected string $label = '';

    protected ?string $tooltip = null;

    protected ?string $icon = null;

    protected ?string $color = null;

    // @deprecated use '->color('warning')' instead
    protected ?string $iconColor = null;

    protected ?string $url = null;

    protected ?string $badge = null;

    protected ?bool $openInNewTab = false;

    public static function make(): ListItem
    {
        return new ListItem;
    }

    public function id(int | string $id): ListItem
    {
        $this->id = $id;

        return $this;
    }

    public function label(string $label): ListItem
    {
        $this->label = $label;

        return $this;
    }

    public function icon(string $icon): ListItem
    {
        $this->icon = $icon;

        return $this;
    }

    public function tooltip(string $tooltip): ListItem
    {
        $this->tooltip = $tooltip;

        return $this;
    }

    public function color(string $color): ListItem
    {
        $this->color = $color;

        return $this;
    }

    public function url(string $url): ListItem
    {
        $this->url = $url;

        return $this;
    }

    public function badge(string $badge): ListItem
    {
        $this->badge = $badge;

        return $this;
    }

    public function openInNewTab(bool $condition): ListItem
    {
        $this->openInNewTab = $condition;

        return $this;
    }

    /**
     * @deprecated use '->color('warning')' instead
     *
     * @return $this
     */
    public function iconColor(string $color): ListItem
    {
        $this->iconColor = $color;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'label' => $this->label,
            'tooltip' => $this->tooltip,
            'icon' => $this->icon,
            'iconColor' => $this->iconColor,
            'color' => $this->color,
            'url' => $this->url,
            'badge' => $this->badge,
            'isNewTab' => $this->openInNewTab,
        ];
    }
}
