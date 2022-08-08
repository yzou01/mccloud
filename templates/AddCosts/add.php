<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AddCost $addCost
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Add Costs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addCosts form content">
            <?= $this->Form->create($addCost) ?>
            <fieldset>
                <legend><?= __('Add Add Cost') ?></legend>
                <?php
                    echo $this->Form->control('duty');
                    echo $this->Form->control('freight_sea');
                    echo $this->Form->control('cartage');
                    echo $this->Form->control('insurance');
                    echo $this->Form->control('licence');
                    echo $this->Form->control('agency');
                    echo $this->Form->control('customs');
                    echo $this->Form->control('TT_charge');
                    echo $this->Form->control('miscellaneous');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
