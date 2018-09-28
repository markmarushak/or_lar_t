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
        width: 15%;
        background: #2c2e3d;
        padding: 0.75em;
        margin: 5px;
        color: #eee;
        transition: all .5s;
    }
    .content-radio label input {
        visibility: hidden;
        width: 0;
    }
    .content-radio label.click {
        color: #2c2e3d;
        box-shadow: 0 0 4px 0;
        background: #eee;
    }
</style>

@section('content')
    <form class="form-radio" action="table-template" method="get">
        <div class="content-radio">
            @foreach($list as $radio)
                <label for="{{ $radio['name'] }}">
                    {{ $radio['name'] }}
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



