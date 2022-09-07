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
                    <?= $this->Html->link(__('Edit Factory'), ['action' => 'edit',$factory->id], ['class' => 'btn btn-primary', 'style' => 'float: right;margin-right: 5px;']) ?>
                    <?= $this->Html->link(__('List Factories'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right;margin-right: 5px;']) ?>
                    <?= $this->Form->postLink(__('Unarchive'), ['action' => 'update', $factory->id,1], ['confirm' => __('Are you sure you want to unarchive # {0}?', $factory->id)]) ?>
                    <?= $this->Html->link(__('Add Factory'), ['action' => 'add'], ['class' => 'btn btn-primary', 'style' => 'float: right;margin-right: 5px;']) ?>
                </div>
                <div class="card-body">
                    <legend><?= __('Related Product') ?></legend>
                    <?php if (!empty($factory->skus)) : ?>
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('Id') ?></th>
                                <th><?= $this->Paginator->sort('Name') ?></th>
                                <th><?= $this->Paginator->sort('Price') ?></th>
                                <th><?= $this->Paginator->sort('Type ID') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($factory->skus as $skus) : ?>
                                <tr>
                                    <td><?= h($skus->id) ?></td>
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

