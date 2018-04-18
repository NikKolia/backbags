<?php
require_once "manage_class.php";
require_once "urladmin_class.php";
require_once "auth_class.php";
require_once "section_class.php";

class ManageAdmin extends Manage {
	
	private $url_admin;
	private $section;
	
	public function __construct() {
		parent::__construct();
		$this->url_admin = new URLAdmin();
		$this->section = new Section();
	}
	
	public function auth() {
		$auth = new Auth();
		$_SESSION["login"] = $this->data["login"];
		$_SESSION["password"] = $this->format->hash($this->data["password"]);
		if ($auth->checkAdmin($_SESSION["login"], $_SESSION["password"])) return $this->data["r"];
		else return $this->sm->message("ERROR_AUTH");
	}
	
	public function logout() {
		unset($_SESSION["login"]);
		unset($_SESSION["password"]);
	}
	
	public function dataProduct() {
		$temp_data = array();
		$temp_data["section_id"] = $this->data["section_id"];
		$temp_data["title"] = $this->data["pr_title"];
		$temp_data["model"] = $this->data["model"];
		$temp_data["price"] = $this->data["price"];
		$temp_data["description"] = $this->data["description"];
		$temp_data["frame"] = $this->data["frame"];
		return $temp_data;
	}
	
	public function addProduct() {
		$temp_data = $this->dataProduct();
		$temp_data["date"] = $this->format->ts();
		$img = $this->loadImage();
		if (!$img) return false;
		$temp_data["img"] = $img;
		if ($this->product->add($temp_data)) {
			$this->sm->message("SUCCESS_ADD_PRODUCT");
			return $this->url_admin->products();
		}
		// else return false;
		else unlink("../".$this->config->dir_img_products.$img);
	}
	
	public function editProduct() {
		$temp_data = $this->dataProduct();
		$temp_data["date"] = $this->product->getDate($this->data["num"]);
		$img = $_FILES["img"];
		$old_img = $this->product->getImg($this->data["num"]);
		if (!$img["name"]) $temp_data["img"] = $old_img;
		else {
			unlink("../".$this->config->dir_img_products.$old_img);
			$img = $this->loadImage();
			if (!$img) return false;
			$temp_data["img"] = $img;
		}
		if ($this->product->edit($this->data["num"], $temp_data)) {
			$this->sm->message("SUCCESS_EDIT_PRODUCT");
			return $this->url_admin->products();
		}
		else return false;
	}
	
	public function deleteProduct() {
		$img = $this->product->getImg($this->data["num"]);
		unlink("../".$this->config->dir_img_products.$img);
		if ($this->product->delete($this->data["num"])) return $this->sm->message("SUCCESS_DELETE_PRODUCT");
		else return $this->sm->unknownError();
	}	
	
	public function addImage() {
		$temp_data = $this->dataImage();
		$temp_data["date"] = $this->format->ts();
		$img = $this->loadImages();
		if (!$img) return false;
		$temp_data["imgs"] = $img;
		if ($this->image->add($temp_data)) {
			$this->sm->message("SUCCESS_ADD_IMAGE");
			return $this->url_admin->images();
		}
		// else return false;
		else unlink("../".$this->config->dir_img_images.$img);
	}
	
	public function editImage() {
		$temp_data = $this->dataImage();
		$temp_data["date"] = $this->image->getDate($this->data["num"]);
		$img = $_FILES["imgs"];
		$old_img = $this->image->getImages($this->data["num"]);
		if (!$img["name"]) $temp_data["imgs"] = $old_img;
		else {
			unlink("../".$this->config->dir_img_images.$old_img);
			$img = $this->loadImages();
			if (!$img) return false;
			$temp_data["imgs"] = $img;
		}
		if ($this->image->edit($this->data["num"], $temp_data)) {
			$this->sm->message("SUCCESS_EDIT_IMAGE");
			return $this->url_admin->images();
		}
		else return false;
	}
	
	public function deleteImage() {
		$img = $this->image->getImages($this->data["num"]);
		unlink("../".$this->config->dir_img_images.$img);
		if ($this->image->delete($this->data["num"])) return $this->sm->message("SUCCESS_DELETE_IMAGE");
		else return $this->sm->unknownError();
	}
	
