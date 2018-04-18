<?php
require_once "global_class.php";

class Video extends GlobalClass {
	
	public function __construct() {
		parent::__construct("videos");
	}
	
	public function getAllData($count) {
		return $this->transform($this->getAll("date", false, $count));
	}
	
	public function getAllTable() {
		return $this->getAll("num");
	}
	
	public function getTableData($section_table, $count, $offset) {
		$l = $this->getL($count, $offset);
		$query = "SELECT `".$this->table_name."`.`num`,
		`".$this->table_name."`.`section_id`,
		`".$this->table_name."`.`sec_videos`,
		`".$this->table_name."`.`video_title`,
		`".$this->table_name."`.`video_desc`,
		`".$this->table_name."`.`date`,
		`$section_table`.`title` as `section`
		FROM `".$this->table_name."`
		INNER JOIN `$section_table` ON `$section_table`.`num` = `".$this->table_name."`.`section_id`
		ORDER BY `section_id`,`video_title` $l";
		return $this->transform($this->db->select($query));
	}
	
	protected function transformElement($video) {
		// $video["video_desc"] = str_replace("\n", "<br />", $video["ivideo_desc"]);
		$video["link_admin_edit"] = $this->url->adminEditVideo($video["num"]);
		$video["link_admin_delete"] = $this->url->adminDeleteVideo($video["num"]);
		$video["date"] = $this->format->date($video["date"]);
		return $video;
	}
	
	public function get($num, $section_table) {
		if (!$this->check->num($num)) return false;
		$query = "SELECT `".$this->table_name."`.`num`,
		`".$this->table_name."`.`section_id`,
		`".$this->table_name."`.`sec_videos`,
		`".$this->table_name."`.`video_title`,
		`".$this->table_name."`.`video_desc`,
		`".$this->table_name."`.`date`,
		`$section_table`.`title` as `section`
		FROM `".$this->table_name."`
		INNER JOIN `$section_table` ON `$section_table`.`num` = `".$this->table_name."`.`section_id`
		WHERE `".$this->table_name."`.`num` = ".$this->config->sym_query;
		return $this->transform($this->db->selectRow($query, array($num)));
	}
	
	protected function checkData($data) {
		if (!$this->check->num($data["section_id"])) return "UNKNOWN_ERROR";
		if (!$this->check->num($data["video_title"])) return "ERROR_IMG_TITLE";
		if (!$this->check->text($data["video_desc"], true)) return "ERROR_DESCRIPTION";
		if (!$this->check->text($data["sec_videos"])) return "ERROR_IMG";
		if (!$this->check->ts($data["date"])) return "UNKNOWN_ERROR";
		return true;
	}
	
	public function getDate($num) {
		return $this->getFieldOnID($num, "date");
	}
	
	public function getVideos($num) {
		return $this->getFieldOnID($num, "sec_videos");
	}
	
}

?>