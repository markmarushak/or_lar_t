<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}" />
<div id="modal_form">
    <!--<div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12 m--font-bolder">Enable conditional logic rules</label>
        <div class="col-lg-4 col-md-9 col-sm-12 mt-2">
            <label class="m-checkbox m-checkbox--air m-checkbox--solid m-checkbox--state-brand">
                <input type="checkbox" id="m_hide">
                <span></span>
            </label>

        </div>

    </div>-->
        @include('errors')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12">
                    Description:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                    <input type="text" name="description" class="form-control m-input" value="" id="n_description">
                </div>
            </div>

            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12">
                    Country:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">

                    <input type="text" name="country" class="form-control m-input" value="" id="n_country">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="host" class="col-form-label col-lg-3 col-sm-12">
                    Type:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">

                    <input name="type" type="text" class="form-control m-input" value="" id="n_type">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="host" class="col-form-label col-lg-3 col-sm-12">
                    Rules:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12">

                    <input name="rules" type="text" class="form-control m-input" value="" id="n_rules">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label for="host" class="col-form-label col-lg-3 col-sm-12">
                    Status:
                </label>
                <div class="col-lg-4 col-md-9 col-sm-12 mt-2">
                        <label class="m-checkbox m-checkbox--air m-checkbox--solid m-checkbox--state-brand" checked="checked">
                            <input type="checkbox" id="n_status">
                            <span></span>
                        </label>
                </div>
            </div>
    <div id="div_hide">
        <form class="form-inline">
            <div class="form-group m-form__group">

                <div class=" form-group">
                    <select class="form-control" style="width:110px" id="m_notify_placement_from">
                        <option value="top">ZipCode</option>
                        <option value="bottom">Bottom</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <select class="form-control ml-3" id="m_notify_placement_from">
                            <option value="top">From</option>
                            <option value="bottom">Bottom</option>
                        </select>
                    </div>
                    <input type="text" class="form-control col-3 ml-3">
                </div>
                <div class="form-group">
                    <div class=" form-group">
                        <select class="form-control" id="m_notify_placement_from">
                            <option value="top">To</option>
                            <option value="bottom">Bottom</option>
                        </select>
                    </div>
                    <input type="text" class="form-control col-3 ml-3">
                    <button class="form-control ml-3 btn btn-success">Add</button>
                </div>
            </div>
        </form>
        <form class="form-inline">
            <div class="form-group m-form__group pt-2">

                <div class=" form-group">
                    <select class="form-control" style="width:110px" id="m_notify_placement_from">
                        <option value="top">Material</option>
                        <option value="bottom">Bottom</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control ml-3" id="m_notify_placement_from">
                        <option value="top">Is</option>
                        <option value="bottom">Bottom</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class=" form-group">
                        <select class="form-control ml-3" id="m_notify_placement_from">
                            <option value="top">Stone</option>
                            <option value="bottom">Bottom</option>
                        </select>
                    </div>
                    <button class="form-control ml-3 btn btn-success">Add</button>
                </div>
            </div>
        </form>
        <div class="pt-2">
            <button class="btn btn-success">Add Rule</button>
        </div>

        <div class="pt-2">
            <button class="btn btn-outline-info active" id="save_btn">Save</button>
        </div>
    </div>
</div>
<div id="overlay"></div>