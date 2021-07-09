<h2>Cliquez sur un type pour voir tous les Pokémon de ce type</h2>
<body>
    <main>
        
    <?php foreach($typePokemons as $typePokemon): ?>
    <div class="d-grid gap-2 type rounded-3 ">
        <button type="button" class="btn btn-secondary height-25%" href="#" style="background-color:#<?=$typePokemon->getColor()?>">

        <h5 class="mx-auto"><?= $typePokemon->getName()?></h5>
        </div>
    </div>

    </div>
    <?php endforeach; ?>




    <div id="type">
        
        

    </main>
</body>

</html>










