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
            <?= $this->Html->link(__('Edit Addcost'), ['action' => 'edit', $addcost->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Addcost'), ['action' => 'delete', $addcost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addcost->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Addcosts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Addcost'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addcosts view content">
            <h3><?= h($addcost->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($addcost->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Duty') ?></th>
                    <td><?= $addcost->duty === null ? '' : $this->Number->format($addcost->duty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Freight Sea') ?></th>
                    <td><?= $addcost->freight_sea === null ? '' : $this->Number->format($addcost->freight_sea) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cartage') ?></th>
                    <td><?= $addcost->cartage === null ? '' : $this->Number->format($addcost->cartage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Insurance') ?></th>
                    <td><?= $addcost->insurance === null ? '' : $this->Number->format($addcost->insurance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Licence') ?></th>
                    <td><?= $addcost->licence === null ? '' : $this->Number->format($addcost->licence) ?></td>
                </tr>
                <tr>
                    <th><?= __('Agency') ?></th>
                    <td><?= $addcost->agency === null ? '' : $this->Number->format($addcost->agency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customs') ?></th>
                    <td><?= $addcost->customs === null ? '' : $this->Number->format($addcost->customs) ?></td>
                </tr>
                <tr>
                    <th><?= __('TT Charge') ?></th>
                    <td><?= $addcost->TT_charge === null ? '' : $this->Number->format($addcost->TT_charge) ?></td>
                </tr>
                <tr>
                    <th><?= __('Miscellaneous') ?></th>
                    <td><?= $addcost->miscellaneous === null ? '' : $this->Number->format($addcost->miscellaneous) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
