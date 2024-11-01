<?php $postnavi = get_option( 'postnavi_option' ); ?>
<?php if($postnavi['postnavi_position'] == 'right'){ ?>
<script type="text/javascript">
jQuery(document).ready(function() {});
</script>
<?php }else { ?>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('.var_nav').hover(function(){
		jQuery('.flotingDiv').css('width','100%');
		jQuery('.flotingDiv ul').css({'overflow-y':'scroll','overflow-x':'hidden'});},function(){
			jQuery('.flotingDiv').css('width','80px');
			jQuery('.flotingDiv ul').css({'overflow-y':'hidden','overflow-x':'hidden'});
	});
});
</script>
<?php } ?>