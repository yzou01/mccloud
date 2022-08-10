<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factory[]|\Cake\Collection\CollectionInterface $factories
 */
?>
<main>
<div class="container-fluid px-4">
<div class=" card mb-4">
    
    <div class="card-header  ">
       
        <i class="fas fa-table me-1"></i>
                            Factories
                        </div>
                        <div class="d-flex justify-content-end" style="width: 98.5%"> <?= $this->Html->link(__('Add Factory'), ['action' => 'add'], ['class' => 'btn btn-primary ']) ?>


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
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $factory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $factory->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
                </main>
   
</div>
                </div>
               