/* 
 *  wssccc all rights reserved
 */
$(document).ready(function()
{
    $.getJSON('assets/covers.json', null, function(data)
    {
        if (data instanceof Array)
        {
            var sel = Math.floor(Math.random() * data.length);
            var cover = data[sel];
            console.log(cover.img);
            console.log(cover.desc);
            $('#cover-img').attr('src', cover.img);
            $('#desc').html(cover.desc);
            $('body').css('background-color', 'rgb(251,251,251)');
        }

    });
});