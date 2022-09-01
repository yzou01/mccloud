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
                <div class=" card mb-4" style="margin-top: 50px">
                    <div class="card-header">
                        <i class="fa-solid fa-bag-shopping" style="padding-top: 11px; padding-right: 2px"></i>
                        Archive Products
                        <?= $this->Html->link(__('View all products'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right']) ?>

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
                            <?php foreach ($skus as $sku): ?>
                                <?php
                                        $status=h($sku->archive);

                                        if($status==true){ ?>

                                       
                                
                                <tr>
                                    <td><?= $this->Number->format($sku->id) ?></td>
                                    <td><?= h($sku->name) ?></td>
                                    <td><?= $this->Number->format($sku->price) ?></td>
                                    <td><?=   $sku->factory->name      ?></td>

                                    <td><?=        $sku->type->name    ?></td>

                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Skus','action' => 'view', $sku->id]) ?>
                                        <?= $this->Form->postLink(__('Unarchive'), ['action' => 'update', $sku->id,1], ['confirm' => __('Are you sure you want to unarchive # {0}?', $sku->id)]) ?>
                                   
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
