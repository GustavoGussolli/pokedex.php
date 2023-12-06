<?php

    //include 'logica.php';

    $pokemons_api = file_get_contents("https://pokeapi.co/api/v2/pokemon");
    $pokemons = json_decode($pokemons_api , true);

    
    for($i = 0; $i < 20; $i++){

        $pokemon = $pokemons['results'][$i];

        $todas_infos_api = file_get_contents($pokemon['url']);
        $pokemons['results'][$i] = json_decode($todas_infos_api, true);

    }
    
    if(isset($_GET['campo_busca'])){

        $encontrados = [];


        foreach($pokemons['results'] as $poke){
            if(str_contains($poke['name'], $_GET['banco-busca'])){

                $encontrados[] = $poke;

            }

        }

        $pokemons = $encontrados;

    }
    

?>

<html>
    
   
    <head>
        <title>Pokedex</title>

        <style>

        #pesquisa{

            background: black;
            padding: 20px;
            text-align: center;
            
        }

        #pesquisa input[type="text"]{

            width: 300px;
            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 15px;
        }


        #pesquisa input[type="submit"]{

            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 15px;
        }

        .pokemon {

            width: 20%;
            border: solid 5px #000;
            padding: 15px;
            float: left;
            margin: 10px 10px 10px 10px;
            text-align: center;

        }

        .pokemon img{
            max-width: 100%;
            height: 150px;
        }


        </style>

    </head>

    <body>
        
        <div id="pesquisa">
            <form method="get">
                <input type="text" name="campo_busca" placeholder="Digite um Pokémon" >
                <input type="submit" value="Buscar">
            </form>
        </div>

        <?php for($i = 0 ; $i < 8; $i++): ?>
        <div id="pokemons">

            <div class="pokemon">

            <img src="<?= $pokemons['results'][$i]['sprites']['other']['dream_world']['front_default'] ?>" alt="A imagem não está disponivel" width="200px">
            <h1> <?= $pokemons['results'][$i]['name'] ?></h1>
            <p>Peso: x</p>
            <p>Altura: y</p>

            </div>
            <?php endfor; ?>

        </div>

    </body>
</html>
