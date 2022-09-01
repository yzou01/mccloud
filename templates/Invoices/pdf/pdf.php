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

<body>
    <main>
        <div class=" card mb-4" style="margin-top: 50px">
            <div class="card-header">
                <i class="fa-solid fa-receipt" style="padding-top: 11px; padding-right: 2px"></i>
                Import Records
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="column-responsive column-80">
                        <div class="invoices view content">
                            <h4><?= h($report->id) ?></h4>
                            <fieldset>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('Number',['label'=> 'Number', 'value'=> h($report->number),'class'=>'form-control', 'disabled' => 'true']);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('Currency',['label'=> 'Currency', 'value'=> h($report->currency_of_origin),'class'=>'form-control', 'disabled' => 'true']);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('ID',['label'=> 'ID', 'value'=> $this->Number->format($report->id),'class'=>'form-control', 'disabled' => 'true']);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('Exchange Rate',['label'=> 'Exchange Rate', 'value'=> $this->Number->format($report->currency_rate),'class'=>'form-control', 'disabled' => 'true']);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('GST',['label'=> 'GST', 'value'=> $this->Number->format($report->gst),'class'=>'form-control', 'disabled' => 'true']);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('Date',['label'=> 'Date', 'value'=> h($report->date),'class'=>'form-control', 'disabled' => 'true']);
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
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="no-border"></td>
                                                <td class="no-border"></td>
                                                <td class="no-border"></td>
                                                <th>Discount</th>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="no-border"></td>
                                                <td class="no-border"></td>
                                                <td class="no-border"></td>
                                                <th>Total</th>
                                                <td></td>
                                                <td></td>
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
                                                <td></td>
                                                <td></td>
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
                                                <td></td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>





