   $(document).on('ready', function(){
        'use strict';
        $('#layerslider').layerSlider({
            autoStart: false,
			responsive: true,
			responsiveUnder: 1280,
			layersContainer: 1170,
			navButtons:false,
			navStartStop:false,
            skinsPath: 'layerslider/skins/'
            // Please make sure that you didn't forget to add a comma to the line endings
            // except the last line!
            //Regresar el autoStart a True
        });
    });// JavaScript Document