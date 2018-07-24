<div class="modal fade show" id="m_modal_del" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none; padding-right: 15px; background: rgba(20, 20, 20, 0.9)">
    <div class="modal-dialog modal-sm" role="document" style="display:none; top:20%" id="delete_modal">
        <div class="modal-content">
            <div class="modal-body">
                <div>
                    <h5 class="modal-title"><span id="deleteId">Delete </span><span id="aff_type"></span> with:
                    </h5>
                </div>
                <div>
                    <h5 class="modal-title" id="exampleModalLabel">id: <span style="color:red" id="aff_id"> </span>
                    </h5>
                </div>
                <div>
                    <h5 class="modal-title" id="exampleModalLabel">description: <span style="color:red" id="aff_descr"> </span>?</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="deleteRow()">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeDeleteModal()">Cancel</button>
            </div>
        </div>
    </div>
</div>