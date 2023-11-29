<?php 

    //$nome = readline("Inoforme o nome do pokemon: ");//informa o nome para pesquisar

    $short = "p";
    $long = [

        "pokemon:"
    ];

    $options = getopt($short, $long);//informa o nome pelo terminal


    $nome = $options['pokemon']; //procurar o nom
    //print_r($options);
    //die();

    $dados_em_texto = file_get_contents("https://pokeapi.co/api/v2/pokemon/$nome"); //URL para pegar a informação

    $pokemon = json_decode($dados_em_texto , true);

    print("Nome: " . strtoupper($pokemon['name']) . "\n"); //Nome do pokemom
    print("Altura: " . $pokemon['height'] . "\n"); //altura 
    print("Peso: " . $pokemon['weight'] . "\n"); //peso
    print("Movimentos: \n");

    //Mostrar todos os movimentos
    foreach($pokemon['moves'] as $move){

        print(" - " . $move['move']['name'] . "\n");

    }
    print("Movimento: " . $pokemon['moves'][0]['move']['name'] . "\n"); //Mostrar movimento especifico
