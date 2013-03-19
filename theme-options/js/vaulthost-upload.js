jQuery(document).ready(function($) {  
    $('#upload_logo_button').click(function() {  
        tb_show('Upload a logo', 'media-upload.php?referer=vaulthost-settings&type=image&TB_iframe=true&post_id=0', false); 
        return false;  
    });
    window.send_to_editor = function(html) {  
	    var image_url = $('img',html).attr('src');  
	    $('#logo_url').val(image_url);  
	    tb_remove();
	    $('#upload_logo_preview img').attr('src', image_url);
	    $('#submit').trigger('click');
	}
	$('#upload_footer_logo_button').click(function() {  
        tb_show('Upload a footer logo', 'media-upload.php?referer=vaulthost-settings&type=image&TB_iframe=true&post_id=0', false); 
        return false;  
    });
    window.send_to_editor = function(html) {  
	    var image_url = $('img',html).attr('src');  
	    $('#footer_logo_url').val(image_url);  
	    tb_remove();
	    $('#upload_footer_logo_preview img').attr('src', image_url);
	    $('#submit').trigger('click');
	}

});  