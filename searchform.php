<?php
/**
 * Search Form Template
 *
 */
?>

<form method="get" class="form-search" action="<?php echo home_url( '/' ); ?>">
     <div class="input-group">
				<input type="text" class="form-control search-query input1" name="s" placeholder="<?php esc_attr_e('Поиск по блогу &hellip;', 'inspiration'); ?>" />
				<span class="input-group-btn">
					<button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="<?php esc_attr_e('Поиск', 'inspiration'); ?>"><i class="fa fa-search"></i></button>
				</span>
			</div>

</form>