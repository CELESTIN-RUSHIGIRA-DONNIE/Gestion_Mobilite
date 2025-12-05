
    <div class="footer">
        <div class="copyright">
            <p>Copyright © <a href="mailto:celestinrushigiradonnie@gmail.com">Celestin Rushigira</a> 2025</p>
        </div>
    </div>

</div>



 
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

<script src="assets/js/sweetalert.min.js"></script>
<script src="assets/js/custom.js"></script>


<script>
    // date de départ envoyée par PHP
    var departDate = new Date("<?= $depart ?>").getTime();

    var x = setInterval(function () {
        var now = new Date().getTime();
        var distance = departDate - now;

        if (distance <= 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "Vous êtes déjà parti";
            return;
        }

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var mins = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var secs = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML =
            "Départ dans " + days + " j " + hours + " h " + mins + " min " + secs + " s";
    }, 1000);
</script>


<script>
  // Parse les dates PHP (format YYYY-MM-DD recommandé)
  function normalizeFromString(str) {
    const d = new Date(str);
    d.setHours(0, 0, 0, 0);
    return d;
  }

  const dateDepart = normalizeFromString("<?= $aller ?>");
  const dateRetour = normalizeFromString("<?= $retour ?>");
  const span = document.getElementById("countdown-retour");

  function formatTime(diff) {
    // Convertir ms en j/h/m/s
    const totalSeconds = Math.floor(diff / 1000);
    const jours = Math.floor(totalSeconds / 86400);
    const heures = Math.floor((totalSeconds % 86400) / 3600);
    const minutes = Math.floor((totalSeconds % 3600) / 60);
    const secondes = totalSeconds % 60;
    
    // Ajouter zéros à gauche
    return {
      jours,
      heures: heures.toString().padStart(2, '0'),
      minutes: minutes.toString().padStart(2, '0'),
      secondes: secondes.toString().padStart(2, '0')
    };
  }

  setInterval(function () {
    const now = new Date();

    // 1) Avant la date de départ : rien
    if (now.getTime() < dateDepart.getTime()) {
      span.innerHTML = "";
      span.className = "fw-bold";
      return;
    }

    // 2) Après la date de retour : terminé
    if (now.getTime() > dateRetour.getTime()) {
      span.innerHTML = "Séjour terminé";
      span.className = "fw-bold text-danger";
      return;
    }

    // 3) Compte à rebours complet
    const diff = dateRetour.getTime() - now.getTime();
    const temps = formatTime(diff);
    
    span.innerHTML = `Il vous reste ${temps.jours}j ${temps.heures}h ${temps.minutes}m ${temps.secondes}s de votre séjour`;
    span.className = "fw-bold text-success";
  }, 1000);
</script>

</body>

</html>