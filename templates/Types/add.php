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
                    </div>
                    <div class="card-body">
                        <div class="column-responsive column-80">
                            <div class="types form content">
                                <?= $this->Form->create($type) ?>
                                <fieldset>
                                    <legend><?= __('Add Type') ?></legend>
                                    <div class="form-label">
                                        <?php
                                        echo $this->Form->control('name',['class'=>'form-control']);
                                        ?>
                                    </div>
                                </fieldset>
                                <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-primary']) ?>
                                <?= $this->Form->end() ?>
                                <?= $this->Flash->render()?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>











