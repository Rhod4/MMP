  document.getElementById("EndScreen").style.display = "none";


var difficulty;
//this section gets the data for the difficulty variable from the php on the GamePage.php file
var difficultyPHP = document.getElementById('GameScript')
difficulty = difficultyPHP.getAttribute("difficulty");

var gameMode;

function closeForm() {
  gameMode = document.getElementById('GameMode').value;
  document.getElementById("StartBar").style.display = "none";
}





//this stores the information for the boxes that the user clicks on
let rects = {
  redSquare: { x: 10, y: 10, w: 50, h: 50, fillStyle: "red", set: 0},
  blueSquare: { x: 95, y: 10, w: 50, h: 50,fillStyle: "lightblue",set: 1},
  yellowSquare: { x: 190, y: 10, w: 50, h: 50,fillStyle: "yellow",set: 2},
  PinkSquare: { x: 10, y: 90, w: 50, h: 50, fillStyle: "pink",set: 3},
  greenSquare: { x: 95, y: 90, w: 50, h: 50,fillStyle: "lightgreen",set: 4},
  whiteSquare: { x: 190, y: 90, w: 50, h: 50,fillStyle: "white",set: 5}
};
var score = 0;


var answer;
var answerSquareFinder;
var question = 0;

DivMaker();

function DivMaker(){
  //for loop that runs for every object in the rects array
  for (var rect in rects) {
    //creates a div object out of the rects array
    var newDiv = document.createElement("Button");
    newDiv.style.width = "100px";
    newDiv.style.height = "100px";
    newDiv.style.background = rects[rect].fillStyle;
    newDiv.style.margin = "10px";
    newDiv.id = rect;
    newDiv.style.left = rects[rect].x+'px';
    newDiv.style.top = rects[rect].y+'px';
    newDiv.style.aling = "center";
    newDiv.style.fontSize  = "50px";
    newDiv.style.boxShadow = "5px 5px 2px grey";
    newDiv.style.borderStyle = "outset";
    newDiv.style.textAlign = "center";



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
        if (question != 10){
  for (var rect in rects) {
    if (rects[rect].set == answerSquareFinder){
      document.getElementById(rect).innerHTML = answer;
    }
  };
}
}



/* The function that allows the
creation of the questions based on the users details*/
function RandomQuestionGenerator(){
  var randomNumberDifficulty;

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

  }

  switch(gameMode){
    case "+":
    if (difficulty == 1){
      randomNumberDifficulty = 10;
    }

    else if (difficulty == 2){
      randomNumberDifficulty = 100;
    }
    first = Math.floor(Math.random() * randomNumberDifficulty);
    second = Math.floor(Math.random() * randomNumberDifficulty);
    answerSquareFinder = Math.floor(Math.random() * 5);

    document.getElementById("StartGame").innerHTML = first + "+" + second;

    answer = first + second


    break;

    case "-":
    if (difficulty == 1){
      randomNumberDifficulty = 10;
    }

    else if (difficulty == 2){
      randomNumberDifficulty = 100;
    }
    first = Math.floor(Math.random() * randomNumberDifficulty);
    second = Math.floor(Math.random() * randomNumberDifficulty);
    answerSquareFinder = Math.floor(Math.random() * 5);

    document.getElementById("StartGame").innerHTML = first + "-" + second;
    answer = first - second

    randomNumberDifficulty = answer;
    break;



    default:
    document.getElementById("StartGame").innerHTML = score;
    for (var rect in rects) {
      //Allows the game to end
      var element = document.getElementById(rect);
      element.parentNode.removeChild(element);
EndGame();


    };
    break;



  }

        if (question != 10){
  for (var rect in rects) {
    do{
      if (gameMode == "-"){
        document.getElementById(rect).innerHTML = Math.floor(Math.random() * randomNumberDifficulty);
      }else{
        document.getElementById(rect).innerHTML = Math.floor(Math.random() * randomNumberDifficulty * 2);
      }
    }
    while (document.getElementById(rect).innerHTML == answer)
  };
};

  //runs for every rect in the array of rects



  SameAnswerChecker();
  QuestionUpdate();

  return first, second;
}
//when the click me button is clicked. It starts the game
document.getElementById("StartGame").onmousedown = function() {
  if(gameMode == null){}
  else{
  RandomQuestionGenerator();
}}


/*This function runs as when it was part of the DivMaker function,
it would only run the last object for all the objects*/
function OnClickLoop(name){

  document.getElementById(name).addEventListener("mousedown", function (event) {
    AnswerChecker(sqaureName = name);
    });


}
//Updates the text for the score the user has
function ScoreUpdate(){
  score++;
  document.getElementById("Score").innerHTML = score;
  //
  //
}
//Updates the text for what question the user is on

//checks the answers that the usr clicks
function AnswerChecker(sqaureName){
  if(gameMode == null){}
  else{
  if (rects[sqaureName].set == answerSquareFinder){
    ScoreUpdate();
    RandomQuestionGenerator();  }
    else{RandomQuestionGenerator();}}}

    function QuestionUpdate(){

      question++;
      if (question == 10){gameMode = "default"


    }
      document.getElementById("Question").innerHTML = question;
    }


    function TextAnswerInserter(rect){
      document.getElementById(rect).innerHTML = Math.floor(Math.random() * answer * 2);
    }

    function EndGame(){
  document.getElementById("JavaGame").style.display = "none";
  document.getElementById("EndScore").value  = score;
      document.getElementById("EndScore").readOnly = true;
  var gameType = document.getElementById('GameMode').value;
        document.getElementById("EndMode").readOnly = true;


  if (gameType =="+"){
document.getElementById("EndMode").value  = "addition";
}
else if
(gameType =="-"){
document.getElementById("EndMode").value  = "subtraction";
}
else {console.log(gameType)}
document.forms["EndForm"].submit();
    }
