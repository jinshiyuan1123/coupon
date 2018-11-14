/*! portal-pc-static - git - 2018-08-28 14:04:35 */
Function.prototype.bind || (Function.prototype.bind = function() {
    var e = arguments,
    t = this;
    return function() {
        var i = Array.prototype.slice;
        t.call.apply(t, i.call(e).concat(i.call(arguments)))
    }
}),
function(e, t) {
    var i = {
        modules: {
            autocomplete: [$GC.jsCPath + "/jquery.ui.core.js", $GC.jsCPath + "/jquery.ui.autocomplete.js?_=" + $GC.version],
            select2: $GC.jsCPath + "/select2.js?_=" + $GC.version,
            focusSlider: $GC.jsCPath + "/jquery.focus.slider.js?_=" + $GC.version,
            fastMenu: $GC.jsCPath + "/jquery.menu.js",
            bxslider: $GC.jsCPath + "/jquery.bxslider.js",
            citypicker: $GC.jsCPath + "/gl-citypicker.js",
            areapicker: $GC.jsCPath + "/jquery-gl-areapicker.js?_=" + $GC.version,
            crypt: $GC.jsCPath + "/jquery.crypt.js",
            RSACrypt: $GC.jsCPath + "/rsa.crypt.js",
            datepicker: [$GC.jsCPath + "/jquery.ui.core.js", $GC.jsCPath + "/jquery.ui.datepicker.js"],
            jcrop: $GC.jsCPath + "/jquery.Jcrop.js",
            pagination: $GC.jsCPath + "/jquery-gl-pagination.js",
            schedule: $GC.jsCPath + "/jquery-gl-schedule.js?_=" + $GC.version,
            "schedule-temp": $GC.jsCPath + "/jquery-gl-schedule-temp.js?_=" + $GC.version,
            swfupload: $GC.jsCPath + "/swfupload.js?_=" + $GC.version,
            iframeUpload: $GC.jsCPath + "/jquery.iframe.upload.js?_=" + $GC.version,
            tooltip: $GC.jsCPath + "/tooltip.js",
            datehelper: $GC.jsCPath + "/datehelper.js",
            validator: $GC.jsCPath + "/validator.js?_=20160129",
            highlight: $GC.jsCPath + "/jquery.highlight.js",
            json2: $GC.jsCPath + "/json2.js",
            cookie: $GC.jsCPath + "/jquery.cookie.js",
            jqeasing: $GC.jsCPath + "/jquery.easing.js",
            aTpl: $GC.jsCPath + "/aTpl.js",
            socket: $GC.jsCPath + "/socket.io.js?_=" + $GC.version,
            chart: $GC.jsCPath + "/chart.js?_=" + $GC.version,
            xssfix: $GC.jsCPath + "/xssfix.js",
            jqtmpl: $GC.jsCPath + "/jquery.tmpl.js",
            placeholder: $GC.jsCPath + "/jquery.placeholder.js",
            wowjs: $GC.jsCPath + "/wow.js",
            poshytip: $GC.jsCPath + "/jquery.poshytip.js",
            nicescroll: $GC.jsCPath + "/jquery.nicescroll.min.js",
            modal: $GC.jsCPath + "/jquery-gl-modal.js?_=" + $GC.version,
            collapse: [$GC.jsCPath + "/jquery.collapse.js", $GC.jsCPath + "/jquery.collapse_storage.js", $GC.jsCPath + "/jquery.collapse_cookie_storage.js"],
            aes: [$GC.jsCPath + "/aes.js", $GC.jsCPath + "/crypto.js"],
            area: $GC.jsCPath + "/area.js",
            dialog: $GC.jsCPath + "/dialog.js",
            uploadThumbnail: $GC.staticServer + "/upload-thumbnail.js?_=" + $GC.version,
            ueditor: $GC.staticServer + "/ueditor.all.min.js?_=" + $GC.version,
            photoview: $GC.jsCPath + "/photoView.js?_=" + $GC.version,
            PGC: $GC.jsCPath + "/pPassGuardCtrl.js?_=" + $GC.version,
            "crypto-js": $GC.jsCPath + "/crypto-js.js",
            pgwModal: $GC.jsCPath + "/pgwmodal.js",
            lazyLoad: $GC.staticServer + "/jquery.lazyload.js?_=" + $GC.version,
            qrGenerator: $GC.jsCPath + "/qrcode.js?_=" + $GC.version
        },
        adaptModule: function(e) {
            return e ? $GC.jspath + "/modules/" + e + ".js?_=" + $GC.version: ""
        },
        dispatcher: function(t, i) {
            var n = e(t);
            n.length && i(n).init()
        },
        run: function(i, n, o) {
            o && !e("#g-cfg").hasClass(o) || (n instanceof Array && n.length > 0 ? t.load(n, i) : i.call(null))
        },

    };
    window.GH = i
} (jQuery, GL),
$.extend($GC, {
    shensuMail: "shensu@guahao.com",
    glRating: {
        empty: ["<em>非常不满意</em>", "<em>不满意</em>", "<em>一般</em>", "<em>满意</em>", "<em>非常满意</em>"],
        mGuide: ["<em>非常不满意</em>导医态度恶劣，标示非常不清楚", "<em>不满意</em>问询无人搭理，标示不清楚", "<em>一般</em>服务不冷不热，标示还算清楚", "<em>满意</em>服务主动、耐心，标示清楚", "<em>非常满意</em>服务耐心、细致、主动，标示非常清楚、易懂"],
        mDoctor: ["<em>非常不满意</em>敷衍了事，不尊重人", "<em>不满意</em>态度冷淡，不会再来了", "<em>一般</em>态度不冷不热", "<em>满意</em>态度和蔼", "<em>非常满意</em>态度和蔼，认真负责，专业细致"],
        treat: ["<em>非常不满意</em>没有效果，还得去找别的医生", "<em>不满意</em>疗效不明显", "<em>一般</em>疗效还行，马马虎虎", "<em>满意</em>疗效不错", "<em>非常满意</em>对症下药，疗效显著"],
        wTime: ["<em>非常慢</em>三个小时以上，让我非常恼火", "<em>很慢</em>2~3个小时，感觉不耐烦", "<em>一般</em>1~2小时，勉强还能忍受", "<em>还算快</em>30分钟~1小时，还可以", "<em>非常快</em>30分钟不到，就看到医生了"]
    }
}),
GreenLine.Util = {
    fpCode: 0,
    isEmbedFrame: function() {
        return $("#embed-frame").length > 0
    },
    setSelectVal: function(e, t) {
        GreenLine.Util.isIE6() ? setTimeout(function() {
            e.val(t)
        },
        1) : e.val(t)
    },
    animate: function(e, t) {
        if ("transform" in document.documentElement.style || "MozTransform" in document.documentElement.style || "WebkitTransform" in document.documentElement.style || "OTransform" in document.documentElement.style || "msTransform" in document.documentElement.style) {
            var t = t;
            e.each(function() {
                t || (t = $(this).data("animate-cls")),
                t && ($("html").css("overflow-x", "hidden"), $(this).show().addClass(t).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
                function() {
                    $(this).removeClass(t),
                    $("html").css("overflow-x", "auto")
                }))
            })
        } else e.show()
    },
    ipGeo: function(e, t) {
        function i() {
            var e = $.cookie("_ipgeo"),
            t = $.cookie("_fo_opt");
            if (t && (e = t), e) {
                for (var i = e.split("|"), n = {},
                o = 0; o < i.length; o++) if ("" != i[o] && o < 2) {
                    var a = i[o].split(":");
                    n[a[0]] = a[1]
                }
                return n
            }
            return null
        }
        var n = i();
        n ? e.call(t, n) : $.ajax({
            url: $GC.serviceServer + "/location/get?_=1459150667808",
            success: function(i) {
                i.success && ($.cookie("_ipgeo", "province:" + (i.data.province || "上海") + "|city:" + (i.data.city || ""), {
                    expires: 100,
                    path: "/"
                }), e.call(t, {
                    province: i.data.province || "上海",
                    city: i.data.city || ""
                }))
            }
        })
    },
    iwant: {
        init: function() {
            var e = this;
            e.ads($("head meta[name=adsKeywords]")),
            e.experts($("head meta[name=adsExpertKeywords]"))
        },
        _adTmpl: '<img alt="<%=this.title%>" src="<%=this.img%>"/>',
        _adLinkTmpl: '<a monitor="activity,picadv,adv" target="_blank" href="<%=this.link%>"><img alt="<%=this.title%>" src="<%=this.img%>" /></a>',
        _adCode: {
            1 : "BNR",
            2 : "GGW_"
        },
        _adRender: function(e, t, i) {
            var n = this;
            t.img && "" != t.img && (t.code = n._adCode[e.data("pos")], t.link && "" != t.link ? (t.index = i, e.append($GU.compileTmpl(n._adLinkTmpl, t))) : e.append($GU.compileTmpl(n._adTmpl, t)))
        },
        _adTopRender: function(e) {
            var t = this;
            if (e.length > 0) {
                var e = e[0];
                if (e.img && "" != e.img) {
                    e.code = t._adCode[1];
                    var i = $("<div/>", {
                        "class": "g-top-ads"
                    });
                    $("<i/>").appendTo(i).on("click",
                    function() {
                        return i.slideUp(),
                        $.cookie("_top_ads_disabled", !0, {
                            domain: $GC.domainEnd,
                            expires: 1,
                            path: "/"
                        }),
                        !1
                    }),
                    e.link && "" != e.link ? i.append($GU.compileTmpl(t._adLinkTmpl, e)) : i.append($GU.compileTmpl(t._adTmpl, e)),
                    i.find("img").error(function() {
                        i.remove()
                    }),
                    i.css({
                        backgroundColor: e.backColor
                    }),
                    $("#J_notify").length ? $("#J_notify").after(i) : $("body").prepend(i),
                    setTimeout(function() {
                        i.slideDown()
                    },
                    200)
                }
            }
        },
        ads: function(e) {
            var t = "1" == $("#g-cfg").data("top-ads") && !$.cookie("_top_ads_disabled");
            if (0 !== $(".J_Promotions").length || t) {
                var i = this,
                n = "/iwant/promotion?q=" + (e.attr("content") || "") + "&pos=",
                o = [],
                a = [];
                $(".J_Promotions").each(function(e, t) {
                    o.push($(t).data("pos")),
                    a.push($(t).data("rows"))
                }),
                t && (o.push("1"), a.push("1")),
                n += o.join(",") + "&rows=" + a.join(","),
                $.ajax({
                    url: n,
                    dataType: "json",
                    cache: !1,
                    success: function(e) {
                        if (!e || e.hasError || !e.data) return $(".J_Promotions").remove(),
                        !1;
                        var n = e.data;
                        $(".J_Promotions").each(function(e, t) {
                            var o = $(t),
                            a = n[o.data("pos")];
                            if (a && a.length) {
                                for (var s = 0; s < a.length; s++) i._adRender(o, a[s], s + 1);
                                o.find("img").length ? o.fadeIn("") : o.remove(),
                                o.find("img").error(function() {
                                    o.remove()
                                })
                            }
                        }),
                        t && i._adTopRender(n[1])
                    },
                    error: function() {
                        $(".J_Promotions").remove()
                    }
                })
            }
        },
        _expertRender: function(e, t) {
            null != e.data("type") && "consult" == e.data("type") && (1 != t.isImageText && (t.img = "hide"), 1 != t.isPhone && (t.tel = "hide"), 1 != t.isVideo && (t.video = "hide"), t.totalCount = "" + t.totalConsultCount),
            t.departmentUuid = "",
            t.hospitalDepartmentId.length && (t.departmentUuid = t.hospitalDepartmentId[0]),
            t.departmentName = "",
            t.hospitalDepartmentName.length && (t.departmentName = $GU.truncate(t.hospitalDepartmentName, 10)),
            t.feature = $GU.truncate(t.feature, 52),
            t.hospitalName = $GU.truncate(t.hospitalName, 10),
            t.doctorShortName = $GU.truncate(t.doctorName, 4),
            e.append($GU.compileTmpl(e.find("script").html(), t))
        },
        experts: function(e) {
            var t = this;
            e.length && $.ajax({
                url: "/iwant/experts?q=" + e.attr("content"),
                dataType: "json",
                cache: !1,
                success: function(e) {
                    if (!e || e.hasError) return $(".J_ExpertAds").remove(),
                    !1;
                    var i = e.data,
                    n = i.length;
                    n ? $(".J_ExpertAds").each(function(e, o) {
                        for (var a = $(o), s = 0; s < n; s++) t._expertRender(a, i[s]);
                        a.fadeIn().find("script").remove()
                    }) : $(".J_ExpertAds").remove()
                },
                error: function() {
                    $(".J_ExpertAds").remove()
                }
            })
        }
    },
    upload: {
        certImgs: [],
        uploadInit: function(e) {
            var t = this;
            e = e || 6,
            $(".J_CertUpload").on("click",
            function() {
                return ! $(this).hasClass("uploading") && (t.certImgs.length === e ? ($GM.smartAlert("抱歉，最多只能上传" + e + "张图片。"), $(".J_CertUpload").val(""), !1) : void 0)
            }),
            $("body").on("click", ".J_RemoveImg",
            function() {
                for (var e = $(this).data("url"), i = 0; i < t.certImgs.length; i++) if (e === t.certImgs[i]) {
                    t.certImgs.splice(i, 1);
                    break
                }
                $("#J_HiddenCertImgs").val(t.certImgs.join(",")),
                $(this).parent().remove()
            }),
            this.uploadCore()
        },
        uploadCore: function() {
            var e = this,
            t = $(".J_CertUpload").data("url");
            $(".J_CertUpload").ajaxfileupload({
                action: t,
                sizes: 2048,
                onStart: function() {
                    $(".J_UploadText").text("正在上传..."),
                    $(".J_CertUpload").addClass("uploading")
                },
                onComplete: function(t) {
                    if ($(".J_UploadText").text("上传图片资料"), $(".J_CertUpload").removeClass("uploading"), t && t.status === !1) return $GM.smartAlert(t.message),
                    void $(".J_CertUpload").val("");
                    if ("string" == typeof t) try {
                        t = JSON.parse(t)
                    } catch(i) {
                        return $GM.smartAlert("抱歉，上传失败。"),
                        void $(".J_CertUpload").val("")
                    }
                    return ! t || t.hasError ? ($GM.smartAlert(t && t.message || "抱歉，上传失败。"), void $(".J_CertUpload").val("")) : (e.certImgs.push(t.data), e.previewImg(t.data), $.browser.msie ? ($(".J_CertUpload").replaceWith('<input type="file" name="certificate1" class="upload-input J_CertUpload">'), e.iframeUpload()) : $(".J_CertUpload").val(""), $("#J_HiddenCertImgs").val(e.certImgs.join(",")), void $(".certificate1ErrorMsg").hide())
                }
            })
        },
        previewImg: function(e) {
            var t = $(".J_CertUpload")[0],
            i = null;
            if (t.files && t.files[0]) {
                i = $('<div class="preview-item"><img class="preview-img"><a href="javascript:;" class="J_RemoveImg" data-url="' + e + '"></a></div>').appendTo(".J_CertPreview");
                var n = i.find(".preview-img"),
                o = new FileReader;
                o.onload = function(e) {
                    n[0].src = e.target.result
                },
                o.readAsDataURL(t.files[0])
            } else {
                i = $('<div class="preview-item"><div class="preview-img"></div><a href="javascript:;" class="J_RemoveImg" data-url="' + e + '"></a></div>').appendTo(".J_CertPreview");
                var a = i.find(".preview-img");
                t.select(),
                t.blur();
                var s = document.selection.createRange().text;
                try {
                    a[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = s
                } catch(r) {
                    $GM.smartAlert("文件格式不正确，请重新选择")
                }
            }
        }
    },
    monitor: {
        link: function(e, t) {
            return (new Image).src = GreenLine.Log.url + "lt=1&from=" + encodeURIComponent(location.href) + "&to=" + encodeURIComponent(e) + "&mod=" + t + "&info=" + GreenLine.Log.loginId + "~|~" + GreenLine.Log.perSessiionId + "~|~" + GreenLine.Log.shortSessionId + "~|~" + GreenLine.Util.fpCode + "&_=" + (new Date).getTime(),
            !0
        },
        action: function(e) {
            return (new Image).src = GreenLine.Log.url + "lt=2&page=" + encodeURIComponent(location.href) + "&action=" + e + "&info=" + GreenLine.Log.loginId + "~|~" + GreenLine.Log.perSessiionId + "~|~" + GreenLine.Log.shortSessionId + "~|~" + GreenLine.Util.fpCode + "&_=" + (new Date).getTime(),
            !0
        },
        info: function(e, t) {
            return (new Image).src = GreenLine.Log.url + "lt=3&page=" + encodeURIComponent(location.href) + "&code=" + t + "&msg=" + encodeURIComponent(e) + "&info=" + GreenLine.Log.loginId + "~|~" + GreenLine.Log.perSessiionId + "~|~" + GreenLine.Log.shortSessionId + "~|~" + GreenLine.Util.fpCode + "&_=" + (new Date).getTime(),
            !0
        },
        trackSource: function() {
            var e = $GU.getURLParam("trackSource") || $GU.getURLParam("_f");
            e && $.cookie("_track_source", e, {
                domain: $GC.domainEnd,
                expires: 1,
                path: "/"
            })
        }
    },
    logs: function(e, t, i, n) {
        return ! 0
    },
    aesEncrypt: function(e, t, i) {
        var n = CryptoJS.enc.Utf8.parse(e),
        o = CryptoJS.enc.Utf8.parse(t),
        a = CryptoJS.enc.Utf8.parse(i),
        s = CryptoJS.AES.encrypt(n, o, {
            iv: a,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Iso10126
        });
        return CryptoJS.enc.Base64.stringify(s.ciphertext).replace(new RegExp("=", "gm"), "_")
    },
    getURLParam: function(e) {
        var t = {},
        i = location.href,
        n = i.indexOf("?");
        if (n !== -1) {
            var o = i.substring(i.indexOf("?") + 1);
            o = o.split("&");
            for (var a = 0; a < o.length; a++) {
                var s = o[a];
                s = s.split("="),
                t[s[0]] = decodeURIComponent(s[1])
            }
            return e ? t[e] : t
        }
    },
    isIE: function() {
        return !! $.browser.msie
    },
    isIE6: function() {
        return GreenLine.Util.isIE() && 6 === parseInt($.browser.version)
    },
    isIE7: function() {
        return GreenLine.Util.isIE() && 7 === parseInt($.browser.version)
    },
    isIE8: function() {
        return GreenLine.Util.isIE() && 8 === parseInt($.browser.version)
    },
    isIE9: function() {
        return GreenLine.Util.isIE() && 9 === parseInt($.browser.version)
    },
    isIE10: function() {
        return GreenLine.Util.isIE() && 10 === parseInt($.browser.version)
    },
    truncate: function(e, t) {
        return e && e.length > t && (e = e.substring(0, t) + "..."),
        e
    },
    maskStr: function(e, t, i) {
        return e.substring(0, t - 1) + e.substring(t - 1, i).replace(/./g, "*") + e.substring(i)
    },
    htmlspecialchars: function(e) {
        return e.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&apos;")
    },
    htmlspecialcharsDecode: function(e) {
        return e.replace(/&amp;/g, "&").replace(/&lt;/g, "<").replace(/&gt;/g, ">").replace(/&quot;/g, '"').replace(/&apos;/g, "'")
    },
    htmlentities: function(e) {
        var t = document.createElement("textarea");
        return t.innerHTML = e,
        t.innerHTML
    },
    htmlentitiesDecode: function(e) {
        var t = document.createElement("textarea");
        return t.innerHTML = e,
        t.value
    },
    htmlStrip: function(e) {
        var t = document.createElement("DIV");
        return t.innerHTML = e,
        t.textContent || t.innerText || ""
    },
    checkSubdomain: function(e) {
        return ! (!$(".g-wrapper").attr("id") || $(".g-wrapper").attr("id").indexOf(e) < 0)
    },
    checkPageName: function(e) {
        return $("#gc").find("[data-page]").data("page") == e
    },
    refreshCaptcha: function(e, t) {
        if (e.length && t.length) {
            var i = t.attr("src"),
            n = i.lastIndexOf("/");
            if (n > 0) {
                var o = i.substring(0, n + 1);
                e.on("click",
                function() {
                    t.attr("src", o + Math.floor(1e7 * Math.random()))
                })
            }
        }
    },
    compileTmpl: function(e, t) {
        var i = /<%=this\.([^%>]+)%>/g;
        return e.replace(i,
        function() {
            return t && t[arguments[1]] || ""
        })
    },
    getBirthdayAndSexByIdNo: function(e) {
        return 15 == e.length ? this.parse15Id(e) : 18 == e.length ? this.parse18Id(e) : new Array(null, null)
    },
    parse15Id: function(e) {
        var t, i = new RegExp(/^(\d{6})(\d{2})(\d{2})(\d{2})(\d{3})$/),
        n = e.match(i),
        o = "19" + n[2] + "-" + n[3] + "-" + n[4];
        return t = e.substr(14, 1) % 2 == 0 ? 2 : 1,
        new Array(o, t)
    },
    parse18Id: function(e) {
        var t, i = new RegExp(/^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X|x)$/),
        n = e.match(i),
        o = n[2] + "-" + n[3] + "-" + n[4];
        return t = e.substr(16, 1) % 2 == 0 ? 2 : 1,
        new Array(o, t)
    },
    getAge: function(e) {
        var t = e.substring(0, 4) + "/" + e.substring(4, 6) + "/" + e.substring(6, 8),
        e = new Date(t),
        i = new Date,
        n = i.getFullYear() - e.getFullYear() - (i.getMonth() < e.getMonth() || i.getMonth() == e.getMonth() && i.getDate() < e.getDate() ? 1 : 0);
        return n
    },
    Button: {
        setText: function(e, t) {
            t && (e.find(".gb-text").length > 0 ? e.find(".gb-text").html(t) : e.find("span").length > 0 ? e.find("span").html("<i></i>" + t) : e.text(t))
        },
        disable: function(e, t) {
            e.data("disabled", !0),
            e.hasClass("gbn") || e.hasClass("gbs") || e.hasClass("gbb") ? e.addClass("gbt-off") : e.hasClass("btn") && e.addClass("disabled"),
            this.setText(e, t)
        },
        enable: function(e, t) {
            e.removeData("disabled"),
            e.hasClass("gbn") || e.hasClass("gbs") || e.hasClass("gbb") ? e.removeClass("gbt-off") : e.hasClass("btn") && e.removeClass("disabled"),
            this.setText(e, t)
        },
        isActive: function(e) {
            return ! e.data("disabled")
        }
    },
    request: function() {
        var e = {};
        return function(t) {
            t || (t = {});
            var i = t.url || "",
            n = i + "|" + JSON.stringify(t.data);
            if (n in e) return ! 1;
            e[n] = !0;
            var o = {
                url: i,
                cache: !1,
                dataType: "json",
                success: function(e) {
                    e && 1 != e.hasError ? a && a.call(null, e) : ($GM.smartAlert(e && e.message || "操作失败"), s && s.call(null, e, !0))
                },
                error: function(e) {
                    window.console && console.log(e),
                    "abort" !== e.statusText && $GM.smartAlert("网络连接失败"),
                    s && s.call(null, e)
                },
                complete: function() {
                    delete e[n],
                    r && r.call(null)
                }
            },
            a = t.fulfilled || t.success,
            s = t.rejected || t.error,
            r = t.always || t.complete;
            return delete t.success,
            delete t.error,
            delete t.complete,
            $.extend(o, t),
            $.ajax(o)
        }
    } (),
    autoHeight: function(e, t) {
        if (e.length && (e = e[0]), !e || 1 !== e.nodeType) return ! 1;
        var i, n = e.offsetHeight;
        t || (t = "height 0.24s ease-out"),
        e.style.height = n + "px",
        setTimeout(function() {
            e.style.transition = "none",
            e.style.height = "auto",
            i = e.offsetHeight,
            e.style.height = n + "px",
            e.offsetHeight,
            e.style.transition = t,
            e.style.height = i + "px"
        },
        0)
    },
    splitPage: function(e, t, i) { ! i && (i = 5);
        for (var n = Math.min(Math.max(e, Math.ceil(i / 2)) + Math.floor(i / 2), t), o = Math.max(n - i + 1, 1), a = {},
        s = o; s < n + 1; a[s] = s == e, s++);
        return a
    },
    getTime: function(e, t) {
        var i = "number" == typeof t || t instanceof Date ? new Date(t) : new Date,
        n = {
            y: i.getFullYear(),
            m: i.getMonth() + 1,
            d: i.getDate(),
            h: i.getHours(),
            i: i.getMinutes(),
            s: i.getSeconds()
        };
        for (var o in n) n[o.toUpperCase()] = (n[o] < 10 ? "0": "") + n[o];
        if (n.w = i.getDay(), n.W = "日一二三四五六".substr(n.w, 1), n.timestamp = i.getTime(), n.date = i, "string" == typeof e) {
            for (var o in n) e = e.replace(new RegExp("(" + o + ")", "g"),
            function(e, t) {
                return n[t]
            });
            return e
        }
        return n
    },
    Viewer: function() {
        function e(e, t) {
            var i = {
                duration: 300,
                active: "active",
                transition: "transition"
            };
            this.options = $.extend({},
            i, t),
            this.timer = {
                show: -1,
                hide: -1
            },
            this.elem = e
        }
        return e.prototype = {
            show: function() {
                clearTimeout(this.timer.show),
                clearTimeout(this.timer.hide),
                this.elem.addClass(this.options.active),
                this.timer.show = setTimeout(function() {
                    this.elem.addClass(this.options.transition)
                }.bind(this), 20)
            },
            hide: function(e) {
                clearTimeout(this.timer.show),
                clearTimeout(this.timer.hide),
                this.elem.removeClass(this.options.transition),
                this.timer.hide = setTimeout(function() {
                    this.elem.removeClass(this.options.active),
                    "function" == typeof e && e()
                }.bind(this), this.options.duration)
            }
        },
        e
    } (),
    sendMobileMsg: function(e, t) {
        function i(e, i, n) {
            $GUB.setText(e, t.text1 || "60秒后重发");
            var o = 60,
            a = setInterval(function() {--o <= 0 ? ($GUB.enable(e, t.text2 || "重发"), i && i.hide(), n && n.hide(), clearInterval(a)) : $GUB.setText(e, o + t.text3 || o + "秒后重发")
            },
            1e3);
            return a
        }
        return GL.load([GH.modules.crypt, GH.modules.aes],
        function() {
            if ($GUB.isActive(e)) {
                $GUB.disable(e, "发送中...");
                var n = $.trim(t.mobileNo),
                o = $.trim(t.pid),
                a = t.userId,
                s = t.type,
                r = t.errorDiv,
                l = t.successDiv,
                c = "",
                d = {},
                p = function(e) {
                    var t = $(".J_AesKey").val(),
                    i = $(".J_AesIv").val(),
                    n = $GU.aesEncrypt(e, t, i);
                    return n = n.replace(new RegExp("/", "gm"), "@")
                };
                "MSG" == s ? (c += "/my/reservation/resend", d = {
                    mobile: n,
                    context: t.context
                }) : "REG" == s ? c += "/validcode/json/mobile/" + encodeURIComponent(n) + "/REG_MOBILE/" + $().crypt({
                    method: "md5",
                    source: "REG_MOBILE" + n + $GC.mobilevalidcodepwd
                }) : "RES" == s ? (c += "/validcode/json/ordermobilevalidcode", d = {
                    type: "RES_CODE_MOBILE",
                    pid: o,
                    hde: t.hde,
                    shiftcaseid: t.shiftcaseid,
                    signdata: $().crypt({
                        method: "md5",
                        source: "RES_CODE_MOBILE" + o + $GC.mobilevalidcodepwd
                    })
                }) : "RES_VOICE" == s ? (c += "/validcode/json/focusordermobilevalidcode", d = {
                    type: "RES_CODE_MOBILE",
                    pid: o,
                    hde: t.hde,
                    shiftcaseid: t.shiftcaseid,
                    focusExpertVerify: t.focusExpertVerify,
                    signdata: $().crypt({
                        method: "md5",
                        source: "RES_CODE_MOBILE" + o + $GC.mobilevalidcodepwd
                    })
                }) : "REG_MOBILE" == s ? (t.param && $.extend(d, t.param), c += "/validcode/json/sendcode/oauth/1/" + d.mobile_token) : "PWD_RESET_MOBILE" == s ? c += "/validcode/json/mobile/" + encodeURIComponent(n) + "/" + encodeURIComponent(a) + "/PWD_RESET_MOBILE/" + $().crypt({
                    method: "md5",
                    source: "PWD_RESET_MOBILE" + n + $GC.mobilevalidcodepwd
                }) : "PARTNERS_MOBILE" == s ? c += "/validcode/json/mobile/" + encodeURIComponent(n) + "/PARTNERS_MOBILE/" + $().crypt({
                    method: "md5",
                    source: "PARTNERS_MOBILE" + n + $GC.mobilevalidcodepwd
                }) : "REG_HEALTH_ACTIVE_CODE" == s ? c += "/validcode/json/mobile/" + encodeURIComponent(n) + "/REG_HEALTH_ACTIVE_CODE/" + $().crypt({
                    method: "md5",
                    source: "REG_HEALTH_ACTIVE_CODE" + n + $GC.mobilevalidcodepwd
                }) : "UPDATE_PROFILE" == s ? c += "/validcode/json/mobileprofile/" + encodeURIComponent(n) + "/UPDATE_PROFILE/" + $().crypt({
                    method: "md5",
                    source: "UPDATE_PROFILE" + n + $GC.mobilevalidcodepwd
                }) : "CANCEL_ORDER" == s ? c += t.sendCode ? "/validcode/json/send/img/" + p(n) + "/CANCEL_ORDER/" + t.sendCode: "/validcode/json/mobile/" + encodeURIComponent(n) + "/CANCEL_ORDER/" + $().crypt({
                    method: "md5",
                    source: "CANCEL_ORDER" + n + $GC.mobilevalidcodepwd
                }) : "DOCTOR_UPDATELOGIN" == s ? c += "/validcode/json/mobile/" + encodeURIComponent(n) + "/DOCTOR_UPDATELOGIN/" + $().crypt({
                    method: "md5",
                    source: "DOCTOR_UPDATELOGIN" + n + $GC.mobilevalidcodepwd
                }) : "JKBD" == s ? (c += "/partners/jkbd/jkbdCheck", d = {
                    type: s,
                    mobile: n,
                    orderType: t.orderType,
                    signdata: $("#validCode").val() ? $("#validCode").val() : "",
                    mobileSign: $().crypt({
                        method: "md5",
                        source: "JKBD" + n + $GC.mobilevalidcodepwd
                    })
                }) : c += "TDB_APPLY_CODE" == s ? "/validcode/json/mobile/" + encodeURIComponent(n) + "/TDB_APPLY_CODE/" + $().crypt({
                    method: "md5",
                    source: "TDB_APPLY_CODE" + n + $GC.mobilevalidcodepwd
                }) : "SET_PAY_PSD" == s ? "/validcode/json/mobile/" + encodeURIComponent(n) + "/SET_PAY_PSD/" + $().crypt({
                    method: "md5",
                    source: "SET_PAY_PSD" + n + $GC.mobilevalidcodepwd
                }) : "/validcode/json/mobile/" + encodeURIComponent(n) + "/" + s + "/" + $().crypt({
                    method: "md5",
                    source: s + n + $GC.mobilevalidcodepwd
                }),
                $.ajax({
                    dataType: "json",
                    data: d,
                    cache: !1,
                    url: c,
                    success: function(n) {
                        var o = null;
                        if (void 0 == n.hasError || n.hasError) {
                            if (r) {
                                var a = r.find(".content");
                                0 == a.length ? r.text(n.message).show() : a.text(n.message).parent().show()
                            }
                            0 !== $(".J_Captcha").length && $(".J_Captcha").find("img").attr("src", "/validcode/genimage/" + Math.floor(1e7 * Math.random())),
                            o = i(e, r, l)
                        } else {
                            if (l) {
                                r.hide();
                                var a = l.find(".content");
                                0 == a.length ? l.text(t.text4 || "验证码消息发送成功！").show() : a.text(t.text4 || "验证码消息发送成功！").parent().show()
                            }
                            o = i(e, r, l)
                        }
                        "function" == typeof t.endCallback && t.endCallback(o, n)
                    },
                    error: function() {
                        if (r) {
                            l.hide();
                            var n = r.find(".content");
                            0 == n.length ? r.text("验证码消息发送失败，请稍后重试！").show() : n.text("验证码消息发送失败，请稍后重试！").parent().show()
                        }
                        var o = i(e, r, l);
                        "function" == typeof t.endCallback && t.endCallback(o)
                    }
                })
            }
        }),
        !1
    },
    showTips: function(e) {
        var t, i = $(e.container),
        n = e.content;
        t = "error" == e.type ? '<div class="g-tips-box-error"><span class="gi gi-error"></span><span class="content">' + n + "</span></div>": '<div class="g-tips-box-succ"><span class="gi gi-succ"></span><span class="content">' + n + "</span></div>",
        i.html(t),
        e.margin && i.find("div").css({
            margin: e.margin
        }),
        setTimeout(function() {
            i.empty()
        },
        e.timeout || 3e3)
    },
    checkLogin: function() {
        return !! $GC.isLogined || (top.$("#gh .login").trigger("click"), !1)
    },
    geeTestCaptcha: {
        init: function(e) {
            var t = {};
            t = $.extend(t, e);
            var i = this,
            n = function() {
                $.ajax({
                    url: $GC.guahaoServer + "/geetest/start",
                    type: "get",
                    dataType: "JSON",
                    cache: !1,
                    success: function(e) {
                        e = JSON.parse(e),
                        e && 1 == e.success ? i.loadGeetest(e, t) : $GU.monitor.info("ua:" + navigator.userAgent, "JYERROR_02")
                    },
                    error: function() {
                        $GU.monitor.info("ua:" + navigator.userAgent, "JYERROR_04")
                    }
                })
            },
            o = document.createElement("script");
            o.src = $GC.jspath + "/plugins/gt.js",
            $("body")[0].appendChild(o),
            n()
        },
        loadGeetest: function(e, t) {
            initGeetest({
                gt: e.gt,
                challenge: e.challenge,
                offline: !e.success,
                new_captcha: !0,
                sandbox: !0,
                area: "#userForm",
                product: "float",
                width: "312px"
            },
            function(e) {
                $(".J_GeeTestMain").text(""),
                e.appendTo(".J_GeeTestMain"),
                e.onSuccess(function() {
                    $("#J_GeeTestValid").val("1")
                }).onError(function() {
                    $GU.monitor.info("ua:" + navigator.userAgent, "JYERROR_01")
                })
            })
        },
        refresh: function() {
            this.captchaObj && this.captchaObj.refresh()
        }
    },
    removeHtmlTag: function(e) {
        return e = e.replace(/<\/?[^>]*>/g, ""),
        e = e.replace(/[ | ]*\n/g, "\n"),
        e = e.replace(/&nbsp;/gi, "")
    }
},
function(e) {
    var t = {
        support: function() {
            var e = "placeholder" in document.createElement("input");
            return e
        },
        checkVal: function(e) {
            return "" === e.val()
        }
    };
    e.fn.glPlaceholder = function(i) {
        function n() {
            t.checkVal(o) ? r.css("visibility", "visible") : r.css("visibility", "hidden")
        }
        var o = e(this);
        if (!t.support()) {
            o.addClass("g-iptph");
            var a = "";
            GL.jHack || (a = o.attr("placeholder"), o.removeAttr("placeholder")),
            "" !== a && a || (a = "请输入您要输入的文字"),
            o.wrap("<span class='g-iptph-wrap' />"),
            o.after("<label title='" + a + "'>" + a + "</label>");
            var s = o.parent(),
            r = s.find("label");
            o.css("position", "absolute"),
            "gm-login" == i ? (s.css("width", "200px"), s.css("position", "relative").css("height", "30px").css("display", "inline-block")) : (s.css("width", o.get(0).offsetWidth + 8), s.css("position", "relative").css("height", o.get(0).offsetHeight).css("display", "inline-block")),
            "TEXTAREA" === o.get(0).tagName && r.css("top", "12px"),
            r.css("width", o.width() - 8),
            "" !== o.val() && r.css("visibility", "hidden");
            s.hover(function() {
                s.addClass("over")
            },
            function() {
                s.removeClass("over")
            }),
            o.focusin(function() {
                n()
            }),
            o.focusout(function() {
                n()
            }),
            r.click(function() {
                o.select()
            }),
            r.select(function() {
                return ! 1
            }),
            o.keyup(function() {
                t.checkVal(o) ? r.css("visibility", "visible") : r.css("visibility", "hidden")
            })
        }
    },
    e.fn.refreshPlaceholder = function(i) {
        var n = e(this);
        GL.jHack || n.attr("placeholder", i),
        t.support() || n.next("label").html(i)
    },
    e.fn.countdown = function(t, i, n) {
        if (this.length) {
            n = n || "";
            var o = e(this[0]).html(n.replace(/time/g, i)),
            a = setInterval(function() {--i ? o.html(n.replace(/time/g, i)) : (clearInterval(a), t.call(o))
            },
            1e3)
        }
    }
} (jQuery),
GreenLine.Modal2 = {
    modalTrigger: null,
    loading: function(e, t) {
        var i = $("#gm-loading");
        0 == i.length && (i = $("<div/>", {
            "class": "gm-box",
            id: "gm-loading"
        }).appendTo($("#gm-mask"))),
        this.loadDirectModal(e, i, !0),
        t.call()
    },
    smartModal: function(e, t) {
        var i = {
            id: "gm-msg",
            title: "提示",
            btnText: "确认",
            showClose: !0,
            message: "",
            close: function() {},
            callback: function() {}
        };
        t = $.extend({},
        i, t);
        var n = $("#" + t.id);
        0 == n.length ? n = $("<div/>", {
            "class": "gm-box",
            id: t.id
        }).append($('<div class="title"><span>' + t.title + "</span>" + (t.showClose ? '<a href="javascript:;" class="close gm-close"></a>': "") + "</div>"), $('<div class="body"><p>' + t.message + "</p></div>"), $('<div class="action"><a href="javascript:;" class="gbn gbt-blue1 gm-action" id="js-confirm-bt">' + t.btnText + "</a></div>")).appendTo($("#gm-mask")) : (n.find(".title").find("span").text(t.title), n.find(".action").find("#js-confirm-bt").text(t.btnText), n.find(".body p").html(t.message)),
        n.find(".gm-close").on("click",
        function() {
            return "function" == typeof t.close && t.close(),
            $("#gm-mask .gm-box").hide(),
            $("#gm-bg").hide(),
            !1
        }),
        n.find(".gm-action").on("click",
        function() {
            return "function" == typeof t.callback && t.callback(),
            $("#gm-mask .gm-box").hide(),
            $("#gm-bg").hide(),
            !1
        }),
        this.loadDirectModal(e, n, !0)
    },
    smartAlert: function(e) {
        this.smartModal(null, {
            message: e
        })
    },
    shortCount: function(e) {
        if (!e) return 0;
        var t = e;
        return t > 1e4 && (t = (t / 1e4).toFixed(1) + "万"),
        t
    },
    loadMsgModal: function(e, t) {
        var i = $("#gm-msg");
        0 == i.length && (i = $("<div/>", {
            "class": "gm-box",
            id: "gm-msg"
        }).append($('<div class="title"><span></span><a href="javascript:;" class="close gm-close"></a></div>'), $('<div class="body"><p></p></div>'), $('<div class="action"><a href="javascript:;" class="gbn gbt-blue1 gm-close" id="js-confirm-bt">确认</a></div>')).appendTo($("#gm-mask"))),
        i.find(".title").find("span").text(t.title ? t.title: "提示"),
        i.find(".body p").attr("class", t.type).html(t.message ? t.message: ""),
        this.loadDirectModal(e, i, !0)
    },
    confirm: {
        _init: function(e, t) {
            var i = e.find(".action");
            e.find(".title a.close,.action").show(),
            e.find(".title span").text(t.title || "友情提示"),
            e.find(".body").html(t.icon + '<div class="content-text">' + t.message + "</div>"),
            i.find("a").off("click"),
            i.empty().append($('<a href="javascript:;" class="gbn gbt-gray gm-close">' + (t.cancelTxt || "取消") + "</a>"), $('<a href="javascript:;" class="gbn gbt-blue1 confirm-btn">' + (t.okTxt || "确定") + "</a>")),
            e.off("click", ".confirm-btn"),
            e.on("click", ".confirm-btn",
            function() {
                e.find(".title a.close").click(),
                t.call && t.call()
            })
        },
        load: function(e, t) {
            var i = t.modalId ? t.modalId: "gm-confirm-common",
            n = $("#" + i);
            if (0 == n.length) var n = $("<div/>", {
                "class": "gm-box",
                id: i
            }).append($('<div class="title"><span></span><a href="javascript:;" class="close gm-close"></a></div>'), $('<div class="body g-clear"><span></span></div>'), $('<div class="action"></div>')).appendTo($("#gm-mask"));
            this._init(n, t),
            GreenLine.Modal2.loadDirectModal(e, n, !0)
        }
    },
    confirmModal: {
        _needInit: !0,
        _getMsg: function(e, t) {
            switch (e) {
            case "loading":
                return t ? t: "取消中...";
            case "success":
                return t ? t: "取消成功";
            case "fail":
                return t ? t: "取消失败"
            }
        },
        _init: function(e, t) {
            if (!this._needInit) return ! 1;
            this._needInit = !1;
            var i = e.find(".action");
            e.find(".title a.close,.action").show(),
            e.find(".title span").text(t.title ? t.title: ""),
            e.find(".body .content-text").empty().append(t.confirm.message),
            i.find("a").off("click"),
            i.empty().append($('<a href="javascript:;" class="gbn gbt-gray gm-close js-confirm-close">返回</a>'), $('<a href="javascript:;" class="gbn gbt-blue1 confirm-btn" id="js-confirm-bt">' + t.confirm.btnTxt + "</a>")),
            e.off("click", ".confirm-btn"),
            e.on("click", ".confirm-btn",
            function() {
                var n = GreenLine.Modal2.confirmModal;
                n._needInit = !0,
                e.find(".title a.close").hide(),
                e.find(".body .content-text").empty().attr("class", "content-text loading").append(n._getMsg("loading", t.loading)),
                i.hide().empty(),
                $.ajax({
                    url: t.confirm.url,
                    success: function(o) {
                        if ($('[name="csrf_token"]').val(o.data && o.data.csrf_token ? o.data.csrf_token: ""), i.show().find("a").off("click"), i.empty().append($('<a href="javascript:;" class="gbn gbt-blue1 gm-close" id="js-confirm-bt" >确定</a>')), o.hasError) e.find(".body .pop-icon-ask").attr("class", "pop-icon-right"),
                        e.find(".body .content-text").empty().attr("class", "content-text fail").append(n._getMsg("fail", t.fail) + "<em>" + o.message + "</em>");
                        else {
                            var a = o.message ? o.message: "";
                            e.find(".body .pop-icon-ask").attr("class", "pop-icon-right"),
                            e.find(".body .content-text").empty().attr("class", "content-text success").append(n._getMsg("success", t.success) + "<em>" + a + "</em>"),
                            t.callback && t.callback.call(this),
                            t.callbackOk && i.find("a").on("click",
                            function() {
                                return t.callbackOk.call(this),
                                !1
                            })
                        }
                    },
                    error: function() {
                        e.find(".title a.close").show(),
                        i.show().find("a").off("click"),
                        i.empty().append($('<a href="javascript:;" class="gbn gbt-blue1 gm-close" id="js-confirm-bt">确定</a>')),
                        e.find(".body .pop-icon-ask").attr("class", "pop-icon-right"),
                        e.find(".body .content-text").empty().attr("class", "content-text fail").append(n._getMsg("fail", t.fail))
                    }
                })
            }),
            e.off("click", ".js-confirm-close"),
            e.on("click", ".js-confirm-close",
            function() {
                var e = GreenLine.Modal2.confirmModal;
                return e._needInit = !0,
                !0
            })
        },
        load: function(e, t) {
            var i = t.modalId ? t.modalId: "gm-confirm",
            n = $("#" + i);
            0 == n.length && (n = $("<div/>", {
                "class": "gm-box",
                id: i
            }).append($('<div class="title"><span></span><a href="javascript:;" class="close gm-close js-confirm-close"></a></div>'), $('<div class="body"><div class="pop-icon-ask"></div><div class="content-text"></div></div>'), $('<div class="action"></div>')).appendTo($("#gm-mask"))),
            this._init(n, t),
            GreenLine.Modal2.loadDirectModal(e, n, !0)
        }
    },
    confirmTreatModal: {
        _init: function(e, t) {
            e.find(".title a.close,.action").show(),
            e.find(".title span").text("诊后分享提醒"),
            e.find(".body").addClass("g-clear").html('<span class="gi0 gi-bulb"></span><div class="content-text">身体好些了吗？来分享一下您的就医经验吧！您的经验对其他患友非常重要！</div>'),
            e.find(".action a").off("click"),
            e.off("click", ".confirm-btn"),
            e.find(".action").empty().append('<a href="' + $GC.guahaoServer + '/my/addsharelist" class="gbn gbt-blue3 confirm-btn">是，现在就分享</a><a class="gbn gbt-blue res-link" href="' + t.url + '" target="_blank">否，去预约下单</a>'),
            e.find(".title a.close").click(function() {
                return ! 0
            }),
            e.find(".action #js-confirm-bt").click(function() {
                return ! 0
            }),
            e.find(".res-link").click(function() {
                e.hide(),
                $("#gm-bg").hide()
            })
        },
        checkLogin: function() {
            return !! $GC.isLogined || ($("#gh .login").trigger("click"), !1)
        },
        load: function(e, t) {
            function i(i) {
                var o, a = e.attr("href");
                if (i && (n.notConfirmNum = i.map.notTreat), o = n.notConfirmNum, i && i.hasError || !(o > 0)) location.href = a;
                else {
                    var s = $("#gm-confirm-treat");
                    0 == s.length && (s = $("<div/>", {
                        "class": "gm-box",
                        id: "gm-confirm-treat"
                    }).append('<div class="title"><span></span><a href="javascript:;" class="close gm-close"></a></div><div class="body"><span></span></div><div class="action"></div>').appendTo($("#gm-mask"))),
                    t.num = o,
                    t.url = a,
                    n._init(s, t),
                    GreenLine.Modal2.loadDirectModal(e, s, !0)
                }
            }
            var n = this,
            t = t || {};
            n.checkLogin() && (void 0 != n.notConfirmNum ? i() : $.ajax({
                url: "/remind/isNeedRemind",
                cache: !1,
                success: function(e) {
                    i(e)
                }
            }))
        }
    },
    loadDirectModal: function(e, t, i, n) {
        GreenLine.Util.isIE6() && (i = !1),
        this.modalTrigger = e;
        var o = $(document).width(),
        a = $(document).height(),
        s = $(window).height(),
        r = $(window).width();
        $("#gm-bg").css({
            height: a + "px",
            opacity: "0.30"
        }).show(),
        o > r && $("#gm-bg").css({
            "min-width": o + "px"
        }),
        t.show();
        var l = (s - t.height()) / 2;
        if (l < 45 && (l = 45), i) $("#gm-mask").css({
            position: "fixed",
            top: l + "px"
        });
        else {
            var c = $(document).scrollTop();
            $("#gm-mask").css({
                position: "absolute",
                top: c + l + "px"
            })
        }
        n && $.isFunction(n) && n()
    },
    loadModal: function(e, t) {
        var i = $(e.attr("rel"));
        this.loadDirectModal(e, i, t)
    },
    closeModal: function(e) {
        if (e) {
            var t = e.parents(".gm-box").hide().find("form");
            t.length > 0 && t.data("validator") && t.data("validator").reset()
        } else $("#gm-mask .gm-box").hide();
        $("#gm-bg").hide()
    },
    init: function() {
        var e = this;
        $("#gm-bg,#gm-mask").appendTo($("body")),
        $(".gm-box").appendTo($("#gm-mask")),
        $.fn.bgiframe && $(".gm-box").bgiframe({
            width: 1200,
            height: 1e3,
            top: -500,
            left: -200
        }),
        $("#gm-mask").on("click", ".gm-close",
        function(t) {
            return e.closeModal($(this)),
            !1
        }),
        $("#gm-mask").on("click", ".gm-b",
        function(t) {
            return e.closeModal($(this)),
            e.loadModal($(this)),
            !1
        }),
        $("#gm-mask").on("click", ".gm-fb",
        function(t) {
            return e.closeModal($(this)),
            e.loadModal($(this), !0),
            !1
        }),
        $("body").on("click", ".gm-t",
        function(t) {
            return e.loadModal($(this)),
            !1
        }),
        $("body").on("click", ".gm-ft",
        function(t) {
            return e.loadModal($(this), !0),
            !1
        })
    }
},
GreenLine.Flyout = {
    loadArry: ["remind"],
    loadIndex: -1,
    init: function() {
        GreenLine.Flyout.checkload(),
        1 == $("#g-cfg").data("rightbar") && (0 == $("#gfo-rihgtbar").length && window.top === window.self && $("<div/>", {
            id: "gfo-rihgtbar"
        }).appendTo("body"), GreenLine.Flyout.medicalConsult.load(), GreenLine.Flyout.ghApp.load(), GreenLine.Flyout.weixin.load(), GreenLine.Flyout.sina.load(), GreenLine.Flyout.helpqs.load(), GreenLine.Flyout.ghCorrect.load(), GreenLine.Flyout.totop.load(), $("#gfo-wrap").length > 0 && (GreenLine.Flyout.fixedEvents($("#gfo-wrap")), $(window).resize(function() {
            var e = $(document).scrollLeft();
            $(window).width() == $(document).width() && (e = 0),
            $("#gfo-rihgtbar").css({
                left: $(window).width() - $("#gfo-rihgtbar").width() + e,
                right: "auto"
            })
        }), $("body").on("mouseover", GL.throttle(function() {
            $("body").off("mouseover"),
            $("#gfo-rihgtbar").css({
                left: $(window).width() - $("#gfo-rihgtbar").width() + $(document).scrollLeft(),
                right: "auto"
            }),
            $("#gfo-rihgtbar").fadeIn()
        },
        200, 500))))
    },
    checkload: function() {
        if ($("[data-loadpop]").length > 0) {
            var e = $("[data-loadpop]").data("loadpop");
            "default" != e && (GreenLine.Flyout.loadArry = e.split(",")),
            GreenLine.Flyout.donextload()
        }
    },
    donextload: function() {
        GreenLine.Flyout.loadIndex = parseInt(GreenLine.Flyout.loadIndex + 1);
        var e = GreenLine.Flyout.loadArry[GreenLine.Flyout.loadIndex];
        null != e && GreenLine.Flyout[e].load()
    },
    login: {
        check: function() {
            return {
                login: !$.cookie("_gfo_login_disable") && !$GC.isLogined,
                profile: !$.cookie("_gfo_profile_disable") && $GC.isLogined
            }
        },
        load: function() {
            function e(e, i) {
                t.append($("<div class='g-container'></div>").append(e), $("<a class='close' href='javascript:;'></a>")).appendTo($("body")),
                GreenLine.Util.isIE6() && (t.css({
                    position: "absolute"
                }), $(window).scroll(function() {
                    t.css({
                        bottom: "auto",
                        top: $(document).scrollTop() + $(window).height() - 90 + "px"
                    })
                })),
                t.slideDown(),
                t.find(".close").click(function() {
                    t.slideUp();
                    var e = new Date;
                    return e.setTime(e.getTime() + 6e5),
                    $.cookie(i, !0, {
                        expires: e,
                        path: "/"
                    }),
                    !1
                })
            }
            var t = $("<div/>", {
                id: "gfo-login"
            }),
            i = this.check();
            if (i.login) {
                var n = "<div class='cw'><h3>登录了解最新号源变化！</h3>若是再次预约，别忘了先去“个人中心”<strong>分享就医经验</strong>哦~</div><span class='arrow'></span>" + '<a class="gbn gbt-blue1 login" href="javascript:;">登录</a><a class="gbn gbt-green" href="/register/mobile">注册</a>';
                e(n, "_gfo_login_disable"),
                t.find(".login").click(function() {
                    return $("#gh .login").trigger("click"),
                    $GM.modalTrigger = $(this),
                    !1
                })
            } else i.profile ? $.ajax({
                url: "/my/info/perfection",
                success: function(t) {
                    if (t && $.isPlainObject(t) && "1" == t.code) {
                        var i = "<div class='cw cw-profile'><h3>完善个人信息才能预约挂号！</h3>请先进入“账号设置-个人信息”完善实名制信息哦~</div><span class='arrow'></span>" + '<a class="gbn gbt-green" href="/my/profile/0">马上去完善</a>';
                        e(i, "_gfo_profile_disable")
                    } else GreenLine.Flyout.donextload()
                }
            }) : GreenLine.Flyout.donextload()
        }
    },
    remind: {
        check: function() {
            return $GC.isLogined
        },
        load: function() {
            this.check() ? $.ajax({
                url: "/remind/isNeedRemind",
                success: function(e) {
                    var t = parseInt(e.map.notTreat),
                    i = parseInt(e.map.stopTreat),
                    n = parseInt(e.map.notAppend),
                    o = e.map.userName,
                    a = e.map.apm;
                    if (!e.hasError && (t > 0 || i > 0 || n > 0)) {
                        var s = ["<h1>" + a + "好，<span class='username'>" + o + "</span>：</h1>"];
                        i > 0 ? s.push("<p class='stoptreat'>您未就诊的订单中有<strong>专家停诊</strong>，请及时关注</p><a href='/my/orderlist' class='gbn gbt-orange'>查看详情</a>") : t > 0 ? s.push("<p class='confirm'>您看过医生后身体好些了吗？<br/>如已就诊，快来分享您的就医经验吧！ 您的分享可是千万患友的福音哦！</p><a href='/my/addsharelist/' class='gbn gbt-orange'>现在就分享</a>") : n > 0 && s.push("<p class='reconfirm'>近期您的病情有改善了吗？<br/>快来分享您后续的治疗效果吧！</p><a href='/my/addtreatmentlist' class='gbn gbt-orange'>现在就追加分享</a>"),
                        s.push("<span class='head'></span>"),
                        s.push("<a class='close' href='javascript:;'></a>");
                        var r = $("<div/>", {
                            id: "gfo-remind"
                        }).append($(s.join(""))).appendTo($("body"));
                        r.find("li:eq(0)").addClass("first"),
                        GreenLine.Util.isIE6() && (r.css({
                            position: "absolute"
                        }), $(window).scroll(function() {
                            r.css({
                                bottom: "auto",
                                top: $(document).scrollTop() + $(window).height() - r.height() + "px"
                            })
                        })),
                        r.slideDown(),
                        r.find(".close").click(function() {
                            return $.ajax({
                                url: "/remind/stopRemind"
                            }),
                            r.slideUp(),
                            !1
                        })
                    } else GreenLine.Flyout.donextload()
                }
            }) : GreenLine.Flyout.donextload()
        }
    },
    mobile: {
        check: function() {
            return ! $.cookie("_gfo_mobile_disable") && ($GU.checkSubdomain("shanghai") || $GU.checkSubdomain("g"))
        },
        load: function() {
            function e(e, i) {
                t.append($("<div class='g-container'></div>").append(e), $("<a class='close' href='javascript:;'></a>")).appendTo($("body")),
                GreenLine.Util.isIE6() && (t.css({
                    position: "absolute"
                }), $(window).scroll(function() {
                    t.css({
                        bottom: "auto",
                        top: $(document).scrollTop() + $(window).height() - 90 + "px"
                    })
                })),
                t.slideDown(),
                t.find(".close,.cw a").click(function() {
                    return t.slideUp(),
                    $.cookie(i, !0, {
                        expires: 3,
                        path: "/"
                    }),
                    !0
                })
            }
            var t = $("<div/>", {
                id: "gfo-mobile"
            }),
            i = this.check(),
            n = "<div class='cw'><a href='" + $GC.guahaoServer + "/userapp'></a><span class='code'><img  src='" + $GC.staticServer + "/qrApp4.jpg' onerror='this.src=\"" + $GC.guahaoServer + '/qrcode/gener?qrIndex=qrApp4";this.removeAttribute("onerror");\'/></span></div>';
            i && e(n, "_gfo_mobile_disable"),
            i || GreenLine.Flyout.donextload()
        }
    },
    wyapp: {
        check: function() {
            return ! 0
        },
        handleCommonPopup: function(e, t, i) {
            var n = function(e) {
                return e === [(new Date).getFullYear(), (new Date).getMonth() + 1, (new Date).getDate()].join("-")
            },
            o = localStorage.getItem("_WY_Home_CommonPopup_Tag");
            if (o !== e && (localStorage.removeItem("_WY_Home_CommonPopup_LastDay"), localStorage.removeItem("_WY_Home_CommonPopup_PopupCount"), localStorage.removeItem("_WY_Home_CommonPopup_PopupNumber"), localStorage.setItem("_WY_Home_CommonPopup_Tag", e)), t > 0 && i > 0) {
                var a = localStorage.getItem("_WY_Home_CommonPopup_LastDay");
                n(a) || localStorage.setItem("_WY_Home_CommonPopup_PopupNumber", 0);
                var s = localStorage.getItem("_WY_Home_CommonPopup_PopupCount") || 0,
                r = localStorage.getItem("_WY_Home_CommonPopup_PopupNumber") || 0;
                if ((s < t || Number(s) === Number(t) && n(a)) && r < i) {
                    if (n(a)) {
                        var l = localStorage.getItem("_WY_Home_CommonPopup_lastTime") || 0;
                        if ((new Date).getTime() - l < 18e5) return ! 1
                    } else localStorage.setItem("_WY_Home_CommonPopup_PopupCount", ++s),
                    localStorage.setItem("_WY_Home_CommonPopup_LastDay", [(new Date).getFullYear(), (new Date).getMonth() + 1, (new Date).getDate()].join("-"));
                    return localStorage.setItem("_WY_Home_CommonPopup_PopupNumber", ++r),
                    localStorage.setItem("_WY_Home_CommonPopup_lastTime", (new Date).getTime()),
                    !0
                }
            } else {
                var a = localStorage.getItem("_WY_Home_CommonPopup_LastDay");
                if (!n(a)) return localStorage.setItem("_WY_Home_CommonPopup_LastDay", [(new Date).getFullYear(), (new Date).getMonth() + 1, (new Date).getDate()].join("-")),
                !0
            }
            return ! 1
        },
        load: function() {
            function e() {
                $.ajax({
                    url: $GC.serviceServer + "/json/white/operateResource.jsonp?resourceId=P-1.3",
                    type: "post",
                    dataType: "jsonp",
                    success: function(e) {
                        if (e && e.data) {
                            var n = e.data[0];
                            check = t.handleCommonPopup(n.applyId, n.popCount, n.popNumber),
                            check && (i.append($("<div class='color-bg'></div><div class='g-container'><div class='cw'><a href='" + n.url + "' target='_blank' onmousedown='return _smartlog(this,\"SYTC\")' monitor='home,bottom,pop' monitor-activity-id='" + n.resourceId + "' monitor-activity-url='" + n.url + "'></a></div><a class='close' href='javascript:;' monitor='home,bottom,pop_close' monitor-activity-id='" + n.resourceId + "' monitor-activity-url='" + n.url + "'></a></div>")).appendTo($("body")), i.find(".cw").css("background-image", "url(" + n.imgUrl + ")")),
                            i.find(".close,.cw a").click(function() {
                                return i.slideUp(),
                                !0
                            })
                        }
                    },
                    error: function(e) {
                        i.remove()
                    }
                }),
                GreenLine.Util.isIE6() && (i.css({
                    position: "absolute"
                }), $(window).scroll(function() {
                    i.css({
                        bottom: "auto",
                        top: $(document).scrollTop() + $(window).height() - 90 + "px"
                    })
                })),
                i.slideDown()
            }
            var t = this,
            i = $("<div/>", {
                id: "gfo-wyapp"
            }),
            n = t.check();
            setTimeout(function() {
                n && e()
            },
            1e3),
            n || GreenLine.Flyout.donextload()
        }
    },
    popapp: {
        check: function() {
            return ! $.cookie("_gfo_popapp_disable")
        },
        load: function() {
            function e(e, i) {
                t.append(e, $("<a class='close' href='javascript:;'></a>")).appendTo($("body")),
                GreenLine.Util.isIE6() && (t.css({
                    position: "absolute"
                }), $(window).scroll(function() {
                    t.css({
                        bottom: "auto",
                        top: $(document).scrollTop() + $(window).height() - 90 + "px"
                    })
                })),
                t.slideDown(),
                t.find(".close,.cw a").click(function() {
                    return $(this).hasClass("close") ? $GUM.action("YXTC") : $GUM.action("YXT"),
                    t.slideUp(),
                    $.cookie(i, !0, {
                        expires: 3,
                        path: "/"
                    }),
                    !0
                })
            }
            var t = $("<div/>", {
                id: "gfo-popapp"
            }),
            i = this.check(),
            n = "<div class='cw'><a href='" + $GC.guahaoServer + "/intro/userapp' target='_blank'></a></div>";
            i && e(n, "_gfo_popapp_disable"),
            i || GreenLine.Flyout.donextload()
        }
    },
    jkdh: {
        check: function() {
            return ! $.cookie("_gfo_jkdh_disable")
        },
        load: function() {
            function e(e, i) {
                t.append($("<div class='g-container'></div>").append(e), $("<a class='close' href='javascript:;'></a>")).appendTo($("body")),
                GreenLine.Util.isIE6() && (t.css({
                    position: "absolute"
                }), $(window).scroll(function() {
                    t.css({
                        bottom: "auto",
                        top: $(document).scrollTop() + $(window).height() - 90 + "px"
                    })
                })),
                t.slideDown(),
                t.find(".close,.cw a").click(function() {
                    return t.slideUp(),
                    $.cookie(i, !0, {
                        expires: 3,
                        path: "/"
                    }),
                    !0
                })
            }
            var t = $("<div/>", {
                id: "gfo-jkdh"
            }),
            i = this.check(),
            n = "<div class='cw'><a href='http://www.chinahealthsummit.com/' target='_blank'></a></div>";
            i && e(n, "_gfo_jkdh_disable"),
            i || GreenLine.Flyout.donextload()
        }
    },
    qkconsult: {
        check: function() {
            return ! $.cookie("_gfo_qkconsult_disable")
        },
        load: function() {
            function e(e, i) {
                t.append(e, $("<a class='close' href='javascript:;'></a>")).appendTo($("body")),
                GreenLine.Util.isIE6() && (t.css({
                    position: "absolute"
                }), $(window).scroll(function() {
                    t.css({
                        bottom: "auto",
                        top: $(document).scrollTop() + $(window).height() - 90 + "px"
                    })
                })),
                t.slideDown(),
                t.find(".close,.cw a").click(function() {
                    return t.slideUp(),
                    $.cookie(i, !0, {
                        expires: 3,
                        path: "/"
                    }),
                    !0
                })
            }
            var t = $("<div/>", {
                id: "gfo-qkconsult"
            }),
            i = this.check(),
            n = "<div class='cw'><a href='" + $GC.guahaoServer + "/before/consult/ask' target='_blank'></a></div>";
            i && e(n, "_gfo_qkconsult_disable"),
            i || GreenLine.Flyout.donextload()
        }
    },
    fixedEvents: function(e) {
        $(window).scroll(function() {
            var t = $(document).height() - $("#gf").height(),
            i = e.height(),
            n = $(window).height(),
            o = $(document).scrollTop(),
            a = o + n;
            "gfo-wrap" == e.attr("id") ? (e.find($("#gfo-totop")).length > 0 && $(document).height() - $(window).height() > 300 && ($(document).scrollTop() > 300 ? $("#gfo-totop").fadeIn() : $("#gfo-totop").fadeOut()), o + 249 >= t - 60 - i ? e.css({
                top: t - 60 - i,
                position: "absolute"
            }) : $GU.isIE6() ? e.css({
                top: o + 249,
                position: "absolute"
            }) : e.css({
                top: "249px",
                position: "fixed"
            }), $(".helpqs-box").find("ul").length > 0 && ($(window).height() - (249 + $("#gfo-helpqs").position().top) - $(".helpqs-box").height() > 0 ? $(".helpqs-box").css({
                top: "0",
                bottom: "auto"
            }) : $(".helpqs-box").css({
                bottom: "0",
                top: "auto"
            })), $("#gfo-rihgtbar").css({
                left: $(window).width() - $("#gfo-rihgtbar").width() + $(document).scrollLeft(),
                right: "auto"
            })) : a >= t ? e.css({
                top: t - i - 30,
                bottom: "auto",
                position: "absolute"
            }) : $GU.isIE6() ? e.css({
                top: a - i - 30,
                position: "absolute",
                bottom: "auto"
            }) : e.css({
                top: "auto",
                bottom: "10px",
                position: "fixed"
            })
        }).trigger("scroll")
    },
    weixin: {
        check: function() {
            return $("[data-fo-weixin]").length > 0
        },
        load: function() {
            0 == $("#gfo-wrap").length && $("<div/>", {
                id: "gfo-wrap"
            }).appendTo("#gfo-rihgtbar");
            var e = $("<div/>", {
                id: "gfo-weixin",
                "class": "item-box"
            }).append($("<span class='weixin-icon'/></span>"), $("<span class='code-box hide'/>").append("<a href='javascript:;'><em>微医公众账号</em><img class='icon' src='" + $GC.staticServer + "/qrWx3.jpg' onerror='this.src=\"" + $GC.guahaoServer + "/qrcode/gener?qrIndex=qrWx3\";this.removeAttribute(\"onerror\");'/></a><a href='javascript:;' class='bottom'><em>微医健康微信</em><img class='icon' src='" + $GC.staticServer + "/qrWx1.jpg' onerror='this.src=\"" + $GC.guahaoServer + '/qrcode/gener?qrIndex=qrWx1";this.removeAttribute("onerror");\'/></a>')).appendTo($("#gfo-wrap"));
            e.hover(function() {
                $(this).find(".code-box").show()
            },
            function() {
                $(this).find(".code-box").hide()
            })
        }
    },
    sina: {
        check: function() {
            return $("[data-fo-sina]").length > 0
        },
        load: function() {
            0 == $("#gfo-wrap").length && $("<div/>", {
                id: "gfo-wrap"
            }).appendTo("#gfo-rihgtbar");
            $("<a/>", {
                id: "gfo-sina",
                "class": "item-box",
                href: "http://e.weibo.com/95169guahaowang",
                rel: "nofollow",
                target: "_blank",
                title: "微博账号"
            }).append($("<span class='sina-icon'/>")).appendTo($("#gfo-wrap"))
        }
    },
    helpqs: {
        check: function() {
            return $("[data-fo-help]").length > 0
        },
        load: function() {
            if (this.check()) {
                0 == $("#gfo-wrap").length && $("<div/>", {
                    id: "gfo-wrap"
                }).appendTo("#gfo-rihgtbar");
                var e = $("<div/>", {
                    id: "gfo-helpqs",
                    "class": "hide item-box",
                    title: "在线帮助"
                }).append($("<a href='javascript:;' class='online-kefu'/>"), $("<div  class='helpqs-box'/>").append($("<h5>以下问题可能是您关心的：</h5>"), $("<div class='bottom'>都不是你关心的问题？<a class='gbn gbt-green3' href='" + $GC.guahaoServer + "/help/docx?id=16&parentId=7' rel='nofollow' target='_blank'>进入客服中心</a></div>"))).appendTo($("#gfo-wrap")),
                t = $(".g-wrapper").find(".helpqs-list ul");
                t.length > 0 && (e.find(".helpqs-box h5").after(t), e.show()),
                e.hover(function() {
                    $(this).find(".helpqs-box").show()
                },
                function() {
                    $(this).find(".helpqs-box").hide()
                })
            }
        }
    },
    ghApp: {
        check: function() {
            return $("[data-fo-appcode]").length > 0
        },
        load: function() {
            0 == $("#gfo-wrap").length && $("<div/>", {
                id: "gfo-wrap"
            }).appendTo("#gfo-rihgtbar");
            var e = $("<div/>", {
                id: "gfo-ghApp",
                "class": "item-box"
            }).append($("<a href='" + $GC.guahaoServer + "/intro/userapp' target='_blank' class='tel-box'/>"), $("<span  class='code-box hide'/>").append("<a href='javascript:;' ><em>微医-用户版</em><img class='icon' src='" + $GC.staticServer + "/qrApp2.jpg' onerror='this.src=\"" + $GC.guahaoServer + "/gener?qrIndex=qrApp2\";this.removeAttribute(\"onerror\");'/></a><a href='javascript:;' class='bottom'><em>微医-医生版</em><img class='icon' src='" + $GC.staticServer + "/ewm.png'></a>")).appendTo($("#gfo-wrap"));
            e.hover(function() {
                $(this).find("a.tel-box").addClass("no-left"),
                $(this).find(".code-box").show()
            },
            function() {
                $(this).find("a.tel-box").removeClass("no-left"),
                $(this).find(".code-box").hide()
            })
        }
    },
    ghAskfor: {
        check: function() {
            return $("[data-fo-askfor]").length > 0
        },
        load: function() {
            if (this.check()) {
                0 == $("#gfo-wrap-other").length && $("<div/>", {
                    id: "gfo-wrap-other"
                }).appendTo("body");
                $("<a target='_bank' href='http://drwangdahui.guahao.com/uauth/consult/ask' class='js-correct-dialog item-box' id='ask-for'></a><br/>").appendTo($("#gfo-wrap-other"))
            }
        }
    },
    zsghAskfor: {
        check: function() {
            return $("[data-fo-zsaskfor]").length > 0
        },
        load: function() {
            if (this.check()) {
                0 == $("#gfo-wrap-other").length && $("<div/>", {
                    id: "gfo-wrap-other"
                }).appendTo("body");
                $("<a target='_bank' href='http://huangxinsheng.guahao.com/uauth/consult/ask' class='js-correct-dialog item-box' id='ask-for'></a><br/>").appendTo($("#gfo-wrap-other"))
            }
        }
    },
    ghRegister: {
        check: function() {
            return $("[data-fo-register]").length > 0
        },
        load: function() {
            if (this.check()) {
                0 == $("#gfo-wrap-other").length && $("<div/>", {
                    id: "gfo-wrap-other"
                }).appendTo("body");
                $("<a target='_bank' href='" + $GC.guahaoServer + "/department/7f6cc099-0abf-4b60-96db-9c0b950bddcc' class='js-correct-dialog item-box' id='register'>我要挂号</a>").appendTo($("#gfo-wrap-other"))
            }
        }
    },
    zsRegister: {
        check: function() {
            return $("[data-fo-zsRegister]").length > 0
        },
        load: function() {
            if (this.check()) {
                0 == $("#gfo-wrap-other").length && $("<div/>", {
                    id: "gfo-wrap-other"
                }).appendTo("body");
                $("<a target='_bank' href='" + $GC.guahaoServer + "/department/shiftcase/125809895923704' class='js-correct-dialog item-box' id='register'>我要挂号</a>").appendTo($("#gfo-wrap-other"))
            }
        }
    },
    ghExpert: {
        check: function() {
            return $("[data-fo-expert]").length > 0
        },
        load: function() {
            if (this.check()) {
                0 == $("#gfo-wrap").length && $("<div/>", {
                    id: "gfo-wrap"
                }).appendTo("#gfo-rihgtbar");
                var e = $("<div/>", {
                    id: "gfo-ghJkdjt",
                    "class": "item-box",
                    title: "申请成为讲堂专家"
                }).append($("<a href='javascript:;' class='jkdjt-icon'></a>")).appendTo($("#gfo-wrap")),
                t = $("#JC_jkdjt_title").val();
                e.click(function() {
                    $GD.init({
                        title: t,
                        extClass: "gm-jkdjtnew-dialog",
                        content: '<form action="javascript:;"><ul><li>请填写以下信息，以便及时与您取得联系：</li><li><label for="name">您的姓名：</label><input type="text"  data-required="1" placeholder="您的姓名" data-phtext="您的姓名" id="name" name="fullName" /></li><li><label for="hospital">您所在的医院：</label><input placeholder="您所在的医院" data-phtext="您所在的医院" data-required="1" type="text" id="hospital" name="hospitalName" /></li><li><label for="phone">您的联系电话：</label><input placeholder="您的联系电话" data-required="1" data-phtext="您的联系电话" type="text" id="phone" name="phone" /></li><li class="jk-goodat"><label for="goodat">您的擅长：</label><textarea id="goodat" name="goodat" maxlength="500" placeholder="请输入您的擅长" pattern ="^(.|\n){1,500}$" data-message ="请输入1-500个字符"  data-phtext="请输入您的擅长" data-required="1" ></textarea></li></ul></form><div class="jk-des">健康大讲堂由国家卫生和计划生育委员会、国家食品药品监督管理总局、中国科学技术协会联合主办，微医为官方指定支持单位。后续将用三年时间进入全国百座城市，通过名医大讲堂和专家问诊等多样活动。大力宣传健康生活方式和安全用药常识。</div><div class="success hide"><i></i><span>反馈成功！</span></div>',
                        width: 460,
                        okCls: "gbn gbt-blue1 gbt-ps",
                        okTxt: "提交",
                        noCancelBtn: !1,
                        okCall: function() {
                            var e = $GD.find(".js-ok");
                            if ($GUB.isActive(e)) {
                                var t = (location.href, $(".gm-jkdjtnew-dialog").find("form"));
                                return t.validator({
                                    formEvent: "null"
                                }),
                                t.data("validator").checkValidity() && ($GUB.disable(e, "提交中…"), $.ajax({
                                    url: "/jkzgx/doctorapply?",
                                    cache: !1,
                                    dataType: "json",
                                    type: "post",
                                    data: t.serialize(),
                                    success: function(t) {
                                        $GUB.enable(e, "确定"),
                                        t.errors ? $GD.showError(t.errors[0].defaultMessage) : ($(".gm-jkdjtnew-dialog").find("form").hide(), $(".gm-jkdjtnew-dialog").find(".jk-des").html("反馈成功！"), setTimeout(function() {
                                            $(".gm-jkdjtnew-dialog").find(".js-close").trigger("click")
                                        },
                                        2e3))
                                    },
                                    error: function() {
                                        $GUB.enable(e, "确定"),
                                        $GD.showError("系统繁忙，请稍后再试")
                                    }
                                })),
                                !1
                            }
                        }
                    }),
                    $(".gm-correct-dialog").length > 0 && ($(".gm-correct-dialog").glNewPlaceholder(), $(".gm-correct-dialog").find(".js-correctEmail").keyup(function(e) {
                        return 13 == e.keyCode && $(".gm-correct-dialog").find(".js-ok").trigger("click"),
                        !1
                    }))
                })
            }
        }
    },
    ghCorrect: {
        check: function() {
            return $("[data-fo-correct]").length > 0
        },
        load: function() {
            if (this.check()) {
                0 == $("#gfo-wrap").length && $("<div/>", {
                    id: "gfo-wrap"
                }).appendTo("#gfo-rihgtbar");
                var e = $("<div/>", {
                    id: "gfo-ghCorrect",
                    "class": "item-box",
                    title: "我要纠错"
                }).append($("<a href='javascript:;' class='correct-icon'></a>")).appendTo($("#gfo-wrap")),
                t = $("#JC_type_select").html(),
                i = $("#JC_type_title").val();
                e.click(function() {
                    $GD.init({
                        title: i,
                        extClass: "gm-correct-dialog",
                        content: '<form action="javascript:;"><ul><li>请选择纠错类型：' + t + '</li><li><textarea  data-validcode="correctContent" name="desc" maxlength="500" data-required="1" pattern ="^(.|\n){1,500}$" data-message ="请输入1-500个字符" data-phtext="请指明纠错的内容"></textarea></li><li style="color:#F00">注：网站建议，预约挂号问题请联系<a href="https://www.guahao.com/feedback" target="_blank">网站客服</a></li><li><input type="email"    data-validcode="correctEmail" name="email" class="text js-correctEmail" value="" data-required="1" data-phtext="您的联系邮箱" /></li></ul></form><div class="success hide"><i></i><span>反馈成功！</span></div>',
                        width: 460,
                        okCls: "gbn gbt-blue1",
                        okTxt: "提交",
                        noCancelBtn: !0,
                        okCall: function() {
                            var e = $GD.find(".js-ok");
                            if ($GUB.isActive(e)) {
                                var t = location.href,
                                i = $(".gm-correct-dialog").find("form");
                                return i.validator({
                                    formEvent: "null"
                                }),
                                i.data("validator").checkValidity() && ($GUB.disable(e, "提交中…"), $.ajax({
                                    url: "/correct/submit?url=" + t,
                                    cache: !1,
                                    dataType: "json",
                                    type: "post",
                                    data: i.serialize(),
                                    success: function(t) {
                                        $GUB.enable(e, "确定"),
                                        t.errors ? $GD.showError(t.errors[0].defaultMessage) : ($(".gm-correct-dialog").find("form").hide(), $(".gm-correct-dialog").find(".foot").hide(), $(".gm-correct-dialog").find(".success").show(), setTimeout(function() {
                                            $(".gm-correct-dialog").find(".js-close").trigger("click")
                                        },
                                        2e3))
                                    },
                                    error: function() {
                                        $GUB.enable(e, "确定"),
                                        $GD.showError("系统繁忙，请稍后再试")
                                    }
                                })),
                                !1
                            }
                        }
                    }),
                    $(".gm-correct-dialog").length > 0 && ($(".gm-correct-dialog").glNewPlaceholder(), $(".gm-correct-dialog").find(".js-correctEmail").keyup(function(e) {
                        return 13 == e.keyCode && $(".gm-correct-dialog").find(".js-ok").trigger("click"),
                        !1
                    }))
                })
            }
        }
    },
    totop: {
        check: function() {
            return $("[data-fo-totop]").length > 0
        },
        load: function() {
            if (!this.check()) {
                0 == $("#gfo-wrap").length && $("<div/>", {
                    id: "gfo-wrap"
                }).appendTo("#gfo-rihgtbar");
                var e = $("<div id='gfo-totop' class='item-box hide' title='向上'/>").append("<span class='top-icon'></span>").appendTo($("#gfo-wrap"));
                e.click(function() {
                    var e = $("#g-cfg").find(".head-bar");
                    return e.length > 0 && e.hasClass("fixed-bar") && e.removeClass("fixed-bar"),
                    $(document).scrollTop(0),
                    !1
                })
            }
        }
    },
    medicalConsult: {
        check: function() {
            return $("[data-fo-medicalConsult]").length > 0
        },
        load: function() {
            if (this.check()) {
                0 == $("#gfo-wrap").length && $("<div/>", {
                    id: "gfo-wrap"
                }).appendTo("#gfo-rihgtbar");
                var e = $("<a/>", {
                    id: "gfo-medicalConsult",
                    "class": "item-box",
                    href: "javascript:;"
                }).append("<span class='text'>就医咨询</span>").appendTo($("#gfo-wrap"));
                e.hover(function() {
                    $(this).find(".text").addClass("blue")
                },
                function() {
                    $(this).find(".text").removeClass("blue")
                }),
                e.click(function() {
                    var e = ($(this), $("[data-fo-medicalConsult]").attr("data-fo-medicalConsult"));
                    $GD.init({
                        title: "友情提示",
                        extClass: "gm-medicalConsult-dialog",
                        content: '<div class="common-content">即将进入医院咨询，此咨询服务由该医院提供与微医无关</div>',
                        width: 460,
                        okCls: "gbn gbt-blue1",
                        okTxt: "继续咨询",
                        noCancelBtn: !0,
                        okCall: function() {
                            return window.open(e),
                            !1
                        }
                    })
                })
            }
        }
    }
},
GreenLine.featureLead = {
    init: function(e) {
        if (this.options = {
            binddom: "",
            fedomId: "",
            fedomContent: "",
            bordernum: 7
        },
        $.extend(this.options, e), $(e.binddom).length && !$.cookie(e.fedomId)) {
            var t = this;
            t.initDom(e),
            $(window).resize(function() {
                t.getPosition(e)
            }).trigger("resize"),
            $("#" + e.fedomId).find(".fe-close,.fe-action").click(function() {
                t.closeFe(e)
            }),
            $(".g-feature-mask").eq("0").show()
        }
    },
    initDom: function(e) {
        0 == $(".g-feature-bg").length && $("<div/>", {
            "class": "g-feature-bg"
        }).appendTo($("body")),
        0 == $("#" + e.fedomId).length && ($("<div/>", {
            "class": "g-feature-mask",
            id: e.fedomId
        }).appendTo($("body")), $("#" + e.fedomId).html(e.fedomContent), $(e.binddom).clone().addClass("cloneMask").insertBefore("#" + e.fedomId + " .fe-mask-bg")),
        $(".g-feature-bg").show()
    },
    getPosition: function(e) {
        var t = $(e.binddom),
        i = t.offset().top,
        n = t.offset().left,
        o = t.outerWidth(),
        a = t.outerHeight();
        $("#" + e.fedomId).css({
            top: i - e.bordernum,
            left: n - e.bordernum,
            width: o,
            height: a
        }),
        null != e.flag && "help" == e.flag && $("#" + e.fedomId).css({
            top: i,
            height: t.height() - 10
        })
    },
    closeFe: function(e) {
        return $("#" + e.fedomId).hide(),
        $("#" + e.fedomId).removeClass("g-feature-mask"),
        $.cookie(e.fedomId, !0, {
            expires: 90,
            path: "/",
            domain: $GC.domainEnd
        }),
        0 != $(".g-feature-mask").length ? $("#" + e.fedomId).next(".g-feature-mask").show() : $(".g-feature-bg").hide(),
        !0
    }
},
GreenLine.Widget = {
    fastOrder: {
        urls: {
            province: "/json/white/area/provinces",
            city: "/json/white/area/citys",
            hospital: "/json/white/fastorder/hospitals",
            dept: "/json/white/fastorder/depts"
        },
        init: function(e) {
            var t = this;
            t.needLbs = !0,
            t.userChoice = t._getUserChoice(),
            t.geoLoc = {
                isEmpty: !0
            },
            t.container = e,
            t.dept = e.find(".js-dept").change(function(e) {
                e.lbs || (t.needLbs = !1)
            }),
            t.hospital = e.find(".js-hospital").change(function(e) {
                t._cleanSelect(t.dept),
                e.lbs || (t.needLbs = !1),
                "" != $(this).val() && t._updateSelect("dept")
            }),
            t.city = e.find(".js-city").change(function(e) {
                t._cleanSelect(t.hospital),
                t._cleanSelect(t.dept),
                e.lbs || (t.needLbs = !1),
                "" != $(this).val() && t._updateSelect("hospital")
            }),
            t.province = e.find(".js-province").change(function(e) {
                t._cleanSelect(t.city, "" != $(this).val()),
                t._cleanSelect(t.hospital),
                t._cleanSelect(t.dept),
                e.lbs || (t.needLbs = !1),
                "" != $(this).val() && t._updateSelect("city")
            }),
            t.btn = e.find(".js-btn").click(function(e) {
                var i = t._getUrl();
                return $(this).attr("href", i),
                $GUM.link(i, "QCK"),
                t._setUserChoice(),
                !0
            }),
            t._updateSelect("province")
        },
        _setUserChoice: function() {
            var e = this,
            t = "";
            e.container.find("select").each(function(e) {
                e > 0 && (t += "|"),
                t += $(this).attr("name") + ":" + $(this).val()
            }),
            $.cookie("_fo_opt", t, {
                expires: 10,
                path: "/"
            })
        },
        _getUserChoice: function() {
            var e = $.cookie("_fo_opt"),
            t = {
                isEmpty: !0
            };
            if (e) {
                t.isEmpty = !1,
                e = e.split("|");
                for (var i = 0; i < e.length; i++) if ("" != e[i]) {
                    var n = e[i].split(":");
                    t[n[0]] = n[1]
                }
            }
            return t
        },
        _getUrl: function() {
            var e = this,
            t = e.province.find("option:selected"),
            i = e.city.find("option:selected"),
            n = $GC.guahaoServer + "/hospital/areahospitals";
            return "" != e.dept.val() ? n = $GC.guahaoServer + "/department/shiftcase/" + e.dept.val() : "" != e.hospital.val() ? n = $GC.guahaoServer + "/hospital/" + e.hospital.val() : n += "" != e.city.val() ? "?pi=" + e.province.val() + "&p=" + encodeURIComponent(t.text()) + "&ci=" + e.city.val() + "&c=" + encodeURIComponent(i.text()) + "&open=1": "" != e.province.val() ? "?pi=" + e.province.val() + "&p=" + encodeURIComponent(t.text()) + "&open=1": "?open=1",
            n
        },
        _updateSelect: function(e) {
            var t = this,
            i = {},
            n = t.province;
            switch (e) {
            case "city":
                i = {
                    provinceId: t.province.val()
                },
                n = t.city;
                break;
            case "hospital":
                i = {
                    provinceId: t.province.val(),
                    cityId: t.city.val()
                },
                n = t.hospital;
                break;
            case "dept":
                i = {
                    hospitalId: t.hospital.val()
                },
                n = t.dept
            }
            $.ajax({
                url: t.urls[e],
                data: i,
                success: function(i) {
                    "dept" == e ? t._addDeptOptions(n, i) : t._addOptions(n, i),
                    t.needLbs ? t._lbs(n) : "city" == e && t.city.trigger({
                        type: "change"
                    })
                }
            })
        },
        _lbs: function(e) {
            var t = this,
            i = e.attr("name");
            t.userChoice.isEmpty ? t.geoLoc.isEmpty && "province" == i ? t._ipGeo() : "city" == i && (t.geoLoc.city && "" != t.geoLoc.city && t.city.find("option").each(function() {
                var e = $(this);
                t.geoLoc.city == e.text() && ($GU.isIE6() ? setTimeout(function() {
                    t.city.val(e.val())
                },
                1) : t.city.val(e.val()))
            }), $GU.isIE6() ? setTimeout(function() {
                t.city.val(opt.val())
            },
            2) : t.city.trigger({
                type: "change",
                lbs: !0
            })) : t.userChoice[i] && "" != t.userChoice[i] && ($GU.isIE6() ? setTimeout(function() {
                e.val(t.userChoice[i]),
                e.trigger({
                    type: "change",
                    lbs: !0
                })
            },
            1) : setTimeout(function() {
                e.val(t.userChoice[i]),
                e.trigger({
                    type: "change",
                    lbs: !0
                })
            },
            1))
        },
        _ipGeo: function() {
            $GU.ipGeo(function(e) {
                var t = this;
                p = e.province,
                c = e.city,
                t.geoLoc.provice = p,
                t.geoLoc.city = c,
                t.geoLoc.isEmpty = !1,
                p && "" != p && (t.province.find("option").each(function() {
                    var e = $(this);
                    p == e.text() && ($GU.isIE6() ? setTimeout(function() {
                        t.province.val(e.val())
                    },
                    1) : t.province.val(e.val()))
                }), $GU.isIE6() ? setTimeout(function() {
                    t.province.trigger({
                        type: "change",
                        lbs: !0
                    })
                },
                2) : t.province.trigger({
                    type: "change",
                    lbs: !0
                }))
            },
            this)
        },
        _addOptions: function(e, t) {
            for (var i = "",
            n = 0; n < t.length; n++) i += '<option value="' + t[n].value + '">' + t[n].text + "</option>";
            e.append(i).removeAttr("disabled", "disabled").removeClass("disabled")
        },
        _addDeptOptions: function(e, t) {
            for (var i = "",
            n = t.hospDepts,
            o = 0; o < n.length; o++) {
                var a = n[o],
                s = a.obj;
                i += "<optgroup label='" + a.key + "'>";
                for (var r = 0; r < s.length; r++) i += '<option value="' + s[r].value + '">' + s[r].text + "</option>";
                i += "</optgroup>"
            }
            e.append(i).removeAttr("disabled", "disabled").removeClass("disabled")
        },
        _cleanSelect: function(e, t) {
            e.empty().attr("disabled", "disabled").addClass("disabled"),
            t || $("<option/>", {
                value: "",
                text: "请选择..."
            }).appendTo(e)
        }
    },
    Location: {
        url: {
            city: "/area/listcity/",
            area: "/area/listarea/"
        },
        cache: {
            city: {},
            area: {}
        },
        init: function(e) {
            var t = this;
            t.initSelcet(e)
        },
        getData: function(e, t, i) {
            var n = this,
            o = n.cache;
            o[e][t] ? i(o[e][t]) : $.ajax({
                url: n.url[e] + t,
                success: function(n) {
                    if (!n.hasError) {
                        var a = n.data;
                        o[e][t] = a,
                        i(a)
                    }
                }
            })
        },
        initSelcet: function(e, t, i) {
            var n = this,
            o = GreenLine.Util.setSelectVal,
            a = t ? "area": "city",
            s = e.find(t || ".js-location-province"),
            r = e.find(i || ".js-location-city");
            s.change(function(t, i) {
                var l = [],
                c = s.val();
                n.getData(a, c,
                function(t) {
                    if (0 == t.length) r.hide().attr("disabled", "disabled");
                    else {
                        r.show().removeAttr("disabled");
                        for (var a = 0; a < t.length; a++) l = l.concat(['<option value="', t[a].id, '">', t[a].name, "</option>"]);
                        r.html(l.join("")),
                        i && o(r, i);
                        var s = e.find(".js-location-area");
                        s.length > 0 && (s.data("inited") || (s.data("inited", !0), n.initSelcet(e, ".js-location-city", ".js-location-area", "/area/listarea/")), r.attr("class").indexOf("js-location-city") > -1 && r.trigger("change", s.attr("val")))
                    }
                })
            });
            var l = s.attr("val") || "1";
            void 0 == l || t || l == s.val() || o(s, l),
            s.trigger("change", r.attr("val"))
        }
    },
    medal: function(e, t) {
        function i(t, n) {
            l = Math.min((s - c % s) / r, n);
            var d = l * r;
            if (d) {
                c += d;
                var p = document.createElement("p");
                p.className = o[t],
                p.title = a[t],
                p.style.width = d + "px",
                e.appendChild(p),
                n > l && i(t, n - l)
            }
        }
        if ("string" == typeof e && (e = document.getElementById(e)), e && 1 === e.nodeType && !isNaN(t) && 0 !== t) {
            e.innerHTML = "";
            for (var n = function() {
                var e = t;
                return e = Math.max(Math.min(e, 9999), 0).toString(),
                e = ("0000" + e).substr(e.length, 4)
            } (), o = ["gold", "silver", "copper", "flag"], a = ["1000份保险", "100份保险", "10份保险", "1份保险"], s = e.clientWidth || e.offsetWidth - e.clientLeft, r = 33, l = s / r, c = 0, d = 0; d < n.length; d++) i(d, n.substr(d, 1))
        }
    },
    upload: function(_option, _config) {
        function extend(e, t, i) {
            if (i) for (var n in t) e[n] = t[n];
            else for (var n in e) n in t && (e[n] = t[n]);
            return e
        }
        var swf, queue = {},
        stack = {},
        action = {
            cancel: function() {
                this.remove()
            },
            clear: function() {
                var e;
                for (e in queue) queue.hasOwnProperty(e) && this.remove(e)
            },
            remove: function(e) {
                queue[e].remove(),
                delete queue[e],
                delete stack[e],
                config.file_upload_limit && swf.setFileUploadLimit(++config.file_upload_limit),
                option.change(stack)
            }
        },
        handler = {
            file_dialog_start_handler: function() {
                option.debug && window.console && console.log(1, arguments)
            },
            file_queued_handler: function(e) {
                option.debug && window.console && console.log(2, arguments),
                stack[e.id] = {
                    data: option.data()
                };
                var t = option.describe();
                t = void 0 != t ? t.toString() + " - ": "",
                queue[e.id] = new Progress(option.progress).set({
                    text: t + e.name,
                    state: "准备",
                    button: "取消",
                    action: this.cancelUpload.bind(this, e.id),
                    rate: 0
                })
            },
            file_queue_error_handler: function(e, t) {
                option.debug && window.console && console.log(3, arguments);
                var i = e && e.name,
                n = "";
                switch (t) {
                case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
                    n = "上传的文件数量超过了允许的最大值";
                    break;
                case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
                    n = i + "的文件大小超过限制";
                    break;
                case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
                    n = i + "是空的";
                    break;
                case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
                    n = i + "不是允许的文件类型";
                    break;
                default:
                    n = "发生意外错误: " + t
                }
                option.error({
                    stack: stack,
                    file: e,
                    state: n,
                    res: null,
                    code: t
                })
            },
            file_dialog_complete_handler: function(e, t, i) {
                option.debug && window.console && console.log(4, arguments),
                this.startUpload()
            },
            upload_start_handler: function(e) {
                option.debug && window.console && console.log(5, arguments),
                queue[e.id].set({
                    state: "正在上传"
                }),
                option.before({
                    stack: stack,
                    file: e,
                    state: null,
                    res: null,
                    code: null
                })
            },
            upload_progress_handler: function(e, t, i) {
                option.debug && window.console && console.log(6, arguments),
                queue[e.id].set({
                    rate: t / i * 100
                })
            },
            upload_success_handler: function(file, res, state) {
                option.debug && window.console && console.log(7, arguments);
                try {
                    res = eval("(" + res + ")")
                } catch(e) {
                    window.console && console.error(e.message + "\n" + e.stack),
                    res = null
                }
                if (state) queue[file.id].set({
                    state: "上传成功"
                }),
                stack[file.id].res = res,
                option.success({
                    stack: stack,
                    file: file,
                    state: "上传成功",
                    res: res,
                    code: null
                });
                else if (res && res.code) {
                    var code = res.code || 0,
                    state;
                    switch (code) {
                    case 1:
                        state = "文件大小超过限制";
                        break;
                    case 2:
                        state = "不允许的文件类型";
                        break;
                    case 3:
                        state = "发生意外错误";
                        break;
                    default:
                        state = "上传失败"
                    }
                    queue[file.id].set({
                        state: state
                    }),
                    delete stack[file.id],
                    option.success({
                        stack: stack,
                        file: file,
                        state: state,
                        res: res,
                        code: code
                    })
                }
            },
            upload_error_handler: function(e, t) {
                option.debug && window.console && console.log(8, arguments);
                var i = "";
                switch (t) {
                case SWFUpload.UPLOAD_ERROR:
                    i = "上传失败";
                    break;
                case SWFUpload.UPLOAD_ERROR.MISSING_UPLOAD_URL:
                    i = "请设置上传路径";
                    break;
                case SWFUpload.UPLOAD_ERROR.IO_ERROR:
                    i = "传输文件失败";
                    break;
                case SWFUpload.UPLOAD_ERROR.SECURITY_ERROR:
                    i = "受到安全因素的限制，上传已取消";
                    break;
                case SWFUpload.UPLOAD_ERROR.UPLOAD_LIMIT_EXCEEDED:
                    return void(i = "上传的文件数量超过了允许的最大值");
                case SWFUpload.UPLOAD_ERROR.UPLOAD_FAILED:
                    i = "上传出现错误";
                    break;
                case SWFUpload.UPLOAD_ERROR.SPECIFIED_FILE_ID_NOT_FOUND:
                    i = "给startUpload()方法传入的文件id不存在";
                    break;
                case SWFUpload.UPLOAD_ERROR.FILE_VALIDATION_FAILED:
                    i = "开始上传文件时发生错误";
                    break;
                case SWFUpload.UPLOAD_ERROR.FILE_CANCELLED:
                    i = "已取消";
                    break;
                case SWFUpload.UPLOAD_ERROR.UPLOAD_STOPPED:
                    i = "已终止";
                    break;
                default:
                    i = "发生意外错误: " + t
                }
                e && (queue[e.id].set({
                    state: i
                }), delete stack[e.id]),
                option.error({
                    stack: stack,
                    file: e,
                    state: i,
                    res: null,
                    code: t
                })
            },
            upload_complete_handler: function(e) {
                option.debug && window.console && console.log(9, arguments),
                queue[e.id].set({
                    button: "删除",
                    action: action.remove.bind(action, e.id)
                }),
                option.complete({
                    stack: stack,
                    file: e,
                    state: null,
                    res: null,
                    code: null
                }),
                option.change(stack)
            }
        },
        option = {
            debug: !1,
            progress: "",
            before: function() {},
            change: function() {},
            complete: function() {},
            data: function() {
                return null
            },
            describe: function() {
                return null
            },
            error: function() {},
            success: function() {}
        },
        config = {
            debug: !1,
            button_text: "",
            button_text_style: "",
            button_image_url: "/",
            button_cursor: "-2",
            flash_url: "/flash/swfupload.swf",
            upload_url: "/uploadComponent/apply",
            file_types: "*.jpg;*.jpeg;*.png;*.gif",
            file_types_description: "图片",
            file_upload_limit: 0,
            file_queue_limit: 0,
            file_size_limit: "2097152B",
            button_placeholder_id: "swfupload_button_replace",
            button_window_mode: "transparent",
            button_width: 60,
            button_height: 33
        },
        Progress = function() {
            var e = function(e) {
                this.wrap = document.getElementById(e),
                this.wrap || (this.wrap = document.createElement("div")),
                this.item = document.createElement("div"),
                this.text = document.createElement("div"),
                this.state = document.createElement("div"),
                this.button = document.createElement("div"),
                this.rate = document.createElement("div"),
                this.item.className = "upload_progress_item",
                this.text.className = "upload_progress_text",
                this.state.className = "upload_progress_state",
                this.button.className = "upload_progress_button",
                this.rate.className = "upload_progress_rate",
                this.item.appendChild(this.text),
                this.item.appendChild(this.state),
                this.item.appendChild(this.button),
                this.item.appendChild(this.rate),
                this.wrap.appendChild(this.item)
            };
            return e.prototype = {
                remove: function() {
                    this.wrap.removeChild(this.item)
                },
                set: function(e) {
                    if (e) return void 0 !== e.text && (this.text.innerHTML = this.text.title = e.text),
                    void 0 !== e.state && (this.state.innerHTML = e.state),
                    void 0 !== e.rate && (this.rate.style.width = e.rate + "%"),
                    void 0 !== e.button && (this.button.innerHTML = e.button),
                    "function" == typeof e.action && (this.button.onclick = e.action),
                    this
                }
            },
            e
        } ();
        return extend(option, _option),
        extend(extend(config, _config), handler, !0),
        swf = new SWFUpload(config)
    },
    uploadThumbnail: function(e) {
        var t = document.createElement("link");
        t.rel = "stylesheet",
        t.href = $GC.staticServer + "/upload-thumbnail.css?_=" + $GC.version,
        document.head.appendChild(t),
        GL.load([GH.modules.swfupload, GH.modules.uploadThumbnail],
        function() {
            window.uploadThumbnail(e)
        })
    },
    expertHospitalCommon2015: function() {
        window.Set ? Set.prototype.del = Set.prototype["delete"] : (window.Set = function(e) {
            this.size = 0,
            this.entries = []
        },
        Set.prototype = {
            add: function(e) {
                for (var t = this.entries.length; t >= 0; t--) if (e === this.entries[t]) return this;
                return this.entries.push(e),
                this.size++,
                this
            },
            clear: function() {
                this.entries = [],
                this.size = 0
            },
            del: function(e) {
                for (var t = this.entries.length; t >= 0; t--) if (e === this.entries[t]) return this.entries.splice(t, 1),
                this.size--,
                !0;
                return ! 1
            },
            has: function(e) {
                for (var t = this.entries.length; t >= 0; t--) if (e === this.entries[t]) return ! 0;
                return ! 1
            }
        });
        var e = {
            active: function(t) {
                return function() {
                    var i = $(this);
                    return !! e.login() && void(i.hasClass("active") ? e.request({
                        url: i.attr("data-inactive"),
                        data: {
                            csrf_token: $('[name="csrf_token"]').val() || ""
                        },
                        fulfilled: function(e) {
                            $('[name="csrf_token"]').val(e.data && e.data.csrf_token ? e.data.csrf_token: ""),
                            i.removeClass("active"),
                            t.call(i[0], "inactive", e)
                        }
                    }) : e.request({
                        url: i.attr("data-active"),
                        data: {
                            csrf_token: $('[name="csrf_token"]').val() || ""
                        },
                        fulfilled: function(e) {
                            $('[name="csrf_token"]').val(e.data && e.data.csrf_token ? e.data.csrf_token: ""),
                            i.addClass("active"),
                            t.call(i[0], "active", e)
                        }
                    }))
                }
            },
            description: function(e, t, i) {
                var n = e.parent(),
                o = i || n.position(),
                a = $("<div class='more-description'>").css(o),
                s = $("<div>").appendTo(a),
                r = $("<a href='javascript:;'>收起</a>").css({
                    "float": "right"
                }).appendTo(a);
                r.click(function() {
                    s.unbind(),
                    r.unbind(),
                    a.remove(),
                    e.attr("data-show", null)
                }),
                s.append(t),
                a.appendTo(n.parent()).addClass("animation-slide-down"),
                e.attr("data-show", "true")
            },
            filter: function(e) {
                var t = e.parent(),
                i = t.height(),
                n = t.find("ul").height();
                return t.css({
                    height: i
                }),
                !(n < 2 * i) && (e.show(), void e.click(function() {
                    t.hasClass("active") ? (t.removeClass("active").css({
                        height: i
                    }), e.text("展开")) : (t.addClass("active").css({
                        height: n
                    }), e.text("收起"))
                }))
            },
            login: function(e) {
                return $GC.isLogined ? (e && e(), !0) : document.domain.indexOf("jklj") > -1 ? void(window.location.href = $GC.jkljServer + "/login?returnurl=" + encodeURIComponent(window.location.href)) : ($("#gh .login").click(), !1)
            },
            notice: function(e, t) {
                if (e.children().length > 1) {
                    var i = {
                        mode: "vertical",
                        pager: !1,
                        auto: !0,
                        moveSlides: 1,
                        nextText: "",
                        prevText: "",
                        infiniteLoop: !0,
                        autoHover: !0,
                        autoDirection: "next",
                        pause: 3e3
                    };
                    $.extend(i, t),
                    e.bxSlider(i)
                }
            },
            rate: function(e) {
                return !! e.length && void e.each(function(e, t) {
                    var i = $(t),
                    n = i.find("strong"),
                    o = n.text(),
                    a = /([\d\.]+)/g.test(o) && RegExp.$1 || "0",
                    s = i.find(".light"),
                    r = 121;
                    s.css({
                        width: Math.min(r, Math.max(0, a / 10 * r))
                    }),
                    1 * a === 0 ? n.text("暂无评分") : i.addClass("active"),
                    n.css("opacity", "1")
                })
            },
            request: function() {
                return $GU.request
            } (),
            share: function() {
                var e = $("#bdsharebuttonbox");
                if (e.length) {
                    var t;
                    return e.on("mouseleave mouseenter",
                    function(i) {
                        "mouseenter" === i.type ? clearTimeout(t) : t = setTimeout(function() {
                            e.hide()
                        },
                        1e3)
                    }),
                    function(i) {
                        return function() {
                            $.extend(_bd_share_config.share, {
                                bdDesc: this.getAttribute("data-share-desc"),
                                bdText: this.getAttribute("data-share-text"),
                                bdUrl: this.getAttribute("data-share-url") || location.href
                            }),
                            i.call(this, e),
                            e.show(),
                            clearTimeout(t),
                            t = setTimeout(function() {
                                e.hide()
                            },
                            1e3)
                        }
                    }
                }
                return function() {}
            } (),
            Slide: function() {
                var e = function(e, t) {
                    var i = this;
                    i.elem = {
                        wrap: $(e),
                        next: $(t.next),
                        prev: $(t.prev)
                    },
                    i.state = {
                        index: 0,
                        page: 0,
                        length: 0
                    },
                    i.options = $.extend({
                        num: 7
                    },
                    t),
                    i.$bind(),
                    i.refresh()
                };
                return e.prototype = {
                    $bind: function() {
                        var e = this,
                        t = (e.options, e.state),
                        i = e.elem;
                        i.next.length && i.next.on("click",
                        function() {
                            var i = t.page + 1;
                            e.aim(i)
                        }),
                        i.prev.length && i.prev.on("click",
                        function() {
                            var i = t.page - 1;
                            e.aim(i)
                        })
                    },
                    $render: function() {
                        var e = this,
                        t = (e.options, e.state),
                        i = e.elem,
                        n = i.wrap.children().eq(t.index);
                        i.wrap.css({
                            left: -n[0].offsetLeft
                        }),
                        0 === t.page ? i.prev.removeClass("active") : i.prev.addClass("active"),
                        t.page === t.pageLength - 1 ? i.next.removeClass("active") : i.next.addClass("active")
                    },
                    aim: function(e) {
                        var t = this,
                        i = t.options,
                        n = t.state;
                        t.elem;
                        return 0 !== n.length && (e < 0 && (e = 0), e > n.pageLength - 1 && (e = n.pageLength - 1), n.page = e, n.index = n.page * i.num, void t.$render())
                    },
                    refresh: function() {
                        var e = this,
                        t = e.options,
                        i = e.state,
                        n = e.elem;
                        i.length = n.wrap.children().length,
                        i.pageLength = Math.ceil(i.length / t.num),
                        e.aim(0)
                    }
                },
                e
            } (),
            Slide2: function() {
                var e = function(e, t) {
                    return !! e.nodeType && (this.wrap = e, this.box = e.children[0], this.container = this.box.children[0], this.children = this.container.children, this.options = this.extend({},
                    this.options, t), this.config = this.extend({},
                    this.config, {
                        index: 0,
                        length: this.children.length,
                        next: this.options.step < this.children.length
                    }), this.bind(), void this.refresh())
                };
                return e.prototype = {
                    config: {
                        index: 0,
                        length: 0,
                        prev: !1,
                        next: !0
                    },
                    options: {
                        delay: 0,
                        duration: 500,
                        margin: 10,
                        flex: !0,
                        step: 7,
                        wheel: !1
                    },
                    bind: function() {
                        var e = this.options;
                        e.prev && (e.prev.onclick = this.prev.bind(this)),
                        e.next && (e.next.onclick = this.next.bind(this))
                    },
                    extend: function(e) {
                        var t, i;
                        for (i = 1; t = arguments[i]; i++) for (var n in t) t.hasOwnProperty(n) && (e[n] = t[n]);
                        return e
                    },
                    next: function() {
                        this.slide("next", this.options.step)
                    },
                    prev: function() {
                        this.slide("prev", this.options.step)
                    },
                    refresh: function() {
                        var e = this.config,
                        t = this.options,
                        i = this.toggle;
                        t.next && i(t.next, "active", e.next),
                        t.prev && i(t.prev, "active", e.prev)
                    },
                    slide: function(e, t) {
                        var i, n = this.options,
                        o = this.config,
                        t = n.step,
                        a = this.container,
                        s = this.children,
                        r = o.index;
                        if ("prev" === e) i = Math.max(0, r - t);
                        else {
                            var l = o.length;
                            i = r + Math.min(t, l - r - t)
                        }
                        o.next = !(i + t >= l - 1),
                        o.prev = !!i,
                        a.style.left = s[0].offsetLeft - s[i].offsetLeft + "px",
                        o.index = i,
                        this.refresh()
                    },
                    toggle: function(e, t, i) {
                        var n = e.nodeType ? e.className: e,
                        o = t.split(" ");
                        if ("string" == typeof n) {
                            for (var a, s, r = 0; a = o[r]; r++) s = i,
                            n = n.replace(/\s+/g, "  ").replace(new RegExp("(^| )" + a + "($| )", "gi"),
                            function(e, t, i) {
                                return void 0 == s && (s = !1),
                                t + i
                            }),
                            0 != s && (n += " " + a);
                            return n = n.replace(/\s+/g, " ").trim(),
                            e.nodeType && (e.className = n),
                            n
                        }
                    }
                },
                e
            } ()
        };
        return $("body").delegate("[data-description]", "click",
        function() {
            if (!$(this).attr("data-show")) {
                var t, i = $(this).attr("data-description") || $(this).siblings(".more-description-container").html() || $(this).parent().siblings(".more-description-container").html();
                i && e.description($(this), i, t)
            }
        }),
        $("body").delegate("[data-href]", "click",
        function() {
            var t = $(this).data().href,
            i = !!$(this).data().login;
            i && !e.login() || t && (location.href = t)
        }),
        e
    }
},
function() {
    var e = {
        isActive: !0,
        checkLogin: function(e) {
            if (!$GC.isLogined) {
                if ($("#gh .login").length > 0) $("#gh .login").trigger("click"),
                "expert_embed" == $("#g-cfg").data("page") && ($GM.modalTrigger = $("#g-cfg .sche-list .js-add-fav"));
                else {
                    var t = $("#gm-login"),
                    i = t.find("form:eq(0)");
                    i.find("input").removeClass("error"),
                    i.find(".tips-error").text("").hide(),
                    i.find("i.error").remove(),
                    t.find(".captcha").trigger("click"),
                    $GM.loadDirectModal($(e), t)
                }
                return ! 1
            }
            return ! 0
        },
        displayWhile: function(e, t) {
            var i = e.html();
            e.html(t),
            setTimeout(function() {
                e.html(i)
            },
            2e3)
        },
        addFavReq: function(e) {
            var t = {
                hosp: "/my/favorite/hosp/",
                dept: "/my/favorite/hospdept/",
                expert: "/my/favorite/experts/"
            },
            i = t[e.type] + e.id,
            n = e.data,
            o = e.succCall,
            a = e.errCall,
            s = this;
            s.isActive && (s.isActive = !1, $.ajax({
                url: i,
                cache: !1,
                data: n,
                success: function(e) {
                    var t = e.data;
                    e.hasError ? a && a(t) : o && o(t),
                    s.isActive = !0
                },
                error: function() {
                    a && a(),
                    s.isActive = !0
                }
            }))
        },
        addFav: function(e) {
            var t = this;
            if (t.checkLogin(e.element)) {
                var i, n = $(e.element),
                o = e.type || n.attr("data-type"),
                a = n.attr("data-id"),
                s = n.attr("data-name"),
                r = e.succCall || t.addSuccCall,
                l = e.errCall || t.addErrCall;
                if (n.html("关注中..."), "hosp" === o) i = {
                    furi: "hospital/" + a,
                    hospname: s
                };
                else if ("dept" === o) {
                    var c = n.attr("data-hos"),
                    d = $('[name="csrf_token"]').val() || "";
                    i = {
                        furi: "department/" + a,
                        hospname: c,
                        hospdeptname: s,
                        csrf_token: d
                    }
                } else {
                    c = n.attr("data-hos");
                    var p = n.attr("data-dept");
                    i = {
                        furi: "expert/" + a,
                        hospname: c,
                        hospdeptname: p,
                        expertname: s
                    }
                }
                t.addFavReq({
                    type: o,
                    id: a,
                    data: i,
                    succCall: function(t) {
                        r && r(n, t),
                        t && t.csrf_token && $('[name="csrf_token"]').val(t.csrf_token),
                        e.extSuccCall && e.extSuccCall()
                    },
                    errCall: function() {
                        l && l(n)
                    }
                })
            }
        },
        addSuccCall: function(e, t) {
            e.hide().html("加入关注"),
            e.parents(".fav-container").find(".js-cancel-fav").show().find("a").attr("data-rid", t.rid)
        },
        addErrCall: function(e) {
            $GM.smartAlert("添加关注失败")
        },
        cancelFavReq: function(e) {
            var t = "/my/favorite/del/" + e.rid + "/" + e.type + "/" + e.id;
            2 == e.type && (t = "/my/favorite/experts/delete/" + e.id);
            var i = e.succCall,
            n = e.errCall,
            o = this,
            a = "?csrf_token=" + $('[name="csrf_token"]').val() || "";
            o.isActive && (o.isActive = !1, $.ajax({
                url: t + a,
                cache: !1,
                success: function(e) {
                    e.data.csrf_token && $('[name="csrf_token"]').val(e.data.csrf_token);
                    var t = e.data;
                    e.hasError ? n && n(t) : i && i(t),
                    o.isActive = !0
                },
                error: function() {
                    n && n(),
                    o.isActive = !0
                }
            }))
        },
        cancelFav: function(e) {
            var t = this;
            if (t.checkLogin()) {
                var i = $(e.element),
                n = e.succCall || t.cancelSuccCall,
                o = e.errCall || t.cancelErrCall;
                t.cancelFavReq({
                    type: i.attr("data-type"),
                    id: i.attr("data-id"),
                    rid: i.attr("data-rid"),
                    succCall: function(t) {
                        n && n(i, t),
                        e.extSuccCall && e.extSuccCall()
                    },
                    errCall: function() {
                        o && o(i)
                    }
                })
            }
        },
        cancelSuccCall: function(e) {
            e.parents(".js-cancel-fav").hide(),
            e.parents(".fav-container").find(".js-add-fav").show()
        },
        cancelErrCall: function(e) {
            $GM.smartAlert("取消关注失败")
        }
    };
    GreenLine.Favorite = e
} (),
function() {
    var e = 0;
    GreenLine.Dialog = {
        init: function(t) {
            var i = $.extend({},
            this);
            i.settings = t;
            var n = !!t.url;
            n && (t.content = '<div class="loading"><div class="loading-pic"></div></div>');
            var o = i.renderTo = document.body,
            a = i.initHtml(),
            s = document.createElement("div");
            s.innerHTML = a,
            o.appendChild(s.childNodes[0]),
            o.appendChild(s.childNodes[0]);
            var r = i.mask = $("#dialogMask" + e);
            return i.container = r.prev(),
            0 != t.showDialog && i.show(),
            i.initListener(),
            n && (i.container.find(".action").hide(), i.request(t)),
            i.inited = !0,
            i
        },
        initHtml: function() {
            var t = this,
            i = t.settings,
            n = i.width,
            o = i.title || "友情提示",
            a = ['<div class="gm-box ', i.extClass || "", '" style="', i.fixed && !$GU.isIE6() ? "position:fixed;": "", "margin-left:0;", n ? "width:" + n + "px;": "", "z-index:", i.dialogZindex || 5001, '">', '<div class="title">', '<span title="', o, '">', o, "</span>", '<a title="关闭" class="close gm-close js-close" href="javascript:;"></a>', "</div>", '<div class="body">', '<div class="g-tips-box-error js-error-tips" style="display:none">', '<span class="gi gi-error"></span>', '<span class="content"></span>', "</div>", '<div class="g-tips-box-succ hide">', '<span class="gi gi-succ"></span>', '<span class="content"></span>', "</div>", i.content || '<div class="common-content">' + i.commonContent + "</div>", "</div>", '<div class="foot">'];
            return i.noAction || (a.push('<div class="action">'), i.noOkBtn || a.push('<a class="', i.okCls || "gbn gbt-blue1", ' js-ok" href="javascript:;">', i.okTxt || "确定", "</a>"), i.noCancelBtn || a.push('<a class="', i.cancelCls || "gbn gbt-gray", ' js-cancel" href="javascript:;">', i.cancelTxt || "取消", "</a>"), a.push("</div>")),
            a.push("</div>", "</div>", '<div id="dialogMask', ++e, '" class="g-mask"', 0 == i.showMask ? 'style="display:none"': "", "></div>"),
            a.join("")
        },
        position: function() {
            var e = this,
            t = document,
            i = e.container,
            n = ((t.documentElement.offsetWidth || t.body.offsetWidth) - i.width()) / 2,
            o = ((t.documentElement.clientHeight || t.body.clientHeight) - i.height()) / 2 + $(document).scrollTop();
            o = o < 10 ? window.screen.height / 2 - 200 : o,
            i.css({
                left: n + "px",
                top: o - (e.settings.offsetTop || 0) + "px"
            })
        },
        show: function() {
            var e = this,
            t = e.settings,
            i = e.mask;
            0 != t.showMask && i.css({
                bottom: 0
            }),
            e.container.show(),
            e.position()
        },
        showError: function(e) {
            var t = this;
            t.find(".js-error-tips").show().find(".content").html(e)
        },
        hideError: function() {
            this.find(".js-error-tips").hide()
        },
        initListener: function() {
            var e = this,
            t = e.container,
            i = e.settings;
            t.delegate(".js-close", "click",
            function(t) {
                var n = i.closeCall; (n && n()) !== !1 && e.hide()
            }),
            i.noAction || (i.noOkBtn || t.delegate(".js-ok", "click",
            function(t) {
                var n = i.okCall;
                e.hideError(),
                (n && n()) !== !1 && e.hide()
            }), i.noCancelBtn || t.delegate(".js-cancel", "click",
            function(t) {
                var n = i.cancelCall; (n && n()) !== !1 && e.hide()
            })),
            i.fixed && $GU.isIE6() && $(window).scroll(function() {
                e.position()
            })
        },
        clear: function() {
            var e = this,
            t = e.find("form");
            if (t.length > 0) {
                var i = t.data("validator");
                i && i.reset()
            }
            e.container.remove(),
            e.mask.remove(),
            e.inited = !1
        },
        hide: function() {
            var e = this;
            e.clear()
        },
        request: function(e) {
            var t = this,
            i = e.url,
            n = e.responseCall;
            $.ajax({
                url: i,
                cache: !1,
                dataType: "html",
                success: function(e) {
                    var i = t.container;
                    i.find(".action").show(),
                    i.find(".body").get(0).innerHTML = e,
                    t.position(),
                    n && n()
                },
                error: function() {
                    t.container.find(".body").html(['<div class="error g-clear">', '<span class="gi gi-error-big"></span>', '<div class="tips">', e.loadErrorTips || "系统繁忙，请稍后再试。", "</div>", "</div>"].join("")),
                    t.position()
                }
            })
        },
        load: function(e) {
            var t = this;
            t.init(e)
        },
        find: function(e) {
            var t = this;
            return t.container.find(e)
        },
        turnToAlert: function() {
            var e = this;
            e.find(".js-cancel").hide(),
            e.find(".js-ok").removeClass("js-ok").addClass("js-cancel").html("确定")
        }
    }
} (),
function() {
    var e = GreenLine.BottomDialog = {};
    $.extend(e, GreenLine.Dialog),
    $.extend(e, {
        initBottomDialog: function(e) {
            var t = this,
            i = e.showDialog;
            e.noAction = !0,
            e.showMask = !1,
            e.showDialog = !1,
            e.dialogZindex = 1,
            t = t.init(e),
            0 != i && t.showAtBottom()
        },
        showAtBottom: function() {
            var e = this,
            t = e.settings.initBottom || -200,
            i = e.container;
            if ($GU.isIE6()) {
                var n = function() {
                    return $(document).scrollTop() + $(window).height() + 3
                },
                o = n();
                i.css({
                    display: "block",
                    right: 25,
                    top: o
                }).animate({
                    top: o - i.height()
                });
                var a = function() {
                    i.css({
                        top: n() - i.height()
                    })
                };
                $(window).scroll(a)
            } else i.css({
                position: "fixed",
                bottom: t,
                right: 25,
                display: "block"
            }).animate({
                bottom: -8
            })
        },
        hide: function() {
            var e = this;
            if (e.inited) {
                var t = e.settings.initBottom || -300,
                i = e.container;
                if ($GU.isIE6()) {
                    var n = function() {
                        return $(document).scrollTop() + $(window).height() + 3
                    },
                    o = n();
                    i.animate({
                        top: o
                    },
                    "normal", "linear",
                    function() {
                        e.clear()
                    })
                } else i.animate({
                    bottom: t
                },
                "normal", "linear",
                function() {
                    e.clear()
                })
            }
        }
    })
} (),
function() {
    GreenLine.openComment = {
        init: function(e) {
            var t = this;
            return $GC.isLogined ? (t.isactive = !0, void $GD.load({
                title: e.title,
                width: e.width,
                url: e.target,
                extClass: e.extClass,
                okTxt: e.okTxt,
                okCall: function() {
                    return t.doRequest(t.form),
                    !1
                },
                responseCall: function() {
                    t.initFun()
                },
                cancelCall: function() {
                    t.form && t.form.data("validator") && t.form.data("validator").reset()
                },
                closeCall: function() {
                    t.form && t.form.data("validator") && t.form.data("validator").reset()
                }
            })) : void $("#gh .login").trigger("click")
        },
        initFun: function() {
            var e = this,
            t = $GD.container;
            if (e.cont = t, t.find("form").length > 0) {
                e.form = t.find("form"),
                e.form.validator({
                    formEvent: "null",
                    zIndex: 5001
                }),
                e.form.find("input.reason-input").glPlaceholder(),
                e.form.find("textarea").glPlaceholder(),
                t.find(".glRating").glRating();
                var i = new Date,
                n = i.getMonth() + 1,
                o = i.getFullYear() + "-" + n + "-" + i.getDate();
                GL.load([GH.modules.datepicker],
                function() {
                    t.find(".g-datepicker input").datepicker({
                        maxDate: "0",
                        showOn: "both",
                        defaultDate: o,
                        buttonImageOnly: !0
                    }),
                    t.find(".g-datepicker input").click(function() {
                        e.form.data("validator").reset()
                    }),
                    t.find(".g-datepicker span").click(function() {
                        e.form.data("validator").reset()
                    })
                }),
                e.form.find("span.glRating").hover(function() {
                    e.form.data("validator").reset(),
                    e.form.find(".red").remove()
                })
            } else t.find(".js-ok").remove(),
            t.find(".js-cancel").removeClass("gbt-gray").addClass("gbt-green").html("关闭")
        },
        checkStars: function(e) {
            var t = !0;
            return e.find(".glRating input").each(function() {
                $(this).val() < 3 && "" !== $(this).val() && (t = !1)
            }),
            t
        },
        showErrInfo: function(e) {
            var t = this,
            i = t.cont.find(".g-tips-box-error").find(".content");
            "string" == typeof e ? i.html(e) : "object" == typeof e && i.html(e.message),
            t.isactive = !0,
            t.cont.find(".g-tips-box-error").show()
        },
        checkTextArea: function(e) {
            function t(e) {
                for (var t = e.length,
                i = 0,
                n = 0; n < t; n++) e.charCodeAt(n) < 27 || e.charCodeAt(n) > 126 ? i += 2 : i++;
                return i
            }
            var i = (new RegExp(/^[A-Za-z\u4e00-\u9fa5]+$/), e.find("textarea").val()),
            n = t(i);
            return n > 500 || n < 5 ? (this.showErrInfo("您输入的文字长度未符合要求."), null) : "ok"
        },
        doRequest: function(e) {
            var t = e.attr("action"),
            i = this;
            e.data("validator").checkValidity() && i.isactive && (i.isactive = !1, e.find(".js-ok").html("提交中..."), $.ajax({
                url: t,
                cache: !1,
                data: e.serialize(),
                type: "POST",
                dataType: "json",
                success: function(e) {
                    e.hasError ? i.showErrInfo(e) : (i.cont.find(".body").html("<div class='request-result'><div class='gi1 gi-bigger-succ'></div><div class='title-text'>感谢您的评价！</div></div>"), i.cont.find(".js-ok").remove(), i.cont.find(".js-cancel").removeClass("gbt-gray").addClass("gbt-green").html("关闭"))
                },
                error: function(e) {
                    i.showErrInfo("系统繁忙，请稍后再试。")
                }
            }))
        }
    }
} (),
function() {
    var e, t = GreenLine.Qa = {
        showAskDialog: function(i) {
            return !! $GU.checkLogin() && void GL.load([GH.modules.autocomplete],
            function() {
                $GD.load({
                    title: i.title || "我要提问",
                    extClass: "gm-question-dialog",
                    url: "/my/topic/addTopic" + (i.urlParams || ""),
                    responseCall: function() {
                        if (e = $GD.find("form"), e.length > 0) {
                            e.find("textarea").limitedText({
                                max: 500,
                                min: 20
                            }),
                            e.append(i.extParams),
                            $("#validCodeImg,#refreshCode").click(function() {
                                var e = $("#validCodeImg"),
                                t = e.attr("src"),
                                i = t.lastIndexOf("/");
                                i > 0 && e.attr("src", t.substring(0, i + 1) + Math.floor(1e7 * Math.random()))
                            });
                            var n = $("#addTopicContTextarea");
                            n.glPlaceholder();
                            var o = function() {
                                var e = {
                                    0 : "",
                                    1 : "我今年30岁，间断性头痛5年多了，曾做过头颅CT未见明确异常，自行服用止痛药会缓解，请问还需做哪些检查才能明确诊断？止痛药是否可以长期服用？平时应该注意些什么？",
                                    2 : "患胆结石多年，结石多颗，伴有炎症，吃油腻的东西就会疼痛发作，请问是否需要手术？切除胆囊会对身体带来哪些伤害？",
                                    3 : "本人患高血压多年，以前一直吃珍菊降压片，控制的还算稳定，但今年冬季血压波动的厉害，经常头晕，请问是否需要调整药物治疗？",
                                    4 : "外婆中风多年，现整日卧床只能靠别人照顾，比较头痛的是躺的久了，背部、臀部、腰骶部都会出现褥疮，不知该如何护理？",
                                    5 : "乳腺增生，每当月经来潮前胸部都痛的厉害，不敢触碰，不知该如何治疗？"
                                },
                                t = e[this.value];
                                n.refreshPlaceholder(t)
                            };
                            if ($("#categorySelect").change(o), i.showDisease) {
                                var a = $("#diseaseIdSel");
                                $("#diseaseOption").show();
                                var s = $("#diseaseNameIpt");
                                s.glPlaceholder(),
                                s.parent(".g-iptph-wrap").hide().css("float", "left"),
                                s.autocomplete({
                                    source: "/search/suggest?type=disease&count=10",
                                    autoFocus: !0,
                                    zIndex: 6e3,
                                    normalize: function(e) {
                                        var t = [],
                                        i = e.suggest.disease,
                                        n = new RegExp(e.q, "g");
                                        return i && $.each(i,
                                        function() {
                                            t.push({
                                                label: this.name.replace(n, "<em>" + e.q + "</em>"),
                                                value: this.name,
                                                id: this.uuid,
                                                url: "javascript:;"
                                            })
                                        }),
                                        t
                                    },
                                    select: function(e, i) {
                                        $("#diseaseIdHipt").val(i.item.id),
                                        t.diseaseName = i.item.value
                                    }
                                }),
                                0 == a.val() && s.show().parent(".g-iptph-wrap").show(),
                                a.change(function() {
                                    0 == a.val() ? s.show().val("").parent(".g-iptph-wrap").show() : (s.hide().val(a.find("option:selected").text()).parent(".g-iptph-wrap").hide(), e.data("validator").reset())
                                })
                            } else $("#diseaseOption").remove();
                            e.validator({
                                formEvent: "null",
                                zIndex: 999999
                            })
                        } else $GD.turnToAlert()
                    },
                    okCall: function() {
                        if (!e.data("validator").checkValidity()) return ! 1;
                        var n = $GD.find(".js-ok");
                        if ($GUB.isActive(n)) {
                            var o = $("#diseaseIdSel");
                            0 != o.val() ? $("#diseaseNameIpt").val(o.find("option:selected").text()) : $("#diseaseNameIpt").val() != t.diseaseName ? $("#diseaseIdHipt").val("") : $("#diseaseIdSel").val($("#diseaseIdHipt").val()),
                            $GUB.disable(n, "提交中…");
                            var a = "/my/topic/saveTopic",
                            s = "post";
                            return $GU.logs("2", a, s),
                            $.ajax({
                                url: a,
                                type: s,
                                cache: !1,
                                data: e.serialize(),
                                success: function(e) {
                                    $GUB.enable(n, "确定"),
                                    e.hasError ? $GU.showTips({
                                        margin: "0 0 10px 0",
                                        container: "#tipsContainer",
                                        type: "error",
                                        content: e.message
                                    }) : ($GD.turnToAlert(), $GD.find(".body").html('<div class="request-result"><span class="gi1 gi-bigger-succ"></span><div class="title-text">您的问题已提交！</div><div class="content-text">您可以在<a href="/my/topic/sponsor" target="_blank">个人中心-我的提问</a>里面找到此问题，并查看最新的回复。</div></div>'), i.extCall && i.extCall())
                                },
                                error: function() {
                                    $GUB.enable(n, "确定"),
                                    $GU.showTips({
                                        margin: "0 0 10px 0",
                                        type: "error",
                                        container: "#tipsContainer",
                                        content: "系统繁忙，请稍后再试"
                                    })
                                }
                            }),
                            !1
                        }
                    }
                })
            })
        },
        showRecQuest: function() {
            var e = this;
            if (!$GC.isLogined) return ! 1;
            var t = "/my/topic/recommend",
            i = "post";
            $GU.logs("1", t, i),
            $.ajax({
                url: t,
                type: i,
                cache: !1,
                success: function(t) {
                    t.indexOf("hasError") < 0 && e.showReplyDialog(t)
                }
            })
        },
        showReplyDialog: function(t) {
            var i = this;
            $GBD.initBottomDialog({
                extClass: "question-bottom-dialog",
                showDialog: !1,
                content: t
            }),
            $GBD.find(".title span").html($("#hiddenReplayTitleSpn").html()),
            e = $GBD.find("form"),
            e.find("textarea").limitedText({
                max: 500,
                min: 5
            }),
            $GBD.find(".less-content .more").click(function() {
                $(this).parent().parent().hide().parent().find(".more-content").show()
            }),
            $GBD.find(".more-content .less").click(function() {
                $(this).parent().parent().hide().parent().find(".less-content").show()
            }),
            $("#recDialogBtn").click(function() {
                i.submitReplyDialog()
            }),
            $GBD.showAtBottom()
        },
        submitReplyDialog: function() {
            var t = e.find("textarea").val();
            if (t.length < 5 || t.length > 500) return $GU.showTips({
                margin: "0 0 10px 0",
                container: "#botDialogTipsCont",
                type: "error",
                content: "请输入5-500字的内容"
            }),
            !1;
            var i = $("#recDialogBtn");
            if ($GUB.isActive(i)) {
                $GUB.disable(i, "提交中…");
                var n = "/my/topic/replyTopic",
                o = "post";
                return $GU.logs("2", n, o),
                $.ajax({
                    url: n,
                    type: o,
                    cache: !1,
                    data: e.serialize(),
                    success: function(e) {
                        $GUB.enable(i, "我来回答"),
                        e.hasError ? $GU.showTips({
                            margin: "0 0 10px 0",
                            container: "#botDialogTipsCont",
                            type: "error",
                            content: e.message
                        }) : $GBD.find(".body").html('<div class="request-result"><span class="gi1 gi-bigger-succ"></span><div class="title-text">您的回答已提交！</div><div class="content-text">您可以在<a href="/my/topic/reply" target="_blank">个人中心-我回答过的问题</a>里面找到此问题，并查看最新的回复。</div></div>')
                    },
                    error: function() {
                        $GUB.enable(i, "我来回答"),
                        $GU.showTips({
                            margin: "0 0 10px 0",
                            type: "error",
                            container: "#botDialogTipsCont",
                            content: "系统繁忙，请稍后再试"
                        })
                    }
                }),
                !1
            }
        }
    }
} (),
$GU = GreenLine.Util,
$GUB = GreenLine.Util.Button,
$GUS = GreenLine.Util.sendmail,
$GUF = GreenLine.Util.sendFlag,
$GUM = GreenLine.Util.monitor,
$GUU = GreenLine.Util.upload,
$GM = GreenLine.Modal2,
$GMC = GreenLine.Modal2.confirmModal,
$GFO = GreenLine.Flyout,
$GW = GreenLine.Widget,
$GD = GreenLine.Dialog,
$GBD = GreenLine.BottomDialog,
$GFL = GreenLine.featureLead,
function(e) {
    e.fn.glTabs = function(t) {
        var i = {
            content: ".js-tab-content",
            tabs: ".js-tabs",
            tabChild: "a",
            onCls: "on",
            event: "click"
        };
        return e.extend(i, t),
        this.each(function() {
            var t = e(this),
            n = t.find(i.tabs);
            n.find(i.tabChild).on(i.event,
            function() {
                if (e(this).hasClass(i.onCls)) return ! 1;
                var o = n.find(i.tabChild).removeClass(i.onCls).index(e(this));
                return e(this).addClass(i.onCls),
                t.find(i.content).hide(),
                t.find(i.content + ":eq(" + o + ")").show(),
                !1
            })
        })
    },
    e.fn.forceNumberOnly = function() {
        this.each(function() {
            e(this).keydown(function(t) {
                var i = [8, 9, 13, 35, 36, 37, 39],
                n = i.join(",").match(new RegExp(t.which)); ! t.which || 49 <= t.which && t.which <= 57 || 97 <= t.which && t.which <= 105 || 48 == t.which && e(this).attr("value") || 96 == t.which && e(this).attr("value") || n || t.preventDefault()
            })
        })
    },
    e.fn.glTooltip = function(t) {
        e(this).on("mouseenter",
        function() {
            var i = e(this).data("validtips");
            if ("" != e.trim(i)) {
                var n = e("#valid-tips");
                if (0 == n.length && (n = e("<div/>", {
                    id: "valid-tips"
                }).appendTo(e("body"))), n.html(e(this).data("validtips") + "<i class='" + t[arrow] + "'></i>"), t) {
                    var o, a;
                    if ("middle" === t.position) {
                        var s = (e(this).height() - n.height()) / 2;
                        o = e(this).offset().top + Math.floor(s),
                        o = (t.topOffset ? o + t.topOffset: o) + "px"
                    }
                    t.leftOffset && (a = e(this).offset().left + e(this).outerWidth() + t.leftOffset + "px"),
                    t.cssStyle && n.css(t.cssStyle),
                    n.css({
                        top: o,
                        left: a
                    })
                } else n.css({
                    top: e(this).offset().top + "px",
                    left: e(this).offset().left + e(this).outerWidth() + "px"
                });
                n.show()
            }
            return ! 1
        }),
        e(this).on("mouseleave",
        function() {
            return e("#valid-tips").hide(),
            !1
        })
    },
    e.fn.popTextTips = function(t) {
        e(this).on("mouseenter",
        function() {
            var i = e(this).data("tiptext");
            if ("" != e.trim(i)) {
                var n = e("#J_TipBox");
                0 == n.length && (n = e("<div/>", {
                    id: "J_TipBox",
                    "class": "g-pop-textTip"
                }).appendTo(e("body"))),
                n.html(i),
                t.arrow && n.append("<i class='" + t.arrow + "'></i>"),
                t.className && n.addClass(t.className);
                var o = e(this).offset().top,
                a = e(this).offset().left + e(this).outerWidth();
                t.top && (o = t.top + o),
                t.left && (a = t.left + a),
                n.css({
                    top: o,
                    left: a
                }),
                n.show()
            }
            return ! 1
        }),
        e(this).on("mouseleave",
        function() {
            return e("#J_TipBox").hide(),
            !1
        })
    },
    e.fn.inputTips = function(t) {
        return this.each(function() {
            var i = e.trim(e(this).val());
            "" != i && i != e(this).data("tips") || e(this).val(t),
            e(this).data("tips", t),
            e(this).unbind("focusin.inputtips"),
            e(this).unbind("focusout.inputtips"),
            e(this).bind("focusin.inputtips",
            function() {
                var i = e.trim(e(this).val());
                "" != i && i != t || e(this).removeClass("tipIt").val("")
            }),
            e(this).bind("focusout.inputtips",
            function() {
                var i = e.trim(e(this).val());
                "" != i && i != t || e(this).addClass("tipIt").val(t)
            }),
            e(this).trigger("focusout.inputtips")
        })
    },
    e.fn.glRating = function() {
        var t = 100;
        return this.each(function() {
            var i = e(this);
            i.css("z-index", t--);
            var n = 0;
            e("<i/><i/><i/><i/><i/>").appendTo(i),
            e("<span class='text'/>").appendTo(i);
            var o = i.find("i"),
            a = e(this).attr("data-rating-type");
            a || (a = "empty");
            var s = $GC.glRating[a],
            r = $GC.glRating.empty;
            o.mouseenter(function() {
                var t = o.index(e(this));
                o.removeClass("on"),
                o.removeClass("ongray"),
                t < 2 ? i.find("i:lt(" + (t + 1) + ")").addClass("ongray") : i.find("i:lt(" + (t + 1) + ")").addClass("on");
                var n = o.eq(t),
                a = s[t];
                if (void 0 == i.data("rating-type-show") || i.data("rating-type-show")) var r = !0;
                else var r = !1;
                "" != e.trim(a) && r && (0 == i.find("#rating-tips").length && e("<span/>", {
                    id: "rating-tips"
                }).appendTo(i), i.find("#rating-tips").html(a + "<strong></strong>").css({
                    top: n.position().top + n.outerHeight() + "px",
                    left: n.position().left - 9 + "px"
                }).show())
            }).mouseleave(function() {
                o.removeClass("ongray"),
                o.removeClass("on"),
                n < 3 ? i.find("i:lt(" + n + ")").addClass("ongray") : i.find("i:lt(" + n + ")").addClass("on"),
                i.find("#rating-tips").hide()
            }).click(function() {
                n = o.index(e(this)) + 1,
                i.data("rating", n),
                i.find("input.rating").val(n),
                n > 0 ? i.find("span.text").html(r[n - 1]) : i.find("span.text").html("")
            })
        })
    },
    e.fn.limitedText = function(t) {
        function i(e) {
            var i = e.val();
            if (i.length > n) e.val(i.substring(0, n));
            else {
                var a = e.parents(".js-textarea-container");
                0 == a.length && (a = e.parent()),
                null != o ? (a.find("span.minWord").html("最少<span class='num1'>" + (t.min || 20) + "</span>个字，"), a.find(".comment-limit label").text("需要"), a.find(".num").text(o - i.length), i.length > o && (a.find("span.minWord").html(""), a.find(".comment-limit label").text("可以"), a.find(".num").text(n - i.length))) : a.find(".num").text(n - i.length)
            }
        }
        var n = t.max,
        o = t.min;
        return this.each(function() {
            e(this).data("tips") != e(this).val() && (null != o ? (e(this).parent().find(".num").text(t.min - e(this).val().length), e(this).val().length > o && e(this).parent().find(".num").text(n - e(this).val().length)) : e(this).parent().find(".num").text(t.max - e(this).val().length)),
            e(this).keydown(function() {
                i(e(this))
            }),
            e(this).keyup(function() {
                i(e(this))
            })
        })
    }
} (jQuery),
function(e) {
    function t(t, i) {
        function n() {
            return a[0].complete ? void o._run() : void setTimeout(n, 20)
        }
        var o = this;
        if (o.slidersDom = t, o.sliders = t.find("li"), o.options = {
            imgPath: $GC.staticServer + "/img/v2/gl/",
            auto: !0,
            interval: 5e3
        },
        e.extend(this.options, i), o.prevIndex = 0, o.currentIndex = 0, o.isAnimating = !1, o.autoInterval = null, 1 == o.sliders.length)(function() {
            this.css({
                display: "block",
                background: "url('" + o.options.imgPath + this.data("img") + "') " + this.data("bg") + " no-repeat center center",
                opacity: 1,
                "z-index": 1
            })
        }).call(o.sliders);
        else {
            var a = [];
            o.sliders.each(function(t) {
                if (e(this).css({
                    opacity: 0,
                    "z-index": 0,
                    display: "hide"
                }), 0 == t) {
                    var i = new Image;
                    i.src = o.options.imgPath + e(this).data("img"),
                    a.push(i)
                }
            }),
            n()
        }
    }
    e.extend(t.prototype, {
        _run: function() {
            var t = this,
            i = t.sliders,
            n = t.slidersDom;
            i.hover(function() {
                t.clearAutoInterval()
            },
            function() {
                t.setAutoInterval()
            }),
            n.on("click", ".pagers a",
            function() {
                e(this).hasClass("on") || (t.clearAutoInterval(), t.go(e(this).parent().find("a").index(e(this))))
            }),
            i.each(function(i) {
                e(this).css({
                    display: "block",
                    background: "url('" + t.options.imgPath + e(this).data("img") + "') " + e(this).data("bg") + " no-repeat center center"
                }),
                0 == i && e(this).css({
                    opacity: 1,
                    "z-index": 1
                })
            }),
            t.setAutoInterval(),
            t._updatePager()
        },
        _updatePager: function() {
            var t = this,
            i = t.sliders,
            n = t.slidersDom,
            o = n.find(".pagers");
            if (0 == o.length) {
                o = e("<div/>", {
                    "class": "pagers"
                });
                for (var a = 0; a < i.length; a++) o.append(e("<a href='javascript:;' hidefocus='hidefocus'></a>"));
                o.appendTo(n).css("margin-left", -o.width() / 2 + "px").find("a:eq(0)").addClass("on")
            } else o.find("a").removeClass("on"),
            o.find("a:eq(" + t.currentIndex + ")").addClass("on")
        },
        setAutoInterval: function() {
            var e = this;
            return !! e.options.auto && void(e.autoInterval || (e.autoInterval = setInterval(function() {
                e.go()
            },
            e.options.interval)))
        },
        clearAutoInterval: function() {
            clearInterval(this.autoInterval),
            this.autoInterval = null
        },
        _animate: function() {
            var e = this,
            t = e.sliders,
            i = t.eq(e.prevIndex).css({
                "z-index": 2
            });
            t.eq(e.currentIndex).css({
                "z-index": 1,
                opacity: 1
            });
            e._updatePager(),
            i.animate({
                opacity: 0
            },
            1e3,
            function() {
                i.css({
                    "z-index": 0,
                    opacity: 0
                }),
                e.isAnimating = !1,
                e.setAutoInterval()
            })
        },
        go: function(e) {
            var t = this,
            i = t.sliders;
            return ! t.isAnimating && (t.isAnimating = !0, t.prevIndex = t.currentIndex, null == e ? (t.currentIndex++, t.currentIndex == i.length && (t.currentIndex = 0)) : t.currentIndex = e, void t._animate())
        }
    }),
    e.fn.bannerSlider = function(i) {
        return this.data("bs") || 0 == this.find("li").length ? this: this.each(function() {
            var n = e(this),
            o = new t(n, i);
            n.data("bs", o)
        })
    }
} (jQuery),
function(e, t, i) {
    function n(e) {
        return e
    }
    function o(e) {
        return decodeURIComponent(e.replace(a, " "))
    }
    var a = /\+/g;
    e.cookie = function(a, s, r) {
        if (s !== i && !/Object/.test(Object.prototype.toString.call(s))) {
            if (r = e.extend({},
            e.cookie.defaults, r), null === s && (r.expires = -1), "number" == typeof r.expires) {
                var l = r.expires,
                c = r.expires = new Date;
                c.setDate(c.getDate() + l)
            }
            return s = String(s),
            t.cookie = [encodeURIComponent(a), "=", r.raw ? s: encodeURIComponent(s), r.expires ? "; expires=" + r.expires.toUTCString() : "", r.path ? "; path=" + r.path: "", r.domain ? "; domain=" + r.domain: "", r.secure ? "; secure": ""].join("")
        }
        r = s || e.cookie.defaults || {};
        for (var d, p = r.raw ? n: o, u = t.cookie.split("; "), h = 0; d = u[h] && u[h].split("="); h++) if (p(d.shift()) === a) return p(d.join("="));
        return null
    },
    e.cookie.defaults = {},
    e.removeCookie = function(t, i) {
        return null !== e.cookie(t, i) && (e.cookie(t, null, i), !0)
    }
} (jQuery, document),
function(e) {
    e.fn.initSche = function() {
        function t(t, i, n) {
            var o = t.data("show") ? t.data("show") : GL.DateH.asString(new Date, "yyyy-mm-dd");
            t.find(".prev,.next").hide(),
            n && (t.find(".prev,.next").show(), 0 == i ? t.find(".prev").hide() : i == n - 1 ? t.find(".next").hide() : t.find(".prev,.next").show());
            var a = GL.DateH.addDays(GL.DateH.fromString(o, "yyyy-mm-dd"), 7 * i);
            t.find(".d").each(function() {
                e(this).html(GL.DateH.asString(a, "mm/dd") + "<br/>" + GL.DateH.getDayName(a)),
                GL.DateH.addDays(a, 1)
            })
        }
        return this.each(function() {
            var i = e(this),
            n = i.find(".sches"),
            o = i.find(".js-navi"),
            a = null;
            n.find("li").show().length > 1 ? (a = n.find("ul").bxSlider({
                pager: !1,
                infiniteLoop: !1,
                controls: !1,
                onSlideAfter: function() {
                    t(o, a.getCurrentSlide(), a.getSlideCount())
                }
            }), t(o, a.getCurrentSlide(), a.getSlideCount()), o.find(".prev").on("click",
            function() {
                a.goToPrevSlide()
            }), o.find(".next").on("click",
            function() {
                a.goToNextSlide()
            })) : t(o, 0),
            $GC.isLogined ? n.find(".order-it").click(function() {
                return GreenLine.Modal2.confirmTreatModal.load(e(this)),
                !1
            }) : i.find(".login-to-see").click(function() {
                return e("#gh .login").trigger("click"),
                !1
            }),
            n.find("[data-tips]").mouseenter(function() {
                var t = e(this).data("tips");
                if ("" != e.trim(t)) {
                    var i = e("#sche-tips");
                    0 == i.length && (i = e("<div/>", {
                        id: "sche-tips"
                    }).appendTo(e("body"))),
                    i.html(e(this).data("tips") + "<i></i>").css({
                        top: e(this).offset().top + e(this).outerHeight() + "px",
                        left: e(this).offset().left + "px"
                    }),
                    i.show()
                }
                return ! 1
            }).mouseleave(function() {
                return e("#sche-tips").hide(),
                !1
            })
        })
    }
} (jQuery),
function(e) {
    function t(t) {
        var i = this;
        t.data("phtext") ? i.doInit(t) : e.each(t.find("[data-phtext]"),
        function(t, n) {
            i.doInit(e(n))
        })
    }
    e.extend(t.prototype, {
        doInit: function(e) {
            t.isSupportPh ? e.attr("placeholder", e.data("phtext")) : t.doPlaceholder(e, e.data("phtext"))
        },
        doUpdate: function(e, t) {
            e.data("phtext") && "" != t && (e.data("phtext", t), this.doInit(e))
        }
    }),
    e.extend(t, {
        isSupportPh: "placeholder" in document.createElement("input"),
        doPlaceholder: function(e, t) {
            e.parent().hasClass("g-placeholder-wrap") || (e.wrap("<span class='g-placeholder-wrap'/>"), e.after("<em/>"));
            var i = e.parent().find("em");
            "" == e.val() && i.text(t),
            i.css({
                left: (e.outerWidth() - e.width()) / 2,
                top: (e.outerHeight() - e.height()) / 2
            }),
            e.keyup(function() {
                "" != e.val() ? i.text("") : i.text(t)
            })
        }
    }),
    e.fn.glNewPlaceholder = function() {
        return this.data("placeholder") ? this: this.each(function() {
            var i = new t(e(this));
            e(this).data("placeholder", i)
        })
    }
} (jQuery),
function(e) {
    function t(e, t) {
        n.isSupportPh ? e.attr("placeholder", t) : n.doPlaceholder(e, t),
        e.data("initText", t),
        e.removeAttr("data-phtext")
    }
    function i(e, t) {
        if (n.isSupportPh) e.attr("placeholder", t);
        else {
            var i = e.parent().find("em");
            "" == e.val() && i.text(t),
            e.keyup(function() {
                "" != e.val() ? i.text("") : i.text(t)
            })
        }
    }
    var n = {
        isSupportPh: "placeholder" in document.createElement("input"),
        doPlaceholder: function(e, t) {
            e.parent().hasClass("g-placeholder-wrap") || (e.wrap("<span class='g-placeholder-wrap'/>"), e.after("<em/>"));
            var i = e.parent().find("em");
            "" == e.val() && i.text(t),
            i.css({
                left: (e.outerWidth() - e.width()) / 2,
                top: (e.outerHeight() - e.height()) / 2
            }),
            i.click(function() {
                e.focus()
            }),
            e.keyup(function() {
                "" != e.val() ? i.text("") : i.text(t)
            })
        }
    };
    e.fn.glNewPlaceholder = function(n) {
        this.data("phtext") ? (null != n && this.data("phtext", n), t(this, this.data("phtext"))) : this.data("initText") ? null != n && i(this, n) : e.each(this.find("[data-phtext]"),
        function(i, o) {
            null != n && e(o).data("phtext", n),
            t(e(o), e(o).data("phtext"))
        })
    }
} (jQuery);