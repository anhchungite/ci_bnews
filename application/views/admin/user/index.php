
<div class="bottom-spacing">
   <!-- Button -->
   <div class="float-left">
      <a href="<?php echo base_url()?>admin/admin_user/add" class="button">
      <span>Thêm người dùng<img src="<?php echo TEMPLATE_URL_ADMIN ?>/images/plus-small.gif" alt="Thêm tin"></span>
      </a>
   </div>
   <div class="clear"></div>
</div>
<div class="grid_12">
   <!-- Example table -->
   <div class="module">
      <h2><span>Danh sách người dùng</span></h2>
      <div class="module-table-body">
         <?php 
         if(isset($_GET['msg'])){
         	echo $_GET['msg'];
         }
         ?>
            <table id="myTable" class="tablesorter">
               <thead>
                  <tr>
                     <th style="width:5%; text-align: center;">STT</th>
                     <th>Tên người dùng</th>
                     <th>Tên đầy đủ</th>
                     <th style="width:11%; text-align: center;">Chức năng</th>
                  </tr>
               </thead>
               <tbody>
               <?php 
               $stt = 1;
               foreach ($arrUser as $key => $value):
               $iduser = $value['id_user'];
               $username = $value['username'];
               $fullname = $value['fullname'];
               ?>
                  <tr>
                     <td class="align-center">
                        <?php echo $stt ?>                                    
                     </td>
                     <td>
                        <?php echo $username ?>                                    
                     </td>
                     <td>
                        <?php echo $fullname ?>                                    
                     </td>
                     <td align="center">
                     <?php 
                     	if($iduser != 1 || $arrUserInfo['id_user'] == $iduser){
                     ?>
                        <a href="<?php echo base_url()?>admin/admin_user/edit/<?php echo $iduser ?>">Sửa <img src="<?php echo TEMPLATE_URL_ADMIN ?>/images/pencil.gif" alt="edit" /></a>
                     <?php
                     	}
                     ?>
                     <?php 
                     	if($iduser != 1 && $iduser != $arrUserInfo['id_user']){
                     ?>
                        <a href="<?php echo base_url()?>admin/admin_user/del/<?php echo $iduser ?>">Xóa <img src="<?php echo TEMPLATE_URL_ADMIN ?>/images/bin.gif" width="16" height="16" alt="delete" /></a>
                     <?php 
                     	}
                     ?> 
                     </td>
                  </tr>
                 <?php
                 $stt++;
                 endforeach;
                 ?>
               </tbody>
            </table>
        
      </div>
      <!-- End .module-table-body -->
   </div>
   <!-- End .module -->
   <div style="clear: both;"></div>
</div>
<!-- End .grid_12 -->