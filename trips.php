<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trips</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="./images/icon.jpg" type="image/x-icon">
	<link rel="stylesheet" href="./css/main.css">
    <script src="./js/main.js" async defer></script>
    <script src="./js/trips.js" async defer></script>
    <style>

        #filters {
            display: flex;
            flex-direction: revert;
            align-items: center;
            justify-content: space-evenly;
            width: 100%;
            height: 3em;
            background-color: antiquewhite;
            margin-bottom: 1em;
        }

        .filter {
            color: blue;
            background-color: aqua;
            padding: .5em;
            border-radius: 1em;
        }

        .filter:hover {
            cursor: pointer;
            color: aqua;
            background-color: black;
            transform: scale(1.05);
            border-radius: 1em;
        }

        #clear {
            padding: 1em;
            color: blue;
            background-color: pink;
            border-radius: 1.2em;
            margin-bottom: 1.2em;
        }

        #clear:hover {
            cursor: pointer;
            transform: scale(1.06);
            color: blueviolet;
            background-color: yellow;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <nav id="navigation_bar">
        <div id="inner">
            <div class="nav">Home</div>
            <div class="nav">Purchase Ticket</div>
            <div class="nav">Trips</div>
            <div class="nav">About</div>
        </div>
    </nav>
    <?php
    try {
        $conn = mysqli_connect("localhost", "silas", "king", "test1");
        if (!$conn) {
            echo("<script type='text/javascript'>alert('Database failed');</script>");
            die('Could not connect: '.mysqli_connect_error());
        }

        $sql = "SELECT * FROM trips;";
        $sql_result = mysqli_query($conn, $sql) or die('request "Could not execute SQL query" '.$sql);

        if (mysqli_num_rows($sql_result) > 0) {
            // filters
            echo('<div id="filters">');
            echo('<span class="filter" id="all_trips">All Trips</span>');
            echo('<span class="filter" id="inner_city_trips">Inner City</span>');
            echo('<span class="filter" id="long_distance_trips">Long Distance</span>');
            echo('<span class="filter" id="one_day_trips">One Day</span>');
            echo('<span class="filter" id="oner_night_trips">Over-Night</span>');
            echo('<span class="filter" id="durban_trips">Durban</span>');
            echo('<span class="filter" id="red_eye_trips">Red Eye</span>');
            echo("</div>");

            echo('<span id="clear">CLEAR</span>');
            // --------------------

            // output data of each row
            echo('<table id="table">');
            echo("<tr class='table_header'><th>ID</th><th>Source</th><th>Destination</th><th>Type</th><th>Time</th><th>Duration(Hrs)</th></tr>");
            while($row = mysqli_fetch_assoc($sql_result)) {
                echo("<tr class='table_row'>");
                echo "<td>".$row["id"]."</td><td>".$row["place1"]."</td><td>".$row["place2"]."</td><td>".$row["type"]."</td><td>".$row["triptime"]."</td><td>".$row["duration"]. "</td>";
                echo("</tr>");
            }
            echo("</table>");
        } else {
            echo "0 results";
        }
    } catch (Throwable $th) {
        //throw $th;
        echo("<p style='color: red;'>".$th."</p>");
    }

    ?>
</body>
</html>