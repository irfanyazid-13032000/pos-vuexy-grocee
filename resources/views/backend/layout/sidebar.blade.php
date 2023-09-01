<ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item {{ Route::is('dashboard.*') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>Dashboards</div>
                <div class="badge bg-primary rounded-pill ms-auto">3</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{ Route::is('dashboard.*') ? 'active' : '' }}">
                  <a href="{{route('dashboard')}}" class="menu-link">
                    <div>Analytics</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="dashboards-crm.html" class="menu-link">
                    <div>CRM</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="dashboards-ecommerce.html" class="menu-link">
                    <div>eCommerce</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- product -->
            <li class="menu-item {{ Route::is('category.*') || Route::is('product.*')  || Route::is('item.*') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Product</div>
              </a>

              <ul class="menu-sub">

              <!-- <li class="menu-item {{ Route::is('warehouse.*') ? 'active' : '' }} ">
                  <a href="{{route('warehouse.index')}}" class="menu-link">
                    <div>Warehouse</div>
                  </a>
                </li> -->

                <li class="menu-item {{ Route::is('category.*') ? 'active' : '' }}">
                  <a href="{{route('category.index')}}" class="menu-link">
                    <div>Category</div>
                  </a>
                </li>
                <li class="menu-item {{ Route::is('product.*') ? 'active' : '' }}">
                  <a href="{{route('product.index')}}" class="menu-link">
                    <div>Product List</div>
                  </a>
                <li class="menu-item {{ Route::is('item.*') ? 'active' : '' }}">
                  <a href="{{route('item.index')}}" class="menu-link">
                    <div>Item</div>
                  </a>
                </li>
                
               
                
              </ul>
            </li>

            <li class="menu-item {{  Route::is('warehouse.*') || Route::is('satuan.*') || Route::is('kategori.bahan.*') || Route::is('bahan.dasar.*') || Route::is('bahan.tambahan.produksi.*')  || Route::is('vendor.*') || Route::is('outlet.*') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Data Master</div>
              </a>

              <ul class="menu-sub">

              <li class="menu-item {{ Route::is('vendor.*') ? 'active' : '' }}">
                  <a href="{{route('vendor.index')}}" class="menu-link">
                    <div>Vendor</div>
                  </a>
                </li>

              <li class="menu-item {{ Route::is('warehouse.*') ? 'active' : '' }} ">
                  <a href="{{route('warehouse.index')}}" class="menu-link">
                    <div>Warehouse</div>
                  </a>
                </li>

                  <li class="menu-item {{ Route::is('outlet.*') ? 'active' : '' }}">
                  <a href="{{route('outlet.index')}}" class="menu-link">
                    <div>Outlet</div>
                  </a>
                </li>

                <li class="menu-item {{ Route::is('satuan.*') ? 'active' : '' }}">
                  <a href="{{route('satuan.index')}}" class="menu-link">
                    <div>Satuan</div>
                  </a>
                </li>

                <li class="menu-item {{ Route::is('kategori.bahan.*') ? 'active' : '' }}">
                  <a href="{{route('kategori.bahan.index')}}" class="menu-link">
                    <div>Data Kategori Bahan</div>
                  </a>
                </li>


                <li class="menu-item {{ Route::is('bahan.dasar.*') ? 'active' : '' }}">
                  <a href="{{route('bahan.dasar.index')}}" class="menu-link">
                    <div>Data Bahan Produksi</div>
                  </a>
                </li>

                <li class="menu-item {{ Route::is('bahan.tambahan.produksi.*') ? 'active' : '' }}">
                  <a href="{{route('bahan.tambahan.produksi.index')}}" class="menu-link">
                    <div>Pemakaian Bahan Tambahan Produksi</div>
                  </a>
                </li>
              
                  
                
              </ul>
            </li>


             <!-- inventory -->
             <!-- <li class="menu-item {{ Route::is('raw.*') || Route::is('bahan.baku.*') ? 'active open' : '' }}"> -->
              <!-- <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>inventory</div>
              </a> -->

              <!-- <ul class="menu-sub"> -->
                <!-- <li class="menu-item {{ Route::is('raw.*') ? 'active' : '' }}">
                  <a href="{{route('raw.index')}}" class="menu-link">
                    <div>Raw</div>
                  </a>
                </li> -->


                <!-- <li class="menu-item {{ Route::is('bahan.baku.*') ? 'active' : '' }}">
                  <a href="{{route('bahan.baku.index')}}" class="menu-link">
                    <div>Material</div>
                  </a>
                </li> -->


                <!-- </ul> -->

            <!-- </li> -->

             <!-- Cook -->
             <!-- <li class="menu-item {/{ Route::is('cook.*') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Cook</div>
              </a>

              <ul class="menu-sub">


                <li class="menu-item {{ Route::is('cook.record.*') ? 'active' : '' }}">
                  <a href="{{route('cook.record')}}" class="menu-link">
                    <div>all cook record</div>
                  </a>
                </li>

                <li class="menu-item {{ Route::is('bahan.baku.*') ? 'active' : '' }}">
                  <a href="{{route('cook.process')}}" class="menu-link">
                    <div>cook process</div>
                  </a>
                </li>


                </ul>

            </li> -->


             <!-- Outlet -->
             <!-- <li class="menu-item {{ Route::is('outlet.*') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Outlet</div>
              </a>

              <ul class="menu-sub">


                <li class="menu-item {{ Route::is('outlet.*') ? 'active' : '' }}">
                  <a href="{{route('outlet.index')}}" class="menu-link">
                    <div>Data Outlet</div>
                  </a>
                </li>

                </ul>

            </li> -->


             <!-- Vendor -->
             <!-- <li class="menu-item {{ Route::is('vendor.*') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Vendor</div>
              </a>

              <ul class="menu-sub">


                <li class="menu-item {{ Route::is('vendor.*') ? 'active' : '' }}">
                  <a href="{{route('vendor.index')}}" class="menu-link">
                    <div>Data Vendor</div>
                  </a>
                </li>

                </ul>

            </li> -->

            <!-- purchase -->
            <li class="menu-item {{ Route::is('purchase.*') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Purchase</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item {{ Route::is('purchase.*') ? 'active' : '' }}">
                  <a href="{{route('purchase.index')}}" class="menu-link">
                    <div>Purchase List</div>
                  </a>
                </li>
                
              </ul>
            </li>


            <!-- Food -->
            <li class="menu-item {{ Route::is('food.*') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Food</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item {{ Route::is('food.*') ? 'active' : '' }}">
                  <a href="{{route('food.index')}}" class="menu-link">
                    <div>Food Process</div>
                  </a>
                </li>


                <li class="menu-item">
                  <a href="{{route('food.process.daily')}}" class="menu-link">
                    <div>Food Process Daily</div>
                  </a>
                </li>
                
              </ul>
            </li>


            <!--Bahan -->
            <li class="menu-item {{ Route::is('kategori.bahan.*') || Route::is('bahan.dasar.*') || Route::is('satuan.*') || Route::is('bahan.tambahan.produksi.*') || Route::is('record.bahan.*')? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Bahan</div>
              </a>

              <ul class="menu-sub">
                <!-- <li class="menu-item {{ Route::is('kategori.bahan.*') ? 'active' : '' }}">
                  <a href="{{route('kategori.bahan.index')}}" class="menu-link">
                    <div>Data Kategori Bahan</div>
                  </a>
                </li> -->

               

                <!-- <li class="menu-item {{ Route::is('bahan.dasar.*') ? 'active' : '' }}">
                  <a href="{{route('bahan.dasar.index')}}" class="menu-link">
                    <div>Data Bahan Produksi</div>
                  </a>
                </li> -->


                <!-- <li class="menu-item {{ Route::is('satuan.*') ? 'active' : '' }}">
                  <a href="{{route('satuan.index')}}" class="menu-link">
                    <div>satuan</div>
                  </a>
                </li> -->


                <li class="menu-item {{ Route::is('record.bahan.*') ? 'active' : '' }}">
                  <a href="{{route('record.bahan.index')}}" class="menu-link">
                    <div>record bahan</div>
                  </a>
                </li>


                <!-- <li class="menu-item {{ Route::is('bahan.tambahan.produksi.*') ? 'active' : '' }}">
                  <a href="{{route('bahan.tambahan.produksi.index')}}" class="menu-link">
                    <div>Pemakaian Bahan Tambahan Produksi</div>
                  </a>
                </li> -->
                
              </ul>
            </li>


              <!-- Produksi -->
              <li class="menu-item {{ Route::is('kategori.proses.produksi.*') || Route::is('proses.produksi.*') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Produksi</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item {{ Route::is('kategori.proses.produksi.*') ? 'active' : '' }}">
                  <a href="{{route('kategori.proses.produksi.index')}}" class="menu-link">
                    <div>Kategori Proses Produksi</div>
                  </a>
                </li>


                <li class="menu-item">
                  <a href="{{route('proses.produksi.index')}}" class="menu-link">
                    <div>Proses Produksi</div>
                  </a>
                </li>
                
              </ul>
            </li>

            <!-- sale -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Sale</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-collapsed-menu.html" class="menu-link">
                    <div>Sale List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('pos.index')}}" class="menu-link">
                    <div>POS</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                    <div>Add Sale</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                    <div>Import Sale By CSV</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                    <div>Gift Card List</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                    <div>Coupon List</div>
                  </a>
                </li>


                <li class="menu-item">
                  <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                    <div>Delivery List</div>
                  </a>
                </li>
                
                
              </ul>
            </li> -->


            <!-- expense -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Expense</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-collapsed-menu.html" class="menu-link">
                    <div>Expense Category</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Expense List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                    <div>Add Expense</div>
                  </a>
                </li>

              </ul>
            </li> -->

            <!-- quotation -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Quotation</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-collapsed-menu.html" class="menu-link">
                    <div>Quotation List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Add Quotation</div>
                  </a>
                </li>

              </ul>
            </li> -->

            <!-- transfer -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Transfer</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-collapsed-menu.html" class="menu-link">
                    <div>Transfer List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Add Transfer</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Impoer Transfer By CSV</div>
                  </a>
                </li>

              </ul>
            </li> -->

            <!-- return -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Return</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-collapsed-menu.html" class="menu-link">
                    <div>Sale</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Purchase</div>
                  </a>
                </li>

              </ul>
            </li> -->

            <!-- accounting -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Accounting</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-collapsed-menu.html" class="menu-link">
                    <div>Account List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Add Account</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Money Transfer</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Balance Sheet</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Account Statement</div>
                  </a>
                </li>

              </ul>
            </li> -->

            <!-- HRM -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>HRM</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-collapsed-menu.html" class="menu-link">
                    <div>Departement</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Employee</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Attendance</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Payroll</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Holiday</div>
                  </a>
                </li>

              </ul>
            </li> -->

            <!-- people -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>People</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-collapsed-menu.html" class="menu-link">
                    <div>User List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Add User</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Customer List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Add Customer</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Biller List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Supplier List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Add Supplier</div>
                  </a>
                </li>

              </ul>
            </li> -->


            <!-- reports -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Reports</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-collapsed-menu.html" class="menu-link">
                    <div>Summary Reports</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Best Seller</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Product Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Daily Sale</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Monthly Sale</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Daily Purchase</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Monthly Purchase</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Sale Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Sale Report Chart</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Payment Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Purchase Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Customer Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Customer Due Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Supplier Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Warehouse Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Warehouse Stock Chart</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Product Quantity Alert</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Daily Sale Objective Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>User Report</div>
                  </a>
                </li>

              </ul>
            </li> -->

            <!-- settings -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div>Settings</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-collapsed-menu.html" class="menu-link">
                    <div>Role Permission</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Discount Plan</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Discount</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>All Notification</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Send Notification</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Warehouse</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Customer Group</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Brand</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Unit</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Tax</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>User Profile</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Create SMS</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>General Setting</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Mail Setting</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>Reward Point Setting</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>SMS Setting</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>POS Setting</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div>HRM Setting</div>
                  </a>
                </li>
               

              </ul>
            </li> -->
           
          </ul>