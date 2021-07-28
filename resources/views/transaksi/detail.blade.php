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
        <h3>Transaksi {{ $id_transaksi }}</h3>
  <table>
      <tr>
          <td>
              ID
          </td>
          <td>
              Nama
          </td>
          <td>
              Harga
          </td>
          <td>
              Qty
          </td>
          <td>
              Subtotal
          </td>
      </tr>
      @foreach($transaksi_produk as $t)
        <tr style="text-align: right;">
            <td>{{ $t->id_produk }}</td>
            <td>{{ $t->nama }}</td>
            <td>{{ $t->harga }}</td>
            <td>{{ $t->qty }}</td>
            <td>{{ $t->subtotal }}</td>
        </tr>
        @endforeach
        <tr style="text-align: right;">
            <td colspan="3"></td>
            <td>Total :</td>
            <td>{{ $total }}</td>
        </tr>
        <tr style="text-align: right;">
            <td colspan="3"></td>
            <td>Bayar :</td>
            <td>{{ $bayar }}</td>
        </tr>
        <tr>
            <td colspan="5"><hr></td>
        </tr>
        <tr style="text-align: right;">
            <td colspan="3"></td>
            <td>Kembalian :</td>
            <td>{{ $bayar - $total }}</td>
        </tr>
        <tr>
            <td colspan="5"><hr></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td><a href="/dashboard"><button class="dashboard">Dashboard</button></a></td>
        </tr>
  </table>
</div>

<footer class="site-footer">
    <p class="copyright-text"> 1 + 1 = 1</p>
</footer>
</body>
</html>