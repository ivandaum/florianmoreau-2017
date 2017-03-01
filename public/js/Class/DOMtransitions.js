var DOMtransitions = function() {}

DOMtransitions.prototype.projectPreview = {
    className:'hovered',
    fadein: function(link) {
        if(!hasClass(link.parentNode,this.className)) {
            addClass(link.parentNode,this.className)
        }
    },
    fadeout: function(link) {
        if(hasClass(link.parentNode,this.className)) {
            removeClass(link.parentNode,this.className)
        }

    }
}