<?php 

function formatTanggal($date){
 return date('d-m-Y', strtotime($date));
}