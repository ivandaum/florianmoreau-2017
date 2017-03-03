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

DOMtransitions.prototype.toggleNav = function() {
    var className = 'navbar-open', body = document.querySelector('body')

    var state = {
        init: {
            nav:{left:'-100%',ease:Quart.easeInOut},
            app:{marginLeft:'0px',opacity:1,ease:Quart.easeInOut}
        },
        end: {
            nav:{left:'0',ease:Quart.easeInOut},
            app:{marginLeft:'200px',opacity:0.3,ease:Quart.easeInOut}
        }
    }
    if(!hasClass(body,className)) {
        addClass(body,className)

    } else {
        removeClass(body,className)
    }
}