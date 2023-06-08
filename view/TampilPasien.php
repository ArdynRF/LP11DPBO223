<?php


include_once("kontrak/KontrakPasien.php");
include_once("presenter/ProsesPasien.php");

class TampilPasien implements KontrakPasienView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>";

			$data .= "
			<td>
			  <a href='index.php?id_edit=" . $i . "&id=" . $this->prosespasien->getId($i) . "' class='btn btn-warning'>Edit</a>
			  <a href='index.php?id_hapus=" . $this->prosespasien->getId($i) . "' class='btn btn-danger' '>Hapus</a>
			</td>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function tampilForm()
	{
		$nik = '';
		$nama = '';
		$tempat = '';
		$tl = '';
		// $id = '';
		$email = '';
		$telp = '';
		$button = 'add';
		$name = 'Add';

		$this->tpl = new Template("templates/form.html");

		$this->tpl->replace("VAL_NIK", $nik);
		$this->tpl->replace("VAL_NAMA", $nama);
		$this->tpl->replace("VAL_TEMPAT", $tempat);
		$this->tpl->replace("VAL_TL", $tl);
		// $this->tpl->replace("VAL_GENDER", );
		$this->tpl->replace("VAL_EMAIL", $email);
		$this->tpl->replace("VAL_TELP", $telp);
		$this->tpl->replace("STAT_BUTTON", $button);
		$this->tpl->replace("NAME_BUTTON", $name);

		$this->tpl->write();
	}

	function updateForm($edit)
	{

		$this->prosespasien->prosesDataPasien();

		$nik = $this->prosespasien->getNik($edit);
		$nama = $this->prosespasien->getNama($edit);
		$tempat = $this->prosespasien->getTempat($edit);
		$tl =  $this->prosespasien->getTl($edit);
		$id = $this->prosespasien->getId($edit);
		$email = $this->prosespasien->getEmail($edit);
		$telp = $this->prosespasien->getTelp($edit);
		$button = 'update';
		$name = 'Update';

		$this->tpl = new Template("templates/form.html");

		$this->tpl->replace("VAL_NIK", $nik);
		$this->tpl->replace("VAL_NAMA", $nama);
		$this->tpl->replace("VAL_TEMPAT", $tempat);
		$this->tpl->replace("VAL_TL", $tl);
		$this->tpl->replace("VAL_ID", $id);
		$this->tpl->replace("VAL_EMAIL", $email);
		$this->tpl->replace("VAL_TELP", $telp);
		$this->tpl->replace("STAT_BUTTON", $button);
		$this->tpl->replace("NAME_BUTTON", $name);

		// var_dump($id);
		// die;
		$this->tpl->write();
	}

	function delete($id)
	{
		$this->prosespasien->deleteDataPasien($id);
		header("location:index.php");
	}

	function add($data)
	{
		$this->prosespasien->addDataPasien($data);
		header("location:index.php");
	}

	function edit($data)
	{
		$this->prosespasien->editDataPasien($data);
		header("location:index.php");
	}
}
