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
            <?= $this->Html->link(__('Edit Add Cost'), ['action' => 'edit', $addCost->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Add Cost'), ['action' => 'delete', $addCost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addCost->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Add Costs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Add Cost'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addCosts view content">
            <h3><?= h($addCost->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($addCost->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Duty') ?></th>
                    <td><?= $addCost->duty === null ? '' : $this->Number->format($addCost->duty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Freight Sea') ?></th>
                    <td><?= $addCost->freight_sea === null ? '' : $this->Number->format($addCost->freight_sea) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cartage') ?></th>
                    <td><?= $addCost->cartage === null ? '' : $this->Number->format($addCost->cartage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Insurance') ?></th>
                    <td><?= $addCost->insurance === null ? '' : $this->Number->format($addCost->insurance) ?></td>
                </tr>
                <tr>
                    <th><?= __('Licence') ?></th>
                    <td><?= $addCost->licence === null ? '' : $this->Number->format($addCost->licence) ?></td>
                </tr>
                <tr>
                    <th><?= __('Agency') ?></th>
                    <td><?= $addCost->agency === null ? '' : $this->Number->format($addCost->agency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customs') ?></th>
                    <td><?= $addCost->customs === null ? '' : $this->Number->format($addCost->customs) ?></td>
                </tr>
                <tr>
                    <th><?= __('TT Charge') ?></th>
                    <td><?= $addCost->TT_charge === null ? '' : $this->Number->format($addCost->TT_charge) ?></td>
                </tr>
                <tr>
                    <th><?= __('Miscellaneous') ?></th>
                    <td><?= $addCost->miscellaneous === null ? '' : $this->Number->format($addCost->miscellaneous) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Invoices') ?></h4>
                <?php if (!empty($addCost->invoices)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Number') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Currency Of Origin') ?></th>
                            <th><?= __('Currency Rate') ?></th>
                            <th><?= __('Add Cost Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($addCost->invoices as $invoices) : ?>
                        <tr>
                            <td><?= h($invoices->id) ?></td>
                            <td><?= h($invoices->number) ?></td>
                            <td><?= h($invoices->date) ?></td>
                            <td><?= h($invoices->currency_of_origin) ?></td>
                            <td><?= h($invoices->currency_rate) ?></td>
                            <td><?= h($invoices->add_cost_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoices->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoices->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoices->id)]) ?>
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
