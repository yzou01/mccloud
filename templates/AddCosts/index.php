<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Addcost[]|\Cake\Collection\CollectionInterface $addcosts
 */
?>
<div class="addcosts index content">
    <?= $this->Html->link(__('New Addcost'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Addcosts') ?></h3>
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
                <?php foreach ($addcosts as $addcost): ?>
                <tr>
                    <td><?= $this->Number->format($addcost->id) ?></td>
                    <td><?= $addcost->duty === null ? '' : $this->Number->format($addcost->duty) ?></td>
                    <td><?= $addcost->freight_sea === null ? '' : $this->Number->format($addcost->freight_sea) ?></td>
                    <td><?= $addcost->cartage === null ? '' : $this->Number->format($addcost->cartage) ?></td>
                    <td><?= $addcost->insurance === null ? '' : $this->Number->format($addcost->insurance) ?></td>
                    <td><?= $addcost->licence === null ? '' : $this->Number->format($addcost->licence) ?></td>
                    <td><?= $addcost->agency === null ? '' : $this->Number->format($addcost->agency) ?></td>
                    <td><?= $addcost->customs === null ? '' : $this->Number->format($addcost->customs) ?></td>
                    <td><?= $addcost->TT_charge === null ? '' : $this->Number->format($addcost->TT_charge) ?></td>
                    <td><?= $addcost->miscellaneous === null ? '' : $this->Number->format($addcost->miscellaneous) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $addcost->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $addcost->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $addcost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addcost->id)]) ?>
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
