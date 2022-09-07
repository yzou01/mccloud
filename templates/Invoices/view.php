<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice

 */
?>
<style>
    table {
        width: 100%;
        font-size: 14px;
    }

    th, td {
        border: 1px solid #dee2e6;
        height: 40px;
        padding: 0.5rem 0.5rem
    }

    .th-custom {
        border-bottom: 2px solid black;
    }

    .no-border {
        border: 0;
    }
</style>

<body class="sb-nav-fixed">
    <?php echo $this->element('navbar/navbar')?>
    <div id="layoutSidenav">
        <?php echo $this->element('navbar/sidebar')?>
        <div id="layoutSidenav_content">
            <main>
                <div class=" card mb-4" style="margin-top: 50px">
                    <div class="card-header">
                        <i class="fa-solid fa-receipt" style="padding-top: 11px; padding-right: 2px"></i>
                        Import Records
                        <?= $this->Html->link(__('Edit Import'), ['action' => 'edit', $invoice->id], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                        <?= $this->Html->link(__('List Imports'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                        <?= $this->Html->link(__('Add Import'), ['action' => 'select'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                    </div>
                    <?= $this->Form->create($invoice) ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="column-responsive column-80">
                                <div class="invoices view content">
                                    <h4><?= h($invoice->id) ?></h4>
                                    <fieldset>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('ID',['label'=> 'ID', 'value'=> $this->Number->format($invoice->id),'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('Number',['label'=> 'Invoice Number', 'value'=> h($invoice->number),'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('Date',['label'=> 'Date', 'value'=> h($invoice->date),'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('Factory',['label'=> 'Factory', 'value'=> h($invoice->factory->name),'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('Exchange Rate',['label'=> 'Exchange Rate', 'value'=> $this->Number->format($invoice->currency_rate),'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('GST',['label'=> 'GST', 'value'=> $this->Number->format($invoice->gst),'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                    </fieldset>

<!--                                    ITEMS BREAKDOWN-->
                                    <div style="margin-top: 20px">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h4>Items</h4>
                                                <table class="table-custom">
                                                    <tr>
                                                        <th class="th-custom">No.</th>
                                                        <th class="th-custom">Product</th>
                                                        <th class="th-custom">Quantity</th>
                                                        <th class="th-custom">Unit Cost</th>
                                                        <th class="th-custom">Cost (<?= h($invoice->currency_of_origin) ?>)</th>
                                                        <th class="th-custom">Cost (AUD)</th>
                                                    </tr>
                                                    <?php $sumTC = 0; ?>
                                                    <?php $sumTCA = 0; ?>
                                                    <?php $i = 0; ?>
                                                    <?php foreach ($invoice['orders'] as $orders): ?>
                                                    <tr>
                                                        <td>
                                                            <?=h($invoice->orders[$i]->id) ?>
                                                        </td>

                                                        <!--   Invoice -> Order -> Sku_id find the sku_name using sku_id in the sku table -->
                                                        <td>
                                                            <?=h($invoice->orders[$i]->skus->name) ?>
                                                        </td>

                                                        <td>
                                                            <?=h($invoice->orders[$i]->quantity) ?>
                                                        </td>

<!--                                      Invoice -> Order -> Sku_id find the sku price using sku_id in the sku table -->
                                                        <td> <?=h($invoice->orders[$i]->skus->price) ?></td>
                                                        <td> <?=h($invoice->orders[$i]->quantity * $invoice->orders[0]->skus->price ) ?></td>

                                                        <td> <?=h(round(($invoice->orders[$i]->quantity * $invoice->orders[0]->skus->price) / $invoice->currency_rate,2)) ?> </td>
                                                    </tr>
                                                    <?php $sumTC += round($invoice->orders[$i]->quantity * $invoice->orders[0]->skus->price,2) ?>
                                                    <?php $sumTCA +=  round($invoice->orders[$i]->quantity * $invoice->orders[0]->skus->price / $invoice->currency_rate ,2)?>
                                                    <?php $i = $i + 1; ?>
                                                    <?php endforeach;?>
                                                    <tr>
                                                        <td class="no-border"></td>
                                                        <td class="no-border"></td>
                                                        <td class="no-border"></td>
                                                        <th>Discount (<?=$this->Number->format($invoice->discount)?>%)</th>
                                                        <td> <?=h(round($sumTC * ($invoice->discount/100),2)) ?></td>
                                                        <td> <?=h(round($sumTCA *  ($invoice->discount/100),2)) ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-border"></td>
                                                        <td class="no-border"></td>
                                                        <td class="no-border"></td>
                                                        <th>Total</th>
                                                        <td><?=h(round($sumTC - ($sumTC * ($invoice->discount/100)),2)) ?></td>
                                                        <td><?=h(round($sumTCA - ($sumTCA * ($invoice->discount/100)),2)) ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

<!--                                    ADD COST BREAKDOWN-->
                                    <div style="width: 50%; float: left; padding-right: 2%">
                                        <div class="card mb-4" >
                                            <div class="card-body">
                                                <h4>Additional Costs</h4>
                                                <table>
                                                    <tr>
                                                        <th class="th-custom">Cost</th>
                                                        <th class="th-custom">Amount</th>
                                                    </tr>
                                                    <?php $sumAC = 0?>
                                                    <?php $i = 0; ?>
                                                    <?php foreach ($invoice['additionalcosts'] as $additionalcost): ?>
                                                    <tr>
                                                        <td><?=h($invoice->additionalcosts[$i]->name) ?></td>
                                                        <td><?=h($invoice->additionalcosts[$i]->amount) ?></td>
                                                    </tr>
                                                    <?php $sumAC += $invoice->additionalcosts[$i]->amount ?>
                                                    <?php $i = $i + 1; ?>
                                                    <?php endforeach;?>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td><?=h($sumAC) ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

<!--                                    TOTALS BREAKDOWN-->
                                    <div style="width: 50%; float: right">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h4>Totals</h4>
                                                <table>
                                                    <tr>
                                                        <th class="th-custom"></th>
                                                        <th class="th-custom">Cost (AUD)</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Total costs of items</th>
                                                        <td> <?=h(round($sumTCA - ($sumTCA * ($invoice->discount/100)),2)) ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total of additional costs</th>
                                                        <td> <?=h($sumAC) ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Grand Total</th>
                                                        <td> <?=h(round($sumTCA - ($sumTCA * ($invoice->discount/100)) + $sumAC,2))?> </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?= $this->Html->link(__("Download PDF"), ['action' => 'pdf', $invoice->id ], ['class' => 'btn btn-primary', 'style' => 'width: 100%']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
