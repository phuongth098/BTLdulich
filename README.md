# **GoReview – Nền tảng trao đổi, thảo luận và review các điểm du lịch**

---

## **Tổng Quan**

**GoReview** là website cộng đồng dành cho những người yêu du lịch, cho phép chia sẻ thông tin, đánh giá và thảo luận về các điểm đến.
Người dùng có thể đăng bài review, thêm hình ảnh, bình luận, đánh giá sao và trao đổi với nhau về trải nghiệm thực tế tại điểm du lịch.

Website hướng đến mục tiêu:

* Tạo cộng đồng du lịch minh bạch, hữu ích.
* Cung cấp thông tin đa chiều, được đóng góp bởi người thật - trải nghiệm thật.
* Kết nối những người yêu khám phá.
* Giảm thông tin sai lệch nhờ cơ chế bình luận và đánh giá cộng đồng.

---

## Yêu Cầu Hệ Thống

### Yêu Cầu Kỹ Thuật

- PHP 7.4 hoặc cao hơn
- MySQL 5.7 hoặc cao hơn
- Máy chủ web (Apache/Nginx)
- PDO PHP Extension
- Trình duyệt web hiện đại có hỗ trợ JavaScript

### Cấu Hình Cơ Sở Dữ Liệu

- Host: localhost
- Tên Database: goreview
- Tên người dùng: root
- Cấu hình mật khẩu mặc định (có thể được sửa đổi trong Config/Database.php)

---

## 👥 **Vai Trò Người Dùng và Quyền Truy Cập**

### **1. Quản trị viên (Admin)**

* Quản lý người dùng
* Quản lý bài viết
* Quản lý bình luận
* Quản lý danh mục địa điểm du lịch
* Kiểm duyệt nội dung, xóa bài spam
* Quản lý đánh giá của người dùng

### **2. Người dùng (User)**

* Đăng ký, đăng nhập
* Đăng bài review về địa điểm du lịch
* Thêm hình ảnh minh họa
* Bình luận dưới bài viết
* Đánh giá điểm du lịch (1–5 sao + nhận xét)
* Tìm kiếm và lọc bài theo: từ khóa, danh mục, đánh giá

---

## 🔎 **Use Cases (Trường Hợp Sử Dụng)**

---

### ### 🔐 **Use Cases Xác Thực**

#### **1. Đăng Nhập**

**Tác nhân:** User, Admin
**Luồng chính:**

1. Truy cập trang đăng nhập
2. Nhập email/tài khoản và mật khẩu
3. Hệ thống xác thực
4. Chuyển đến trang tương ứng vai trò

#### **2. Đăng Ký**

**Tác nhân:** Người dùng mới
**Luồng chính:**

1. Mở trang đăng ký
2. Nhập thông tin tài khoản
3. Hệ thống lưu trữ thông tin
4. Chuyển hướng sang trang đăng nhập

#### **3. Đăng Xuất**

**Tác nhân:** User
**Luồng chính:**

1. Nhấn nút Đăng xuất
2. Hệ thống xóa phiên
3. Quay lại trang đăng nhập

---

### 📝 **Use Cases – Người dùng**

#### **Đăng bài review**

1. Người dùng truy cập trang đăng bài
2. Nhập:

   * Tên điểm đến
   * Nội dung mô tả
   * Hình ảnh
   * Cảm nhận cá nhân
3. Gửi bài viết
4. Hệ thống lưu bài vào CSDL

#### **Bình luận bài viết**

1. Người dùng mở bài viết
2. Nhập nội dung bình luận
3. Hệ thống lưu và hiển thị ngay

#### **Đánh giá điểm du lịch**

1. Người dùng chọn số sao (1–5)
2. Nhập mô tả nhận xét
3. Gửi đánh giá
4. Hệ thống cập nhật rating trung bình

#### **Tìm kiếm & lọc nội dung**

* Tìm kiếm theo từ khóa
* Lọc theo danh mục (biển, núi, văn hóa…)
* Lọc theo mức rating
* Lọc theo bài viết nổi bật / nhiều lượt xem

---

### 🗂️ **Use Cases – Quản trị viên (Admin)**

#### **1. Quản lý người dùng**

* Xem danh sách user
* Cập nhật, khóa tài khoản
* Xóa tài khoản vi phạm

#### **2. Quản lý bài viết**

* Duyệt bài
* Chỉnh sửa hoặc xóa bài viết không phù hợp

#### **3. Quản lý bình luận**

* Xóa bình luận spam / vi phạm

#### **4. Quản lý danh mục**

* Thêm danh mục du lịch mới
* Chỉnh sửa tên danh mục
* Xóa danh mục

---

## 🌟 **Tính Năng Chính**

### **1. Hệ thống bài viết**

* Viết bài
* Thêm ảnh minh họa
* Danh sách bài theo danh mục
* Xem bài chi tiết
* Đếm lượt xem

### **2. Hệ thống bình luận**

* Thảo luận dưới từng bài viết
* Hiển thị theo thời gian
* Cuộn tự động trong vùng comment

### **3. Hệ thống đánh giá**

* Rating 1–5 sao
* Tổng hợp rating trung bình
* Review văn bản

### **4. Tìm kiếm & lọc bài viết**

* Theo tên bài viết
* Theo danh mục
* Theo mức sao
* Sắp xếp theo:

  * Rating cao → thấp
  * Rating thấp → cao

### **5. Giao diện người dùng**

* Fully responsive
* Header + menu điều hướng
* Footer + thông tin liên hệ
* Hình ảnh trực quan
* UI thân thiện (TailwindCSS)

---

## 🗃️ **Mô Hình Dữ Liệu**

### **Users**

* user_id
* username
* email
* password
* role
* created_at

### **Destinations**

* destination_id
* name
* description
* location
* category_id

### **Posts**

* post_id
* user_id
* destination_id
* title
* content
* created_at
* views

### **Comments**

* comment_id
* post_id
* user_id
* content
* created_at

### **Ratings**

* rating_id
* user_id
* destination_id
* stars
* review
* created_at

### **Categories**

* category_id
* name

### **Images**

* image_id
* post_id
* destination_id
* url
* description

---

## 🖥️ **Yêu Cầu Giao Diện Người Dùng**

* Header: logo, menu, tìm kiếm, login
* Body: bài viết + bài liên quan
* Footer: thông tin liên hệ + liên kết nhanh
* Giao diện thân thiện, hiện đại
* Hỗ trợ mobile và tablet

---
