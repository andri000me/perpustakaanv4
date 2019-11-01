    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Profile') ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">FRATERAN</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- MANAJEMEN MENU -->
      <?php

      //echo $this->Menu->show_hello_world();

      if ($this->session->userdata('kr_jabatan_id') == 1 && $this->session->userdata('kr_jabatan_id')) {
        //Administrator atau Super Admin
        echo '<div class="sidebar-heading">Administrator</div>
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Master</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Master:</h6>
                  <a class="collapse-item" href=' . base_url('Sekolah_CRUD') . '>School</a>
                  <a class="collapse-item" href=' . base_url('Tahun_CRUD') . '>Year</a>
                </div>
              </div>
            </li>

            <hr class="sidebar-divider">';
      } elseif ($this->session->userdata('kr_jabatan_id') == 2 && $this->session->userdata('kr_jabatan_id')) {
        //jika dia karyawan
        echo '<div class="sidebar-heading">
              Employee
            </div>

            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Master</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Master</h6>
                  <a class="collapse-item" href=""></a>
                  <a class="collapse-item" href=""></a>
                </div>
              </div>
            </li>

            <hr class="sidebar-divider d-none d-md-block">';
      } elseif ($this->session->userdata('kr_jabatan_id') == 4 && $this->session->userdata('kr_jabatan_id')) {
        //jika dia wakakur
        echo '<div class="sidebar-heading">
              Wakakur
            </div>

            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Master</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Master</h6>
                  <a class="collapse-item" href=' . base_url('Sekolah_CRUD') . '>1. Sekolah</a>
                  <a class="collapse-item" href=' . base_url('Karyawan_CRUD') . '>2. Guru</a>
                  <a class="collapse-item" href=' . base_url('Siswa_CRUD') . '>3. Siswa</a>
                  <a class="collapse-item" href=' . base_url('Mapel_CRUD') . '>4. Mapel</a>
                  <a class="collapse-item" href=' . base_url('Topik_CRUD') . '>5. Kompetensi Dasar</a>
                  <a class="collapse-item" href=' . base_url('Kelas_CRUD') . '>6. Kelas</a>
                  <a class="collapse-item" href=' . base_url('SSP_CRUD') . '>7. Ekskul</a>
                </div>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-book"></i>
                <span>Nilai</span>
              </a>
              <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Nilai</h6>
                  <a class="collapse-item" href=' . base_url('Tes_CRUD') . '>1. Harian</a>
                  <a class="collapse-item" href=' . base_url('Uj_CRUD') . '>2. PTS & PAS</a>
                </div>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-book"></i>
                <span>Raport</span>
              </a>
              <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Print</h6>
                  <a class="collapse-item" href=' . base_url('Report_CRUD') . '>Raport</a>
                </div>
              </div>
            </li>

            <hr class="sidebar-divider d-none d-md-block">';
      }elseif ($this->session->userdata('kr_jabatan_id') == 7 && $this->session->userdata('kr_jabatan_id')) {
        //jika dia Guru
        echo '
            <div class="sidebar-heading">
              Guru
            </div>
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-book"></i>
                <span>Mapel</span>
              </a>
              <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Nilai</h6>
                  <a class="collapse-item" href=' . base_url('Tes_CRUD') . '>1. Harian</a>
                  <a class="collapse-item" href=' . base_url('Uj_CRUD') . '>2. PTS & PAS</a>
                  <a class="collapse-item" href=' . base_url('sosaf_CRUD') . '>3. Sosial</a>
                  <a class="collapse-item" href=' . base_url('spraf_CRUD') . '>4. Spiritual</a>
                  <a class="collapse-item" href=' . base_url('Laporan_CRUD') . '>5. Laporan</a>
                </div>
              </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">';


        if (walkel_menu() >= 1) {
          echo ' <div class="sidebar-heading">
                    Wali Kelas
                  </div>
                  <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapseTwo">
                      <i class="fas fa-fw fa-comment"></i>
                      <span>Siswa</span>
                    </a>
                    <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Set</h6>
                        <a class="collapse-item" href=' . base_url('Komen_CRUD') . '>Komentar</a>
                      </div>
                    </div>
                  </li>
                  <hr class="sidebar-divider d-none d-md-block">
            ';
        }

        if (ssp_menu() >= 1) {
          echo ' <div class="sidebar-heading">
                    Ekstra
                  </div>
                  <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapseTwo">
                      <i class="fas fa-fw fa-basketball-ball"></i>
                      <span>Ekskul</span>
                    </a>
                    <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ekskul</h6>
                        <a class="collapse-item" href=' . base_url('SSP_grade_CRUD/pendaftaran_index') . '>1. Pendaftaran</a>
                        <a class="collapse-item" href=' . base_url('SSP_grade_CRUD') . '>2. Nilai</a>
                      </div>
                    </div>
                  </li>
                  <hr class="sidebar-divider d-none d-md-block">
            ';
        }
        if (scout_menu() >= 1) {
          echo ' <div class="sidebar-heading">
                    Pramuka
                  </div>
                  <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse55" aria-expanded="true" aria-controls="collapseTwo">
                      <i class="fas fa-fw fa-male"></i>
                      <span>Pramuka</span>
                    </a>
                    <div id="collapse55" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Input</h6>
                        <a class="collapse-item" href=' . base_url('Scout_CRUD') . '>Nilai</a>
                      </div>
                    </div>
                  </li>
                  <hr class="sidebar-divider d-none d-md-block">
            ';
        }
      }
      ?>



      <!-- Divider -->

      <!-- Heading -->


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
