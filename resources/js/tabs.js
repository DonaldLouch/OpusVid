/*
=====================================================================
	YPP Debacle | tabs.js
	v. 2.0 | April 10th, 2018
=====================================================================
*/

var tabsFunction = document.getElementById("tabs");

;( function( window ) {
	
	'use strict';

	function extend( a, b ) {
		for( var key in b ) { 
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	function tabsFunction( el, options ) {
		this.el = el;
		this.options = extend( {}, this.options );
  		extend( this.options, options );
  		this._init();
	}

	tabsFunction.prototype.options = {
		start : 0
	};

	tabsFunction.prototype._init = function() {
		// tabs elemes
		this.tabs = [].slice.call( this.el.querySelectorAll( 'nav >  a' ) );
		// content items
		this.items = [].slice.call( this.el.querySelectorAll( '.tabContent > section' ) );
		// current index
		this.current -1;
		// show current content item
		this._show();
		// init events
		this._initEvents();
	};

	tabsFunction.prototype._initEvents = function() {
		var self = this;
		this.tabs.forEach( function( tab, idx ) {
			tab.addEventListener( 'click', function( ev ) {
				ev.preventDefault();
				self._show( idx );
			} );
		} );
	};

	tabsFunction.prototype._show = function( idx ) {
		if( this.current >= 0 ) {
			this.tabs[ this.current ].className = '';
			this.items[ this.current ].className = '';
		}
		// change current
		this.current = idx != undefined ? idx : this.options.start >= 0 && this.options.start < this.items.length ? this.options.start : 0;
		this.tabs[ this.current ].className = 'tab-current';
		this.items[ this.current ].className = 'content-current';
	};

	// add to global namespace
	window.tabsFunction = tabsFunction;

})( window );

/*
=====================================================================
	@ 2013 - 2018 Donald Louch Producrions
=====================================================================
*/