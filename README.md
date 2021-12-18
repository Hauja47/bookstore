# Bookstore

Đồ án Phương pháp Phát triển Phần mềm hướng đối tượng SE100.M12

# Yêu cầu

- [Composer](https://getcomposer.org/)
- PHP >= 7.2.5
	- BCMath PHP Extension
	- Ctype PHP Extension
	- Fileinfo PHP extension
	- JSON PHP Extension
	- Mbstring PHP Extension
	- OpenSSL PHP Extension
	- PDO PHP Extension
	- Tokenizer PHP Extension
	- XML PHP Extension
- MySQL 5.6+

*Khuyến nghị: Sử dụng XAMPP, WAMP, Laragon hay các phần mềm cùng chức năng*

# Cài đặt

1. Cài đặt các package với composer

```
composer install
```

2. Tạo database MySQL với tên là bookstore

3. Chạy lệnh sau trong terminal để tạo các table:

```
php artisan migrate
```

# Sử dụng

Chạy ```php artisan serve --port:[Port number]``` và truy cập localhost:\[Port number\]

*Trong database cung cấp sẵn một tài khoản admin với mật khẩu 123456*

# Công nghệ và thư viện sử dụng

- [Laravel 8.0](https://laravel.com/)
- [arielmejiadev/larapex-charts](https://github.com/ArielMejiaDev/larapex-charts)
- [realrashid/sweet-alert](https://github.com/realrashid/sweet-alert)
- [SweetAlert2](https://sweetalert2.github.io/)
- [Bootstrap 5](https://getbootstrap.com/)
