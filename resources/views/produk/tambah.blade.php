<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="header">
        <a href="/dashboard" class="logo">1 + 1 = 1</a>
        <div class="header-right">
            <a href="/produk">Produk</a>
            <a href="/transaksi">Transaksi</a>
          <a href="/admin/logout">Logout</a>
        </div>
      </div>

<div style="padding-left:20px">
<center>
<div class="belakang">
    <form action="/produk/tambah/query" method="post">
        {{ csrf_field() }}
<table style="margin-top:50px">
    <tr>
        <td>
            <input class="id" type="text" name="id_produk" placeholder="ID Barang" style="width:100px"> 
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input class="nama" type="text" name="nama" placeholder="Nama Barang"> 
        </td>
    </tr>
    <tr>
        <td>
            <input class="harga" type="text" name="harga" placeholder="Harga">
        </td>
        <td>
            <input class="jumlah" type="text" name="persediaan" placeholder="Qty" style="width:70px"> 
        </td>
    </tr>
    <tr>
        <td align="right" colspan="2">
            <input class="input" type="submit" name="input" value="Input">
        </td>
    </tr>
</table>
</form>
</div>
</center>
</div>
<footer class="site-footer">
    <p class="copyright-text"> 1 + 1 = 1</p>
</footer>
</body>
</html>