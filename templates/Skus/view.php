<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skus $skus
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
                        SKUs
                        <?= $this->Form->postLink(__('Delete SKUs'), ['action' => 'delete', $skus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skus->id), 'class' => 'btn btn-danger', 'style' => 'float: right']) ?>
                        <?= $this->Html->link(__('Edit SKUs'), ['action' => 'edit', $skus->id], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                        <?= $this->Html->link(__('List SKUs'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                        <?= $this->Html->link(__('New SKUs'), ['action' => 'add'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="column-responsive column-80">
                                <div class="skus view content">
                                    <h3><?= h($skus->name) ?></h3>
                                    <table>
                                        <tr>
                                            <th style="width: 100px"><?= __('Name') ?></th>
                                            <td><?= h($skus->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Type') ?></th>
                                            <td><?= $skus->has('type') ? $this->Html->link($skus->type->name, ['controller' => 'Types', 'action' => 'view', $skus->type->id]) : '' ?></td>
                                        </tr>

                                        <tr>
                                            <th><?= __('ID') ?></th>
                                            <td><?= $this->Number->format($skus->id) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Price') ?></th>
                                            <td><?= $this->Number->format($skus->price) ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

