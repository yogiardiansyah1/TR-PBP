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
        <h1>Transaksi</h1>
  <table class="tampil">
      <tr class="tampil">
          <td class="tampil">
              ID Transaksi
          </td>
          <td class="tampil">
              Admin ID
          </td>
          <td class="tampil">
              Bayar
          </td>
          <td class="tampil">
              Total
          </td>
          <td class="tampil">
              Tanggal Pembayaran
          </td>
      </tr>
      @foreach($transaksi as $t)
        <tr class="tampil">
            <td class="tampil"><a href="/transaksi/{{ $t->id_transaksi }}">{{ $t->id_transaksi }}</a></td>
            <td class="tampil">{{ $t->admin_id }}</td>
            <td class="tampil">{{ $t->bayar }}</td>
            <td class="tampil">{{ $t->total }}</td>
            <td class="tampil">{{ $t->created_at }}</td>
        </tr>
        @endforeach
  </table>
</div>

<footer class="site-footer">
    <p class="copyright-text"> 1 + 1 = 1</p>
</footer>
</body>
</html>