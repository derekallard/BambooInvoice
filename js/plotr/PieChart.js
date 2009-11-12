/*
	Plotr.PieChart
	==============	
	Plotr.PieChart is part of the Plotr Charting Framework.
	
	For license/info/documentation: http://www.solutoire.com/plotr/
	
	Credits
	-------
	Plotr is partially based on PlotKit (BSD license) by
	Alastair Tse <http://www.liquidx.net/plotkit>.
	
	Copyright
	---------
 	Copyright 2007 (c) Bas Wenneker <sabmann[a]gmail[d]com>
 	For use under the BSD license. <http://www.solutoire.com/plotr>
*/

if(typeof(Plotr.Base) == 'undefined' || 
	typeof(Plotr.Canvas) == 'undefined' ||
	typeof(Plotr.Chart) == 'undefined'){
			
	throw 'Plotr.PieChart depends on Plotr.{Base,Canvas,Chart}.';
}

Plotr.PieChart = Class.create();
Object.extend(Plotr.PieChart.prototype, Plotr.Canvas);
Object.extend(Plotr.PieChart.prototype, Plotr.Chart);
Object.extend(Plotr.PieChart.prototype,{
	/**
     * Type of chart we're dealing with.
 	 */
	type: 'pie',
	
	/**
	 * Renders the chart with the specified options.
	 * 
	 * @param {String} [element]	ID of a canvas element.
	 * @param {Object} [options]	Options for rendering.
	 */
	render: function(element,options){
		
		if(this.isIE && this._ieWaitForVML(element,options)){
			return;
		}

		this._evaluate(options);
		this._render(element);
		this._renderPieChart();
		this._renderPieAxis();
		
		if(this.isIE){
			for(var el in this.renderStack){
				if(typeof(this.renderStack[el]) != 'function'){
					this.render(el,this.renderStack[el]);
					break;
				}
			}
		}
	},	
	
	/**
	 * This function evaluates all the data needed
	 * to plot the chart.
	 * 
	 * @param {Object} [options]	Evaluate the chart with the given options.
	 */
	_evaluate: function(options){
		this._eval(options);
		this._evalPieChart();
		this._evalPieTicks();
	},
	
	/**
	 * Processes specific measures for pie charts.
	 */
	_evalPieChart: function(){
		var store = this.stores[0];
		var sum = Plotr.Base.sum(store.pluck(1));
		
		var angle = 0.0;
		this.slices = [];
		for(var i = 0, slice = null, fraction = null; i < store.length; i++){
			slice = store[i];
			if(slice[1] > 0){
				fraction = slice[1]/sum;
				this.slices.push({
					fraction: fraction,
					xval: slice[0],
					yval: slice[1],
					startAngle: 2 * angle * Math.PI,
					endAngle: 2 * (angle + fraction) * Math.PI
				});
				angle += fraction;
			}
		}
	},
	
	_renderPieChart: function(){
		var cx = this.canvasNode.getContext('2d');
				
		var centerx = this.area.x + this.area.w * 0.5;
    	var centery = this.area.y + this.area.h * 0.5;
		var radius = Math.min(this.area.w * this.options.pieRadius, this.area.h * this.options.pieRadius);
		
		if(this.isIE){
	        centerx = parseInt(centerx,10);
	        centery = parseInt(centery,10);
	        radius = parseInt(radius,10);
	    }
		
		var drawPie = function(slice){
			cx.beginPath();
			cx.moveTo(centerx, centery);
			cx.arc(centerx, centery, radius, 
                    slice.startAngle - Math.PI/2,
                    slice.endAngle - Math.PI/2,
                    false);
			cx.lineTo(centerx, centery);
       		cx.closePath();
		};
				
		if(this.options.shadow){
			cx.save();
			cx.fillStyle = "rgba(0,0,0,0.15)";
				
	        cx.beginPath();
			cx.moveTo(centerx, centery);
			cx.arc(centerx+1, centery+2, radius+1, 0, Math.PI*2, false);
			cx.lineTo(centerx, centery);
       		cx.closePath();
			cx.fill();
			cx.restore();
		}
		
		cx.save();
		this.slices.each(function(slice,i){
						
			if(Math.abs(slice.startAngle - slice.endAngle) > 0.001){
								
				cx.fillStyle = this.options.colorScheme[i];
				
				if(this.options.shouldFill){
					drawPie(slice);               	
	                cx.fill();
	            }
	            
	            if(this.options.shouldStroke){
					drawPie(slice);
	                cx.lineWidth = this.options.strokeWidth;
	                
					if(!!(this.options.strokeColor)){
	                    cx.strokeStyle = this.options.strokeColor;
					}
						       
	                cx.stroke();
	            }
			}
			
		}.bind(this));
		cx.restore();
		
	},
	
	_evalPieTicks: function(){
		this.xticks = [];
				
		if(!!(this.options.xTicks)){
			
			var lookup = [];
			this.slices.each(function(slice){
				lookup[slice.xval] = slice;
			});
			
			this.options.xTicks.each(function(tick){
				var slice = lookup[tick.v]; 
	            var label = tick.label || tick.v.toString();
				if(!!(slice)){
					label += ' (' + (slice.fraction * 100).toFixed(1) + '%)';
					this.xticks.push([tick.v, label]);
				}
			}.bind(this));
			
		}else{
			
			this.slices.each(function(slice){
				var label = slice.xval + ' (' + (slice.fraction * 100).toFixed(1) + '%)';
				this.xticks.push([slice.xval, label]);
			}.bind(this));			
		}
	},
	
	_renderPieAxis: function(){
		
		if(!this.options.drawXAxis){
        	return;
		}
		
		if(!!(this.xticks)){
			
			var lookup = [];
			this.slices.each(function(slice){
				lookup[slice.xval] = slice;
			});
			
			var centerx = this.area.x + this.area.w * 0.5;
		    var centery = this.area.y + this.area.h * 0.5;
		    var radius = Math.min(this.area.w * this.options.pieRadius,
		                          this.area.h * this.options.pieRadius);
			var labelWidth = this.options.axisLabelWidth;
			
			this.xticks.each(function(tick){
				var slice = lookup[tick[0]];
				
				// normalize the angle
				var normalisedAngle = (slice.startAngle + slice.endAngle)/2;
				if(normalisedAngle > Math.PI * 2){
					normalisedAngle = normalisedAngle - Math.PI * 2;
				}else if(normalisedAngle < 0){
					normalisedAngle = normalisedAngle + Math.PI * 2;
				}
					
				var labelx = centerx + Math.sin(normalisedAngle) * (radius + 10);
		        var labely = centery - Math.cos(normalisedAngle) * (radius + 10);
				
				var labelStyle = {
			        position: 'absolute',
			        zIndex: 11,
			        width: labelWidth + 'px',
			        fontFamily: this.options.axisLabelFont,
			        fontSize: this.options.axisLabelFontSize + 'px',
			        overflow: 'hidden',
			        color: this.options.axisLabelColor
			    };
				
				if(normalisedAngle <= Math.PI * 0.5){
		            // text on top and align left
					Object.extend(labelStyle, {
						textAlign: 'left',
						verticalAlign: 'top',
						left: labelx + 'px',
						top: (labely - this.options.axisLabelFontSize) + 'px'
					});
		        }else if((normalisedAngle > Math.PI * 0.5) && (normalisedAngle <= Math.PI)){
		            // text on bottom and align left
					Object.extend(labelStyle, {
						textAlign: 'left',
						verticalAlign: 'bottom',
						left: labelx + 'px',
						top: labely + 'px'
					});	
		        }else if((normalisedAngle > Math.PI) && (normalisedAngle <= Math.PI*1.5)){
		            // text on bottom and align right
					Object.extend(labelStyle, {
						textAlign: 'right',
						verticalAlign: 'bottom',
						left: (labelx  - labelWidth) + 'px',
						top: labely + 'px'
					});
		        }else {
		            // text on top and align right
					Object.extend(labelStyle, {
						textAlign: 'right',
						verticalAlign: 'bottom',
						left: (labelx  - labelWidth) + 'px',
						top: (labely - this.options.axisLabelFontSize) + 'px'
					});
		        }
				
				var label = document.createElement('div');
				label.appendChild(document.createTextNode(tick[1]));
				Element.setStyle(label, labelStyle);	
                this.containerNode.appendChild(label);
				this.xlabels.push(label);
				
			}.bind(this));		
		}
	}
});