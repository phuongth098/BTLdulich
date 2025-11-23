<?php
// posts.php - Trang Bài viết
include 'db_connect.php';
include 'header.php';

// Xử lý filter (server-side)
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'All';
$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'Highest First';

$where = "WHERE 1=1";
if ($searchTerm) {
    $where .= " AND title LIKE '%$searchTerm%'";
}
if ($selectedCategory != 'All') {
    $where .= " AND c.name = '$selectedCategory'";
}
$order = ($sortOrder == 'Highest First') ? 'DESC' : 'ASC';

$query = "SELECT p.*, c.name AS category_name FROM posts p
          LEFT JOIN categories c ON p.category_id = c.id
          $where
          ORDER BY p.rating $order";
$result = $mysqli->query($query);
?>
<div class="container mx-auto p-4">
  <h2 class="text-3xl font-bold mb-4">Bài viết</h2>
  <div class="mb-8">
    <h3 class="text-xl font-semibold mb-2">Filter Posts</h3>
    <form method="GET" class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
      <select name="category" class="p-2 border rounded-lg">
        <option <?php if ($selectedCategory == 'All') echo 'selected'; ?>>All</option>
        <?php
        $catQuery = "SELECT DISTINCT name FROM categories";
        $catResult = $mysqli->query($catQuery);
        while ($cat = $catResult->fetch_assoc()): ?>
          <option <?php if ($selectedCategory == $cat['name']) echo 'selected'; ?>><?php echo $cat['name']; ?></option>
        <?php endwhile; ?>
      </select>
      <input type="text" name="search" placeholder="Search by keyword..." value="<?php echo $searchTerm; ?>" class="p-2 border rounded-lg w-full md:w-64" />
      <select name="sort" class="p-2 border rounded-lg">
        <option <?php if ($sortOrder == 'Highest First') echo 'selected'; ?>>Highest First</option>
        <option <?php if ($sortOrder == 'Lowest First') echo 'selected'; ?>>Lowest First</option>
      </select>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Filter</button>
    </form>
  </div>
  <div class="grid grid-cols-1 gap-4">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="post-card bg-white rounded-lg shadow-md p-6 mb-6">
        <img src="<?php echo $row['image']; ?>" alt="Post" class="w-full h-64 object-cover rounded-lg mb-4" />
        <h2 class="text-2xl font-bold mb-2"><?php echo $row['title']; ?></h2>
        <div class="text-gray-600 text-sm mb-4">By <?php echo $row['author']; ?> | <?php echo $row['date']; ?> | <?php echo $row['views']; ?> views</div>
        <p class="text-gray-700 mb-4"><?php echo substr($row['content'], 0, 200); ?>...</p>
        <div class="flex justify-between items-center">
          <div class="flex space-x-2">
            <span class="text-yellow-500"><?php echo str_repeat('★', round($row['rating'])) . str_repeat('☆', 5 - round($row['rating'])); ?></span>
            <span class="text-gray-600">(<?php echo $row['rating']; ?>/5)</span>
          </div>
          <button class="text-blue-600 hover:underline">Read More</button>
        </div>
        <div class="comment-section mt-4">
          <h3 class="text-lg font-semibold mb-2">Comments</h3>
          <?php
          $commentQuery = "SELECT * FROM comments WHERE post_id = " . $row['id'];
          $commentResult = $mysqli->query($commentQuery);
          while ($comment = $commentResult->fetch_assoc()): ?>
            <div class="bg-gray-50 p-4 rounded-lg mb-2">
              <p class="text-sm text-gray-600"><?php echo $comment['user']; ?>: <?php echo $comment['comment']; ?></p>
            </div>
          <?php endwhile; ?>
          <form method="POST" action="add_comment.php">
            <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>" />
            <textarea name="comment" class="w-full p-2 border rounded-lg" placeholder="Add a comment..."></textarea>
            <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Post Comment</button>
          </form>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
<div class="mt-8">
  <h2 class="text-2xl font-bold mb-4">Bài viết liên quan</h2>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <!-- Có thể fetch thêm posts liên quan từ DB, nhưng tạm dùng placeholder -->
    <?php for ($i = 1; $i <= 3; $i++): ?>
      <div class="bg-white rounded-lg shadow-md p-4">
        <img src="https://via.placeholder.com/150" alt="Related Post" class="w-full h-32 object-cover rounded-lg mb-2" />
        <h3 class="text-lg font-semibold">Related Destination <?php echo $i; ?></h3>
        <p class="text-gray-600 text-sm">Brief description...</p>
      </div>
    <?php endfor; ?>
  </div>
</div>
<?php include 'footer.php'; ?>