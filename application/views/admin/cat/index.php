<div class="bottom-spacing">
   <!-- Button -->
   <div class="float-left">
      <a href="<?php echo base_url()?>admin/admin_cat/add" class="button">
      <span>Thêm danh mục tin <img src="<?php echo TEMPLATE_URL_ADMIN ?>/images/plus-small.gif" alt="Thêm tin"></span>
      </a>
   </div>
   <div class="clear"></div>
</div>
<div class="grid_12">
   <!-- Example table -->
   <div class="module">
      <h2><span>Danh sách danh mục tin</span></h2>
      <div class="module-table-body">
	      <?php
	      if(isset($_GET['msg'])){
	      	echo $_GET['msg'];
	      }
	      ?>
         <form action="">
            <table id="myTable" class="tablesorter">
               <thead>
                  <tr>
                     <th style="width:5%; text-align: center;">STT</th>
                     <th>Tên danh mục</th>
                     
                     <?php 
                     	if($this->session->userdata('User_Info')['id_user'] == 1){
                     ?>
                     <th style="width:11%; text-align: center;">Chức năng</th>
                     <?php 
                     	}
                     ?>
                  </tr>
               </thead>
               <tbody>
               <?php 
               $stt = 1;
               foreach ($arrCat as $key => $value):
               		$id_cat = $value['id_cat'];
               		$name_cat = $value['name'];
               ?>
                  <tr>
                     <td class="align-center">
                        <?php echo $stt?>                                    
                     </td>
                     <td>
                        <?php echo $name_cat?>
                     </td>
                     <?php 
                     	// admin mới hiển thị chức năng Sửa/Xóa
                     	if($this->session->userdata('User_Info')['id_user'] == 1){
                     ?>
                     <td align="center">
                        <a href="<?php echo base_url()?>admin/admin_cat/edit/<?php echo $id_cat ?>">Sửa <img src="<?php echo TEMPLATE_URL_ADMIN ?>/images/pencil.gif" alt="edit" /></a>
                        <a href="<?php echo base_url()?>admin/admin_cat/del/<?php echo $id_cat ?>">Xóa <img src="<?php echo TEMPLATE_URL_ADMIN ?>/images/bin.gif" width="16" height="16" alt="delete" /></a>
                     </td>
                     <?php 
                     	}
                     ?>
                  </tr>
                <?php 
                $stt++;
                endforeach;
                ?>  
               </tbody>
            </table>
         </form>
      </div>
      <!-- End .module-table-body -->
   </div>
   <!-- End .module -->
   <div style="clear: both;"></div>
</div>
<!-- End .grid_12 -->