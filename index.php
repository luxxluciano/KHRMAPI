<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>DEVKH Rick & Morty </title>
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100&family=Carter+One&family=Indie+Flower&family=Inspiration&family=Palette+Mosaic&display=swap" rel="stylesheet">
    </head>
        <body>

            <div class="header">
                <!-- partial:index.partial.html -->
                <div class="back" id="world"></div>
                <!-- partial -->
                <audio id='mySound' src='./media/xxx.mp3'></audio>
                <button class="button" onClick= "updateDiv()">
                    <img src="https://www.nicepng.com/png/detail/112-1129179_rick-and-morty-portal-gun-transparent-ricks-portal.png" alt="Rick And Morty Portal Gun Transparent - Ricks Portal Gun@nicepng.com">
        
                    </img>
                </button>
            
            <button class="button" onClick="PlaySound('mySound')" onmouseover="StopSound('mySound')">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRS-Q0L893UHgOtdK-ViNFeXULqTxZ2Le7fPA&usqp=CAU" alt="Fart">
                    
                </img>
            </button>
        </div>

        <div id='main'>
            <?php require_once 'containers/main.php'; ?>
        </div>
        </body>
    
    <?php require_once 'containers/jsscripts.php'; ?> 
    
</html>
