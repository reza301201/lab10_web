# Lab10web

Nama : Reza Kurniawan

NIM  : 312210436

Kelas : TI.22.A1

## DAFTAR ISI <br>
| No | Description | Link |
|-----|------|-----|
|1|Instruksi Praktikum|[Click Here](#instruksi-praktikum)|
|2|Langkah-langkah Praktikum|[Click Here](#langkah-langkah-praktikum)|
|3|Pertanyaan dan Tugas|[Click Here](#pertanyaan-dan-tugas)|

## Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buat folder baru dengan nama `lab10_php_oop` pada docroot webserver (htdocs).
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.

## Langkah-langkah Praktikum
1. Buat file php baru dengan nama `mobil.php`
```
<?php
/**
 * Program sederhana pendefinisian class dan pemanggilan class.
 */

 class Mobil
 {
    private $warna;
    private $merk;
    private $harga;

    public function __construct()
    {
        $this->warna = "Biru";
        $this->merk = "BMW";
        $this->harga = "10000000";
    }

    public function gantiWarna ($warnaBaru)
    {
        $this->warna = $warnaBaru;
    }

    public function tampilWarna ()
    {
        echo "Warna mobilnya : ". $this->warna;
    }
 }

 // membuat objek mobil
 $a = new Mobil();
 $b = new Mobil();

 // memanggil objek
 echo "<b>Mobil pertama</b><br>";
 $a->tampilWarna();
 echo "<br>Mobil pertama ganti warna<br>";
 $a->gantiWarna("Merah");
 $a->tampilWarna();


 // memanggil objek
 echo "<br><b>Mobil kedua</b><br>";
 $b->gantiWarna("Hijau");
 $b->tampilWarna();
 ?>
```
> Output :
![Screenshot (80)](https://github.com/reza301201/lab10_web/assets/116234001/0bd0eb23-9cc3-4d8a-9297-cd143c54e1c7)


- **Class Library**
Class Library merupakan pustaka kode program yang dapat digunakan bersama pada beberapa file yang berbeda (konsep modularisasi). Class library menyimpan fungsi-fungsi atau class object komponen untuk memudahkan dalam proses development aplikasi.

2. Buat file php baru dengan nama `form.php`
```
<?php
/**
 * Nama Class: Form
 * Deskripsi: Class untuk membuat form inputan text sederhana
 */

class Form
{
    private $fields = array();
    private $action;
    private $submit = "Submit Form";
    private $jumField = 0;
    public function __construct($action, $submit)
    {
        $this->action = $action;
        $this->submit = $submit;
    }
    public function displayForm()
    {
        echo "<form action='" . $this->action . "' method='POST'>";
        echo '<table width="100%" border="0">';
        for ($j = 0; $j < count($this->fields); $j++) {
            echo "<tr><td
    align='right'>" . $this->fields[$j]['label'] . "</td>";
            echo "<td><input type='text'
    name='" . $this->fields[$j]['name'] . "'></td></tr>";
        }
        echo "<tr><td colspan='2'>";
        echo "<input type='submit' value='" . $this->submit . "'></td></tr>";
        echo "</table>";
    }

    public function addField($name, $label)
    {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->jumField++;
    }

}
?>
```

3. Buat file php baru dengan nama `form_input.php`
```
<?php
/**
* Program memanfaatkan Program 10.2 untuk membuat form inputan sederhana.
**/
include "form.php";
echo "<html><head><title>Mahasiswa</title></head><body>";
$form = new Form("","Input Form");
$form->addField("txtnim", "Nim");
$form->addField("txtnama", "Nama");
$form->addField("txtalamat", "Alamat");
echo "<h3>Silahkan isi form berikut ini :</h3>";
$form->displayForm();
echo "</body></html>";
?>
```
> Output :
![Screenshot (81)](https://github.com/reza301201/lab10_web/assets/116234001/6373f0e9-3403-4041-9144-b5a9935ff179)


4. Buat file dengan nama `database.php`
```
<?php

class Database
{
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct()
    {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function getConfig()
    {
        include_once("config.php");
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];
    }
    
    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null)
    {
        if ($where) {
            $where = " WHERE " . $where;
        }
        $sql = "SELECT * FROM " . $table . $where;
        $sql = $this->conn->query($sql);
        $sql = $sql->fetch_assoc();
        return $sql;
    }

    public function insert($table, $data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $column[] = $key;
                $value[] = "'{$val}'";
            }
            $columns = implode(",", $column);
            $values = implode(",", $value);
        }
        $sql = "INSERT INTO " . $table . " (" . $columns . ") VALUES (" . $values . ")";
        $sql = $this->conn->query($sql);
        if ($sql == true) {
            return $sql;
        } else {
            return false;
        }
    }

    public function update($table, $data, $where)
    {
        $update_value = "";
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $update_value[] = "$key='{$val}'";
            }
            $update_value = implode(",", $update_value);
        }

        $sql = "UPDATE " . $table . " SET " . $update_value . " WHERE " . $where;
        $sql = $this->conn->query($sql);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }


    public function delete($table, $filter)
    {
        $sql = "DELETE FROM " . $table . " " . $filter;
        $sql = $this->conn->query($sql);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }
}
?>
```

## Pertanyaan dan tugas
1. Membuat file `config.php`
   [config.php](lab10_tugas/config.php)

3. Membuat file `database.php`
   [database.php](lab10_tugas/database.php)

5. Membuat file `formlibrary.php`
   [formlibrary.php](lab10_tugas/formlibrary.php)

7. Konfigurasikan dengan praktikum sebelumnya
   [index.php](lab10_tugas/index.php)
   [tambah.php](lab10_tugas/tambah.php)
   [ubah.php](lab10_tugas/ubah.php)
   [hapus.php](lab10_tugas/hapus.php)

-> **Output Tugas :**

> - `Home.php`
![Screenshot (82)](https://github.com/reza301201/lab10_web/assets/116234001/b904ae60-bc1a-493e-921e-69534c9d4c28)

> - `About.php`
![Screenshot (83)](https://github.com/reza301201/lab10_web/assets/116234001/d1012297-ff04-4219-9aa2-6c59db47824b)


> - `Kontak.php`
![Screenshot (83)](https://github.com/reza301201/lab10_web/assets/116234001/6747ad7d-df88-4f6a-bc3c-3f0eee129a38)


> - `tambah.php`
![Screenshot (87)](https://github.com/reza301201/lab10_web/assets/116234001/0bbbd4ec-3eda-4372-be3c-a57eba957177)


![Screenshot (88)](https://github.com/reza301201/lab10_web/assets/116234001/53a6788f-5003-4073-9b3b-54ddfa1da853)


> - `ubah.php`
![Screenshot (89)](https://github.com/reza301201/lab10_web/assets/116234001/bec4e84e-f588-4ef7-b138-f274e7ff947f)


![9](https://github.com/syifaaurellia/Lab10web/assets/115867244/f651c042-02a9-4a90-81b4-5e41d0813c94)

> - `hapus.php`
![10](https://github.com/syifaaurellia/Lab10web/assets/115867244/f35526b2-4991-4222-8db6-c932d231f70f)


## Selesai, Terima Kasih
