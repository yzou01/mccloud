<!DOCTYPE html>
<html lang="en">
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5" style="padding-top: 100px">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
                            <div class="card-body">
                                Please refer to Technical Documentation, 'Reset Password' for guidelines on how to regain access to the system.
                            </div>
                            <div class="card-footer text-center py-3">
                                <?= $this->Html->link(__('Back to Login'), ['action' => 'login'], ['class' => 'btn btn-primary', 'style' => 'width: 100%']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>
