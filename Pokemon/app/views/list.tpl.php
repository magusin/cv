<body>
    <main>
    
    <h2>Cliquez sur un type pour voir tous les Pokémon de ce type</h2>
    <?php foreach($homePokemons as $homePokemon): ?>
    <div class="container">
        <div class="card ">

            <img src="<?=$_SERVER['BASE_URI']?>/img/<?= $homePokemon->getNumero()?>.png " class="card-img-top" alt="...">
            <div class="card-body mx-auto">
            <h5 class="card-title">#<?= $homePokemon->getNumero()?> <?=$homePokemon->getNom();?></h5>
        </div>
    </div>

    </div>
    <?php endforeach; ?>
        
    </main>
</body>

</html>

