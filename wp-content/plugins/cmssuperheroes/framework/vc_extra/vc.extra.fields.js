jQuery(document).ready(function ($) {
	"use strict";
	$('.cmstaxonomy_param_block').each(function(){
		var self = $(this);
		var ajax_url = self.attr('data-ajax');
		var self_posttype = self.find('.cmstaxonomy-post-types select');
		var self_taxonomy = self.find('.cmstaxonomy-taxonomy select');
		
		self.find('.cmstaxonomy-post-types select').change(function(){
			get_post_types(self, ajax_url, $(this).val());
	    });
		self.on('change','.cmstaxonomy-taxonomy select',function(){
			get_taxonomy(self, ajax_url, $(this).val());
	    });
		self.on('click','.cmstaxonomy-categories ul',function(){
			var values = [];
			var postype = self.find('.cmstaxonomy-post-types select').val();
			var taxonomy = self.find('.cmstaxonomy-taxonomy select').val();
			postype = (postype != undefined) ? (Array.isArray(postype)) ? postype.join(",") : postype : '';
			taxonomy = (taxonomy != undefined) ? (Array.isArray(taxonomy)) ? taxonomy.join(",") : taxonomy : '';
			/** get values */
	        $(this).find('li input:checked').each(function(){
	        	values.push($(this).val());
	        });
	        /** data */   
	        self.find('input.wpb_vc_param_value').val('{"category":['+values.join(",")+'],{"postype":"'+postype+'","taxonomy":"'+taxonomy+'"}}');
	    });
	});
	function get_post_types(self, ajax_url, value){
		var multiple = self.attr('data-multiple');
		multiple = (multiple != undefined && multiple == '1') ? ' multiple="multiple"' : '' ;
		
		$.post(ajax_url, {
			'action' : 'cms_get_taxonomy_from_posttype',
			'type' : value
		}, function(response) {
			console.log(response);
			response = $.parseJSON(response);
			var taxonomy = '<select'+multiple+'>';
			$.each(response,function(i, v){
				taxonomy = taxonomy+"<option value='"+i+"'>"+v+"</option>";
			});
			taxonomy = taxonomy+'</select>';
			self.find('.cmstaxonomy-taxonomy').html(taxonomy);
		});
	}
	function get_taxonomy(self, ajax_url, value){
		var input_type = self.attr('data-input');
		var hideempty = self.attr('data-hide');
		$.post(ajax_url, {
			'action' : 'cms_get_list_category',
			'tax' : value,
			'hideempty' : hideempty
		}, function(response) {
			console.log(response);
			response = $.parseJSON(response);
			var category = '';
			$.each(response,function(i, v){
				category = category+'<li><input type="'+input_type+'" name="taxonomy" value="'+v.term_id+'"/> '+v.name+'('+v.count+')</li>';
			});
			self.find('.cmstaxonomy-categories ul').html(category);
		});
	}
});