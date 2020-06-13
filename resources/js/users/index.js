$('#nav_actived').click(function(e) {
    $('#a_actived').addClass('active');
    $('#a_block').removeClass('active');
    $('#div_block').hide();
    $('#div_act').fadeIn();
    $('#i_block').hide();
    $('#i_actived').fadeIn();
});

$('#nav_block').click(function(e) {
    $('#a_actived').removeClass('active');
    $('#a_block').addClass('active');
    $('#div_act').hide();
    $('#div_block').fadeIn();
    $('#i_block').fadeIn();
    $('#i_actived').hide();
});