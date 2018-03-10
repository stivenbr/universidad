$(function () {

    /* ---------------------------------------------------------------------- */
    /* SELECT2 */
    /* ---------------------------------------------------------------------- */
    // Variable para imprimir SELECT2
    const aImage = {
        "pdf": {"image": "fa-file-pdf-o", "color": "text-danger"},
        "docx": {"image": "fa-file-word-o", "color": "text-primary"},
        "txt": {"image": "fa-file-text-o", "color": "text-grey"}
    };
    let select2Template = (state) => {

        if (!state.id) {
            return state.text;
        }
        
        let icon = state.icon;

        let $state = $(`<span><i class='fa ${aImage[icon].image} ${aImage[icon].color} '></i> ${state.text}</span>`);
        return $state;
    } ;
    
    $.post("./class/getDocument.php", {}, function (msg) {
        $("#nomFiles").select2({
            placeholder: 'Seleccione uno o varios documentos',
            allowClear: true,
            data: msg,
            templateResult: select2Template,
            templateSelection: select2Template
        });
    }, "json");

    $(".bs-switch").bootstrapSwitch({
        onSwitchChange: function (event, state) {
            event.preventDefault();
            $("#nomFiles").find("option").prop("selected", state).prop("disabled") ;
            $("#nomFiles").trigger("change");
            return true;
        },
        onText: "SI",
        offText: "NO"
    }, "SI");
    
    $("#btnBuscar").click(function(){
        let url = "./class/getTextDocument.php";
        let data = $("#frmFiltro").serializeArray();
        
        $.post(url, data, function(msg){
            if(msg.error == undefined){
                
                if( ! $.isEmptyObject(msg.documents) ){
                    let hPrint = "<h3>Los siguientes documentos cuentan con la palabra buscada. </h3>";
                    hPrint += "<ul>";
                    $.each(msg.documents, function(indice, valor){
                        hPrint += `<li>${valor} <i class="fa fa-file-text-o"> </i></li>`;
                    });
                    hPrint += "</ul>";

                    $("#cardText").html( hPrint );

                    swal("Proceso Terminado", "", "success");
                }else{
                    swal("Proceso Terminado", "No se encontro la palabra en los documentos seleccionados ", "info");
                    $("#cardText").html( ":(" );
                }
            }else{
                swal("Error", msg.error, "error");
            }
        }, "json").fail(function(){
            swal("Error", "Algo salio mal, por favor verifique.", "error");
        }).always(function(){
            
        });
    });

});