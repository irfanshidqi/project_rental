    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>admin_assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>admin_assets/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>admin_assets/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>admin_assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>admin_assets/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url(); ?>admin_assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>admin_assets/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url(); ?>admin_assets/js/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/js/datepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url(); ?>admin_assets/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>

    <script src="<?php echo base_url(); ?>admin_assets/jquery.hotkeys/jquery.hotkeys.js"></script>
    
    <script src="<?php echo base_url(); ?>admin_assets/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url(); ?>admin_assets/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url(); ?>admin_assets/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>admin_assets/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="<?php echo base_url(); ?>admin_assets/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="<?php echo base_url(); ?>admin_assets/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url(); ?>admin_assets/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="<?php echo base_url(); ?>admin_assets/starrr/dist/starrr.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/pdfmake/build/vfs_fonts.js"></script>

    <script src="<?php echo base_url(); ?>admin_aseets/js/jquery.timepicker.min.css"></script>



    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
<!-- javascript numberformat -->

<script type="text/javascript">
  
  $(function () {
    $('#harga_sewa').on('click', function () {
        var x = $('#num').val();
        $('#num').val(addCommas(x));
    });
});
 
function addCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
</script>

    <!-- /Datatables -->
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>admin_assets/js/custom.min.js"></script>
    <script type="text/javascript"> 
		$('.alert-message').alert().delay(4000).slideUp('slow');
    </script>
<!-- ajax dropdown  -->
    <script type="text/javascript">
  

      $(document).ready(function(){

        $(document).on('change', '#merek_mobil', function(){

          var tb_mobil =$(this).val();

          $.ajax({

            url: 'http://localhost/project_rental/rental_mobil/transaksi/tipe_mobil',
            method: 'post',
            data: {
                tb_mobil: tb_mobil
            },
            dataType: 'json',
            success: function(response){
              console.log(response);

              $("#tipe_mobil").empty();

              var list = $("#tipe_mobil");
              $.each(response, function(index, item){

                // list.append(new Option(item.nama_mobil, item.id_mobil));
                list.append('<Option value="'+item.id_mobil+'">'+item.nama_mobil+'</Option>');

                if(item.length >= 1){

                   $('#tipe_mobil').change(function(){

                   var idnya = $('#tipe_mobil').val();

                   $.ajax({
                    url: 'http://localhost/project_rental/rental_mobil/transaksi/getharga',
                    method: 'post',
                    data: {id_mobil:idnya},
                    success: function(data){
                      var halo = JSON.parse(data);
                      // console.log(halo[0].harga_sewa);
                      $('#harga_sewa').val(halo[0].harga_sewa);
                    }
                   });

                })
                } else {
                  $('#tipe_mobil').change(function(){

                   var idnya = $('#tipe_mobil').val();

                   $.ajax({
                    url: 'http://localhost/project_rental/rental_mobil/transaksi/getharga',
                    method: 'post',
                    data: {id_mobil:idnya},
                    success: function(data){
                      var halo = JSON.parse(data);

                      // console.log(halo[0].harga_sewa);
                      $('#harga_sewa').val(halo[0].harga_sewa);
                    }
                   });

                })
                }

              });
            }

          })

        });


      });
    </script>

    <!-- hitung Total harga -->
    <script type="text/javascript">
      

    document.getElementById("tipe_mobil").onchange = notEmpty;


   function gettotal_harga(){
      var tot1=document.getElementById('harga_sewa').value;
      var tot2=document.getElementById('lama').value;
      var tot3=parseFloat(tot1)* parseFloat(tot2);
      
      document.getElementById('total_harga').value=tot3;
  
   }
</script>   


