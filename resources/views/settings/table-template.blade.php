@extends('.layouts.admin.app')

<style>
    .content-radio {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        width: 100%;
        justify-content: center;
        align-content: center;
        align-items: center;
    }

    .content-radio label {
        width: 20%;
        background: #2c2e3d;
        padding: 0.75em;
        margin: 5px;
        color: #eee;
        transition: all .5s;
    }
    .content-radio label i {
        visibility: hidden;
    }
    .content-radio label input {
        visibility: hidden;
        width: 0;
    }
    .content-radio label.click,
    .content-radio label.load
    {
        color: #2c2e3d;
        box-shadow: 0 0 4px 0;
        background: #eee;
    }
    .content-radio label.load i {
        visibility: visible;
    }

</style>

@section('content')
    <form action="table-template-update" method="post">
        {{ csrf_field() }}
        <button class="btn btn-info">update-table-name <i class="la la-rotate-left"></i></button>
    </form>
    <form class="form-radio" action="table-template" method="get">
        <div class="content-radio">
            @foreach($list as $radio)
                <label for="{{ $radio['name'] }}" class="{{ $radio['status'] }}">
                    {{ $radio['name'] }}
                    <i class="la la-check-circle"></i>
                    <input type="radio" name="tab" value="{{ $radio['name'] }}" id="{{ $radio['name'] }}">
                </label>
            @endforeach
        </div>
        <div class="button">
            <button class="btn btn-danger btn-block"> Load Table </button>
        </div>
    </form>

    <script type="text/javascript">
        $('.content-radio label').click(function () {
            $('.content-radio label').removeClass('click');
            $(this).addClass('click');
        });
    </script>
@endsection



