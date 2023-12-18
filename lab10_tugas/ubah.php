<?php
error_reporting(E_ALL);
include_once 'database.php';
include_once 'formlibrary.php';

$db = new Database("localhost", "root", "", "latihan1");

if (isset($_POST['submit'])) {
    $id = $db->escapeString($_POST['id']);
    $nama = $db->escapeString($_POST['nama']);
    $kategori = $db->escapeString($_POST['kategori']);
    // ... (other form data)

    // Build your SQL statement based on the form data
    $sql = "UPDATE data_barang SET nama='{$nama}', kategori='{$kategori}' WHERE id_barang='{$id}'";

    $result = $db->query($sql);

    if (!$result) {
        die('Error: ' . $db->getError());
    } else {
        header('location: index.php');
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'";
$result = $db->query($sql);
if (!$result) {
    die('Error: Data tidak tersedia');
}
$data = mysqli_fetch_array($result);

$db->closeConnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ubah Barang</title>

</head>
<body>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 500px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

h1 {
    text-align: center;
    color: rgb(130, 168, 132);
}

.main {
    margin-top: 20px;
}

.input {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input, select {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.submit {
    text-align: center;
}

input[type="submit"] {
    background-color: rgb(90, 112, 87);
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="file"] {
    padding: 10px 0;
}
input[type="submit"]:hover{
    background-color: darkseagreen;
    transform: scale(0.98);
}
</style>
    <div class="container">
        <h1>Ubah Barang</h1>
        <div class="main">
            <form method="post" action="ubah.php" enctype="multipart/form-data">
                <div class="input">
                    <label>Nama Barang</label>
                    <input type="text" name="nama" value="<?php echo $data['nama'];?>" />
                </div>
                <div class="input">
                    <label>Kategori</label>
                    <select name="kategori">
                        <?php
                            $options = [
                                'Komputer' => 'Komputer',
                                'Elektronik' => 'Elektronik',
                                'Hand Phone' => 'Hand Phone'
                            ];
                            echo FormLibrary::generateUbah($data['kategori'], $options);
                        ?>
                    </select>
                </div>
                <!-- Sisanya tetap di sini -->
                <div class="submit">
                    <input type="hidden" name="id" value="<?php echo $data['id_barang'];?>" />
                    <input type="submit" name="submit" value="Simpan" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>