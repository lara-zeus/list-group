<div>
    @php
        $isGrouped = $isGrouped();
        $isList = $isList();
        $heading = $getHeading();
    @endphp

    @if(filled($heading))
        <h4>{{ $heading }}</h4>
    @endif

    <ul role="list"
            @class([
                'max-w-xs flex flex-col text-sm text-gray-600 dark:text-gray-400 ps-5 space-y-2 text-sm',
                match (true) {
                    $isList => 'list-disc',
                    default => '',
                },
            ])>
        @foreach ($getState() as $item)
            @if($item instanceof \LaraZeus\ListGroup\Item\ListItem)
                @php
                    $item = $item->toArray();
                @endphp
            @endif
            @php
                $color = (isset($item['color']) && filled($item['color'])) ? $item['color'] : 'primary';
                $iconColor = (isset($item['iconColor']) && filled($item['iconColor'])) ? $item['iconColor'] : 'primary';
            @endphp
            <li
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
                <a class="flex items-center space-x-3"
                   target="@if(isset($item['isNewTab']) && $item['isNewTab']) _blank @else _self @endif"

                   href="{{ $item['url'] }}"
                >
                    @if(isset($item['icon']) && filled($item['icon']))
                        <span
                            @style([
                                \Filament\Support\get_color_css_variables(
                                    $iconColor,
                                    shades: [400, 500, 600],
                                ) => $iconColor !== 'gray',
                            ])
                            @class([
                                'h-5 w-5 flex justify-center items-center rounded-full',
                                match ($iconColor) {
                                    'gray' => 'bg-gray-600 dark:bg-gray-500 text-white dark:text-gray-500',
                                    default => 'bg-custom-600 dark:bg-custom-500 text-white dark:text-custom-500',
                                },
                            ])
                        >
                        @svg($item['icon'],'flex-shrink-0 h-4 w-4')
                    </span>
                    @endif

                    <span>
                        {{ $item['label'] }}
                    </span>
                </a>
            </li>

            {{--todo coming soon ->grouped()--}}
            {{--<a href="{{ $item['label'] }}" class="py-3 px-4 text-sm font-medium bg-white border border-gray-200 text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                <span class="flex items-center gap-x-2">
                    @if($item['icon'] !== null)
                        <span class="h-5 w-5 flex justify-center items-center rounded-full bg-primary-50 text-primary-600 dark:bg-primary-500">
                            @svg($item['icon'],'flex-shrink-0 h-3 w-3')
                        </span>
                    @endif
                    <span class="flex justify-between w-full">
                        Profile
                        <span class="py-0.5 px-1 rounded-full text-xs font-medium bg-primary-500 text-white">New</span>
                    </span>
                </span>
            </a>--}}
        @endforeach
    </ul>
</div>