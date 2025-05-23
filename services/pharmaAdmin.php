<?php
session_start();
if(isset($_SESSION["Admin"]))
{
  if($_SESSION["Admin"] == false)
  {
    header("location: ../index.php");
  }
  else
  {
    if($_SESSION["Access"] == "messages")
    {
        header("location: AdminMain.php");
    }
  }
}
else
{
    header("location: ../index.php");
}

$filePath = 'txtFiles/pharmaProds.txt';

// Helper: Re-index products and save to file
function reindexProducts($lines, $filePath) {
    $newLines = [];
    $idx = 1;
    foreach ($lines as $line) {
        $parts = explode('~', $line, 2);
        $prodName = isset($parts[1]) ? $parts[1] : (isset($parts[0]) ? $parts[0] : '');
        if (trim($prodName) !== '') {
            $newLines[] = $idx . '~' . $prodName;
            $idx++;
        }
    }
    file_put_contents($filePath, implode("\n", $newLines) . "\n");
    return $newLines;
}

// Handle delete
if (isset($_POST['delete_id'])) {
    $deleteId = intval($_POST['delete_id']);
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    unset($lines[$deleteId]);
    $lines = array_values($lines); // reindex array numerically
    $lines = reindexProducts($lines, $filePath);
    header("Location: pharmaAdmin.php");
    exit();
}

// Handle edit
if (isset($_POST['edit_id']) && isset($_POST['edit_name'])) {
    $editId = intval($_POST['edit_id']);
    $editName = trim($_POST['edit_name']);
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $parts = explode('~', $lines[$editId], 2);
    $lines[$editId] = ($editId + 1) . '~' . $editName;
    file_put_contents($filePath, implode("\n", $lines) . "\n");
    header("Location: pharmaAdmin.php");
    exit();
}

// Handle add
if (isset($_POST['AddProduct']) && !empty($_POST['ProductName'])) {
    $productName = trim($_POST['ProductName']);
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $nextIndex = count($lines) + 1;
    $lines[] = $nextIndex . '~' . $productName;
    file_put_contents($filePath, implode("\n", $lines) . "\n");
    header("Location: pharmaAdmin.php");
    exit();
}

$products = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmacist Panel</title>
    <link rel="stylesheet" href="servicesAdminCSS/admin.css">
</head>
<body>
<h1>Pharmacist Dashboard</h1>
<div class="tabs">
    <h2>Product List</h2>
    <table>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($products as $i => $prod): ?>
            <?php
                $parts = explode('~', $prod, 2);
                $prodId = isset($parts[0]) ? $parts[0] : '';
                $prodName = isset($parts[1]) ? $parts[1] : '';
            ?>
            <tr>
                <td><?= htmlspecialchars($prodId) ?></td>
                <td>
                    <?php
                        if (isset($_GET['edit']) && $_GET['edit'] == $i) {
                            echo "<form method='post' style='display:inline;'>
                                    <input type='hidden' name='edit_id' value='$i'>
                                    <input type='text' name='edit_name' value='" . htmlspecialchars($prodName) . "' required>
                                    <button type='submit'>Save</button>
                                    <a href='pharmaAdmin.php'>Cancel</a>
                                  </form>";
                        } else {
                            echo htmlspecialchars($prodName);
                        }
                    ?>
                </td>
                <td>
                    <?php if (isset($_GET['edit']) && $_GET['edit'] == $i): ?>
                        <!-- Editing, no actions -->
                    <?php else: ?>
                        <a href="pharmaAdmin.php?edit=<?= $i ?>">Edit</a>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="delete_id" value="<?= $i ?>">
                            <button type="submit" onclick="return confirm('Delete this product?');">Delete</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Add Product</h2>
    <form method="post" action="pharmaAdmin.php">
        <input type="hidden" name="AddProduct" value="AddProduct">
        <input type="text" name="ProductName" placeholder="Product Name" required>
        <button type="submit">Add</button>
    </form>
</div>
</body>
</html>