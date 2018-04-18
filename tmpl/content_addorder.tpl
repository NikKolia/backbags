<div class="row">
	<div class="col-md-12 addorder">		
		<div id="message">
			<?php include "message.tpl"; ?>
			<h2>Ваш заказ принят!</h2>
			<p>Сообщение с информацией о заказе отправлено на указанный Вами электронный адрес.</p> 
			<p>Мы перезвоним Вам в ближайшее время для подтверждения заказа.</p>
			<p>Номер заказа - №<?=$this->num?></p>
			<p>Стоимость заказа: <?=$this->price?> грн.</p>
			<form id="payment" name="payment" method="post" action="https://sci.interkassa.com/" enctype="utf-8">
				<input type="hidden" name="ik_co_id" value="59d474933c1eaf7e2e8b4569" />
				<input type="hidden" name="ik_pm_no" value="<?=$this->num?>" />
				<input type="hidden" name="ik_am" value="<?=$this->price?>" />
				<input type="hidden" name="ik_cur" value="UAH" />
				<input type="hidden" name="ik_desc" value="Оплата заказа №<?=$this->num?>" />
				<input type="hidden" name="ik_cli" value="<?=$_SESSION["email"]?>" />
				<input type="hidden" name="ik_suc_u" value="http://bag.zahist.club/" />
				<input type="hidden" name="ik_fal_u" value="http://bag.zahist.club/cart" />
				<input type="hidden" name="ik_pnd_u" value="http://bag.zahist.club/" />
				<input type="hidden" name="ik_loc" value="ru" />
				<input type="hidden" name="ik_enc" value="utf-8" />
				<input type="submit" value="Оплатить WebMoney">
			</form>
		</div>	
		<div id="pm">
			<p><!-- begin WebMoney Transfer : accept label -->
				<a href="https://www.megastock.com/" target="_blank"><img src="img/wm.png" alt="www.megastock.com" /></a>
				<!-- end WebMoney Transfer : accept label -->
				
				<!-- webmoney passport label#7E7EE140-7132-4D51-8171-679FFD5511BF begin -->
				<a href="//passport.webmoney.ru/asp/certview.asp?wmid=396988135932" target="_blank">
				<img src="img/wm_at.png" alt="Здесь находится аттестат нашего WM идентификатора 396988135932">
				</a> 
				<!-- webmoney passport label#7E7EE140-7132-4D51-8171-679FFD5511BF end -->

				<a href="https://www.interkassa.com/" target="_blank"><img src="img/interkassa.png" alt="www.interkassa.com" /></a>
			</p>
		</div>
		<div>
			<p><a href="<?=$this->link_oferta?>">ПУБЛИЧНАЯ ОФЕРТА</a></p>
		</div>
	</div>
</div>