<div class="modal fade" id="modalDataPembelianKendaraan" tabindex="-1" role="dialog" aria-labelledby="modalDataPembelianKendaraan">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Data Pembelian Kendaraan</h4>
      </div>
      <div class="modal-body">
        <div style="display:inline-block;">
          <div class="form-group no-padding col-sm-12">
            <div class="col-sm-2">
              <label>No. Stok:</label>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="noStokModal" placeholder="No. Stok Kendaraan" maxlength="10" disabled>
            </div>
          </div>
          <div class="form-group no-padding col-sm-12">
            <div class="col-sm-2">
                <label>Tanggal Beli:</label>
            </div>
            <div class="col-sm-4">
                <input type="date" class="form-control" name="tglBeliModal" disabled>
            </div>
            <div class="col-sm-2">
                <label>Beli Dari:</label>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="beliDariModal" maxlength="50" placeholder="Beli Dari" disabled>
            </div>
          </div> 
          <div class="form-group no-padding col-sm-12">
            <div class="col-sm-2">
              <label>Harga Beli:</label>
            </div>
            <div class="col-sm-4">
              <input type="number" class="form-control" name="hargaBeliModal" placeholder="Harga Beli" disabled>
            </div>
            <div class="col-sm-2">
              <label>Cara Bayar:</label>
            </div>
            <div class="col-sm-4">
              <select name="IDCaraBayarModal" id="IDCaraBayarModal" class="form-control" disabled>
             </select>
            </div>
          </div>  
        </div>           
      </div>
      <!-- <div class="modal-footer">
        <div class="form-group no-padding">
            <div class="col-sm-2">
                <button type="submit" class="btn btn-default btn-maximize">Tebus</button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
          </div>        
      </div> -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
