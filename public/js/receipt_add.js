let giver_type = document.getElementById('giver_type');
let giver_names_div = document.getElementById('giver_names_div');

var model = '';
var model_attr_name = '';

giver_type.onchange = function(e) {
    console.log(giver_type.value);

    for (let i = 0; i < giver_names_div.children.length; i++) {
        giver_names_div.children[i].style.display = 'none';
    }

    switch (giver_type.value) {
        case 'Nhân viên': {
            model = 'Employee';
            model_attr_name = 'full_name';
            giver_names_div.children[0].style.display = 'block';
            break;
        }
        case 'Khách hàng': {
            model = 'Customer';
            model_attr_name = 'full_name';
            giver_names_div.children[1].style.display = 'block';
            break;
        }
        case 'Nhà cung cấp': {
            model = 'Provider';
            model_attr_name = 'name';
            giver_names_div.children[2].style.display = 'block';
            break;
        }
    }
}



