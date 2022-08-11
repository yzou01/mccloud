<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factory[]|\Cake\Collection\CollectionInterface $factories
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
                <i class="fas fa-table me-1" style="padding-top: 11px"></i>Factories
                <?= $this->Html->link(__('Add Factory'), ['action' => 'add'], ['class' => 'btn btn-primary', 'style' => 'float: right']) ?>
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
                <?php foreach ($factories as $factory): ?>
                <tr>
                    <td><?= $this->Number->format($factory->id) ?></td>
                    <td><?= h($factory->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $factory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $factory->id]) ?>
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

