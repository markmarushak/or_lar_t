


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