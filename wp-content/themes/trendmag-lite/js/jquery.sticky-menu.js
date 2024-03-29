!function (t) {
    var e = Array.prototype.slice, r = Array.prototype.splice, i = {topSpacing:0, bottomSpacing:0, className:"is-sticky", wrapperClassName:"sticky-wrapper", center:!1, getWidthFrom:"", widthFromWrapper:!0, responsiveWidth:!1}, n = t(window), s = t(document), o = [], a = n.height(), c = function () {
        for (var e = n.scrollTop(), r = s.height(), i = r - a, c = e > i ? i - e : 0, p = 0; p < o.length; p++) {
            var l = o[p], u = l.stickyWrapper.offset().top, d = u - l.topSpacing - c;
            if (d >= e)null !== l.currentTop && (l.stickyElement.css({width:"", position:"", top:""}), l.stickyElement.parent().removeClass(l.className), l.stickyElement.trigger("sticky-end", [l]), l.currentTop = null); else {
                var h = r - l.stickyElement.outerHeight() - l.topSpacing - l.bottomSpacing - e - c;
                if (0 > h ? h += l.topSpacing : h = l.topSpacing, l.currentTop != h) {
                    var g;
                    l.getWidthFrom ? g = t(l.getWidthFrom).width() || null : l.widthFromWrapper && (g = l.stickyWrapper.width()), null == g && (g = l.stickyElement.width()), l.stickyElement.css("width", g).css("position", "fixed").css("top", h), l.stickyElement.parent().addClass(l.className), null === l.currentTop ? l.stickyElement.trigger("sticky-start", [l]) : l.stickyElement.trigger("sticky-update", [l]), l.currentTop === l.topSpacing && l.currentTop > h || null === l.currentTop && h < l.topSpacing ? l.stickyElement.trigger("sticky-bottom-reached", [l]) : null !== l.currentTop && h === l.topSpacing && l.currentTop < h && l.stickyElement.trigger("sticky-bottom-unreached", [l]), l.currentTop = h
                }
            }
        }
    }, p = function () {
        a = n.height();
        for (var e = 0; e < o.length; e++) {
            var r = o[e], i = null;
            r.getWidthFrom ? r.responsiveWidth === !0 && (i = t(r.getWidthFrom).width()) : r.widthFromWrapper && (i = r.stickyWrapper.width()), null != i && r.stickyElement.css("width", i)
        }
    }, l = {init:function (e) {
        var r = t.extend({}, i, e);
        return this.each(function () {
            var e = t(this), n = e.attr("id"), s = e.outerHeight(), a = n ? n + "-" + i.wrapperClassName : i.wrapperClassName, c = t("<div></div>").attr("id", a).addClass(r.wrapperClassName);
            e.wrapAll(c);
            var p = e.parent();
            r.center && p.css({width:e.outerWidth(), marginLeft:"auto", marginRight:"auto"}), "right" == e.css("float") && e.css({"float":"none"}).parent().css({"float":"right"}), p.css("height", s), r.stickyElement = e, r.stickyWrapper = p, r.currentTop = null, o.push(r)
        })
    }, update:c, unstick:function (e) {
        return this.each(function () {
            for (var e = this, i = t(e), n = -1, s = o.length; s-- > 0;)o[s].stickyElement.get(0) === e && (r.call(o, s, 1), n = s);
            -1 != n && (i.unwrap(), i.css({width:"", position:"", top:"", "float":""}))
        })
    }};
    window.addEventListener ? (window.addEventListener("scroll", c, !1), window.addEventListener("resize", p, !1)) : window.attachEvent && (window.attachEvent("onscroll", c), window.attachEvent("onresize", p)), t.fn.sticky = function (r) {
        return l[r] ? l[r].apply(this, e.call(arguments, 1)) : "object" != typeof r && r ? void t.error("Method " + r + " does not exist on jQuery.sticky") : l.init.apply(this, arguments)
    }, t.fn.unstick = function (r) {
        return l[r] ? l[r].apply(this, e.call(arguments, 1)) : "object" != typeof r && r ? void t.error("Method " + r + " does not exist on jQuery.sticky") : l.unstick.apply(this, arguments)
    }, t(function () {
        setTimeout(c, 0)
    })
}(jQuery);
