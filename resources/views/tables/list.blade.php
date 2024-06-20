<div>
    @php
        $getState = $getState();
    @endphp

    <ul
        role="list"
        class="max-w-xs flex text-gray-600 dark:text-gray-400 gap-2 text-sm"
    >
        @if(filled($getState))
            @foreach ($getState as $item)
                @if($item instanceof \LaraZeus\ListGroup\Item\ListItem)
                    @php
                        $item = $item->toArray();
                    @endphp
                @endif
                <li x-data>
                    <a x-tooltip.raw="{{ $item['tooltip'] ?? '' }}"
                        class="flex items-center space-x-2 rtl:space-x-reverse"
                        target="{{ (isset($item['isNewTab']) && $item['isNewTab']) ? '_blank' : '_self' }}"
                        href="{{ $item['url'] }}"
                    >
                        <x-filament::badge
                            :icon="$item['icon'] ?? null"
                            :color="$item['color'] ?? 'gray'"
                        >
                            {{ $item['label'] }}
                        </x-filament::badge>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</div>
