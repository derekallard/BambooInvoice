/*
	Plotr.Base
	==========	
	Plotr.Base is part of the Plotr Charting Framework. Plotr.Base
	contains functions that are needed by the rest if the Plotr
	files.
	
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

if(typeof(Prototype) == 'undefined' || Prototype.Version < '1.5.1'){
	throw 'Plotr depends on the Prototype framework (version 1.5.1).';
}

if(typeof(Plotr) == 'undefined'){
	Plotr = {
		author:  'Bas Wenneker',
		name: 	 'Plotr',
		version: '{version}'
	};
}

if(typeof(Plotr.Base) == 'undefined'){
	Plotr.Base = {};
}

/** 
 * Returns an array of all values (!function) of the object obj.
 * 
 * @param {Object} 	obj
 * @return {Array} 	Array that contains all non function items of lst.
 */
Plotr.Base.items = function(obj){
	
	return Object.values(obj).reject(function(item){
		return (typeof(item) == 'function');
	});
};

/**
 * Check if obj is null or undefined.
 * 
 * @param {Object} 		obj
 * @return {Boolean} 	true if null or undefined.
 */
Plotr.Base.isNil = function(obj){
	
	return (obj === null || typeof(obj) == 'undefined');
};

/**
 * Checks if canvas simulation by ExCanvas is supported by 
 * the browser.
 *  
 * @return {Boolean} 	true if userAgent is IE
 */
Plotr.Base.excanvasSupported = function(){
	
	return (/MSIE/.test(navigator.userAgent) && !window.opera);
};

/**
 * Checks whether or not canvas is supported by the browser.
 * 
 * @param {String} canvasName	ID of the canvas element.
 * @return {Boolean} 			true if browser has canvas support supported.
 */
Plotr.Base.isSupported = function(canvasName){
    
    try{
		((Plotr.Base.isNil(canvasName)) ? document.createElement('canvas') : $(canvasName)).getContext('2d');
		
    }catch(e){
        
		var ie = navigator.appVersion.match(/MSIE (\d\.\d)/);
		return ((!ie) || (ie[1] < 6) || (navigator.userAgent.toLowerCase().indexOf('opera') != -1));
    }
	return true;
};

/**
 * Checks lst for the element with the largest length and
 * then returns an array with element 0 .. length.
 * 
 * @param {Array} arr	Array of arrays.
 * @return {Array} 		Returns an array with unique numbers.
 */
Plotr.Base.uniqueIndices = function(arr){
	
	return new ObjectRange(0,arr.max(function(item){		
		return item.length;
	})).toArray();	
};

Plotr.Base.sum = function(lst){
	
	return lst.flatten().inject(0, function(sum, n) { 
		return sum + n; 
	});
};

/** 
 * Plotr.Base.generateColorscheme returns an Array with string representations of
 * colors. The colors start from 'hex' and every color after hex has the same Hue
 * and Saturation but a leveled Brightness. So colors go from dark to light. 
 * If reverse is set to true, the colors go from light to dark. 
 * 
 * @param {String} hex		String with hexadecimal color code like '#ffffff' or 'ffffff'.
 * @param {Integer} size	Size of the colorScheme.
 * @return {Array} result	Returns a colorScheme Array of length 'size'.
 */
Plotr.Base.generateColorscheme = function(/*String*/ hex, /*String[]*/ setKeys){
	
	if(setKeys.length === 0){
		return new Hash();
	}
	
	var color = new Plotr.Color(hex);
	var result = new Hash();
	
	setKeys.each(function(index){
		result[index] = color.lighten(25).toHexString();
	});
	
	return result;
};

/**
 * Returns the default (green) colorScheme.
 * 
 * @param {Integer} size		Size of the colorScheme to return.
 * @return {Hash} colorScheme	Returns an Hash of colors of length 'size'.
 */
Plotr.Base.defaultScheme = function(/*String[]*/ setKeys){
	
	return Plotr.Base.generateColorscheme('#3c581a', setKeys);
};

/**
 * Function returns a colorScheme based on 'color' of length 'size'.
 * 
 * @see Plotr.Base.colorSchemes 
 * @param {String} color
 * @param {Array} setKeys		An array of keys in the dataset.
 * @return {Array} colorScheme	Returns an Array of colors of length 'size'.
 */
Plotr.Base.getColorscheme = function(/*String*/ color, /*String[]*/ setKeys){
	
	return Plotr.Base.generateColorscheme(Plotr.Base.colorSchemes[color] || color, setKeys);
};

/**
 * Storage of colors for predefined colorSchemes.
 */
Plotr.Base.colorSchemes = {
	red: '#6d1d1d',
	green: '#3c581a',
	blue: '#224565',
	grey: '#444444',
	black: '#000000'
};