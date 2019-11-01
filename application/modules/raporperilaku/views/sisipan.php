<div class="container d-flex justify-content-center">


  <div class="card o-hidden border-0 shadow-lg my-5 text">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5 overflow-auto" style='width: 850px;'>
            <div id="print_area">
            <?php

              //var_dump($jumPh);
              //var_dump($jumK);
              for($i=0;$i<count($sis_arr);$i++):
                $nomor = 1;
                $siswa = return_raport_mid($sis_arr[$i], $semester);

                $tanggal_arr = explode('-', $kepsek['sk_mid']);
                $tahun = $tanggal_arr[0];
                $bulan = return_nama_bulan($tanggal_arr[1]);
                $tanggal = $tanggal_arr[2];

                //var_dump($siswa[0]['sis_nama_depan']);

                if(isset($siswa[0]['sis_nama_depan'])):

            ?>
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
              <?php
                  $max_kolom = array();
                  $max_kolomK = array();
                  if($jumPh == 0){
                    foreach($siswa as $z) :
                      $ph_count = count(returnNonZero($z['tes_ph1'],$z['tes_ph2'],$z['tes_ph3'],$z['tes_ph4'],$z['tes_ph5']));
                      array_push($max_kolom,$ph_count);
                    endforeach;
                  }else{
                    array_push($max_kolom,$jumPh);
                  }

                  if($jumK == 0){
                    foreach($siswa as $x) :
                      $k_count = count(returnNonZeroK($x['tes_prak1'],$x['tes_prak2'],$x['tes_prak3'],$x['tes_produk1'],$x['tes_produk2'],$x['tes_produk3'],$x['tes_proyek1'],$x['tes_proyek2'],$x['tes_proyek3'],$x['tes_porto1'],$x['tes_porto2'],$x['tes_porto3']));
                      array_push($max_kolomK,$k_count);
                    endforeach;
                  }else{
                    array_push($max_kolomK,$jumK);
                  }
                  //var_dump(max($max_kolom));
              ?>

              <div style='font-family: "Times New Roman", Times, serif; font-size:20px; margin-bottom: 26px; margin-top: 24px; text-align:center;'><b>LAPORAN HASIL BELAJAR TENGAH SEMESTER</b></div>

                <table class="rapot_atas">
                  <tbody>
                    <tr>
                      <td style='width: 120px;'>Nama Peserta Didik &nbsp</td>
                      <td>: <?= ucwords(strtolower($siswa[0]['sis_nama_depan'].' '.$siswa[0]['sis_nama_bel'])); ?></td>
                      <td style='width: 100px;'>Kelas</td>
                      <td>: <?= $siswa[0]['kelas_nama'] ?></td>
                    </tr>
                    <tr>
                      <td>Nomor Induk/NISN &nbsp</td>
                      <td>: <?= $siswa[0]['sis_no_induk'] ?></td>
                      <td>Periode</td>
                      <td>: <?php if($semester==1)echo "Semester Ganjil";else echo "Semester Genap"; ?></td>
                    </tr>
                    <tr>
                      <td>Nama Sekolah</td>
                      <td>: <?= $siswa[0]['sk_nama'] ?></td>
                      <td>Tahun Pelajaran</td>
                      <td>: <?= $siswa[0]['t_nama'] ?></td>
                    </tr>
                  </tbody>
                </table>

              <div style='clear: both;'></div>

              <div style='margin-top: 15px; font-family: "Times New Roman", Times, serif; font-size:15px;'><b>Kriteria Ketuntasan Minimum (KKM) = 75</b></div>

              <table style='margin-top: 15px;' class='rapot'>
                <thead style='text-align:center; height: 9px;'>
                    <tr>
                        <td rowspan='2' style='width: 25px; padding: 0px 0px 0px 5px;'>No.</td>
                        <td rowspan='2' style='width: 150px; padding: 0px 0px 0px 5px;'>Mata Pelajaran</td>
                        <td colspan='<?= max($max_kolom)+1 ?>' style='width: 60px; padding: 0px 5px 0px 5px;'>Pengetahuan</td>
                        <td colspan='<?= max($max_kolomK)+1 ?>' style='padding: 0px 0px 0px 5px;'>Keterampilan</td>
                    </tr>
                    <tr>
                      <?php
                        for($inph=1; $inph<=max($max_kolom);$inph++){
                          echo"<td>PH".$inph."</td>";
                        }
                      ?>
                      <td>UTS</td>
                      <?php
                        for($inph=1; $inph<=max($max_kolomK);$inph++){
                          echo"<td>PK".$inph."</td>";
                        }
                      ?>
                      <td>UTS</td>
                    </tr>
                </thead>
                <tbody>
                  <?php
                      $t_nama_temp = "";
                      foreach($siswa as $m) :
                        if($t_nama_temp != $m['mapel_kel_nama']){
                          $jumlah_kol = max($max_kolom)+1+max($max_kolomK)+1+2;
                          $tahun_fix = "<tr>
                                          <td style='padding: 0px 0px 0px 5px;' colspan='".$jumlah_kol."'>".$m['mapel_kel_nama']."</td>
                                        </tr>";
                        }else{
                          $tahun_fix = "";
                        }
                  ?>
                  <?= $tahun_fix ?>
                    <tr>
                      <td class='nomor'><?= $nomor ?></td>
                      <td style='padding: 0px 0px 0px 5px; margin: 0px;'><?= $m['mapel_nama'] ?></td>


                      <?php
                        //PENGETAHUAN HARIAN
                        $all_ph = returnNonZero($m['tes_ph1'],$m['tes_ph2'],$m['tes_ph3'],$m['tes_ph4'],$m['tes_ph5']);
                        for($inph=0; $inph<max($max_kolom);$inph++){
                          if(!empty($all_ph[$inph]))
                            echo"<td style='padding: 0px 0px 0px 5px; margin: 0px; text-align:center;'>".$all_ph[$inph]."</td>";
                          else{
                            echo"<td style='padding: 0px 0px 0px 5px; margin: 0px; text-align:center;'>-</td>";
                          }
                        }
                        //UTS Pengetahuan
                        if(!empty($m['uj_mid1_kog']))
                          echo"<td style='padding: 0px 0px 0px 5px; margin: 0px; text-align:center;'>".$m['uj_mid1_kog']."</td>";
                        else{
                          echo"<td style='padding: 0px 0px 0px 5px; margin: 0px; text-align:center;'>-</td>";
                        }

                        //Keterampilan
                        $all_K = returnNonZeroK($m['tes_prak1'],$m['tes_prak2'],$m['tes_prak3'],$m['tes_produk1'],$m['tes_produk2'],$m['tes_produk3'],$m['tes_proyek1'],$m['tes_proyek2'],$m['tes_proyek3'],$m['tes_porto1'],$m['tes_porto2'],$m['tes_porto3']);
                        for($inph=0; $inph<max($max_kolomK);$inph++){
                          if(!empty($all_K[$inph]))
                            echo"<td style='padding: 0px 0px 0px 5px; margin: 0px; text-align:center;'>".$all_K[$inph]."</td>";
                          else{
                            echo"<td style='padding: 0px 0px 0px 5px; margin: 0px; text-align:center;'>-</td>";
                          }
                        }
                        //UTS Keterampilan
                        if(!empty($m['uj_mid1_psi']))
                          echo"<td style='padding: 0px 0px 0px 5px; margin: 0px; text-align:center;'>".$m['uj_mid1_psi']."</td>";
                        else{
                          echo"<td style='padding: 0px 0px 0px 5px; margin: 0px; text-align:center;'>-</td>";
                        }
                      ?>
                    </tr>
                  <?php
                      $nomor++;
                      $t_nama_temp = $m['mapel_kel_nama'];
                    endforeach;?>

                </tbody>
              </table>

              <div style='float: left;'>
                <div style='margin-top: 30px; font-family: "Times New Roman", Times, serif; font-size:12px;'><b>REKAP ABSENSI</b></div>

                <table class="rapot" style='font-family: "Times New Roman", Times, serif; font-size:20px; margin-bottom: 20px; text-align:center; float: left;'>
                  <tbody>
                    <tr style="height:2px;" >
                      <td style='width: 25px; padding: 0px 0px 0px 5px;'>No.</td>
                      <td style='width: 150px; padding: 0px 0px 0px 5px;'>Alasan Ketidakhadiran</td>
                      <td>Lama</td>
                    </tr>
                    <tr style="height:2px;" >
                      <td style='width: 25px;'>1</td>
                      <td style='width: 150px; padding: 0px 0px 0px 5px; text-align:left;'>Sakit</td>
                      <td></td>
                    </tr>
                    <tr style="height:2px;" >
                      <td style='width: 25px;'>2</td>
                      <td style='width: 150px; padding: 0px 0px 0px 5px; text-align:left;'>Izin</td>
                      <td></td>
                    </tr>
                    <tr style="height:2px;" >
                      <td style='width: 25px;'>3</td>
                      <td style='width: 150px; padding: 0px 0px 0px 5px; text-align:left;'>Tanpa Keterangan</td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div style='float: right; width: 60%; height: 50%;'>
                <div style='margin-top: 30px; font-family: "Times New Roman", Times, serif; font-size:12px;'><b>SARAN WALI KELAS:</b></div>
                <table class="rapot" style='font-family: "Times New Roman", Times, serif; font-size:20px; margin-bottom: 20px; margin-right: 20px; text-align:center;'>
                  <tbody>
                    <tr>
                      <td style="height:70px; padding: 0px 5px;" ><?php if($semester==1)echo $siswa[0]['d_s_komen_sis'];else echo $siswa[0]['d_s_komen_sis2']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- <table style="display: inline-block; border: 1px solid; float: left; ">
          		<tr>
          			<td>1-11</td>
          			<td>1-12</td>
          		</tr>
          		<tr>
          			<td>1-21</td>
          			<td>1-22</td>
          		</tr>
          		</table>

          		<table style="display: inline-block; border: 1px solid; float: right;">
          		<tr>
          			<td>2-11</td>
          			<td>2-12</td>
          			<td>2-13</td>
          		</tr>
          		<tr>
          			<td>2-21</td>
          			<td>2-22</td>
          			<td>2-23</td>
          		</tr>
          		<tr>
          			<td>2-31</td>
          			<td>2-32</td>
          			<td>2-33</td>
          		</tr>
          		</table> -->

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
                <b>(<?= $walkel['kr_gelar_depan']." ".ucwords(strtolower($walkel['kr_nama_depan'].' '.$walkel['kr_nama_belakang'])).", ".$walkel['kr_gelar_belakang'] ?>)</b><br>
                </p>
              </div>

            <div style='clear: both;'></div>

            <p style="page-break-after: always;">&nbsp;</p>

            <?php
                endif;
              endfor;
            ?>
            </div>
            <input type="button" name="print_rekap" id="print_rekap" class="btn btn-success" value="Print">
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
