Đồ án môn học: Website khám phá du lịch các tỉnh thành Việt Nam
Dùng framework: Lavael (không cần cài đặt hay khởi tạo , vì khi down source code này về là đã có Lavarel rồi)
Phần mềm XAMPP (DATABASE)
phần mềm Composer 

PHẦN 1: CÀI ỨNG DỤNG

Bước 1: Cài đặt phần mềm XAMPP (Tạo môi trường PHP và Database)
1. Truy cập vào trang web: apachefriends.org 
2. Sau khi tải thì mở file lên ,  bấm Next liên tục để cài đặt mặc định cho đến khi hoàn thành.
Bước 2: Cài đặt phần mềm Composer (Bộ quản lý thư viện của Laravel)
1. Truy cập vào trang web: getcomposer.org
2. Bấm vào nút Download > Nhấp vào chữ Composer-Setup.exe để tải về.
3. Mở file lên cài đặt:
	• Chọn Install for all users và bấm Next.
	• Đến đoạn hệ thống hỏi đường dẫn php.exe, nếu cài mặc định XAMPP ở ổ C, nó sẽ tự hiện là C:\xampp\php\php.exe thì  chỉ cần bấm Next (còn XAMPP ở ổ đĩa khác thì chỉnh đường dẫn ở ổ đĩa đã cài XAMPP).
	• Tiếp tục bấm Next và Install cho đến khi xong.

PHẦN 2: MỞ CODE VÀ CÀI ĐẶT TRÊN VS CODE
Bước 2.1: Giải nén và mở thư mục bằng VS Code
1. Giải nén file source code ra một thư mục trên máy tính của mình (Ví dụ giải nén vào ổ đĩa D thành thư mục: D:\vietnam-travel).
2. Mở phần mềm VS Code lên > Chọn File > Open Folder > Tìm và chọn đúng thư mục vietnam-travel vừa giải nén.
3. Trên thanh menu trên cùng của VS Code, chọn Terminal > New Terminal (hoặc bấm tổ hợp phím Ctrl + `).

Bước 2.2: Tải thư viện cho dự án
Tại cửa sổ Terminal vừa mở, gõ lệnh sau và nhấn Enter: composer install
sau đó chờ để tải thư viện về , khin xong sẽ thấy thư mục tên là vendor xuất hiện ở cột danh sách file bên trái.

Bước 2.3: Tạo cấu hình môi trường .env
• Nhìn vào danh sách file bên trái VS Code, tìm file tên là .env.example.
• Nhấp chuột phải vào file đó > Chọn Copy.
• Nhấp chuột phải ra vùng trống xung quanh > Chọn Paste.
• Sẽ thấy một file mới tên là .env.example - Copy. Hãy chuột phải vào nó > Chọn Rename (Đổi tên) và sửa chính xác thành: .env (có dấu chấm ở đầu, xóa chữ example đi). (NẾU ĐÃ CÓ file .env thì tới thẳng bước này , ko cần phải tạo file .env mới)
• Mở file .env vừa tạo lên, tìm đến dòng 23 đến 28 và sửa lại nội dung giống hệt như sau:
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=vn_travel
     DB_USERNAME=root
     DB_PASSWORD=
Ctrl + S để lưu file lại

PHẦN 3: ĐỒNG BỘ CƠ SỞ DỮ LIỆU (DATABASE)

1. Mở phần mềm XAMPP Control Panel lên.
2. Bấm nút Start ở dòng Apache và dòng MySQL (cho đến khi hiện màu xanh lá cây). (nếu bị lỗi ko bật được dòng MySQL, có thể lên youtube xem để sửa lỗi)
3. Mở trình duyệt truy cập: http://localhost/phpmyadmin/ (có thể bấm nút Admin ở dòng MySQL)
4. Bấm chữ Mới (New) ở cột bên trái > Nhập tên database là vn_travel (hoặc bất cứ tên gì mà mình thích , lưu ý là tên phải trùng với dòng 36 :DB_DATABASE=vn_travel ) > Bấm Tạo (Create) để tạo một database trống (không cần import gì cả).

 PHẦN 4: KÍCH HOẠT VÀ TỰ ĐỘNG TẠO BẢNG DỮ LIỆU
 Quay lại Terminal của VS Code, chạy lần lượt 3 lệnh sau:
 Bước 4.1: Tạo mã khóa bảo mật
    php artisan key:generate
Bước 4.2: Tự động tạo các bảng dữ liệu 
gõ lệnh này và nhấn Enter:
    php artisan migrate

Bước 4.3: Khởi chạy trang web:
    php artisan serve

Giờ chỉ cần giữ phím Ctrl và click vào link http://127.0.0.1:8000 là xong!

Hiện tại là đã có chức năng Đăng nhập , Đăng kí, 
Admin quản lý địa điểm ()

