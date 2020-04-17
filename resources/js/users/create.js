$(function(){
    // $('#twzipcode').twzipcode();
    $('#twzipcode').twzipcode({
        'readonly': true
    }); 

    $("#individual_birthday").datepicker({
        dateFormat: 'yy-mm-dd',
        changeYear: true,
        changeMonth: true,
        yearRange: "-80:+0",
        maxDate: '-15y',
    });
});