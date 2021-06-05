<!-- Page Content -->

    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-angle-double-left fa-3x"></i></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title"><span>Nasabah</span></h1>                
				
				<div class="form-container">
					<form action="<?php 
                    if($IDNasabah==0){echo base_url().'Nasabah/addNasabah';}else{echo base_url().'Nasabah/editNasabah/'.$IDNasabah;} ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Nama :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Nasabah" maxlength="50" <?php if($IDNasabah!=0){echo "value=\"".$editNasabah->nama."\"";} ?> required>
                            </div>
                            <div class="col-sm-1">
                                <label>No. KTP:</label>
                            </div>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="noKTP" placeholder="No. KTP Nasabah" maxlength="16" <?php if($IDNasabah!=0){echo "value=\"".$editNasabah->noKTP."\"";} ?> required>
                            </div>
                        </div>  
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Tanggal Lahir :</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" name="tglLahir" placeholder="Tanggal Lahir Nasabah" <?php if($IDNasabah!=0){echo "value=\"".$editNasabah->tglLahir."\"";} ?> required>
                            </div>
                            <div class="col-sm-offset-2 col-sm-1">
                                <label>Agama :</label>
                            </div>
                            <div class="col-sm-2">
                                <select name="IDAgama" id="item" class="form-control">
                                    <?php $len = count($listAgama); 
                                    for($i=0;$i<$len;$i++){ ?>
                                        <option value="<?php echo $listAgama[$i]->IDAgama; ?>" <?php if($IDNasabah!=0 && $listAgama[$i]->IDAgama == $editNasabah->IDAgama){echo "selected";}; ?>><?php echo $listAgama[$i]->namaAgama; ?></option>
                                    <?php } ?>
                                 </select>
                            </div>                            
                        </div>  
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>No. Telpon :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="noTelp" placeholder="No. Telpon Nasabah" <?php if($IDNasabah!=0){echo "value=\"".$editNasabah->noTelp."\"";} ?> required>
                            </div>
                            <div class="col-sm-1">
                                <label>Email :</label>
                            </div>
                            <div class="col-sm-5">
                                <input type="email" class="form-control" name="email" placeholder="Email Nasabah" <?php if($IDNasabah!=0){echo "value=\"".$editNasabah->email."\"";} ?> >
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Alamat :</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat" placeholder="Alamat Nasabah" maxlength="255"><?php if($IDNasabah!=0){echo $editNasabah->alamat;} ?></textarea>                                
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
        						<th>Nama</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                                <th>No. Telpon</th>
                                <th>Email</th>
                                <th>Agama</th>
                                <th>No. KTP</th>
                                <th>Delete</th>
                                <th>Edit</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php for($i=0;$i<count($Nasabah);$i++){ ?>
                            <tr>
        						<td><?php echo $i+1 ?></td>
        						<td><?php echo $Nasabah[$i]->nama ?></td>  
                                <td><?php echo $Nasabah[$i]->alamat ?></td> 
                                <td><?php echo $Nasabah[$i]->tglLahir ?></td> 
                                <td><?php echo $Nasabah[$i]->noTelp ?></td>  
                                <td><?php if(is_null($Nasabah[$i]->email)){echo "-";}else{echo $Nasabah[$i]->email;} ?></td> 
                                <td><?php echo $Nasabah[$i]->namaAgama ?></td> 
                                <td><?php echo $Nasabah[$i]->noKTP ?></td> 
                                <td><a data-toggle="modal" data-target="#modalDelete" onclick="return changeModal('<?php echo $Nasabah[$i]->IDNasabah ?>');">Delete</a></td>
                                <td><a href="<?php echo base_url(); ?>Nasabah/index/<?php echo $Nasabah[$i]->IDNasabah; ?>">Edit</a></td>
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
