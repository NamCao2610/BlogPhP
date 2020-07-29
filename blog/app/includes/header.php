 <!--Menu navbar header-->
 <header>
   <!--Logo cua web-->
   <a href="<?php echo BASE_URL . '/index.php' ?>" class="logo">
     <h1 class="logo-text"><span>Blog</span> SweetLove</h1>
   </a>
   <i class="fa fa-bars menu-toggle"></i>
   <ul class="nav">
     <li><a href="<?php echo BASE_URL . '/index.php'; ?>">Trang chủ</a></li>
     <li><a href="#">Liên hệ</a></li>
     <li><a href="#">Dịch vụ</a></li>

     <?php if (isset($_SESSION['id'])) : ?>
       <li>
         <a href="#">
           <i class="fa fa-user"></i>
           <?php echo $_SESSION['username']; ?>
           <i class="fa fa-chevron-down" style="font-size: 0.8em;"></i>
         </a>
         <ul>

           <?php if ($_SESSION['id']) : ?>
             <li><a href="<?php echo BASE_URL . '/admin/dashboard.php'; ?>">Quản lí tài khoản</a></li>
           <?php endif; ?>

           <li><a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout">Đăng xuất</a></li>
         </ul>
       </li>
     <?php else : ?>

       <li><a href="<?php echo BASE_URL . '/register.php'; ?>">Sign Up</a></li>
       <li><a href="<?php echo BASE_URL . '/login.php'; ?>">Login</a></li>

     <?php endif; ?>

   </ul>
 </header>
 <!-- // Menu navbar header -->