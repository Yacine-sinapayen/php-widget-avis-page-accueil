<!-- J'importe mes données -->
<?php include_once('db.php'); ?>

<!-- Créattion de la ressource curl -->
<?php $curl = curl_init(); ?>

<!-- Je boucle sur mes données -->
<?php foreach (($avis) as $avis) : ?>
    <article>
        <h3><?php echo $avis['pseudo']; ?></h3>
        <p>Note <?php echo $avis['rating']; ?></p>
        <p> Commentaire <?php echo $avis['comment']; ?></p>
        <p><?php echo $avis['created_at']; ?></p>
    </article>
<?php endforeach ?>