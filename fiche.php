<?php
require('assets/fpdf/fpdf.php');
require('conf/dbcon.php');
class PDF extends FPDF {
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Times','I',8);
        $this->MultiCell(0,5,'NB : Ce document est a deposer dans un delai minimum de 30 jours avant la date de depart.',0,'C');
    }
}
$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$pdf->Ln(5); // espace en haut de page

//Logo (ajouter le chemin correct si vous avez le logo)
$pdf->Image('assets/images/logo_uea.jpg', 10, 10, 30);

$pdf->SetFont('Times','B',16);
$pdf->Cell(0,10,utf8_decode('UNIVERSITE EVANGELIQUE EN AFRIQUE'),0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,6,utf8_decode('B.P. 3323 et 266 Bukavu / Republique Democratique du Congo'),0,1,'C');
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,255);
$pdf->Cell(0,6,utf8_decode('E-mail : ueabukavu@yahoo.fr'),0,1,'C');
$pdf->SetTextColor(0,0,0);
$pdf->Ln(1);
$pdf->Cell(0,5,'__________________________________________________________________________________________________________',0,2);

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,utf8_decode('SECRETARIAT GENERAL CHARGE DE LA RECHERCHE'),0,1,'C');
$pdf->Ln(5);
$pdf->Cell(0,8,utf8_decode('DOCUMENT DE REGLEMENTATION DE LA MOBILITE DES ENSEIGNANTS'),0,1,'C');
$pdf->Ln(5);
if (isset($_GET['id'])) {
    $fiche_id = $_GET['id'];
    $query = "SELECT agents.*, demande_bourse.*, faculte.*, departement.* FROM demande_Bourse 
    INNER JOIN agents ON demande_bourse.id_ut_bour_fk = agents.id
    INNER JOIN faculte ON agents.id_faculte = faculte.id
    INNER JOIN departement ON agents.id_departement = departement.id
    WHERE demande_bourse.id_ut_bour_fk='$fiche_id'";
$demande_run = mysqli_query($con, $query);

while($list = mysqli_fetch_assoc($demande_run)) {
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,8,utf8_decode('I.   Information sur le requerant'),0,1);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,7,utf8_decode('Noms :    '. $list['nom'] . ' ' . $list['postnom'] . ' ' . $list['prenom']),0,1);
$pdf->Cell(0,7,utf8_decode('Grade :   ' . $list['Grade']),0,1);
$pdf->Cell(0,7,utf8_decode('Contacts (Email et téléphone) :   ' . $list['email'] . ' / ' . $list['telephone']),0,1);
$pdf->Cell(0,7,utf8_decode('Faculté :   ' . $list['name']),0,1);
$pdf->Cell(0,7,utf8_decode('Departement :   ' . $list['nom_departement']),0,1);
$pdf->Ln(5);

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,8,utf8_decode('II.   Information sur la mobilité (joindre tous les documents y relatifs)'),0,1);

$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,7,utf8_decode('Type de mobilité :   ' . $list['type_mobilite']));
$pdf->Cell(0,7,utf8_decode('Objectif de la mobilité :   ' . $list['objectif_mobilite']),0,1);
$pdf->Cell(0,7,utf8_decode('Durée du séjour :   '    . $list['dure_sejour']),0,1);
$pdf->Cell(0,1,'',0,1);
$pdf->SetFont('Times','IB',9);
$pdf->MultiCell(0,7,utf8_decode('NB : Si plus de 3 mois, demander une mise en disponibilité.'));
$pdf->Ln(2);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,7,utf8_decode("Nom de l'organisation d'accueil :   " . $list['organisation_accueil']),0,1);
$pdf->Cell(0,7,utf8_decode('Nom du programme :   ' . $list['programme_intervention']),0,1);
$pdf->Cell(0,7,utf8_decode('Date probable de départ :   ' . $list['date_depart'] . '                                retour :   ' . $list['date_retour']),0,1);
$pdf->Cell(0,7,utf8_decode('Financement de la mobilité :   ' . $list['finance_mobilite']),0,1);
$pdf->Cell(0,7,utf8_decode("Soutien requis de l'UEA :   " . $list['soutient_uea']),0,1);
$pdf->Cell(0,7,utf8_decode('Date et signature du requerant : '),0,1);
$pdf->Ln(5);

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,8,utf8_decode("III.   Situation des prestations et avis du Doyen"),0,1);

$pdf->SetFont('Times','',11);
$pdf->Cell(0,7,utf8_decode("Charge horaire prevue : "),0,1);
$pdf->Cell(0,7,utf8_decode('Charge horaire deja prestée : '),0,1);
$pdf->Cell(0,7,utf8_decode("Nombre d'etudiants sous encadrement : "),0,1);
$pdf->Cell(0,7,utf8_decode('Avis du Doyen : '),0,1);
$pdf->Cell(0,7,utf8_decode("Justification de l'avis : "),0,1);
$pdf->Ln(5);

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,8,utf8_decode('IV.   Avis des autorites de l\'université'),0,1);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,7,utf8_decode('Avis du Secrétaire chargé de Recherche : '),0,1);
$pdf->Cell(0,7,utf8_decode('Avis du Secrétaire  Général Académique : '),0,1);

$pdf->SetFont('Times','B',12);
$pdf->Ln(3);
$pdf->Cell(0,8,utf8_decode('V.   Decision du comite de gestion :'),0,1);
$pdf->SetFont('Times','',11);
$pdf->MultiCell(0,7,utf8_decode("a.  Autorise a la mobilite et a garder son salaire
b.  Autorise a la mobilite avec majoration du salaire
c.  Autorise a la mobilite avec detachement
d.  Autorise a la mobilite avec suppression du salaire
e.  Autorise a la mobilite avec mise en disponibilite
f.  Non autorise a la mobilite"));
$pdf->Ln(5);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,7,utf8_decode('VI.   Autorisation de la Rectrice'),0,1,'C');
$pdf->Ln(15);
$pdf->Cell(0,7,utf8_decode('Date et signature  '),0,1,'C');
}
}
$pdf->Output();
?>
