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
                            <h4>Expenses by Factory</h4>
                            <canvas id="overallSpendings" style="margin-top:20px"></canvas>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>Expenses by Additional Costs</h4>
                            <canvas id="overallAddCost"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var ctx = document.getElementById("overallSpendings");
                var overallSpending = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?= json_encode(array_keys($spending)) ?>,
                        datasets: [{
                            label: "Cost",
                            backgroundColor: "rgba(2,117,216,1)",
                            borderColor: "rgba(2,117,216,1)",
                            data: <?= json_encode(array_values($spending)) ?>,
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

                var ctx = document.getElementById("overallAddCost");
                var overallAddCost = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: <?= json_encode(array_keys($addCostData)) ?>,
                        datasets: [{
                            data: <?= json_encode(array_values($addCostData)) ?>,
                            backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#a6cee3', '#6a3d9a', '#b15928', '#fb9a99', '#ff7f00'],
                        }],
                    },
                });
            </script>
        </main>
    </div>
</div>
