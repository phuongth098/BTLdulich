<?php
// header.php - Phần header chung
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GoReview</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body { font-family: 'Arial', sans-serif; }
    .post-card, .category-card { transition: transform 0.3s; }
    .post-card:hover, .category-card:hover { transform: scale(1.02); }
    .comment-section { max-height: 300px; overflow-y: auto; }
  </style>
</head>
<body class="bg-gray-100">
  <header class="bg-blue-600 text-white p-4 sticky top-0 z-10 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center space-x-4">
        <img src="https://cdn-icons-png.flaticon.com/512/854/854878.png" alt="GoReview Logo" class="h-10" />
        <h1 class="text-2xl font-bold">GoReview</h1>
      </div>
      <nav class="hidden md:flex space-x-6">
        <a href="index.php" class="hover:underline">Trang chủ</a>
        <a href="categories.php" class="hover:underline">Danh mục</a>
        <a href="posts.php" class="hover:underline">Bài viết</a>
        <a href="about.php" class="hover:underline">About</a>
      </nav>
      <div class="flex items-center space-x-4">
        <div class="relative">
          <input type="text" placeholder="Search destinations..." class="p-2 rounded-lg text-black w-64" />
          <svg class="absolute right-2 top-2.5 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        <button class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-gray-200">Login</button>
      </div>
    </div>
  </header>