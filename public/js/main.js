$(function() {

    let idChapitre;
    let idParent;

    $('.lien_repondre').click(function(e) {
        e.preventDefault();
       
        idChapitre = $(this).data('chapitre');
        idParent = $(this).data('numcomment');

        if(!$(e.target.closest('.comment')).next().hasClass('js_form')) {

            $.ajax({
                url : $(this).attr('href'),
                type : 'POST',
                dataType : 'html',

                success : function(code_html){
                    $(e.target).closest('.comment:not(.sous-comment)').next()
                        .append(code_html);
                    console.log(code_html);
                },

                error : function(resultat){
                    //console.log(resultat);
                }
            });

            /*$("html, body").stop()
                .animate( { scrollTop: $(e.target.closest('.comment')).next().find('.js_form').offset().top }, 500);*/
        }

    });



      /******* SLIDER ********/

      let tabPhotos = $('.bloc-photos > div');

      for(let i = 1 ; i <= tabPhotos.length ; i++) {

          $('.bloc-visible .bloc-sombre-'+i).hover(function() {
            $('.bloc-visible [class^=bloc-sombre]').removeClass('active');
            $(this).addClass('active');
             $('.bloc-photos').css({'transform':'translateX('+(-100*(i-1))+'vw)'});    

      });

    }


    /* édition d'un commentaire avec contenteditable et ajax */
    $('.edit-comment').click(function(e) {

        e.preventDefault();
        $(this).closest('.comment').find('.commentaire').attr('contenteditable','true').css({'background-color':'white'}).focus();
        $form_edit = $(this).closest('.infos-comment').find('.form-editer-commentaire').serialize();

        $(this).closest('.comment').find('.commentaire').keypress(function(e) {

            if(e.keyCode === 13) {

                $(this).attr('contenteditable','false').css({'background-color':'#f5f5f5'});

                $nv_comm = $(this).find('.commennt-body').text();

                $.ajax({
                    url : '/blog/index.php?action=histoire&'+$form_edit,
                    type : 'POST',
                    data : 'new_commentaire=' + $nv_comm,
                    dataType : 'html',

                    success : function(code_html){

                       // console.log(code_html);
                    },

                    error : function(resultat){
                        //console.log(resultat);
                    }
                });
            }
        });
    });


    // Suppression d'un commentaire
    $('.suppr-comment').click(function(e) {

        e.preventDefault();

        let $this = $(this);
        $form_edit = $this.closest('.infos-comment').find('.form-supprimer-commentaire').serialize();
        
        $id_comm = $this.closest('.comment').find('.commentaire')[0].id;
        
        $.ajax({
            url : '/blog/index.php?action=histoire&'+$form_edit,
            type : 'POST',
            data : 'id_commentaire=' + $id_comm, 
            dataType : 'html',
            
            success : function(code_html){ 
               $this.closest('.comment').css({'display':'none'});
                //console.log(code_html)
            },
     
            error : function(resultat){
                //console.log(resultat);
            }
        });         
    });


    /* /!* édition d'une réponse de commentaire avec contenteditable et ajax *!/
     $('.edit-comment-answer').click(function(e) {

        e.preventDefault();
        $(this).closest('.sous-comment').find('.commentaire').attr('contenteditable','true').css({'background-color':'white'}).focus();
        $form_edit = $(this).closest('.infos-comment').find('.form-editer-commentaire-reponse').serialize();

        console.log($form_edit)
        $(this).closest('.sous-comment').find('.commentaire').keypress(function(e) {        

            if(e.keyCode === 13) {

                $(this).attr('contenteditable','false').css({'background-color':'#f5f5f5'});
                
                $nv_comm = $(this).find('.commennt-body').text();

                $.ajax({
                    url : '/blog/index.php?action=histoire&'+$form_edit,
                    type : 'POST',
                    data : 'new_commentaire=' + $nv_comm, 
                    dataType : 'html',
                    
                    success : function(code_html){ 
                        
                       // console.log(code_html);
                    },
             
                    error : function(resultat){
                        //console.log(resultat);
                    }
                });         
            }
        });
    });*/


   /* // Suppression d'une réponse de commentaire
    $('.suppr-comment-answer').click(function(e) {

        e.preventDefault();

        let $this = $(this);
        $form_edit = $this.closest('.infos-comment').find('.form-supprimer-commentaire-reponse').serialize();
        
        $id_comm = $this.closest('.sous-comment').find('.commentaire')[0].id;
        
        $.ajax({
            url : '/blog/index.php?action=histoire&'+$form_edit,
            type : 'POST',
            data : 'id_commentaire=' + $id_comm, 
            dataType : 'html',
            
            success : function(code_html){ 
               $this.closest('.sous-comment').css({'display':'none'});
                //console.log(code_html)
            },
     
            error : function(resultat){
                //console.log(resultat);
            }
        });         
    });*/

    $('.btn_menu').click(function(e) {

        e.preventDefault();

        if($(this).hasClass('visible'))
            $(this).removeClass('visible');
        else
            $(this).addClass('visible');
    });

    console.log($('.btn_menu ~ ul'))



    $('.btn-connexion-fb').click( function (e){

        sessionStorage.goToBottom = 'ok';
    })

    if(sessionStorage.goToBottom === 'ok' ) {
        $("html, body").stop()
            .animate( { scrollTop: $('.bloc-comments').offset().top }, 500);

        console.log(sessionStorage.goToBottom)
        sessionStorage.goToBottom = '';
    }
});


