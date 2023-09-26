<?php
include 'functions/db.php';
// Initialize counters
$fdas_count = 0;
$cctv_count = 0;
$intercom_count = 0;
$access_control_count = 0;
$car_ramp_count = 0;
$pa_bgm_count = 0;
$time_count = 0;
$thermal_scanner_count = 0;
$wifi_count = 0;
$xray_count = 0;
$bollards_count = 0;
$elevator_access_count = 0;
$turnstile_count = 0;
$walkthrough_count = 0;
$barrier_count = 0;
$catv_count = 0;
$structured_count = 0;

    // Increment counters based on system type
    switch ($row['S_S']) {
        case 'FDAS':
            $fdas_count++;
            break;
        case 'CCTV':
            $cctv_count++;
            break;
        case 'Intercom':
            $intercom_count++;
            break;
        case 'Access Control':
            $access_control_count++;
            break;
        case 'Car Ramp':
            $car_ramp_count++;
            break;
        case 'PA/BGM':
            $pa_bgm_count++;
            break;
        case 'Time':
            $time_count++;
            break;
        case 'Thermal Scanner':
            $thermal_scanner_count++;
            break;
        case 'WiFi':
            $wifi_count++;
            break;
        case 'XRAY':
            $xray_count++;
            break;
        case 'Bollards':
            $bollards_count++;
            break;
        case 'Elevator Access':
            $elevator_access_count++;
            break;
        case 'Turnstile':
            $turnstile_count++;
            break;
        case 'Walkthrough':
            $walkthrough_count++;
            break;
        case 'Barrier':
            $barrier_count++;
            break;
        case 'CATV':
            $catv_count++;
            break;
        case 'Structured':
            $structured_count++;
            break;
        default:
            // Do nothing
    }
    ?>