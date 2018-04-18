<div class="row">
	<div class="col-md-12">
		<div class="products">
			<?php
				for ($i = 0; $i < count($this->videos); $i++) {
				if ($i % 1 == 0) { ?>
					<?php } ?>
						<div class="intro"><?=$this->videos[$i]["video_desc"]?></div>
					<?php if (($i + 1) % 1 == 0) { ?>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>
