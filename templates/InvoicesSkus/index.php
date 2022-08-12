<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoicesSkus[]|\Cake\Collection\CollectionInterface $invoicesSkus
 */
?>
<div class="invoicesSkus index content">
    <?= $this->Html->link(__('New Invoices Skus'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Invoices Skus') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('invoice_id') ?></th>
                    <th><?= $this->Paginator->sort('sku_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoicesSkus as $invoicesSkus): ?>
                <tr>
                    <td><?= $invoicesSkus->has('invoice') ? $this->Html->link($invoicesSkus->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $invoicesSkus->invoice->id]) : '' ?></td>
                    <td><?= $invoicesSkus->has('skus') ? $this->Html->link($invoicesSkus->skus->name, ['controller' => 'Skus', 'action' => 'view', $invoicesSkus->skus->id]) : '' ?></td>
                    <td><?= $this->Number->format($invoicesSkus->quantity) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $invoicesSkus->invoice_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoicesSkus->invoice_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoicesSkus->invoice_id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoicesSkus->invoice_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
