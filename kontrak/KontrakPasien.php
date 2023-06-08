<?php

interface KontrakPasienView
{
    public function tampil();
    public function tampilForm();
    public function updateForm($edit);
    public function delete($id);
    public function add($data);
    public function edit($data);
    // public function dele
}

interface KontrakPasienPresenter
{
    public function prosesDataPasien();
    public function deleteDataPasien($id);
    public function addDataPasien($data);
    public function editDataPasien($data);
    public function getId($i);
    public function getNik($i);
    public function getNama($i);
    public function getTempat($i);
    public function getTl($i);
    public function getGender($i);
    public function getEmail($i);
    public function getTelp($i);
    public function getSize();
}
