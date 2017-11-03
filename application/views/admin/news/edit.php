<?php
	$name_news 		= $arrDetail['name'];
	$id_cat_news 	= $arrDetail['id_cat'];
	$picture 		= $arrDetail['picture'];
	$mota 			= $arrDetail['preview_text'];
	$chitiet		= $arrDetail['detail_text'];
?>
<!-- Form elements -->
<div class="grid_12">
   <div class="module">
      <h2><span>Thêm tin tức</span></h2>
      <div class="module-body">
      <?php if(isset($error)){echo $error;}?>
         <form action="" id="frm_News" method="post" enctype="multipart/form-data">
            <p>
               <label><strong>Tên tin</strong> (*)</label>
               <label id="tentin-error" class="error" for="tentin"></label>
               <input type="text" name="tentin" value="<?php echo $name_news?>" class="input-medium" /> 
            </p>
            <p>
               <label><strong>Danh mục tin</strong> (*)</label>
               <label id="danhmuc-error" class="error" for="danhmuc"></label>
                <select name="danhmuc" class="input-short">
                  <option value="">-- Chọn danh mục tin --</option>
                  <?php foreach ($arrCat as $key => $value):
                  	$id_cat = $value['id_cat'];
                  	$name_cat = $value['name'];
                  	$selected = " ";
                  	if($id_cat_news == $id_cat){
                  		$selected = " selected='selected' ";
                  	}
                  ?>
                  <option<?php echo $selected ?>value="<?php echo $id_cat ?>"><?php echo $name_cat ?></option>
                  <?php endforeach;?>
               </select>
            </p>
            <p>
               <label><strong>Hình ảnh</strong></label>
            
            <?php 
				if($picture !=""){
					$path_url = IMG_UPLOAD.'/'.$picture;
			?>
			<div>
               <input class="submit-gray" style="margin-bottom: 5px" name="delPic" type="submit" value="Xóa hình" />
            </div>
            <div>
									<img src="<?php echo $path_url?>" alt="" width="200px" />
									</div>
			<?php 
				}
			?>
               
            
            <input type="file" name="hinhanh" value="" />
            </p>
            <p>
               <label><strong>Mô tả</strong> (*)</label>
               <label id="mota-error" class="error" for="mota"></label>
               <textarea name="mota" rows="7" cols="90" class="input-medium"><?php echo $mota ?></textarea>
            </p>
            <p>
               <label><strong>Chi tiết</strong> (*)</label>
               <label id="chitiet-error" class="error" for="chitiet"></label>
               <textarea name="chitiet" rows="7" cols="90" class="input-long ckeditor"><?php echo $chitiet ?></textarea>
            </p>
            <fieldset>
               <input class="submit-green" name="editNews" type="submit" value="Sửa" />
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