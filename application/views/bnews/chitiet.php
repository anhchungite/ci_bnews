
		<h1 class="title"><?php echo $arrDetail['name'] ?></h1>
		<div class="items-new">
			<div class="new-detail">
				<?php echo $arrDetail['detail_text'] ?>
			</div>
		</div>
		
		<h2 class="title" style="margin-top:30px;color:#BBB">Tin tức liên quan</h2>
		<div class="items-new">
			<ul>
	<?php foreach ($arrRelated as $key => $value):
		$id_news = $value['id_news'];
		$preview_text = $value['preview_text'];
		$picture = $value['picture'];
		$name = $value['name'];
		$id_cat = $value['id_cat'];
		if($picture ==""){
			$picture = 'no_thumbnails.gif';
		}
		
		$url_name = convertUrl($name);
	?>
		<li>
			<h2>
				<a href="<?php echo base_url() ?>chi-tiet/<?php echo $url_name.'-'.$id_news.'.html' ?>" title=""><?php echo $name ?></a>
			</h2>
			<div class="item">
				<a href="<?php echo base_url() ?>chi-tiet/<?php echo $url_name.'-'.$id_news.'.html' ?>" title=""><img src="<?php echo IMG_UPLOAD ?>/<?php echo $picture ?>" alt="" /></a>
				<p><?php echo $preview_text ?></p>
				<div class="clr"></div>
			</div>
		</li>
	<?php endforeach; ?>
	</ul>
		</div>
