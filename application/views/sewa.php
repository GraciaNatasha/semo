<!-- Page Content -->

    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-angle-double-left fa-3x"></i></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title" style="margin-bottom:0;"><span><?php if($noPiutang==""){echo "Buat Sewa";}else{echo "Detail Sewa ".$noPiutang;}?></span></h1> 
				<div class="form-container">
					<form action="<?php echo base_url().'Sewa/addSewa'; ?>" method="post" enctype="multipart/form-data">
                        <!-- Nasabah -->
                        <h3 class="title"><span>Data Nasabah</span></h3>
                        <?php if($noPiutang==""){ ?>
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Tipe Nasabah :</label>
                            </div>
                            <div class="col-sm-3">
                                <select name="tipeNasabah" id="tipeNasabah" class="form-control">
                                    <option value="lama">Nasabah Lama</option>
                                    <option value="baru">Nasabah Baru</option>
                                 </select>
                            </div>
                        </div>
                        <div class="form-group no-padding col-sm-12" id="dataNasabahLama">
                            <div class="col-sm-2">
                                <label>Nama Nasabah :</label>
                            </div>
                            <div class="col-sm-5">
                                <select name="IDNasabah" id="IDNasabah" class="form-control" required>
                                    <option value="-1">-- Pilih Nasabah -- </option>
                                    <?php $len = count($listNasabah); 
                                    for($i=0;$i<$len;$i++){ ?>
                                        <option value="<?php echo $listNasabah[$i]->IDNasabah; ?>"><?php echo $listNasabah[$i]->nama; ?></option>
                                    <?php } ?>
                                 </select>
                            </div>
                        </div>

                        <div style="border-bottom: 1px solid #cfcfcf;margin-bottom: 1em;padding:0.5em 1em;" class="col-md-12"></div>
                        <?php } ?>

                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Nama :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Nasabah" maxlength="50" <?php if($noPiutang!=""){echo "value=\"".$dataNasabah->nama."\" readonly";}else{echo "required";} ?>>
                            </div>
                            <div class="col-sm-1">
                                <label>No. KTP:</label>
                            </div>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="noKTP" placeholder="No. KTP Nasabah" maxlength="16" <?php if($noPiutang!=""){echo "value=\"".$dataNasabah->noKTP."\" readonly";}else{echo "required";} ?>>
                            </div>
                        </div>  
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Tanggal Lahir :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="tglLahir" placeholder="Tanggal Lahir Nasabah" <?php if($noPiutang!=""){echo "value=\"".$dataNasabah->tglLahir."\" readonly";}else{echo "required";} ?>>
                            </div>
                            <div class="col-sm-1">
                                <label>Agama :</label>
                            </div>
                            <div class="col-sm-5">
                                <select name="IDAgama" id="IDAgama" class="form-control" <?php if($noPiutang!=""){echo "readonly";}else{echo "required";} ?>>
                                    <?php $len = count($listAgama); 
                                    for($i=0;$i<$len;$i++){ ?>
                                        <option value="<?php echo $listAgama[$i]->IDAgama; ?>" <?php if($noPiutang!="" && $listAgama[$i]->IDAgama == $dataNasabah->IDAgama){echo "selected";}; ?>><?php echo $listAgama[$i]->namaAgama; ?></option>
                                    <?php } ?>
                                 </select>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>No. Telpon :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="noTelp" placeholder="No. Telpon Nasabah" <?php if($noPiutang!=""){echo "value=\"".$dataNasabah->noTelp."\" readonly";}else{echo "required";} ?>>
                            </div>
                            <div class="col-sm-1">
                                <label>Email :</label>
                            </div>
                            <div class="col-sm-5">
                                <input type="email" class="form-control" name="email" placeholder="Email Nasabah" <?php if($noPiutang!=""){echo "value=\"".$dataNasabah->email."\" readonly";}else{echo "required";} ?> >
                            </div>

                        </div>
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Alamat :</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Nasabah" maxlength="255" <?php if($noPiutang!=""){echo "readonly";}else{echo "required";} ?>><?php if($noPiutang!=""){echo $dataNasabah->alamat;} ?></textarea>                                
                            </div>
                        </div> 

                        <!-- Kendaraan -->
                        <h3 class="title"><span>Data Kendaraan</span></h3>  
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-3">
                                <label>No. Stok / No. Polisi Kendaraan :</label>
                            </div>
                            <div class="col-sm-4">
                                <select name="IDKendaraan" id="IDKendaraan" class="form-control" <?php if($noPiutang!=""){echo "disabled";}; ?>>
                                    <option value="-1">-- Pilih Kendaraan -- </option>
                                    <?php $len = count($listNoStok); 
                                    for($i=0;$i<$len;$i++){ ?>
                                        <option value="<?php echo $listNoStok[$i]->IDKendaraan; ?>" <?php if($noPiutang!="" && $listNoStok[$i]->IDKendaraan == $dataKendaraan->IDKendaraan){echo "selected";}; ?>><?php echo $listNoStok[$i]->noStok." / ".$listNoStok[$i]->noPolisiKendaraan; ?></option>
                                    <?php } ?>
                                 </select>
                            </div>
                        </div>  
                        <div style="border-bottom: 1px solid #cfcfcf;margin-bottom: 1em;padding:0.5em 1em;" class="col-md-12"></div>
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Merk :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="merk" placeholder="Merk Kendaraan" maxlength="20" <?php if($noPiutang!=""){echo "value=\"".$dataKendaraan->merkKendaraan."\" readonly";}else{echo "readonly";} ?>>
                            </div>
                        </div>  
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Jenis :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="jenis" placeholder="Jenis Kendaraan" maxlength="6" <?php if($noPiutang!=""){echo "value=\"".$dataKendaraan->jenisKendaraan."\" readonly";}else{echo "readonly";} ?>>
                            </div>    
                            <div class="col-sm-2">
                                <label>Tipe :</label>
                            </div>                       
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tipe" placeholder="Tipe Kendaraan" maxlength="6" <?php if($noPiutang!=""){echo "value=\"".$dataKendaraan->tipeKendaraan."\" readonly";}else{echo "readonly";} ?>>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>No. Rangka :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="noRangka" placeholder="No. Rangka Kendaraan" maxlength="15" <?php if($noPiutang!=""){echo "value=\"".$dataKendaraan->noRangkaKendaraan."\" readonly";}else{echo "readonly";} ?>>
                            </div>
                            <div class="col-sm-2">
                                <label>No. Mesin :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="noMesin" placeholder="No. Mesin Kendaraan" maxlength="15" <?php if($noPiutang!=""){echo "value=\"".$dataKendaraan->noMesinKendaraan."\" readonly";}else{echo "readonly";} ?>>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Warna :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="warna" placeholder="Warna Kendaraan" maxlength="10" <?php if($noPiutang!=""){echo "value=\"".$dataKendaraan->warnaKendaraan."\" readonly";}else{echo "readonly";} ?>>
                            </div>
                            <div class="col-sm-2">
                                <label>Tahun :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="tahun" placeholder="Tahun Kendaraan" <?php if($noPiutang!=""){echo "value=\"".$dataKendaraan->tahunKendaraan."\" readonly";}else{echo "readonly";} ?>>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>No. Polisi :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="noPolisi" maxlength="15" placeholder="No. Polisi Kendaraan"<?php if($noPiutang!=""){echo "value=\"".$dataKendaraan->noPolisiKendaraan."\" readonly";}else{echo "readonly";} ?>>
                            </div>
                        </div>
                        <input type="hidden" name="statusKepemilikan" value="disewakan">

                        <!-- Sewa -->
                        <h3 class="title"><span>Data Sewa</span></h3> 

                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-1">
                                <label>No. Sewa:</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="noPiutang" placeholder="No. Sewa" maxlength="5" <?php if($noPiutang!=""){echo "value=\"".$dataSewa->noPiutang."\" readonly";}else{echo "required";} ?>>
                            </div>
                        </div>

                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-1">
                                <label>Harga Dasar :</label> <!-- HDK -->
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="HDKSewa" <?php if($noPiutang!=""){echo "value=\"".$dataSewa->HDKSewa."\" readonly";}else{echo "required";} ?>>
                            </div>
                            <div class="col-sm-1">
                                <label>Uang Jaminan:</label> <!-- DP -->
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="DPSewa" <?php if($noPiutang!=""){echo "value=\"".$dataSewa->DPSewa."\" readonly";}else{echo "required";} ?>>
                            </div>
                            <div class="col-sm-1">
                                <label>Pokok Sewa:</label> <!-- PH -->
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="PHSewa" <?php if($noPiutang!=""){$phSewa=$dataSewa->HDKSewa-$dataSewa->DPSewa;echo "value=\"".$phSewa."\"";} ?> readonly>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-1">
                                <label>Jenis Asuransi:</label>
                            </div>
                            <div class="col-sm-3">
                                <select name="IDJenisAsuransi" id="IDJenisAsuransi" class="form-control" <?php if($noPiutang!=""){echo "readonly";}else{echo "required";} ?>>
                                    <?php $len = count($listJenisAsuransi); 
                                    for($i=0;$i<$len;$i++){ ?>
                                        <option value="<?php echo $listJenisAsuransi[$i]->IDJenisAsuransi; ?>" <?php if($noPiutang!="" && $listJenisAsuransi[$i]->IDJenisAsuransi == $dataSewa->IDJenisAsuransi){echo "selected";}; ?>><?php echo $listJenisAsuransi[$i]->namaJenisAsuransi; ?></option>
                                    <?php } ?>
                                 </select>
                            </div> 
                            <div class="col-sm-1">
                                <label>Asuransi(%):</label>
                            </div>
                            <div class="col-sm-1">
                                <input type="number" class="form-control" name="asuransiSewaPersen" <?php if($noPiutang!=""){$persenAsuransi=$dataSewa->asuransiSewa/$dataSewa->HDKSewa*100; echo "value=\"".$persenAsuransi."\" readonly";}else{echo "required";} ?>>
                            </div> 
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="asuransiSewa" <?php if($noPiutang!=""){echo "value=\"".$dataSewa->asuransiSewa."\"";} ?> readonly>
                            </div>                       
                            <div class="col-sm-1">
                                <label>Total Pokok Sewa:</label> <!-- total PH -->
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="totalPHSewa" <?php if($noPiutang!=""){if($dataSewa->IDJenisAsuransi == 1){$totalPHSewa=$phSewa+$dataSewa->asuransiSewa;}else if ($dataSewa->IDJenisAsuransi == 2 || $dataSewa->IDJenisAsuransi == 3){$totalPHSewa=$phSewa;} echo "value=\"".$totalPHSewa."\"";} ?> readonly>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-1">
                                <label>Bunga(%):</label>
                            </div>
                            <div class="col-sm-1">
                                <input type="number" class="form-control" name="bungaSewaPersen" <?php if($noPiutang!=""){$persenBunga = $dataSewa->bungaSewa/$totalPHSewa*100; echo "value=\"".$persenBunga."\" readonly";}else{echo "required";} ?>>
                            </div>  
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="bungaSewa" <?php if($noPiutang!=""){echo "value=\"".$dataSewa->bungaSewa."\"";} ?> readonly>
                            </div>                      
                            <div class="col-sm-2">
                                <label>Total Utang :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="totalUtangSewa" <?php if($noPiutang!=""){$totalUtangSewa=$totalPHSewa+$dataSewa->bungaSewa; echo "value=\"".$totalUtangSewa."\"";} ?> readonly>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Masa Kredit :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="masaKreditSewa" <?php if($noPiutang!=""){echo "value=\"".$dataSewa->masaKreditSewa."\" readonly";}else{echo "required";} ?>>
                            </div>
                        
                            <div class="col-sm-2">
                                <label>Angsuran per Bulan :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="angsuranPerBulan" <?php if($noPiutang!=""){echo "value=\"".$dataSewa->angsuranPerBulan."\"";} ?> readonly>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Biaya Administrasi :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="biayaAdmSewa" <?php if($noPiutang!=""){echo "value=\"".$dataSewa->biayaAdmSewa."\" readonly";}else{echo "required";} ?>>
                            </div>
                        
                            <div class="col-sm-2">
                                <label>Jatuh Tempo Angsuran-1 :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="jatuhTempoAngsuran1" <?php if($noPiutang!=""){echo "value=\"".$dataSewa->jatuhTempoAngsuran1."\" readonly";}else{echo "required";} ?>>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Nama Salesman :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="namaSales" maxlength="50" <?php if($noPiutang!=""){echo "value=\"".$dataSewa->namaSales."\" readonly";}else{echo "required";} ?>>
                            </div>
                        
                            <div class="col-sm-2">
                                <label>Tgl Pernyataan :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="tglPernyataanSewa" <?php if($noPiutang!=""){echo "value=\"".$dataSewa->tglPernyataanSewa."\" readonly";}else{echo "required";} ?>>
                            </div>
                        </div> 

                        <?php if($noPiutang==""){?>
                        <div class="form-group no-padding">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default btn-maximize">Simpan</button>
                            </div>
                        </div>
                        <?php } ?>

                    </form>
				</div>               
                </div>
            </div>

            <!-- list -->
            <?php if($noPiutang!=""){?>
            <div class="row">
                <div class="col-lg-12"> 
                    <div class="form-container">
                        <h3 class="title" style="margin-bottom:0;"><span>List Angsuran</span></h3>

                        <div class="table-container">
                            <div class="col-sm-12">
                                <table class="table" id="tblShow">
                                <thead>
                                    <tr>                                        
                                        <th>Sewa Ke-</th>
                                        <th>Tanggal Jatuh Tempo</th>
                                        <th>Nominal</th>
                                        <th>Denda</th>
                                        <th>Status</th>                               
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0;$i<count($dataDetailSewa);$i++){ ?>
                                    <tr>
                                        <td><?php echo $dataDetailSewa[$i]->sewaKe ?></td>  
                                        <td><?php echo date("j M Y",strtotime($dataDetailSewa[$i]->tglJatuhTempo));?></td>
                                        <td><?php echo $dataDetailSewa[$i]->nominal ?></td> 
                                        <td><?php if($dataDetailSewa[$i]->statusLunas == "B" || $dataDetailSewa[$i]->statusLunas == "S"){$today = new DateTime();$dateJatuhTempo=date_create($dataDetailSewa[$i]->tglJatuhTempo); if($today > $dateJatuhTempo){$diff = date_diff($today, $dateJatuhTempo);$denda = 0.004 * $diff->days * $dataDetailSewa[$i]->nominal; echo $denda; }else{echo $dataDetailSewa[$i]->denda;}}else if($dataDetailSewa[$i]->statusLunas == "L"){echo $dataDetailSewa[$i]->denda;} ?></td> 
                                        <td><?php if($dataDetailSewa[$i]->statusLunas == "B"){echo "Belum Lunas";}else if($dataDetailSewa[$i]->statusLunas == "S"){echo "Lunas Sebagian";}else if($dataDetailSewa[$i]->statusLunas == "L"){echo "Lunas";} ?></td> 
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table>
                            </div>
                        </div>

                    </div>               
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
<!-- /#page-content-wrapper -->
<script type="text/javascript">
$('#IDNasabah').change(function(event)
    {
        event.preventDefault();
        var IDNasabah= $('#IDNasabah').children("option:selected").val();

        $.ajax(
            {
                type:"post",
                url: "<?php echo base_url(); ?>Nasabah/getNasabahByID",
                dataType:"json",
                data:{ IDNasabah:IDNasabah},
                success:function(response)
                {
                    console.log(response);
                    $('input[name="nama"]').val(response.nama);
                    $('input[name="noKTP"]').val(response.noKTP);
                    $('input[name="tglLahir"]').val(response.tglLahir);
                    $('#IDAgama').val(response.IDAgama);
                    $('input[name="noTelp"]').val(response.noTelp);
                    $('input[name="email"]').val(response.email);                    
                    $('#alamat').val(response.alamat);
                },
                error: function() 
                {
                    console.log("error");
                }
            }
        );
    });

function resetDataKendaraan(){
    $('input[name="merk"]').val("");
    $('input[name="jenis"]').val("");
    $('input[name="tipe"]').val("");
    $('input[name="noRangka"]').val("");
    $('input[name="noMesin"]').val("");
    $('input[name="warna"]').val("");
    $('input[name="tahun"]').val(""); 
    $('input[name="noPolisi"]').val(""); 
}

$('#IDKendaraan').change(function(event)
{
    event.preventDefault();
    var IDKendaraan= $('#IDKendaraan').children("option:selected").val();

    if(IDKendaraan == -1){
        resetDataKendaraan();
    }else{
        $.ajax({
            type:"post",
            url: "<?php echo base_url(); ?>Kendaraan/getKendaraanByID",
            dataType:"json",
            data:{ IDKendaraan:IDKendaraan},
            success:function(response)
            {
                console.log(response);
                $('input[name="merk"]').val(response.merkKendaraan);
                $('input[name="jenis"]').val(response.jenisKendaraan);
                $('input[name="tipe"]').val(response.tipeKendaraan);
                $('input[name="noRangka"]').val(response.noRangkaKendaraan);
                $('input[name="noMesin"]').val(response.noMesinKendaraan);
                $('input[name="warna"]').val(response.warnaKendaraan);
                $('input[name="tahun"]').val(response.tahunKendaraan); 
                $('input[name="noPolisi"]').val(response.noPolisiKendaraan); 
                
            },
            error: function() 
            {
                console.log("error");
            }
        });
    }
    
});

function resetDataNasabah(){
    $('input[name="nama"]').val("");
    $('input[name="noKTP"]').val("");
    $('input[name="tglLahir"]').val("");
    $('#IDAgama').val(1);
    $('input[name="noTelp"]').val("");
    $('input[name="email"]').val("");    
    $('#alamat').val("");
}

function ceilToThousand(num){
    return Math.ceil(num/1000)*1000;
}

function calc(){
    var ph = parseInt($('input[name=HDKSewa]').val()) - parseInt($('input[name=DPSewa]').val());
    $('input[name=PHSewa]').val(ph);
    var asuransi = parseFloat($('input[name=asuransiSewaPersen]').val())*parseInt($('input[name=HDKSewa]').val())/100.0;
    $('input[name=asuransiSewa]').val(asuransi);

    var totalPH = 0;
    if($('#IDJenisAsuransi').children("option:selected").val() == "1"){
        totalPH = parseInt($('input[name=PHSewa]').val()) + parseFloat($('input[name=asuransiSewa]').val());
    }else if($('#IDJenisAsuransi').children("option:selected").val() == "2" || $('#IDJenisAsuransi').children("option:selected").val() == "3"){
        totalPH = parseInt($('input[name=PHSewa]').val());
    }  
    $('input[name=totalPHSewa]').val(totalPH);
    
    var bunga = parseFloat($('input[name=bungaSewaPersen]').val())*parseInt($('input[name=totalPHSewa]').val())/100.0;    
    $('input[name=bungaSewa]').val(bunga);

    var totalUtang = parseFloat($('input[name=totalPHSewa]').val()) + parseFloat($('input[name=bungaSewa]').val());
    $('input[name=totalUtangSewa]').val(totalUtang);

    var angsuran = ceilToThousand(parseFloat($('input[name=totalUtangSewa]').val()) / parseFloat($('input[name=masaKreditSewa]').val()));
    $('input[name=angsuranPerBulan]').val(angsuran);   

}

function setInputByTipeNasabah(){
    var tipe = $('#tipeNasabah').children("option:selected").val();

    if(tipe == "lama"){
        $('#dataNasabahLama').show();
        $('input[name=nama]').attr('disabled',true);
        $('input[name=noKTP]').attr('disabled',true);
        $('input[name=tglLahir]').attr('disabled',true);
        $('#IDAgama').attr('disabled',true);
        $('input[name=noTelp]').attr('disabled',true);
        $('input[name=email]').attr('disabled',true);
        $('#alamat').attr('disabled',true);
    }else if(tipe == "baru"){
        $('#dataNasabahLama').hide();
        $('#IDNasabah').val(-1);
        resetDataNasabah();
        $('input[name=nama]').attr('disabled',false);
        $('input[name=noKTP]').attr('disabled',false);
        $('input[name=tglLahir]').attr('disabled',false);
        $('#IDAgama').attr('disabled',false);
        $('input[name=noTelp]').attr('disabled',false);
        $('input[name=email]').attr('disabled',false);
        $('#alamat').attr('disabled',false);
    }
}

$(document).ready(function(){
    setInputByTipeNasabah();
    $('#tipeNasabah').change(function(){
        setInputByTipeNasabah();
    });
    $('input[name=HDKSewa]').change(function() {
        calc();
    });
    $('input[name=DPSewa]').change(function() {
        calc();
    });
    $('#IDJenisAsuransi').change(function() {
        calc();
    });
    $('input[name=asuransiSewaPersen]').change(function() {
        calc();
    });
    $('input[name=bungaSewaPersen]').change(function() {
        calc();
    });
    $('input[name=masaKreditSewa]').change(function() {
        calc();
    });
});

</script>
