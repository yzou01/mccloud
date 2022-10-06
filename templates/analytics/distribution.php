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
                <div class="card-header">
                    <i class="fa-solid fa-chart-line" style="padding-top: 11px; padding-right: 2px"></i>
                    Analytics
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right;']) ?>
                </div>
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>Distribution of Products</h4>
                            <canvas id="myPieChart" style="margin-top:20px"></canvas>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>Distribution of Product Types</h4>
                            <canvas id="types"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var ctx = document.getElementById("types");
                var typeChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?= json_encode(array_keys($typesData)) ?>,
                        datasets: [{
                            label: "Revenue",
                            backgroundColor: "rgba(2,117,216,1)",
                            borderColor: "rgba(2,117,216,1)",
                            data: <?= json_encode(array_values($typesData)) ?>,
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
                    type: 'doughnut',
                    data: {
                        labels: <?= json_encode(array_keys($label)) ?>,
                        datasets: [{
                            data: <?= json_encode(array_values($label)) ?>,
                            backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#a6cee3', '#6a3d9a', '#b15928', '#fb9a99', '#ff7f00'],
                        }],
                    },
                });
            </script>
        </main>
    </div>
</div>
