jQuery(function($){
    //jump to the section that the user has clicked
    $('.nav-link').click(function(){
        var target = $(this).attr('target');
        $('html, body').animate({ scrollTop: $(target).offset().top-100 }, 500);
    });

    //function for show the images
    function showImages() {
        var win = $(this).height();
        var scroll = $(this).scrollTop();

        //get the position of the window and the image and show the image by right
        $('.img-content-right').each(function(){
            var pos = $(this).offset().top;
            //compare the position of scroll and the pos of image
            if (win+scroll > pos) {
                $(this).animate({ 
                    left: 0,
                    opacity: 1
                }, 1000);
                $(this).removeClass('.img-content-right');
            }
        });

        //get the position of the window and the image and show the image by left
        $('.img-content-left').each(function(){
            var pos = $(this).offset().top;
            //compare the position of scroll and the pos of image
            if (win+scroll > pos) {
                $(this).animate({ 
                    right: 0,
                    opacity: 1
                }, 1000);
                $(this).removeClass('.img-content-left');
            }
        });
    }

    //set active the item of menu that is shown in the window
    function selectTitle(win, scroll) {
        var win = $(this).height();
        var scroll = $(this).scrollTop();

        var maxPos = 0;
        var title = '';
        $('.sub-title-content').each(function(){
            var pos = parseInt($(this).offset().top);
            if (win+scroll > parseInt(pos+300)) {
                //get the last item of menu
                if (parseInt(pos+300) > parseInt(maxPos)) {
                    maxPos = parseInt(pos);
                    title = '.'+$(this).prop('id');
                }
            }
        });  
        $('.nav-link').removeClass('active');
        $(title).addClass('active');
    }

    //call the functions
    $(window).scroll(function(){
        showImages();
        selectTitle();
    });

    //send the form
    //page: action of the form
    //data: data of the form
    //target: div that the result will be show
    function ajaxForm(page,data,target){
        $.post(page,data,function(result,status){
            if(status == 'success'){
                $(target).html(result);
            }
        });
    }

    //function to send the user´s message
    $('#formContact').submit(function(event){
        //remove the class of error in all inputs
        $(this).find('input,select,textarea').removeClass('is-invalid');
        $(this).find('.invalid-feedback').hide();;
        
        //get the parameters and make validations
        var nickname = $('#inputNickname').val();
        var question = $('#inputProblem').val();
        var suggestion = $('#inputSuggestion').val();

        var error = 0;

        //check the nickname has typed
        if (nickname.length == 0) {
            $('#inputNickname').addClass('is-invalid');
            $('#inputNickname').closest('.form-group').find('.invalid-feedback').show();
            error = 1;
        }

        //check the option has selected
        if (question.length == 0) {
            $('#inputProblem').addClass('is-invalid');
            $('#inputProblem').closest('.form-group').find('.invalid-feedback').show();
            error = 1;
        }

        //check the suggestion has typed
        if (suggestion.length == 0) {
            $('#inputSuggestion').addClass('is-invalid');
            $('#inputSuggestion').closest('.form-group').find('.invalid-feedback').show();
            error = 1;
        }

        //if it not have errors, send the form 
        if (error == 0){
            ajaxForm($(this).prop('action'),$(this).serialize(),$(this).find('.message-form'));
            $(this).find('.message-form').show();
        }
        event.preventDefault();
        return false;

    });

    //function to login
    $('#formLogin').submit(function(event){
        //remove the class of error in all inputs
        $(this).find('input').removeClass('is-invalid');
        $(this).find('.invalid-feedback').hide();;
        
        //get the parameters and make validations
        var user = $('#inputUser').val();
        var password = $('#inputPassword').val();

        var error = 0;

        //check the nickname has typed
        if (user.length == 0) {
            $('#inputUser').addClass('is-invalid');
            $('#inputUser').closest('.form-group').find('.invalid-feedback').show();
            error = 1;
        }

        //check the option has selected
        if (password.length == 0) {
            $('#inputPassword').addClass('is-invalid');
            $('#inputPassword').closest('.form-group').find('.invalid-feedback').show();
            error = 1;
        }

        //if it not have errors, send the form 
        if (error == 0){
            ajaxForm($(this).prop('action'),$(this).serialize(),$(this).find('.message-form'));
            $(this).find('.message-form').show();
        }
        event.preventDefault();
        return false;

    });

    //get the messages when the button is pressed
    $('#getMessages').click(function(){
        //load the messages
         ajaxForm('index.php?controller=message&action=getList&lg='+$('#lg').val(),'',$('#list-messages'))
         $('#list-messages').show();
         $(this).hide();
    });

    //logout
    $('#btnLogout').click(function(){
        ajaxForm('index.php?controller=index&action=logout&lg='+$('#lg').val(),'',$('.load-ajax'))
    });

    //function for the admins delete messages
    $(document).on('click','.delete-message',function(){
        if (confirm('Do you really desire delete this message?')) {
            ajaxForm('index.php?controller=message&action=delete&lg='+$('#lg').val(),'message='+$(this).attr('message'),$('.load-ajax'))
        }
    });

    //call for the first time
    showImages();
    selectTitle();

    
});