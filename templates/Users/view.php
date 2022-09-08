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
                        <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right;']) ?>
                        <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px']) ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="column-responsive column-80">
                                <div class="users view content">
                                    <legend><?= h($user->id) ?></legend>
                                    <fieldset>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('Username',['label'=> 'Username', 'value'=> $user->username,'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('ID',['label'=> 'ID', 'value'=> $user->id,'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('Archived',['label'=> 'Archived', 'value'=> $user->archive,'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
