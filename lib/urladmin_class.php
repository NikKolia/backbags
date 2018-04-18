<?php
require_once "url_class.php";

class URLAdmin extends URL {

	public function newElement() {
		$url = $this->deleteGET($this->getThisURL(), "func");
		if (strpos($url, "?")) $sym = "&";
		else $sym = "?";
		return $this->returnURL($url.$sym."func=new");
	}

	public function page($number) {
		$url = $this->deleteGET($this->getThisURL(), "page");
		if ($number == 1) return $this->returnURL($url);
		if (strpos($url, "?")) $sym = "&";
		else $sym = "?";
		return $this->returnURL($url.$sym."page=$number");
	}
	
	public function auth() {
		return $this->returnURL("?view=auth");
	}
	
	public function products() {
		return $this->returnURL("?view=products");
	}
	
	public function images() {
		return $this->returnURL("?view=images");
	}
	
	public function models() {
		return $this->returnURL("?view=models");
	}
	
	public function videos() {
		return $this->returnURL("?view=videos");
	}
	
	public function infos() {
		return $this->returnURL("?view=infos");
	}
	
	public function orders() {
		return $this->returnURL("?view=orders");
	}
	
	public function sections() {
		return $this->returnURL("?view=sections");
	}
	
	public function comments() {
		return $this->returnURL("?view=comments");
	}
	
	public function discounts() {
		return $this->returnURL("?view=discounts");
	}
	
	public function statistics() {
		return $this->returnURL("?view=statistics");
	}
	
	public function logout() {
		return $this->returnURL("functions.php?func=logout");
	}
	
	protected function returnURL($url, $index = false) {
		if (!$index) $index = $this->config->address_admin;
		return parent::returnURL($url, $index);
	}
}

?>