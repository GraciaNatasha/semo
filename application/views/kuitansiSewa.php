<!-- Page Content -->
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-angle-double-left fa-3x"></i></a>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="title"><span>Bayar Sewa</span></h1>      
			<div class="form-container">
				<form action="<?php echo base_url().'Kuitansi/calcBayarSewa';?>" method="post" enctype="multipart/form-data">
                    <div class="form-group no-padding col-sm-12">
                        <div class="col-sm-2">
                            <label>No. Kuitansi :</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="noKuitansi" placeholder="No. Kuitansi" maxlength="50" required>
                        </div>
                        <input type="hidden" name="noPiutang" id="noPiutang" <?php echo "value=\"$noPiutang\"" ?> required>
                    </div>  
                    <div class="form-group no-padding col-sm-12">
                        <div class="col-sm-2">
                            <label>Cara Bayar :</label>
                        </div>
                        <div class="col-sm-2">
                            <select name="IDCaraBayar" id="IDCaraBayar" class="form-control">
                                <?php $len = count($listCaraBayar); 
                                for($i=0;$i<$len;$i++){ ?>
                                    <option value="<?php echo $listCaraBayar[$i]->IDCaraBayar; ?>"><?php echo $listCaraBayar[$i]->namaCaraBayar; ?></option>
                                <?php } ?>
                             </select>
                        </div>
                        <div class="col-sm-2 divTglBayar">
                            <label>Tanggal Bayar :</label>
                        </div>
                        <div class="col-sm-2 divTglBayar">
                            <input type="date" class="form-control" name="tglBayar" required>
                        </div>
                    </div>  
                    <div class="form-group no-padding col-sm-12">
                        <div class="col-sm-2">
                            <label>Nominal :</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="nominal" required>                                
                        </div>
                    </div>                         
                    <div class="form-group no-padding col-sm-12">
                        <div class="col-sm-2">
                            <label>Keterangan :</label>
                        </div>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="keterangan" id="keterangan" maxlength="255" placeholder="Keterangan"></textarea>
                        </div>
                    </div> 

                    <div style="border-bottom: 1px solid black;margin-bottom: 1em;" class="col-md-12"></div>

                    <!-- Kuitansi -->
                    <div class="form-group no-padding col-sm-12">
                        <div class="col-sm-2">
                            <label>No. Kuitansi :</label>
                        </div>
                        <div class="col-sm-10">
                            <label id="lblNoKuitansi"></label>
                        </div>
                    </div>
                    <div class="form-group no-padding col-sm-12">
                        <div class="col-sm-2">
                            <label>Tanggal Kuitansi :</label>
                        </div>
                        <div class="col-sm-10">
                            <label id="lblTglKuitansi"></label>
                        </div>
                    </div>
                    <div class="form-group no-padding col-sm-12">
                        <div class="col-sm-2">
                            <label>Tanggal Bayar :</label>
                        </div>
                        <div class="col-sm-10">
                            <label id="lblTglBayar"></label>
                        </div>
                    </div>
                    <div class="form-group no-padding col-sm-12">
                        <div class="col-sm-2">
                            <label>Pemenuhan Sewa Ke :</label>
                        </div>
                        <div class="col-sm-2">
                            <label id="lblPemenuhanSewaKe"></label>
                        </div>
                        <div class="col-sm-offset-4 col-sm-2">
                            <label id="lblPemenuhanSewa"></label>
                        </div>
                    </div>
                    <div class="form-group no-padding col-sm-12">
                        <div class="col-sm-2">
                            <label>Sebagian Sewa Ke :</label>
                        </div>
                        <div class="col-sm-2">
                            <label id="lblSebagianBayarSewaKe"></label>
                        </div>
                        <div class="col-sm-offset-4 col-sm-2">
                            <label id="lblSebagianBayarSewa"></label>
                        </div>
                    </div>
                    <div class="form-group no-padding col-sm-12">
                        <div class="col-sm-2">
                            <label>Bayar denda :</label>
                        </div>
                        <div class="col-sm-10">
                            <label id="lblBayarDenda"></label>
                        </div>
                    </div>
                    <div class="form-group no-padding col-sm-12">
                        <div class="col-sm-2">
                            <label>Total nominal :</label>
                        </div>
                        <div class="col-sm-10">
                            <label id="lblNominalKuitansi"></label>
                        </div>
                    </div>
                    <div class="form-group no-padding col-sm-12">
                        <div class="col-sm-2">
                            <label>Keterangan :</label>
                        </div>
                        <div class="col-sm-10">
                            <label id="lblKeteranganKuitansi"></label>
                        </div>
                    </div>

                    <div class="form-group no-padding">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-default btn-maximize">Bayar</button>
                        </div>
                    </div>
                </form>
			</div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<script type="text/javascript">
$(function(){
    $('input[name=nominal]').change(function(event)
    {
        event.preventDefault();
        var nominal= $('input[name=nominal]').val();
        var noPiutang = $('#noPiutang').val();

        $.ajax(
            {
                type:"post",
                url: "<?php echo base_url(); ?>Kuitansi/calcBayarSewa",
                dataType:"json",
                data:{ noPiutang:noPiutang,nominal:nominal},
                success:function(response)
                {
                    //console.log(response.nominal);
                    console.log(response);
                    $('#lblNominalKuitansi').text("Rp "+response.nominal+",-");
                    $('#lblPemenuhanSewaKe').text(response.pemenuhanSewaKe);
                    $('#lblPemenuhanSewa').text("Rp "+response.pemenuhanSewa+",-");
                    $('#lblSebagianBayarSewaKe').text(response.sebagianSewaKe);
                    $('#lblSebagianBayarSewa').text("Rp "+response.sebagianSewa+",-");
                    $('#lblBayarDenda').text("Rp "+response.denda+",-");

                },
                error: function() 
                {
                    console.log("error");
                }
            }
        );
    });
});

$(document).ready(function(){
    var d = new Date();
    var year = (d.getYear()<1000)?d.getYear()+1900:d.getYear();
    $('#lblTglKuitansi').text(d.getDate()+'/'+d.getMonth()+'/'+String(year));
    $('#lblTglBayar').text(d.getDate()+'/'+d.getMonth()+'/'+String(year));

    $('.divTglBayar').hide();

    $('input[name=noKuitansi]').change(function() {
        $('#lblNoKuitansi').text($('input[name=noKuitansi]').val());
    });
    $('#IDCaraBayar').change(function() {
        var IDCaraBayar = $('#IDCaraBayar').children("option:selected").val();
        if(IDCaraBayar == 1){
            //manual
            $('input[name=tglBayar]').val("");
            $('.divTglBayar').hide();
            $('#lblTglBayar').text(d.getDate()+'/'+d.getMonth()+'/'+String(year));
        }else if(IDCaraBayar == 2){
            //trf BCA
            $('.divTglBayar').show();
        }
    });    
    $('input[name=tglBayar]').change(function() {
        $('#lblTglBayar').text($('input[name=tglBayar]').val());
    });
    /*$('input[name=nominal]').change(function() {
        $('#lblNominalKuitansi').text($('input[name=nominal]').val());
    });*/
    $('#keterangan').change(function() {
        $('#lblKeteranganKuitansi').text($('#keterangan').val());
    });
});

</script>