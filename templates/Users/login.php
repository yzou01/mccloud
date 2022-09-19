<!DOCTYPE html>
<html lang="en">
    <div class="body" style= background-image: href="/team39-app_fit3048/Assets/Login_Banner.jpeg">
    <body class="bg-primary" >
        <div id="layoutAuthentication" >
            <div id="layoutAuthentication_content" >
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5" style="padding-top: 100px">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <?= $this->Form->create() ?>
                                        <fieldset>
                                            <div class="form-label">
                                                <?php
                                                echo $this->Form->control('username',['class'=>'form-control', 'required' => true]);
                                                ?>
                                            </div>
                                            <div class="form-label">
                                                <?php
                                                echo $this->Form->control('password', ['class'=>'form-control', 'required' => true]);
                                                ?>
                                            </div>
                                            <div class="form-label" style="margin-top: 20px; margin-left: 2px">
                                                <?= $this->Html->link(__('Forgot Password?'), ['action' => 'password']) ?>
                                            </div>
                                        </fieldset>
                                        <?= $this->Flash->render() ?>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <?= $this->Form->submit(__('Login'), ['class'=>'btn btn-primary', 'style' => 'width: 100%']); ?>
                                        <?= $this->Form->end() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
    </div>
</html>
