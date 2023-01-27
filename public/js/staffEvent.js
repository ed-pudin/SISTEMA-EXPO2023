
var checkViewport = setInterval(function() {
    activePage = document.getElementsByClassName("page-link active")[0];

    var tableThisPage = document.getElementsByClassName("page-" + activePage.innerHTML);
    var allTablePages = document.getElementsByTagName("td");

    var arrAllTablePages = [...allTablePages];

    arrAllTablePages.forEach(tablePage => {
        tablePage.setAttribute("hidden", ""); 
    });

    var arrThisTablePages = [...tableThisPage];
    
    arrThisTablePages.forEach(tablePage => {
        tablePage.removeAttribute("hidden");
    });

}, 10);

function changeActivePage(thisElement) {
    var allPageBtns = document.getElementsByClassName("page-link");

    var arrAllPageBtns = [...allPageBtns];

    arrAllPageBtns.forEach(pageBtn => {
        pageBtn.classList.remove("active");
    });

    thisElement.classList.add("active");
}