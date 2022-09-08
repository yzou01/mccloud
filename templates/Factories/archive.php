<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factory[]|\Cake\Collection\CollectionInterface $factories
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
                        <i class="fa-solid fa-industry" style="padding-top: 11px; padding-right: 2px"></i>
                        Archived Factory Records
                        <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right;']) ?>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('name') ?></th>
                                <th><?= $this->Paginator->sort('currency') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($factories as $factory): ?>
                                <?php
                                $status=h($factory->archive);
                                if($status==true){ ?>
                                    <tr>
                                        <td><?= $this->Number->format($factory->id) ?></td>
                                        <td><?= h($factory->name) ?></td>
                                        <td><?= h($factory->currency) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $factory->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $factory->id]) ?>
                                            <?= $this->Form->postLink(__('Unarchive'), ['action' => 'update', $factory->id,1], ['confirm' => __('Are you sure you want to archive # {0}?', $factory->id)]) ?>
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

