<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skus[]|\Cake\Collection\CollectionInterface $skus
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
                        <i class="fas fa-table me-1" style="padding-top: 11px"></i>SKUs
                        <?= $this->Html->link(__('New Skus'), ['action' => 'add'], ['class' => 'btn btn-primary', 'style' => 'float: right']) ?>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('name') ?></th>
                                <th><?= $this->Paginator->sort('price') ?></th>
                                <th><?= $this->Paginator->sort('factory') ?></th>
                                <th><?= $this->Paginator->sort('type') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($skus as $skus): ?>
                                <tr>
                                    <td><?= $this->Number->format($skus->id) ?></td>
                                    <td><?= h($skus->name) ?></td>
                                    <td><?= $this->Number->format($skus->price) ?></td>
                                    <td><?= $skus->has('factory') ? $this->Html->link($skus->factory->name, ['controller' => 'factory', 'action' => 'view', $skus->factory->name]) : '' ?></td>

                                    <td><?= $skus->has('type') ? $this->Html->link($skus->type->name, ['controller' => 'Types', 'action' => 'view', $skus->type->name]) : '' ?></td>

                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $skus->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $skus->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $skus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skus->id)]) ?>
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
