<!doctype html>
<html lang="de">
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	  <meta name="author" content="Marlon Yasin" />
    <meta name="description" content="Webseite ueber die Acryl Bilder von Marlon Yasin" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="frameworks/pixi.js"></script>
    <script src="frameworks/howler.js"></script>
    <script type="text/javascript" src="classes/Spriteelement.js"></script>
    <title>Delightfull</title>
  </head>
  <style>
    body{
      background-color: black;
    }
    #onscreen{
      image-rendering: pixelated;
    }
    .main{
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .content{
      width: 100%;
      max-width: 1100px;
      background-image: url("images/backgroundohnelogosmall.png");
      background-position: center; /* Center the image */
      background-repeat: no-repeat; /* Do not repeat the image */
      display: flex;
      align-items: center;
      position: relative;
      flex-direction: column;
      padding-bottom: 120px;
    }
    .content::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 50px;
      background: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
      pointer-events: none;
    }
    .logo{
      position: absolute;
      left: 50%;
      top: 0px;
      transform: translateX(-50%);
      width: 512px;
      height: 256px;
      background-image: url("images/delightfulllogo2.png");
      background-position: center; /* Center the image */
      background-repeat: no-repeat; /* Do not repeat the image */
      background-size: cover; /* Resize the background image to cover the entire container */
      index: 1;
    }
    #pixi-container{
      width: 384px;
      height: 288px;
      display: flex;
      justify-content: center;
      align-items: center;
      padding-top: 256px;
      index: 2;
    }
    #pixi-container canvas {
        transform: scale(2); /* Scale the canvas by 2x */
        position: relative;
    }
    .controls{
      padding-bottom: 80px;
      max-width: 384px;
      color: rgb(12 153 185);
      font-family: system-ui;
    }
  </style>  
  <body oncontextmenu="return false;">
    <div class="main">
      <div class="content">
        <div id="pixi-container"></div>
        <div class="controls">
          <h1>Steuerung: </h1>
          <p><strong>Bestätigen / Springen:</strong>Pfeiltaste Unten  und mit W,A,S,D richtung vorgeben</p>
          <p><strong>Kämpfen:</strong> Pfeiltaste Rechts und mit W,A,S,D richtung vorgeben</p>
          <p><strong>Laufen:</strong> W, A, S, D</p>
          <p><strong>Pause:</strong> Pfeiltaste Links</p>
          <p><strong>Fullscreen:</strong> F - Taste</p>
        </div> 
        <div class="logo"></div>
      </div>
    </div>
  </body>
  <script>
    window.onload = function() {
      var element = document.getElementById('onscreen');
      if (element != null) {
        element.setAttribute("oncontextmenu", "return false;");
      }
      else {
      }
    };

/////////////////////////////////////////////////////////////////////////////////////////////////
// Graphics Setup //
///////////////////////////////////////////////////////////////////////////////////////////////
  let Application = PIXI.Application,
      Container = PIXI.Container,
      loader = PIXI.loader,
      resources = PIXI.loader.resources,
      TextureCache = PIXI.utils.TextureCache,
      Sprite = PIXI.Sprite;

  //Create a Pixi Application
  let app = new Application({ 
      width: 192, 
      height: 144,                      
      antialiasing: true, 
      transparent: false, 
      resolution: 1
    }
  );
  globalThis.__PIXI_APP__ = app;
  let container;
  let pixiContainer = document.getElementById('pixi-container');

// Append PIXI canvas to the container
  pixiContainer.appendChild(app.view);

  app.view.id = "onscreen";
  loader
    .add("sprites/startscreen.png")
    .load(setup);

  var GV = new Array(64);


/////////////////////////////////////////////////////////////////////////////////////////////////
// Sound Setup //
///////////////////////////////////////////////////////////////////////////////////////////////
  const attackSound = new Howl({
    src: ['sound-effects/char_atttack.wav'],
    volume: 1.0
  });
  const crabAttackSound = new Howl({
    src: ['sound-effects/crab_hits.wav'],
    volume: 1
  });
  const crabDiesSound = new Howl({
    src: ['sound-effects/crab_dies.wav'],
    volume: 1
  });
  const musicSound = new Howl({
    src: ['music/bg_music.mp3'],
    volume: 0.0
  });


/////////////////////////////////////////////////////////////////////////////////////////////////
// GlobalStates Setup //
///////////////////////////////////////////////////////////////////////////////////////////////
  let startscreenBackgroundTexture = PIXI.Texture.fromImage("sprites/startscreen.png?=" + new Date().getTime());
  let startscreenBackground = new Spriteelement(0, 0, 0, 1344, 144, 0, 0, 0, 0, 1344, 144, 0, 3);
  let startscreenSBackgroundprite = new PIXI.Sprite(startscreenBackgroundTexture);
  startscreenSBackgroundprite.x = startscreenBackground.off_x;
  startscreenSBackgroundprite.y = startscreenBackground.off_y;
  startscreenSBackgroundprite.width = startscreenBackground.off_w;
  startscreenSBackgroundprite.height = startscreenBackground.off_h;

  
/////////////////////////////////////////////////////////////////////////////////////////////////
// Game Setup //
///////////////////////////////////////////////////////////////////////////////////////////////
  function setup() {
    PIXI.settings.SCALE_MODE = PIXI.SCALE_MODES.NEAREST;
    container.addChild(startscreenSBackgroundprite);
  }

/////////////////////////////////////////////////////////////////////////////////////////////////
// Game-Loop //
///////////////////////////////////////////////////////////////////////////////////////////////
  function gameLoop(delta){

  }

</script>
</html>