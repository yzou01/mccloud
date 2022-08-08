<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Invoice'), ['action' => 'edit', $invoice->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Invoices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Invoice'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="invoices view content">
            <h3><?= h($invoice->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= h($invoice->number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Currency Of Origin') ?></th>
                    <td><?= h($invoice->currency_of_origin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Add Cost') ?></th>
                    <td><?= $invoice->has('add_cost') ? $this->Html->link($invoice->add_cost->id, ['controller' => 'AddCosts', 'action' => 'view', $invoice->add_cost->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($invoice->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Currency Rate') ?></th>
                    <td><?= $this->Number->format($invoice->currency_rate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($invoice->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Invoice Sku') ?></h4>
                <?php if (!empty($invoice->invoice_sku)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Invoice Id') ?></th>
                            <th><?= __('Sku Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($invoice->invoice_sku as $invoiceSku) : ?>
                        <tr>
                            <td><?= h($invoiceSku->invoice_id) ?></td>
                            <td><?= h($invoiceSku->sku_id) ?></td>
                            <td><?= h($invoiceSku->quantity) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'InvoiceSku', 'action' => 'view', $invoiceSku->]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'InvoiceSku', 'action' => 'edit', $invoiceSku->]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'InvoiceSku', 'action' => 'delete', $invoiceSku->], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceSku->)]) ?>
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
