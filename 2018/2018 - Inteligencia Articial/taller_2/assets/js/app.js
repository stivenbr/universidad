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

});