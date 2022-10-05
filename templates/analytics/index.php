<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice[]|\Cake\Collection\CollectionInterface $invoices
 *
 */

?>

<body class="sb-nav-fixed">
    <?php echo $this->element('navbar/navbar') ?>
    <div id="layoutSidenav">
        <?php echo $this->element('navbar/sidebar') ?>
        <div id="layoutSidenav_content">
            <main>
            <div class=" card mb-4" style="margin-top: 50px">
                        <div class="card-header" style="padding-bottom: 15px">
                            <i class="fa-solid fa-chart-line" style="padding-top: 11px; padding-right: 2px"></i>
                            Analytics
                        </div>
                        <div class="card-body">
                            <canvas id="myPieChart" ></canvas>
                            
                            <canvas id="myChart" ></canvas>
                        </div>
                   
           
<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode(array_keys($label)) ?>,
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: <?= json_encode(array_values($label)) ?>,
    }],
  },
  options: {
    scales: {
      xAxes: [{
       
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

var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: <?= json_encode(array_keys($label)) ?>,
    datasets: [{
      data: <?= json_encode(array_values($label)) ?>,
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
    }],
  },
});
</script>
            </main>
        </div>
    </div>
</body>