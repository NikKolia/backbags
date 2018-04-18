<div class="row">
	<div class="col-md-12">			
		<div id="cart">
			<h2>Оформление заказа</h2>
			<?php include "message.tpl"; ?>
			<div class="table-responsive border">
				<form name="cart" action="<?=$this->action?>" method="post">
					<table class="table table-striped table-condensed centering" id="carttable">
						<thead>
							<tr class="info">
								<th></th>
								<th>Товар</th>
								<th>Цена</th>
								<th>Количество</th>
								<th>Стоимость</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php for ($i = 0; $i < count($this->cart); $i++) { ?>
								<tr class="cart_row">
									<td class="img">
										<img src="<?=$this->cart[$i]["img"]?>" alt="<?=$this->cart[$i]["title"]?>" />
									</td>
									<td class="title"><?=$this->cart[$i]["title"]?><br />(Код товара: <?=$this->cart[$i]["num"]?>)</td>
									<td><?=$this->cart[$i]["price"]?> грн.</td>
									<td>
										<table class="count">
											<tr>
												<td>
													<input type="image" src="img/cart_recalc.png" alt="Пересчитать" onmouseover="this.src='img/cart_recalc_active.png'" onmouseout="this.src='img/cart_recalc.png'" />
												</td>
												<td>
													<input type="text" name="count_<?=$this->cart[$i]["num"]?>" value="<?=$this->cart[$i]["count"]?>" />
												</td>
												<td>шт.</td>
											</tr>
										</table>
									</td>
									<td><?=$this->cart[$i]["summa"]?> грн.</td>
									<td>
										<a href="<?=$this->cart[$i]["link_delete"]?>" class="link_delete">x удалить</a>
									</td>
								</tr>
							<?php } ?>
							<tr class="warning" id="discount">
								<td colspan="2">Введите номер купона со скидкой<br /><span>(если есть)</span></td>
								<td colspan="2">
									<input type="text" name="discount" value="<?=$this->discount?>" />
								</td>
								<td colspan="2">
									<input type="hidden" name="func" value="cart" />
									<button type="submit" class="calc">Пересчитать</button>
								</td>
							</tr>
							<tr class="success" id="summa">
								<td colspan="6">
									<p>Итого <?php if ($this->discount) { ?>(с учётом скидки)<?php }?>: <span><?=$this->summa?> грн.</span></p>
								</td>
							</tr>
						</tbody>		
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">		
		<div id="order">
			<form name="order" action="<?=$this->action?>" method="post">
				<table class="centering border">
					<tr>
						<td class="w120 right">Ваше имя и фамилия:<span style="color: #BA0000; font-weight: bold;">*</span></td>
						<td>
							<input type="text" name="name" value="<?=$this->name?>" placeholder="Введите Имя и Фамилию..." required pattern="[^0-9]{2,}" title="Введите Имя" />
						</td>
					</tr>
					<tr>
						<td class="ordertel right">Ваш номер телефона:<span style="color: #BA0000; font-weight: bold;">*</span></td>
						<td>
							<input type="text" name="phone" value="<?=$this->phone?>" placeholder="Введите номер телефона..." required pattern="^((8|\+[0-9])[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{6,15}$" title="Введите номер телефона"/>
						</td>
					</tr>
					<tr>
						<td class="ordermail right">Ваш E-mail:<span style="color: #BA0000; font-weight: bold;">*</span></td>
						<td>
							<input type="text" name="email" value="<?=$this->email?>" placeholder="Введите E-Mail..." required pattern="\S+@[a-z]+.[a-z]+" title="Введите E-Mail"/>
						</td>
					</tr>
					<tr>
						<td class="orderdeliv right">Способ доставки:<span style="color: #BA0000; font-weight: bold;">*</span></td>
						<td>
							<select name="delivery" onchange="changeDelivery(this)" required>
								<option value="">выберите, пожалуйста...</option>
								<option value="0" <?php if ($this->delivery == "0") { ?>selected="selected"<?php }?>>В отделение "Новой почты"</option>
								<option value="1" <?php if ($this->delivery == "1") { ?>selected="selected"<?php }?>>Курьерская доставка</option>
							</select>
						</td>
					</tr>
					<tr>
						<td id="address" colspan="2">
							<p>Укажите город и номер отделение "Новой почты" или данные<br />для курьерской доставки (город, контактный телефон, Ф.И.О.):<span style="color: #BA0000; font-weight: bold;">*</span></p>
							<textarea name="address" rows="3" required><?=$this->address?></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<p>Дополнительная информация к заказу:</p>
							<textarea name="notice" rows="2"><?=$this->notice?></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2" id="butorder">
							<input type="hidden" name="func" value="order" />
							<button class="button" type="submit">Оформить заказ</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 deliv">
		<div class="deliv">
			<p>Доставка заказанного товара осуществляется удобным для Вас способом.<br />
 			Способ доставки уточняется менеджером при подтверждении заказа.<br />
			Это может быть доставка в отделение или курьерская доставка.</p>
		</div>
		<div class="deliv"><p>Ориентировочную дата прибытия Вашего заказа поможет узнать следующий сервис: <a href="https://novaposhta.ua/ru/onlineorder/estimatedate">сроки доставки.</a></p></div>
		<div class="deliv">
			<p>Ориентировочную стоимость доставки Вашего заказа поможет узнать следующий сервис: <a href="https://novaposhta.ua/ru/delivery">стоимость доставки.</a><br />
			Напоминаем, что на период действия акции, доставку товара оплачивает компания "AspenSport".<br />
			При получении заказанного товара Вы оплачиваете цену указанную на сайте при оформлении заказа.</p> 
		</div>
		<p class="imgdeliv">
			<img src="img/delivery.png" alt="Доставка бесплатно!" />
		</p>		
	</div>
</div>	