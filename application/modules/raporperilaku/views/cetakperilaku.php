<div class="container d-flex justify-content-center">


  <div class="card o-hidden border-0 shadow-lg my-5 text">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5 overflow-auto" style='width: 850px;'>
            <div id="print_area">
          
              <hr style="height:5px; visibility:hidden;" />
              <img src="<?= base_url('assets/img/profile/fratbw.png') ?>" height="100" style='position: absolute; z-index: 100; border-radius: 0%;'>
              <table class="center">
                <tbody>
                  <tr style='text-align: center;'>
                    <td style='text-align: center;'>
                    <div style='font-family: "Times New Roman", Times, serif; font-size:23px;'>
                      <b>SMA KATOLIK FRATERAN<br>
                      TERAKREDITASI "A"<br></b>
                    </div>
                    <div style='font-family: "Times New Roman", Times, serif; font-size:14px;'>
                    NSS: 304056007016 - NPSN : 20532131<br>
                    Jl. Kepanjen No. 8, Telp/Fax. 031 3524901/031 3528821<br>
                    Email: smak@frateran.sch.id | Website: http://frateran.sch.id</td>
                    </div>
                  </tr>
                </tbody>
              </table>
             
              <div style='font-family: "Times New Roman", Times, serif; font-size:20px; margin-bottom: 26px; margin-top: 24px; text-align:center;'><b>LAPORAN HASIL BELAJAR TENGAH SEMESTER</b></div>

                <table class="rapot_atas">
                  <tbody>
                    <tr>
                      <td style='width: 120px;'>Nama Peserta Didik &nbsp</td>
                      <td>: <?= ucwords() ?></td>
                      <td style='width: 100px;'>Kelas</td>
                      <td>: <?= $siswa[0]['kelas_nama'] ?></td>
                    </tr>
                    <tr>
                      <td>Nomor Induk/NISN &nbsp</td>
                      <td>: </td>
                      <td>Periode</td>
                      <td>: <?php if($semester==1)echo "Semester Ganjil";else echo "Semester Genap"; ?></td>
                    </tr>
                    <tr>
                      <td>Nama Sekolah</td>
                      <td>: </td>
                      <td>Tahun Pelajaran</td>
                      <td>: </td>
                    </tr>
                  </tbody>
                </table>

              <div style='clear: both;'></div>

             





              <div style='clear: both;'></div>
              <div id='textbox'>
                <p class='alignleft_bawah'>
                <br><br>
                Orang Tua/Wali<br><br><br><br>
                (............................................)
                </p>
                <p class='alignright_bawah'>
                <br>Surabaya, <?= $tanggal.' '.$bulan.' '.$tahun ?><br>
                Wali Kelas<br><br><br><br>
                <b>()</b><br>
                </p>
              </div>

            <div style='clear: both;'></div>

            <p style="page-break-after: always;">&nbsp;</p>


            </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
