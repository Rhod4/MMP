


  let rects = {
    redSquare: { x: 10, y: 10, w: 50, h: 50, fillStyle: "red", set: 1},
    blueSquare: { x: 95, y: 10, w: 50, h: 50,fillStyle: "lightblue",set: 2},
      yellowSquare: { x: 190, y: 10, w: 50, h: 50,fillStyle: "yellow",set: 3},
      PinkSquare: { x: 10, y: 90, w: 50, h: 50, fillStyle: "pink",set: 4},
      greenSquare: { x: 95, y: 90, w: 50, h: 50,fillStyle: "lightgreen",set: 5},
        whiteSquare: { x: 190, y: 90, w: 50, h: 50,fillStyle: "white",set: 6}
  };
  var first = 0;
  var second = 0;
var answer = 0;
var squareQuestion = 0;
DivMaker();

  function Background(){
    ctx.beginPath();
    ctx.rect(0, 0,myCanvas.width, myCanvas.height, );
    ctx.fillStyle = "gray";
    ctx.fill();
  }

  function ReDrawRects(){
    ctx.clearRect(0,0, myCanvas.width, myCanvas.height);
    Background();
    DrawRects();
  }

  function RandomQuestion(){
    first = Math.floor(Math.random() * 11);
    second = Math.floor(Math.random() * 11);
for (var rect in rects) {
      document.getElementById(rect).innerHTML = Math.floor(Math.random() * 11);
    };
  }

  document.getElementById("demo").onmousedown = function() {

    RandomQuestion();
    answer = first + second

    document.getElementById("demo").innerHTML = first + "+" + second;
  first = Math.floor(Math.random() * 11);

  }


{
  document.getElementById("redSquare").addEventListener("mousedown", function (event) {
      console.log("redSquare");
  });
  document.getElementById("blueSquare").addEventListener("mousedown", function (event) {
      console.log("blueSquare");
  });
  document.getElementById("yellowSquare").addEventListener("mousedown", function (event) {
      console.log("yellowSquare");
  });
  document.getElementById("PinkSquare").addEventListener("mousedown", function (event) {
      console.log("PinkSquare");
  });
  document.getElementById("greenSquare").addEventListener("mousedown", function (event) {
      console.log("greenSquare");
  });
  document.getElementById("whiteSquare").addEventListener("mousedown", function (event) {
      console.log("whiteSquare");
  });
}

  function DivMaker(){
    //for loop that runs for every object in the rects array
    for (var rect in rects) {

   var newDiv = document.createElement(rect);
   newDiv.style.width = "100px";
   newDiv.style.height = "100px";
  newDiv.style.background = rects[rect].fillStyle;
  newDiv.style.margin = "10px";
  newDiv.id = rect;
  newDiv.style.left = rects[rect].x+'px';
  newDiv.style.top = rects[rect].y+'px';
newDiv.style.aling = "center";

     var newContent = document.createTextNode("Hi there and greetings!");
      newDiv.appendChild(newContent);

        var currentDiv = document.getElementById("JavaGame");
    document.body.insertBefore(newDiv, currentDiv);
    document.getElementById('JavaGame').appendChild(newDiv);
      };
  }
