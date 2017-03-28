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
    var hasData = button.dataset.project

    if(typeof hasData != 'undefined' && window.innerWidth >= 1155) {
        return this.callProject(button,_this)
    }

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

App.prototype.callProject = function(button, _this) {


    var link = button.href;
    $("body").removeClass();
    $(button).parent().addClass('active');

    var elements = [
        document.querySelector('.section-container-title'),
        document.querySelector('.project-card.active .project-card_arrow'),
        document.querySelector('.project-card.active h2'),
        document.querySelector('.project-card.active p')
    ];
    var projects = document.querySelectorAll('.project-card');

    for(var i=0;i<projects.length; i++) {

        if(!$(projects[i]).hasClass('active')) {
            TweenMax.to(projects[i],0.3,{opacity:0})
        }
    }
    TweenMax.staggerTo(elements,0.3,{opacity:0},0.1)

    setTimeout(function() {

        button.style.width = button.offsetWidth + 'px'
        button.style.position = 'fixed'
        button.style.margin = 'auto'

        button.style.left = button.offsetLeft + 'px'
        button.style.right = button.offsetLeft + button.offsetWidth + 'px'

        var top = button.offsetTop - $(document).scrollTop();
        button.style.top = top + 'px'

        $(button).addClass('section-container')
        TweenMax.to(button,0.4,{top:'400px'})


        $(".temporary-DOM").append(button)
        transitions.toTop(function() {

            var timeline = new TimelineMax({onComplete: function() {

                $.get(link + '?ajax=1', function (data) {
                    var html = JSON.parse(data).html;
                    var bodyClass = JSON.parse(data).class;


                    $(_this.app).html(html);
                    $("body").addClass(bodyClass);

                    window.history.pushState({}, " ", link)
                    TweenMax.staggerFromTo([
                        document.querySelector('.single .section-container'),
                        document.querySelector('.single .single-background')
                    ],0.5,{opacity:0},{opacity:1},1);


                    $("#app .ajax-link").on('click', function (e) {
                        e.preventDefault()
                        _this.callPage(this, _this)
                    })

                    setTimeout(function() {
                        document.querySelector(".temporary-DOM").innerHTML = ""
                    },500)
                })
            }})


            timeline
                .to(button,0.8,{left:'0',right:'0',width:'100%',zIndex:'100'})

        })
    },400)
}