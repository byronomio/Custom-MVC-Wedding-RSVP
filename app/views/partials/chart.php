<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
     // Return with commas in between
  var numberWithCommas = function(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  };

var dataPack1 = [<?php echo $data['cooldrink'] ?>, <?php echo $data['alcahol'] ?>, <?php echo $data['water'] ?>, <?php echo $data['meat'] ?>, <?php echo $data['vegan'] ?>, <?php echo $data['nothing'] ?>, <?php echo $data['sleepover'] ?>, <?php echo $data['sleephome'] ?>, <?php echo $data['notsleeping'] ?>];

var dates = ["Cooldrink", "Alcahol", "Water", "Meat", "Vegan", "Nothing", "Sleeping Over", "Sleeping Home", "Not Sleeping"];

// Chart.defaults.global.elements.rectangle.backgroundColor = '#FF0000';

var bar_ctx = document.getElementById('bar-chart');
var bar_chart = new Chart(bar_ctx, {
    type: 'bar',
    data: {
        labels: dates,
        datasets: [
        {
            label: 'Bad Style',
            data: dataPack1,
						backgroundColor: "#512DA8",
						hoverBackgroundColor: "#7E57C2",
						hoverBorderWidth: 0
        },
        ]
    },
    options: {
     		animation: {
        	duration: 10,
        },
        tooltips: {
					mode: 'label',
          callbacks: {
          label: function(tooltipItem, data) { 
          	return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
          }
          }
         },
        scales: {
          xAxes: [{ 
          	stacked: true, 
            gridLines: { display: false },
            }],
          yAxes: [{ 
          	stacked: true, 
           
            }],
        }, // scales
        // legend: {display: true}
    } // options
   }
);
    </script> -->

    
<script type="text/javascript">


var flotBarsData = [

  ["Cooldrink", <?php echo $data['cooldrink'] ?>],

  ["Alcahol", <?php echo $data['alcahol'] ?>],

  ["Water", <?php echo $data['water'] ?>],

  ["Meat", <?php echo $data['meat'] ?>],

  ["Vegan", <?php echo $data['vegan'] ?>],

  ["Nothing", <?php echo $data['nothing'] ?>],

  ["Sleep Over", <?php echo $data['sleepover'] ?>],

  ["Sleep Home", <?php echo $data['sleephome'] ?>],

  ["Not Sleeping", <?php echo $data['notsleeping'] ?>],


];


// See: js/examples/examples.charts.js for more settings.


</script>