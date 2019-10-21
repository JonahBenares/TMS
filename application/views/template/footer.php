        <footer class="footer">
            <!-- © 2018 Elegent Admin by wrappixel.com -->
        </footer>
    </div>
    <script src="<?php echo base_url(); ?>assets/dist/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/jquery.dataTables.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/waves.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/sidebarmenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/d3/d3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/c3-master/c3.min.js"></script>
    <!-- <script src="dist/js/dashboard1.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable({
                "order":[0, "desc"],
                "lengthMenu": [[50, 70, 100, -1], [50, 70, 100, "All"]]
            });
        });
    </script>
</body>

</html>