<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <main class="flex-shrink-0">
        <div class="container">
          <form method="post" action="proses.php">
      <div class="card mt-2">
        <div class="card-header bg-dark text-white">
          Form Pemesanan Paket Wisata
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label for="nama_pemesanan" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_pemesanan" name="nama_pemesanan" placeholder="Masukkan Nama Lengkap Anda" required>
          </div>
          <div class="mb-3">
            <label for="hp_pemesan" class="form-label">Nomor Handphone</label>
            <input type="text" class="form-control" id="hp_pemesan" name="hp_pemesan" placeholder="Masukkan Nomor Handphone Anda" required>
          </div>
          <div class="mb-3">
            <label for="waktu_wisata" class="form-label">Waktu Mulai Perjalanan</label>
            <input type="date" class="form-control" id="waktu_wisata" name="waktu_wisata" placeholder="" required>
          </div>
          <div class="mb-3">
            <label for="hari_wisata" class="form-label">Hari Wisata</label>
            <input type="number" class="form-control" id="hari_wisata" value="1" name="hari_wisata" placeholder="Masukkan jumlah hari" required>
          </div>
          <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="paket_inap" value="1" id="paket_inap">
                <label class="form-check-label" for="paket_inap">
                  Penginapan (Rp. 1.000.000)
                </label>
              </div>
          </div>
          <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="paket_transport" value="1" id="paket_transport">
                <label class="form-check-label" for="paket_transport">
                  Transportasi (Rp. 1.200.000)
                </label>
              </div>
          </div>
          <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="paket_makan" value="1" id="paket_makan">
                <label class="form-check-label" for="paket_makan">
                  Service/ Makan (Rp. 500.000)
                </label>
              </div>
          </div>
          <div class="mb-3">
            <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
            <input type="number" class="form-control" id="jumlah_peserta" value="1" name="jumlah_peserta" placeholder="Jumlah Hari Perjalanan" required>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga Paket</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Paket Perjalanan" readonly>
          </div>
          <div class="mb-3">
            <label for="total" class="form-label">Total Tagihan</label>
            <input type="number" class="form-control" id="total" name="total" placeholder="Total Paket Perjalanan" readonly>
          </div>
        </div>
        <div class="card-footer">
          <input type="submit" class="btn btn-primary" value="Simpan">
          <input type="reset" class="btn btn-danger" value="Ulangi">
        </div>
      </div>
      <script>
      //tentukan konstanta biaya masing-masing
      const paket_inap = 1000000;
      const paket_transport = 1200000;
      const paket_makan = 500000;
      
      function updateTotalCost()
      {
          //inisisi harga paket 0
          let totalCost = 0;
          
          //referensi dari checkbox
          const inapCheckbox = document.getElementById('paket_inap');
          const transportCheckbox = document.getElementById('paket_transport');
          const makanCheckbox = document.getElementById('paket_makan');
          
          //jika inap checkbox ter-check
          if(inapCheckbox.checked)
          {
              totalCost+=paket_inap;
          }
          
          //jika transport checkbox ter-check
          if(transportCheckbox.checked)
          {
              totalCost+=paket_transport;
          }
          
          //jika makan checkbox ter-check
          if(makanCheckbox.checked)
          {
              totalCost+=paket_makan;
          }
          
          document.getElementById('harga').value = totalCost;
      }
      
      function updateTotal()
      {
          let TotalTagihan = 0;
          
          var hari_wisata = document.getElementById('hari_wisata').value;
          var jumlah_peserta = document.getElementById('jumlah_peserta').value;
          var harga = document.getElementById('harga').value;
          
          TotalTagihan = hari_wisata * jumlah_peserta * harga;
          
          document.getElementById('total').value = TotalTagihan;
      }
      
      document.getElementById('paket_inap').addEventListener('change', updateTotalCost);
      document.getElementById('paket_transport').addEventListener('change', updateTotalCost);
      document.getElementById('paket_makan').addEventListener('change', updateTotalCost);
      
      document.getElementById('paket_inap').addEventListener('change', updateTotal);
      document.getElementById('paket_transport').addEventListener('change', updateTotal);
      document.getElementById('paket_makan').addEventListener('change', updateTotal);
      
      document.getElementById('hari_wisata').addEventListener('change', updateTotalCost);
      document.getElementById('jumlah_peserta').addEventListener('change', updateTotalCost);
      
      document.getElementById('hari_wisata').addEventListener('change', updateTotal);
      document.getElementById('jumlah_peserta').addEventListener('change', updateTotal);
      
      updateTotalCost();
      updateTotal();
      </script>  </div>
      </main> 
</body>
</html>