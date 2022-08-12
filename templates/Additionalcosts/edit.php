<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Additionalcost $additionalcost
 * @var string[]|\Cake\Collection\CollectionInterface $invoices
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $additionalcost->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $additionalcost->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Additionalcosts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="additionalcosts form content">
            <?= $this->Form->create($additionalcost) ?>
            <fieldset>
                <legend><?= __('Edit Additionalcost') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('amount');
                    echo $this->Form->control('invoice_id', ['options' => $invoices]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
