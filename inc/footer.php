
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © &amp; Concu Par <a href="mailto:celestinrushigiradonnie@gmail.com">Celestin Rushigira</a> 2025</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="assets/vendor/global/global.min.js"></script>
    <script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/js/dlabnav-init.js"></script>

    <!-- Svganimation scripts -->
    <script src="assets/vendor/svganimation/vivus.min.js"></script>
    <script src="assets/vendor/svganimation/svg.animation.js"></script>
    <script src="assets/js/styleSwitcher.js"></script>

        <!-- Toastr -->
    <script src="assets/vendor/toastr/js/toastr.min.js"></script>

    <!-- All init script -->
    <script src="assets/js/plugins-init/toastr-init.js"></script>
    <script>
        <?php if (!empty($toast)): ?>
            toastr.<?php echo $toast['type']; ?>("<?php echo addslashes($toast['message']); ?>");
        <?php endif; ?>
    </script>

    <!-- pickdate -->
    <script src="assets/vendor/pickadate/picker.js"></script>
    <script src="assets/vendor/pickadate/picker.time.js"></script>
    <script src="assets/vendor/pickadate/picker.date.js"></script>

    <!-- Pickdate -->
    <script src="assets/js/plugins-init/pickadate-init.js"></script>

</body>

</html>