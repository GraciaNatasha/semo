<!-- Page Content -->
    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-angle-double-left fa-3x"></i></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title" style="margin-bottom: 0;"><span>Laporan <?php if($tipe=="Apalis"){echo "Kas Apalis";}else if($tipe=="BJM"){echo "Kas BJM";}else if($tipe=="Sewa"){echo "Sewa";} ?></span></h1>                
				
                <div class="form-container">                    
                    <form action="<?php echo base_url().'Kuitansi/laporan/'.$tipe ?>" method="post" enctype="multipart/form-data">
                        <h3 class="title"><span>Rentang Waktu Laporan</span></h3> 
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
                                <button type="submit" class="btn btn-default btn-maximize">Lihat Laporan</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-container">
                    <div class="col-sm-12">
        				<table class="table" id="tblShow">
        				<thead>
        					<tr>
                                <th>NO.</th>
                                <?php if($tipe == "Sewa"){?>
                                <th>NO.KONTROL</th>
                                <?php } ?>
        						<th>NO.KWT</th>
                                <th>TANGGAL</th>
        						<th>NAMA NASABAH</th>
                                <th>DEBET</th>
                                <th>CREDIT</th>
                                <th>KETERANGAN</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php 
                            $totalDebet = 0;
                            $totalCredit = 0;
                            for($i=0;$i<count($listLaporan);$i++){ ?>
                            <tr>
                                <td><?php echo $i+1 ?></td>
                                <?php if($tipe == "Sewa"){?>
                                <td><?php echo $listLaporan[$i]->noPiutang ?></td>
                                <?php } ?>
        						<td><?php echo $listLaporan[$i]->noKuitansi ?></td>
                                <td><?php echo date("j M Y",strtotime($listLaporan[$i]->tglTransaksi));?></td>    
                                <td><?php if($tipe == "Sewa"){echo $listLaporan[$i]->namaNasabah;}else{echo $listLaporan[$i]->dariUntuk;} ?></td> 
                                <td><?php if(($tipe=="Apalis" && $listLaporan[$i]->tipe == 'M') || ($tipe=="BJM" && $listLaporan[$i]->tipe == 'KM')){echo $listLaporan[$i]->nominal; $totalDebet += $listLaporan[$i]->nominal;} ?></td> 
                                <td><?php if(($tipe=="Apalis" && $listLaporan[$i]->tipe == 'L') || ($tipe=="BJM" && $listLaporan[$i]->tipe == 'KL')){echo $listLaporan[$i]->nominal;$totalCredit += $listLaporan[$i]->nominal;} ?></td> 
                                <td><?php echo $listLaporan[$i]->keterangan ?></td> 
        					</tr>
                            <?php } ?>
        				</tbody>
        				</table>
                    </div>
                </div>

                <div class="table-container">
                    <div class="col-sm-offset-6 col-sm-6">
                        <table class="table" id="tblShow">
                        <thead>
                            <tr>
                                <th>TOTAL DEBET</th>
                                <th>TOTAL CREDIT</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $total = $totalDebet - $totalCredit; ?>
                                <td><?php echo "Rp ".$totalDebet.",-" ?></td>
                                <td><?php echo "Rp ".$totalCredit.",-" ?></td>
                                <td <?php if($total < 0){echo "style=\"color: red\"";} ?>><?php echo "Rp ".$total.",-";?></td>
                            </tr>
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
