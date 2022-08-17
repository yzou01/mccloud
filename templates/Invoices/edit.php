<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 * @var string[]|\Cake\Collection\CollectionInterface $addCosts
 * @var \App\Model\Entity\Skus $skus
 * @var \App\Model\Entity\Additionalcost $additionalcosts
 */
$key = isset($key) ? $key : '<%= key %>';
?>

<body class="sb-nav-fixed">
<?php echo $this->element('navbar/navbar') ?>
<div id="layoutSidenav">
    <?php echo $this->element('navbar/sidebar') ?>
    <div id="layoutSidenav_content">
        <main>
            <br><br>
            <div class=" card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1" style="padding-top: 11px"></i>Bill Of Records
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right']) ?>
                </div>
                <div class="card-body">
                    <div class="column-responsive column-80">
                        <div class="invoices form content">
                            <?= $this->Form->create($invoice) ?>
                            <fieldset>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('number', ['class' => 'form-control']);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('date', ['class' => 'form-control']);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('factory_id', ['class' => 'form-control']);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('currency_of_origin', ['class' => 'form-control']);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('currency_rate', ['class' => 'form-control', 'min' => 0]);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('gst', ['class' => 'form-control', 'min' => 0, 'label' => 'Gst Cost']);
                                    ?>
                                </div>
                        </div>

                        <br>
                        <!--   ADDITIONAL COST COLUMN-->
                        <div>
                            <h4>Additional Costs</h4>
                            <?php if (!empty($invoice->additionalcosts)): ?>
                            <div id="additionalcosts-container">
                                <?php $i = 0; ?>
                                <?php foreach ($invoice['additionalcosts'] as $additionalcost): ?>
                                    <div class="row additionalcosts-row">

                                        <div style="display: table">
                                            <div style="display: table-row">
                                                <div style="width: 13%; display: table-cell; padding-right: 2%">
                                                    <div class="form-label">

                                                        <?php
                                                        echo $this->Form->control("additionalcost.name",['class'=>'form-control','label'=>'Cost',
                                                            'options'=>[
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
                                                        <div class="input text required">
                                                            <label>Amount</label>
                                                            <input type="number" name="additionalcosts[<?php echo $i?>][amount]" class="form-control" required="required"  value="<?php echo $additionalcost['amount']?>"/>
                                                        </div>

                                                        <?php
                                                        echo $this->Form->control("additionalcost",['class'=>'form-control']);
                                                        ?>
                                                    </div>
                                                </div>
                                                <div style="width: 20%;display: table-cell; padding-right: 2%">
                                                    <div class="form-label">
                                                        <?php
                                                        echo $this->Form->control("additionalcost.comment",['class'=>'form-control']);
                                                        ?>
                                                    </div>
                                                </div>
                                                <div style="width: 2%;display: table-cell">
                                                    <a class="additionalcosts-delete" href="#"><i class="fa fa-fw fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php $i = $i + 1; ?>
                                <?php endforeach;?>

                                <script id="additionalcosts-template" type="text/x-underscore-template">
                                    <div class="row additionalcosts-row">

                                        <div style="display: table">
                                            <div style="display: table-row">
                                                <div style="width: 13%; display: table-cell; padding-right: 2%">
                                                    <div class="form-label">

                                                        <?php
                                                        echo $this->Form->control("additionalcosts.{$key}.name", ['class' => 'form-control', 'label' => 'Cost',
                                                            'options' => [
                                                                'Duty' => 'Duty',
                                                                'Freight' => 'Freight',
                                                                'Cartage' => 'Cartage',
                                                                'Insurance' => 'Insurance',
                                                                'Licence' => 'Licence',
                                                                'Agency' => 'Agency',
                                                                'Customs' => 'Customs',
                                                                'TT Charge' => 'TT Charge',
                                                                'Others' => 'Others']]);
                                                        ?>
                                                    </div>
                                                </div>
                                                <div style="width: 10%;display: table-cell; padding-right: 2%">
                                                    <div class="form-label">
                                                        <?php
                                                        echo $this->Form->control("additionalcosts.{$key}.amount", ['class' => 'form-control']);
                                                        ?>
                                                    </div>
                                                </div>
                                                <div style="width: 20%;display: table-cell; padding-right: 2%">
                                                    <div class="form-label">
                                                        <?php
                                                        echo $this->Form->control("additionalcosts.{$key}.comment", ['class' => 'form-control']);
                                                        ?>
                                                    </div>
                                                </div>
                                                <div style="width: 2%;display: table-cell">
                                                    <a class="additionalcosts-delete" href="#"><i
                                                            class="fa fa-fw fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </script>
                                <?php endif; ?>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary" id="add-additionalcosts-button"
                                            style=" margin-bottom: 5px">Add Additional Costs
                                    </button>
                                </div>
                            </div>


                        </div>
                        <!--                            ADD SKU TO BOR COLUMN-->
                        <div> <!--class="col-7", style="float: right"-->
                            <h4>Add Items</h4>
                            <?php if (!empty($invoice->orders)): ?>
                            <div id="skus-container">
                                <?php $i = 0; ?>
                                <?php foreach ($invoice['orders'] as $order): ?>
                                    <div class="row skus-row">
                                        <div style="display: table">
                                            <div style="display: table-row">
                                                <div style="width: 13%; display: table-cell; padding-right: 2%">

                                                    <div class="form-label">
                                                        <?php
                                                        echo $this->Form->control("orders.0.sku_id", ['label' => 'SKU', 'options' => $skus, 'class' => 'form-control']);
                                                        ?>
                                                    </div>
                                                </div>
                                                <div style="width: 13%; display: table-cell; padding-right: 2%">
                                                    <div class="form-label">
                                                        <?php
                                                        echo $this->Form->control("orders.0.quantity", ['class' => 'form-control']);
                                                        ?>
                                                    </div>
                                                </div>
                                                <div style="width: 2%;display: table-cell">
                                                    <a class="skus-delete" href="#"><i
                                                            class="fa fa-fw fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php $i = $i + 1; ?>
                                <?php endforeach;?>

                                <script id="skus-template" type="text/x-underscore-template">
                                    <div class="row skus-row">
                                        <div style="display: table">
                                            <div style="display: table-row">
                                                <div style="width: 13%; display: table-cell; padding-right: 2%">
                                                    <div class="form-label">
                                                        <?php
                                                        echo $this->Form->control("orders.{$key}.sku_id", ['options' => $skus, 'class' => 'form-control']);
                                                        ?>
                                                    </div>
                                                </div>
                                                <div style="width: 13%; display: table-cell; padding-right: 2%">
                                                    <div class="form-label">
                                                        <?php
                                                        echo $this->Form->control("orders.{$key}.quantity", ['class' => 'form-control']);
                                                        ?>
                                                    </div>
                                                </div>
                                                <div style="width: 2%;display: table-cell">
                                                    <a class="skus-delete" href="#"><i
                                                            class="fa fa-fw fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </script>
                                <?php endif; ?>
                            </div>



                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary" id="add-skus-button"
                                            style=" margin-bottom: 5px">Add SKUs
                                    </button>
                                </div>
                            </div>


                        </div>
                    </div>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Flash->render() ?>
                </div>
            </div>
        </main>
    </div>
</div>
</body>

<?php echo $this->Html->script(['underscore-min.js', 'additionalcosts.js'], ['block' => true]) ?>




