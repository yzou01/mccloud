<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
                        <i class="fa-solid fa-users" style="padding-top: 11px; padding-right: 2px"></i>
                        Users
                        <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px']) ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="column-responsive column-80">
                                <div class="users form content">
                                    <?= $this->Form->create($user) ?>
                                    <fieldset>
                                        <legend><?= __('Edit User') ?></legend>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('username',['class'=>'form-control']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('password',['class'=>'form-control']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('confirm_password',['class'=>'form-control','type'=>'password']);
                                            ?>
                                        </div>
                                    </fieldset>
                                    <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-primary']) ?>
                                    <?= $this->Form->end() ?>
                                    <?= $this->Flash->render() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
