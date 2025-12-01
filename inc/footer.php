
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © <a href="mailto:celestinrushigiradonnie@gmail.com">Celestin Rushigira</a> 2025</p>
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

    <!-- Datatable -->
    <script src="assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/plugins-init/datatables.init.js"></script>

    <script>
    // date de départ envoyée par PHP
    var departDate = new Date("<?= $depart ?>").getTime();

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = departDate - now;

        if (distance <= 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "Déjà parti";
            return;
        }

        var days  = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var mins  = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var secs  = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML =
            "Départ dans " + days + " j " + hours + " h " + mins + " min " + secs + " s";
    }, 1000);
    </script>

    <!-- <script>
        // Dates envoyées par PHP
        var allerDate  = new Date("<?= $aller ?>").getTime();
        var retourDate = new Date("<?= $retour ?>").getTime();

        // durée totale du séjour (ms)
        var total = retourDate - allerDate;

        var x = setInterval(function () {
            // on décrémente à partir de la durée totale
            total -= 1000; // on enlève 1 seconde à chaque tick

            // Si on a atteint ou dépassé la fin
            if (total <= 0) {
                clearInterval(x);
                document.getElementById("countdown-retour").innerHTML = "Séjour terminé";
                return;
            }

            var days  = Math.floor(total / (1000 * 60 * 60 * 24));
            var hours = Math.floor((total % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var mins  = Math.floor((total % (1000 * 60 * 60)) / (1000 * 60));
            var secs  = Math.floor((total % (1000 * 60)) / 1000);

            document.getElementById("countdown-retour").innerHTML =
                "Il reste " + days + " j " + hours + " h " + mins + " min " + secs + " s entre le départ et le retour";
        }, 1000);
    </script> -->

    <script>
    // Dates envoyées par PHP
    var allerDate  = new Date("<?= $aller ?>").getTime();
    var retourDate = new Date("<?= $retour ?>").getTime();

    // Durée totale du séjour (ms)
    var totalSejour = retourDate - allerDate;

    var x = setInterval(function () {
        var now = new Date().getTime();

        // 1) Tant que la date de départ n'est pas atteinte
        if (now < allerDate) {
            var avantDepart = allerDate - now;

            var d  = Math.floor(avantDepart / (1000 * 60 * 60 * 24));
            var h  = Math.floor((avantDepart % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var m  = Math.floor((avantDepart % (1000 * 60 * 60)) / (1000 * 60));
            var s  = Math.floor((avantDepart % (1000 * 60)) / 1000);

            document.getElementById("countdown-retour").innerHTML =
                "Départ dans " + d + " j " + h + " h " + m + " min " + s + " s";
            return; // on sort de la fonction, on ne touche pas encore au séjour
        }

        // 2) Une fois la date de départ atteinte, on commence le compte à rebours du séjour
        totalSejour -= 1000; // on enlève 1 seconde à chaque tick

        if (totalSejour <= 0) {
            clearInterval(x);
            document.getElementById("countdown-retour").innerHTML = "Séjour terminé";
            return;
        }

        var days  = Math.floor(totalSejour / (1000 * 60 * 60 * 24));
        var hours = Math.floor((totalSejour % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var mins  = Math.floor((totalSejour % (1000 * 60 * 60)) / (1000 * 60));
        var secs  = Math.floor((totalSejour % (1000 * 60)) / 1000);

        document.getElementById("countdown-retour").innerHTML =
            "Il reste " + days + " j " + hours + " h " + mins + " min " + secs + " s de séjour";
    }, 1000);
    </script>



        <script>
            function normalizeFromString(str) {
                const d = new Date(str);
                d.setHours(0, 0, 0, 0);
                return d;
            }

            const dateDepart = normalizeFromString("<?= $aller ?>");
            const dateRetour = normalizeFromString("<?= $retour ?>");

            const span = document.getElementById("countdown-retour");

            setInterval(function () {
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            // 1) Avant la date de départ : ne rien compter
            if (today.getTime() < dateDepart.getTime()) {
                span.innerHTML = "";   // ou par exemple: "Séjour pas encore commencé"
                return;
            }

            // 2) Après la date de retour : séjour terminé
            if (today.getTime() > dateRetour.getTime()) {
                span.innerHTML = "Séjour terminé";
                return;
            }

            // 3) Entre départ et retour : compter les jours restants
            const diff = dateRetour.getTime() - today.getTime();
            const jours = Math.floor(diff / (1000 * 60 * 60 * 24));

            span.innerHTML = "Il reste " + jours + " jours de séjour";
        }, 1000);
        </script>



</body>

</html>