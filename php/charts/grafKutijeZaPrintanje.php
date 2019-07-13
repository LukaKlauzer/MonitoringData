<?php
  function DobavljanjeZaGrafKutijaZaPrintanje(){
    //$arrayDataGrafUKutijiZaPrintanje = array(['Time','Temperature']);  //prva vrijednost
    $conn=ConnectToDatabase();
    $dataGrafUKutijiZaPrintanje = "SELECT data.temperature, data.humidityAbsolute, data.time FROM weather.data WHERE data.room_fk=2 ORDER BY data.id DESC LIMIT 1440";
    $resultGrafDataUKutijiZaPrintanje = $conn->query($dataGrafUKutijiZaPrintanje);
    if ($resultGrafDataUKutijiZaPrintanje->num_rows > 0) {
        while ($row = $resultGrafDataUKutijiZaPrintanje->fetch_assoc()) {
          settype($row['time'], "Time");
          settype( $row['temperature'], "float");
          settype( $row['humidityAbsolute'], "float");
          $arrayDataGrafUKutijiZaPrintanje[] = array( date( "H:i", strtotime($row['time'])), $row['temperature'], $row['humidityAbsolute']);
        }
      }
    $conn->close();
    $JSON=json_encode($arrayDataGrafUKutijiZaPrintanje);
    return $JSON;
  }
?>

<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart', 'line']});
  google.charts.setOnLoadCallback(NacrtajGrafKutijeZaPrintanje);



  function NacrtajGrafKutijeZaPrintanje() {
    console.log(<?PHP echo  DobavljanjeZaGrafKutijaZaCuvanje();?>);
    var dataPrintanje = new google.visualization.DataTable();
    dataPrintanje.addColumn('string', 'Time');
    dataPrintanje.addColumn('number', 'Temperatura');
    dataPrintanje.addColumn('number', 'Vlaga');

    dataPrintanje.addRows(<?PHP echo  DobavljanjeZaGrafKutijaZaPrintanje();?>);

    var optionsPrintanje = {
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

    var chartPrintanje = new google.visualization.LineChart(document.getElementById('chartKutijeZaPrintanje'));
    chartPrintanje.draw(dataPrintanje, optionsPrintanje);
      }
</script>
