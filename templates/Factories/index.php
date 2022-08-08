<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factory[]|\Cake\Collection\CollectionInterface $factories
 */
?>
<div class="factories index content">
    <?= $this->Html->link(__('New Factory'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Factories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($factories as $factory): ?>
                <tr>
                    <td><?= $this->Number->format($factory->id) ?></td>
                    <td><?= h($factory->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $factory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $factory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $factory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $factory->id)]) ?>
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
