<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skus $skus
 * @var \Cake\Collection\CollectionInterface|string[] $types
 * @var \Cake\Collection\CollectionInterface|string[] $factories
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
                        SKUs
                        <?= $this->Html->link(__('List Skus'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px']) ?>
                    </div>
                    <div class="card-body">
                        <div class="column-responsive column-80">
                            <div class="skus form content">
                                <?= $this->Form->create($skus) ?>
                                <fieldset>
                                    <legend><?= __('Add Skus') ?></legend>
                                    <div class="form-label">
                                        <?php
                                            echo $this->Form->control('name',['class'=>'form-control']);
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <?php
                                            echo $this->Form->control('price',['class'=>'form-control', 'min'=>0]);
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <?php
                                            echo $this->Form->control('factory_id', ['class'=>'form-control', 'options' => $factories]);
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <?php
                                            echo $this->Form->control('type_id', ['class'=>'form-control', 'options' => $types]);
                                        ?>
                                    </div>
                                </fieldset>
                                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

