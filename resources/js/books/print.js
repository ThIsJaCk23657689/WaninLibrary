$(function(){
    $('#printBtn').click(function(){
        let divContents = $('#barcode_area').html(); 
        let barcodeURL = $('#PrintURL').text(); 
        let a = window.open(barcodeURL, '列印條碼', 'height=500, width=800, left=350, top=100');
        // a.document.write('<html>');
        // a.document.write('<body>');
        // a.document.write(divContents);
        // a.document.write('</body></html>');
        // a.document.close();
        a.print();
    });
});