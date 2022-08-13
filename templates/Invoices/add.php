<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 * @var \Cake\Collection\CollectionInterface|string[] $addCosts
 */
$key = isset($key) ? $key : '<%= key %>';
?>

<body class="sb-nav-fixed">
    <?php echo $this->element('navbar/navbar')?>
    <div id="layoutSidenav">
        <?php echo $this->element('navbar/sidebar')?>
        <div id="layoutSidenav_content">
            <main>
                <br><br>
                <div class=" card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1" style="padding-top: 11px"></i>
                        Add Bill Of Records
                        <?= $this->Html->link(__('List Bill Of Records'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px']) ?>
                    </div>
                    <div class="card-body">
                        <div class="column-responsive column-80">
<!--                            DETAILS COLUMN-->
                            <div class="col-4" style="float: left">
                                <h4>Details</h4>
                                <div class="skus form content">
                                    <?= $this->Form->create($invoice) ?>
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
                                            echo $this->Form->control('currency_rate',['class'=>'form-control']);
                                            ?>
                                        </div>
                                    </fieldset>
                                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>


<!--                            ADDITIONAL COST COLUMN-->
                            <div class="col-7", style="float: right">
                                <h4>Additional Costs</h4>
                                <div id="additionalcosts-container">
                                    <div class="row additionalcosts-row">
                                        <?php echo $this->Form->hidden("additionalcosts.0.id",['class'=>'form-control']);?>
                                        <div style="display: table">
                                            <div style="display: table-row">
                                                <div style="width: 13%; display: table-cell; padding-right: 2%">
                                                    <div class="form-label">
                                                        Cost
                                                        <?php
                                                        echo $this->Form->select("additionalcosts.0.name", array(
                                                            'Duty',
                                                            'Freight',
                                                            'Cartage',
                                                            'Insurance',
                                                            'Licence',
                                                            'Agency',
                                                            'Customs',
                                                            'TT Charge',
                                                            'Others',
                                                        ), ['class'=>'form-control']);
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
                                                <div style="width: 2%;display: table-cell">
                                                    <a class="contact-delete" href="#"><i class="fa fa-fw fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary" id="add-additionalcosts-button" >Add Additional Costs</button>
                                    </div>
                                </div>


                                <script id="additionalcosts-template" type="text/x-underscore-template">
                                    <div class="row additionalcosts-row">
                                        <?php echo $this->Form->hidden("additionalcosts.{$key}.id",['class'=>'form-control']);?>
                                        <div style="display: table">
                                            <div style="display: table-row">
                                                <div style="width: 13%; display: table-cell; padding-right: 2%">
                                                    <div class="form-label">
                                                        Cost
                                                        <?php
                                                        echo $this->Form->select("additionalcosts.{$key}.name", array(
                                                            'Duty',
                                                            'Freight',
                                                            'Cartage',
                                                            'Insurance',
                                                            'Licence',
                                                            'Agency',
                                                            'Customs',
                                                            'TT Charge',
                                                            'Others',
                                                        ), ['class'=>'form-control']);
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
                                                <div style="width: 2%;display: table-cell">
                                                    <a class="contact-delete" href="#"><i class="fa fa-fw fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

<?php echo $this->Html->script(['underscore-min.js','additionalcosts'],['block'=>true]) ?>




