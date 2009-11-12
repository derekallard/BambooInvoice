/*
	Plotr.LineChart
	===============	
	Plotr.LineChart is part of the Plotr Charting Framework.
	
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

if (typeof(Plotr.Base) == 'undefined' || 
	typeof(Plotr.Canvas) == 'undefined' ||
	typeof(Plotr.Chart) == 'undefined'){
			
	throw 'Plotr.LineChart depends on Plotr.{Base,Canvas,Chart}.';
}

Plotr.LineChart = Class.create();
Object.extend(Plotr.LineChart.prototype, Plotr.Canvas);
Object.extend(Plotr.LineChart.prototype, Plotr.Chart);
Object.extend(Plotr.LineChart.prototype,{
	/**
     * Type of chart we're dealing with.
 	 */
	type: 'line',
	
	/**
	 * Renders the chart with the specified options. The optional parameters
	 * can be used to render a linechart in a different canvas element with new options.
	 * 
	 * @param {String} [element] - (optional) ID of a canvas element.
	 * @param {Object} [options] - (optional) Options for rendering.
	 */
	render: function(element,options){		
		if(this.isIE && this._ieWaitForVML(element,options)){
			return;
		}
		
		this._evaluate(options);
		this._render(element);
		this._renderLineChart();
		this._renderLineAxis();
		
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
	 * This function does all the math. It'll process all the data needed to
	 * plot the chart.
	 * 
	 * @param {Object} options - (optional) evaluate the chart with the given options.
	 */
	_evaluate: function(options){
		this._eval(options);
		this._evalLineChart();
		this._evalLineTicksForXAxis();
		this._evalLineTicksForYAxis();
	},
	
	/**
	 * Processes specific measures for line charts.
	 */
	_evalLineChart: function(){
	    this.points = [];
	
		this.dataSets.each(function(store){			
			store.value.each(function(item){
				var point = {
	                x: ((parseFloat(item[0]) - this.minxval) * this.xscale),
	                y: 1.0 - ((parseFloat(item[1]) - this.minyval) * this.yscale),
	                xval: parseFloat(item[0]),
	                yval: parseFloat(item[1]),
	                name: store.key
	            };
				
				point.y = (point.y <= 0.0) ? 0.0 : (point.y >= 1.0) ? 1.0 : point.y;
	            
	            if((point.x >= 0.0) && (point.x <= 1.0)){
	                this.points.push(point);
	            }
			}.bind(this));	        
		}.bind(this));	    
	},
	
	_renderLineChart: function(){
	    var cx = this.canvasNode.getContext("2d");
		
		var preparePath = function(storeName,index){
				
			cx.beginPath();
            cx.moveTo(this.area.x, this.area.y + this.area.h);
			this.points.each(function(point){
				
				if(point.name == storeName){
                    cx.lineTo(this.area.w * point.x + this.area.x, this.area.h * point.y + this.area.y);
				}
			}.bind(this));
			
            cx.lineTo(this.area.w + this.area.x, this.area.h + this.area.y);
            cx.lineTo(this.area.x, this.area.y + this.area.h);
			
			if(this.options.shouldFill){
				cx.closePath();
			}else{
	        	cx.strokeStyle = this.options.colorScheme[storeName];
			    cx.stroke();
			}	
		}.bind(this);
		
		if(this.options.shouldFill){
			
			var drawLine = function(storeName, index){
				
				if(this.options.shadow){
					// Draw shadow.
					cx.save();
					cx.fillStyle = 'rgba(0,0,0,0.15)';				
					cx.translate(2, -2);
					preparePath(storeName,index);	
					cx.fill();				
					cx.restore();
				}
				
				// Fill line.
				cx.fillStyle = this.options.colorScheme[storeName];		
	            preparePath(storeName,index);
		        cx.fill();			    			
		        
				if (this.options.shouldStroke){
					// Draw stroke.
		            preparePath(storeName,index);
		            cx.stroke();
		        }     
			}.bind(this);
			
			// Draw the lines.
			cx.save();
			cx.lineWidth = this.options.strokeWidth;		
		    cx.strokeStyle = this.options.strokeColor;
			this.dataSets.keys().each(drawLine);		
			cx.restore();
		}else{
			cx.save();
			cx.lineWidth = this.options.strokeWidth;				
			this.dataSets.keys().each(preparePath);
			//cx.stroke();
			cx.restore();
		}
	}
});