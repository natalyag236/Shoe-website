<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wishlist - Shoe Website</title>
  <link rel="stylesheet" href="../assests/style.css" />
</head>

<body>
  <header>
    <!-- Same header as Home Page -->
    <div class="logo">WearWhen</div>
    <nav>
      <a href="index.html">Home</a>
      <a href="shop.html">Shop</a>
      <a href="wishlist_history.php">Wishlist</a>
      <a href="profile.html">Profile</a>
      <a href="cart_history.html">Cart</a>
      <a href="order_history.php">Orders</a>
    </nav>
  </header>

  <h2>Your Wish List</h2>
  <?php
  include './wishlist.php';
  ?>
  <?php if (!empty($wishlists)): ?>
    <table>
      <thead>
        <tr>
          <th>Shoe ID</th>
          <th>Shoe Brand</th>
          <th>Shoe color</th>
          <th>Price</th>
          <th>Date Added to wishlist</th>
          <th>Picture</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($wishlists as $wishlist): ?>
          <tr>
            <td><?php echo htmlspecialchars($wishlist['shoe_id']); ?></td>
            <td><?php echo htmlspecialchars($wishlist['brand']); ?></td>
            <td><?php echo htmlspecialchars($wishlist['color']); ?></td>
            <td><?php echo htmlspecialchars($wishlist['price']); ?></td>
            <td><?php echo htmlspecialchars($wishlist['datetime']); ?></td>
            <td><img src="<?php echo htmlspecialchars($wishlist['image_path']); ?>" alt="Shoe Image" width="100" height="100"></td>

          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>You have no orders yet.</p>
  <?php endif; ?>

  <footer>
    <!-- Same footer as Home Page -->
  </footer>
</body>

</html>