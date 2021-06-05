<div class="modal fade" id="modalTebus" tabindex="-1" role="dialog" aria-labelledby="modalTebus">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tebus Kendaraan</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'Kendaraan/tebusKendaraan'; ?>" method="post" enctype="multipart/form-data" style="display:inline-block;">
          <input type="hidden" name="IDTarikKendaraan" id="IDTarikKendaraan">
          <input type="hidden" name="IDKendaraan" id="IDKendaraan">
          <div class="form-group no-padding col-sm-12">
            <div class="col-sm-5">
                <label for="email">Penebus :</label>
            </div>
            <div class="col-sm-7">
                <select name="penebus" id="penebus" class="form-control" required>
                  <option value="nasabah">Nasabah</option>
                  <option value="BJM">BJM</option>
               </select>
            </div>
          </div>  
          <div class="form-group no-padding col-sm-12">
            <div class="col-sm-5">
                <label for="email">Tanggal Tebus :</label>
            </div>
            <div class="col-sm-7">
                <input type="date" class="form-control" name="tglTebus" placeholder="Tanggal Ditebus" required>
            </div>
          </div>           
      </div>
      <div class="modal-footer">
        <div class="form-group no-padding">
            <div class="col-sm-2">
                <button type="submit" class="btn btn-default btn-maximize">Tebus</button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </form>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
