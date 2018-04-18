<?php
require_once "config_class.php";

class URL {
	
	protected $config;
	protected $amp;
	
	public function __construct($amp = true) {
		$this->config = new Config();
		$this->amp = $amp;
	}
	
	public function page($number) {
		$url = $this->deleteGET($this->getThisURL(), "page");
		if ($number == 1) return $this->returnURL($url);
		if (strpos($url, "?")) $sym = "&";
		else $sym = "?";
		return $this->returnURL($url.$sym."page=$number");
	}
	
	public function getView() {
		$view = $_SERVER["REQUEST_URI"];
		$view = substr($view, 1);
		if (($pos = strpos($view, "?")) !== false) {
			$view = substr($view, 0, $pos);
		}
		return $view;
	}
	
	public function setAMP($amp) {
		$this->amp = $amp;
	}
	
	public function getThisURL() {
		$uri = substr($_SERVER["REQUEST_URI"], 1);
		return $this->config->address.$uri;
	}
	
	protected function deleteGET($url, $param) {
		$res = $url;
		if (($p = strpos($res, "?")) !== false) {
			$paramstr = substr($res, $p + 1);
			$params = explode("&", $paramstr);
			$paramsarr = array();
			foreach ($params as $value) {
				$tmp = explode("=", $value);
				$paramsarr[$tmp[0]] = $tmp[1];
			}
			if (array_key_exists($param, $paramsarr)) {
				unset($paramsarr[$param]);
				$res = substr($res, 0, $p + 1);
				foreach ($paramsarr as $key => $value) {
					$str = $key;
					if ($value !== "") {
						$str .= "=$value";
					}
					$res .= "$str&";
				}
				$res = substr($res, 0, -1);
			}
		}
		return $res;
	}
	
	public function index() {
		return $this->returnURL("");
	}
	
	public function addorder($num) {
		return $this->returnURL("addorder?num=$num");
	}
	
	public function addCartoff($num) {
		return $this->returnURL("addcartoff?num=$num");
	}
	
	public function notFound() {
		return $this->returnURL("notfound");
	}
	
	public function cart() {
		return $this->returnURL("cart");
	}
	
	public function order() {
		return $this->returnURL("order");
	}
	
	public function message() {
		return $this->returnURL("message");
	}
	
	public function oferta() {
		return $this->returnURL("oferta");
	}
	
	public function contacts() {
		return $this->returnURL("contacts");
	}
	
	public function models() {
		return $this->returnURL("models");
	}
	
	public function search() {
		return $this->returnURL("search");
	}
	
	public function section($num) {
		return $this->returnURL("section?num=$num");
	}
	
	public function product($num) {
		return $this->returnURL("product?num=$num");
	}
	
	public function status_pay($num) {
		return $this->returnURL("functions.php?func=status_pay");
	}	
	
	public function addCart($num) {
		return $this->returnURL("functions.php?func=add_cart&num=$num");
	}
	
	public function deleteCart($num) {
		return $this->returnURL("functions.php?func=delete_cart&num=$num");
	}
	
	public function sortTitleUp() {
		return $this->sortOnField("title", 1);
	}
	
	public function sortTitleDown() {
		return $this->sortOnField("title", 0);
	}
	
	public function sortPriceUp() {
		return $this->sortOnField("price", 1);
	}
	
	public function sortPriceDown() {
		return $this->sortOnField("price", 0);
	}
	
	public function action() {
		return $this->returnURL("functions.php");
	}
	
	public function adminEditProduct($num) {
		return $this->returnURL("?view=products&func=edit&num=$num", $this->config->address_admin);
	}
	
	public function adminDeleteProduct($num) {
		return $this->returnURL("functions.php?func=delete_product&num=$num", $this->config->address_admin);
	}
	
	public function adminEditImage($num) {
		return $this->returnURL("?view=images&func=edit&num=$num", $this->config->address_admin);
	}
	
	public function adminDeleteImage($num) {
		return $this->returnURL("functions.php?func=delete_image&num=$num", $this->config->address_admin);
	}
	
	public function adminEditModel($num) {
		return $this->returnURL("?view=models&func=edit&num=$num", $this->config->address_admin);
	}
	
	public function adminDeleteModel($num) {
		return $this->returnURL("functions.php?func=delete_model&num=$num", $this->config->address_admin);
	}
	
	public function adminEditInfo($num) {
		return $this->returnURL("?view=infos&func=edit&num=$num", $this->config->address_admin);
	}
	
	public function adminDeleteInfo($num) {
		return $this->returnURL("functions.php?func=delete_info&num=$num", $this->config->address_admin);
	}
	
	public function adminEditVideo($num) {
		return $this->returnURL("?view=videos&func=edit&num=$num", $this->config->address_admin);
	}
	
	public function adminDeleteVideo($num) {
		return $this->returnURL("functions.php?func=delete_video&num=$num", $this->config->address_admin);
	}
	
	public function adminEditComment($num) {
		return $this->returnURL("?view=comments&func=edit&num=$num", $this->config->address_admin);
	}
	
	public function adminDeleteComment($num) {
		return $this->returnURL("functions.php?func=delete_comment&num=$num", $this->config->address_admin);
	}
	
	public function adminEditSection($num) {
		return $this->returnURL("?view=sections&func=edit&num=$num", $this->config->address_admin);
	}
	
	public function adminDeleteSection($num) {
		return $this->returnURL("functions.php?func=delete_section&num=$num", $this->config->address_admin);
	}
	
	public function adminEditOrder($num) {
		return $this->returnURL("?view=orders&func=edit&num=$num", $this->config->address_admin);
	}
	
	public function adminDeleteOrder($num) {
		return $this->returnURL("functions.php?func=delete_order&num=$num", $this->config->address_admin);
	}
	
	public function adminEditDiscount($num) {
		return $this->returnURL("?view=discounts&func=edit&num=$num", $this->config->address_admin);
	}
	
	public function adminDeleteDiscount($num) {
		return $this->returnURL("functions.php?func=delete_discount&num=$num", $this->config->address_admin);
	}
	
	protected function sortOnField($field, $up) {
		$this_url = $this->getThisURL();
		$this_url = $this->deleteGET($this_url, "up");
		$this_url = $this->deleteGET($this_url, "sort");
		if (strpos($this_url, "?") === false) $url = $this->url."?sort=$field&up=$up";
		else $url = $this_url."&sort=$field&up=$up";
		return $this->returnURL($url);
	}
	
	protected function returnURL($url, $index = false) {
		if (!$index) $index = $this->config->address;
		if ($url == "") return $index;
		if (strpos($url, $index) !== 0) $url = $index.$url;
		if ($this->amp) $url = str_replace("&", "&amp;", $url);
		return $url;
	}
	
	public function fileExists($file) {
		$arr = explode(PATH_SEPARATOR, get_include_path());
		foreach ($arr as $val) {
			if (file_exists($val."/".$file)) return true;
		}
		return false;
	}
	
}

?>