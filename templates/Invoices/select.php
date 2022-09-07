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
                        <i class="fa-solid fa-receipt" style="padding-top: 11px; padding-right: 2px" ></i>
                        Import Records
                        <?= $this->Html->link(__('List Imports'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right']) ?>
                    </div>
                    <div class="card-body">
                        <?= $this->Form->create($factory) ?>
                        <div class="form-label">
                            <?php
                                echo $this->Form->control('id', ['class'=>'form-select', 'options' => $factories,'label'=>'Factory Name']);
                            ?>
                        </div>
                        <?= $this->Form->button(__('Next'), ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->end() ?>
                        <?= $this->Flash->render()?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>





