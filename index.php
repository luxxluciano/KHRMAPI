<?php
$idPM = rand(1, 15);
$idPF = rand(1, 4);
$idM = rand(0, 19);
$idF = rand(0, 19);
#Buscando dados na API

    #Personagem Masculina
    $characterM = file_get_contents("https://rickandmortyapi.com/api/character/?page=$idPM&status=alive&gender=male");
#var_dump($characterM);
    #Personagem Feminina
    $characterF = file_get_contents("https://rickandmortyapi.com/api/character/?page=$idPF&status=alive&gender=female");
   
#JSON Parse

    #Personagem Masculina
    $parsed_characterM = json_decode($characterM, true);
    $pre_parsed_characterMepisode = file_get_contents($parsed_characterM["results"][$idM]["episode"][0]);
    $parsed_characterMepisode = json_decode($pre_parsed_characterMepisode, true);


    #Personagem Feminina
    $parsed_characterF = json_decode($characterF, true);
    $pre_parsed_characterFepisode = file_get_contents($parsed_characterF["results"][$idF]["episode"][0]);
    $parsed_characterFepisode = json_decode($pre_parsed_characterFepisode, true);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>DEVKH Rick & Morty </title>
       
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100&family=Carter+One&family=Indie+Flower&family=Inspiration&family=Palette+Mosaic&display=swap" rel="stylesheet">
        
        <style>
            
            .linha {
                background-color: #303055;
                display: flex;
                flex-flow: row wrap;
                justify-content: space-around;
                height: 500px;
            }

            .card {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                border-radius: 5px; /* 5px rounded corners */
                background-color: #555577;
                color: white;
                font-family: 'Carter One', cursive;
                padding: 1rem;
            }

            /* Add rounded corners to the top left and the top right corner of the image */
            img {
                border-radius: 5px 5px 5px 5px;
                width:100%;
                max-width: 600px;
            }
        </style>
    </head>

    <div class="linha">
        <div class="charM">
            <div class="card">
                <h1><b><?=$parsed_characterM['results'][$idM]['name'];?></b></h1>
                <img src="<?=$parsed_characterM['results'][$idM]['image']?>" alt="Avatar" style="">
                    <div class="container">
                    <p>Status: <?=$parsed_characterM['results'][$idM]['status'];?></p>
                    <p>Gênero: <?=$parsed_characterM['results'][$idM]['gender'];?></p>
                    <p>Planeta de Origem: <?=$parsed_characterM["results"][$idM]['origin']['name'];?></p>
                    <p>Episódio: <?=$parsed_characterMepisode['episode']. "\n - \n" . $parsed_characterMepisode['name'];?></p>

                    </div>
            </div>
        </div>

        <div class="charF">
            <div class="card">
                <h1><b><?=$parsed_characterF['results'][$idF]['name'];?></b></h1>
                <img src="<?=$parsed_characterF['results'][$idF]['image']?>" alt="Avatar" style="">
                    <div class="container">
                    <p>Status: <?=$parsed_characterF['results'][$idF]['status'];?></p>
                    <p>Gênero: <?=$parsed_characterF['results'][$idF]['gender'];?></p>
                    <p>Planeta de Origem: <?=$parsed_characterF['results'][$idF]['origin']['name'];?></p>
                    <p>Episódio: <?=$parsed_characterFepisode['episode']. "\n - \n" . $parsed_characterFepisode['name'];?></p>

                    </div>
            </div>
        </div>
    </div>

    <center><footer> @MEB@v.0.3.0 | DevbyLuxX©2022</footer></center>
</html>
