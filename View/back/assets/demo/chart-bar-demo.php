<?php
require 'C:\xampp\htdocs\projetWeb2A\config.php';

$db = config::getConnexion();
$sql = "SELECT COUNT(status) AS nombreorders FROM orders WHERE status='in progress'";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);
$nombreorders = $result['nombreorders'];

$sql1 = "SELECT COUNT(status) AS nombreorders FROM orders WHERE status='delivered'";
$query1 = $db->prepare($sql1);
$query1->execute();
$result1 = $query1->fetch(PDO::FETCH_ASSOC);
$nombreorders2 = $result1['nombreorders'];


$sql2 = "SELECT COUNT(status) AS nombreorders FROM orders WHERE status='canceled'";
$query2 = $db->prepare($sql2);
$query2->execute();
$result2 = $query2->fetch(PDO::FETCH_ASSOC);
$nombreorders3 = $result2['nombreorders'];


 ?>



// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["in progress", "delivered","canceled"],
    datasets: [{
      label: "counter",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [<?php echo"$nombreorders";  ?>, <?php echo"$nombreorders2" ;?>, <?php echo"$nombreorders3" ; ?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
