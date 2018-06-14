@if ($errors->any())
    <div class="container">
        <div class="row">
            <div class="col-md-7 cancel-padding-left">
                <div class="alert alert-danger">
                    <ul class="cancel-margin-bottom">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif