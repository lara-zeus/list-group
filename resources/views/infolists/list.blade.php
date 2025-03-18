<div>
    @php
        $isGrouped = $isGrouped();
        $isList = $isList();
        $heading = $getHeading();
        $getState = $getState();
    @endphp

    @if(filled($heading))
        <h4 class="my-3">{{ $heading }}</h4>
    @endif

    @if($isGrouped)
        @include('zeus-list-group::infolists.grouped')
    @else
        @include('zeus-list-group::infolists.item')
    @endif

</div>
