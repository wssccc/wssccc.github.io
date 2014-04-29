/* 
 *  wssccc all rights reserved
 */
$(document).ready(function()
{
    $.getJSON('assets/covers/covers.json', null, function(data)
    {
        if (data instanceof Array)
        {
            var sel = Math.floor(Math.random() * data.length);
            var cover = data[sel];
            $('#cover-img').attr('src', cover.img);
            $('#cover-img').attr('alt', cover.desc);
            $('#desc').html(cover.desc);
            //$('body').css('background-color', 'rgb(251,251,251)');
        }
    });
});