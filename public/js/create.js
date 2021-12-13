

// Hàm xử lý Select Dropdown
function handleDropDown(checkbox, label, dropdown, box_open = null) {
    if (dropdown.children.length < 2) {
        label.innerText = 'Trống';
    } else {
        for (let i = 0; i < dropdown.children.length; i++) {
            dropdown.children[i].onclick = function (e) {
                // Thêm mới
                if (i == 0) {

                } else {
                    let option_label = this.querySelector('span').innerText;
                    label.innerText = option_label;

                    if (box_open !== null) {

                        // let box_keys = Object.keys(box_open);
                        // for(let key of box_keys) {
                        //     if (key == label.innerText) {
                        //         box_open[key].style.display = 'initial';
                        //     } else {
                        //         box_open[key].style.display = 'none';
                        //     }
                        // }

                        showAdditionalInfo(label, box_open);
                    }
                }
                checkbox.checked = false;
                console.log(this);
            }
        }
    }
}

// Xử lý drop down cho Brand
let ckbBrand = document.getElementById('ckb-select-brand');
let labelBrand = document.querySelector('#label-brand span');
let dropdownBrand = document.getElementById('brand__drop-down');

handleDropDown(ckbBrand, labelBrand, dropdownBrand);

// Xử lý drop down cho Category
let ckbCategory = document.getElementById('ckb-select-category');
let labelCategory = document.querySelector('#label-category span');
let dropdownCategory = document.getElementById('category__drop-down');

let box_open = {};
for (let i = 1; i < dropdownCategory.children.length; i++) {
    let key = dropdownCategory.children[i].querySelector('span').innerText.toLowerCase().trim();
    box_open[key] = '';

    switch(key.toLowerCase().trim()) {
        case 'sách': {
            box_open[key] = document.querySelector('.info-additional .info-book');
            break;
        }
        case 'văn phòng phẩm': {
            box_open[key] = document.querySelector('.info-additional .info-stationary');
            break;
        }
        default:
            break;
    }
}

handleDropDown(ckbCategory, labelCategory, dropdownCategory, box_open);

// Xử lý drop down cho Genre Book
let ckbGenre = document.getElementById('ckb-select-genre');
let labelGenre = document.querySelector('#label-genre span');
let dropdownGenre = document.getElementById('genre__drop-down');

handleDropDown(ckbGenre, labelGenre, dropdownGenre);

// Hiển thị form thuộc tính dựa vào loại sản phẩm
function showAdditionalInfo(label, box_open) {
    let labelText = label.innerText.toLowerCase().trim();

    if (labelText != 'trống') {
        if (labelText.includes('sách')) {
            box_open['sách'].style.display = 'block';
            box_open['văn phòng phẩm'].style.display = 'none';
        } else {
            box_open['văn phòng phẩm'].style.display = 'block';
            box_open['sách'].style.display = 'none';
        }
    }
}

showAdditionalInfo(labelCategory, box_open);

