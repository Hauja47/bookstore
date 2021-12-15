// Find a <table> element with id="myTable":
var table = document.querySelector(".main-product-table tbody");

var product = document.getElementById('product');
var quantity = document.getElementById('quantity');
var cost = document.getElementById('cost');
var total_price = document.getElementById('total_price');

total_price.onchange = function(e) {
    let attr = document.createAttribute('max');
    attr.value = total_price.value;
    paid.setAttributeNode(attr);
}

let paid = document.getElementById('paid');
let balance = document.getElementById('balance');

paid.onchange = function(e) {
    let balance_value = Number.parseInt(total_price.value) - Number.parseInt(paid.value);

    if (balance_value >= 0) {
        balance.value = balance_value;
    } else {
        alert('Số tiền thanh toán phải nhỏ hơn Tổng tiền');
    }
}


let btnMove = document.getElementById('btn-move');
btnMove.onclick = function (e) {


    console.log(product.value);
    console.log(product.options[product.selectedIndex].text.split(' - '));

    let product_select = product.options[product.selectedIndex].text.split(' - ');
    let product_name = product_select[0];
    let product_version = product_select[1];
    let product_brand_name = product_select[2];


    console.log(quantity.value);
    console.log(cost.value);
    console.log(total_price.value);

    if (quantity.value > 0 && cost.value > 0 && product.value != '') {
        let total_price_num = Number.parseInt(total_price.value);

        let total = Number.parseInt(quantity.value) * Number.parseInt(cost.value);

        console.log(total);

        total_price_num += total;

        console.log(total_price_num);

        total_price.setAttribute('value', total_price_num.toString());

        console.log(total_price);

        let t_row = document.createElement("tr");
        t_row.innerHTML = `<tr>
                <td>
                    <input hidden value="${product.value}" name="product_id[]">
                    ${product_name}
                </td>
                <td>${product_version}</td>
                <td>${product_brand_name}</td>
                <td>
                    <input hidden value="${cost.value}" name="cost[]">
                    ${cost.value}đ
                </td>
                <td>
                    <input hidden value="${quantity.value}" name="quantity[]">
                    ${quantity.value}
                </td>
                <td>
                <input hidden value="${cost.value * quantity.value}" name="total[]">
                    ${cost.value * quantity.value}đ
                </td>
            </tr>`;

        table.appendChild(t_row);

        product.remove(product.selectedIndex);
        quantity.value = 1;
        cost.value = 1000;
    } else {
        alert('Vui lòng chọn sản phẩm và nhập số lượng, đơn giá');
    }

    //     // Create an empty <tr> element and add it to the 1st position of the table:
    //     var row = table.insertRow(0);
    // <table><tr></tr><tr></tr></table>
    //     // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
    //     var cell1 = row.insertCell(0);
    //     var cell2 = row.insertCell(1);

    //     // Add some text to the new cells:
    //     cell1.innerHTML = "NEW CELL1";
    //     cell2.innerHTML = "NEW CELL2";
}
