
function startInfinite() {
    if ($('#infinite').val()==='1'){
        $('ul.pagination').hide();
        $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<h1 class="text-center text-white"><i class="fa fa-spinner fa-spin"></i></h1>',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
    }
}
startInfinite();


$( function() {
    $( "#datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange: '1825:2018'
    });
} );