

//play and stop sound

function PlaySound(soundobj) {
    var thissound=document.getElementById(soundobj);
    thissound.play();
  }
  
  function StopSound(soundobj) {
    var thissound=document.getElementById(soundobj);
    thissound.pause();
    thissound.currentTime = 3500;
  }
  
  function updateDiv()
{ 
    $( "#main" ).load(window.location.href + " #main" );
}
  