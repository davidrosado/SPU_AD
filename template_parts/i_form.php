<?php /*
<form id="frm-registro" action="<?php echo get_stylesheet_directory_uri()?>/proceso.php" method="post" role="form" class="needs-validation" enctype="multipart/form-data" novalidate="" data-hs-cf-bound="true"> */?>

<form id="frm-registro" action="<?php bloginfo('url')?>/gracias" method="post" role="form" class="needs-validation" enctype="multipart/form-data" novalidate="" data-hs-cf-bound="true">
    <input id="csrf_token" name="csrf_token" type="hidden" value="77643c075f38f2bc0c24dc87c5cc66fe">    <!-- Parametros de seguimiento -->
    <input type="hidden" name="URL_ORIGEN" value="https://descubre.usil.edu.pe/pregrado/?utm_source=web&amp;utm_medium=redirect&amp;utm_campaign=pregrado-2021-02&amp;utm_content=usil.edu.pe">
    <input type="hidden" name="utm_source" value="web">
    <input type="hidden" name="utm_medium" value="redirect">
    <input type="hidden" name="utm_campaign" value="pregrado-2021-02">
    <input type="hidden" name="utm_term" value="S1+branding">
    <input type="hidden" name="utm_content" value="usil.edu.pe">
    <input type="hidden" name="utm_content" value="usil.edu.pe">
    <input type="hidden" name="utm_origin" value="S1+branding">

    <!-- MEDIO -->
    <input type="hidden" name="MEDIO" value="web">
    <input type="hidden" name="DISPOSITIVO" value="PC">

    <!-- // Modalidad -->
    <input type="hidden" name="CODIGO_MODALIDAD" value="2">

    <fieldset class="setup-content" id="fieldset-form">
        <div class="row">
            <div class="col-sm-12 mb-2">
                <input type="text" class="form-control" name="NOMBRES_PROSPECTO" id="nombres" placeholder="Nombres" pattern="^[a-zA-Z\s]*$" minlength="3" maxlength="30" required="">
            </div>
            <div class="col-sm-12 mb-2">
                <input type="text" class="form-control" name="APATERNO_PROSPECTO" id="paterno" placeholder="Apellido paterno" pattern="^[a-zA-Z\s]*$" minlength="3" maxlength="30" required="">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-2">
                <input type="text" class="form-control" name="AMATERNO_PROSPECTO" id="materno" placeholder="Apellido materno" pattern="^[a-zA-Z\s]*$" minlength="3" maxlength="30" required="">
            </div>
            <div class="col-sm-12 mb-2">
                <input type="text" class="form-control" name="CELULAR_PROSPECTO" id="celular" placeholder="Celular" pattern="^((9)[0-9]{8})|((9)[0-9]{2}[ ][0-9]{3}[ ][0-9]{3})|((9)[0-9]{2}[-][0-9]{3}[-][0-9]{3})|([1-9]{1}([0-9]{1}|[0-9]{2})(9)[0-9]{8})|([1-9]{1}([0-9]{1}|[0-9]{2})[ ](9)[0-9]{8})|([1-9]{1}([0-9]{1}|[0-9]{2})[ ](9)[0-9]{2}[ ][0-9]{3}[ ][0-9]{3})|([1-9]{1}([0-9]{1}|[0-9]{2})[-](9)[0-9]{2}[-][0-9]{3}[-][0-9]{3})|([1-9]{1}([0-9]{1}|[0-9]{2})[-](9)[0-9]{8})|([+][1-9]{1}([0-9]{1}|[0-9]{2})(9)[0-9]{8})|([+][1-9]{1}([0-9]{1}|[0-9]{2})[ ](9)[0-9]{8})|([+][1-9]{1}([0-9]{1}|[0-9]{2})[ ](9)[0-9]{2}[ ][0-9]{3}[ ][0-9]{3})|([+][1-9]{1}([0-9]{1}|[0-9]{2})[-](9)[0-9]{2}[-][0-9]{3}[-][0-9]{3})|([+][1-9]{1}([0-9]{1}|[0-9]{2})[-](9)[0-9]{8})|\(([1-9]{1}([0-9]{1}|[0-9]{2})\)(9)[0-9]{8})|\(([1-9]{1}([0-9]{1}|[0-9]{2})\)([ ]|[-])(9)[0-9]{8})|\(([1-9]{1}([0-9]{1}|[0-9]{2})\)[ ](9)[0-9]{2}[ ][0-9]{3}[ ][0-9]{3})|\(([1-9]{1}([0-9]{1}|[0-9]{2})\)[-](9)[0-9]{2}[-][0-9]{3}[-][0-9]{3})|\([+]([1-9]{1}([0-9]{1}|[0-9]{2})\)(9)[0-9]{8})|\([+]([1-9]{1}([0-9]{1}|[0-9]{2})\)([ ]|[-])(9)[0-9]{8})|\([+]([1-9]{1}([0-9]{1}|[0-9]{2})\)[ ](9)[0-9]{2}[ ][0-9]{3}[ ][0-9]{3})|\([+]([1-9]{1}([0-9]{1}|[0-9]{2})\)[-](9)[0-9]{2}[-][0-9]{3}[-][0-9]{3})|((9)[0-9]{2}([ ]|[-])[0-9]{6})" minlength="9" maxlength="9" required="">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-2">
                <input type="text" class="form-control" name="CORREO_PROSPECTO" id="email" placeholder="Correo" pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$" required="">
            </div>

            <div class="col-sm-12 mb-2">
                <select class="form-control" id="anio_estudios" name="ANIO_ESTUDIOS" required="">
                    <option value="">Elige tu año de estudios</option>
                    <option value="Estoy en 5to de secundaria">Estoy en 5to de secundaria</option>
                    <option value="Estoy en 4to o 3ro de secundaria">Estoy en 4to o 3ro de secundaria</option>
                    <option value="Ya terminé la secundaria">Ya terminé la secundaria</option>
                    <option value="Estoy estudiando en un instituto">Estoy estudiando en un instituto</option>
                    <option value="Soy egresado de instituto">Soy egresado de instituto</option>
                    <option value="Estoy estudiando en una universidad">Estoy estudiando en una universidad</option>
                </select>
            </div>
        </div>
        

        <div class="row">
            <div class="col-md-12 mb-2 text-center">
                <div id="appdpdc"><div class="silform-txttitle"><a href="javascript:;" id="link-acepto" data-modalid="silOverlay-frm-registro" class="open-silmodal silform-link">¿Acepta la Política de Privacidad y Protección de Datos Personales?</a></div><div class="form-check form-check-inline silform-check"><input class="form-check-input silform-check-input" type="radio" name="ACEPTO_POLITICAS" id="acepto_1" value="S"><label class="form-check-label silform-check-label" for="acepto_1">Sí</label></div><div class="form-check form-check-inline silform-check"><input class="form-check-input silform-check-input" type="radio" name="ACEPTO_POLITICAS" id="acepto_2" value="NO-ACEPTO"><label class="form-check-label silform-check-label" for="acepto_2">No</label></div></div>
            </div>
        </div>
        <div class="row justify-content-center">
            <button class="btn btn-quiero-postular" id="btn_submit" type="submit">ENVIAR MIS DATOS</button>
        </div>
    </fieldset>
</form>