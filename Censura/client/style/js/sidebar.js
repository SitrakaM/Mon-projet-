window.onload = function(){
    var sidebar = document.querySelector(".slidebar");
    var closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", function(){
        sidebar.classList.toggle("open")
        menuBtnChange()
    })

    function menuBtnChange(){
        if(sidebar.classList.contains("open")){
            closeBtn.classList.replace("fa-align-justify", "fa-sort-amount-asc")
        }
        else{
            closeBtn.classList.replace("fa-sort-amount-asc", "fa-align-justify")
        }
    }
}