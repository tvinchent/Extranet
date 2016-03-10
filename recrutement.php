<?php
include('inclusion/top.php');
$section='5';
?>
<link rel="stylesheet" type="text/css" href="style/jquery-ui.css" />
<script type="text/javascript" src="script/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function() {
	$("#accordion").accordion();
});
</script>
</head>

<body>
<?php
include('inclusion/header.php');
?>

<div id="main" class="deux_colonne colle">

<img src="image/fond-recrutement.png" alt="shaker" class="gauche_img" width="334" height="565" />
<div class="content_txt">
<h2>Adspring recrute !</h2>

<p class="desc">Vous êtes passionné(e), vous aimez travailler en équipe, vous êtes sérieux(se) mais pas trop quand même... <strong>Rejoignez-nous!</strong></p>

<p class="chapeau">Nous recherchons actuellement :</p>

<div id="accordion">
    <h3><a href="#">Un(e) Chef de Projet</a></h3>
    <div><h4>Votre mission</h4>

<p>Chargé(e) des campagnes d'affiliation menées pour nos clients, vous:</p>

<p>- Concevez les campagnes (définition des segments d'affilié, stratégie et plan d'animation)
- Briefez les webdesigners pour la réalisation des supports visuels,<br />
- Assurez le bon paramétrage des campagnes et êtes garant(e) de leur mise en ligne,<br />
- Recrutez et animez l'ensemble des affiliés,<br />
Pilotez les campagnes en fonction des objectifs des clients,<br />
- Analysez leurs performances, établissez les bilans et présentez vos préconisations.</p>

<h4>Votre profil</h4>

<p>Passionné(e) des problématiques marketing online, vous disposez d'une première expérience.<br />
Aimant les défis vous êtes prêt(e) à vous investir dans le développement d'une agence en pleine croissance,
Vous possédez de fortes capacités relationnelles,
2ème langue ANG/FR souhaitée.</p>

<p>C.D.I. basé à Roubaix (59)<br />
Disponibilité : dès que possible<br />
Rémunération : selon expérience<br /></p></div>
    <h3><a href="#">Second header</a></h3>
    <div>Second content</div>
</div>

</div>


<?php
include('inclusion/footer-institutionnel.php');
include('inclusion/mail-contact.php');
?>
    
</div>

</body>
</html>