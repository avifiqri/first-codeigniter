<div class="container-fluid">
    <h3>inovoice pemesanan pelanggan</h3>
    <table>
        <tr>
            <th>Id Invoice</th>
            <th>Nama pemesanan </th>
            <th>Alamat pemesanan </th>
            <th>Pembayaran </th>
            <th>Batas Payment  </th>
        </tr>
            <?php foreach ($invoice as $inv): ?>
        <tr>
            <td><?= $inv->id ?></td>
            <td><?= $inv->nama ?></td>
            <td><?= $inv->alamat ?></td>
            <td><?= $inv->tgl_pesan ?></td>
            <td><?= $inv->batas_bayar ?></td>
        
        </tr>
            <?php endforeach ?>
    </table>
</div>