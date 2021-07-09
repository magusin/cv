<?php 

$pokemon = $viewVars['pokemonDetail']; 
$types = $viewVars['pokemonTypesList'];

if(!$pokemon) :
    echo "Oups, ce pokémon n'existe pas !";
else: ?>
    <div class="main_pokemon">
        <h1>Détails de <?php echo $pokemon->getNom() ?></h1>
        <div class="wrapper">
            <div class="left_side">
                <img class="illustration" src="<?= $_SERVER['BASE_URI'] . '/img/' . $pokemon->getNumero() . '.png' ?>" alt="<?= $pokemon->getNom() ?>">
            </div>
            <div class="right_side">
                <h2 class="title"><span>#<?= $pokemon->getNumero(); ?></span> <?= $pokemon->getNom() ?></h2>
                <div class="types">
                    <ul>
                        <?php 
                        foreach($types as $type):
                            echo "<li class='type' style='background:#".$type->getColor()."'>" . $type->getName() . "</li>";              
                        endforeach; 
                        ?>
                    </ul>
                </div>
                <div class="stats">
                    <h3>Statistiques</h3>
                    <div class="stat">
                        <div class="label">PV</div>
                        <div class="value"><?php echo $pokemon->getPv() ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon->getPv() * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Attaque</div>
                        <div class="value"><?php echo $pokemon->getAttaque() ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon->getAttaque() * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Défense</div>
                        <div class="value"><?php echo $pokemon->getDefense() ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon->getDefense() * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Attaque Spé.</div>
                        <div class="value"><?php echo $pokemon->getAttaque_Spe() ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon->getAttaque_Spe() * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Défense spé.</div>
                        <div class="value"><?php echo $pokemon->getDefense_Spe() ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon->getDefense_Spe() * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="label">Vitesse</div>
                        <div class="value"><?php echo $pokemon->getVitesse() ?></div>
                        <div class="stat_container">
                            <div class="bar_value" style="width:<?php echo ($pokemon->getVitesse() * 100) / 255 ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="back" href="<?= $_SERVER['BASE_URI'] ?>">Revenir à la liste</a>
    </div>
<?php endif;

