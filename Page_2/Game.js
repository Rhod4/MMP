

var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");

var a = 10;

let rects = {
  redSquare: { x: 10, y: 10, w: 10, h: 10, fillStyle: "Red"},
  blueSquare: { x: 100, y: 10, w: 10, h: 10,fillStyle: "Blue"}
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
