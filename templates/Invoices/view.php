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
        border: 0px;
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
                        Bill Of Records
                        <?= $this->Html->link(__('Edit Bill of Records'), ['action' => 'edit', $invoice->id], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
<!--                        <= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id), 'class' => 'side-nav-item']) ?>-->
                        <?= $this->Html->link(__('List Bill of Records'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                        <?= $this->Html->link(__('Add Bill of Records'), ['action' => 'add'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                    </div>
                    <?= $this->Form->create($invoice) ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="column-responsive column-80">
                                <div class="invoices view content">
                                    <legend><?= h($invoice->id) ?></legend>
                                    <fieldset>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('Number',['label'=> 'Number', 'value'=> h($invoice->number),'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('Currency',['label'=> 'Currency', 'value'=> h($invoice->currency_of_origin),'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('ID',['label'=> 'ID', 'value'=> $this->Number->format($invoice->id),'class'=>'form-control', 'disabled' => 'true']);
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
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('Date',['label'=> 'Date', 'value'=> h($invoice->date),'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('Discount',['label'=> 'Discount', 'value'=> h($invoice->discount),'class'=>'form-control', 'disabled' => 'true']);
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
                                                        <th class="th-custom">Total Cost</th>
                                                        <th class="th-custom">Cost in AUD</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?=h($invoice->orders[0]->id) ?>
                                                        </td>

                                                        <!--   Invoice -> Order -> Sku_id find the sku_name using sku_id in the sku table -->
                                                        <td>
                                                            <?=h($invoice->orders[0]->skus->name) ?>
                                                        </td>

                                                        <td>
                                                            <?=h($invoice->orders[0]->quantity) ?>
                                                        </td>

<!--                                      Invoice -> Order -> Sku_id find the sku price using sku_id in the sku table -->
                                                        <td> <?=h($invoice->orders[0]->skus->price) ?></td>
                                                        <td> <?=h($invoice->orders[0]->quantity * $invoice->orders[0]->skus->price ) ?></td>

                                                        <td> <?=h(($invoice->orders[0]->quantity * $invoice->orders[0]->skus->price) / $invoice->currency_rate ) ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-border"></td>
                                                        <td class="no-border"></td>
                                                        <td class="no-border"></td>
                                                        <th>Discount</th>
                                                        <td> <?=h($invoice->orders[0]->quantity * $invoice->orders[0]->skus->price * $invoice->discount) ?></td>
                                                        <td> <?=h(($invoice->orders[0]->quantity * $invoice->orders[0]->skus->price) / $invoice->currency_rate *  $invoice->discount) ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-border"></td>
                                                        <td class="no-border"></td>
                                                        <td class="no-border"></td>
                                                        <th>Total</th>
                                                        <td><?=h($invoice->orders[0]->quantity * $invoice->orders[0]->skus->price - $invoice->orders[0]->quantity * $invoice->orders[0]->skus->price * $invoice->discount) ?></td>
                                                        <td><?=h(($invoice->orders[0]->quantity * $invoice->orders[0]->skus->price) / $invoice->currency_rate - $invoice->orders[0]->quantity * $invoice->orders[0]->skus->price / $invoice->currency_rate *  $invoice->discount) ?></td>
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
                                                    <tr>
                                                        <td><?=h($invoice->additionalcosts[0]->name) ?></td>
                                                        <td><?=h($invoice->additionalcosts[0]->amount) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td></td>
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
                                                        <th>Total costs of items</th>
                                                        <td> <?=h($invoice->orders[0]->quantity * $invoice->orders[0]->skus->price ) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total of additional costs</th>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Grand Total</th>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" style="width: 100% ;float:right"><i class="fa-solid fa-download"></i> Download PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>





