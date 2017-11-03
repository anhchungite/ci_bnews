
<?php
	$this->load->view("layout/public/inc/header");
?>
<div class="leftpanel">
	
	<?php
		$this->load->view("layout/public/inc/left_bar");
	?>
</div>
<div class="rightpanel">
	<div class="rightbody">
		<?php
			$controller = $this->router->fetch_class();
			$controller = explode("_", $controller);
			$controller = strtolower($controller[count($controller)-1]);
			//echo $controller;
			//lấy con phương thức 
			$method = $this->router->fetch_method();
			
			$this->load->view("{$controller}/{$method}");
		?>
	</div>
</div>
		
<?php
		$this->load->view("layout/public/inc/footer");
	?>			
