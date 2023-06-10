 <!-- Sidebar -->
 <ul class="navbar-nav sb-sidenav-dark bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://pkugamping.com/" target="_blank">
         <div class="sidebar-brand-icon">
             <img class="img-profile rounded-circle fa-fade" style="--fa-animation-duration: 2s; --fa-fade-opacity: 0.6;" width="45 px" src="<?= base_url('assets/img/pku.png') ?>" alt="RS PKU Gamping ">
         </div>
         <div class="sidebar-brand-text mx-3">RS PKU Gamping</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider mb-2">

     <!-- Query Menu -->
     <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`, `menu`
                        FROM `user_menu` JOIN `user_access_menu`
                          ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                       WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                    ";

        $menu = $this->db->query($queryMenu)->result_array();
        ?>

     <!-- Looping Menu -->
     <?php foreach ($menu as $m) : ?>
         <div class="sidebar-heading">
             <?= $m['menu']; ?>
         </div>


         <!-- looping Sub-Menus According to the Menu -->
         <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT *
                           FROM `user_sub_menu`
                          WHERE `menu_id` = $menuId
                            AND `is_active` = 1
                        ";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

         <?php foreach ($subMenu as $sm) : ?>
             <!-- Nav Item - Dashboard -->
             <?php if ($title == $sm['title']) : ?>
                 <li class="nav-item active">
                 <?php else : ?>
                 <li class="nav-item">
                 <?php endif; ?>
                 <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                     <i class="<?= $sm['icon']; ?>"></i>
                     <span><?= $sm['title']; ?></span>
                 </a>
                 </li>
             <?php endforeach; ?>

             <!-- Divider -->
             <hr class="sidebar-divider">

         <?php endforeach; ?>

         <!-- Nav Item - Logout -->
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                 <i class="fas fa-fw fa-sign-out-alt"></i>
                 <span>Keluar</span>
             </a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

 </ul>
 <!-- End of Sidebar -->