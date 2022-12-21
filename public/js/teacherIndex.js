var count = 1;

function setDynamicInputs(){

    count = 1;

    document.getElementById("dynamicInputs").innerHTML = '';

    for(let i = 0; i < $("#membersCmb").val()-1; i++){
        document.getElementById("dynamicInputs").innerHTML +=
        '<div class="d-flex justify-content-center flex-wrap">' +
        '<div class="col-12 col-md-2 my-2 mx-3 mx-xl-5">' +
        '<div class="form-floating">' +
        '<input type="text" class="form-control" id="enrollment'+count+'" placeholder="Matricula" value="" required>' +
        '<label for="enrollment'+count+'">Matricula</label>' +
        '</div>' +
        '<div class="form-check mt-2">' +
        '<input class="form-check-input" type="checkbox" id="attendance'+count+'" >' +
        '<label class="form-check-label text-light" for="attendance'+count+'">'+
        'Comprobar</label></div></div>'+
        '<div class="col-12 col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5">' +
        '<div class="form-floating">'+
        '<input type="text" class="form-control" id="name'+count+'" readonly placeholder="Nombre completo" value="EDNA">'+
        '<label for="name'+count+'">Nombre completo</label></div></div></div>';

        count++;

    }

}

function updateInput(){
    $("#semester").val($("#semesterCmb").val());
    $("#UA").val( $("#UACmb :selected").text());
}
