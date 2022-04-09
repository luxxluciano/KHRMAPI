<?php

$stream_opts = [
    "ssl" => [
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ]
];  


#Variáveis para randomização dos personagens
$idPM = rand(1, 30);
$idPF = rand(1, 7);
$idM = rand(0, 19);
$idF = rand(0, 19);

#Buscando dados na API

    #Personagem Masculina
    $characterM = file_get_contents("https://rickandmortyapi.com/api/character/?page=$idPM&gender=male", false, stream_context_create($stream_opts));

    #Personagem Feminina
    $characterF = file_get_contents("https://rickandmortyapi.com/api/character/?page=$idPF&gender=female", false, stream_context_create($stream_opts));
   
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