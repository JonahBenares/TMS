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
                "lengthMenu": [[50, 70, 100, -1], [50, 70, 100, "All"]]
            });
        });
    </script>
    <script type="text/javascript">
        function confirmationDelete(anchor){
            var conf = confirm('Are you sure you want to delete this record?');
            if(conf)
            window.location=anchor.attr("href");
        }

        $(document).on("click", "#updateComp_button", function () {
             var company_id = $(this).attr("data-id");
             var company_name = $(this).attr("data-name");
             $("#company_id").val(company_id);
             $("#company_name").val(company_name);
        });

        $(document).on("click", "#updateDept_button", function () {
             var department_id = $(this).attr("data-id");
             var department = $(this).attr("data-name");
             $("#department_id").val(department_id);
             $("#department").val(department);
        });

        $(document).on("click", "#updateEmp_button", function () {
             var employee_id = $(this).attr("data-id");
             var employee = $(this).attr("data-name");
             $("#employee_id").val(employee_id);
             $("#employee").val(employee);
        });

        $(document).on("click", "#updateRem_button", function () {
             var reminder_id = $(this).attr("data-id");
             var notes = $(this).attr("data-name");
             var employee = $(this).attr("data-aa");
             var due_date = $(this).attr("data-bb");
             var status = $(this).attr("data-cc");
             $("#reminder_id").val(reminder_id);
             $("#notes").val(notes);
             $("#employee").val(employee);
             $("#due_date").val(due_date);
             $("#status").val(status);
        });
    </script>
</body>

</html>