<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 * @var \Cake\Collection\CollectionInterface|string[] $addCosts
 */
?>

<body class="sb-nav-fixed">
<?php echo $this->element('navbar/navbar')?>
<div id="layoutSidenav">
    <?php echo $this->element('navbar/sidebar')?>
    <div id="layoutSidenav_content">
        <main>
            <br><br>
            <div class=" card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1" style="padding-top: 11px"></i>
                    Add Invoices
                    <?= $this->Html->link(__('List Invoices'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px']) ?>
                </div>
                <div class="card-body">
                    <div class="column-responsive column-80">
                        <div class="skus form content">
                            <?= $this->Form->create($invoice) ?>
                            <fieldset>
                                <legend><?= __('Add Invoices') ?></legend>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('number',['class'=>'form-control']);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('date',['class'=>'form-control']);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('currency_of_origin',['class'=>'form-control']);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('currency_rate',['class'=>'form-control']);
                                    ?>
                                </div>
                                <div class="form-label">
                                    <?php
                                    echo $this->Form->control('add_cost_id', ['class'=>'form-control', 'options' => $addCosts]);
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
