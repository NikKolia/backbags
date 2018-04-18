<?php if ($this->auth) { ?>
	<div id="menu">
		<h2>Меню</h2>
		<table>
			<tr>	
				<td>
					<a href="<?=$this->index?>">Главная</a>
				</td>
				<td>
					<a href="<?=$this->link_products?>">Товары</a>
				</td>
				<td>
					<a href="<?=$this->link_sections?>">Разделы</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?=$this->link_orders?>">Заказы</a>
				</td>
				<td>
					<a href="<?=$this->link_images?>">Описание товара</a>
				</td>
				<td>
					<a href="<?=$this->link_infos?>">Описание раздела</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?=$this->link_comments?>">Комментарии</a>
				</td>
				<td>
					<a href="<?=$this->link_statistics?>">Статистика</a>
				</td>
				<td>
					<a href="<?=$this->link_videos?>">Видео раздела</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?=$this->link_models?>">Модели</a>
				</td>
				<td>
					<a href="<?=$this->link_discounts?>">Скидки</a>
				</td>
				<td>
					<a href="<?=$this->logout?>">Выход</a>
				</td>
			</tr>
		</table>
	</div>
	<hr />
<?php } ?>