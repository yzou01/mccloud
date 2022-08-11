<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factory $factory
 */
?>

<body class="sb-nav-fixed">
    <?php echo $this->element('navbar/navbar')?>
    <div id="layoutSidenav">
        <?php echo $this->element('navbar/sidebar')?>
        <div id="layoutSidenav_content">
            <main>
                <br><br>
                <div class=" card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1" style="padding-top: 11px"></i><?= h($factory->name) ?>
                        <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right']) ?>
                    </div>
                    <div class="card-body">
                        <h4><?= __('Related Skus') ?></h4>
                        <?php if (!empty($factory->invoices)) : ?>
                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('Id') ?></th>
                                    <th><?= $this->Paginator->sort('Number') ?></th>
                                    <th><?= $this->Paginator->sort('Date') ?></th>
                                    <th><?= $this->Paginator->sort('Currency Rate') ?></th>
                                    <th><?= $this->Paginator->sort('Add Cost Id') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($factory->invoices as $invoices) : ?>
                                <tr>
                                    <td><?= h($invoices->id) ?></td>
                                    <td><?= h($invoices->number) ?></td>
                                    <td><?= h($invoices->date) ?></td>
                                    <td><?= h($invoices->currency_rate) ?></td>
                                    <td><?= h($invoices->add_cost_id) ?></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

