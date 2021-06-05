<!-- Page Content -->

    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-angle-double-left fa-3x"></i></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title" style="margin-bottom: 0;"><span>Kendaraan</span></h1>                 
                
				<div class="form-container">                    
					<form action="<?php 
                    if($IDKendaraan==0){echo base_url().'Kendaraan/addKendaraan';}else{echo base_url().'Kendaraan/editKendaraan/'.$IDKendaraan;} ?>" method="post" enctype="multipart/form-data">
                        <h3 class="title"><span>Detail Kendaraan</span></h3> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Merk :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="merk" placeholder="Merk Kendaraan" maxlength="20" <?php if($IDKendaraan!=0){echo "value=\"".$editKendaraan->merkKendaraan."\"";} ?> required>
                            </div>
                        </div>  
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Jenis :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="jenis" placeholder="Jenis Kendaraan" maxlength="6" <?php if($IDKendaraan!=0){echo "value=\"".$editKendaraan->jenisKendaraan."\"";} ?> required>
                            </div>    
                            <div class="col-sm-2">
                                <label>Tipe :</label>
                            </div>                       
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tipe" placeholder="Tipe Kendaraan" maxlength="6" <?php if($IDKendaraan!=0){echo "value=\"".$editKendaraan->tipeKendaraan."\"";} ?> required>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>No. Rangka :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="noRangka" placeholder="No. Rangka Kendaraan" maxlength="15" <?php if($IDKendaraan!=0){echo "value=\"".$editKendaraan->noRangkaKendaraan."\"";} ?> required>
                            </div>
                            <div class="col-sm-2">
                                <label>No. Mesin :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="noMesin" placeholder="No. Mesin Kendaraan" maxlength="15" <?php if($IDKendaraan!=0){echo "value=\"".$editKendaraan->noMesinKendaraan."\"";} ?> required>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Warna :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="warna" placeholder="Warna Kendaraan" maxlength="10" <?php if($IDKendaraan!=0){echo "value=\"".$editKendaraan->warnaKendaraan."\"";} ?> required>
                            </div>
                            <div class="col-sm-2">
                                <label>Tahun :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="tahun" placeholder="Tahun Kendaraan" <?php if($IDKendaraan!=0){echo "value=\"".$editKendaraan->tahunKendaraan."\"";} ?> required>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>No. Polisi :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="noPolisi" placeholder="No. Polisi Kendaraan" maxlength="15" <?php if($IDKendaraan!=0){echo "value=\"".$editKendaraan->noPolisiKendaraan."\"";} ?> required>
                            </div>
                        </div>
                        <input type="hidden" name="statusKepemilikan" value="BJM"> 

                        <h3 class="title"><span>Detail Pembelian</span></h3> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>No. Stok :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="noStok" placeholder="No. Stok Kendaraan" maxlength="10" <?php if($IDKendaraan!=0){echo "value=\"".$editKendaraan->noStok."\"";} ?> required>
                            </div>
                        </div>
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Tanggal Beli :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="tglBeli" <?php if($IDKendaraan!=0){echo "value=\"".$editKendaraan->tglBeli."\"";} ?>>
                            </div>
                            <div class="col-sm-2">
                                <label>Beli Dari :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="beliDari" maxlength="50" placeholder="Beli Dari" <?php if($IDKendaraan!=0){echo "value=\"".$editKendaraan->beliDari."\"";} ?>>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Harga Beli:</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="hargaBeli" placeholder="Harga Beli" <?php if($IDKendaraan!=0){echo "value=\"".$editKendaraan->hargaBeli."\"";} ?>>
                            </div>
                            <div class="col-sm-2">
                                <label>Cara Bayar :</label>
                            </div>
                            <div class="col-sm-4">
                                <select name="IDCaraBayar" id="IDCaraBayar" class="form-control">
                                <?php $len = count($listCaraBayar); 
                                for($i=0;$i<$len;$i++){ ?>
                                    <option value="<?php echo $listCaraBayar[$i]->IDCaraBayar; ?>" <?php if($IDKendaraan!=0 && $listCaraBayar[$i]->IDCaraBayar == $editKendaraan->IDCaraBayar){echo "selected";}; ?>><?php echo $listCaraBayar[$i]->namaCaraBayar; ?></option>
                                <?php } ?>
                             </select>
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
                                <th>Status</th>                                
                                <th>Lihat Data Pembelian</th>                             
                                <th>Delete</th>
                                <th>Edit</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php for($i=0;$i<count($Kendaraan);$i++){ ?>
                            <tr>
        						<td><?php echo $i+1 ?></td>
        						<td><?php echo $Kendaraan[$i]->merkKendaraan ?></td>  
                                <td><?php echo $Kendaraan[$i]->jenisKendaraan ?></td> 
                                <td><?php echo $Kendaraan[$i]->tipeKendaraan ?></td> 
                                <td><?php echo $Kendaraan[$i]->noRangkaKendaraan ?></td> 
                                <td><?php echo $Kendaraan[$i]->noMesinKendaraan ?></td> 
                                <td><?php echo $Kendaraan[$i]->warnaKendaraan ?></td> 
                                <td><?php echo $Kendaraan[$i]->tahunKendaraan ?></td> 
                                <td><?php echo $Kendaraan[$i]->noPolisiKendaraan ?></td> 
                                <td><?php echo $Kendaraan[$i]->statusKepemilikanKendaraan ?></td> 
                                <!-- <td><a data-toggle="modal" data-target="#modalDataPembelianKendaraan" onclick="return viewDataBeli('<?php echo $Kendaraan[$i]->IDKendaraan ?>');">Lihat</a></td> -->
                                <td><a data-toggle="modal" data-target="#modalDataPembelianKendaraan" onclick="return viewDataBeli('<?php echo $Kendaraan[$i]->IDKendaraan ?>');">Lihat</a></td>
                                <td><a data-toggle="modal" data-target="#modalDelete" onclick="return deleteData('<?php echo $Kendaraan[$i]->IDKendaraan ?>');">Delete</a></td>
                                <td><a href="<?php echo base_url(); ?>Kendaraan/index/<?php echo $Kendaraan[$i]->IDKendaraan; ?>">Edit</a></td>
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
<?php $this->load->view('modalDataPembelianKendaraan'); ?>

<script type="text/javascript">
function deleteData(id)
{
    document.location = '<?php echo base_url(); ?>Kendaraan/deleteKendaraan/'+id;
}
/*function viewDataBeli(id)
{
    document.location = '<?php echo base_url(); ?>Kendaraan/getKendaraanByID/'+id;
}*/

function viewDataBeli(id)
{
    event.preventDefault();

    $.ajax(
        {
            type:"post",
            url: "<?php echo base_url(); ?>Kendaraan/getKendaraanByID",
            dataType:"json",
            data:{ IDKendaraan:id},
            success:function(response)
            {
                $('input[name=noStokModal]').val(response.noStok);
                $('input[name=tglBeliModal]').val(response.tglBeli);
                $('input[name=beliDariModal]').val(response.beliDari);
                $('input[name=hargaBeliModal]').val(response.hargaBeli);

                len = response.listCaraBayar.length;
                if(len > 0){
                    $("#IDCaraBayarModal option").remove();
                    for (var i = 0; i < response.listCaraBayar.length; i++) {
                        if(response.IDCaraBayar == response.listCaraBayar[i].IDCaraBayar){
                            $('#IDCaraBayarModal').append('<option value='+response.listCaraBayar[i].IDCaraBayar+' selected>'+response.listCaraBayar[i].namaCaraBayar+'</option>')
                        }else{
                            $('#IDCaraBayarModal').append('<option value='+response.listCaraBayar[i].IDCaraBayar+'>'+response.listCaraBayar[i].namaCaraBayar+'</option>')
                        }
                    }
                }
            },
            error: function() 
            {
                console.log("error");
            }
        }
    );
}

</script>
