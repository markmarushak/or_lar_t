<div class="modal fade show" id="m_modal_edit" tabindex="-1" role="dialog" style="display: block; padding-right: 15px; background: rgba(20, 20, 20, 0.9)" hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Affiliate & Partner</h5>
                <button type="button" onclick="closeModal('modal_edit')" class="close" data-dismiss="modal" aria-label="Close" id="close_mark">
                    <span aria-hidden="true" onclick="">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Rules:</label>
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input" id="n_rules">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="save_btn" onclick="saveRow()">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close_btn" onclick="closeModal('modal_edit')">Close</button>
            </div>
        </div>
    </div>
</div>