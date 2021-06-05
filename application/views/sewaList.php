<!-- Page Content -->

<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-angle-double-left fa-3x"></i></a>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="title" style="margin-bottom:0;"><span>List Sewa</span></h1> 
			
            <div class="table-container">
                <div class="col-sm-12">
    				<table class="table" id="tblShow">
    				<thead>
    					<tr>
    						<th>No. </th>
    						<th>No. Piutang</th>
                            <th>Tanggal Pernyataan Sewa</th>
                            <th>Nama Nasabah</th>
                            <th>Harga Dasar</th>
                            <th>Masa Kredit Sewa</th>
                            <th>Angsuran Per Bulan</th>
                            <th>Kredit Terakhir Ke-</th>
                            <th>Nama Sales</th>
                            <th>Detail</th>                                
    					</tr>
    				</thead>
    				<tbody>
    					<?php for($i=0;$i<count($listSewa);$i++){ ?>
                        <tr>
    						<td><?php echo $i+1 ?></td>
    						<td><?php echo $listSewa[$i]->noPiutang ?></td>  
                            <td><?php echo date("j M Y",strtotime($listSewa[$i]->tglPernyataanSewa));?></td>
                            <td><?php echo $listSewa[$i]->namaNasabah ?></td> 
                            <td><?php echo $listSewa[$i]->HDKSewa ?></td> 
                            <td><?php echo $listSewa[$i]->masaKreditSewa." bulan" ?></td> 
                            <td><?php echo $listSewa[$i]->angsuranPerBulan ?></td> 
                            <td><?php echo "Ke-".$listSewa[$i]->kreditTerakhirKe ?></td> 
                            <td><?php echo $listSewa[$i]->namaSales ?></td> 
                            <td><a href="<?php echo base_url(); ?>Sewa/viewDetail/<?php echo $listSewa[$i]->noPiutang; ?>">View Detail</a></td>
    					</tr>
                        <?php } ?>
    				</tbody>
    				</table>
                </div>
            </div>
        </div>
    </div>
</div>