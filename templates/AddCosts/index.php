<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AddCost[]|\Cake\Collection\CollectionInterface $addCosts
 */
?>
<div class="addCosts index content">
    <?= $this->Html->link(__('New Add Cost'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Add Costs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('duty') ?></th>
                    <th><?= $this->Paginator->sort('freight_sea') ?></th>
                    <th><?= $this->Paginator->sort('cartage') ?></th>
                    <th><?= $this->Paginator->sort('insurance') ?></th>
                    <th><?= $this->Paginator->sort('licence') ?></th>
                    <th><?= $this->Paginator->sort('agency') ?></th>
                    <th><?= $this->Paginator->sort('customs') ?></th>
                    <th><?= $this->Paginator->sort('TT_charge') ?></th>
                    <th><?= $this->Paginator->sort('miscellaneous') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($addCosts as $addCost): ?>
                <tr>
                    <td><?= $this->Number->format($addCost->id) ?></td>
                    <td><?= $addCost->duty === null ? '' : $this->Number->format($addCost->duty) ?></td>
                    <td><?= $addCost->freight_sea === null ? '' : $this->Number->format($addCost->freight_sea) ?></td>
                    <td><?= $addCost->cartage === null ? '' : $this->Number->format($addCost->cartage) ?></td>
                    <td><?= $addCost->insurance === null ? '' : $this->Number->format($addCost->insurance) ?></td>
                    <td><?= $addCost->licence === null ? '' : $this->Number->format($addCost->licence) ?></td>
                    <td><?= $addCost->agency === null ? '' : $this->Number->format($addCost->agency) ?></td>
                    <td><?= $addCost->customs === null ? '' : $this->Number->format($addCost->customs) ?></td>
                    <td><?= $addCost->TT_charge === null ? '' : $this->Number->format($addCost->TT_charge) ?></td>
                    <td><?= $addCost->miscellaneous === null ? '' : $this->Number->format($addCost->miscellaneous) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $addCost->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $addCost->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $addCost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addCost->id)]) ?>
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