	public function dataImage() {
		$temp_data = array();
		$temp_data["product_id"] = $this->data["product_id"];
		$temp_data["img_title"] = $this->data["img_title"];
		$temp_data["img_description"] = $this->data["img_description"];
		return $temp_data;
	}
	
	private function loadImage() {
		$img = $_FILES["img"];
		if (!$img["name"]) return $this->sm->message("ERROR_IMG");
		if (!$this->isSecure($img)) return false;
		$uploadfile = "../".$this->config->dir_img_products.$img["name"];
		if (file_exists($uploadfile)) return $this->sm->message("ERROR_EXISTS_IMG");
		if (move_uploaded_file($img["tmp_name"], $uploadfile)) return $img["name"];
		else return $this->sm->unknownError();
	}
	
	private function loadImages() {
		$img = $_FILES["imgs"];
		if (!$img["name"]) return $this->sm->message("ERROR_IMG");
		if (!$this->isSecure($img)) return false;
		$uploadfile = "../".$this->config->dir_img_images.$img["name"];
		if (file_exists($uploadfile)) return $this->sm->message("ERROR_EXISTS_IMG");
		if (move_uploaded_file($img["tmp_name"], $uploadfile)) return $img["name"];
		else return $this->sm->unknownError();
	}
	
	private function loadInfos() {
		$img = $_FILES["infoimgs"]; 
		if (!$img["name"]) return $this->sm->message("ERROR_IMG");
		if (!$this->isSecure($img)) return false;
		$uploadfile = "../".$this->config->dir_img_infos.$img["name"];
		if (file_exists($uploadfile)) return $this->sm->message("ERROR_EXISTS_IMG");
		if (move_uploaded_file($img["tmp_name"], $uploadfile)) return $img["name"];
		else return $this->sm->unknownError();
	}
	
	public function dataInfo() {
		$temp_data = array();
		$temp_data["section_id"] = $this->data["section_id"];
		$temp_data["infoimg_title"] = $this->data["infoimg_title"];
		$temp_data["infoimg_description"] = $this->data["infoimg_description"];
		return $temp_data;
	}
	
	public function addInfo() {
		$temp_data = $this->dataInfo();
		$temp_data["date"] = $this->format->ts();
		$img = $this->loadInfos();
		if (!$img) return false;
		$temp_data["infoimgs"] = $img;
		if ($this->info->add($temp_data)) {
			$this->sm->message("SUCCESS_ADD_INFO");
			return $this->url_admin->infos();
		}
		// else return false;
		else unlink("../".$this->config->dir_img_infos.$img);
	}
	
	public function deleteInfo() {
		$img = $this->info->getInfos($this->data["num"]);
		unlink("../".$this->config->dir_img_infos.$img);
		if ($this->info->delete($this->data["num"])) return $this->sm->message("SUCCESS_DELETE_INFO");
		else return $this->sm->unknownError();
	}
	
	public function editInfo() {
		$temp_data = $this->dataInfo();
		$temp_data["date"] = $this->info->getDate($this->data["num"]);
		$img = $_FILES["infoimgs"];
		$old_img = $this->info->getInfos($this->data["num"]);
		if (!$img["name"]) $temp_data["infoimgs"] = $old_img;
		else {
			unlink("../".$this->config->dir_img_infos.$old_img);
			$img = $this->loadInfos();
			if (!$img) return false;
			$temp_data["infoimgs"] = $img;
		}
		if ($this->info->edit($this->data["num"], $temp_data)) {
			$this->sm->message("SUCCESS_EDIT_INFO");
			return $this->url_admin->infos();
		}
		else return false;
	}
	
