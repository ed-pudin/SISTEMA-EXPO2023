$( document ).ready(function() {
    var today = new Date();
    document.getElementById("regEventDate").value = today.toISOString().substr(0, 10);
    document.getElementById("regEventDate").min = today.toISOString().substr(0, 10);
});