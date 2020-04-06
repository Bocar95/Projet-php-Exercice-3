<?php
    require_once('exo3_fontions.php');

    $formValide= false;
    $conservation=false;
    $nombre="";
    $mots="";
    $r1='M';
    $r2='m';
    $msg_erreur="";
    $msg_erreur_mot="";
    $msgFinal="";
    
//VALIDATION DU PREMIER INPUT CONSTITUANT LE NOMBRE DE CHAMP DE SAISI QU'ON VEUT GENERER.

    if (isset($_POST['envoie'])){        
        if (is_number($_POST['nombre'])){
            $nombre=$_POST['nombre'];
            $formValide= true;
        }else
            if (is_lower($_POST['nombre']) || is_uper($_POST['nombre'])){
                $msg_erreur="Veullez saisir un caractere numerique.";
            }else
                if (!is_entier($_POST['nombre'])){
                    $msg_erreur="Veullez saisir un nombre positif.";
                }
    }

//VALIDATION DES INPUTS CONSTITUANT LES MOTS.

    if (isset($_POST['envoie2'])){
        $formValide= true;
        $nombre=$_POST['nombre'];
        $cpt=0;
        for ($i=1; $i<=$nombre; $i++){
            if (is_valide($_POST['nombre'.$i]) && ( 20 >= my_strlen($_POST['nombre'.$i]))){
                $mots= $_POST['nombre'.$i];
                if (count_char_in_string($r1, $r2, $mots)){
                    $cpt++;
                }                        
                }else
                    if (!(is_valide($_POST['nombre'.$i]))){
                        $msg_erreur_mot="Saisir un mot constitué uniquement de lettre alphabetique.";
                    }else
                        if (!( 20 >= my_strlen($_POST['nombre'.$i]))){
                            $msg_erreur_mot="Sur le mot N°: $i, le nombre de caractere ne doit pas etre superieur a 20.";
                        }
        }
        $msgFinal="Vous avez saisi $nombre mots dont $cpt avec la lettre M(m).";
    }
           
?>

<!-- PARTIE HTML POUR L'AFFICHAGE DES INPUTS -->

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!-- AFFICHAGE DU PREMIER INPUT CONTENANT LE NOMBRE DE CHAMP QU'ON VEUT GENERER. -->
    <center>
        <p>Saisir le nombre de mots que vous allez saisir.</p>
        <form method="POST" action="">
            <input type="text" name="nombre" placeholder="Saisir" value="<?= $nombre; ?>" style="width: 20%;">
            <input type="submit" name="envoie" value="envoie">
            <br>
            <br>
            <span class="erreur" style="text-align: center; color: red;"><strong> <?= $msg_erreur ?> </strong></span>
            <br>
            <br>
            
<!-- AFFICHAGE DES INPUTS CONTENANT LES MOTS. -->
        <?php
        if ($formValide){
            $nombre=$_POST['nombre'];
        ?>
                <form method="POST" action="">
        <?php
                for ($i=1; $i<=$nombre; $i++){
        ?>
                   
        <?php
                    echo 'MOT N°:' .$i;
        ?>                   
                    <span class="erreur" style="text-align: center; color: red;"><strong> <?= $msg_erreur_mot ?> </strong></span>
                    <br>                    
                    <input type="text" name="nombre<?php echo $i; ?>"  placeholder="Saisir un mot" style="width: 20%;">
                    <br>
                    <br>
            <?php
                }
            ?>
                <input type="submit" name="envoie2" value="envoie2" style="background-color: green; color: white; width: 10%; margin-left: 40%; float: left;">
                
<!-- AFFICHAGE DU MESSAGE FINAL. --> <!-- AFFICHAGE DU MESSAGE FINAL. --> <!-- AFFICHAGE DU MESSAGE FINAL. -->

                <span class="erreur_mot" style="width: 30%; height: 70px; padding: 5px; text-align: center; margin-left: 35%; margin-top: 3%; color: white; font-size: 25px; background-color: #303030; float: left;">
                    <strong> <?= $msgFinal ?> </strong>
                </span>
            </form>      
        <?php
        
        }
        ?>
        
    </center>
    </form>

    </body>
</html>