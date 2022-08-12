<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoicesSkus $invoicesSkus
 * @var string[]|\Cake\Collection\CollectionInterface $invoices
 * @var string[]|\Cake\Collection\CollectionInterface $skus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $invoicesSkus->invoice_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $invoicesSkus->invoice_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Invoices Skus'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="invoicesSkus form content">
            <?= $this->Form->create($invoicesSkus) ?>
            <fieldset>
                <legend><?= __('Edit Invoices Skus') ?></legend>
                <?php
                    echo $this->Form->control('quantity');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
