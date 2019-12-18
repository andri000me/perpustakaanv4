<?php

function options($name)
{
    $ci = get_instance();
    $ci->db->select('*');
    $ci->db->from('options');
    $ci->db->where('name', $name);
    return $ci->db->get()->row()->value;
}

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('login');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function is_siswa_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('noformulir')) {
        redirect('loginppdb');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect('authppdb/blocked');
        }
    }
}

function is_guru_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('nip')) {
        redirect('loginguru');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect('authguru/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }

    /* atau dalam 1 query
    $ci->db->get_where('user_acces_menu',[
        'role_id'=>$role_id,
        'menu_id'=>$menu_id
    ]);
    */
}

function check_access_sub($role_id, $submenu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('submenu_id', $submenu_id);
    $result = $ci->db->get('user_access_submenu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function check_websetting($name)
{
    $ci = get_instance();
    $ci->db->where('is_active', '1');
    $ci->db->where('name', $name);
    $result = $ci->db->get('options');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }

    /* atau dalam 1 query
    $ci->db->get_where('user_acces_menu',[
        'role_id'=>$role_id,
        'menu_id'=>$menu_id
    ]);
    */
}

function is_registered_active()
{
    $ci = get_instance();
    $userRegistered = $ci->db->get_where('options', [
        'name' => 'signup_member',
        'value' => '1'
    ]);
    if ($userRegistered->num_rows() < 1) {
        redirect('auth/blocked');
    }
}
function is_forgotpassword_active()
{
    $ci = get_instance();
    $userRegistered = $ci->db->get_where('options', [
        'name' => 'forgot_password',
        'value' => '1'
    ]);
    if ($userRegistered->num_rows() < 1) {
        redirect('auth/blocked');
    }
}

function slug($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    // trim
    $text = trim($text, '-');
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

if (!function_exists('nominal')) {
    function nominal($angka)
    {
        $jd = number_format($angka, 0, ',', '.');
        return $jd;
    }
}

function getjumlahbiaya($id)
{
    $ci = get_instance();
    $ci->db->select('sum(nominal) as jumlah');
    $ci->db->from('m_jalur_biaya');
    $ci->db->where('gelombangjalur_id', $id);
    return $ci->db->get()->row()->jumlah;
}

function getdefault($id)
{
    $ci = get_instance();
    $ci->db->select('value as value');
    $ci->db->from('m_options');
    $ci->db->where('name', $id);
    return $ci->db->get()->row()->value;
}

function getjumlahbiayasiswa($siswa_id, $jenis, $is_paid = 'all')
{
    $ci = get_instance();
    $ci->db->select('sum(nominal) as jumlah');
    $ci->db->from('siswa_keuangan');
    $ci->db->where('siswa_id', $siswa_id);
    $ci->db->where('jenis', $jenis);
    if ($is_paid == 'paid') {
        $ci->db->where('is_paid', '1');
    }
    if ($is_paid == 'unpaid') {
        $ci->db->where('is_paid', '0');
    }
    return $ci->db->get()->row()->jumlah;
}

function getfieldtable($table, $field, $id)
{
    $ci = get_instance();
    $ci->db->select($field);
    $ci->db->from($table);
    $ci->db->where('id', $id);
    return $ci->db->get()->row()->$field;
}

function kekata($x)
{
    $x = abs($x);
    $angka = array(
        "", "satu", "dua", "tiga", "empat", "lima",
        "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"
    );
    $temp = "";
    if ($x < 12) {
        $temp = " " . $angka[$x];
    } else if ($x < 20) {
        $temp = kekata($x - 10) . " belas";
    } else if ($x < 100) {
        $temp = kekata($x / 10) . " puluh" . kekata($x % 10);
    } else if ($x < 200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x < 1000) {
        $temp = kekata($x / 100) . " ratus" . kekata($x % 100);
    } else if ($x < 2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x < 1000000) {
        $temp = kekata($x / 1000) . " ribu" . kekata($x % 1000);
    } else if ($x < 1000000000) {
        $temp = kekata($x / 1000000) . " juta" . kekata($x % 1000000);
    } else if ($x < 1000000000000) {
        $temp = kekata($x / 1000000000) . " milyar" . kekata(fmod($x, 1000000000));
    } else if ($x < 1000000000000000) {
        $temp = kekata($x / 1000000000000) . " trilyun" . kekata(fmod($x, 1000000000000));
    }
    return $temp;
}

function terbilang($x, $style = 4)
{
    if ($x < 0) {
        $hasil = "minus " . trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }
    return $hasil;
}

function getsettingsppsiswa($siswa_id)
{
    $ci = get_instance();
    $ci->db->select('nominal as jumlah');
    $ci->db->from('siswa_spp');
    $ci->db->where('siswa_id', $siswa_id);
    return $ci->db->get()->row()->jumlah;
}

function getbulanindo($n)
{
    $blnn = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $bulanindo = $blnn[$n];
    return $bulanindo;
}

function gettanggalindo($tgl)
{
    if ($tgl <> '0000-00-00') {
        $tanggalindo = date('d-m-Y', strtotime($tgl));
    } else {
        $tanggalindo = '';
    }
    return $tanggalindo;
}

function gettanggalindo2($tgl)
{
    if ($tgl <> '0000-00-00') {
        $tanggalindo = date('d/m/Y', strtotime($tgl));
    } else {
        $tanggalindo = '';
    }
    return $tanggalindo;
}

function getfieldtable2($field, $table, $primary, $idkey)
{
    $ci = get_instance();
    $ci->db->select("$field as nama");
    $ci->db->from("$table");
    $ci->db->where("$primary", $idkey);
    return $ci->db->get()->row()->nama;
}

function get_namakelas($kelas_id)
{
    $ci = get_instance();
    $ci->db->select('nama_kelas as value');
    $ci->db->from('m_kelas');
    $ci->db->where('id', $kelas_id);
    return $ci->db->get()->row()->value;
}

function get_umur($tanggal_lahir)
{
    $biday = new DateTime($tanggal_lahir);
    $today = new DateTime();

    $diff = $today->diff($biday);
    $umur = $diff->y;
    return $umur;
}
function get_eksemplarbuku($buku_id)
{
$ci = get_instance();
$jumbuku = $ci->db->get_where('pp_item',['buku_id' => $buku_id]);
return $jumbuku->num_rows();
}

function get_eksemplarbuku_kla($groupby,$kla_id)
{
$ci = get_instance();
$ci->db->select('count(pp_item.item_kode) as value');
$ci->db->from('pp_item');
$ci->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
if($groupby=='klasifikasi'){
$ci->db->where('pp_buku.klasifikasi',$kla_id);
}elseif($groupby=='gmd_id'){
$ci->db->where('pp_buku.gmd_id',$kla_id);
}elseif($groupby=='tipekoleksi_id'){
$ci->db->where('pp_buku.tipeisi_id',$kla_id);
}elseif($groupby=='bahasa_id'){
$ci->db->where('pp_buku.bahasa_id',$kla_id);
}

return $ci->db->get()->row()->value;

}

function get_penggunaankoleksi($item_kode,$tahun,$bulan)
{
$ci = get_instance();
$ci->db->select('count(pp_loan.item_kode) as value');
$ci->db->from('pp_loan');
$ci->db->where('pp_loan.item_kode',$item_kode);
$ci->db->where("DATE_FORMAT(pp_loan.loan_date,'%Y')", $tahun);
$ci->db->where("DATE_FORMAT(pp_loan.loan_date,'%m')", $bulan);
return $ci->db->get()->row()->value;
}

function get_statistikpengunjung($member_type_id,$tahun,$bulan)
{
$ci = get_instance();
$ci->db->select('count(visitor_count.member_id) as value');
$ci->db->from('visitor_count');
$ci->db->join('pp_member', 'pp_member.member_id = visitor_count.member_id');
$ci->db->where('pp_member.member_type_id',$member_type_id);
$ci->db->where("DATE_FORMAT(visitor_count.checkin_date,'%Y')", $tahun);
$ci->db->where("DATE_FORMAT(visitor_count.checkin_date,'%m')", $bulan);
return $ci->db->get()->row()->value;
}

function getnamabulanshort($urut)
{
$ci = get_instance();
$ci->db->select('(pp_bulan.namashort) as value');
$ci->db->from('pp_bulan');
$ci->db->where('pp_bulan.urut',$urut);
return $ci->db->get()->row()->value;
}

function draw_calendar_pengunjung($month,$year){

	// Draw table for Calendar 
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	// Draw Calendar table headings 
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	//days and weeks variable for now ... 
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	// row for week one 
	$calendar.= '<tr class="calendar-row">';

	// Display "blank" days until the first of the current week 
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
		$days_in_this_week++;
	endfor;

	// Show days.... 
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		if($list_day==date('d') && $month==date('n'))
		{
			$currentday='';
		}else
		{
			$currentday='';
		}
		$calendar.= '<td class="calendar-day '.$currentday.'">';
		
			// Add in the day number
			if($list_day<date('d') && $month==date('n'))
			{
				$showtoday=$list_day;
			}else
			{
				$showtoday=$list_day;
            }

$ci = get_instance();
$ci->db->select('count(visitor_count.id) as value');
$ci->db->from('visitor_count');
$ci->db->where("DATE_FORMAT(visitor_count.checkin_date,'%Y')", $year);
$ci->db->where("DATE_FORMAT(visitor_count.checkin_date,'%m')", $month);
$ci->db->where("DATE_FORMAT(visitor_count.checkin_date,'%d')", $showtoday);
$jumlahpengunjung = $ci->db->get()->row()->value;

            if($jumlahpengunjung<'1'){
                $jumlahpengunjung='&nbsp;';
            }else{
                $jumlahpengunjung = "<i>$jumlahpengunjung</i>";
            }
			$calendar.= '<div class="day-number">'.$showtoday.'<br>'.$jumlahpengunjung.'</div>';

		// Draw table end
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	// Finish the rest of the days in the week
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
		endfor;
	endif;

	// Draw table final row
	$calendar.= '</tr>';

	// Draw table end the table 
	$calendar.= '</table>';
	
	// Finally all done, return result 
	return $calendar;
}

function cek_statuseksemplar($item_kode)
{
$ci = get_instance();
$ci->db->select('(pp_loan.is_return) as value');
$ci->db->from('pp_loan');
$ci->db->where('pp_loan.item_kode',$item_kode);
return $ci->db->get()->row()->value;
}
function cek_tglkembalieksemplar($item_kode)
{
$ci = get_instance();
$ci->db->select('(pp_loan.due_date) as value');
$ci->db->from('pp_loan');
$ci->db->where('pp_loan.item_kode',$item_kode);
return $ci->db->get()->row()->value;
}
