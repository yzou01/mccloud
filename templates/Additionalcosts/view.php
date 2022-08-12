<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Additionalcost $additionalcost
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Additionalcost'), ['action' => 'edit', $additionalcost->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Additionalcost'), ['action' => 'delete', $additionalcost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $additionalcost->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Additionalcosts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Additionalcost'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="additionalcosts view content">
            <h3><?= h($additionalcost->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($additionalcost->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice') ?></th>
                    <td><?= $additionalcost->has('invoice') ? $this->Html->link($additionalcost->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $additionalcost->invoice->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($additionalcost->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($additionalcost->amount) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
