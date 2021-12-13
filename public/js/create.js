let select_label = document.querySelector('.header__search-select-label');
let select_dropdown = document.querySelector('.header__search-option');

console.info(select_dropdown.children[0]);

for (let i = 1; i < select_dropdown.children.length; i++) {
    select_dropdown.children[i].onclick = function (e) {

    }
}
