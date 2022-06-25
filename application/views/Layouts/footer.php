<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>

<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    // function trim(el) {
    //     el.value = el.value.
    //     replace(/(^\s*)|(\s*$)/gi, ""). // removes leading and trailing spaces
    //     replace(/[ ]{2,}/gi, " "). // replaces multiple spaces with one space 
    //     replace(/\n +/, "\n"); // Removes spaces after newlines
    //     return;
    // }​

    function alphaOnly(event) {
        var key = event.keyCode;
        return ((key >= 65 && key <= 90) || key == 8 || key == 190 || key == 9 || key == 32);
    };

    var holidays = [
        '01-01-2022',
        '02-01-2022',
        '02-24-2022',
        '03-16-2022',
        '04-09-2022',
        '04-14-2022',
        '04-15-2022',
        '04-16-2022',
        '05-01-2022',
        '05-03-2022',
        '06-12-2022',
        '06-24-2022',
        '06-10-2022',
        '08-19-2022',
        '08-21-2022',
        '08-29-2022',
        '11-01-2022',
        '11-02-2022',
        '11-30-2022',
        '12-08-2022',
        '12-24-2022',
        '12-25-2022',
        '12-30-2022',
        '12-31-2022',
    ];

    function disableDates(date) {
        var dt = $.datepicker.formatDate('mm-dd-yy', date);
        var noWeekend = jQuery.datepicker.noWeekends(date);
        return noWeekend[0] ? (($.inArray(dt, holidays) < 0) ? [true] : [false]) : noWeekend;
    }
</script>
</body>

</html>