<div class="row">
	<div class="col-md-12">
		<div class="products">
			<?php
				for ($i = 0; $i < count($this->infos); $i++) {
					if ($i % 3 == 0) { ?>
						<?php } ?>
								<div class="infos">
									<p class="img"><img src="<?=$this->infos[$i]["infoimgs"]?>" class="img-responsive centering" alt="section image" /></p>
									<p class="infoimg_desc"><?=$this->infos[$i]["infoimg_description"]?></p>
								</div>
						<?php if (($i + 1) % 3 == 0) { ?>
					<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>