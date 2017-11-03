<?php
$iduser   = $arrUser['id_user'];
$username = $arrUser['username'];
$fullname = $arrUser['fullname'];
if($arrUserInfo['id_user'] != 1 && $iduser == 1){
	redirect(base_url('admin/admin_user/index'));
	exit();
}
?>
<!-- Form elements -->
    
        <div class="grid_12">
            <div class="module">
                <h2><span>Sửa thông tin người dùng</span></h2>

                <div class="module-body">
                <?php 
                if(isset($error)){echo $error;}
                ?>
                                       <form action="" id="frm_editUser" method="post" enctype="multipart/form-data">
                        <p>
                            <label>Tên người dùng: </label>
                           <?php echo $username ?>                        </p>
                        <p>
                            <label>Mật khẩu:</label>
                            <input type="password" name="password" value="" class="input-medium" />
                        </p>
                        <p>
                            <label>Tên đầy đủ:</label>
                            <input type="text" name="fullname" value="<?php echo $fullname ?>" class="input-medium" />
                        </p>
                        <fieldset>
                            <input class="submit-green" name="editUser" type="submit" value="Sửa" />
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