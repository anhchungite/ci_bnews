<?php 
	$this->load->view("layout/login/inc/header");
?>
<!-- Form elements -->
<div class="grid_12">
   <div class="module">
      <h2><span>Đăng nhập</span></h2>
      <div class="module-body">
      <?php 
      if(isset($error)){
      	echo $error;
      }
      ?>
         <form action="" id="frmLogin" method="post" enctype="multipart/form-data">
            <p>
               <label><strong>User name:</strong></label>
               <input type="text" name="username" value="" class="input-medium" />
            </p>
            <p>
               <label><strong>Password:</strong></label>
               <input type="password" name="password" value="" class="input-medium" />
            </p>
            <fieldset>
               <input class="submit-green" name="login" type="submit" value="Login" />
               <input class="submit-gray" name="reset" type="reset" value="Nhập lại" />
            </fieldset>
         </form>
      </div>
      <!-- End .module-body -->
   </div>
   <!-- End .module -->
   <div style="clear:both;"></div>
</div>
<!-- End .grid_12 -->
<?php 
	$this->load->view("layout/login/inc/footer");
?>	             