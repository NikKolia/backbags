<div class="row">
	<div class="col-md-12">		
		<div id="order">
			<h2>Оформление заказа</h2>
			<?php include "message.tpl"; ?>
			<form name="order" action="<?=$this->action?>" method="post">
				<table class="centering border">
					<tr>
						<td class="w120 right">Ваше имя и фамилия:<span style="color: #BA0000; font-weight: bold;">*</span></td>
						<td>
							<input type="text" name="name" value="<?=$this->name?>" placeholder="Введите Имя и Фамилию..." required pattern="[^0-9]{2,}" title="Введите Имя" />
						</td>
					</tr>
					<tr>
						<td class="right">Ваш номер телефона:<span style="color: #BA0000; font-weight: bold;">*</span></td>
						<td>
							<input type="text" name="phone" value="<?=$this->phone?>" placeholder="Введите номер телефона..." required pattern="^((8|\+[0-9])[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{6,15}$" title="Введите номер телефона"/>
						</td>
					</tr>
					<tr>
						<td class="right">Ваш E-mail:<span style="color: #BA0000; font-weight: bold;">*</span></td>
						<td>
							<input type="text" name="email" value="<?=$this->email?>" placeholder="Введите E-Mail..." required pattern="\S+@[a-z]+.[a-z]+" title="Введите E-Mail"/>
						</td>
					</tr>
					<tr>
						<td class="right">Способ доставки:<span style="color: #BA0000; font-weight: bold;">*</span></td>
						<td>
							<select name="delivery" onchange="changeDelivery(this)" required>
								<option value="">выберите, пожалуйста...</option>
								<option value="0" <?php if ($this->delivery == "0") { ?>selected="selected"<?php }?>>В отделение "Новой почты"</option>
								<option value="1" <?php if ($this->delivery == "1") { ?>selected="selected"<?php }?>>Курьерская доставка</option>
							</select>
						</td>
					</tr>
					<tr id="address">
						<td colspan="2">
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
							<button class="button" type="submit">Закончить оформление заказа</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>