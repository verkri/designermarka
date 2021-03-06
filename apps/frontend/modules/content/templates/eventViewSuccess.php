<?php use_helper('Date') ?>
<?php use_helper('JavascriptRegister'); ?>
<?php use_helper('CssRegister'); ?>

<?php slot('title', $event->getName() . ' - Marka Events') ?>



<?php register_css() ?>
<style type="text/css">

  	html, body {
 		-ms-content-zooming: none;
 		-ms-touch-action: none;
 	}
 	.zoomer .zoomer-holder { -ms-touch-action: none; }

 	.zoomer, .zoomer * {
	 	-webkit-user-select: none;
		   -moz-user-select: none;
		    -ms-user-select: none;
		     -o-user-select: none;
		        user-select: none;
 	}
	.zoomer { background: #eee url(jquery.fs.zoomer-loading.gif) no-repeat center; height: 100%; overflow: hidden; position: relative; width: 100%;
		-webkit-transition: none;
		   -moz-transition: none;
		   	-ms-transition: none;
		   	 -o-transition: none;
		   	 	transition: none;
	}
	.zoomer .zoomer-positioner { margin: 0; height: 1px; position: absolute; width: 1px; }
	.zoomer .zoomer-holder { box-shadow: 0 0 3px rgba(0, 0, 0, 0.5); opacity: 0; position: relative;
		-webkit-transition: none;
		   -moz-transition: none;
		   	-ms-transition: none;
		   	 -o-transition: none;
		   	 	transition: none;
	}
	.zoomer .zoomer-image { cursor: move; float: left; height: 100%; width: 100%;
		-webkit-transition: opacity 0.25 linear;
		   -moz-transition: opacity 0.25 linear;
		   	-ms-transition: opacity 0.25 linear;
		   	 -o-transition: opacity 0.25 linear;
		   	 	transition: opacity 0.25 linear;
	}
	.zoomer .zoomer-tiles { height: 100%; position: relative; width: 100%; }
	.zoomer .zoomer-tile { height: auto; position: absolute; width: auto; }

	/* CONTROLS */
	.zoomer .zoomer-controls { background: rgba(0, 0, 0, 0.8); box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); border-radius: 3px; padding: 5px; position: absolute;
		-webkit-transition: opacity 0.25 linear;
		   -moz-transition: opacity 0.25 linear;
		   	-ms-transition: opacity 0.25 linear;
		   	 -o-transition: opacity 0.25 linear;
		   	 	transition: opacity 0.25 linear;
	}
	.zoomer .zoomer-controls span { border-radius: 3px; color: #fff; cursor: pointer; display: block; font-size: 20px; font-weight: bold; height: 30px; line-height: 30px; margin: 0; text-align: center; width: 30px; }
	.zoomer .zoomer-controls .zoomer-next,
	.zoomer .zoomer-controls .zoomer-previous { display: none; }

	.zoomer.zoomer-gallery .zoomer-controls .zoomer-next,
	.zoomer.zoomer-gallery .zoomer-controls .zoomer-previous { display: block; }

	/* CONTROLS - TOP, BOTTOM */
	.zoomer .zoomer-controls-top,
	.zoomer .zoomer-controls-bottom { left: 50%; margin: 0 0 0 -35px; }
	.zoomer .zoomer-controls-top { bottom: auto; top: 10px; }
	.zoomer .zoomer-controls-bottom { bottom: 10px; top: auto; }

	.zoomer.zoomer-gallery .zoomer-controls-top,
	.zoomer.zoomer-gallery .zoomer-controls-bottom { margin: 0 0 0 -65px; }

	.zoomer .zoomer-controls-top span,
	.zoomer .zoomer-controls-bottom span { float: left; }
	.zoomer .zoomer-controls-top span:first-child,
	.zoomer .zoomer-controls-bottom span:first-child { margin: 0 1px 0 0; }

	/* CONTROLS - LEFT, RIGHT, TOP LEFT, TOP RIGHT, BOTTOM LEFT, BOTTOM RIGHT */
	.zoomer .zoomer-controls-left,
	.zoomer .zoomer-controls-top-left,
	.zoomer .zoomer-controls-bottom-left
	.zoomer .zoomer-controls-right,
	.zoomer .zoomer-controls-top-right,
	.zoomer .zoomer-controls-bottom-right { height: 71px; width: 40px; }

	.zoomer.zoomer-gallery .zoomer-controls-left,
	.zoomer.zoomer-gallery .zoomer-controls-top-left,
	.zoomer.zoomer-gallery .zoomer-controls-bottom-left
	.zoomer.zoomer-gallery .zoomer-controls-right,
	.zoomer.zoomer-gallery .zoomer-controls-top-right,
	.zoomer.zoomer-gallery .zoomer-controls-bottom-right { height: 131px; }

	.zoomer .zoomer-controls-left,
	.zoomer .zoomer-controls-right { margin: -35px 0 0 0; top: 50%; }

	.zoomer.zoomer-gallery .zoomer-controls-left,
	.zoomer.zoomer-gallery .zoomer-controls-right { margin: -65px 0 0 0; }

	.zoomer .zoomer-controls-left { left: 10px; }
	.zoomer .zoomer-controls-top-left { left: 10px; top: 10px; }
	.zoomer .zoomer-controls-bottom-left { bottom: 10px; left: 10px; }

	.zoomer .zoomer-controls-right { right: 10px; }
	.zoomer .zoomer-controls-top-right { right: 10px; top: 10px; }
	.zoomer .zoomer-controls-bottom-right { bottom: 10px; right: 10px; }

	@media screen and (min-width: 500px) {
		.zoomer .zoomer-controls span:hover { background: #000; }
	}
	
	.zoomer_wrapper { border: 1px solid #ddd; border-radius: 3px; height: 500px; margin: 10px 0; overflow: hidden; width: 90%; }

			.zoomer.dark_zoomer { background: #333 url(http://formstone.it/files/demo/zoomer-bg-dark.png) repeat center; }
			.zoomer.dark_zoomer img { box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); }

</style>
<?php end_register_css() ?>

<?php register_js() ?><script>
$(document).ready(function() {
				$(".zoomer_basic").zoomer();

				$(".zoomer_custom").zoomer({
					controls: {
						zoomIn: ".zoomer_custom_zoom_in",
						zoomOut: ".zoomer_custom_zoom_out"
					},
					customClass: "dark_zoomer",
					increment: 0.03,
					interval: 0.1,
					marginMax: 50
				});

				$(".load_zoomer_tiled").one("click", function() {
					$(this).after('<div class="zoomer_wrapper zoomer_tiled"></div>').remove();
					$(".zoomer_tiled").zoomer({
						source:{
							thumbnail: "http://formstone.it/files/demo/space-tiled/tiled_thumbnail.jpg",
							tiles: [
								["http://formstone.it/files/demo/space-tiled/tiled_01.jpg", "http://formstone.it/files/demo/space-tiled/tiled_02.jpg", "http://formstone.it/files/demo/space-tiled/tiled_03.jpg", ],
								["http://formstone.it/files/demo/space-tiled/tiled_04.jpg", "http://formstone.it/files/demo/space-tiled/tiled_05.jpg", "http://formstone.it/files/demo/space-tiled/tiled_06.jpg", ],
								["http://formstone.it/files/demo/space-tiled/tiled_07.jpg", "http://formstone.it/files/demo/space-tiled/tiled_08.jpg", "http://formstone.it/files/demo/space-tiled/tiled_09.jpg", ],
							]
						}
					});
				});

				$(window).on("resize", function(e) {
					$(".zoomer_wrapper").zoomer("resize");
				});
			});
    
</script><?php end_register_js() ?>
<table width=100%>
<tr><td width=50%>
 <div id="pimg-wrapper">
  <div id="zoomer" class="zoomer_wrapper zoomer_basic">
   

    
      
        <?php foreach ($images as $image) : ?>
         
		 <?php echo image_tag($image->getThumbnailpath()); ?>
		 
           
        <?php endforeach; ?>
    
</div>
  </div>
  </td><td>
  <div id="pinfo-wrapper">
    <section id="eventinfo">
        <header class="clearfix">
          <hgroup>
            <h1><?php echo $event->getName() ?></h1>
            <h3><?php echo $event->getShort() ?></h3>
          </hgroup>
        </header>

        <p>
          <?php echo $event->getDescription() ?>
        </p>

        <aside id="metainfo" class="clearfix">

          <div class="clearfix meta">
            <div class="w60p txtr hdr"><h4>Upcoming:</h4></div>
            <div class="w40p txtr dat"><?php
          switch ($event->getIsUpcoming()) {
            case 0:
              echo "No";
              break;
            case 1:
              echo "Yes";
              break;
            default:
              echo $event->getName() . " items";
              break;
          }
          ?></div>
          </div>

          <div class="clearfix meta">
            <div class="w60p txtr hdr"><h4>Date:</h4></div>
            <div class="w40p txtr dat"><?php echo $event->getDate() ?></div>
          </div>
		  
          <div class="clearfix meta">
            <div class="w60p txtr hdr"><h4>Place:</h4></div>
            <div class="w40p txtr dat"><?php echo $event->getPlace() ?></div>
          </div>
		  
        </aside>

        <footer id="ctrlpanel" class="clearfix">
          <a class="button right light" href="<?php echo '/event' ?>" style="margin-left: 20px;">Back</a>
        </footer>
    </section>
  </div>
 </td></tr></table>
