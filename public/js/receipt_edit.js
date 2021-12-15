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
