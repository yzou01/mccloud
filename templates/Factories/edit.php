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
        <div class=" card mb-4">  
            <div class="card-header  ">    
                <i class="fas fa-table me-1"></i>  
                <?= $this->Html->link(__('Factories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                
            </div>
            <div class="card-body">
            <div class="column-responsive column-80">
        <div class="factories form content">
            <?= $this->Form->create($factory) ?>
            <fieldset>
                <legend><?= __('Edit Factory') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $factory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $factory->id), 'class' => 'btn btn-primary']
            ) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
            </div>
        </div>
        </main>
</div>
</div>





