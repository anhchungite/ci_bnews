<?php 
	$this->load->view("layout/admin/inc/header");
?>
<?php 
			/*lấy tên controller: vi dụ: Public_Bnews
			* tách mảng
			* lấy phần tử cuối cùng của mảng
			* hàm strtolower(): chuyển chữ hòa thành chữ thường: ví dui: Bnews==>bnews
			*/
			$controller = $this->router->fetch_class();
			$controller = explode("_", $controller);
			$controller = strtolower($controller[count($controller)-1]);
			//lấy con phương thức 
			$method = $this->router->fetch_method();
			
			$this->load->view("admin/{$controller}/{$method}");
?>
<?php 
	$this->load->view("layout/admin/inc/footer");
?>	             