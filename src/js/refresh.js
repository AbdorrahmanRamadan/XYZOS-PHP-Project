var auto_refresh = setInterval(
    function ()
    {
    $('#count').load('/controllers/refresh.php').fadeIn("slow");
    }, 10000); // refresh every 10000 milliseconds
    