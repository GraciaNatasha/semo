<!-- Page Content -->
    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-angle-double-left fa-3x"></i></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title" style="margin-bottom:0;"><span>Bayar Sewa</span></h1> 
				<div class="form-container">
					<form action="<?php echo base_url().'Sewa/getListDetailForPayment'; ?>" method="post" enctype="multipart/form-data">
                        <h3 class="title"><span>Cari Data Piutang</span></h3>   
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>No. Piutang :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="noPiutang" placeholder="No. Piutang" maxlength="5" <?php if($noPiutang!=""){echo "value=\"".$noPiutang."\"";} ?> >
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>No. Polisi Kendaraan :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="noPolisi" placeholder="No. Polisi" maxlength="15" <?php if($noPolisi!=""){echo "value=\"".$noPolisi."\"";} ?> >
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
                        <?php if($noPiutang!="" || $noPolisi!=""){?>
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
                                                    <th>Total Harus Dibayar</th>
                                                    <th>Status</th>                               
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $totalBayar=0;
                                                for($i=0;$i<count($dataDetailSewa);$i++){ ?>
                                                <tr>
                                                    <td><?php echo $dataDetailSewa[$i]->sewaKe ?></td>  
                                                    <td><?php echo date("j M Y",strtotime($dataDetailSewa[$i]->tglJatuhTempo));?></td>
                                                    <td><?php echo $dataDetailSewa[$i]->nominal; $totalBayar += $dataDetailSewa[$i]->nominal;?></td> 
                                                    <td><?php if($dataDetailSewa[$i]->statusLunas == "B" || $dataDetailSewa[$i]->statusLunas == "S"){$today = new DateTime();$dateJatuhTempo=date_create($dataDetailSewa[$i]->tglJatuhTempo); if($today > $dateJatuhTempo){$diff = date_diff($today, $dateJatuhTempo);$denda = 0.004 * $diff->days * $dataDetailSewa[$i]->nominal; echo $denda; $totalBayar += $denda;}else{echo $dataDetailSewa[$i]->denda;}}else if($dataDetailSewa[$i]->statusLunas == "L"){echo $dataDetailSewa[$i]->denda;} ?></td> 
                                                    <td><?php echo $totalBayar; ?></td>
                                                    <td><?php if($dataDetailSewa[$i]->statusLunas == "B"){echo "Belum Lunas";}else if($dataDetailSewa[$i]->statusLunas == "S"){echo "Lunas Sebagian";}else if($dataDetailSewa[$i]->statusLunas == "L"){echo "Lunas";} ?></td> 
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-sm-offset-9 col-sm-2" style="margin-top:1em;">
                                        <a href="<?php echo base_url().'Kuitansi/paySewa/'.$noPiutang ?>" class="btn btn-default btn-maximize"style="margin-top:0;">Bayar</a>
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