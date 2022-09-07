<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Type[]|\Cake\Collection\CollectionInterface $types
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
                    <i class="fa-solid fa-rectangle-list" style="padding-top: 11px; padding-right: 2px"></i>
                    Product Types
                    <?= $this->Html->link(__('New Product Type'), ['action' => 'add'], ['class' => 'btn btn-primary', 'style' => 'float: right']) ?>
                    <!--                        position: relative; left: 72%-->
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($types as $type): ?>
                            <tr>
                                <td><?= $this->Number->format($type->id) ?></td>
                                <td><?= h($type->name) ?></td>
                                <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Skus','action' => 'view', $type->id]) ?>
                                        <?= $this->Form->postLink(__('Unarchive'), ['action' => 'update', $type->id,1], ['confirm' => __('Are you sure you want to unarchive # {0}?', $type->id)]) ?>
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
