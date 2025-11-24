-- SQL Schema và dữ liệu mẫu
-- Tạo database và tables

CREATE DATABASE IF NOT EXISTS goreview;
USE goreview;

-- Table categories
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255)
);

-- Insert dữ liệu mẫu cho categories
INSERT INTO categories (name, description, image) VALUES
('Du lịch biển', 'Khám phá những bãi biển tuyệt đẹp với làn nước trong xanh và cát trắng mịn.', 'https://cdn3.ivivu.com/2015/05/khu-nghi-duong-sap-bien-mat-ivivu-4.jpg'),
('Du lịch núi', 'Chinh phục những đỉnh núi hùng vĩ và tận hưởng không khí trong lành.', 'https://cdn3.ivivu.com/2018/07/co-mot-sa-pa-that-khac-trong-anh-check-in-cua-gioi-tre-viet-ivivu-2.jpg'),
('Du lịch văn hóa', 'Tìm hiểu những nét văn hóa độc đáo và lịch sử phong phú của các vùng đất.', 'https://cdn3.ivivu.com/2023/07/tour-trung-quoc-van-nam-ivivu-2.jpg');

-- Table posts
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255),
    date DATE,
    views INT DEFAULT 0,
    content TEXT,
    image VARCHAR(255),
    rating FLOAT,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Insert dữ liệu mẫu cho posts
INSERT INTO posts (title, author, date, views, content, image, rating, category_id) VALUES
('Exploring Ha Long Bay', 'TravelLover', '2025-06-10', 120, 'Vịnh Hạ Long là di sản thế giới tuyệt đẹp được UNESCO công nhận với làn nước ngọc lục bảo và hàng ngàn núi đá vôi. Chuyến du ngoạn thật khó quên, với hải sản ngon và quang cảnh ngoạn mục.', 'https://cdn3.ivivu.com/2013/04/1Halong-bay-Vietnamt.jpg', 4.5, 1),
('Hiking in Sapa', 'AdventureSeeker', '2025-06-08', 85, 'Sapa có những cung đường đi bộ đường dài tuyệt đẹp với cây xanh tươi tốt và nền văn hóa địa phương sôi động. Các khu chợ địa phương là nơi không thể bỏ qua để mua đồ thủ công và thực phẩm đích thực.', 'https://cdn3.ivivu.com/2018/07/co-mot-sa-pa-that-khac-trong-anh-check-in-cua-gioi-tre-viet-ivivu-2.jpg', 4.0, 2),
('Discovering Hoi An', 'CultureExplorer', '2025-06-05', 150, 'Hội An là một thị trấn cổ kính với những con phố lồng đèn rực rỡ và văn hóa phong phú. Ẩm thực địa phương và kiến trúc cổ là điểm nhấn không thể bỏ qua.', 'https://cdn3.ivivu.com/2023/10/du-lich-hoi-an-ivivu-img1.jpg', 4.8, 3);

-- Table comments
CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT,
    user VARCHAR(255),
    comment TEXT,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id)
);

-- Insert dữ liệu mẫu cho comments
INSERT INTO comments (post_id, user, comment) VALUES
(1, 'User1', 'Địa điểm tuyệt vời! Rất khuyến khích.'),
(2, 'User2', 'Sapa đẹp lung linh!'),
(3, 'User3', 'Hội An là nơi phải đến một lần trong đời.');

-- Sử dụng database hiện có
USE goreview;

-- Thêm bảng users (nếu chưa có)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,  -- Nên hash password thực tế
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insert dữ liệu mẫu cho users
INSERT INTO users (username, email, password) VALUES
('TravelLover', 'travellover@example.com', 'hashed_password1'),
('AdventureSeeker', 'adventurer@example.com', 'hashed_password2'),
('CultureExplorer', 'culture@example.com', 'hashed_password3'),
('User1', 'user1@example.com', 'hashed_password4'),
('User2', 'user2@example.com', 'hashed_password5'),
('User3', 'user3@example.com', 'hashed_password6');

-- Thêm categories mới
INSERT INTO categories (name, description, image) VALUES
('Du lịch mạo hiểm', 'Trải nghiệm những hoạt động phiêu lưu như leo núi, lặn biển.', 'https://cdn3.ivivu.com/2015/02/du-lich-mao-hiem-ivivu.com-3.jpg'),
('Du lịch ẩm thực', 'Khám phá ẩm thực địa phương và các món ăn đặc sản.', 'https://cdn3.ivivu.com/2023/03/L%E1%BA%A9u-cay-T%E1%BB%A9-Xuy%C3%AAn-ivivu-1.jpg'),
('Du lịch nghỉ dưỡng', 'Nghỉ ngơi tại các resort sang trọng và spa thư giãn.', 'https://cdn3.ivivu.com/2023/07/Holiday-Inn-H%E1%BB%93-Tr%C3%A0m-ivivu-2.jpg');

-- Thêm posts mới (liên kết với categories)
INSERT INTO posts (title, author, date, views, content, image, rating, category_id) VALUES
('Adventure in Da Nang', 'User1', '2025-11-20', 200, 'Da Nang với cầu Rồng và bãi biển Mỹ Khê là nơi lý tưởng cho du lịch mạo hiểm.', 'https://cdn3.ivivu.com/2023/05/Tia-Wellness-%C4%90%C3%A0-N%E1%BA%B5ng-ivivu-2.jpg', 4.7, 4),  -- category_id 4: Du lịch mạo hiểm
('Food Tour in Hanoi', 'User2', '2025-11-22', 180, 'Phở, bún chả và cà phê trứng là những món không thể bỏ qua ở Hà Nội.', 'https://cdn3.ivivu.com/2022/09/X%C3%B4i-H%C3%A0-N%E1%BB%99i-ivivu.jpg', 4.9, 5),  -- category_id 5: Du lịch ẩm thực
('Relaxing in Phu Quoc', 'User3', '2025-11-23', 250, 'Đảo Phú Quốc với nước biển trong xanh và resort cao cấp.', 'https://cdn3.ivivu.com/2022/06/vinoasis-phu-quoc-ivivu-22.jpg', 4.6, 6);  -- category_id 6: Du lịch nghỉ dưỡng

-- Thêm comments mới (liên kết với posts)
INSERT INTO comments (post_id, user, comment) VALUES
(1, 'User2', 'Tôi đã đến Hạ Long, cảnh đẹp mê hồn!'),
(1, 'User3', 'Hải sản tươi ngon lắm.'),
(2, 'User1', 'Sapa mùa lúa chín đẹp như tranh.'),
(2, 'User3', 'Nên đi vào mùa thu.'),
(3, 'User1', 'Hội An đêm đèn lồng lãng mạn.'),
(3, 'User2', 'Ẩm thực Hội An đỉnh cao!'),
(4, 'TravelLover', 'Da Nang tuyệt vời cho lướt ván.'),
(5, 'AdventureSeeker', 'Phở Hà Nội là số 1.'),
(6, 'CultureExplorer', 'Phú Quốc là thiên đường nghỉ dưỡng.');