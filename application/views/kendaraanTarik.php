<!-- Page Content -->

    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-angle-double-left fa-3x"></i></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title"><span>Tarik Kendaraan</span></h1>                 
                
                <div class="form-container">
                    <form id="formTarik" action="<?php 
                    if($IDTarikKendaraan==0){echo base_url().'Kendaraan/TarikKendaraan';}else{echo base_url().'Kendaraan/editDataTarikKendaraan/'.$IDTarikKendaraan;} ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Nama Nasabah :</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="IDNasabah" id="IDNasabah" class="form-control" required>
                                    <option value="-1">-- Pilih Nasabah -- </option>
                                    <?php $len = count($listNasabah); 
                                    for($i=0;$i<$len;$i++){ ?>
                                        <option value="<?php echo $listNasabah[$i]->IDNasabah; ?>"><?php echo $listNasabah[$i]->nama; ?></option>
                                    <?php } ?>
                                 </select>
                            </div>
                        </div>  
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>No. Polisi :</label>
                            </div>
                            <div class="col-sm-10">                               
                                <select name="IDKendaraan" id="NoPolisi" class="form-control">
                                    <option value="-1">-- Pilih Nasabah Terlebih Dahulu -- </option>
                                 </select>
                            </div>
                        </div>
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Tanggal Tarik :</label>
                            </div>                       
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="tglTarik" required>
                            </div>
                        </div> 
                        <div class="form-group no-padding col-sm-12">
                            <div class="col-sm-2">
                                <label>Nama Penarik :</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="penarik" placeholder="Yang Bertugas Menarik Kendaraan" maxlength="50" required>
                            </div>
                        </div>
                        
                        <input type="hidden" name="statusKepemilikan" value="BJM"> 
                        <div class="form-group no-padding">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-default btn-maximize">Tarik</button>
                            </div>
                        </div>
                    </form>                    
                </div>

                <div class="table-container">
                    <div class="col-sm-12">
                        <table class="table">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Tanggal Tarik</th>
                                <th>Penarik</th>
                                <th>No. Piutang</th>
                                <th>Nama Nasabah </th>
                                <th>Merk</th>
                                <th>Jenis</th>
                                <th>Tipe</th>
                                <th>No. Rangka</th>
                                <th>No. Mesin</th>
                                <th>Warna</th>
                                <th>Tahun</th>
                                <th>No. Polisi</th>
                                <th>Status</th>                          
                                <th>Tebus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=0;$i<count($listKendaraanTarik);$i++){ ?>
                            <tr>
                                <td><?php echo $i+1 ?></td>
                                <td><?php echo $listKendaraanTarik[$i]->tglTarik ?></td>  
                                <td><?php echo $listKendaraanTarik[$i]->penarik ?></td>  
                                <td><?php echo $listKendaraanTarik[$i]->noPiutang ?></td>  
                                <td><?php echo $listKendaraanTarik[$i]->namaNasabah ?></td>  
                                <td><?php echo $listKendaraanTarik[$i]->merkKendaraan ?></td>  
                                <td><?php echo $listKendaraanTarik[$i]->jenisKendaraan ?></td> 
                                <td><?php echo $listKendaraanTarik[$i]->tipeKendaraan ?></td> 
                                <td><?php echo $listKendaraanTarik[$i]->noRangkaKendaraan ?></td> 
                                <td><?php echo $listKendaraanTarik[$i]->noMesinKendaraan ?></td> 
                                <td><?php echo $listKendaraanTarik[$i]->warnaKendaraan ?></td> 
                                <td><?php echo $listKendaraanTarik[$i]->tahunKendaraan ?></td> 
                                <td><?php echo $listKendaraanTarik[$i]->noPolisiKendaraan ?></td> 
                                <td><?php echo $listKendaraanTarik[$i]->statusKepemilikanKendaraan ?></td> 
                                <td><a data-toggle="modal" data-target="#modalTebus" onclick="return changeModal('<?php echo $listKendaraanTarik[$i]->IDTarikKendaraan ?>','<?php echo $listKendaraanTarik[$i]->IDKendaraan ?>');">Tebus</a></td>
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

<?php $this->load->view('modalTebus'); ?>

<script type="text/javascript">
//var currentID = 0;
function changeModal(IDTarikKendaraan,IDKendaraan)
{
    //currentID = IDTarikKendaraan;
    $('#IDTarikKendaraan').val(IDTarikKendaraan);
    $('#IDKendaraan').val(IDKendaraan);
}

$(function(){
    $('#IDNasabah').change(function(event)
    {
        event.preventDefault();
        var IDNasabah= $('#IDNasabah').children("option:selected").val();

        $.ajax(
            {
                type:"post",
                url: "<?php echo base_url(); ?>Kendaraan/getKendaraanForTarikByIDNasabah",
                dataType:"json",
                data:{ IDNasabah:IDNasabah},
                success:function(response)
                {
                    len = response.length;
                    if(len > 0){
                        $("#NoPolisi option").remove();
                        for (var i = 0; i < response.length; i++) {
                            $('#NoPolisi').append('<option value='+response[i].IDKendaraan+'>'+response[i].noPolisiKendaraan+'</option>')
                        }
                    }else{
                        $("#NoPolisi option").remove();
                        $('#NoPolisi').append("<option value='-1'>-- Tidak ada Kendaraan yang dapat DITARIK --</option>")
                    }
                },
                error: function() 
                {
                    console.log("error");
                }
            }
        );
    });
});

</script>
