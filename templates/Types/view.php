<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Type $type
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
                        <i class="fas fa-table me-1" style="padding-top: 11px"></i>
                        Product Types
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $type->id], ['confirm' => __('Are you sure you want to delete # {0}?', $type->id), 'class' => 'btn btn-danger', 'style' => 'float: right']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $type->id], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                        <?= $this->Html->link(__('List Types'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                        <?= $this->Html->link(__('New Type'), ['action' => 'add'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="column-responsive column-80">
                                <div class="types view content">
                                    <h3><?= h($type->name) ?></h3>
                                    <table>
                                        <tr>
                                            <th style="width: 100px"><?= __('Name') ?></th>
                                            <td><?= h($type->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('ID') ?></th>
                                            <td><?= $this->Number->format($type->id) ?></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="related">
                                        <h4><?= __('Related Skus') ?></h4>
                                        <?php if (!empty($type->skus)) : ?>
                                        <table id="datatablesSimple">
                                            <thead>
                                            <tr>
                                                <th><?= __('Id') ?></th>
                                                <th><?= __('Name') ?></th>
                                                <th><?= __('Price') ?></th>
                                                <th><?= __('Type Id') ?></th>
                                                <th><?= __('Factory Id') ?></th>
                                                <th class="actions"><?= __('Actions') ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($type->skus as $skus) : ?>
                                                <tr>
                                                    <td><?= h($skus->id) ?></td>
                                                    <td><?= h($skus->name) ?></td>
                                                    <td><?= h($skus->price) ?></td>
                                                    <td><?= h($skus->type_id) ?></td>
                                                    <td><?= h($skus->factory_id) ?></td>
                                                    <td class="actions">
                                                        <?= $this->Html->link(__('View'), ['controller' => 'Skus', 'action' => 'view', $skus->id]) ?>
                                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Skus', 'action' => 'edit', $skus->id]) ?>
                                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Skus', 'action' => 'delete', $skus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skus->id)]) ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>


