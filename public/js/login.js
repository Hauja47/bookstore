let obj = {
    showPassBtn: document.querySelector('.input-password i'),
    matkhau: document.getElementById('password'),

};

obj.showPassBtn.onclick = function (e) {
    if (obj.matkhau.getAttribute('type') == 'password') {
        obj.matkhau.setAttribute('type', 'text');
        this.classList.remove('fa-eye');
        this.classList.add('fa-eye-slash');
    } else {
        obj.matkhau.setAttribute('type', 'password');
        this.classList.remove('fa-eye-slash');
        this.classList.add('fa-eye');
    }
}
