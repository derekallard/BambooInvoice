/*
	Plotr.Color
	==========	
	Plotr.Color is part of the Plotr Charting Framework.
	
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

Plotr.Color = Class.create();
Plotr.Color.prototype = {
	
	initialize: function(color){
		
		this.toHex(color);
	},
	
	/**
	 * Parses and stores the hex values of the input color string.
	 * 
	 * @param {String} color	Hex or rgb() css string.
	 */
	toHex: function(color){
		
		if(/^#?([\da-f]{3}|[\da-f]{6})$/i.test(color)){
		
			color = color.replace(/^#/, '').replace(/^([\da-f])([\da-f])([\da-f])$/i, "$1$1$2$2$3$3");
			this.r = parseInt(color.substr(0,2), 16);
			this.g = parseInt(color.substr(2,2), 16);
			this.b = parseInt(color.substr(4,2), 16);
   		}else if(/^rgb *\( *\d{0,3} *, *\d{0,3} *, *\d{0,3} *\)$/i.test(color)){
      		
			color = color.match(/^rgb *\( *(\d{0,3}) *, *(\d{0,3}) *, *(\d{0,3}) *\)$/i);
			this.r = parseInt(color[1], 10);
			this.g = parseInt(color[2], 10);
			this.b = parseInt(color[3], 10);
		}
		return this.check();
	},
	
	/**
	 * Lightens the color.
	 * 
	 * @param {integer} level	Level to lighten the color with.
	 */
	lighten: function(level){
		this.r += parseInt(level, 10);
   		this.g += parseInt(level, 10);
		this.b += parseInt(level, 10);

   		return this.check();
	},
	
	/**
	 * Darkens the color.
	 * 
	 * @param {integer} level	Level to darken the color with.
	 */
	darken: function(level){
		this.r -= parseInt(level, 10);
   		this.g -= parseInt(level, 10);
		this.b -= parseInt(level, 10);
		
   		return this.check();
	},
	
	/**
	 * Checks and validates if the hex values r, g and b are
	 * between 0 and 255.
	 */
	check: function(){
		if(this.r>255){this.r=255;}else if(this.r<0){this.r=0;}
		if(this.g>255){this.g=255;}else if(this.g<0){this.g=0;}
		if(this.b>255){this.b=255;}else if(this.b<0){this.b=0;}
	
	   return this;
	},
	
	/**
	 * Returns a css hex string.
	 */
	toHexString: function(){
		return '#' + [this.r, this.g, this.b].invoke('toColorPart').join('');
	},
	
	/**
	 * Returns a rgb() css string.
	 */
	toRgbString: function(){
		return 'rgb(' + this.r + ', ' + this.g + ', ' + this.b + ')';		
	},
	
	/**
	 * Returns a rgba() css string.
	 * 
	 * @param {Integer} alpha	rgba() css string.
	 */
	toRgbaString: function(alpha){
		return 'rgba(' + this.r + ', ' + this.g + ', ' + this.b + ', ' + alpha +')';		
	}	
	
};