<div class="row">
	<div class="col-md-12">		
		<div id="hornav" class="floatleft">
			<a href="<?=$this->index?>">Все товары</a>
			<img src="img/hornav_arrow.png" alt="" />
			<a href="<?=$this->link_models?>">Все модели</a>
			<img src="img/hornav_arrow.png" alt="" />
			<a href="<?=$this->link_section?>"><?=$this->product["section"]?></a>
			<img src="img/hornav_arrow.png" alt="" />
			Код товара:<?=$this->product["num"]?>
		</div>
	</div>
</div>
<?php include "message.tpl"; ?>	
<div class="row">
	<div class="col-md-12">
		<div class="prod_desc">
			<h2>Код товара: <?=$this->product["num"]?> (<?=$this->product["section"]?>)</h2>
			<p><?=$this->product["title"]?> <?=$this->product["model"]?></p>
			<p><?=$this->product["description"]?></p>
			<p class="price"><?=$this->product["price"]?> грн.</p>
			<a class="link_cart" href="<?=$this->product["link_cart"]?>"></a>
			<button>Отзывы и комментарии</button>
		</div>	
		<?php for ($i = 0; $i < count($this->images); $i++) { ?>
			<span oncontextmenu="return false;" ondragstart="return false;"><img src="<?=$this->images[$i]["imgs"]?>" class="img-responsive centering" alt="product image" /></span>
		<?php } ?>
		<div class="prod_desc_low">
			<p>Код товара: <?=$this->product["num"]?> (<?=$this->product["section"]?>)</p>
			<p><?=$this->product["title"]?> <?=$this->product["model"]?></p>
			<p><?=$this->product["description"]?></p>
			<p class="price"><?=$this->product["price"]?> грн.</p>
			<a class="link_cart" href="<?=$this->product["link_cart"]?>"></a>
			<button>Отзывы и комментарии</button>
		</div>
		<div>
			<p class="frame"><?=$this->product["frame"]?></p>
		</div>
		<div id="others">
			<h3>Вам также может понравиться:</h3>
			<div class="owl-carousel owl-theme">
				<?php for ($i = 0; $i < count($this->products); $i++) { ?>
					<div class="slide_item">
						<div class="intro_product">
							<p class="img">
								<a href="<?=$this->products[$i]["link"]?>"><img src="<?=$this->products[$i]["img"]?>" alt="<?=$this->products[$i]["title"]?>" /></a>
							</p>
							<p class="title">
								<a href="<?=$this->products[$i]["link"]?>"><?=$this->products[$i]["title"]?></a>
							</p>
							<p class="price"><?=$this->products[$i]["price"]?> грн.</p>
							<p>
								<a class="link_cart" href="<?=$this->products[$i]["link_cart"]?>"></a>
							</p>
						</div>
					</div>
				<?php } ?>
			</div>		
		</div>
		<div id="comment" class="target-el border">
			<h4>Отзывы и комментарии о товаре:</h4>
			<p>Код товара: <?=$this->product["num"]?> (<?=$this->product["section"]?>). <?=$this->product["title"]?></p>
			<p class="lowp"><?=$this->product["price"]?> грн.</p>
			<p>
				<a class="link_cart" href="<?=$this->product["link_cart"]?>"></a>
			</p>
			<?php include "message.tpl"; ?>
			<form name="comment" class="commentform centering bg-blue" action="<?=$this->action?>" method="post">
				<p id="low">Вы также можете оставить отзыв или комментарий об этом товаре:</p>
				<textarea class="border" name="comment" required><?=$this->comment?></textarea>
				<div class="row">
					<div class="col-md-4">	
						<p>Ваше имя:<span style="color: #BA0000; font-weight: bold;">*</span><br /><input type="text" class="border" name="name" value="<?=$this->name?>" placeholder="Введите Имя..." required title="Введите Имя" /></p>
					</div>
					<div class="col-md-4">
						<p>Ваш E-mail:<span style="color: #BA0000; font-weight: bold;">*</span><br /><input type="text" class="border" name="email" value="<?=$this->email?>" placeholder="Введите E-Mail..." required pattern="\S+@[a-z]+.[a-z]+" title="Введите E-Mail" /></p>
					</div>
					<div class="col-md-4">
						<input type="hidden" name="func" value="comment" />
						<input type="hidden" name="product_id" value="<?=$this->product_id?>" />
						<button type="submit">Отправить отзыв</button>
					</div>
				</div>	
			</form>
			<?php foreach ($this->comments as $data) { ?>
				<p class="comment"><?=$data["comment"]?></p>
				<p class="name"><?=$data["name"]?><span class="date"><?=$data["date"]?></span></p>					
			<?php } ?>
		</div>
	</div>
</div>