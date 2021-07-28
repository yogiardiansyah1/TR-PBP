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
<table style="margin-top:50px">
    <form action="/produk/edit/simpan/{{ $produk->id_produk }}" method="post">
        {{ csrf_field() }}
        <tr>
            <td>ID</td>
            <td><input class="id" type="text" name="id_produk" value="{{ $produk->id_produk }}" disabled style="width: 70px"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input class="nama" type="text" name="nama" value="{{ $produk->nama }}" disabled></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input class="nama" type="number" name="harga" value="{{ $produk->harga }}"></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><input class="nama" type="number" name="stok" value="{{ $produk->persediaan }}" style="width: 50px"></td>
        </tr>
        <tr>
            <td>Admin ID</td>
            <td><input class="nama" type="text" name="admin_id" value="{{ $produk->admin_id }}" disabled style="width: 70px"></td>
        </tr>
        <tr>
            <td colspan="2" align="right"><input class="dashboard" type="submit" value="Simpan"></td>
        </tr>
    </form>
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