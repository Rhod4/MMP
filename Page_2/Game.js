var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");


let rects = {
  redSquare: { x: 10, y: 10, w: 50, h: 50, fillStyle: "red", set: 1},
  blueSquare: { x: 95, y: 10, w: 50, h: 50,fillStyle: "blue",set: 2},
    yellowSquare: { x: 190, y: 10, w: 50, h: 50,fillStyle: "yellow",set: 3},
    PinkSquare: { x: 10, y: 90, w: 50, h: 50, fillStyle: "pink",set: 4},
    greenSquare: { x: 95, y: 90, w: 50, h: 50,fillStyle: "green",set: 5},
      whiteSquare: { x: 190, y: 90, w: 50, h: 50,fillStyle: "white",set: 6}
};
var first = 0;
var second = 0;

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

function RandomQuestion(){
  first = Math.floor(Math.random() * 11);
  second = Math.floor(Math.random() * 11);
}

document.getElementById("demo").onmousedown = function() {

  RandomQuestion();
  rects["redSquare"].x += 10;
  ReDrawRects();

  document.getElementById("demo").innerHTML = first + "+" + second;

}
rects.addEventListener('mousedown', e => {
console.log("Click");

});
