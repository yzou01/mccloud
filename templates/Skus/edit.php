<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skus $skus
 * @var string[]|\Cake\Collection\CollectionInterface $types
 * @var string[]|\Cake\Collection\CollectionInterface $factories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $skus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $skus->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Skus'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="skus form content">
            <?= $this->Form->create($skus) ?>
            <fieldset>
                <legend><?= __('Edit Skus') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('price');
                    echo $this->Form->control('type_id', ['options' => $types]);
                    echo $this->Form->control('factory_id', ['options' => $factories]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
