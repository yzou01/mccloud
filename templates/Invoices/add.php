<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 * @var \Cake\Collection\CollectionInterface|string[] $additionalcosts
 */
$key = isset($key) ? $key : '<%= key %>';
?>
<body class="sb-nav-fixed">
    <?php echo $this->element('navbar/navbar')?>
    <div id="layoutSidenav">
        <?php echo $this->element('navbar/sidebar')?>
        <div id="layoutSidenav_content">
            <main>
                <div class=" card mb-4" style="margin-top: 50px">
                    <div class="card-header">
                        <i class="fa-solid fa-receipt" style="padding-top: 11px; padding-right: 2px"></i>
                        Add Bill Of Records
                        <?= $this->Html->link(__('List Bill Of Records'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px']) ?>
                    </div>
                    <div class="card-body">
                        <?= $this->Form->create($invoice) ?>
                        <div class="column-responsive column-80">
                            <div class="skus form content">
                                <fieldset>
                                    <div class="form-label">
                                        <?php
                                        echo $this->Form->control('number',['class'=>'form-control']);
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <?php
                                        echo $this->Form->control('date',['class'=>'form-control']);
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <?php
                                        echo $this->Form->control('factory_id',['class'=>'form-control']);
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <?php
                                        echo $this->Form->control('currency_of_origin',['class'=>'form-control']);
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <?php
                                        echo $this->Form->control('currency_rate',['class'=>'form-control', 'min'=>0]);
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <?php
                                        echo $this->Form->control('gst',['class'=>'form-control', 'min'=>0,'label'=>'Gst Cost']);
                                        ?>
                                    </div>
                                </fieldset>
                            </div>

                            <div style="margin-top: 20px">
    <!--                            ADDITIONAL COST COLUMN-->
                                <div style="width: 50%; float: left; padding-right: 2%">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary" id="add-additionalcosts-button" style="float: right"><i class="fa-solid fa-plus"></i></button>
                                                    <h5 style="padding-top: 6px">Additional Costs</h5>
                                                </div>
                                            </div>
                                            <div id="additionalcosts-container">
                                                <div class="row additionalcosts-row">
                                                    <div style="display: table">
                                                        <div style="display: table-row">
                                                            <div style="width: 13%; display: table-cell; padding-right: 2%">
                                                                <div class="form-label">
                                                                    <?php
                                                                    echo $this->Form->control("additionalcosts.0.name",['class'=>'form-select','label'=>'Cost', 'options'=>[
                                                                        'Duty'=>'Duty',
                                                                        'Freight'=>'Freight',
                                                                        'Cartage'=>'Cartage',
                                                                        'Insurance'=>'Insurance',
                                                                        'Licence'=>'Licence',
                                                                        'Agency'=>'Agency',
                                                                        'Customs'=>'Customs',
                                                                        'TT Charge'=>'TT Charge',
                                                                        'Others'=>'Others']
                                                                    ]);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div style="width: 10%;display: table-cell; padding-right: 2%">
                                                                <div class="form-label">
                                                                    <?php
                                                                    echo $this->Form->control("additionalcosts.0.amount",['class'=>'form-control']);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div style="width: 20%;display: table-cell; padding-right: 2%">
                                                                <div class="form-label">
                                                                    <?php
                                                                    echo $this->Form->control("additionalcosts.0.comment",['class'=>'form-control']);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div style="width: 1%; display: table-cell; text-align: center;vertical-align: middle">
                                                                <a class="additionalcosts-delete" href="#"><i class="fa fa-fw fa-trash"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script id="additionalcosts-template" type="text/x-underscore-template">
                                                    <div class="row additionalcosts-row">
                                                        <div style="display: table">
                                                            <div style="display: table-row">
                                                                <div style="width: 13%; display: table-cell; padding-right: 2%">
                                                                    <div class="form-label">
                                                                        <?php
                                                                        echo $this->Form->control("additionalcosts.{$key}.name",['class'=>'form-select','label'=>'Cost', 'options'=>[
                                                                        'Duty'=>'Duty',
                                                                        'Freight'=>'Freight',
                                                                        'Cartage'=>'Cartage',
                                                                        'Insurance'=>'Insurance',
                                                                        'Licence'=>'Licence',
                                                                        'Agency'=>'Agency',
                                                                        'Customs'=>'Customs',
                                                                        'TT Charge'=>'TT Charge',
                                                                        'Others'=>'Others']]);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div style="width: 10%;display: table-cell; padding-right: 2%">
                                                                    <div class="form-label">
                                                                        <?php
                                                                        echo $this->Form->control("additionalcosts.{$key}.amount",['class'=>'form-control']);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div style="width: 20%;display: table-cell; padding-right: 2%">
                                                                    <div class="form-label">
                                                                        <?php
                                                                        echo $this->Form->control("additionalcosts.{$key}.comment",['class'=>'form-control']);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div style="width: 1%;display: table-cell; text-align: center; vertical-align: middle">
                                                                    <a class="additionalcosts-delete" href="#"><i class="fa fa-fw fa-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>

        <!--                                ADD SKU TO BOR COLUMN-->
                                <div style="width: 50%; float: right">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary" id="add-skus-button" style="float: right"><i class="fa-solid fa-plus"></i></button>
                                                    <h5 style="padding-top: 6px">Add Items</h5>
                                                </div>
                                            </div>
                                            <div id="skus-container">
                                                <div class="row skus-row">
                                                    <div style="display: table">
                                                        <div style="display: table-row">
                                                            <div style="width: 25%; display: table-cell; padding-right: 2%">
                                                                <div class="form-label">
                                                                    <?php
                                                                    echo $this->Form->control("orders.0.sku_id",['label'=>'SKU','options'=>$skus,'class'=>'form-select']);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div style="width: 15%; display: table-cell; padding-right: 2%">
                                                                <div class="form-label">
                                                                    <?php
                                                                    echo $this->Form->control("orders.0.quantity",['class'=>'form-control']);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div style="width: 1%;display: table-cell; text-align: center; vertical-align: middle">
                                                                <a class="skus-delete" href="#"><i class="fa fa-fw fa-trash"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script id="skus-template" type="text/x-underscore-template">
                                                    <div class="row skus-row">
                                                        <div style="display: table">
                                                            <div style="display: table-row">
                                                                <div style="width: 25%; display: table-cell; padding-right: 2%">
                                                                    <div class="form-label">
                                                                        <?php
                                                                        echo $this->Form->control("orders.{$key}.sku_id",['label'=>'SKU', 'options'=>$skus,'class'=>'form-select']);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div style="width: 15%; display: table-cell; padding-right: 2%">
                                                                    <div class="form-label">
                                                                        <?php
                                                                        echo $this->Form->control("orders.{$key}.quantity",['class'=>'form-control']);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div style="width: 1%; display: table-cell; text-align: center; vertical-align: middle">
                                                                    <a class="skus-delete" href="#"><i class="fa fa-fw fa-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'style' => 'width: 100%']) ?>
                        <?= $this->Form->end() ?>
                        <?= $this->Flash->render()?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

<?php echo $this->Html->script(['underscore-min.js','additionalcosts.js'],['block'=>true]) ?>




