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

function addPersonCompanyAttendance(){

    //Obtengo el valor
    //Obtengo el form
    //Añado el input con el valor

    let valCountInputs = parseInt($("#countInputs").val());

    if (validatePerson()){

        if($("#sendPersonCompany").is(':disabled')){
            $("#sendPersonCompany").prop('disabled', false);
        }

        $("#validatePerson").hide();

        let data = $("#addPerson").val();
        document.getElementById("dynamicInputs").innerHTML +=
        '<div class="d-md-flex justify-content-center align-items-center">' +
        '<div class="col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5">' +
        '<div class="form-floating">' +
        '<input type="text" class="form-control" name="name'+ valCountInputs+ '" id="name'+valCountInputs+'" readonly placeholder="Nombre completo" value="'+data+'"">' +
        '<label for="name'+valCountInputs+'">Nombre completo</label>' +
        '</div></div>'+
        '<div class="form-check">'+
        '<input class="form-check-input" type="checkbox" id="attendance'+valCountInputs+ '">'+
        '<label class="form-check-label text-light" for="attendance'+valCountInputs+'">Asistió' +
        '</label></div></div>';
        valCountInputs++;
        $("#countInputs").val(valCountInputs) ;
        $("#addPerson").val("");

    }else{
        $("#validatePerson").show();
    }


}
