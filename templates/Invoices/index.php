<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice[]|\Cake\Collection\CollectionInterface $invoices
 */
?>

<body class="sb-nav-fixed">
    <?php echo $this->element('navbar/navbar') ?>
    <div id="layoutSidenav">
        <?php echo $this->element('navbar/sidebar') ?>
        <div id="layoutSidenav_content">
            <main>
                <br><br>
                <div class=" card mb-4">

                    <div class="card-header  ">
                        <i class="fas fa-table me-1"></i>
                        Bill Of Records
                        <?= $this->Html->link(__('New Bill Of Records'), ['action' => 'add'], ['class' => 'btn btn-primary', 'style' => 'float: right;']) ?>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('number') ?></th>
                                <th><?= $this->Paginator->sort('date') ?></th>
                                <th><?= $this->Paginator->sort('factory_id') ?></th>
                                <th><?= $this->Paginator->sort('currency_of_origin') ?></th>
                                <th><?= $this->Paginator->sort('currency_rate') ?></th>
                                <th><?= $this->Paginator->sort('add_cost_id') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($invoices as $invoice): ?>
                                <tr>
                                    <td><?= $this->Number->format($invoice->id) ?></td>
                                    <td><?= h($invoice->number) ?></td>
                                    <td><?= h($invoice->date) ?></td>
                                    <td><?= h($invoice->currency_of_origin) ?></td>
                                    <td><?= $this->Number->format($invoice->currency_rate) ?></td>
                                    <td><?= $invoice->has('add_cost') ? $this->Html->link($invoice->add_cost->id, ['controller' => 'Addcosts', 'action' => 'view', $invoice->add_cost->id]) : '' ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $invoice->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoice->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>


