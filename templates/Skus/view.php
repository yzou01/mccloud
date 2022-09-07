<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skus $skus
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
<!--                        <= $this->Form->postLink(__('Delete SKUs'), ['action' => 'delete', $skus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skus->id), 'class' => 'btn btn-danger', 'style' => 'float: right']) ?>-->
                        <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $skus->id], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                        <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                        <?= $this->Html->link(__('Add Product'), ['action' => 'select'], ['class' => 'btn btn-primary', 'style' => 'float: right; margin-right: 5px;']) ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="column-responsive column-80">
                                <div class="skus view content">
                                    <legend><?= h($skus->name) ?></legend>
                                    <fieldset>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('ID',['label'=> 'ID', 'value'=> $this->Number->format($skus->id),'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('Factory',['label'=> 'Factory', 'value'=> $skus->factory->name,'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('Type',['label'=> 'Type', 'value'=> $skus->type->name,'class'=>'form-control', 'disabled' => 'true']);
                                            ?>
                                        </div>
                                        <div class="form-label">
                                            <?php
                                            echo $this->Form->control('Price',['label'=> 'Price', 'value'=> $this->Number->format($skus->price),'class'=>'form-control', 'disabled' => 'true']);
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

