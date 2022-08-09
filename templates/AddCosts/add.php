<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Addcost $addcost
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Addcosts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addcosts form content">
            <?= $this->Form->create($addcost) ?>
            <fieldset>
                <legend><?= __('Add Addcost') ?></legend>
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
