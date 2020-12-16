function initNewsTicker() {
    var listTickerCats = [];
    var activeCat = 0;

    if ($(".hr-ticker").length) {
        valHeight = $(".cont-ticker-headings").height();

        $(".hr-ticker").AcmeTicker({
            type: "marquee" /*horizontal/horizontal/Marquee/type*/,
            direction: "left" /*up/down/left/right*/,
            speed: 0.1 /*true/false/number*/ /*For vertical/horizontal 600*/ /*For marquee 0.05*/ /*For typewriter 50*/,
            controls: {
                // toggle: $('.stop'),/*Can be used for horizontal/horizontal/typewriter*//*not work for marquee*/
            },
        });

        //push all ids into category list
        $(".ticker-cat").each(function () {
            listTickerCats.push("#" + $(this).attr("id"));
            // console.log($(this).attr('id') + ' Position is ' +$(this).position()['left']);
        });

        function setHeading() {
            if (activeCat == -1) {
                if (Math.abs($(".hr-ticker").position()["left"]) < $(listTickerCats[0]).position()["left"] || Math.abs($(".hr-ticker").position()["left"]) < 1200) {
                    activeCat++;
                    // $('.hr-ticker-heading').html($(listTickerCats[activeCat]).data('catheading'));
                    $(".cont-ticker-headings ul").animate({ top: "-" + activeCat * valHeight + "px" }, "slow");
                }
            } else {
                // console.log('Ticker Position : ' + Math.abs($('.hr-ticker').position()['left'])+' | next Category Position '+ $(listTickerCats[activeCat+1]).position()['left']);
                if (Math.abs($(".hr-ticker").position()["left"]) >= $(listTickerCats[activeCat + 1]).position()["left"]) {
                    activeCat++;
                    // $('.hr-ticker-heading').html($(listTickerCats[activeCat]).data('catheading'));
                    $(".cont-ticker-headings ul").animate({ top: "-" + activeCat * valHeight + "px" }, "slow");

                    if (activeCat == listTickerCats.length - 1) {
                        activeCat = -1;
                    }
                }
            }
        }
        setTimeout(function doSomething() {
            setHeading();
            setTimeout(doSomething, 1500);
        }, 1500);

        // setInterval(setHeading, 1500);
    }
}

function initStickyHeader() {
    ///////////////// fixed menu on scroll for desktop
    if (window.innerWidth > 767) {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 1) {
                $(".cont-header").addClass("fixed-top");
                // add padding top to show content behind navbar
                $("body").css("padding-top", $(".cont-header").outerHeight() + "px");
            } else {
                $(".cont-header").removeClass("fixed-top");
                // remove padding top from body
                $("body").css("padding-top", "0");
            }
        });
    } // end if
}
