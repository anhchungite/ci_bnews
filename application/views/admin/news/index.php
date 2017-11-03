<div class="bottom-spacing">
	  <!-- Button -->
	  	  <div class="float-left">
		  <a href="<?php echo base_url()?>admin/admin_news/add" class="button">
			<span>Thêm tin <img src="<?php echo TEMPLATE_URL_ADMIN ?>/images/plus-small.gif" alt="Thêm tin"></span>
		  </a>
	  </div>
	  <div class="clear"></div>
</div>

<div class="grid_12">
	<!-- Example table -->
	<div class="module">
		<h2><span>Danh sách tin</span></h2>
		
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
						<th style="width:6%; text-align: center;">ID tin tức</th>
						<th>Tên tin tức</th>
						<th style="width:20%">Danh mục tin</th>
						<th style="width:16%; text-align: center;">Hình ảnh</th>
						<th style="width:11%; text-align: center;">Chức năng</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				foreach ($arrGetNews as $key => $value){
					$id_news = $value['id_news'];
					$tentt = $value['tentt'];
					$picture = $value['picture'];
					$tendmt = $value['tendmt'];
				?>
				    					<tr>
						<td class="align-center"><?php echo $id_news ?></td>
						<td><a href="editNews.php?id_news=70"><?php echo $tentt ?></a></td>
						<td><?php echo $tendmt?></td>
						<td align="center">
						<?php 
							if($picture !=""){
								$path_url = IMG_UPLOAD.'/'.$picture;
						?>
												<img src="<?php echo $path_url;?>" class="hoa" />
						<?php 
							}else {
								echo "Không có hình";	  
							}
						?>
						                        </td>
						<td align="center">
							<a href="<?php echo base_url()?>admin/admin_news/edit/<?php echo $id_news ?>">Sửa <img src="<?php echo TEMPLATE_URL_ADMIN ?>/images/pencil.gif" alt="edit" /></a>
							<a href="<?php echo base_url()?>admin/admin_news/del/<?php echo $id_news ?>">Xóa <img src="<?php echo TEMPLATE_URL_ADMIN ?>/images/bin.gif" width="16" height="16" alt="delete" /></a>
						</td>
					</tr>
				<?php }?>	
				</tbody>
			</table>
			</form>
		 </div> <!-- End .module-table-body -->
	</div> <!-- End .module -->
		 <div class="pagination">           
			<div class="numbers">
			<?php echo $this->pagination->create_links() ?>

			</div> 
			<div style="clear: both;"></div> 
		 </div>
	
</div> <!-- End .grid_12 -->