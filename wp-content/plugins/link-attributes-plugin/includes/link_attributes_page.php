<style>
    .container1{
        background: #ffffff;
        border: 1px #009900 dashed;
        width: 60%;
        margin-top: 2%;
        padding: 2%;
    }
    form h4{
        margin: 0;
        padding: 0;
        display: inline-block;
        margin-bottom: 4px;
        margin-left: 5px;
    }

</style>
<script>
jQuery(document).ready(function(){

  jQuery('input[type=checkbox]').on('change', function(){
     var name = jQuery(this).attr('name');
     var val  = jQuery(this).prop('checked');
     
		jQuery.ajax({
			url: '/wp-admin/admin-ajax.php',
			type: 'POST',
			data: 'action=attributes&name=' + name + '&val=' + val,
			success: function( data ) {
				//alert( data );
			}
		});
  });

});

</script>
<?php
    $settingsAttr = $wpdb->get_results("SELECT * FROM wp_attributes", ARRAY_A);
?>
<div id="wrap">
    <div class="container container1">
        <h2>Тип поста (post_type) в котором требуются атрибуты ссылок:</h2>
        <form id="attrForm">
            <input <?php if($settingsAttr[0]['type_pages']){ echo 'CHECKED'; } ?> type="checkbox" id="page" name="page" value=""><label for="page"><h4>Pages (страницы)</h4></label>
            <hr style="margin: 10px;">
            <input <?php if($settingsAttr[0]['type_posts']){ echo 'CHECKED'; } ?>  type="checkbox" id="post" name="post" value=""><label for="post"><h4>Posts (записи)</h4></label>
        </form>
        <h2>Тип атрибута который требуется добавить:</h2>
        <form>
            <input <?php if($settingsAttr[0]['nofollow']){ echo 'CHECKED'; } ?> type="checkbox" id="nf" name="nf" value=""><label for="nf"><h4>Nofollow attribute (rel="nofollow")</h4></label>
            <hr style="margin: 10px;">
            <input <?php if($settingsAttr[0]['target']){ echo 'CHECKED'; } ?> type="checkbox" id="nt" name="nt" value=""><label for="nt"><h4>Open links in a new tab (target="_blank")</h4></label>
        </form>
    </div>
</div>