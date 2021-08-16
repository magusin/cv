<?php 
$pokemons = $viewVars['pokemons'];

if(!empty($pokemons)) {
   
    foreach($pokemons as $pokemon): ?>
 <a href=" <?= $_SERVER['BASE_URI']. '/detail/'. $pokemon->getNumero(); ?>" class="main">
    <div class="container" >
        <div class="card transform" >
            <img src="<?=$_SERVER['BASE_URI']?>/img/<?= $pokemon->getNumero()?>.png " class="card-img-top" alt="...">
            <div class="card-body mx-auto">
            <h5 class="card-title text-center">#<?= $pokemon->getNumero()?> <?= $pokemon->getNom() ?></h5>   
            </div>
        </div>
        </a>
    </div>
    <?php endforeach;
   
} else {
    echo "Oups, je n'ai rien trouvé !";
}