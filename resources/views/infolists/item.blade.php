<ul
        role="list"
        @class([
            'flex flex-col text-sm text-gray-600 dark:text-gray-400 space-y-2 text-sm',
            match (true) {
                $isList => 'list-disc ps-5',
                default => '',
            },
        ])
>
    @if(filled($getState))
        @foreach ($getState as $item)
            @if($item instanceof \LaraZeus\ListGroup\Item\ListItem)
                @php
                    $item = $item->toArray();
                @endphp
            @endif
            @php
                $color = (isset($item['color']) && filled($item['color'])) ? $item['color'] : 'gray';
            @endphp
            <li x-tooltip.raw="{{ $item['tooltip'] ?? '' }}"
                    @style([
                        \Filament\Support\get_color_css_variables(
                            $color,
                            shades: [400, 500, 600],
                        ) => $color !== 'gray',
                    ])
                    @class([
                        match ($color) {
                            'gray' => 'text-gray-600',
                            default => 'text-custom-600',
                        },
                    ])
            >
                <x-filament::link
                    :weight="\Filament\Support\Enums\FontWeight::Normal"
                    :color="$color ?? 'gray'"
                    :target="(isset($item['isNewTab']) && $item['isNewTab']) ? '_blank' : '_self'"
                    :icon="$item['icon'] ?? null"
                    :href="$item['url']"
                >
                    {{ $item['label'] }}
                </x-filament::link>
            </li>
        @endforeach
    @endif
</ul>