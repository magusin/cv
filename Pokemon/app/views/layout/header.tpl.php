
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="<?=$_SERVER['BASE_URI']?>/css/style.css" rel="stylesheet">
    <title>Pokedex</title>
</head>

<body>
<header>
    <ul class="nav nav-pills mb-3 header-nav" id="pills-tab" role="tablist">
    <li class="nav-item">
    <a class="nav-link" href="<?= $router->generate('homepage') ?>">Pokédex <span class="sr-only"></span></a>
    </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= $router->generate('list') ?>">Liste <span class="sr-only"></span></a>
        </li>
       
        <li class="nav-item">
        <a class="nav-link" href="<?= $router->generate('types-list') ?>">Types <span class="sr-only"></span></a>
        </li>
    </ul>
    </header>

