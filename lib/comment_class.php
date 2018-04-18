<?php
require_once "global_class.php";

class Comment extends GlobalClass {
	
	public function __construct() {
		parent::__construct("comments");
	}
	
	public function getAllTable() {
		return $this->getAll("num");
	}
	
	public function getTableData($product_table, $count, $offset) {
		$l = $this->getL($count, $offset);
		$query = "SELECT `".$this->table_name."`.`num`,
		`".$this->table_name."`.`product_id`,
		`".$this->table_name."`.`email`,
		`".$this->table_name."`.`name`,
		`".$this->table_name."`.`comment`,
		`".$this->table_name."`.`date`,
		`$product_table`.`title` as `product`
		FROM `".$this->table_name."`
		INNER JOIN `$product_table` ON `$product_table`.`num` = `".$this->table_name."`.`product_id`
		ORDER BY `product_id`,`date` $l";
		return $this->transform($this->db->select($query));
	}
	
	protected function transformElement($comment) {
		// $comment["comment"] = str_replace("\n", "<br />", $comment["comment"]);
		$comment["link_admin_edit"] = $this->url->adminEditComment($comment["num"]);
		$comment["link_admin_delete"] = $this->url->adminDeleteComment($comment["num"]);
		$comment["date"] = $this->format->date($comment["date"]);
		return $comment;
	}
	
	public function get($num, $product_table) {
		if (!$this->check->num($num)) return false;
		$query = "SELECT `".$this->table_name."`.`num`,
		`".$this->table_name."`.`product_id`,
		`".$this->table_name."`.`email`,
		`".$this->table_name."`.`name`,
		`".$this->table_name."`.`comment`,
		`".$this->table_name."`.`date`,
		`$product_table`.`title` as `product`
		FROM `".$this->table_name."`
		INNER JOIN `$product_table` ON `$product_table`.`num` = `".$this->table_name."`.`product_id`
		WHERE `".$this->table_name."`.`num` = ".$this->config->sym_query;
		return $this->transform($this->db->selectRow($query, array($num)));
	}
	
	protected function checkData($data) {
		if (!$this->check->num($data["product_id"])) return "UNKNOWN_ERROR";
		if (!$this->check->email($data["email"])) return "ERROR_EMAIL";
		if (!$this->check->name($data["name"], true)) return "ERROR_NAME";
		if (!$this->check->text($data["comment"])) return "ERROR_COMMENT";
		return true;
	}
	
	public function getDate($num) {
		return $this->getFieldOnID($num, "date");
	}
	
}

?>