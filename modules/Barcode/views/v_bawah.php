</div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="background: #021e4f">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <h3>Apakah anda yakin data ini akan <b>dihapus</b>?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <a class="btn btn-primary" id="btn-yes">Ya</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<!-- script datatables -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>

<script>
 function set_url(url) {
    $('#btn-yes').attr('href',url);
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

    //input form
    $('#form').submit(function(e){
        e.preventDefault();
        
         var formData = new FormData($("#form")[0]);                 
        
         $.ajax({
           url: $("#form").attr('action'),
           type: 'post' ,
           data: formData,
           dataType: 'json',
           contentType : false,
           processData : false,
           success: function(response) {
             if(response.success === true) {

               $('.form-group').removeClass('has-error')
                               .removeClass('has-success');
               $('.text-danger').remove();
               $("#form")[0].reset();

              if(typeof(response.redirect) !== 'undefined')
              {
                document.location.href = response.redirect;
              }            
             if(typeof(response.info) !== 'undefined')
              {
                $("#konf").html(response.info);
              }  

             } else {
               $.each(response.messages,function(key, value){
                 var element = $('#' + key);
                 element.closest('div.form-group')
                 .removeClass('has-error')
                 .addClass(value.length > 0 ? 'has-error' : 'has-success')
                 .find('.text-danger')
                 .remove();
                 element.after(value);
               });
             }
           }
        });
    });

    </script>
<script> window.setTimeout(function() { $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 3000); </script> 
</body>
</html>
