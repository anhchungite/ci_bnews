 <!-- Form elements -->
<?php 
	$name_cat = $arrCat['name'];
?>
    <div class="grid_12">
                    <div class="module">
                               <h2><span>Sửa danh mục tin</span></h2>
                <div class="module-body">
             			<?php 
             			if(isset($error)){
             				echo $error;
             			}
             			?>
                        <form action="" id="frm_cat" method="post" enctype="multipart/form-data">
                            <p>
                                <label>Tên danh mục</label>
                                <input type="text" name="name_cat" value="<?php echo $name_cat ?>" class="input-medium" />
                                                            </p>

                            <fieldset>
                                <input class="submit-green" name="editCat" type="submit" value="Sửa" />
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