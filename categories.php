<?php
// categories.php - Trang Danh mục
include 'db_connect.php';
include 'header.php';

$query = "SELECT * FROM categories";
$result = $mysqli->query($query);
?>
<div class="container mx-auto p-4">
  <h2 class="text-3xl font-bold mb-4">Danh mục du lịch</h2>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="category-card bg-white rounded-lg shadow-md p-4">
        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="w-full h-32 object-cover rounded-lg mb-2" />
        <h3 class="text-lg font-semibold"><?php echo $row['name']; ?></h3>
        <p class="text-gray-600 text-sm"><?php echo $row['description']; ?></p>
        <button class="mt-2 text-blue-600 hover:underline">View Posts</button>
      </div>
    <?php endwhile; ?>
  </div>
</div>
<?php include 'footer.php'; ?>