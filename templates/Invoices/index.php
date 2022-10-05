<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice[]|\Cake\Collection\CollectionInterface $invoices
 *
 */

?>

<body class="sb-nav-fixed">
    <?php echo $this->element('navbar/navbar') ?>
    <div id="layoutSidenav">
        <?php echo $this->element('navbar/sidebar') ?>
        <div id="layoutSidenav_content">
            <main>
                <div class=" card mb-4" style="margin-top: 50px">
                    <div class="card-header  ">
                        <i class="fa-solid fa-receipt" style="padding-top: 11px; padding-right: 2px" ></i>
                        Import Records
                        <?= $this->Html->link(__('View Archived Imports'), ['action' => 'archive'], ['class' => 'btn btn-primary', 'style' => 'float: right;']) ?>
                        <?= $this->Html->link(__('Add Imports'), ['action' => 'select'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('number') ?></th>
                                <th><?= $this->Paginator->sort('date') ?></th>
                                <th><?= $this->Paginator->sort('factory_id') ?></th>
                                <th><?= $this->Paginator->sort('currency') ?></th>
                                <th><?= $this->Paginator->sort('currency_rate','Exchange Rate') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($invoices as $invoice): ?>
                                <?php
                                        $status=h($invoice->archive);

                                        if($status==false){ ?>
                                <tr>
                                    <td><?= h($invoice->number) ?></td>
                                    <td><?= $this->Time->format($invoice->date, "dd/MM/YYY") ?></td>
                                    <td><?= h($invoice->factory->name) ?></td>
                                    <td><?= h($invoice->currency_of_origin) ?></td>
                                    <td><?= $this->Number->format($invoice->currency_rate) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $invoice->id]) ?>
                                        <?=  $this->Html->link(__('Edit'), ['action' => 'edit', $invoice->id]) ?>
                                       <?= $this->Form->postLink(__('Archive'), ['action' => 'update', $invoice->id,0], ['confirm' => __('Are you sure you want to archive # {0}?', $invoice->id)]) ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $this->Flash->render()?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>


