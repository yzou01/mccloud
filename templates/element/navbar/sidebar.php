<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link" href="<?php echo $this->Url->build('/') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Analytics
                            </a>
                            <div class="sb-sidenav-menu-heading">Products</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Bill of Records
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo $this->Url->build(['controller'=>'Invoices','action'=>'add']) ?>">Create Bill of Records</a>
                                    <a class="nav-link" href="<?php echo $this->Url->build(['controller'=>'Invoices','action'=>'index']) ?>">View and Manage BOR</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="<?php echo $this->Url->build(['controller'=>'Skus','action'=>'add']) ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Add New Product
                            </a>
                            <div class="sb-sidenav-menu-heading">Sources</div>
                            <a class="nav-link" href=<?php echo $this->Url->build(['controller'=>'Factories','action'=>'index']) ?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Factories
                            </a>
                            <a class="nav-link" href=<?php echo $this->Url->build(['controller'=>'Types','action'=>'index']) ?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Type of Products
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Mccloud shoes admin
                    </div>
                </nav>
            </div>
