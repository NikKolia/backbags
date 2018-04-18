<?php
require_once "global_class.php";

class Product extends GlobalClass {
	
	public function __construct() {
		parent::__construct("products");
	}
	
	public function getAllData($count) {
		return $this->transform($this->getAll("date", false, $count));
	}
	
	public function getAllimgData() {
		return $this->transform($this->getAll("num"));
	}
	
	public function getAllcomData() {
		return $this->transform($this->getAll("num"));
	}
	
	public function getAllTable() {
		return $this->getAll("num");
	}
	
	public function getTableData($section_table, $count, $offset) {
		$l = $this->getL($count, $offset);
		$query = "SELECT `".$this->table_name."`.`num`,
		`".$this->table_name."`.`section_id`,
		`".$this->table_name."`.`img`,
		`".$this->table_name."`.`title`,
		`".$this->table_name."`.`model`,
		`".$this->table_name."`.`price`,
		`".$this->table_name."`.`description`,
		`".$this->table_name."`.`date`,
		`".$this->table_name."`.`frame`,
		`$section_table`.`title` as `section`
		FROM `".$this->table_name."`
		INNER JOIN `$section_table` ON `$section_table`.`num` = `".$this->table_name."`.`section_id`
		ORDER BY `section_id`,`num` $l";
		return $this->transform($this->db->select($query));
	}
	
	protected function transformElement($product) {
		$product["img"] = $this->config->address.$this->config->dir_img_products.$product["img"];
		$product["imgs"] = $this->config->address.$this->config->dir_img_images.$product["imgs"];
		$product["link"] = $this->url->product($product["num"]);
		$product["link_cart"] = $this->url->addCart($product["num"]);
		$product["description"] = str_replace("\n", "<br />", $product["description"]);
		$product["img_description"] = str_replace("\n", "<br />", $product["img_description"]);
		$product["link_delete"] = $this->url->deleteCart($product["num"]);
		$product["link_admin_edit"] = $this->url->adminEditProduct($product["num"]);
		$product["link_admin_delete"] = $this->url->adminDeleteProduct($product["num"]);
		$product["date"] = $this->format->date($product["date"]);
		return $product;
	}
	
	private function checkSortUp($sort, $up) {
		return ((($sort === "title") || ($sort === "price")) && (($up === "1") || ($up === "0")));
	}
	
	public function getAllOnSectionID($section_id, $sort, $up) {
		if (!$this->checkSortUp($sort, $up)) return $this->transform($this->getAllOnField("section_id", $section_id));
		return $this->transform($this->getAllOnField("section_id", $section_id, $sort, $up));
	}
	
	public function getAllSort($sort, $up, $count) {
		if (!$this->checkSortUp($sort, $up)) return $this->getAllData($count);
		$l = $this->getL($count, 0);
		$desc = "";
		if (!$up) $desc = "DESC";
		$query = "SELECT * FROM 
			(SELECT * FROM `".$this->table_name."` ORDER BY `date` DESC $l) a
			ORDER BY `$sort` $desc";
		return $this->transform($this->db->select($query));
	}
	
	public function get($num, $section_table) {
		if (!$this->check->num($num)) return false;
		$query = "SELECT `".$this->table_name."`.`num`,
		`".$this->table_name."`.`section_id`,
		`".$this->table_name."`.`img`,
		`".$this->table_name."`.`title`,
		`".$this->table_name."`.`model`,
		`".$this->table_name."`.`price`,
		`".$this->table_name."`.`description`,
		`".$this->table_name."`.`frame`,
		`$section_table`.`title` as `section`
		FROM `".$this->table_name."`
		INNER JOIN `$section_table` ON `$section_table`.`num` = `".$this->table_name."`.`section_id`
		WHERE `".$this->table_name."`.`num` = ".$this->config->sym_query;
		return $this->transform($this->db->selectRow($query, array($num)));
	}
	
	public function getAllOnIDs($ids) {
		$query_ids = "";
		$params = array();
		for ($i = 0; $i < count($ids); $i++) {
			$query_ids .= $this->config->sym_query.",";
			$params[] = $ids[$i];
		}
		$query_ids = substr($query_ids, 0, -1);
		$query = "SELECT * FROM `".$this->table_name."` WHERE `num` IN ($query_ids)";
		return $this->transform($this->db->select($query, $params));
	}
	
	public function getPriceOnIDs($ids) {
		$products = $this->getAllOnIDs($ids);
		$result = array();
		for ($i = 0; $i < count($products); $i++) {
			$result[$products[$i]["num"]] = $products[$i]["price"];
		}
		$summa = 0;
		for ($i = 0; $i < count($ids); $i++) {
			$summa += $result[$ids[$i]];
		}
		return $summa;
	}
	
	public function getOthers($product_info, $count) {
		$l = $this->getL($count, 0);
		$query = "SELECT * FROM `".$this->table_name."` WHERE `num` != ".$this->config->sym_query." ORDER BY `num` $l";
		return $this->transform($this->db->select($query, array($product_info["num"])));
	}
	
	public function getDate($num) {
		return $this->getFieldOnID($num, "date");
	}
	
	public function getImg($num) {
		return $this->getFieldOnID($num, "img");
	}
	
	public function search($q, $sort, $up) {
		if (!$this->checkSortUp($sort, $up)) return $this->transform(parent::search($q, array("title", "description", "frame")));
		return $this->transform(parent::search($q, array("title", "description", "frame"), $sort, $up));
	}
	
	protected function checkData($data) {
		if (!$this->check->num($data["section_id"])) return "UNKNOWN_ERROR";
		if (!$this->check->title($data["title"])) return "ERROR_TITLE";
		if (!$this->check->amount($data["price"])) return "ERROR_PRICE";
		if (!$this->check->text($data["description"])) return "ERROR_DESCRIPTION";
		// if (!$this->check->text($data["frame"])) return "ERROR_DESCRIPTION";
		if (!$this->check->title($data["img"])) return "ERROR_IMG";
		if (!$this->check->ts($data["date"])) return "UNKNOWN_ERROR";
		return true;
	}

	public function getComment($num, $comment_table) {
		if (!$this->check->num($num)) return false;
		$query = "SELECT
		`$comment_table`.`comment`,
		`$comment_table`.`date`,
		`$comment_table`.`name`
		FROM `".$this->table_name."`
		INNER JOIN `$comment_table` ON `$comment_table`.`product_id` = `".$this->table_name."`.`num`
		WHERE `".$this->table_name."`.`num` = ".$this->config->sym_query." ORDER BY `date` DESC";
		return $this->transform($this->db->select($query, array($num)));
	}
	
	public function getImages($num, $image_table) {
		if (!$this->check->num($num)) return false;
		$query = "SELECT
		`$image_table`.`imgs`,
		`$image_table`.`img_title`,
		`$image_table`.`img_description`
		FROM `".$this->table_name."`
		INNER JOIN `$image_table` ON `$image_table`.`product_id` = `".$this->table_name."`.`num`
		WHERE `".$this->table_name."`.`num` = ".$this->config->sym_query." ORDER BY `img_title`";
		return $this->transform($this->db->select($query, array($num)));
	}
	
	public function getID($num) {
		return $this->transform(parent::get($num));
	}

}

?>