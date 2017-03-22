var App = function() {
    this.app = "#app";
}

App.prototype.bind = function() {
    document.querySelector('.close-nav').addEventListener('click', transitions.toggleNav)
    document.querySelector('.open-nav').addEventListener('click', transitions.toggleNav)

    window.addEventListener('scroll',function() {
        transitions.onscrollProject()
    })
    this.bindAppLinks();
}

App.prototype.init = function(bodyClass) {

    bodyClass = bodyClass || document.querySelector('body').className;
    TweenMax.fromTo('body',0.5,{opacity:0},{opacity:1});
    transitions.checkPage(bodyClass);


    $(".to-top").on('click', function(e) {
        e.preventDefault();
        transitions.toTop()
    })
}

App.prototype.bindAppLinks = function() {
    var _this = this
    $(".ajax-link").on('click',function(e) {
        e.preventDefault()

        _this.callPage(this,_this)
    })
}

App.prototype.callPage = function(button,_this) {
    var link = button.href
    $("body").removeClass();
    TweenMax.fromTo('body',0.4,{opacity:1},{opacity:0,onComplete:function() {
        document.querySelector('body').scrollTop = 0
        $.get(link + '?ajax=1',function(data) {
            var html = JSON.parse(data).html;
            var bodyClass = JSON.parse(data).class;

            $(_this.app).html(html);
            $("body").addClass(bodyClass);

            window.history.pushState({}," ",link)
            _this.init(bodyClass)

            $("#app .ajax-link").on('click',function(e) {
                e.preventDefault()
                _this.callPage(this,_this)
            })

        })
    }});
}