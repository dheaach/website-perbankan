      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 ClownPrince</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core   -->
  <script src="<?php echo base_url('assets/js/plugins/jquery/dist/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
  <!--   Optional JS   -->
  <script src="<?php echo base_url('assets/js/plugins/chart.js/dist/Chart.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/chart.js/dist/Chart.extension.js')?>"></script>
  <!--   Argon JS   -->
  <script src="<?php echo base_url('assets/js/argon-dashboard.min.js?v=1.1.0')?>"></script>
  
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>

<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
            <div class="modal-dialog modal-frame modal-top modal-notify" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 align="left" class="modal-title" id="myModalLabel">Logout</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'login/logout'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <p>Apakah anda yakin ingin keluar dari website ?</b>?</p>
                      </div>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button type="submit" class="btn btn-danger">Logout</button>
                </div>
            </form>
            </div>
            </div>
        </div>
