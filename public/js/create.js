

// // Hàm xử lý Select Dropdown
// function handleDropDown(checkbox, label, dropdown, box_open = null) {
//     if (dropdown.children.length < 2) {
//         label.innerText = 'Trống';
//     } else {
//         for (let i = 0; i < dropdown.children.length; i++) {
//             dropdown.children[i].onclick = function (e) {
//                 // Thêm mới
//                 if (i == 0) {

//                 } else {
//                     // Thêm class selected
//                     removeSelected(dropdown);
//                     dropdown.children[i].classList.add('selected');

//                     // Đổi nhãn hiệu
//                     let option_label = this.querySelector('span').innerText;
//                     label.innerText = option_label;

//                     if (box_open !== null) {

//                         // let box_keys = Object.keys(box_open);
//                         // for(let key of box_keys) {
//                         //     if (key == label.innerText) {
//                         //         box_open[key].style.display = 'initial';
//                         //     } else {
//                         //         box_open[key].style.display = 'none';
//                         //     }
//                         // }

//                         showAdditionalInfo(label, box_open);
//                     }
//                 }
//                 checkbox.checked = false;
//                 console.log(this);
//             }
//         }
//     }
// }

// // Xoá class selected cho thẻ li của dropdown
// function removeSelected(dropdown) {
//     if (dropdown.children.length > 1) {
//         for (let i = 1; i < dropdown.children.length; i++) {
//             if (dropdown.children[i].classList.contains('selected')) {
//                 dropdown.children[i].classList.remove('selected');
//             }
//         }
//     }
// }

// // Xử lý drop down cho Brand
// let ckbBrand = document.getElementById('ckb-select-brand');
// let labelBrand = document.querySelector('#label-brand span');
// let dropdownBrand = document.getElementById('brand__drop-down');

// handleDropDown(ckbBrand, labelBrand, dropdownBrand);

// // Xử lý drop down cho ProductType
// let ckbProductType = document.getElementById('ckb-select-product_type');
// let labelProductType = document.querySelector('#label-product_type span');
// let dropdownProductType = document.getElementById('product_type__drop-down');

// let box_open = {};
// for (let i = 1; i < dropdownProductType.children.length; i++) {
//     let key = dropdownProductType.children[i].querySelector('span').innerText.toLowerCase().trim();
//     box_open[key] = '';

//     switch (key.toLowerCase().trim()) {
//         case 'sách': {
//             box_open[key] = document.querySelector('.info-additional .info-book');
//             break;
//         }
//         case 'văn phòng phẩm': {
//             box_open[key] = document.querySelector('.info-additional .info-stationary');
//             break;
//         }
//         default:
//             break;
//     }
// }

// handleDropDown(ckbProductType, labelProductType, dropdownProductType, box_open);

// // Hiển thị form thuộc tính dựa vào loại sản phẩm
// function showAdditionalInfo(label, box_open) {
//     let labelText = label.innerText.toLowerCase().trim();

//     if (labelText != 'trống') {
//         if (labelText.includes('sách')) {
//             box_open['sách'].style.display = 'block';
//             box_open['văn phòng phẩm'].style.display = 'none';
//         } else {
//             box_open['văn phòng phẩm'].style.display = 'block';
//             box_open['sách'].style.display = 'none';
//         }
//     }
// }

// showAdditionalInfo(labelProductType, box_open);



// // Xử lý drop down cho Category Book
// let ckbCategory = document.getElementById('ckb-select-category');
// let labelCategory = document.querySelector('#label-category span');
// let dropdownCategory = document.getElementById('category__drop-down');

// handleDropDown(ckbCategory, labelCategory, dropdownCategory);

let productableType = document.getElementById('productable_type');

productableType.onchange = function(e) {
    showBoxInfo();
}

showBoxInfo();

function showBoxInfo() {
    let boxInfos = {
        'Sách': document.querySelector('.info-additional .info-book'),
        'Văn phòng phẩm': document.querySelector('.info-additional .info-stationary'),
    }
    if (productableType.value == 'Sách') {
        boxInfos['Sách'].style.display = 'block';
        boxInfos['Văn phòng phẩm'].style.display = 'none';
    } else if(productableType.value == 'Văn phòng phẩm') {
        boxInfos['Văn phòng phẩm'].style.display = 'block';
        boxInfos['Sách'].style.display = 'none';
    }
}

