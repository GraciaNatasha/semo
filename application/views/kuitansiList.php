<!-- Page Content -->
    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-angle-double-left fa-3x"></i></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title" style="margin-bottom: 0;"><span>Histori Kuitansi</span></h1>                
				
                <div class="form-container">                    
                    <form action="<?php echo base_url().'Kuitansi/view/'.$tipe ?>" method="post" enctype="multipart/form-data">
                        <h3 class="title"><span>Rentang Waktu Kuitansi</span></h3> 
                        <div class="form-group no-padding col-sm-12">
                            <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                            <div class="col-sm-2">
                                <label>Dari :</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" name="tglDari" <?php if(isset($dataTanggal) == true){echo "value=\"".$dataTanggal["tglDari"]."\"";} ?> required>
                            </div>
                        </div>  
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Sampai :</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" name="tglSampai" <?php if(isset($dataTanggal) == true){echo "value=\"".$dataTanggal["tglSampai"]."\"";} ?> required>
                            </div>    
                        </div> 

                        <div class="form-group no-padding">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default btn-maximize">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-container">
                    <div class="col-sm-12">
        				<table class="table" id="tblShow">
        				<thead>
        					<tr>
        						<th>No. Kuitansi</th>
                                <th>Tanggal Transaksi</th>
        						<th><?php if($tipe == 'L' || $tipe == 'KL'){echo "Kepada";}else{echo "Diterima dari";} ?></th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                                <th>Dibuat Oleh</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php for($i=0;$i<count($listKuitansi);$i++){ ?>
                            <tr>
        						<td><?php echo $listKuitansi[$i]->noKuitansi ?></td>
                                <td><?php echo date("j M Y",strtotime($listKuitansi[$i]->tglTransaksi));?></td>    
                                <td><?php echo $listKuitansi[$i]->dariUntuk ?></td> 
                                <td><?php echo $listKuitansi[$i]->nominal ?></td> 
                                <td><?php echo $listKuitansi[$i]->keterangan ?></td> 
                                <td><?php echo $listKuitansi[$i]->username ?></td> 
        					</tr>
                            <?php } ?>
        				</tbody>
        				</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /#page-content-wrapper -->

<?php $this->load->view('modalDelete'); ?>

<script type="text/javascript">
var currentID = 0;
function deleteData()
{
    document.location = '<?php echo base_url(); ?>Nasabah/deleteNasabah/'+currentID;
}

function changeModal(id)
{
    currentID = id;
}
</script>
