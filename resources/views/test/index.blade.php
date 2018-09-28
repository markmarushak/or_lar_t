@extends('.layouts.admin.app')



@section('content')

    <ul>
        @foreach($list as $l)
            <li>
                {{ $l['id'] }} | {{ $l['migration'] }}
            </li>
        @endforeach
    </ul>

@endsection



