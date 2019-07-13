<?php
  function DobavljanjeZaGrafKutijaZaCuvanje(){
    //$arrayDataGrafUKutijiZaPrintanje = array(['Time','Temperature']);  //prva vrijednost
    $conn=ConnectToDatabase();
    $dataGrafUKutijiZaPrintanje = "SELECT data.temperature, data.humidityAbsolute, data.time FROM weather.data WHERE data.room_fk=1 ORDER BY data.id DESC LIMIT 1440";
    $resultGrafDataUKutijiZaPrintanje = $conn->query($dataGrafUKutijiZaPrintanje);
    if ($resultGrafDataUKutijiZaPrintanje->num_rows > 0) {
        while ($row = $resultGrafDataUKutijiZaPrintanje->fetch_assoc()) {
          settype($row['time'], "Time");
          settype( $row['temperature'], "float");
          settype( $row['humidityAbsolute'], "float");
          $arrayDataGrafUKutijiZaCuvanje[] = array( date( "H:i", strtotime($row['time'])), $row['temperature'], $row['humidityAbsolute']);
        }
      }
    $conn->close();
    $JSON=json_encode($arrayDataGrafUKutijiZaCuvanje);
    return $JSON;
  };
?>
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart', 'line']});
  google.charts.setOnLoadCallback(NacrtajGrafKutijeZaCuvanje);



  function NacrtajGrafKutijeZaCuvanje() {

    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Time');
    data.addColumn('number', 'Temperatura');
    data.addColumn('number', 'Vlaga');
    data.addRows(<?PHP echo  DobavljanjeZaGrafKutijaZaCuvanje();?>);


    var options = {
      position: 'static',
      hAxis: {
        title: 'Time',
        direction: '-1',
      },
      vAxis: {
        title: 'Temperatura'
      },
      backgroundColor: 'white'
    };

    var chart = new google.visualization.LineChart(document.getElementById('chartKutijeZaCuvanje'));
    chart.draw(data, options);
      }
</script>
