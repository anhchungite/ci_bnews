
<h2>Danh mục tin</h2>
<ul>
	<?php foreach ($arrCat as $key => $value):
		$name_cat = $value['name'];
		$id_cat = $value['id_cat'];
		$url_name_cat = convertUrl($name_cat);
		$re_url = $url_name_cat.'-'.$id_cat;
	?>
	<li><a href="<?php echo base_url()?>danh-muc/<?php echo $re_url?>"><?php echo $name_cat ?></a></li>
	<?php endforeach;?>
</ul>
