

$(function () {

    /* =========================================
        COUNTDOWN 4
     ========================================= */
     function gettimefromdate() {
        return new Date(2022, 4, 14, 7, 0, 0, 0);
    }

    $('#clock-c').countdown(gettimefromdate(), function(event) {
      var $this = $(this).html(event.strftime(''
        + '<span class="h1 font-weight-bold">%D</span> Day%!d'
        + '<span class="h1 font-weight-bold">%H</span> Hr'
        + '<span class="h1 font-weight-bold">%M</span> Min'
        + '<span class="h1 font-weight-bold">%S</span> Sec'));
    }); 


});