function numlines(){
    $('pre[class*=lang-]').addClass('prettyprint linenums');
    if (!$('pre[class*=lang-]').find('ol').hasClass('linenums')) {
        prettyPrint();
    };
}

function noNumlines(){
    $('pre[class*=lang-]').removeClass('linenums').find('ol').css('padding-left', '2px').find('li').css('list-style-type', 'none');
    prettyPrint();
}
