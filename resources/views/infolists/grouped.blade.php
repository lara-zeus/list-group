<div
    role="list"
    @class([
        'flex flex-col rounded-lg divide-y border border-gray-200 shadow-sm',
        match (true) {
            $isList => 'list-disc',
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
            <div class="flex py-2 px-4 bg-white first:rounded-t-lg last:rounded-b-lg dark:bg-gray-900 dark:border-gray-700">
                <x-filament::link
                    :weight="\Filament\Support\Enums\FontWeight::Normal"
                    :color="$color ?? 'gray'"
                    :target="(isset($item['isNewTab']) && $item['isNewTab']) ? '_blank' : '_self'"
                    :icon="$item['icon'] ?? null"
                    :href="$item['url']"
                >
                    {{ $item['label'] }}
                </x-filament::link>
            </div>
        @endforeach
    @endif
</div>