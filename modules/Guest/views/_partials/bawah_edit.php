</div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
<!-- modal hapus -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="background: #021e4f">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <h3>Mengedit foto akan menghapus foto lama,apakah anda yakin? ?</h3>
            </div>
            <div class="modal-footer">
                <p>*abaikan jika tidak mengedit foto</p>
                <button type="button" class="btn btn-default" data-dismiss="modal">Oke</button>
                <!-- <a class="btn btn-primary" id="btn-yes">Ya</a> -->
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js')?>"></script>
<script src="<?php echo base_url('vendors/popper.js/dist/umd/popper.min.js')?>"></script>
<script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/main.js')?>"></script>


<script src="<?php echo base_url('vendors/chart.js/dist/Chart.bundle.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/dashboard.js')?>"></script>
<script src="<?php echo base_url('assets/js/widgets.js')?>"></script>

<script src="<?php echo base_url('vendors/jqvmap/dist/jquery.vmap.min.js')?>"></script>
<script src="<?php echo base_url('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')?>"></script>
<script src="<?php echo base_url('vendors/jqvmap/dist/maps/jquery.vmap.world.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js')?>"></script>
<script src="<?php echo base_url('assets/jquery/jquery.js')?>"></script>
<script src="<?php echo base_url('assets/dist/js/select2.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/webcam.js')?>"></script>

<script language="Javascript">
        // konfigursi webcam
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpg',
            jpeg_quality: 100
        });
        
        function edit(){
            Webcam.attach( '#camera' );
            document.getElementById('webcam').style.display = '';
            document.getElementById('cap').style.display = 'none';
            document.getElementById('simpan').style.display = 'none';
        }

        function preview() {
            // untuk preview gambar sebelum di upload
            Webcam.freeze();
            // ganti display webcam menjadi none dan simpan menjadi terlihat
            document.getElementById('webcam').style.display = 'none';
            document.getElementById('cap').style.display = 'none';
            document.getElementById('simpan').style.display = '';

        }
        
        function batal() {
            // batal preview
            Webcam.unfreeze();
            Webcam.reset('#camera');
            // ganti display webcam dan simpan seperti semula
            document.getElementById('webcam').style.display = '';
            document.getElementById('cap').style.display = '';
            
            document.getElementById('simpan').style.display = 'none';
        }      

        function simpan2() {
            // ambil foto
            Webcam.snap( function(data_uri) {

                // upload foto
                Webcam.upload( data_uri, '<?php echo base_url('guest/upload')?>', function(code, text) {} );
                
                Webcam.unfreeze();
            } );
        }
    </script>
    <script type="text/javascript">
        function Enableddl(check){
            var ddl=document.getElementById("person");
            var ddl2=document.getElementById("person2");
            ddl.disabled=check.checked ? false : true;
            ddl2.disabled=check.checked ? true : false;
            if(!ddl.disabled){
                ddl.focus();
            }
        }
        function Enableddl2(check){
            var ddl=document.getElementById("person2");
            ddl.disabled=check.checked ? false : true;
            if(!ddl.disabled){
                ddl.focus();
            }
        }
    </script>

    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
    <script type="text/javascript">
       $(document).ready(function(){

          $("#person").select2({
             ajax: { 
               url: '<?php base_url() ?>../guest/getUsers',
               type: "post",
               dataType: 'json',
               delay: 250,
               data: function (params) {
                  return {
                searchTerm: params.term // search term
            };
        },
        processResults: function (response) {
          return {
             results: response
         };
     },
     cache: true
 }
});
      });
  </script>
  <script type="text/javascript">
   $(document).ready(function(){

      $("#id_card").select2({
         ajax: { 
            url: '<?php base_url() ?>../guest/getIdcard',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                searchTerm: params.term // search term
            };
        },
        processResults: function (response) {
          return {
             results: response
         };
     },
     cache: true
 }
});
  });
</script>
<script>
 function set_url(url) {
    $('#btn-yes').attr('href',url);
}
</script>
<script> window.setTimeout(function() { $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 3000); </script> 

</body>
</html>
