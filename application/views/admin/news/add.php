<!-- Form elements -->
<div class="grid_12">
   <div class="module">
      <h2><span>Thêm tin tức</span></h2>
      <div class="module-body">
      <?php if(isset($error)){echo $error;}?>
         <form action="" id="frm_News" method="post" enctype="multipart/form-data">
            <p>
               <label><strong>Tên tin</strong> (*)</label> <label id="tentin-error" class="error" for="tentin"></label>
               <input type="text" name="tentin" value="" class="input-medium" /> 
            </p>
            <p>
               <label><strong>Danh mục tin</strong> (*)</label> <label id="danhmuc-error" class="error" for="danhmuc"></label>
               <select name="danhmuc" class="input-short">
                  <option value="">-- Chọn danh mục tin --</option>
                  <?php foreach ($arrCat as $key => $value):
                  	$id_cat = $value['id_cat'];
                  	$name_cat = $value['name'];
                  ?>
                  <option value="<?php echo $id_cat ?>"><?php echo $name_cat ?></option>
                  <?php endforeach;?>
               </select>
            </p>
            <p>
               <label><strong>Hình ảnh</strong> (*)</label>
               <input type="file" name="hinhanh" />
            </p>
            <p>
               <label><strong>Mô tả</strong> (*)</label> <label id="mota-error" class="error" for="mota"></label>
               <textarea name="mota" value="" rows="7" cols="90" class="input-medium"></textarea>
            </p>
            <p>
               <label><strong>Chi tiết</strong> (*)</label> <label id="chitiet-error" class="error" for="chitiet"></label>
               <textarea name="chitiet" value="" rows="7" cols="90" class="input-long ckeditor" id="chitiet"></textarea>
            </p>
            <fieldset>
               <input class="submit-green" name="addNews" type="submit" value="Thêm" />
            </fieldset>
         </form>
      </div>
      <!-- End .module-body -->
   </div>
   <!-- End .module -->
   <div style="clear:both;"></div>
</div>
<!-- End .grid_12 -->