<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skus $skus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Skus'), ['action' => 'edit', $skus->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Skus'), ['action' => 'delete', $skus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skus->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Skus'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Skus'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="skus view content">
            <h3><?= h($skus->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($skus->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= $skus->has('type') ? $this->Html->link($skus->type->name, ['controller' => 'Types', 'action' => 'view', $skus->type->id]) : '' ?></td>
                </tr>
                
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($skus->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($skus->price) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
