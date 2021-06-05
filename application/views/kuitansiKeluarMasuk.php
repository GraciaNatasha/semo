<!-- Page Content -->
    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-angle-double-left fa-3x"></i></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title"><span><?php if($tipe == 'L'){echo "Pengeluaran Apalis";}else if($tipe == 'KL'){echo "Pengeluaran Kas BJM";}else if($tipe == 'M'){echo "Pemasukan Apalis";}else if($tipe == 'KM'){echo "Pemasukan Kas BJM";} ?></span></h1>      
				<div class="form-container">
					<form action="<?php echo base_url().'Kuitansi/addKuitansiKeluarMasuk';?>" method="post" enctype="multipart/form-data">
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>No. Kuitansi :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="noKuitansi" placeholder="No. Kuitansi" maxlength="50" required>
                            </div>
                        </div>  
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label><?php if($tipe == 'L' || $tipe == 'KL'){echo "Kepada";}else{echo "Diterima dari";} ?> :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="dariUntuk" <?php if($tipe == 'L' || $tipe == 'KL'){echo "placeholder=\"Kepada\"";}else{echo "placeholder=\"Diterima dari\"";} ?> maxlength="50" required>                                
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Terbilang :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="nominal" placeholder="Nominal Transaksi" required>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Untuk Pembayaran :</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="keterangan" placeholder="Untuk Pembayaran"></textarea>
                            </div>
                        </div> 
                        <input type="hidden" name="tipe" <?php echo "value=\"".$tipe."\"";?>>
                        <div class="form-group no-padding">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default btn-maximize">Simpan</button>
                            </div>
                        </div>
                    </form>
				</div>
            </div>
        </div>
    </div>
<!-- /#page-content-wrapper -->
