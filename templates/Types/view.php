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
                <div class=" card mb-4" style="margin-top: 50px">
                    <div class="card-header">
                        <i class="fa-solid fa-rectangle-list" style="padding-top: 11px; padding-right: 2px"></i>
                        Product Types
                        <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right;']) ?>
                        <?= $this->Html->link(__('Edit Product Type'), ['action' => 'edit', $type->id], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="column-responsive column-80">
                                <div class="types view content">
                                    <legend><?= h($type->name) ?></legend>
                                    <fieldset>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('ID',['label'=> 'ID', 'value'=> $this->Number->format($type->id),'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                    </fieldset>
                                    <div class="related" style="margin-top: 15px">
                                        <h4><?= __('Related Products') ?></h4>
                                        <?php if (!empty($type->skus)) : ?>
                                        <table id="datatablesSimple">
                                            <thead>
                                            <tr>
                                                <th><?= __('Id') ?></th>
                                                <th><?= __('Name') ?></th>
                                                <th><?= __('Price') ?></th>

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

                                                    <td><?= h($skus->factory_id) ?></td>
                                                    <td class="actions">
                                                        <?= $this->Html->link(__('View'), ['controller' => 'Skus', 'action' => 'view', $skus->id]) ?>
                                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Skus', 'action' => 'edit', $skus->id]) ?>
<!--                                                        <= $this->Form->postLink(__('Delete'), ['controller' => 'Skus', 'action' => 'delete', $skus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skus->id)]) ?>-->
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


