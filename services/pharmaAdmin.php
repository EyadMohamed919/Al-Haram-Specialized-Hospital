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
include_once(__DIR__ . '/../encrypt.php');
$key = 123;

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

if (isset($_POST['delete_id'])) {
    $deleteId = intval($_POST['delete_id']);
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    unset($lines[$deleteId]);
    $lines = array_values($lines); 
    $lines = reindexProducts($lines, $filePath);
    header("Location: pharmaAdmin.php");
    exit();
}


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


$pharmaFormPath = 'txtFiles/pharmaForm.txt';
$formEntries = file_exists($pharmaFormPath) ? file($pharmaFormPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
$dates = [];
foreach ($formEntries as $entry) {
    $fields = explode('~', $entry);
    $date = isset($fields[count($fields)-2]) ? decrypt($fields[count($fields)-2], $key) : '';
    $time = isset($fields[count($fields)-1]) ? decrypt($fields[count($fields)-1], $key) : '';
    $dates[] = [
        'date' => $date,
        'time' => $time
    ];
}

$months = [];
$years = [];
foreach ($dates as $dt) {
    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $dt['date'])) {
        $year = substr($dt['date'], 0, 4);
        $month = substr($dt['date'], 0, 7);
        $months[$month] = true;
        $years[$year] = true;
    }
}
$months = array_keys($months);
$years = array_keys($years);
sort($months);
sort($years);

$selectedMonth = $_GET['month'] ?? '';
$selectedYear = $_GET['year'] ?? '';
$monthlyCount = 0;
$yearlyCount = 0;
foreach ($dates as $dt) {
    if ($selectedMonth && strpos($dt['date'], $selectedMonth) === 0) $monthlyCount++;
    if ($selectedYear && strpos($dt['date'], $selectedYear) === 0) $yearlyCount++;
}

$activeTab = $_GET['tab'] ?? 'products';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmacist Panel</title>
    <link rel="stylesheet" href="servicesAdminCSS/admin.css">
    <style>
        .tab-btn {
            padding: 8px 16px;
            margin-right: 8px;
            border: none;
            background: #eee;
            cursor: pointer;
            text-decoration: none;
            color: #333;
            border-radius: 4px;
        }
        .tab-btn.active {
            background: #b3d4fc;
            font-weight: bold;
        }
        .tab-content { margin-top: 20px; }
    </style>
</head>
<body>
<h1>Pharmacist Dashboard</h1>
<div style="margin-bottom: 20px;">
    <a href="../index.php" class="nav-btn">Home</a>
    <a href="AdminMain.php" class="nav-btn">Admin Main</a>
    <a href="pharmaAdmin.php" class="nav-btn">Pharmacy Dashboard</a>
    <a href="../logout.php" class="nav-btn" style="color:red;">Logout</a>
</div>

<div>
    <a href="pharmaAdmin.php?tab=products" class="tab-btn<?= $activeTab == 'products' ? ' active' : '' ?>">Product List</a>
    <a href="pharmaAdmin.php?tab=analytics" class="tab-btn<?= $activeTab == 'analytics' ? ' active' : '' ?>">Analytics</a>
</div>

<?php if ($activeTab == 'products'): ?>
<div class="tab-content">
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
                        if (isset($_GET['edit']) && $_GET['edit'] == $i && $activeTab == 'products') {
                            echo "<form method='post' style='display:inline;'>
                                    <input type='hidden' name='edit_id' value='$i'>
                                    <input type='text' name='edit_name' value='" . htmlspecialchars($prodName) . "' required>
                                    <button type='submit'>Save</button>
                                    <a href='pharmaAdmin.php?tab=products'>Cancel</a>
                                  </form>";
                        } else {
                            echo htmlspecialchars($prodName);
                        }
                    ?>
                </td>
                <td>
                    <?php if (isset($_GET['edit']) && $_GET['edit'] == $i && $activeTab == 'products'): ?>
                    <?php else: ?>
                        <a href="pharmaAdmin.php?tab=products&edit=<?= $i ?>">Edit</a>
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
    <form method="post" action="pharmaAdmin.php?tab=products">
        <input type="hidden" name="AddProduct" value="AddProduct">
        <input type="text" name="ProductName" placeholder="Product Name" required>
        <button type="submit">Add</button>
    </form>
</div>
<?php endif; ?>

<?php if ($activeTab == 'analytics'): ?>
<div class="tab-content">
    <h2>Pharmacy Form Analytics</h2>
    <form method="get" action="pharmaAdmin.php">
        <input type="hidden" name="tab" value="analytics">
        <label for="month">Select Month:</label>
        <select name="month" id="month" onchange="this.form.submit()">
            <option value="">--Choose Month--</option>
            <?php foreach ($months as $m): ?>
                <option value="<?= htmlspecialchars($m) ?>" <?= $selectedMonth == $m ? 'selected' : '' ?>>
                    <?= htmlspecialchars($m) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if ($selectedMonth): ?>
            <span style="margin-left:20px;">Entries: <b><?= $monthlyCount ?></b></span>
        <?php endif; ?>
    </form>
    <form method="get" action="pharmaAdmin.php" style="margin-top:20px;">
        <input type="hidden" name="tab" value="analytics">
        <label for="year">Select Year:</label>
        <select name="year" id="year" onchange="this.form.submit()">
            <option value="">--Choose Year--</option>
            <?php foreach ($years as $y): ?>
                <option value="<?= htmlspecialchars($y) ?>" <?= $selectedYear == $y ? 'selected' : '' ?>>
                    <?= htmlspecialchars($y) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if ($selectedYear): ?>
            <span style="margin-left:20px;">Entries: <b><?= $yearlyCount ?></b></span>
        <?php endif; ?>
    </form>
</div>
<?php endif; ?>
</body>
</html>