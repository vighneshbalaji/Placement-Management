	var slider = new Array(3);
	var IdName = new Array(3);
	var hidIdName = new Array(3);
	var handle1 = new Array(3);
	var handle2 = new Array(3);
	
	IdName[0] = "studentreportug";
	IdName[1] = "studentreporthsc";
	IdName[2] = "studentreportsslc";
	
	hidIdName[0] = "studentreportughid";
	hidIdName[1] = "studentreporthschid";
	hidIdName[2] = "studentreportsslchid";
	
	for(var i = 0; i < 3; i++)
	{			
			 slider[i] = document.getElementById(IdName[i]);

				noUiSlider.create(slider[i], {
					start: [0, 100],
					connect: true,
					tooltips: [wNumb({ decimals: 0, postfix: ' %', }),wNumb({ decimals: 0,postfix: ' %', })],
					step: 5,
					range: {
						'min': 0,
						'max': 100
					}
				});
				
				bindValues(slider[i],hidIdName[i]+"[0]",hidIdName[i]+"[1]");
					
				handle1[i] = slider[i].querySelector('.noUi-handle-lower');

				handle1[i].setAttribute('tabindex', tabindex++);

				handle1[i].addEventListener('click', function(){
					this.focus();
				});

				handle1[i].addEventListener('keydown', function( e ) {
					var value1 = Number(this.parentNode.parentNode.parentNode.noUiSlider.get()[0]);
					var value2 = Number(this.parentNode.parentNode.parentNode.noUiSlider.get()[1]);
					
					
					
					switch ( e.which ) {
						case 37: this.parentNode.parentNode.parentNode.noUiSlider.set( value1 - 5 );
							break;
						case 39: if(value1+5 <= value2 )this.parentNode.parentNode.parentNode.noUiSlider.set( value1 + 5 );
							break;
					}
				});
 
				handle2[i] = slider[i].querySelector('.noUi-handle-upper');

				handle2[i].setAttribute('tabindex', tabindex++);

				handle2[i].addEventListener('click', function(){
					this.focus();
				});

				handle2[i].addEventListener('keydown', function( e ) {

					var value = Number(this.parentNode.parentNode.parentNode.noUiSlider.get()[1]);

					switch ( e.which ) {
						case 37: this.parentNode.parentNode.parentNode.noUiSlider.set([null,value - 5]);
							break;
						case 39: this.parentNode.parentNode.parentNode.noUiSlider.set([null,value + 5]);
							break;
					}
				});
	}
	
		function bindValues(slider,hidupIdName,hidloIdName)	
		{
				slider.noUiSlider.on('update',function(values,handle,e){
					if(handle == 0)
					document.getElementById(hidupIdName).value = e[handle];
					else
					document.getElementById(hidloIdName).value = e[handle];
				});
		}