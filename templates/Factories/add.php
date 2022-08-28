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
                <div class=" card mb-4" style="margin-top: 50px">
                    <div class="card-header">
                        <i class="fa-solid fa-industry" style="padding-top: 11px; padding-right: 2px"></i>
                        Factories
                        <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right']) ?>
                    </div>
                    <div class="card-body">
                        <div class="column-responsive column-80">
                            <div class="factories form content">
                                <?= $this->Form->create($factory) ?>
                                <fieldset>
                                    <legend><?= __('Add Factory') ?></legend>
                                    <div class="form-label">
                                        <?php
                                           echo $this->Form->control('name',['class'=>'form-control']);
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <?php
                                        echo $this->Form->control("currency",['class'=>'form-select', 'options'=>[
                                            'Euro'=>'EUR - Euro',
                                            'Pound Sterling'=>'GBP - Pound Sterling',
                                            'Japanese Yen'=>'JPY - Japanese Yen',
                                            'Chinese Yuan'=>'CNY - Chinese Yuan',
                                            'South African Rand'=>'ZAR - South African Rand',
                                            'US Dollar'=>'USD - United States Dollar',
                                            'NZ Dollar'=>'NZD -  New Zealand Dollar',
                                            'Australian Dollar'=>'AUD - Australian Dollar',
                                            ]
                                        ]);
                                        ?>
                                    </div>
                                </fieldset>
                                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
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


