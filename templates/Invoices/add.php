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
            <div class=" card mb-4">
                <div class="card-header  ">
                    <i class="fas fa-table me-1"></i>
                    <?= $this->Html->link(__('Invoices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                </div>
                <div class="card-body">

                    <div class="column-responsive column-80">
                        <div class="factories form content">
                            <?= $this->Form->create($invoice) ?>
                            <fieldset>
                                <legend><?= __('Add Invoice') ?></legend>
                                <?php
                                echo $this->Form->control('number');
                                echo $this->Form->control('date');
                                echo $this->Form->control('currency_of_origin');
                                echo $this->Form->control('currency_rate');
                                echo $this->Form->control('add_cost_id', ['options' => $addCosts]);
                                ?>
                            </fieldset>

                            <?= $this->Form->button(__('Submit')) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
</div>

