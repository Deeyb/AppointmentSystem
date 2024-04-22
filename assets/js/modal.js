$(document).ready(function(){
    // Kapag ang button na may data-toggle="modal" attribute ay i-click,
    // ipapakita ang modal na may id "termsModal"
    $('[data-toggle="modal"]').click(function(){
        var targetModal = $(this).data('target');
        $(targetModal).modal('show');
    });
});
