
  
   
    <?php  $types = $viewVars['types'];

    if(!$types) {
        echo "Oups, aucun type trouvé !";
    } else {
        
        foreach ($types as $type): ?>
        <div class="d-grid gap-2 type rounded-3 ">
        <a href="<?= $_SERVER['BASE_URI'] . '/type/' . $type->getId() ?>">
        <button type="button" class="btn btn-secondary height-25%" href="#" style="background-color:#<?=$type->getColor()?>">
        <h5 class="mx-auto"><?php echo $type->getName() ?></h5>
        </div>
        </a>
        <?php endforeach;
    }?>

 
