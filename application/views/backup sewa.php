<!-- Page Content -->

    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-angle-double-left fa-3x"></i></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title" style="margin-bottom:0;"><span>Sewa</span></h1> 
				<div class="form-container">
					<form action="<?php 
                    if($noPiutang==0){echo base_url().'Sewa/addSewa';}else{echo base_url().'Sewa/editSewa/'.$noPiutang;} ?>" method="post" enctype="multipart/form-data">

                        <!-- Nasabah -->
                        <h3 class="title"><span>Data Nasabah</span></h3>   
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Nama :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Nasabah" maxlength="50" <?php if($noPiutang!=0){echo "value=\"".$editNasabah->nama."\"";} ?> required>
                            </div>
                            <div class="col-sm-1">
                                <label>No. KTP:</label>
                            </div>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="noKTP" placeholder="No. KTP Nasabah" maxlength="16" <?php if($noPiutang!=0){echo "value=\"".$editNasabah->noKTP."\"";} ?> required>
                            </div>
                        </div>  
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Tanggal Lahir :</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" name="tglLahir" placeholder="Tanggal Lahir Nasabah" <?php if($noPiutang!=0){echo "value=\"".$editNasabah->tglLahir."\"";} ?> required>
                            </div>
                            <div class="col-sm-1">
                                <label>Agama :</label>
                            </div>
                            <div class="col-sm-2">
                                <select name="IDAgama" id="item" class="form-control">
                                    <?php $len = count($listAgama); 
                                    for($i=0;$i<$len;$i++){ ?>
                                        <option value="<?php echo $listAgama[$i]->IDAgama; ?>" <?php if($noPiutang!=0 && $listAgama[$i]->IDAgama == $editNasabah->IDAgama){echo "selected";}; ?>><?php echo $listAgama[$i]->namaAgama; ?></option>
                                    <?php } ?>
                                 </select>
                            </div>
                            <div class="col-sm-2">
                                <label>No. Telpon :</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="noTelp" placeholder="No. Telpon Nasabah" <?php if($noPiutang!=0){echo "value=\"".$editNasabah->noTelp."\"";} ?> required>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Alamat :</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat" placeholder="Alamat Nasabah" maxlength="255"><?php if($noPiutang!=0){echo $editNasabah->alamat;} ?></textarea>                                
                            </div>
                        </div> 

                        <!-- Kendaraan -->
                        <h3 class="title"><span>Data Kendaraan</span></h3>   
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Merk :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="merk" placeholder="Merk Kendaraan" maxlength="20" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editKendaraan->merkKendaraan."\"";} ?> required>
                            </div>
                        </div>  
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Jenis :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="jenis" placeholder="Jenis Kendaraan" maxlength="6" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editKendaraan->jenisKendaraan."\"";} ?> required>
                            </div>    
                            <div class="col-sm-2">
                                <label>Tipe :</label>
                            </div>                       
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tipe" placeholder="Tipe Kendaraan" maxlength="6" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editKendaraan->tipeKendaraan."\"";} ?> required>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>No. Rangka :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="noRangka" placeholder="No. Rangka Kendaraan" maxlength="15" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editKendaraan->noRangkaKendaraan."\"";} ?> required>
                            </div>
                            <div class="col-sm-2">
                                <label>No. Mesin :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="noMesin" placeholder="No. Mesin Kendaraan" maxlength="15" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editKendaraan->noMesinKendaraan."\"";} ?> required>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Warna :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="warna" placeholder="Warna Kendaraan" maxlength="10" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editKendaraan->warnaKendaraan."\"";} ?> required>
                            </div>
                            <div class="col-sm-2">
                                <label>Tahun :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="tahun" placeholder="Tahun Kendaraan" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editKendaraan->tahunKendaraan."\"";} ?> required>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>No. Polisi :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="noPolisi" placeholder="No. Polisi Kendaraan" maxlength="15" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editKendaraan->noPolisiKendaraan."\"";} ?> required>
                            </div>
                        </div>
                        <input type="hidden" name="statusKepemilikan" value="lagi disewa">

                        <!-- Sewa -->
                        <h3 class="title"><span>Data Sewa</span></h3> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-1">
                                <label>Harga Dasar :</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="HDKSewa" placeholder="Harga Dasar" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editNasabah->HDKSewa."\"";} ?> required>
                            </div>
                            <div class="col-sm-1">
                                <label>DP :</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="DPSewa" placeholder="DP" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editNasabah->DPSewa."\"";} ?> required>
                            </div>
                            <div class="col-sm-1">
                                <label>PH :</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="PHSewa" placeholder="PH" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editNasabah->PHSewa."\"";} ?> readonly>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-1">
                                <label>Jenis Asuransi:</label>
                            </div>
                            <div class="col-sm-3">
                                <select name="IDJenisAsuransi" id="item" class="form-control">
                                    <?php $len = count($listJenisAsuransi); 
                                    for($i=0;$i<$len;$i++){ ?>
                                        <option value="<?php echo $listJenisAsuransi[$i]->IDJenisAsuransi; ?>" <?php if($noPiutang!=0 && $listJenisAsuransi[$i]->IDJenisAsuransi == $editSewa->editNasabah->IDJenisAsuransi){echo "selected";}; ?>><?php echo $listJenisAsuransi[$i]->namaJenisAsuransi; ?></option>
                                    <?php } ?>
                                 </select>
                            </div> 
                            <div class="col-sm-1">
                                <label>Asuransi:</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="asuransiSewa" placeholder="Besar Asuransi (%)" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editNasabah->asuransiSewa."\"";} ?> required>
                            </div>                       
                            <div class="col-sm-1">
                                <label>Total PH :</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="totalPH" placeholder="Total PH" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editNasabah->totalPH."\"";} ?> readonly>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Bunga :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="bungaSewa" placeholder="Besar Bunga (%)" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editNasabah->bungaSewa."\"";} ?> required>
                            </div>                        
                            <div class="col-sm-2">
                                <label>Total Utang :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="totalUtang" placeholder="Total Utang" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editNasabah->totalUtang."\"";} ?> readonly>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Masa Kredit :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="masaKreditSewa" placeholder="Masa Kredit (bulan)" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editNasabah->masaKreditSewa."\"";} ?> required>
                            </div>
                        
                            <div class="col-sm-2">
                                <label>Angsuran per Bulan :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="angsuranPerBulan" placeholder="Angsuran per Bulan" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editNasabah->angsuranPerBulan."\"";} ?> required>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Biaya Administrasi :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="biayaAdmSewa" placeholder="Biaya Administrasi" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editNasabah->biayaAdmSewa."\"";} ?> required>
                            </div>
                        
                            <div class="col-sm-2">
                                <label>Jatuh Tempo Angsuran-1 :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="jatuhTempoAngsuran1" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editNasabah->nama."\"";} ?> required>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Nama Salesman :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="namaSales" placeholder="Nama Salesman" maxlength="50" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editNasabah->namaSales."\"";} ?> required>
                            </div>
                        
                            <div class="col-sm-2">
                                <label>Tgl Pernyataan :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="tglPernyataanSewa" <?php if($noPiutang!=0){echo "value=\"".$editSewa->editNasabah->nama."\"";} ?> required>
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
        						<th>No. </th>
        						<th>Merk</th>
                                <th>Jenis</th>
                                <th>Tipe</th>
                                <th>No. Rangka</th>
                                <th>No. Mesin</th>
                                <th>Warna</th>
                                <th>Tahun</th>
                                <th>No. Polisi</th>
                                <th>Delete</th>
                                <th>Edit</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php for($i=0;$i<count($Sewa);$i++){ ?>
                            <tr>
        						<td><?php echo $i+1 ?></td>
        						<td><?php echo $Sewa[$i]->merkSewa ?></td>  
                                <td><?php echo $Sewa[$i]->jenisSewa ?></td> 
                                <td><?php echo $Sewa[$i]->tipeSewa ?></td> 
                                <td><?php echo $Sewa[$i]->noRangkaSewa ?></td> 
                                <td><?php echo $Sewa[$i]->noMesinSewa ?></td> 
                                <td><?php echo $Sewa[$i]->warnaSewa ?></td> 
                                <td><?php echo $Sewa[$i]->tahunSewa ?></td> 
                                <td><?php echo $Sewa[$i]->noPolisiSewa ?></td> 
                                <td><a data-toggle="modal" data-target="#modalDelete" onclick="return changeModal('<?php echo $Sewa[$i]->noPiutang ?>');">Delete</a></td>
                                <td><a href="<?php echo base_url(); ?>Sewa/index/<?php echo $Sewa[$i]->noPiutang; ?>">Edit</a></td>
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

$(document).ready(function(){
    $('input[name=HDKSewa]').change(function() {
        var ph = 0;
        if($('input[name=HDKSewa]').val() != ''){
            ph += parseInt($('input[name=HDKSewa]').val());
        }
        if($('input[name=DPSewa]').val() != ''){
            ph += parseInt($('input[name=DPSewa]').val());
        }
        alert(2);
        $('input[name=PHSewa]').val(ph);
    });
    $('input[name=HDKSewa]').change(function() {
        var ph = 0;
        if($('input[name=HDKSewa]').val() != ''){
            ph += parseInt($('input[name=HDKSewa]').val());
        }
        if($('input[name=DPSewa]').val() != ''){
            ph += parseInt($('input[name=DPSewa]').val());
        }
        alert(2);
        $('input[name=PHSewa]').val(ph);
    });
});

</script>
