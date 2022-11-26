<?php

$OldDate = new DateTime('2022-11-27');
$now = new DateTime();
print_r($OldDate->diff($now));

echo $now->format("M-d-Y");

// SELECT * FROM ohana_appointments a JOIN ohana_account b 
// WHERE 
// 	DAY(a.appointment_start) = DAY(CURRENT_DATE + 3)
// AND a.appointment_status = "PENDING"
// AND a.account_id = b.account_id;