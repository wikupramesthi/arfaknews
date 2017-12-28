	<!--FOOTER-->
	<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" style="min-height:30px !important;">
		<div class="container-fluid">
			<div class="clearfix"></div>
			<center style="padding-top:5px;">Copyright &copy; 2017. Arfaknews.com, All Rights Reserved.</center>
        </div>
	</nav>

   </div>
   
   <div id="logout" class="modal fade" role="dialog">
    <div class="modal-dialog inner-modal">
     <div class="modal-content">
      <div class="modal-body">
        <p class="text-center">Apakah Anda yakin ingin keluar dari admin panel?</p>
        <div class="row">
            <div class="col-12-xs text-center">
                <button type="button" class="btn btn-danger btn-md btn-popup" data-dismiss="modal">Tidak</button>
                 <a href="<?=base_url()?>login/logout" class="btn btn-default btn-md btn-popup">Ya</a>
            </div>
        </div>
      </div>

    </div>
  </div>
</div>

    <script src="<?=ASSETS_OTHER?>src/js/jscal2.js"></script>
    <script src="<?=ASSETS_OTHER?>src/js/lang/id.js"></script>

    <!-- SB Admin Core JavaScript -->
    <script src="<?=ASSETS_SBADMIN?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=ASSETS_SBADMIN?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=ASSETS_SBADMIN?>vendor/metisMenu/metisMenu.min.js"></script>
    <script src="<?=ASSETS_SBADMIN?>vendor/raphael/raphael.min.js"></script>
    <script src="<?=ASSETS_SBADMIN?>vendor/morrisjs/morris.min.js"></script>
    <script src="<?=ASSETS_SBADMIN?>data/morris-data.js"></script>
    <script src="<?=ASSETS_SBADMIN?>dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">//<![CDATA[

      var cal = Calendar.setup({
		  showTime     	: 24,
          onSelect		: function(cal) { cal.hide() }
      });
      cal.manageFields("f_btn1", "tanggal", "%d-%m-%Y");

    //]]></script>

</body>
</html>
