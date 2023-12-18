<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 10</title>
<style>
body {
    font-family: Tahoma, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
  }
  
  .container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    
    display: grid;
    justify-content: center;
    border-radius: 20px;
  }

  h2 {
    text-align: center;
  }
  
  nav {
      background: #8ec3a5;
      margin: 0;
      padding: 8px;
  }
  
  a{
      text-decoration: none;
      padding: 5px;
      color:whitesmoke;
      background-color: #7cab92;
      border-radius: 10px;
  }
  
  table {
    border-collapse: collapse;
    margin-top: 20px;
  }
  
  th,
  td {
    border: 1px black solid;
    padding: 7px;
  }
  
  img {
    width: 100px;
  }
  
  .about-img img {
    width: 200px;
    border-radius: 50%;
  }
  
  .tambah, .hapus, .ubah{
    text-decoration: none;
    background-color:#80aba1;
    margin: 2px;
    color: #fff;
    border-radius: 5px;
    padding: 5px;
    font-size: 15px;
  }
  
  a:hover {
    background-color: whitesmoke;
    transform: scale(0.98);
    color: black;
  }
  
  nav a:hover {
    border-radius: 5px;
    padding: 10px;
  }
  
  footer {
      margin-top: 20px;
      border-radius: 20px;
      padding: 5 50px;
      color: #D3D3D3;
  }
  
  h1 {
      background:  #89b2a4;
      margin-bottom: 0;
      padding: 10px;
      color: #fff;
      border-radius: 10px 10px 0 0;
  }
  
  .modular-list, .modular{
    text-align: left;
  }
  
  .about-image img {
    width: 100px;
    height: 150px;
    border-radius: 200%;
}
.contact-content {
    display: flex;
    justify-content: space-around;
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
}

.contact-form h2, p{
    text-align: center;
}

.contact-form input, .contact-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #cccccc;
    border-radius: 5px;
}

.contact-form button {
    background-color: #98b3a0;;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.contact-form button:hover {
    background-color: #4a4949;
}
    </style>
</head>
<body>
    <div id="container">
        <header>
            <h1>Modularisasi</h1>
        </header>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="kontak.php">Contact</a>
        </nav>