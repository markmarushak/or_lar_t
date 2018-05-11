{{--
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active show" data-toggle="tab" href="#m_tabs_1_1">Active</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
            <a class="dropdown-item" data-toggle="tab" href="#m_tabs_1_2">Action</a>
            <a class="dropdown-item" data-toggle="tab" href="#m_tabs_1_2">Another action</a>
            <a class="dropdown-item" data-toggle="tab" href="#m_tabs_1_2">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" data-toggle="tab" href="#m_tabs_1_2">Separated link</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3">Link</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" data-toggle="tab" href="#m_tabs_1_4">Disabled</a>
    </li>
</ul>
--}}


<ul class="nav nav-tabs" role="tablist">
    @foreach($EditSectionMenu->roots() as $item)

        <li class="nav-item">
            @if($item->active)
                <a href="{!! $item->url() !!}" class="nav-link active show" >
                    {!! $item->title !!}
                </a>
            @else
                <a href="{!! $item->url() !!}" class="nav-link" >
                    {!! $item->title !!}
                </a>
            @endif
        </li>


    @endforeach
</ul>