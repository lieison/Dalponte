<div id="container">
	<svg width="400" height="200" viewBox="0 0 400 200">
		<defs>
			<filter id="goo">
				<feGaussianBlur in="SourceGraphic" stdDeviation="7" result="blur" />
				<feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 17 -7" result="cm" />
				<feComposite in="SourceGraphic" in2="cm">
			</filter>
			<filter id="f2" x="-200%" y="-40%" width="400%" height="200%">
				<feOffset in="SourceAlpha" dx="9" dy="3" />
				<feGaussianBlur result="blurOut" in="offOut" stdDeviation="0.51" />
				<feComponentTransfer>
					<feFuncA type="linear" slope="0.05" />
				</feComponentTransfer>
				<feMerge>
					<feMergeNode/>
					<feMergeNode in="SourceGraphic" />
				</feMerge>
			</filter>
		</defs>
		<g filter="url(#goo)" style="fill:<?php echo $page_loader_color;?>">
			<ellipse id="drop" cx="125" cy="90" rx="20" ry="20" fill-opacity="1" fill="<?php echo $page_loader_color;?>"/>
			<ellipse id="drop2"cx="125" cy="90" rx="20" ry="20" fill-opacity="1" fill="<?php echo $page_loader_color2;?>"/>
		</g>
	</svg>
</div>
<script>
	(function() {
		var container = document.getElementById('container');
		var drop = document.getElementById('drop');
		var drop2 = document.getElementById('drop2');
		var outline = document.getElementById('outline');

		TweenMax.set(['svg'], {
			position: 'absolute',
			top: '50%',
			left: '50%',
			xPercent: -50,
			yPercent: -50
		})

		TweenMax.set([container], {
			position: 'absolute',
			top: '50%',
			left: '50%',
			xPercent: -50,
			yPercent: -50
		})

		TweenMax.set(drop, {
			transformOrigin: '50% 50%'
		})

		var tl = new TimelineMax({
			repeat: -1,
			paused: false,
			repeatDelay: 0,
			immediateRender: false
		});

		tl.timeScale(3);

		tl.to(drop, 4, {
			attr: {
				cx: 250,
				rx: '+=10',
				ry: '+=10'
			},
			ease: Back.easeInOut.config(3)
		})
		.to(drop2, 4, {
			attr: {
				cx: 250
			},
			ease: Power1.easeInOut
		}, '-=4')
		.to(drop, 4, {
			attr: {
				cx: 125,
				rx: '-=10',
				ry: '-=10'
			},
			ease: Back.easeInOut.config(3)
		})
		.to(drop2, 4, {
			attr: {
				cx: 125,
				rx: '-=10',
				ry: '-=10'
			},
			ease: Power1.easeInOut
		}, '-=4')
	})()
	</script>