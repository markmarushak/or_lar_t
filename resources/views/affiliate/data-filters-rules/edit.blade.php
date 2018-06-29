<div class="modal fade show" id="m_modal_edit" tabindex="-1" role="dialog" style="display: block; padding-right: 15px; background: rgba(20, 20, 20, 0.9)" hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data Filters & Rules</h5>
                <button type="button" onclick="closeModal()" class="close" data-dismiss="modal" aria-label="Close" id="close_mark">
                    <span aria-hidden="true" onclick="">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Description:</label>
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" id="n_description">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Category:</label>
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" id="n_category">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Source:</label>
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" id="n_source">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Type:</label>
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" id="n_type">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Country:</label>
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" id="n_country">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Status:</label>
                    <div class="col-3">
											<span class="m-switch m-switch--outline m-switch--icon m-switch--success">
												<label>
						                        <input type="checkbox" checked="checked" name="status" id="n_status">
						                        <span></span>
						                        </label>
						                    </span>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="save_btn" onclick="saveRow()">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close_btn" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>
</div>
