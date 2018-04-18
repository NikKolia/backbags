<?php
require_once "modules_class.php";

class AddCommentContent extends Modules {
	
	protected $title = "Ваша запись добавлена";
	protected $meta_desc = "Ваша запись добавлена.";
	protected $meta_key = "отзыв добавлен, комментарий добавлен, вопрос добавлен";
	
	protected function getContent() {
		$this->template->set("num", $this->data["product_id"]);
		return "addcomment";
	}
	
}

?>