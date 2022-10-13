<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 * @var string[]|\Cake\Collection\CollectionInterface $addCosts
 * @var \App\Model\Entity\Skus $sku
 * @var \App\Model\Entity\Additionalcost $additionalcosts
 */
$i = isset($i) ? $i : '<%= i %>';
$key = isset($key) ? $key : '<%= key %>';
?>

<body class="sb-nav-fixed">
    <?php echo $this->element('navbar/navbar') ?>
    <div id="layoutSidenav">
        <?php echo $this->element('navbar/sidebar') ?>
        <div id="layoutSidenav_content">
            <main>
                <div class=" card mb-4" style="margin-top: 50px">
                    <div class="card-header">
                        <i class="fas fa-table me-1" style="padding-top: 11px"></i>
                        Import Records
                        <?= $this->Form->button ('Back', ['onclick' =>'history.back ()', 'type' =>'button', 'class' => 'btn btn-primary', 'style' => 'float: right'])?>
                    </div>
                    <div class="card-body">
                        <?= $this->Form->create($invoice) ?>
                        <div class="column-responsive column-80">
                            <div class="invoices form content">
                                <fieldset>
                                    <div style="width: 50%; float: left; padding-right: 2%">
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('number', ['class' => 'form-control']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php echo $this->Form->control('date',['class'=>'form-control', 'min' =>"2000-01-01" , 'max' => "2100-01-01"]);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('factory_id', ['class' => 'form-control']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('currency_rate', ['class' => 'form-control', 'min' => 0, 'label' => 'Exchange Rate']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->hidden("currency_of_origin", ['label' => 'Currency','class' => 'form-select', 'options' => [
                                                'EUR'=>'EUR - Euro',
                                                'GBP'=>'GBP - Pound Sterling',
                                                'JPY'=>'JPY - Japanese Yen',
                                                'CNY'=>'CNY - Chinese Yuan',
                                                'ZAR'=>'ZAR - South African Rand',
                                                'USD'=>'USD - United States Dollar',
                                                'NZD'=>'NZD -  New Zealand Dollar',
                                                'AUD'=>'AUD - Australian Dollar',
                                            ]
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    <div style="width: 50%; float: left; padding-right: 2%">
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('discount', ['class' => 'form-control', 'min' => 0, 'label' => 'Discount %']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            Additional Notes (GST, etc.)
                                            <?php
                                            echo $this->Form->textarea('gst',['class'=>'form-control', 'style'=>'resize:none; height:110px']);
                                            ?>
                                        </div>
                                    </div>
                            </div>

                            <div style="margin-top: 20px">
<!--                                ADD SKU TO BOR COLUMN-->
                                <div style="width: 50%; float: left; padding-right: 2%">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary" id="add-skus-button" style="float: right"><i class="fa-solid fa-plus"></i></button>
                                                    <h5 style="padding-top: 6px">Add Items</h5>
                                                </div>
                                            </div>
                                            <?php if (!empty($invoice->orders)): ?>
                                            <div id="skus-container">
                                                <?php $i = 0; ?>
                                                <?php foreach ($invoice['orders'] as $order): ?>
                                                    <div class="row skus-row">
                                                        <div style="display: table">
                                                            <div style="display: table-row">
                                                                <div style="width: 25%; display: table-cell; padding-right: 2%">
                                                                    <div class="form-label">
                                                                        <?php
                                                                        echo $this->Form->hidden('orders.'.$i.'.id',[ 'value'=> $order -> id]);
                                                                        ?>
                                                                        <?php
                                                                        echo $this->Form->control('orders.'.$i.'.sku_id',['label'=>'Product','class'=>'form-select','value' => $order-> sku_id, 'options'=> $skus]);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div style="width: 15%; display: table-cell; padding-right: 2%">
                                                                    <div class="form-label">
                                                                        <?php
                                                                        echo $this->Form->control('orders.'.$i.'.quantity',['label'=>'Quantity','class'=>'form-control', 'value'=> $order -> quantity]);
                                                                        ?>
                                                                    </div>
                                                                </div>
<!--                                                                <div style="width: 1%;display: table-cell; text-align: center; vertical-align: middle">-->
<!--                                                                    <a class="skus-delete" href="#"><i class="fa fa-fw fa-trash"></i></a>-->
<!--                                                                </div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $i = $i + 1; ?>
                                                <?php endforeach;?>

                                                <script id="skus-template" type="text/x-underscore-template">
                                                    <div class="row skus-row">
                                                        <div style="display: table">
                                                            <div style="display: table-row">
                                                                <div style="width: 25%; display: table-cell; padding-right: 2%">
                                                                    <div class="form-label">
                                                                        <div class="input text required">
                                                                            <?php
                                                                            echo $this->Form->control("orders.{$key}.sku_id", ['label'=>'Product', 'options' => $skus, 'class' => 'form-select']);
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div style="width: 15%; display: table-cell; padding-right: 2%">
                                                                    <div class="form-label">
                                                                        <?php
                                                                        echo $this->Form->control("orders.{$key}.quantity", ['class' => 'form-control']);
                                                                        ?>
                                                                    </div>
                                                                </div>
<!--                                                                <div style="width: 1%;display: table-cell; text-align: center; vertical-align: middle">-->
<!--                                                                    <a class="skus-delete" href="#"><i class="fa fa-fw fa-trash"></i></a>-->
<!--                                                                </div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </script>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

<!--                                ADDITIONAL COST COLUMN-->
                                <div style="width: 50%; float: right">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary" id="add-additionalcosts-button" style="float: right"><i class="fa-solid fa-plus"></i></button>
                                                    <h5 style="padding-top: 6px">Additional Costs</h5>
                                                </div>
                                            </div>
                                            <?php if (!empty($invoice->additionalcosts)): ?>
                                            <div id="additionalcosts-container">
                                                <?php $i = 0; ?>
                                                <?php foreach ($invoice['additionalcosts'] as $additionalcost): ?>
                                                <div class="row additionalcosts-row" data-item-id="<?= $additionalcost -> id ?>">
                                                    <div style="display: table">
                                                        <div style="display: table-row">
                                                            <div style="width: 13%; display: table-cell; padding-right: 2%">
                                                                <div class="form-label">
                                                                    <?php
                                                                    echo $this->Form->hidden('additionalcosts.'.$i.'.id',[ 'value'=> $additionalcost -> id]);
                                                                    ?>
                                                                    <?php echo $this->Form->control('additionalcosts.'.$i.'.name',['label'=>'Cost','class'=>'form-select', 'value'=> $additionalcost -> name ,'options'=>[
                                                                        'Duty' => 'Duty',
                                                                        'Freight' => 'Freight',
                                                                        'Cartage' => 'Cartage',
                                                                        'Insurance' => 'Insurance',
                                                                        'Licence' => 'Licence',
                                                                        'Agency' => 'Agency',
                                                                        'Customs' => 'Customs',
                                                                        'TT Charge' => 'TT Charge',
                                                                        'Others' => 'Others'
                                                                    ]
                                                                    ]);?>
                                                                </div>
                                                            </div>
                                                            <div style="width: 10%;display: table-cell; padding-right: 2%">
                                                                <div class="form-label">
                                                                    <div class="input text required">
                                                                        <?php
                                                                        echo $this->Form->control('additionalcosts.'.$i.'.amount',['label'=>'Amount','class'=>'form-control', 'value'=> $additionalcost -> amount]);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="width: 20%;display: table-cell; padding-right: 2%">
                                                                <div class="form-label">
                                                                    <?php
                                                                    echo $this->Form->control('additionalcosts.'.$i.'.comment',['label'=>'Comment','class'=>'form-control', 'value'=> $additionalcost -> comment]);
                                                                    ?>
                                                                </div>
                                                            </div>
<!--                                                            <div style="width: 1%; display: table-cell; text-align: center;vertical-align: middle">-->
<!--                                                                <a class="additionalcosts-delete" href="#"><i class="fa fa-fw fa-trash"></i></a>-->
<!--                                                            </div>-->
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
                                                                        echo $this->Form->control("additionalcosts.{$key}.name", ['class' => 'form-select', 'label' => 'Cost', 'options' => [
                                                                            'Duty' => 'Duty',
                                                                            'Freight' => 'Freight',
                                                                            'Cartage' => 'Cartage',
                                                                            'Insurance' => 'Insurance',
                                                                            'Licence' => 'Licence',
                                                                            'Agency' => 'Agency',
                                                                            'Customs' => 'Customs',
                                                                            'TT Charge' => 'TT Charge',
                                                                            'Others' => 'Others'
                                                                        ]]);
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
<!--                                                                <div style="width: 1%; display: table-cell; text-align: center;vertical-align: middle">-->
<!--                                                                    <a class="additionalcosts-delete" href="#"><i class="fa fa-fw fa-trash"></i></a>-->
<!--                                                                </div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </script>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--                        <div id="to_be_deleted"></div>-->
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'style' => 'width: 100%']) ?>
                        <?= $this->Form->end() ?>
                        <?= $this->Flash->render() ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

<?php echo $this->Html->script(['underscore-min.js', 'additionalcosts.js'], ['block' => true]) ?>




