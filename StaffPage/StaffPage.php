<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="StaffPageStyle.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <title>Rhs24 MMP</title>
</head>
<body>

<div id="TitleBar">
    <h1 id="TitleText"> Staff Page</h1>
</div>

<div id="Table">
    <h1 id="TableText"></h1>

    <div id="Students">
        <h1 id="StudentNames"></h1>

        <table id="StudentDataBase" class="display">
            <thead>
            <th>Name</th>
            <th>Pass</th>
            <th>year</th>
            <th id="remove">remove </th>
            </thead>


            <tbody>
            <?php
            include('db_connection.php');


            $conn = OpenCon();

            $sql = "SELECT * FROM `test`";


            $result = mysqli_query($conn, $sql) or die("bad");

            while ($row = mysqli_fetch_assoc($result)) {
                //fill array how to fill array that will look like bellow from database???
                $list = $row["username"];
                $field2name = $row["password"];

                echo '  <tr>
     <td>' . $list . '</td> 
     <td>' . $field2name . '</td>
                   <td>asdd</td>
                   <td> <a   class="remove">Delete</a></td>  
          </tr>';
            }
            CloseCon($conn);
            ?>
            </tbody>
        </table>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8"
                src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


        <script>


            function Student(name, year, score) {
                this.name = name;
                this.year = year;
                this.score = score;

            }


            $(document).ready(function () {
                $('#StudentDataBase').DataTable();


            });


            // $('#StudentDataBase tbody').on('click', 'td', function () {
            //
            //     var clickedStudent = table.cell(this, 0).data();
            //     var clickedStudentScore = table.cell(this, 1).data();
            //
            //     fullStudent = table.row(this).data();
            //     if (document.getElementById("box")) {
            //         var removeBox = document.getElementById('box');
            //         removeBox.remove()
            //     }
            //
            //
            // });
            var myTable = $('#StudentDataBase').DataTable();

            $('#StudentDataBase').on('click', 'a.remove', function () {
                console.log("a");
                myTable.row($(this).parents('tr')).remove().draw();
                <?php echo console.log("asd");?>
            });




            var a = 3;





        </script>

    </div>

</div>
</body>
