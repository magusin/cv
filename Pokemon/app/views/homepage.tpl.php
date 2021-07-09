<body>
    <main>
        
    <?php foreach($homePokemons as $homePokemon): ?>
        <a href=" <?= $router->generate('pokemon-detail', ['numero'=> $homePokemon->getNumero()]) ?>" class="main">
    <div class="container">
    
        <div class="card transform">
            <img src="<?=$_SERVER['BASE_URI']?>/img/<?= $homePokemon->getNumero()?>.png " class="card-img-top" alt="...">
            <div class="card-body mx-auto">
            <h5 class="card-title text-center">#<?= $homePokemon->getNumero()?> <?= $homePokemon->getNom() ?></h5>   
            </div>
        
        </div>

        </a>
    </div>
    
    <?php endforeach; ?>
        
    </main>
</body>

</html>

