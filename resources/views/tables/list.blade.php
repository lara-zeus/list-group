<div>
    @php
        $getState = $getState();
    @endphp

    <ul
        role="list"
        class="max-w-xs flex text-sm text-gray-600 dark:text-gray-400 ps-5 gap-2 text-sm"
    >
        @if(filled($getState))
            @foreach ($getState as $item)
                @if($item instanceof \LaraZeus\ListGroup\Item\ListItem)
                    @php
                        $item = $item->toArray();
                    @endphp
                @endif
                <li>
                    <a
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
