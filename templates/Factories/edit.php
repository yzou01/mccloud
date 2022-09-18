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
                        <?= $this->Form->button ('Back', ['onclick' =>'history.back ()', 'type' =>'button', 'class' => 'btn btn-primary', 'style' => 'float: right'])?>
                    </div>
                    <div class="card-body">
                        <div class="column-responsive column-80">
                            <div class="factories form content">
                                <?= $this->Form->create($factory) ?>
                                <fieldset>
                                    <legend><?= __('Edit Factory') ?></legend>
                                    <div class="form-label">
                                        <?php
                                            echo $this->Form->control('name',['class'=>'form-control']);
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <?php
                                        echo $this->Form->control("currency",['class'=>'form-select', 'options'=>[
                                            'EUR'=>'EUR - Euro',
                                            'GBP'=>'GBP - Pound Sterling',
                                            'JPY'=>'JPY - Japanese Yen',
                                            'CNY'=>'CNY - Chinese Yuan',
                                            'ZAR'=>'ZAR - South African Rand',
                                            'USD'=>'USD - United States Dollar',
                                            'NZD'=>'NZD -  New Zealand Dollar',
                                            'AUD'=>'AUD - Australian Dollar',
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




