<?php
require_once "global_class.php";
require_once "lib/url_class.php";

class Model extends GlobalClass {
	
	protected $page_info;
	
	public function __construct() {
		parent::__construct("models");
		
		$this->setPageInfo();
	}
	
	public function getPages() {
		$pages = array();
		for ($i = 1; $i <= $this->page_info["count"]; $i++) {
			$pages[] = $this->url->page($i);
		}
		return $pages;
	}
	
	private function setPageInfo() {
		$this->page_info["page"] = isset($_GET["page"])? $_GET["page"] : 1;
		if ($this->page_info["page"] <= 0) $this->notFound();
		$this->page_info["count"] = $this->getPageCount();
	}
	
	protected function getPageCount() {
		return ceil($this->getCount() / $this->config->models_count);
	}
	
	public function getAllTable() {
		return $this->getAll("num");
	}
	
	public function getTableData($count, $offset) {
		$l = $this->getL($count, $offset);
		$query = "SELECT `".$this->table_name."`.`num`,
		`".$this->table_name."`.`model`,
		`".$this->table_name."`.`model_img`,
		`".$this->table_name."`.`date`
		FROM `".$this->table_name."`
		ORDER BY `date` DESC $l";
		return $this->transform($this->db->select($query));
	}
	
	protected function transformElement($model) {
		$model["model_img"] = $this->config->address.$this->config->dir_img_models.$model["model_img"];
		$model["model"] = str_replace("\n", "<br />", $model["model"]);
		$model["link_admin_edit"] = $this->url->adminEditModel($model["num"]);
		$model["link_admin_delete"] = $this->url->adminDeleteModel($model["num"]);
		$model["date"] = $this->format->date($model["date"]);
		return $model;
	}
	
	public function get($num) {
		if (!$this->check->num($num)) return false;
		$query = "SELECT `".$this->table_name."`.`num`,
		`".$this->table_name."`.`model`,
		`".$this->table_name."`.`model_img`,
		`".$this->table_name."`.`date`
		FROM `".$this->table_name."`
		WHERE `".$this->table_name."`.`num` = ".$this->config->sym_query;
		return $this->transform($this->db->selectRow($query, array($num)));
	}
	
	protected function checkData($data) {
		if (!$this->check->text($data["model"], true)) return "ERROR_MODEL";
		if (!$this->check->title($data["model_img"])) return "ERROR_IMG";
		if (!$this->check->ts($data["date"])) return "UNKNOWN_ERROR";
		return true;
	}
	
	public function getDate($num) {
		return $this->getFieldOnID($num, "date");
	}
	
	public function getModelImg($num) {
		return $this->getFieldOnID($num, "model_img");
	}
	
	public function getModels($count) {
		$offset = ($this->page_info["page"] - 1) * $this->config->models_count;
		$l = $this->getL($count, $offset);
		$query = "SELECT * FROM `".$this->table_name."` ORDER BY `date` DESC $l";
		return $this->transform($this->db->select($query));
	}
	
}

?>