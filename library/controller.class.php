<?php

// Khởi tạo các hàm helper nếu dùng
//require_once ROOT.'\application\helpers\Session.php';

class Controller
{

	protected $_controller;
	protected $_action;
	protected $_template;

	public $doNotRenderHeader;
	public $render;

	function __construct($controller, $action)
	{

		global $inflect;

		$this->_controller = ucfirst($controller);
		$this->_action = $action;

		$model = ucfirst($inflect->singularize($controller)); //chuyển kí tự đầu tiên của chuỗi thành in hoa
		$this->doNotRenderHeader = 0;
		$this->render = 1;
		$this->$model = new $model;
		$this->_template = new Template($controller, $action);
	}

	function set($name, $value)
	{
		$this->_template->set($name, $value);
	}
	
	//xử lý xữ liệu nhập vào
	function testInput($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//khởi tạo view của controller theo action tương ứng
	function __destruct()
	{
		if ($this->render) {
			$this->_template->render($this->doNotRenderHeader);
		}
	}
}
