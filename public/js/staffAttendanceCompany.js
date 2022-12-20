var count = 1;

function addPersonCompany(){
    //Obtengo el valor
    //Obtengo el form
    //Añado el input con el valor

    if (validatePerson()){

        $("#validatePerson").hide();

        let data = $("#addPerson").val();
        document.getElementById("dynamicInputs").innerHTML +=
        '<div class="d-md-flex justify-content-center align-items-center">' +
        '<div class="col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5">' +
        '<div class="form-floating">' +
        '<input type="text" class="form-control" id="name'+count+'" readonly placeholder="Nombre completo" value="'+data+'"">' +
        '<label for="name'+count+'">Nombre completo</label>' +
        '</div></div>' +
        '<div class="form-check">' +
        '<input class="form-check-input" type="checkbox" id="attendance'+count+'">' +
        '<label class="form-check-label text-light" for="attendance'+count+'">' +
        'Asistió</label></div></div>';
        count++;
        $("#addPerson").val("");

    }else{
        $("#validatePerson").show();
    }


}

function validatePerson(){
    return $("#addPerson").val()== "" ? false : true;
}
