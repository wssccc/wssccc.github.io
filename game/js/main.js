function initGame()
{
    var digits = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    var run = true;
    var number = '';
    while (run)
    {
        var selected = 0;
        for (var i = 0; i < digits.length; i++) {
            if (digits[i] !== 0)
            {
                ++selected;
            }
        }
        if (selected === 4)
        {
            run = false;
        } else {
            var sel = Math.floor(Math.random() * 9) + 1;
            if (digits[sel] === 0)
            {
                number = number + sel;
                digits[sel] = 1;
            }
        }
    }
    theNumber = number;
    count = 10;
}


function guess(num)
{
    $('#numberInput').val('');
    $('#numberInput').focus();
    if (count > 0)
    {
        --count;
        if (theNumber === num)
        {
            $('#output').append("<pre>You've got it!</pre>");
            initGame();
            return;
        } else {
            var numstr = String(theNumber);
            var instr = String(num);
            var right = 0;
            var wrong = 0;
            if (numstr.length !== instr.length)
            {
                $('#output').append('<pre>Input 4-digits number</pre>');
                ++count;
                return;
            }
            for (i = 0; i < numstr.length; i++) {
                if (numstr.charAt(i) === instr.charAt(i))
                {
                    ++right;
                } else {
                    if (instr.indexOf(numstr.charAt(i)) !== -1)
                    {
                        ++wrong;
                    }
                }
            }
            var outstr = (10 - count) + '. ' + instr + ': A' + right + 'B' + wrong;
            $('#output').append('<pre>' + outstr + '</pre>');
            if (count === 0)
            {
                $('#output').append('<pre>Game over,the number is ' + theNumber + '</pre>');
                initGame();
            }
        }
    }
}



$(document).ready(
        function()
        {
            initGame();
        });