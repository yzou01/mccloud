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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?= $this->Form->create($date, ['type' => 'get']) ?>
                                <label>From Date</label>

                                <input type="date" name="from_date" placeholder="<?php echo $this->request->getQuery('from_date') ?>"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>To Date</label>
                                <input type="date" name="to_date" placeholder="<?php echo $this->request->getQuery('to_date') ?>"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <br>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>

                        <?= $this->Form->end() ?>
                    </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h4>Expenses</h4>
                                        <canvas id="overallSpendings" style="margin-top:20px"></canvas>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="stretched-link" href="<?php echo $this->Url->build(['controller'=>'Analytics','action'=>'expenses'])?>">View Details</a>
                                        <div><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h4>Distributions</h4>
                                        <canvas id="myPieChart" style="margin-top:20px"></canvas>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="stretched-link" href="<?php echo $this->Url->build(['controller'=>'Analytics','action'=>'distribution'])?>" >View Details</a>
                                        <div><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
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

                    var ctx = document.getElementById("myPieChart");
                    var myPieChart = new Chart(ctx, {
                        type: 'doughnut',
                         data: {
                            labels: <?= json_encode(array_keys($spending)) ?>,
                            datasets: [{
                                data: <?= json_encode(array_values($spending)) ?>,
                                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#a6cee3', '#6a3d9a', '#b15928', '#fb9a99', '#ff7f00'],
                            }],
                        },
                    });
                </script>
            </main>
        </div>
    </div>
</body>
