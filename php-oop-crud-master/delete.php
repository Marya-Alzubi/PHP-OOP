<?php
session_start();
include 'model.php';
$model = new Model();
$id = $_GET['id'];
// echo $id = $_GET['id'];
$delete = $model->delete($id);

if ($delete) {

	$_SESSION['deleted'] = "The record deleted ";
	header("location:records.php");

}
