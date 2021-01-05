

jQuery( document ).ready(function($) {

    //supprime le terme "article"
    if($('.et-cart-info').length > 0){
        console.log($('.et-cart-info'));
    }    


    //Gestionnaire de document
    //FDS
    if ($('#pdf_FDS').length > 0)
    {
        if ($('#pdf_FDS .et_pb_module_header a').length > 0)
        {
            $('#pdf_FDS').css('display', 'block');
        }
    }
    //Fiche Technique
    if ($('#pdf_FT').length > 0)
    {
        if ($('#pdf_FT .et_pb_module_header a').length > 0)
        {
            $('#pdf_FT').css('display', 'block');
        }
    }

});
