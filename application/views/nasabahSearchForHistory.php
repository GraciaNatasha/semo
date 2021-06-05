<!-- Page Content -->
    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-angle-double-left fa-3x"></i></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title" style="margin-bottom:0;"><span>Histori Nasabah</span></h1> 
				<div class="form-container">
					<form action="<?php echo base_url().'Nasabah/searchByName'; ?>" method="post" enctype="multipart/form-data">
                        <h3 class="title"><span>Cari Nasabah</span></h3>   
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Nama :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Nasabah" maxlength="5" <?php if($namaNasabah!=""){echo "value=\"".$namaNasabah."\"";} ?> >
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default btn-maximize" style="margin-top:0;">Cari</button>
                            </div>
                        </div>  
                    </form>
                </div>  
            </div>  
            <div class="col-lg-12">
                <div style="border-bottom: 1px solid black;margin-bottom: 1em;" class="col-md-12"></div>
                    <div class="form-container">   
                        <!-- list -->
                        <?php if($namaNasabah!=""){?>
                        <div class="row">
                            <div class="col-lg-12"> 
                                <div class="form-container">
                                    <h3 class="title" style="margin-bottom:0;"><span>List Nasabah</span></h3>

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
                                                    <th>View Histori</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for($i=0;$i<count($listNasabah);$i++){ ?>
                                                <tr>
                                                    <td><?php echo $i+1 ?></td>
                                                    <td><?php echo $listNasabah[$i]->nama ?></td>  
                                                    <td><?php echo $listNasabah[$i]->alamat ?></td> 
                                                    <td><?php echo $listNasabah[$i]->tglLahir ?></td> 
                                                    <td><?php echo $listNasabah[$i]->noTelp ?></td>  
                                                    <td><?php if(is_null($listNasabah[$i]->email)){echo "-";}else{echo $listNasabah[$i]->email;} ?></td> 
                                                    <td><?php echo $listNasabah[$i]->namaAgama ?></td> 
                                                    <td><?php echo $listNasabah[$i]->noKTP ?></td> 
                                                    <td><a href="<?php echo base_url(); ?>Nasabah/getHistori/<?php echo $listNasabah[$i]->IDNasabah; ?>">View</a></td>
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
            </div>
        </div>
    </div>
<!-- /#page-content-wrapper -->

<?php $this->load->view('modalDelete'); ?>

<script type="text/javascript">


</script>
