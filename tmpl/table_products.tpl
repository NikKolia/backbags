<div class="row">
	<div class="col-md-12">
		<div class="products">
			<?php for ($i = 0; $i < count($this->products); $i++) { ?>
				<div class="intro_product">
					<p class="img">
						<a href="<?=$this->products[$i]["link"]?>"><img src="<?=$this->products[$i]["img"]?>" alt="<?=$this->products[$i]["title"]?>" /></a>
					</p>
					<p class="loop">
						<a href="<?=$this->products[$i]["link"]?>"><img src="img/loop.png" class="img-responsive" alt="Loop" /></a>
					</p>
					<p class="title">
						<a href="<?=$this->products[$i]["link"]?>">Модель 10<?=$this->products[$i]["section_id"]?> (код:<?=$this->products[$i]["num"]?>)</a>
					</p>
					<p class="model">
						<a href="<?=$this->products[$i]["link"]?>"><?=$this->products[$i]["title"]?></a>						
					</p>
					<p class="price"><?=$this->products[$i]["price"]?> грн.</p>
					<p class="bottom">
						<a class="link_cart" href="<?=$this->products[$i]["link_cart"]?>"></a>
					</p>
				</div>
			<?php } ?>
		</div>
	</div>
</div>