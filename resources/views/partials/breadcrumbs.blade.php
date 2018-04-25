@if (count($breadcrumbs))

    <h3 class="m-subheader__title ">
        <?php
            echo last($breadcrumbs)->title;
         ?>

    </h3>

    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline" style="height: 40px;">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="m-nav__item m-nav__item--home">
                    <a href="{{ $breadcrumb->url }}" class="m-nav__link m-nav__link--icon">
                        @if ($breadcrumb->url && $loop->first)
                            <i class="m-nav__link-icon la la-home"></i>
                        @endif
                        {{ $breadcrumb->title }}
                    </a>
                </li>
                <li class="m-nav__separator">/</li>
            @else
                <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                        <span class="m-nav__link-text">{{ $breadcrumb->title }}</span>
                    </a>
                </li>
            @endif

        @endforeach
    </ul>
@endif
