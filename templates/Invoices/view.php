<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
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
                        Bill Of Records
                        <?= $this->Html->link(__('Edit Bill of Records'), ['action' => 'edit', $invoice->id], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
<!--                        <= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id), 'class' => 'side-nav-item']) ?>-->
                        <?= $this->Html->link(__('List Bill of Records'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                        <?= $this->Html->link(__('Add Bill of Records'), ['action' => 'add'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                    </div>
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
                                    </fieldset>

                                    <div class="related">
                                        <h4><?= __('Related Invoice Sku') ?></h4>
                                        <h6>Coming in later iterations</h6>
                                        <?php if (!empty($invoice->order)) : ?>
                                            <div class="table-responsive">
                                                <table>
                                                    <tr>
                                                        <th><?= __('Invoice Id') ?></th>
                                                        <th><?= __('Sku Id') ?></th>
                                                        <th><?= __('Quantity') ?></th>
                                                        <th class="actions"><?= __('Actions') ?></th>
                                                    </tr>
                                                    <?php foreach ($invoice->order as $order) : ?>
                                                        <tr>
                                                            <td><?= h($order->invoice_id) ?></td>
                                                            <td><?= h($order->sku_id) ?></td>
                                                            <td><?= h($order->quantity) ?></td>
                                                            <td class="actions">
                                                                <?= $this->Html->link(__('View'), ['controller' => 'Order', 'action' => 'view', $order->id]) ?>
                                                                <?= $this->Html->link(__('Edit'), ['controller' => 'Order', 'action' => 'edit', $order->id]) ?>
                                                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Order', 'action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>






