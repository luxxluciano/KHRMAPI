<?php

$stream_opts = [
    "ssl" => [
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ]
];  



$idPM = rand(1, 15);
$idPF = rand(1, 4);
$idM = rand(0, 19);
$idF = rand(0, 19);
#Buscando dados na API

    #Personagem Masculina
    $characterM = file_get_contents("https://rickandmortyapi.com/api/character/?page=$idPM&status=alive&gender=male", false, stream_context_create($stream_opts));
#var_dump($characterM);
    #Personagem Feminina
    $characterF = file_get_contents("https://rickandmortyapi.com/api/character/?page=$idPF&status=alive&gender=female", false, stream_context_create($stream_opts));
   
#JSON Parse

    #Personagem Masculina
    $parsed_characterM = json_decode($characterM, true);
    $pre_parsed_characterMepisode = file_get_contents($parsed_characterM["results"][$idM]["episode"][0], false, stream_context_create($stream_opts));
    $parsed_characterMepisode = json_decode($pre_parsed_characterMepisode, true);


    #Personagem Feminina
    $parsed_characterF = json_decode($characterF, true);
    $pre_parsed_characterFepisode = file_get_contents($parsed_characterF["results"][$idF]["episode"][0], false, stream_context_create($stream_opts));
    $parsed_characterFepisode = json_decode($pre_parsed_characterFepisode, true);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>DEVKH Rick & Morty </title>
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100&family=Carter+One&family=Indie+Flower&family=Inspiration&family=Palette+Mosaic&display=swap" rel="stylesheet">
        
        
    </head>
    <div class="header">
 <!-- partial:index.partial.html -->
 <div class="back" id="world"></div>
        <!-- partial -->

        <button class="button" onClick="window.location.reload();">
            <img src="https://www.nicepng.com/png/detail/112-1129179_rick-and-morty-portal-gun-transparent-ricks-portal.png" alt="Rick And Morty Portal Gun Transparent - Ricks Portal Gun@nicepng.com">
                
            </img>
        </button>
        <audio id='mySound' src='./media/xxx.mp3'></audio>
        <button class="button" onClick="PlaySound('mySound')" onmouseover="StopSound('mySound')">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRS-Q0L893UHgOtdK-ViNFeXULqTxZ2Le7fPA&usqp=CAU" alt="Fart">
                
            </img>
        </button>
    </div>
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

    <script type="text/javascript" src='./js/functions.js'> </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/dat-gui/0.7.7/dat.gui.min.js'></script><script type="module" src="./js/script.js"></script>
</html>
