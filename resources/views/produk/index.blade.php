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

    <div style="padding:20px"> 
        <h1>Product</h1>
  <table>
      <tr>
          <td>
              ID
          </td>
          <td>
              Nama barang
          </td>
          <td>
              Harga
          </td>
          <td>
              Stok
          </td>
          <td>
              Admin ID
          </td>
          <td>
              Created At
          </td>
          <td style="text-align: center">
                Aksi
          </td>
      </tr>
      @foreach($produk as $p)
        <tr>
            <td>{{ $p->id_produk }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->harga }}</td>
            <td>{{ $p->persediaan }}</td>
            <td>{{ $p->admin_id }}</td>
            <td>{{ $p->created_at }}</td>
            <td><a href="/produk/edit/{{ $p->id_produk }}"><button class="dashboard">Edit</button></a> <a href="/produk/hapus/{{ $p->id_produk }}"><button class="dashboard">Hapus</button></a></td>
        </tr>
        @endforeach
  </table>
  <br>
    <a href="/produk/tambah"><button class="dashboard">Tambah</button></a>
</div>

<footer class="site-footer">
    <p class="copyright-text"> 1 + 1 = 1</p>
</footer>
</body>
</html>