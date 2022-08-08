<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factory $factory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Factory'), ['action' => 'edit', $factory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Factory'), ['action' => 'delete', $factory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $factory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Factories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Factory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="factories view content">
            <h3><?= h($factory->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($factory->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($factory->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Skus') ?></h4>
                <?php if (!empty($factory->skus)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Type Id') ?></th>
                            <th><?= __('Factory Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($factory->skus as $skus) : ?>
                        <tr>
                            <td><?= h($skus->id) ?></td>
                            <td><?= h($skus->name) ?></td>
                            <td><?= h($skus->price) ?></td>
                            <td><?= h($skus->type_id) ?></td>
                            <td><?= h($skus->factory_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Skus', 'action' => 'view', $skus->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Skus', 'action' => 'edit', $skus->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Skus', 'action' => 'delete', $skus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skus->id)]) ?>
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
