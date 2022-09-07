<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<?= $this->Html->css('styles.css', ['fullBase' => true]) ?>
<style>
    table {
        width: 100%;
        font-size: 14px;
    }

    th, td {
        border: 1px solid #dee2e6;
        height: 30px;
        padding: 1px 5px;
    }

    .th-custom {
        border-bottom: 2px solid black;
    }

    .no-border {
        border: 0;
    }
</style>

<body>
    <main>
        <div>
            <h2>Import Records</h2>
        </div>
        <div style="margin-top: 20px">
            <div class="row">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4><?= h($report->id) ?></h4>
                        <fieldset style="width: 96.2%">
                            <div class="form-label">
                                <?php
                                echo $this->Form->control('ID',['label'=> 'ID', 'value'=> $this->Number->format($report->id),'class'=>'form-control']);
                                ?>
                            </div>
                            <div class="form-label">
                                <?php
                                echo $this->Form->control('Number',['label'=> 'Invoice Number', 'value'=> h($report->number),'class'=>'form-control']);
                                ?>
                            </div>
                            <div class="form-label">
                                <?php
                                echo $this->Form->control('Date',['label'=> 'Date', 'value'=> h($report->date),'class'=>'form-control']);
                                ?>
                            </div>
                            <div class="form-label">
                                <?php
                                echo $this->Form->control('Factory',['label'=> 'Factory', 'value'=> h($report->factory->name),'class'=>'form-control']);
                                ?>
                            </div>
                            <div class="form-label">
                                <?php
                                echo $this->Form->control('Exchange Rate',['label'=> 'Exchange Rate', 'value'=> $this->Number->format($report->currency_rate),'class'=>'form-control']);
                                ?>
                            </div>
                            <div class="form-label">
                                <?php
                                echo $this->Form->control('GST',['label'=> 'GST', 'value'=> $this->Number->format($report->gst),'class'=>'form-control']);
                                ?>
                            </div>
                        </fieldset>
                    </div>
                </div>
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
                                    <th class="th-custom">Cost in <?= h($report->currency_of_origin) ?></th>
                                    <th class="th-custom">Cost in AUD</th>
                                </tr>
                                <?php $sumTC = 0; ?>
                                <?php $sumTCA = 0; ?>
                                <?php $i = 0; ?>
                                <?php foreach ($report['orders'] as $orders): ?>
                                    <tr>
                                        <td>
                                            <?=h($report->orders[$i]->id) ?>
                                        </td>

                                        <!--   Invoice -> Order -> Sku_id find the sku_name using sku_id in the sku table -->
                                        <td>
                                            <?=h($report->orders[$i]->skus->name) ?>
                                        </td>

                                        <td>
                                            <?=h($report->orders[$i]->quantity) ?>
                                        </td>

                                        <!--                                      Invoice -> Order -> Sku_id find the sku price using sku_id in the sku table -->
                                        <td> <?=h($report->orders[$i]->skus->price) ?></td>
                                        <td> <?=h($report->orders[$i]->quantity * $report->orders[0]->skus->price ) ?></td>

                                        <td> <?=h(round(($report->orders[$i]->quantity * $report->orders[0]->skus->price) / $report->currency_rate,2)) ?> </td>
                                    </tr>
                                    <?php $sumTC += round($report->orders[$i]->quantity * $report->orders[0]->skus->price,2) ?>
                                    <?php $sumTCA +=  round($report->orders[$i]->quantity * $report->orders[0]->skus->price / $report->currency_rate ,2)?>
                                    <?php $i = $i + 1; ?>
                                <?php endforeach;?>
                                <tr>
                                    <td class="no-border"></td>
                                    <td class="no-border"></td>
                                    <td class="no-border"></td>
                                    <th>Discount (<?=$this->Number->format($report->discount)?>%)</th>
                                    <td> <?=h(round($sumTC * ($report->discount/100),2)) ?></td>
                                    <td> <?=h(round($sumTCA *  ($report->discount/100),2)) ?> </td>
                                </tr>
                                <tr>
                                    <td class="no-border"></td>
                                    <td class="no-border"></td>
                                    <td class="no-border"></td>
                                    <th>Total</th>
                                    <td><?=h(round($sumTC - ($sumTC * ($report->discount/100)),2)) ?></td>
                                    <td><?=h(round($sumTCA - ($sumTCA * ($report->discount/100)),2)) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                        <!--                                    ADD COST BREAKDOWN-->
                <div style="margin-top: 2%">
                    <div style="width: 49%; float: left; padding-right: 2%">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4>Additional Costs</h4>
                                <table>
                                    <tr>
                                        <th class="th-custom">Cost</th>
                                        <th class="th-custom">Amount</th>
                                    </tr>
                                    <?php $sumAC = 0?>
                                    <?php $i = 0; ?>
                                    <?php foreach ($report['additionalcosts'] as $additionalcost): ?>
                                        <tr>
                                            <td><?=h($report->additionalcosts[$i]->name) ?></td>
                                            <td><?=h($report->additionalcosts[$i]->amount) ?></td>
                                        </tr>
                                        <?php $sumAC += $report->additionalcosts[$i]->amount ?>
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
                    <div style="width: 49%; float: left">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4>Totals</h4>
                                <table>
                                    <tr>
                                        <th>Total costs of items</th>
                                        <td> <?=h(round($sumTCA - ($sumTCA * ($report->discount/100)),2)) ?> </td>
                                    </tr>
                                    <tr>
                                        <th>Total of additional costs</th>
                                        <td> <?=h($sumAC) ?> </td>
                                    </tr>
                                    <tr>
                                        <th>Grand Total</th>
                                        <td> <?=h(round($sumTCA - ($sumTCA * ($report->discount/100)) + $sumAC,2))?> </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>



