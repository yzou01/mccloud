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
                <br><br>
                <div class=" card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Product Types
                    </div>
                    <div class="card-body">
                        <aside class="column">
                            <div class="side-nav">
                                <h4 class="heading"><?= __('Actions') ?></h4>
                                <?= $this->Html->link(__('List Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                            </div>
                        </aside>
                        <div class="column-responsive column-80">
                            <div class="types form content">
                                <?= $this->Form->create($type) ?>
                                <fieldset>
                                    <legend><?= __('Add Type') ?></legend>
                                    <?php
                                    echo $this->Form->control('name');
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
</body>











