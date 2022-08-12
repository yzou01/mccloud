<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Additionalcost[]|\Cake\Collection\CollectionInterface $additionalcosts
 */
?>
<div class="additionalcosts index content">
    <?= $this->Html->link(__('New Additionalcost'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Additionalcosts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('amounts') ?></th>
                    <th><?= $this->Paginator->sort('invoice_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($additionalcosts as $additionalcost): ?>
                <tr>
                    <td><?= $this->Number->format($additionalcost->id) ?></td>
                    <td><?= h($additionalcost->name) ?></td>
                    <td><?= $this->Number->format($additionalcost->amounts) ?></td>
                    <td><?= $additionalcost->has('invoice') ? $this->Html->link($additionalcost->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $additionalcost->invoice->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $additionalcost->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $additionalcost->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $additionalcost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $additionalcost->id)]) ?>
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
