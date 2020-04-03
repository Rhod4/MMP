function DivMaker(){
  //for loop that runs for every object in the rects array

    //creates a div object out of the rects array
    var newDiv = document.createElement("rect");
    newDiv.style.width = "100px";
    newDiv.style.height = "100px";
    newDiv.style.background = "red";
    newDiv.style.margin = "10px";
    newDiv.id = rect;
    newDiv.style.left = 100 + 'px';
    newDiv.style.top = 10 + 'px';
    newDiv.style.aling = "center";

    var newContent = document.createTextNode("");
    newDiv.appendChild(newContent);

    var currentDiv = document.getElementById("JavaGame");
    document.body.insertBefore(newDiv, currentDiv);
    document.getElementById('JavaGame').appendChild(newDiv);




}
function table(){

var teacher = sessionStorage.getItem("teacher");
document.getElementById("TableText").innerHTML = teacher;


  function Student (name, year, score) {
      this.name = name;
      this.year = year;
      this.score = score
  };


$(document).ready( function () {

  var table =  $('#StudentDataBase').DataTable( {
    data:[
      new Student( "Paul Davies", "4", "0"),
      new Student( "Dave Smith", "4", "0")],
    columns: [
      { data: 'name' },
      { data: 'year' },
      { data: 'score'}]
});

$('#StudentDataBase tbody').on( 'click', 'td', function () {
  var clickedStudent = table.cell(this, 0).data();
console.log(clickedStudent);
var fullStudent = table.row(this).data();


sessionStorage.setItem("student", clickedStudent);
window.location.href = "file:///C:/Users/rhodr/Desktop/MMP/StudentDetails/StudentPage.html";


});
});



var a = 3;
}
