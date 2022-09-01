<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link" href="<?php echo $this->Url->build('/') ?>">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-line"></i></div>
                                Analytics
                            </a>

                            <div class="sb-sidenav-menu-heading">Inventory</div>


                            <a class="nav-link" href=<?php echo $this->Url->build(['controller'=>'Factories','action'=>'index']) ?>>
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-industry"></i></div>
                                Factories
                            </a>
                            <a class="nav-link" href=<?php echo $this->Url->build(['controller'=>'Types','action'=>'index']) ?>>
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-rectangle-list"></i></div>
                                Product Types
                            </a>
                            <a class="nav-link" href="<?php echo $this->Url->build(['controller'=>'Skus','action'=>'index']) ?>">
                                <div class="sb-nav-link-icon" style="padding-left:2px"><i class="fa-solid fa-bag-shopping"></i></div>
                                Products
                            </a>
                            <div class="sb-sidenav-menu-heading">Records</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon" style="padding-left:2.5px"><i class="fa-solid fa-receipt"></i></div>
                                Import Records
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo $this->Url->build(['controller'=>'Invoices','action'=>'select']) ?>">Add Imports</a>
                                    <a class="nav-link" href="<?php echo $this->Url->build(['controller'=>'Invoices','action'=>'index']) ?>">Manage Imports</a>
                                </nav>
                            </div>



                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Mccloud shoes admin
                    </div>

                </nav>
            </div>
