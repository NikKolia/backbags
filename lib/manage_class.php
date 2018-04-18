<?php
require_once "config_class.php";
require_once "format_class.php";
require_once "product_class.php";
require_once "image_class.php";
require_once "model_class.php";
require_once "info_class.php";
require_once "order_class.php";
require_once "comment_class.php";
require_once "video_class.php";
require_once "discount_class.php";
require_once "systemmessage_class.php";
require_once "mail_class.php";
require_once "url_class.php";

class Manage {
	
	protected $config;
	protected $format;
	protected $product;
	protected $image;
	protected $model;
	protected $info;
	protected $order;
	protected $comment;
	protected $video;
	protected $discount;
	protected $url;
	
	public function __construct() {
		session_start();
		$this->config = new Config();
		$this->format = new Format();
		$this->product = new Product();
		$this->image = new Image();
		$this->model = new Model();
		$this->info = new Info();
		$this->order = new Order();
		$this->comment = new Comment();
		$this->video = new Video();
		$this->discount = new Discount();
		$this->sm = new SystemMessage();
		$this->mail = new Mail();
		$this->url = new URL();
		$this->data = $this->format->xss($_REQUEST);
		$this->saveData();
	}
	
	private function saveData() {
		foreach ($this->data as $key => $value) $_SESSION[$key] = $value;
	}
	
	public function editCart($num = false) {
		if (!$num) $num = $this->data["num"];
		if (!$this->product->existsID($num)) return false;
		if ($_SESSION["cart"]) $_SESSION["cart"] .= ",$num";
		else $_SESSION["cart"] = $num; 
	}
	
	public function addCart($num = false) {
		if (!$num) $num = $this->data["num"];
		if (!$this->product->existsID($num)) return false;
		if ($_SESSION["cart"]) $_SESSION["cart"] .= ",$num";
		else $_SESSION["cart"] = $num;
		header("Location: ".$this->url->cart($num));
		exit;
		/* $this->sm->message("SUCCESS_ADD_COMMENT");
		header("Location: ".$this->url->product($num));
		exit; */
	}
	
	public function deleteCart() {
		$num = $this->data["num"];
		$ids = explode(",", $_SESSION["cart"]);
		$_SESSION["cart"] = "";
		for ($i = 0; $i < count($ids); $i++) {
			if ($ids[$i] != $num) $this->editCart($ids[$i]);
		}
		header("Location: ".$this->url->Cart());
		exit;
	}
	
	public function updateCart() {
		$_SESSION["cart"] = "";
		foreach ($this->data as $k => $v) {
			if (strpos($k, "count_") !== false) {
				$num = substr($k, strlen("count_"));
				for ($i = 0; $i < $v; $i++) {
					if (!$num) $num = $this->data["num"];
					if (!$this->product->existsID($num)) return false;
					if ($_SESSION["cart"]) $_SESSION["cart"] .= ",$num";
					else $_SESSION["cart"] = $num;
				}
			}
		}
		// $_SESSION["discount"] = $this->data["discount"];
		header("Location: ".$this->url->Cart());
		exit;
	}
	
	public function addOrder() {
		$temp_data = array();
		$temp_data["delivery"] = $this->data["delivery"];
		$temp_data["product_ids"] = $_SESSION["cart"];
		$temp_data["price"] = $this->getPrice();
		$temp_data["name"] = $this->data["name"];
		$temp_data["phone"] = $this->data["phone"];
		$temp_data["email"] = $this->data["email"];
		$temp_data["address"] = $this->data["address"];
		$temp_data["notice"] = $this->data["notice"];
		$temp_data["date_order"] = $this->format->ts();
		$temp_data["date_send"] = 0;
		$temp_data["date_pay"] = 0;
		$num = $this->order->add($temp_data);
		if ($num) {
			$send_data = array();
			$send_data["num"] = $num;
			$send_data["products"] = $this->getProducts();
			$send_data["name"] = $temp_data["name"];
			$send_data["phone"] = $temp_data["phone"];
			$send_data["email"] = $temp_data["email"];
			$send_data["address"] = $temp_data["address"];
			$send_data["notice"] = $temp_data["notice"];
			$send_data["price"] = $temp_data["price"];
			$to_adm = $this->config->admemail;
			$to_user = $temp_data["email"];
			$this->mail->send_adm($this->config->admemail, $send_data, "ORDER");
			$this->mail->send_user($temp_data["email"], $send_data, "ORDER");
			header("Location: ".$this->url->addOrder($num));
			exit;
		}
		header("Location: ".$this->url->cart());
		exit;
	}

