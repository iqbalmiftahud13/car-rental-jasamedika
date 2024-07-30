<div id="modalDelete" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="formmodalDeleteTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formmodalDeleteTitle">Konfirmasi penghapusan data.</h5>
            </div>
            <form method="POST" action="#" id="formModalDelete">
                @csrf
                @method('delete')
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data yang dipilih ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Ya, hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
