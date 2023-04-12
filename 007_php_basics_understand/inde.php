<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles <?php echo
htmlspecialchars($_GET['prenom']); ?> !</p>
<?php
    echo "<hr>"
?>
<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles
    &lt;strong&gt;Badaboum&lt;/strong&gt; !</p>

<?php
    echo "<hr>"
?>

<form action="cible_envoi.php" method="post" enctype="multipart/form-data">
    <p>
        Formulaire d'envoi de fichier :<br />
        <input type="file" name="monfichier" /><br />
        <input type="submit" name="submit" value="Envoyer le fichier" />
    </p>
</form>