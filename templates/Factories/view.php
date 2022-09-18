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
                <div class=" card mb-4" style="margin-top: 50px">
                    <div class="card-header">
                        <i class="fa-solid fa-industry" style="padding-top: 11px; padding-right: 2px"></i>
                        <?= h($factory->name) ?>

                        <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right;']) ?>
                        <?= $this->Html->link(__('Edit Factory'), ['action' => 'edit',$factory->id], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                        <?= $this->Html->link(__('Add Product'), ['controller'=>'Skus','action' => 'add',$factory->id], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                    </div>
                    <div class="card-body">
                        <legend><?= __('Related Product') ?></legend>
                        <?php if (!empty($factory->skus)) : ?>
                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('Name') ?></th>
                                    <th><?= $this->Paginator->sort('Price') ?></th>
                                    <th><?= $this->Paginator->sort('Type ID') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($factory->skus as $skus) : ?>
                                <tr>
                                    <td><?= h($skus->name) ?></td>
                                    <td><?= h($skus->price) ?></td>
                                   <td><?= h($skus->type_id) ?></td>
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

