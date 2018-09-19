@extends('layouts.admin.app')
@section('content')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <div class="container text-center" style="width: 100%">
                <div id="spinner" class="m-loader m-loader--success m-loader--lg col-md-6" style="margin-top: 50px; width: 30px; display: none;"></div>
            </div>

            <form action="">
                
                <div class="form-group">
                    <label for="">Campaigns - name</label>
                    <input class="form-control" type="text" name="name" required>
                </div>

                <div class="form-group">
                    <label for="">Country tag</label>
                    <select name="" id="">
                        <option value="0">Global</option>
                        <option value="1">Algeria</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Workspace</label>
                    <select name="" id="">
                        <option value="">Mark Cukerberg</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Name Campaigns</label>
                    <input class="form-control" type="text" name="name" required>
                </div>
                
            </form>
        </div>
    </div>

@endsection
