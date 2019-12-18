$(function() {

    let heures = $('.infos-temps .heure');
    let minutes = $('.infos-temps .minute');
    let secondes = $('.infos-temps .seconde');
    let i = 0;

    setInterval(function () {

        let date = new Date();

        heures.html(addSeconde(date.getHours()));
        minutes.html(addSeconde(date.getMinutes()));
        secondes.html(addSeconde(date.getUTCSeconds()));

        function addSeconde(elt) {

            if(elt < 10) {
                return '0'+elt;
            }
            else
                return elt;
        }

    }, 1000)

    //vérification formulaires inscription et connexion avec ajax

    function ajaxForm(auth, infos) {
        $.ajax({
            url : './index.php?auth='+auth,
            type : 'POST',
            data : infos,
            dataType : 'html',

            success : function(code_html){
                $('.bloc-central main').html(code_html);
                console.log(code_html)
            },

            error : function(resultat){
                console.log(resultat);
            }
        });
    }

    // Vérification des 2 mots de passes du formulaire d'inscription

    $('#verifMdp').change(function(e) {
        $mdp = $('#mdp').val();
        $verifMdp = $('#verifMdp').val();

        if($mdp === $verifMdp) {
            $(this).css('border','2px solid green');
            $('#form_inscription #btn_envoyer').removeAttr('disabled');
        }
        else {
            $(this).css('border','2px solid red');
        }
    });


    // TinyMCE
    tinymce.init({
        selector: '#contenu_edit'
    });


    //menu au click

    $('.auteur a').click(function(e) {

        e.preventDefault();

        let menuVertical = $('.bloc-global .aside-verticale');

        if($(this).hasClass('active')) {
            $(this).removeClass('active');
            menuVertical.removeClass('active');
        }

        else {
            if($(window).width() <= '650') {
                $(this).addClass('active');
                menuVertical.addClass('active');

            }
        }
    })
})