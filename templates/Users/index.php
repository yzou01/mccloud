<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
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
                        <?= $this->Html->link(__('View Archived Users'), ['action' => 'archive'], ['class' => 'btn btn-primary', 'style' => 'float: right']) ?>
                        <?= $this->Html->link(__('Add User'), ['action' => 'add'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px']) ?>
                    </div>
                    <div class="card-body">
                        <div class="users index content">
                            <h3><?= __('Users') ?></h3>
                            <div class="table-responsive">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th><?= $this->Paginator->sort('id') ?></th>
                                            <th><?= $this->Paginator->sort('username') ?></th>
                                            <th class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                        <?php
                                        $status=h($user->archive);

                                        if($status==false){ ?>
                                        <tr>
                                            <td><?= $this->Number->format($user->id) ?></td>
                                            <td><?= h($user->username) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                                <?= $this->Form->postLink(__('Archive'), ['action' => 'update', $user->id,0], ['confirm' => __('Are you sure you want to archive # {0}?', $user->id)]) ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
