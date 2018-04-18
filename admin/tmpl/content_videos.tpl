<h3>Видео раздела</h3>
<?php include "message.tpl"; ?>
<?php include "pagination.tpl"; ?>
<p class="link_new">
	<a href="<?=$this->link_new?>">Добавить новое описание</a>
</p>
<table class="info">
	<tr class="header">
		<td>id</td>
		<td>Раздел</td>
		<td>Видео</td>
		<td>№п/п</td>
		<td>Описание, дата</td>
		<td>Функции</td>
	</tr>
	<?php foreach ($this->table_data as $data) { ?>
		<tr>
			<td><?=$data["num"]?></td>
			<td>№<?=$data["section_id"]?><br />
				<?=$data["section"]?>
			</td>
			<td>
				<iframe class="video img-responsive" src="<?=$data["sec_videos"]?>" frameborder="0" allowfullscreen></iframe>
				<br />
				<?=$data["sec_videos"]?>
			</td>
			<td><?=$data["video_title"]?></td>
			<td>
				<?=$data["video_desc"]?>
				<br />
				<?=$data["date"]?>
			</td>
			<td>
				<a href="<?=$data["link_admin_edit"]?>">Редактировать</a>
				<br />
				<a href="<?=$data["link_admin_delete"]?>" onclick="return confirm('Вы уверены, что хотите удалить элемент?')">Удалить</a>
			</td>
		</tr>
	<?php } ?>
</table>