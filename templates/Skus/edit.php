<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skus $skus
 * @var string[]|\Cake\Collection\CollectionInterface $types
 * @var string[]|\Cake\Collection\CollectionInterface $factories
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
                        Products
<!--                        <= $this->Form->postLink(-->
<!--                            __('Delete'),-->
<!--                            ['action' => 'delete', $skus->id],-->
<!--                            ['confirm' => __('Are you sure you want to delete # {0}?', $skus->id), 'class' => 'btn btn-danger', 'style' => 'float: right;']-->
<!--                        ) ?>-->
                        <?= $this->Html->link(__('List Products'), ['action' => 'index'],  ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px']) ?>
                    </div>
                    <div class="card-body">
                        <div class="column-responsive column-80">
                            <div class="types form content">
                                <?= $this->Form->create($skus) ?>
                                <fieldset>
                                    <legend><?= __('Edit Products') ?></legend>
                                    <div class="form-label">
                                        <?php
                                            echo $this->Form->control('name',['class'=>'form-control']);
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <?php
                                            echo $this->Form->control('price',['class'=>'form-control']);
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <?php
                                            echo $this->Form->control('factory_id',['options' => $factories,'class'=>'form-control']);
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <?php
                                            echo $this->Form->control('type_id', ['options' => $types, 'class'=> 'form-control']);
                                        ?>
                                    </div>
                                </fieldset>
                                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                                <?= $this->Form->end()?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
