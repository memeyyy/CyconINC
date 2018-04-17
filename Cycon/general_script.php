<!-- SCRIPTS -->

<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap dropdown -->
<script type="text/javascript" src="js/popper.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>

<script type="text/javascript">
	
	    //NUMBER ONLY
    function number(elem) {
        var validChars = /[0-9]/;
        var strIn = elem.value;
        var strOut = '';
        for (var i = 0; i < strIn.length; i++) {
            strOut += (validChars.test(strIn.charAt(i))) ? strIn.charAt(i) : '';
        }
        elem.value = strOut;
    }
    //LETTER ONLY
    function letter(elem) {
        var validChars = /[a-zA-ZñÑ .-]+/;
        var strIn = elem.value;
        var strOut = '';
        for (var i = 0; i < strIn.length; i++) {
            strOut += (validChars.test(strIn.charAt(i))) ? strIn.charAt(i) : '';
        }
        elem.value = strOut;
    }
</script>

