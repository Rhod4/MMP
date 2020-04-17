let rects = {
  redSquare: { x: 10, y: 10, w: 50, h: 50, fillStyle: "red", set: 0},
  blueSquare: { x: 95, y: 10, w: 50, h: 50,fillStyle: "lightblue",set: 1},
  yellowSquare: { x: 190, y: 10, w: 50, h: 50,fillStyle: "yellow",set: 2},
  PinkSquare: { x: 10, y: 90, w: 50, h: 50, fillStyle: "pink",set: 3},
  greenSquare: { x: 95, y: 90, w: 50, h: 50,fillStyle: "lightgreen",set: 4},
  whiteSquare: { x: 190, y: 90, w: 50, h: 50,fillStyle: "white",set: 5}
};
var score = 0;
var difficulty;
var mathType = "subtraction";
var answer;
var answerSquareFinder;
var question = 0;

DivMaker();

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


    OnClickLoop(name = rect);

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

}

function AnswerChecker(sqaureName){
  if (rects[sqaureName].set == answerSquareFinder){
    ScoreUpdate();
    console.log(score);
    RandomQuestionGenerator();
  }
}
difficulty = 1;
function RandomQuestionGenerator(){
  var randomNumberDifficulty;

  switch(mathType){
  case "addition":
    if (difficulty == 1){
       randomNumberDifficulty = 10;
    }

    else if (difficulty == 2){
randomNumberDifficulty = 100;
    }
  else if (difficulty == 3){
//////////////////////////////
//////////////////////////////
//////////////////////////////
}
else{
  /////////////////////////
  /////////////////////////
}
      first = Math.floor(Math.random() * randomNumberDifficulty);
      second = Math.floor(Math.random() * randomNumberDifficulty);
      answerSquareFinder = Math.floor(Math.random() * 5);
break;

case "subtraction":
if (difficulty == 1){
   randomNumberDifficulty = 10;
   first = Math.floor(Math.random() * randomNumberDifficulty);
   second = Math.floor(Math.random() * randomNumberDifficulty);
   answerSquareFinder = Math.floor(Math.random() * 5);
}
break;
}
document.getElementById("demo").innerHTML = first + "+" + second;
answer = first + second


for (var rect in rects) {
  do{
    document.getElementById(rect).innerHTML = Math.floor(Math.random() * randomNumberDifficulty * 2);
  }
  while (document.getElementById(rect).innerHTML == answer)
};


SameAnswerChecker();
QuestionUpdate();

return first, second;

}

document.getElementById("demo").onmousedown = function() {
  RandomQuestionGenerator();
}


/*This function runs as when it was part of the DivMaker function,
it would only run the last objects name for all the objects*/
function OnClickLoop(name){
  console.log(name);
  document.getElementById(name).addEventListener("mousedown", function (event) {
    AnswerChecker(sqaureName = name);
    console.log(name);
  });
}

function ScoreUpdate(){
  score++;
  document.getElementById("Score").innerHTML = score;
}

function QuestionUpdate(){

  question++;
  document.getElementById("Question").innerHTML = question;
}
