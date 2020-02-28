var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");


let rects = {
  redSquare: { x: 10, y: 10, w: 50, h: 50, fillStyle: "Red"},
  blueSquare: { x: 95, y: 10, w: 50, h: 50,fillStyle: "Blue"},
    yellowSquare: { x: 190, y: 10, w: 50, h: 50,fillStyle: "Yellow"},
    PinkSquare: { x: 10, y: 90, w: 50, h: 50, fillStyle: "pink"},
    greenSquare: { x: 95, y: 90, w: 50, h: 50,fillStyle: "green"},
      whiteSquare: { x: 190, y: 90, w: 50, h: 50,fillStyle: "white"}
};


Background();
DrawRects();

function Background(){
  ctx.beginPath();
  ctx.rect(0, 0,myCanvas.width, myCanvas.height, );
  ctx.fillStyle = "gray";
  ctx.fill();
}

function DrawRects(){
for (var rect in rects) {
    ctx.beginPath();
    ctx.rect(rects[rect].x, rects[rect].y, rects[rect].w, rects[rect].h);
    ctx.fillStyle = rects[rect].fillStyle;
    ctx.fill();
  };
}

function ReDrawRects(){
  ctx.clearRect(0,0, myCanvas.width, myCanvas.height);
  Background();
  DrawRects();
}


document.getElementById("demo").onmousedown = function() {
  rects["redSquare"].x += 10;
  ReDrawRects();
  document.getElementById("demo").innerHTML = rects.size;

}
