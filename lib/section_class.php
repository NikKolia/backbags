<?php
require_once "global_class.php";

class Section extends GlobalClass {
	
	public function __construct() {
		parent::__construct("sections");
	}
	
	public function getAllData() {
		return $this->transform($this->getAllid("num"));
	}
	
	public function getTableData($count, $offset) {
		return $this->transform($this->getAll("num", true, $count, $offset));
	}
	
	public function get($num) {
		return $this->transform(parent::get($num));
	}
	
	protected function transformElement($section) {
		$section["infoimg_description"] = str_replace("\n", "<br />", $section["infoimg_description"]);
		$section["video_desc"] = str_replace("\n", "<br />", $section["video_desc"]);
		$section["infoimgs"] = $this->config->address.$this->config->dir_img_infos.$section["infoimgs"];
		$section["link"] = $this->url->section($section["num"]);
		$section["link_admin_edit"] = $this->url->adminEditSection($section["num"]);
		$section["link_admin_delete"] = $this->url->adminDeleteSection($section["num"]);
		return $section;
	}
	
	protected function checkData($data) {
		if (!$this->check->title($data["title"])) return "ERROR_TITLE";
		return true;
	}
	
	public function getInfoses($num, $info_table) {
		if (!$this->check->num($num)) return false;
		$query = "SELECT
		`$info_table`.`infoimgs`,
		`$info_table`.`infoimg_title`,
		`$info_table`.`infoimg_description`
		FROM `".$this->table_name."`
		INNER JOIN `$info_table` ON `$info_table`.`section_id` = `".$this->table_name."`.`num`
		WHERE `".$this->table_name."`.`num` = ".$this->config->sym_query." ORDER BY `infoimg_title`";
		return $this->transform($this->db->select($query, array($num)));
	}
	
	public function getVideos($num, $video_table) {
		if (!$this->check->num($num)) return false;
		$query = "SELECT
		`$video_table`.`sec_videos`,
		`$video_table`.`video_title`,
		`$video_table`.`video_desc`
		FROM `".$this->table_name."`
		INNER JOIN `$video_table` ON `$video_table`.`section_id` = `".$this->table_name."`.`num`
		WHERE `".$this->table_name."`.`num` = ".$this->config->sym_query." ORDER BY `video_title`";
		return $this->transform($this->db->select($query, array($num)));
	}
	
}

?>