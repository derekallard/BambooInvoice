/*
	Plotr.Chart
	==========	
	Plotr.Chart is part of the Plotr Charting Framework.
	
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

if(typeof(Plotr.Base) == 'undefined'){
	throw 'Plotr.Chart depends on Plotr.Base.';
}


/**
 * Plotr.Chart
 * 
 * @alias Plotr.Chart
 * @namespace Plotr 
 */
Plotr.Chart = {
	
	/**
	 * The constructor of Plotr.Chart.
	 * 
	 * @alias initialize
	 * @see Plotr.Canvas.setOptions
	 * @param {String} type - Choose from {'bar'}.
	 * @param {Object} options - Object with options.
	 */
	initialize: function(element, options){
		this.setOptions(options);
		this.sets = 0;
		this.xticks = this.yticks = [];
		this.dataSets = new Hash();
		
		if(!Plotr.Base.isNil(this.options.xAxis)){
	        this.minxval = this.options.xAxis[0];
	        this.maxxval = this.options.xAxis[1];
	        this.xscale = this.maxxval - this.minxval; 
	    } else {
	        this.minxval = 0;
	        this.maxxval = this.xscale = null;
	    }
	
	    if(!Plotr.Base.isNil(this.options.yAxis)){
	        this.minyval = this.options.yAxis[0];
	        this.maxyval = this.options.yAxis[1];
	        this.yscale = this.maxyval - this.minyval;
	    } else {
	        this.minyval = 0;
	        this.maxyval = this.yscale = null;
	    }
	
	    this.minxdelta = 0;
	    this.xrange = this.yrange = 1;
		
		this._initCanvas(element);
	},
	
	/**
	 * Function adds the array to the dataSets object. Argument must be in 
	 * the form of: {['<setName>': [[0,1],[1,2]...<data>], ..}. The function also 
	 * keeps track of how many sets are added.
	 * 
	 * @alias addDataset
	 * @param {Object} arguments - Object with data
	 */
	addDataset: function(store){
		this.dataSets.merge(store);
	},
	
	/**
	 * This function makes it easy to parse a table and show it's
	 * data in a chart. The upper left corner has coordinates (x=0,y=0).
	 * 
	 * @alias addTable
	 * @param {String|Element} table - table id or element;
	 * @param {Integer} x - xcoordinate to start with data parsing
	 * @param {Integer} y - y coordinate to start with data parsing
	 * @param {Integer} xticks - row number of row with labels for xticks
	 */
	addTable: function(table, x, y, xticks){
		table = $(table);
		
		x = x || 0;
		y = y || 1;
		xticks = xticks || -1;
		
		var tr = table.tBodies[0].rows;
		var store = {};
		var labels = [];
		
		for(var i = y, ln = tr.length; i < ln; i++){
			var j = 0;		
			store['row_'+i] = Array.from(tr[i].cells).reject(function(cell,index){
				return index < x;
			}).collect(function(cell){
				return [j++, parseFloat(cell.innerHTML)];
			});
		}
		if(xticks >= 0){
			var tickIndex = 0;
			this.options.xTicks = Array.from(tr[xticks].cells).reject(function(cell,index){
				return index < x;
			}).collect(function(cell){
				return {v: tickIndex++, label: cell.innerHTML};
			});
		}
		this.addDataset(store);
	},
	
	addLegend: function(/*Element*/ element){
		// Create a list that will be the legend.
		var ul = $(document.createElement('ul'));		
		Element.setStyle(ul,{
			'listStyleType': 'none'
		});
		
		this.dataSets.each(function(/*Array*/ set, /*Integer*/ i){
			var li = $(document.createElement('li')).setStyle({
				'lineHeight': '20px'
			}).addClassName('legend_li');
			
			var div = $(document.createElement('div')).setStyle({
				'display': 		'inline',
				'position': 	'relative',
				'top':			'-2px',
				'border':		'1px solid #ccc',
				'padding':		'2px 0',
				'margin':		'2px',
				'width': 		'5px',			
				'fontSize': 	'5px'
			});
			
			var color = $(document.createElement('div')).setStyle({
				'display': 		'inline',
				'padding':		'0 6px',
				'margin':		'2px',
				'background': this.options.colorScheme[set.key],
				'color':	this.options.colorScheme[set.key]
			}).addClassName('legend_li_color');
			
			color.appendChild(document.createTextNode(i+1));
			div.appendChild(color);
			li.appendChild(div);
			li.appendChild(document.createTextNode(set.key));
			ul.appendChild(li);
		}.bind(this));
		
		// Add the list to the element.
		element.appendChild(ul);
	},
	
	/**
	 * This function does all the math. It'll process all the data that has to do
	 * with canvas measures.
	 * 
	 * @param {Object} options	Evaluate the chart with the given options.
	 */
	_eval: function(options){
		
		if(!!(options)){			
			this.setOptions(options);
		}
		
		this.stores = Plotr.Base.items(this.dataSets);
		this._evalXY();
		this.setColorscheme();
	},
	
	/**
	 * Processes measures.
	 */	
	_evalXY: function(){
		
		// Gather data for the x axis.
		var xdata = this.stores.collect(function(item){return item.pluck(0);}).flatten();
		if(!!!(this.options.xAxis)){
			
			this.minxval = (this.options.xOriginIsZero) ? 0 : parseFloat(xdata.min());
			this.maxxval = parseFloat(xdata.max());
		}else{
		
			this.minxval = this.options.xAxis[0];
	        this.maxxval = this.options.xAxis[1];
			this.xscale = this.maxxval - this.minxval;
		}
		this.xrange = this.maxxval - this.minxval;
		this.xscale = (this.xrange === 0) ? 1.0 : 1/this.xrange;	
		
		// Gather data for the y axis.
		var ydata = this.stores.collect(function(item){return item.pluck(1);}).flatten();
		if(!!!(this.options.yAxis)){
			
			this.minyval = (this.options.yOriginIsZero) ? 0 : parseFloat(ydata.min());
			this.maxyval = parseFloat(ydata.max());
		}else {
			
			this.minyval = this.options.yAxis[0];
	        this.maxyval = this.options.yAxis[1];
			this.yscale = this.maxyval - this.minyval;
		}
		
	    this.yrange = this.maxyval - this.minyval;
		this.yscale = (this.yrange === 0) ? 1.0 : 1/this.yrange;
	},
	
	/**
	 * Evaluates ticks for X and Y axis.
	 * 
	 * @alias _evalLineTicks
	 */
	_evalLineTicks: function(){		
		this._evalLineTicksForXAxis();
		this._evalLineTicksForYAxis();
	},
	
	/**
	 * Evaluates ticks for X axis.
	 * 
	 * @alias _evalLineTicksForXAxis
	 */
	_evalLineTicksForXAxis: function(){	    
	    
		if(this.options.xTicks){	
			
			this.xticks = this.options.xTicks.collect(function (tick){
				
				var label = tick.label;
	            if(Plotr.Base.isNil(label)){
	                
					label = tick.v.toString();
				}
				
	            var pos = this.xscale * (tick.v - this.minxval);
	            if((pos >= 0.0) && (pos <= 1.0)){
	                
					return [pos, label];
	            }
			}.bind(this));
			
	    } else if(this.options.xNumberOfTicks){
	        var uniqx = Plotr.Base.uniqueIndices(this.stores);
	        var roughSeparation = this.xrange / this.options.xNumberOfTicks;
	        var tickCount = 0;
	
	        this.xticks = [];
	        for (var i = 0; i <= uniqx.length; i++){
	           
			    if((uniqx[i] - this.minxval) >= (tickCount * roughSeparation)){
	               
				    var pos = this.xscale * (uniqx[i] - this.minxval);
	                if((pos > 1.0) || (pos < 0.0)){
	                    continue;
					}
	                
					this.xticks.push([pos, uniqx[i]]);
	                tickCount++;
	            }
				
	            if(tickCount > this.options.xNumberOfTicks){
	                break;
				}
	        }
    	}
	},
	
	/**
	 * Evaluates ticks for Y axis.
	 * 
	 * @alias _evalLineTicksForYAxis
	 */
	_evalLineTicksForYAxis: function(){	    
	    
		if(this.options.yTicks){
		
			this.yticks = this.options.yTicks.collect(function(tick){
				
				var label = tick.label;
	            if(Plotr.Base.isNil(label)){
	            
				    label = tick.v.toString();
				}
	            
				var pos = 1.0 - (this.yscale * (tick.v - this.minyval));
	            if((pos >= 0.0) && (pos <= 1.0)){
	            
				    return [pos, label];
	            }
			}.bind(this));
	    }else if(this.options.yNumberOfTicks){ 
	        
			this.yticks = [];
			var prec = this.options.yTickPrecision;
			var num = this.yrange/this.options.yNumberOfTicks;
			var roughSeparation = (num < 1 && this.options.yTickPrecision == 0) ? 1 : num.toFixed(this.options.yTickPrecision);
			
	        for (var i = 0; i <= this.options.yNumberOfTicks; i++){
	            var yval = this.minyval + (i * roughSeparation);
	            var pos = 1.0 - ((yval - this.minyval) * this.yscale);
	            
				if((pos > 1.0) || (pos < 0.0)){
	                continue;
				}
	            
				this.yticks.push([pos, yval.toFixed(prec)]);
	        }
    	}
	}
};