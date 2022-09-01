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
                <div class=" card mb-4" style="margin-top: 50px">
                    <div class="card-header">
                        <i class="fa-solid fa-industry" style="padding-top: 11px; padding-right: 2px"></i>
                        Factories
                        <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right']) ?>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    
                                    <th><?= $this->Paginator->sort('name') ?></th>
                                    <th><?= $this->Paginator->sort('currency_of_origin') ?></th>
                                    <th class="actions"><?= __('Add invoice') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($factories as $factory): ?>
                                <tr>
                                    
                                    <td><?= h($factory->name) ?></td>
                                    <td><?= h($factory->currency) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Add invoice'), ['action' => 'add', $factory->id]) ?>
                                        
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





