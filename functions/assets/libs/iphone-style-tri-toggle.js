/*!
// iPhone-style Checkboxes jQuery plugin
// Copyright Thomas Reynolds, licensed GPL & MIT
*/
;(function($, iphoneStyleTriToggle) {

// Constructor
$[iphoneStyleTriToggle] = function(elem, options) {
  this.$elem = $(elem);
  
  // Import options into instance variables
  var obj = this;
  obj.clickingFrom = this.$elem.val()=='true'?true:false;
  $.each(options, function(key, value) {
    obj[key] = value;
  });
  
  // Initialize the control
  this.wrapSelectWithDivs();
  this.attachEvents();
  this.disableTextSelection();
  
  if (this.resizeHandle)    { this.optionallyResize('handle'); }
  if (this.resizeContainer) { this.optionallyResize('container'); }
  
  this.initialPosition();
};

$.extend($[iphoneStyleTriToggle].prototype, {
  // Wrap the existing Select with divs for styling and grab DOM references to the created nodes
  wrapSelectWithDivs: function() {
    this.$elem.wrap('<div class="' + this.containerClass + '" />');
    this.container = this.$elem.parent();
    
    this.offLabel  = $('<label class="'+ this.labelOffClass +'">' +
                         '<span>'+ this.uncheckedLabel +'</span>' +
                       '</label>').appendTo(this.container);
    this.offSpan   = this.offLabel.children('span');
    
    this.onLabel   = $('<label class="'+ this.labelOnClass +'">' +
                         '<span>'+ this.checkedLabel +'</span>' +
                       '</label>').appendTo(this.container);
    this.onSpan    = this.onLabel.children('span');
    
    this.handle    = $('<div class="' + this.handleClass + '">' +
                         '<div class="' + this.handleRightClass + '">' +
                           '<div class="' + this.handleCenterClass + '" />' +
                         '</div>' +
                       '</div>').appendTo(this.container);
  },
  
  // Disable IE text selection, other browsers are handled in CSS
  disableTextSelection: function() {
    if (!$.browser.msie) { return; }

    // Elements containing text should be unselectable
    $.each([this.handle, this.offLabel, this.onLabel, this.container], function() {
      $(this).attr("unselectable", "on");
    });
  },
  
  // Automatically resize the handle or container
  optionallyResize: function(mode) {
    var onLabelWidth  = this.onLabel.width(),
        offLabelWidth = this.offLabel.width();
        
    if (mode == 'container') {
      var newWidth = (onLabelWidth > offLabelWidth) ? onLabelWidth : offLabelWidth;
      newWidth += this.handle.width() + 40; 
    } else { 
      var newWidth = (onLabelWidth < offLabelWidth) ? onLabelWidth : offLabelWidth;
    }
    
    this[mode].css({ width: newWidth });
  },
  
  attachEvents: function() {
    var obj = this;
    
    // A mousedown anywhere in the control will start tracking for dragging
    this.container
      .bind('mousedown touchstart', function(event) {          
        event.preventDefault();
        if (obj.$elem.is(':disabled')) { return; }
          
        var x = event.pageX || event.originalEvent.changedTouches[0].pageX;
        $[iphoneStyleTriToggle].currentlyClicking = obj.handle;
        $[iphoneStyleTriToggle].dragStartPosition = x;
        $[iphoneStyleTriToggle].handleLeftOffset  = parseInt(obj.handle.css('left'), 10) || 0;
        $[iphoneStyleTriToggle].dragStartedOn     = obj.$elem;
      })
    
      // Utilize event bubbling to handle drag on any element beneath the container
      .bind('iPhoneDrag', function(event, x) {
        event.preventDefault();
        
        if (obj.$elem.is(':disabled')) { return; }
        if (obj.$elem != $[iphoneStyleTriToggle].dragStartedOn) { return; }
        
        var p = (x + $[iphoneStyleTriToggle].handleLeftOffset - $[iphoneStyleTriToggle].dragStartPosition) / obj.rightSide;
        if (p < 0) { p = 0; }
        if (p > 1) { p = 1; }
        obj.handle.css({ left: p * obj.rightSide });
        obj.onLabel.css({ width: p * obj.rightSide + 4 });
        obj.offSpan.css({ marginRight: -p * obj.rightSide });
        obj.onSpan.css({ marginLeft: -(1 - p) * obj.rightSide });
      })
    
        // Utilize event bubbling to handle drag end on any element beneath the container
      .bind('iPhoneDragEnd', function(event, x) {
        if (obj.$elem.is(':disabled')) { return; }
		var selected;
		selected = obj.$elem.val();
		
		if ($[iphoneStyleTriToggle].dragging) {
          var p = (x - $[iphoneStyleTriToggle].dragStartPosition) / obj.rightSide;
		  if(p>0){
			if(obj.$elem.val()=='false'){
			  if(p<0.8 && p>0.3){
			    selected = 'default';
			  }else if(Math.abs(p)>0.8){
			    selected = 'true';
			  }
			}else{
			  if(p>0.3){
			    selected = 'true';
			  }
			}
			 
		  }else{
			if(obj.$elem.val()=='true'){
			  if(Math.abs(p)<0.8 && Math.abs(p)>0.3){
			    selected = 'default';
			  }else if(Math.abs(p)>0.8){
			    selected = 'false';
			  }
			}else{
			  if(Math.abs(p)>0.3){
			    selected = 'false';
			  }
			}
		  
		  }		  
        } else {
		  switch(obj.$elem.val()){
			case 'true':
				selected = 'default';
				break;
			case 'false':
				selected = 'default';
				break;
			case 'default':
				if(obj.clickingFrom){
					selected = 'false';
				}else{
					selected = 'true';
				}
				break;
		  }
        }
        
        obj.$elem.val(selected);

        $[iphoneStyleTriToggle].currentlyClicking = null;
        $[iphoneStyleTriToggle].dragging = null;
        obj.$elem.change();
      });
  
    // Animate when we get a change event
    this.$elem.change(function() {
      if (obj.$elem.is(':disabled')) {
        obj.container.addClass(obj.disabledClass);
        return false;
      } else {
        obj.container.removeClass(obj.disabledClass);
      }
	  var new_left = 0;
      switch (obj.$elem.val()){
	    case 'true':
		  obj.clickingFrom = true;
	      new_left = obj.rightSide;
	      break;
	    case 'false':
		  obj.clickingFrom = false;
	      new_left = 0;
	      break;
	    case 'default':
	      new_left = obj.rightSide/2;
	      break;
	  }
	  
      obj.handle.animate({         left: new_left },                 obj.duration);
      obj.onLabel.animate({       width: new_left + 4 },             obj.duration);
      obj.offSpan.animate({ marginRight: -new_left },                obj.duration);
      obj.onSpan.animate({   marginLeft: new_left - obj.rightSide }, obj.duration);
    });
  },
  
  // Setup the control's inital position
  initialPosition: function() {
    this.offLabel.css({ width: this.container.width() - 5 });

    var offset = ($.browser.msie && $.browser.version < 7) ? 3 : 6;
    this.rightSide = this.container.width() - this.handle.width() - offset;
	
	switch (this.$elem.val()){
	  case 'true':
	    this.handle.css({ left: this.rightSide });
	    this.onLabel.css({ width: this.rightSide + 4 });
	    this.offSpan.css({ marginRight: -this.rightSide });
	    break;
	  case 'false':
	    this.onLabel.css({ width: 0 });
	    this.onSpan.css({ marginLeft: -this.rightSide });
	    break;
	  case 'default':
	    this.handle.css({ left: this.rightSide/2 });
	    this.offSpan.css({ marginRight: -this.rightSide/2 });
	    this.onLabel.css({ width: this.rightSide/2 + 4 });
	    this.onSpan.css({ marginLeft: -this.rightSide/2 });
	    break;
	}
    
    if (this.$elem.is(':disabled')) {
      this.container.addClass(this.disabledClass);
    }
  }
});

// jQuery-specific code
$.fn[iphoneStyleTriToggle] = function(options) {
  var selects = this.filter('select');
  
  // Fail early if we don't have any selects passed in
  if (!selects.length) { return this; }
  
  // Merge options passed in with global defaults
  var opt = $.extend({}, $[iphoneStyleTriToggle].defaults, options);
  
  selects.each(function() {
    $(this).data(iphoneStyleTriToggle, new $[iphoneStyleTriToggle](this, opt));
  });

  if (!$[iphoneStyleTriToggle].initComplete) {
    // As the mouse moves on the page, animate if we are in a drag state
    $(document)
      .bind('mousemove touchmove', function(event) {
        if (!$[iphoneStyleTriToggle].currentlyClicking) { return; }
        event.preventDefault();
        
        var x = event.pageX || event.originalEvent.changedTouches[0].pageX;
        if (!$[iphoneStyleTriToggle].dragging &&
            (Math.abs($[iphoneStyleTriToggle].dragStartPosition - x) > opt.dragThreshold)) { 
          $[iphoneStyleTriToggle].dragging = true; 
        }
		
        $(event.target).trigger('iPhoneDrag', [x]);
      })

      // When the mouse comes up, leave drag state
      .bind('mouseup touchend', function(event) {        
        if (!$[iphoneStyleTriToggle].currentlyClicking) { return; }
        event.preventDefault();
    
        var x = event.pageX || event.originalEvent.changedTouches[0].pageX;
        $($[iphoneStyleTriToggle].currentlyClicking).trigger('iPhoneDragEnd', [x]);
      });
      
    $[iphoneStyleTriToggle].initComplete = true;
	
  }
  
  return this;
}; // End of $.fn[iphoneStyleTriToggle]

$[iphoneStyleTriToggle].defaults = {
  duration:          200,                       // Time spent during slide animation
  checkedLabel:      'ON',                      // Text content of "on" state
  uncheckedLabel:    'OFF',                     // Text content of "off" state
  resizeHandle:      true,                      // Automatically resize the handle to cover either label
  resizeContainer:   true,                      // Automatically resize the widget to contain the labels
  disabledClass:     'iPhoneTriToggleDisabled',
  containerClass:    'iPhoneTriToggleContainer',
  labelOnClass:      'iPhoneTriToggleLabelOn',
  labelOffClass:     'iPhoneTriToggleLabelOff',
  handleClass:       'iPhoneTriToggleHandle',
  handleCenterClass: 'iPhoneTriToggleHandleCenter',
  handleRightClass:  'iPhoneTriToggleHandleRight',
  dragThreshold:     5                          // Pixels that must be dragged for a click to be ignored
};

})(jQuery, 'iphoneStyleTriToggle');
