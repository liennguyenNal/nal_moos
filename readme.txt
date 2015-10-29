Yêu cầu:
	+ Apache có mode rewrite
	+ Php version >=5.5
	+ MySQL version >=5.0
- Cấu hình Virtual Host trong Apache cho Project (yêu cầu có mode rewrite)
- Cấu hình SSL : Trỏ tới cùng thư mục code với http 
- Tạo thư mục code và upload code vào thư mục đã cài đặt trên apache (bằng GIT hoặc FTP).
- Tạo Database trên MySql và chạy lần lượt 2 script moos.sql và moos_data.sql cho DB vừa tạo.

Sau khi upload code và cài đặt database xong, cần làm những việc sau:

+ Vào file app/Config/database.php sửa lại các tham số của biến (host, login, password, database) cho đúng 
public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost', // tên host chứa localhost
		'login' => 'root', // acount mysql 
		'password' => 'root', // password mysql 
		'database' => 'moos', // database name
		'prefix' => '',
		'encoding' => 'utf8',
	);

+ Set permission 777 cho các thư mục sau: 
 - app/tmp/cache/
 - app/tmp/cache/persistent/
 - app/tmp/cache/models/
 - app/webroot/images/upload/news/
 - app/webroot/images/upload/news/big/
 - app/webroot/images/upload/news/small/
 - app/webroot/files/upload/

 + Xoá tất cả các file trong các thư mục sau:
 - app/tmp/cache/persistent
 - app/tmp/cache/models
 - app/webroot/images/upload/news/
 - app/webroot/images/upload/news/big/
 - app/webroot/images/upload/news/small/

+ Config email :
 - Vào file app/Config/email.php sửa các tham số host, port, username, password trong biến sau : 

 	public $gmail = array(
        'host' => '',
        'port' => 465,
        'username' => '',
        'password' => '',
        'transport' => 'Smtp',
        'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
    );

  - Vào file app/Config/bootstrap.php

  Tới dòng 117, sửa biến constant ADMIN_EMAIL (email admin nhận thông báo của hệ thống)
  hiện tại ADMIN_EMAIL là vinhbn@nal.vn :  define("ADMIN_EMAIL", "vinhbn@nal.vn");