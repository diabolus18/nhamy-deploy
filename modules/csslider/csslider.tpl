<!-- CS Slider module -->
{if $page_name == 'index'}
<div class="slider-wrapper theme-default">
<div id="slider" class="nivoSlider">
	{foreach from=$sliders item=slider}
		<a href="{$slider->url}"><img src="{$path}image/{$slider->image[(int)$cookie->id_lang]}" alt="" title="{$slider->caption[(int)$cookie->id_lang]}" /></a>
	{/foreach}
</div>
</div>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
			effect: '{$option->effect}',
			animSpeed: {$option->animSpeed},
			pauseTime: {$option->pauseTime},
			directionNav: {$option->directionNav},
			directionNavHide: {$option->directionNavHide},
			controlNav: {$option->controlNav},
			controlNavThumbs: {$option->controlNavThumbs},
			pauseOnHover: {$option->pauseOnHover},
			manualAdvance: {$option->manualAdvance},
			slices: 15,
			boxCols: 8,
			boxRows: 4,
			startSlide: 0,
			controlNavThumbsFromRel: false,
			controlNavThumbsSearch: '.jpg',
			controlNavThumbsReplace: '_thumb.jpg',
			keyboardNav: true,
			captionOpacity: 0.8,
			prevText: 'Prev',
			nextText: 'Next',
			randomStart: false
		});
    });
</script>
{/if}
<!-- /CS Slider module -->
