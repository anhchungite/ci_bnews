
 <!-- Form elements -->
            <div class="grid_12">

            <div class="module">
                <h2><span>Thêm người dùng</span></h2>
                <div class="module-body">
                <?php if(isset($error)){echo $error;}?>
                    <form action="" id="frm_addUser" method="post" enctype="multipart/form-data">
                        <p>
                                                        <label>Tên người dùng</label>
                            <input type="text" name="username" value="" class="input-medium" />
                        </p>
                        <p>
                            <label>Mật khẩu</label>
                            <input type="password" name="password" value="" class="input-medium" />
                        </p>
                        <p>
                            <label>Tên đầy đủ</label>
                            <input type="text" name="fullname" value="" class="input-medium" />
                        </p>
                        <fieldset>
                            <input class="submit-green" name="addUser" type="submit" value="Thêm" />
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