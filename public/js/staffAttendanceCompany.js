var count = 0;

function addPersonCompany(){

    //Obtengo el valor
    //Obtengo el form
    //Añado el input con el valor

    if (validatePerson()){

        if($("#sendPersonCompany").is(':disabled')){
            $("#sendPersonCompany").prop('disabled', false);
        }

        $("#validatePerson").hide();

        let data = $("#addPerson").val();
        document.getElementById("dynamicInputs").innerHTML +=
        '<div class="d-md-flex justify-content-center align-items-center">' +
        '<div class="col-md-7 col-lg-6 col-xl-4 my-2 mx-3">' +
        '<div class="form-floating">' +
        '<input type="text" class="form-control" name="name'+ count+ '" id="name'+count+'" readonly placeholder="Nombre completo" value="'+data+'"">' +
        '<label for="name'+count+'">Nombre completo</label>' +
        '</div></div>';
        count++;
        $("#countInputs").val(count);
        $("#addPerson").val("");

    }else{
        $("#validatePerson").show();
    }


}

function validatePerson(){
    return $("#addPerson").val()== "" ? false : true;
}
