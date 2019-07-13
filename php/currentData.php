<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php

        function ZadnjiZapisKutijeZaPrintanje() {
            $conn = ConnectToDatabase();
            $dataUKutijiZaCuvanje = "SELECT data.id, data.temperature, data.humidityAbsolute, data.humidityRelative, data.dewpoint, data.presure, data.time, room.name
            FROM weather.data, weather.room where data.room_fk=room.id && room.id=2 order by data.id DESC limit 1";
            $resultDataUKutijiZaCuvanje = $conn->query($dataUKutijiZaCuvanje);

            if ($resultDataUKutijiZaCuvanje->num_rows > 0) {
                while ($row = $resultDataUKutijiZaCuvanje->fetch_assoc()) {
                    //  echo "id: " . $row["id"]. " - Temperature: " . $row["temperature"]. "Absolute humidity: " . $row["humidityAbsolute"]."
                    //   Relative humidity: ". $row["humidityRelative"]." Dewpoint ". $row["dewpoint"]." Presure: ".$row["presure"]. "Time: ".$row["time"]. "<br>";

                    echo "<h2>Podatci kutije za cuvanje materijala</h2>
         <div class='table'>
           <div class='table-row'>
             <div class='table-cell'>
               Temperature:
             </div>
             <div class='bitno' class='table-cell'>
               " . $row["temperature"] . " C°
             </div>
           </div>
           <div class='table-row'>
           <div class='table-cell'>
             Relative humidity:
           </div>
             <div class='bitno' class='table-cell'>
               " . $row["humidityRelative"] . " %
             </div>
           </div>
           <div class='table-row' >
             <div class='manjeBitno' class='table-cell'>
               Absolute humidity:
             </div>
             <div class='manjeBitno' class='table-cell'>
               " . $row["humidityAbsolute"] . "  g/m3
             </div>
           </div>
           <div class='table-row' >
             <div class='manjeBitno' class='table-cell'>
               Dewpoint:
             </div>
             <div class='manjeBitno' class='table-cell'>
               " . $row["dewpoint"] . " C°
             </div>
           </div>
           <div class='table-row' >
             <div class='manjeBitno' class='table-cell'>
               Presure:
             </div>
             <div class='manjeBitno' class='table-cell'>
               " . $row["presure"] . " hPa
             </div>
           </div>
           <div class='table-row' >
             <div class='manjeBitno' class='table-cell'>
               Time:
             </div>
             <div class='manjeBitno' class='table-cell'>
             " . date("h:i", strtotime($row["time"])) . "
             </div>
           </div>
         </div>";
                }
            } else {
                echo "0 results :(";
            }
            $conn->close();
        }

//**********************************************************************************
        function ZadnjiZapisKutijeZaCuvanje() {
            $conn = ConnectToDatabase();
            $dataUKutijiZaPrintanje = "SELECT data.id, data.temperature, data.humidityAbsolute, data.humidityRelative, data.dewpoint, data.presure, data.time, room.name
            FROM weather.data, weather.room where data.room_fk=room.id && room.id=1 order by data.id DESC limit 1";
            $resultDataUKutijiZaPrintanje = $conn->query($dataUKutijiZaPrintanje);

            if ($resultDataUKutijiZaPrintanje->num_rows > 0) {
                while ($row = $resultDataUKutijiZaPrintanje->fetch_assoc()) {
                    //echo "id: " . $row["id"]. " - Temperature: " . $row["temperature"]. "Absolute humidity: " . $row["humidityAbsolute"]."
                    // Relative humidity: ". $row["humidityRelative"]." Dewpoint ". $row["dewpoint"]." Presure: ".$row["presure"]. "Time: ".$row["time"]. "<br>";

                    echo "<h2>Podatci kutije za printanje</h2>
         <div class='table'>
           <div class='table-row'>
             <div class='table-cell'>
               Temperature:
             </div>
             <div class='bitno' class='table-cell'>
               " . $row["temperature"] . " C°
             </div>
           </div>
           <div class='table-row'>
           <div class='table-cell'>
             Relative humidity:
           </div>
             <div class='bitno' class='table-cell'>
               " . $row["humidityRelative"] . " %
             </div>
           </div>
           <div class='table-row' >
             <div class='manjeBitno' class='table-cell'>
               Absolute humidity:
             </div>
             <div class='manjeBitno' class='table-cell'>
               " . $row["humidityAbsolute"] . "  g/m3
             </div>
           </div>
           <div class='table-row' >
             <div class='manjeBitno' class='table-cell'>
               Dewpoint:
             </div>
             <div class='manjeBitno' class='table-cell'>
               " . $row["dewpoint"] . " C°
             </div>
           </div>
           <div class='table-row' >
             <div class='manjeBitno' class='table-cell'>
               Presure:
             </div>
             <div class='manjeBitno' class='table-cell'>
               " . $row["presure"] . " hPa
             </div>
           </div>
           <div class='table-row' >
             <div class='manjeBitno' class='table-cell'>
               Time:
             </div>
             <div class='manjeBitno' class='table-cell'>
                " . date("h:i", strtotime($row["time"])) . "
             </div>
           </div>
         </div>";
                }
            } else {
                echo "0 results :(";
            }
            $conn->close();
        }



?>
