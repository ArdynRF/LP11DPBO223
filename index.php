<?php

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilPasien.php");


$tpp = new TampilPasien();
// $tpf = new TampilForm();
// jika ada hapus
if (isset($_GET['id_hapus'])) {
    $tpp->delete($_GET['id_hapus']);
}

// jika ada add
else if (isset($_POST['add'])) {
    $tpp->add($_POST);
} else if (isset($_POST['update'])) {
    $id = $_GET['id'];
    // var_dump($_POST);
    // var_dump($id);
    // die;
    $tpp->edit($_POST, $id);
}
// jika ada update
else if (isset($_GET['id_edit'])) {
    $edit = $_GET['id_edit'];
    // $ID = $ID - 1;
    $tpp->updateForm($edit);
} else if (isset($_GET['flag'])) {
    $tpp->tampilForm();
}
// tampil
else {
    $tpp->tampil();
}
