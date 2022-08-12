<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoicesSkus $invoicesSkus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Invoices Skus'), ['action' => 'edit', $invoicesSkus->invoice_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Invoices Skus'), ['action' => 'delete', $invoicesSkus->invoice_id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoicesSkus->invoice_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Invoices Skus'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Invoices Skus'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="invoicesSkus view content">
            <h3><?= h($invoicesSkus->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Invoice') ?></th>
                    <td><?= $invoicesSkus->has('invoice') ? $this->Html->link($invoicesSkus->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $invoicesSkus->invoice->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Skus') ?></th>
                    <td><?= $invoicesSkus->has('skus') ? $this->Html->link($invoicesSkus->skus->name, ['controller' => 'Skus', 'action' => 'view', $invoicesSkus->skus->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($invoicesSkus->quantity) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
