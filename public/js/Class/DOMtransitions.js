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

DOMtransitions.prototype.checkPage = function(className) {
    if(className == 'body-home') this.projects()
}

DOMtransitions.prototype.projects = function() {

    TweenMax.set('.projects-list', {marginTop:'300px'})
    TweenMax.set('.section-container-title h1 span', {color:'black'})
    TweenMax.set('.projects-list', {marginTop:'300px'})
    TweenMax.set('.project-card', {opacity:0})
    TweenMax.set('.project-card', {top:'-50px'})
    setTimeout(function() {
        $(".section-container-title h1").addClass('active')
    },100)
    setTimeout(function() {
        TweenMax.staggerFromTo('.section-container-title h1 span',0.5, {color:'black'},{color:'white'},0.2)
    },300)

    setTimeout(function() {
        TweenMax.fromTo('.projects-list',0.3, {marginTop:'340px'},{marginTop:'360px'})
        TweenMax.staggerFromTo('.project-card',0.4, {opacity:0},{opacity:1},0.05)
        TweenMax.staggerFromTo('.project-card',0.5, {top:'-50px'},{top:0},0.1)
    },500)
}

DOMtransitions.prototype.toTop = function() {
    var scrollTop = $("body").scrollTop();
    var to = {current:scrollTop}
    TweenMax.to(to,0.5,{current:0, onUpdate:function() {
        $("body").scrollTop(to.current)
    }})
}

DOMtransitions.prototype.onscrollProject = function() {
    var scrollTop = $("body").scrollTop()
    var height = $("body").height()

    var percent = scrollTop/height
    var top = 60 - (20 * percent)
    TweenMax.to('.single-background',0.1,{top:top+'vh'})
}