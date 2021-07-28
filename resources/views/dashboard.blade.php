<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
header('Location: /admin/login');
die();
}
?>
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

    <div class="main">
        <div style="width: 100%;">
            <div class="kiri">
                <h1>Product</h1>
                <table>
                    <tr>
                        <form action="/produk/cari" method="post">
                            {{ csrf_field() }}
                            <td><input class="cari" type="text" name="cari" placeholder="Cari nama produk"></td>
                            <td><input class="submitcari" type="submit" value="Cari"></td>
                        </form>
                    </tr>
                </table>
                <table class="tampil">
                    <tr class="tampil">
                        <th class="tampil">
                            ID Produk
                        </th>
                        <th class="tampil">
                            Nama Produk
                        </th>
                        <th class="tampil">
                            Harga Satuan
                        </th>
                        <th class="tampil">
                            Stok
                        </th>
                        <th class="tampil">
                            Admin_id
                        </th>
                        <th class="tampil">
                            Qty
                        </th>
                    </tr>
                    @foreach ($produk as $p)
                        <tr class="tampil">
                            <td class="tampil">{{ $p->id_produk }}</td>
                            <td class="tampil">{{ $p->nama }}</td>
                            <td class="tampil">{{ $p->harga }}</td>
                            <td class="tampil">{{ $p->persediaan }}</td>
                            <td class="tampil">{{ $p->admin_id }}</td>
                            <form action="/keranjang/tambah/{{ $p->id_produk }}" method="post">
                                {{ csrf_field() }}
                                <td><input type="number" name="qty" style="width: 60px;"></td>
                                <td><input class="tambahkan" type="submit" value="Tambahkan"></td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="kanan">
                <h1> Cart </h1>
                <?php if (isset($_SESSION['keranjang'])) {
                echo "<div class='bordercart'>";
                    echo '<table>';
                        echo "<tr style=\"text-align: right;\">";
                            echo '<th>Nama Produk</th>';
                            echo '<th>Harga</th>';
                            echo '<th>Qty</th>';
                            echo '<th>Subtotal</th>';
                            echo '</tr>';
                        $keranjang = $_SESSION['keranjang'];
                        $total = 0;
                        foreach ($keranjang as $item) {
                        echo "<tr style=\"text-align: right;\">";
                            echo '<td>' . $item['nama'] . '</td>';
                            echo '<td>' . $item['harga'] . '</td>';
                            echo '<td>' . $item['qty'] . '</td>';
                            echo '<td>' . $item['subtotal'] . '</td>';
                            echo '</tr>';
                        $total += $item['subtotal'];
                        }
                        echo '<tr></tr>';
                        echo "<tr style=\"text-align: right;\">
                            <td colspan=\"3\" style=\"text-align: right;\">Total :</td>";
                            echo '<td>' . $total . '</td>
                        <tr>';
                            echo "
                        <tr style=\"text-align: right;\">";
                            echo "<form action=\"/keranjang/checkout/" . $total . "\" method=\"post\">";
                                echo csrf_field();
                                echo '<td></td>';
                                echo '<td></td>';
                                echo "<td><input type=\"number\" name=\"bayar\" placeholder=\"Uang bayar\"
                                        style=\"width: 150px;\"></td>";
                                echo "<td><input class='checkout' type=\"submit\" value=\"Checkout\"></td>";
                                echo '</form>';
                            echo '</tr>';
                        echo '
                    </table>';
                    echo '</div>';
                } ?>
            </div>
        </div>
    </div>

    <footer class="site-footer">
        <p class="copyright-text"> 1 + 1 = 1</p>
    </footer>
</body>

</html>
