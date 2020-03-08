let rects = {
  redSquare: { x: 10, y: 10, w: 50, h: 50, fillStyle: "red", set: 0},
  blueSquare: { x: 95, y: 10, w: 50, h: 50,fillStyle: "lightblue",set: 1},
  yellowSquare: { x: 190, y: 10, w: 50, h: 50,fillStyle: "yellow",set: 2},
  PinkSquare: { x: 10, y: 90, w: 50, h: 50, fillStyle: "pink",set: 3},
  greenSquare: { x: 95, y: 90, w: 50, h: 50,fillStyle: "lightgreen",set: 4},
  whiteSquare: { x: 190, y: 90, w: 50, h: 50,fillStyle: "white",set: 5}
};
var score = 0;
var first;
var second;
var answer;
var answerSquareFinder;
DivMaker();

function RandomQuestion(){
  first = Math.floor(Math.random() * 11);
  second = Math.floor(Math.random() * 11);
  answerSquareFinder = Math.floor(Math.random() * 5);
  console.log(answerSquareFinder);
}



document.getElementById("demo").onmousedown = function() {
  RandomQuestion();
  answer = first + second
  document.getElementById("demo").innerHTML = first + "+" + second;
  NumberInSquareChecker();
  SameAnswerChecker();
}


{
  document.getElementById("redSquare").addEventListener("mousedown", function (event) {
    AnswerChecker(sqaureName = "redSquare");
  });
  document.getElementById("blueSquare").addEventListener("mousedown", function (event) {
    AnswerChecker(sqaureName = "blueSquare");
  });
  document.getElementById("yellowSquare").addEventListener("mousedown", function (event) {
    AnswerChecker(sqaureName = "yellowSquare");
  });
  document.getElementById("PinkSquare").addEventListener("mousedown", function (event) {
    AnswerChecker(sqaureName = "PinkSquare");
  });
  document.getElementById("greenSquare").addEventListener("mousedown", function (event) {
    AnswerChecker(sqaureName = "greenSquare");
  });
  document.getElementById("whiteSquare").addEventListener("mousedown", function (event) {
    AnswerChecker(sqaureName = "whiteSquare");
  });

}

function DivMaker(){
  //for loop that runs for every object in the rects array
  for (var rect in rects) {
    //creates a div object out of the rects array
    var newDiv = document.createElement(rect);
    newDiv.style.width = "100px";
    newDiv.style.height = "100px";
    newDiv.style.background = rects[rect].fillStyle;
    newDiv.style.margin = "10px";
    newDiv.id = rect;
    newDiv.style.left = rects[rect].x+'px';
    newDiv.style.top = rects[rect].y+'px';
    newDiv.style.aling = "center";

    var newContent = document.createTextNode("");
    newDiv.appendChild(newContent);

    var currentDiv = document.getElementById("JavaGame");
    document.body.insertBefore(newDiv, currentDiv);
    document.getElementById('JavaGame').appendChild(newDiv);
  };
}

/*function that sets one of the answer divs to be correct*/
function SameAnswerChecker(){
  for (var rect in rects) {
    if (rects[rect].set == answerSquareFinder){
      document.getElementById(rect).innerHTML = answer;
    }
  };
}



function NumberInSquareChecker(){
  for (var rect in rects) {
    do{
      document.getElementById(rect).innerHTML = Math.floor(Math.random() * 21);
    }
    while (document.getElementById(rect).innerHTML == answer)
  };
}

function CorrectAnswer(){
  score ++;
  console.log(score);
}

function AnswerChecker(sqaureName){
  if (rects[sqaureName].set == answerSquareFinder){
    CorrectAnswer();
  }

}
