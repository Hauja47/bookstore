// Find a <table> element with id="myTable":
var table = document.querySelector(".main-product-table tbody");

var product = document.getElementById('product');
var in_stock = document.getElementById('in_stock_input');
var quantity = document.getElementById('quantity_input');
var cost = document.getElementById('cost_input');
var total_price = document.getElementById('total_price');



// Kiểm tra thay đổi product_select
product.onchange = function(e) {
    console.log('product_id = ' + product.value);
    console.log(product.options[product.selectedIndex].text.split(' _ '));
    let product_select = product.options[product.selectedIndex].text.split(' _ ');
    let product_name = product_select[0];
    let product_version = product_select[1];
    let product_brand_name = product_select[2];

    let product_option_value = product.options[product.selectedIndex].value.split(' _ ');
    let product_id = product_select[0];
    let product_in_stock = product_select[1];
    let product_price = product_select[2];

    console.log(product_select);
    console.log(product_option_value);

    cost.value = product_price;
}

var btnMove = document.getElementById('btn-move');
btnMove.onclick = function (e) {
    if (product.value != '' && quantity.value > 0 && cost.value > 0 ) {
        let product_select = product.options[product.selectedIndex].text.split(' _ ');
        let product_name = product_select[0];
        let product_version = product_select[1];
        let product_brand_name = product_select[2];

        let product_option_value = product.options[product.selectedIndex].value.split(' _ ');
        let product_id = product_select[0];
        let product_in_stock = product_select[1];
        let product_price = product_select[2];


        console.log('product_id = ' + product_id);
        console.log(product_select);
        console.log(quantity.value);
        console.log(cost.value);
        console.log(total_price.value);

        let t_row = document.createElement("tr");
        t_row.innerHTML
        = `<tr>
            <td>
                <input hidden value="${product_id}" name="product_id[]">
                ${product_name}
            </td>
            <td>${product_version}</td>
            <td>${product_brand_name}</td>
            <td>
                <input hidden value="${cost.value}" name="cost[]">
                ${product_price}đ
            </td>
            <td>
                <input hidden value="${quantity.value}" name="quantity[]">
                ${quantity.value}
            </td>
            <td>
            <input hidden value="${Number.parseInt(product_price) * quantity.value}" name="total[]">
                ${Number.parseInt(product_price) * quantity.value}đ
            </td>
        </tr>`;
        table.appendChild(t_row);

        let total_price_num = Number.parseInt(total_price.value);
        let total = Number.parseInt(quantity.value) * Number.parseInt(cost.value);
        console.log('thành tiền = ' + total);

        total_price_num += total;
        console.log('tổng tiền = ' + total_price_num);
        console.log('tổng tiền = ' +total_price.value);

        total_price.setAttribute('value', total_price_num.toString());
        quantity.setAttribute('value', '1');
        cost.setAttribute('value', '1000');

        product.remove(product.selectedIndex);

        balance_value = Number.parseInt(total_price.value) - Number.parseInt(paid.value);
        if (balance_value >= 0) {
            balance.value = balance_value;
        } else {
            alert('Số tiền thanh toán phải <= Tổng tiền hoá đơn');
        }

    } else {
        alert('Vui lòng chọn sản phẩm và nhập số lượng, đơn giá');
    }
}

var paid = document.getElementById('paid');
var balance = document.getElementById('balance');
paid.onchange = function(e) {

    balance_value = Number.parseInt(total_price.value) - Number.parseInt(paid.value);
    if (balance_value >= 0) {
        balance.value = balance_value;
    } else {
        alert('Số tiền thanh toán phải <= Tổng tiền hoá đơn');
    }
}
