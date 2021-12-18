let receiver_type = document.getElementById('receiver_type');
let receiver_names_div = document.getElementById('receiver_names_div');

var model = '';
var model_attr_name = '';

receiver_type.onchange = function(e) {
    console.log(receiver_type.value);

    for (let i = 0; i < receiver_names_div.children.length; i++) {
        receiver_names_div.children[i].style.display = 'none';
    }

    switch (receiver_type.value) {
        case 'Nhân viên': {
            model = 'Employee';
            model_attr_name = 'full_name';
            receiver_names_div.children[0].style.display = 'block';
            break;
        }
        case 'Khách hàng': {
            model = 'Customer';
            model_attr_name = 'full_name';
            receiver_names_div.children[1].style.display = 'block';
            break;
        }
        case 'Nhà cung cấp': {
            model = 'Provider';
            model_attr_name = 'name';
            receiver_names_div.children[2].style.display = 'block';
            break;
        }
    }
}



