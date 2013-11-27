$(document).ready(function(){

    $('.one-point-five, .one-point-three, .install-steps, .uninstall-one-point-five, .uninstall-one-point-three, .uninstall-steps').hide();  

    $('.btn-dismiss-warning').on('click', function(){
      $('.backup-warning').fadeOut();
    });
    
    $('.btn-one-point-five, .btn-one-point-three').on('click', function(){
      $('.install-steps').show();
      $(this).closest('.row-fluid').hide();
    });
    
    $('.btn-one-point-five').on('click', function(){
      $('.one-point-five').show();
    });
    $('.btn-one-point-three').on('click', function(){
      $('.one-point-three').show();
    });

    $('.btn-uninstall-one-point-five, .btn-uninstall-one-point-three').on('click', function(){
      $('.uninstall-steps').show();
      $(this).closest('.row-fluid').hide();
    });
    $('.btn-uninstall-one-point-five').on('click', function(){
      $('.uninstall-one-point-five').show();
    });
     $('.btn-uninstall-one-point-three').on('click', function(){
      $('.uninstall-one-point-three').show();
    });

    $('a#copy-install-sql-one-point-five').on('click', function(){
      $('#install-sql-one-point-five').addClass('textarea-selected').select()
    });
    $('a#copy-install-sql-one-point-three').on('click', function(){
      $('#install-sql-one-point-three').addClass('textarea-selected').select()
    });

    $('a#copy-uninstall-sql-one-point-five').on('click', function(){
      $('#uninstall-sql-one-point-five').addClass('textarea-selected').select()
    });
    $('a#copy-uninstall-sql-one-point-three').on('click', function(){
      $('#uninstall-sql-one-point-three').addClass('textarea-selected').select()
    });

    
    

});