	public function statusPay() {
			$dataSet = $_POST;
			if ($_POST["ik_inv_st"] == "success") {
			unset($dataSet['ik_sign']); // удаляем из данных строку подписи
			ksort($dataSet, SORT_STRING); // сортируем по ключам в алфавитном порядке элементы массива
			array_push($dataSet, 'Cfiky26gCgDY453P'); // добавляем в конец массива "секретный ключ"
			$signString = implode(':', $dataSet); // конкатенируем значения через символ ":"
			$sign = base64_encode(md5($signString, true)); // берем MD5 хэш в бинарном виде по сформированной строке и кодируем в BASE64
			if ($sign = $_POST['ik_sign']) {
				if ($this->order->getPrice($this->data['ik_pm_no']) == $this->data["ik_am"])
					$this->order->setDatePay($this->data['ik_pm_no'], $this->format->ts());
			}
			exit;
		}
	}	
	
	public function addComments() {
		$temp_data = array();
		$temp_data["product_id"] = $this->data["product_id"];
		$temp_data["name"] = $this->data["name"];
		$temp_data["email"] = $this->data["email"];
		$temp_data["comment"] = $this->data["comment"];
		$temp_data["date"] = $this->format->ts();
		$num = $this->comment->add($temp_data);
		if ($num) {
			$send_data = array();
			$send_data["num"] = $num;
			$send_data["product_id"] = $this->getProduct();
			$send_data["name"] = $temp_data["name"];
			$send_data["email"] = $temp_data["email"];
			$send_data["comment"] = $temp_data["comment"];
			$to_adm = $this->config->admemail;
			$to_user = $temp_data["email"];
			$this->mail->send_adm($this->config->admemail, $send_data, "COMMENT");
			$this->mail->send_user($temp_data["email"], $send_data, "COMMENT");
			$this->sm->message("SUCCESS_ADD_COMMENT");
			header("Location: ".$this->url->product($this->data["product_id"]));
			exit;
		}
		header("Location: ".$this->url->product($this->data["product_id"]));
		exit;
	}
	
	private function getProduct() {
		$ids = explode(",", $this->data["product_id"]);
		$products = $this->product->getAllOnIDs($ids);
		$result = array();
		for ($i = 0; $i < count($products); $i++) {
			$result[$products[$i]["num"]] = $products[$i]["title"];
		}
		$products = array();
		for ($i = 0; $i < count($ids); $i++) {
			$products[$ids[$i]][0]++;
			$products[$ids[$i]][1] = $result[$ids[$i]];
		}
		$str = "";
		foreach ($products as $value) {
			$str .= $value[1]." | ";
		}
		$str = substr($str, 0, -3);
		return $str;
	}
	
	private function getProducts() {
		$ids = explode(",", $_SESSION["cart"]);
		$products = $this->product->getAllOnIDs($ids);
		$result = array();
		for ($i = 0; $i < count($products); $i++) {
			$result[$products[$i]["num"]] = $products[$i]["title"];
		}
		$products = array();
		for ($i = 0; $i < count($ids); $i++) {
			$products[$ids[$i]][0]++;
			$products[$ids[$i]][1] = $result[$ids[$i]];
			$products[$ids[$i]][2] = $ids[$i];
		}
		$str = "";
		foreach ($products as $value) {
			$str .= $value[1]." (код товара - ".$value[2].") : ".$value[0]." шт. || ";
		}
		$str = substr($str, 0, -3);
		return $str;
	}
	
	private function getPrice() {
		$ids = explode(",", $_SESSION["cart"]);
		$summa = $this->product->getPriceOnIDs($ids);
		$value = $this->discount->getValueOnCode($_SESSION["discount"]);
		if ($value) $summa *= (1 - $value);
		return $summa;
	}
}
?>