	private function isSecure($img) {
		$blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
		foreach ($blacklist as $item)
			if (preg_match("/$item\$/i", $img["name"])) return false;
		$type = $img["type"];
		$size = $img["size"];
		if (($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/png") && ($type != "image/gif")) return $this->sm->message("ERROR_TYPE_IMG");
		if ($size > $this->config->max_size_img) return $this->sm->message("ERROR_SIZE_IMG");
		return true;
	}
	
	public function addSection() {
		$temp_data = array();
		$temp_data["title"] = $this->data["sec_title"];
		if ($this->section->add($temp_data)) {
			$this->sm->message("SUCCESS_ADD_SECTION");
			return $this->url_admin->sections();
		}
		else return false;
	}
	
	public function editSection() {
		$temp_data = array();
		$temp_data["title"] = $this->data["sec_title"];
		if ($this->section->edit($this->data["num"], $temp_data)) {
			$this->sm->message("SUCCESS_EDIT_SECTION");
			return $this->url_admin->sections();
		}
		else return false;
	}
	
	public function deleteSection() {
		if ($this->section->delete($this->data["num"])) return $this->sm->message("SUCCESS_DELETE_SECTION");
		else return $this->sm->unknownError();
	}
	
	public function addOrder() {
		$temp_data = $this->dataOrder();
		$temp_data["date_order"] = $this->format->ts();
		if ($this->data["is_send"] != 0) $temp_data["date_send"] = $this->format->ts();
		else $temp_data["date_send"] = 0;
		if ($this->data["is_pay"] != 0) $temp_data["date_pay"] = $this->format->ts();
		else $temp_data["date_pay"] = 0;
		if ($this->order->add($temp_data)) {
			$this->sm->message("SUCCESS_ADD_ORDER");
			return $this->url_admin->orders();
		}
		else return false;
	}
	
	public function editOrder() {
		$temp_data = $this->dataOrder();
		$temp_data["date_order"] = $this->order->getDateOrder($this->data["num"]);
		$date_send = $this->order->getDateOrder($this->data["num"]);
		$date_pay = $this->order->getDatePay($this->data["num"]);
		if (($this->data["is_send"]) && ($date_send == 0)) $temp_data["date_send"] = $this->format->ts();
		else $temp_data["date_send"] = $date_send;
		if (($this->data["is_pay"]) && ($date_pay == 0)) $temp_data["date_pay"] = $this->format->ts();
		else $temp_data["date_pay"] = $date_pay;
		if ($this->order->edit($this->data["num"], $temp_data)) {
			$this->sm->message("SUCCESS_EDIT_ORDER");
			return $this->url_admin->orders();
		}
		else return false;
	}
	
	public function deleteOrder() {
		if ($this->order->delete($this->data["num"])) return $this->sm->message("SUCCESS_DELETE_ORDER");
		else return $this->sm->unknownError();
	}
	
	private function dataOrder() {
		$temp_data = array();
		$temp_data["delivery"] = $this->data["delivery"];
		$temp_data["price"] = $this->data["price"];
		$temp_data["name"] = $this->data["name"];
		$temp_data["phone"] = $this->data["phone"];
		$temp_data["email"] = $this->data["email"];
		$temp_data["address"] = $this->data["address"];
		$temp_data["notice"] = $this->data["notice"];
		$i = 0;
		$temp_data["product_ids"] = "";
		while (true) {
			$num = $this->data["products_$i"];
			if ($num) {
				for ($j = 0; $j < $this->data["count_$i"]; $j++) {
					$product_ids .= "$num,";
				}
			}
			else break;
			$i++;
		}
		if ($product_ids) $temp_data["product_ids"] = substr($product_ids, 0, -1);
		$_SESSION["product_ids"] = $temp_data["product_ids"];
		return $temp_data;
	}
	
	public function addDiscount() {
		$temp_data = $this->dataDiscount();
		if ($this->discount->add($temp_data)) {
			$this->sm->message("SUCCESS_ADD_DISCOUNT");
			return $this->url_admin->discounts();
		}
		else return false;
	}
	
	public function editDiscount() {
		$temp_data = $this->dataDiscount();
		if ($this->discount->edit($this->data["num"], $temp_data)) {
			$this->sm->message("SUCCESS_EDIT_DISCOUNT");
			return $this->url_admin->discounts();
		}
		else return false;
	}
	
	public function deleteDiscount() {
		if ($this->discount->delete($this->data["num"])) return $this->sm->message("SUCCESS_DELETE_DISCOUNT");
		else return $this->sm->unknownError();
	}
	
	private function dataDiscount() {
		$temp_data = array();
		$temp_data["code"] = $this->data["code"];
		$temp_data["value"] = $this->data["value"];
		if ($this->discount->getOnCode($this->data["code"])) $this->sm->message("ERROR_DISCOUNT_EXISTS");
		return $temp_data;
	}
	
	public function dataComment() {
		$temp_data = array();
		$temp_data["product_id"] = $this->data["product_id"];
		$temp_data["email"] = $this->data["email"];
		$temp_data["name"] = $this->data["name"];
		$temp_data["comment"] = $this->data["comment"];
		return $temp_data;
	}
	
	public function addComment() {
		$temp_data = $this->dataComment();
		$temp_data["date"] = $this->format->ts();
		if ($this->comment->add($temp_data)) {
			$this->sm->message("SUCCESS_ADD_COMMENT");
			return $this->url_admin->comments();
		}
		else return false;
	}
	
	public function editComment() {
		$temp_data = $this->dataComment();
		$temp_data["date"] = $this->format->ts();
		if ($this->comment->edit($this->data["num"], $temp_data)) {
			$this->sm->message("SUCCESS_EDIT_COMMENT");
			return $this->url_admin->comments();
		}
		else return false;
	}
	
		public function deleteComment() {
		if ($this->comment->delete($this->data["num"])) return $this->sm->message("SUCCESS_DELETE_COMMENT");
		else return $this->sm->unknownError();
	}
	
	public function dataVideo() {
		$temp_data = array();
		$temp_data["section_id"] = $this->data["section_id"];
		$temp_data["sec_videos"] = $this->data["sec_videos"];
		$temp_data["video_title"] = $this->data["video_title"];
		$temp_data["video_desc"] = $this->data["video_desc"];
		return $temp_data;
	}
	
	public function addVideo() {
		$temp_data = $this->dataVideo();
		$temp_data["date"] = $this->format->ts();
		if ($this->video->add($temp_data)) {
			$this->sm->message("SUCCESS_ADD_VIDEO");
			return $this->url_admin->videos();
		}
		else return false;
	}
	
	public function editVideo() {
		$temp_data = $this->dataVideo();
		$temp_data["date"] = $this->format->ts();
		if ($this->video->edit($this->data["num"], $temp_data)) {
			$this->sm->message("SUCCESS_EDIT_VIDEO");
			return $this->url_admin->videos();
		}
		else return false;
	}
	
		public function deleteVideo() {
		if ($this->video->delete($this->data["num"])) return $this->sm->message("SUCCESS_DELETE_VIDEO");
		else return $this->sm->unknownError();
	}
	
	public function dataModel() {
		$temp_data = array();
		$temp_data["model"] = $this->data["model"];
		return $temp_data;
	}
	
	public function addmodel() {
		$temp_data = $this->datamodel();
		$temp_data["date"] = $this->format->ts();
		$img = $this->loadModelImg();
		if (!$img) return false;
		$temp_data["model_img"] = $img;
		if ($this->model->add($temp_data)) {
			$this->sm->message("SUCCESS_ADD_MODEL");
			return $this->url_admin->models();
		}
		// else return false;
		else unlink("../".$this->config->dir_img_models.$img);
	}
	
	public function editModel() {
		$temp_data = $this->dataModel();
		$temp_data["date"] = $this->model->getDate($this->data["num"]);
		$img = $_FILES["model_img"];
		$old_img = $this->model->getModelImg($this->data["num"]);
		if (!$img["name"]) $temp_data["model_img"] = $old_img;
		else {
			unlink("../".$this->config->dir_img_models.$old_img);
			$img = $this->loadModelImg();
			if (!$img) return false;
			$temp_data["model_img"] = $img;
		}
		if ($this->model->edit($this->data["num"], $temp_data)) {
			$this->sm->message("SUCCESS_EDIT_POST");
			return $this->url_admin->models();
		}
		else return false;
	}
	
	public function deleteModel() {
		$model = $this->model->getModelImg($this->data["num"]);
		unlink("../".$this->config->dir_img_models.$model);
		if ($this->model->delete($this->data["num"])) return $this->sm->message("SUCCESS_DELETE_MODEL");
		else return $this->sm->unknownError();
	}	
	
	private function loadModelImg() {
		$img = $_FILES["model_img"];
		if (!$img["name"]) return $this->sm->message("ERROR_IMG");
		if (!$this->isSecure($img)) return false;
		$uploadfile = "../".$this->config->dir_img_models.$img["name"];
		if (file_exists($uploadfile)) return $this->sm->message("ERROR_EXISTS_IMG");
		if (move_uploaded_file($img["tmp_name"], $uploadfile)) return $img["name"];
		else return $this->sm->unknownError();
	}

}

?>