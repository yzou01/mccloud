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

        <div class="card mb-4">
    
            <div class="card-header  ">
                <i class="fas fa-table me-1"></i>
                <?= h($factory->name) ?>
            </div>
            <div class="d-flex justify-content-end" style="width: 98.5%"> <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary ']) ?></div>
            <h4><?= __('Related Skus') ?></h4>
            
            <div class="card-body">
                <?php if (!empty($factory->skus)) : ?>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('Id') ?></th>
                            <th><?= $this->Paginator->sort('Name') ?></th>
                            <th><?= $this->Paginator->sort('Price') ?></th>
                            <th><?= $this->Paginator->sort('Type Id') ?></th>
                            <th><?= $this->Paginator->sort('Factory Id') ?></th>
                                                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($factory->skus as $skus) : ?>
                        <tr>
                            <td><?= h($skus->id) ?></td>
                            <td><?= h($skus->name) ?></td>
                            <td><?= h($skus->price) ?></td>
                            <td><?= h($skus->type_id) ?></td>
                            <td><?= h($skus->factory_id) ?></td>
                            
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

