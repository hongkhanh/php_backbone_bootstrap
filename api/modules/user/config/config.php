<?php

return new \Phalcon\Config(array(
	'database' => array(
		'adapter'     => 'Mysql',
		'host'        => '127.0.0.1',
		'username'    => 'root',
		'password'    => '',
		'dbname'      => 'camera_api',
	),
    'message' => array(
        'user_save_success'      => 'Lưu người dùng thành công.',
        'user_edit_success'      => 'Sửa người dùng thành công.',
        'user_delete_success'    => 'Xóa người dùng thành công.',
        'user_save_failure'      => 'Đã có lỗi xảy ra. Hãy kiểm tra thông tin và thử lại.',
        'user_edit_failure'      => 'Đã có lỗi xảy ra. Hãy kiểm tra thông tin và thử lại.',
        'user_delete_failure'    => 'Đã có lỗi xảy ra. Hãy kiểm tra thông tin và thử lại.',
        'user_email_missing'     => 'Email chưa được nhập.',
        'user_email_invalid'     => 'Email không đúng định dạng.',
        'user_name_missing'      => 'Tên người dùng chưa được nhập.',
        'user_name_invalid'      => 'Tên người dùng không đúng định dạng.',
        'user_password_missing'  => 'Password chưa được nhập.',
        'user_password_invalid'  => 'Password dùng không đúng định dạng.',
    )
));

