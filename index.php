<?php

#Buscando dados na API

    #Personagem Masculina
    $characterM = file_get_contents("https://rickandmortyapi.com/api/character/122");
    $characterMepisode = file_get_contents("https://rickandmortyapi.com/api/episode/13");

    #Personagem Feminina
    $characterF = file_get_contents("https://rickandmortyapi.com/api/character/179");
    $characterFepisode = file_get_contents("https://rickandmortyapi.com/api/episode/6");


#JSON Parse

    #Personagem Masculina
    $parsed_characterM = json_decode($characterM, true);
    $parsed_characterMepisode = json_decode($characterMepisode, true);

    #Personagem Feminina
    $parsed_characterF = json_decode($characterF, true);
    $parsed_characterFepisode = json_decode($characterFepisode, true);

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
                <h1><b><?=$parsed_characterM['name'];?></b></h1>
                <img src="<?=$parsed_characterM['image']?>" alt="Avatar" style="">
                    <div class="container">
                    <p>Status: <?=$parsed_characterM['status'];?></p>
                    <p>Gênero: <?=$parsed_characterM['gender'];?></p>
                    <p>Planeta de Origem: <?=$parsed_characterM['origin']['name'];?></p>
                    <p>Episódio: <?=$parsed_characterMepisode['episode']. "\n - \n" . $parsed_characterMepisode['name'];?></p>

                    </div>
            </div>
        </div>

        <div class="charF">
            <div class="card">
                <h1><b><?=$parsed_characterF['name'];?></b></h1>
                <img src="<?=$parsed_characterF['image']?>" alt="Avatar" style="">
                    <div class="container">
                    <p>Status: <?=$parsed_characterF['status'];?></p>
                    <p>Gênero: <?=$parsed_characterF['gender'];?></p>
                    <p>Planeta de Origem: <?=$parsed_characterF['origin']['name'];?></p>
                    <p>Episódio: <?=$parsed_characterFepisode['episode']. "\n - \n" . $parsed_characterFepisode['name'];?></p>

                    </div>
            </div>
        </div>
    </div>

    <center><footer> DevbyLuxX©2022</footer></center>
</html>

