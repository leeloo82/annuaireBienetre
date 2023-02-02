var menuHam = document.getElementById("burgerMenu");
var menuMain = document.getElementById("mainMenu");

if(menuHam != null && menuMain!= null) {
    menuHam.addEventListener('click', function(e){
        if(menuMain.className == 'l-header-nav is-active') {
            menuMain.className = 'l-header-nav';
        }
        else {
            menuMain.className = 'l-header-nav is-active';
        }
    });
}
else {
    alert('un des deux éléments pas présents, ' + menuHam + ' autre ' + menuMain);
}