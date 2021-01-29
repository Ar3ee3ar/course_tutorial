<?php
session_start();
    $search = $_GET["search"];
require '../connect.php';
$m_username = $_SESSION["m_username"];
$meSql = 'SELECT * FROM `history`
JOIN subject
ON history.ID_sub = subject.ID_sub
JOIN status
ON history.ID_status = status.ID_status WHERE m_username="'.$m_username.'"AND sub_name LIKE \'%'.$search.'%\'ORDER BY ID_history DESC';

$meQuery = mysqli_query($conn,$meSql);
echo'<table class="table" id="his_table">
                    <thead class="thead-dark">
                        <tr>
                          <th>ตำสั่งซื้อที่</th>
                          <th>วันที่</th>
                          <th>หมวดหมู่</th>
                          <th>ชื่อวิชา</th>
                          <th>เวลา (ชั่วโมง)</th>
                          <th>ราคา (บาท)</th>
                          <th>สถานะ</th>
                          <th>&nbsp</th>
                        </tr>
                      </thead>
                      <tbody>';                 
                        while ($meResult = mysqli_fetch_array($meQuery)){
                          $monthNamesThai = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม");
                          $splitTimeStamp = explode(" ",$meResult["history_date"]);
                          $date_a = $splitTimeStamp[0];
                          $time_a = $splitTimeStamp[1];
                          $date = explode("-",$date_a);
                          echo '<tr>
                          <td>'.$meResult["ID_history"].'
                          <td>'.intval($date[2])." ".$monthNamesThai[$date[1]-1]." ".($date[0]+543).'</td>
                          <td>'.$meResult["cat_name"].'</td>
                          <td>'.$meResult["sub_name"].'</td>
                          <td>'.$meResult["sub_hour"].'</td>
                          <td>'.$meResult["sub_price"].'</td>
                          <td>'.$meResult["status_name"].'</td>';
                          if($meResult["ID_status"]!=3){
                            echo '<td>
                            <a href=\'#\' onclick=\'confirmCancel("'.$meResult["ID_history"].'")\'>
                            <button class="btn btn-danger" style="border-radius: 20px;"><i class="fas fa-trash"></i> ยกเลิก</button>
                            </a>
                                        </td>';
                          }
                          else{
                            echo '<td>&nbsp</td>';
                          }
                        echo '</tr>';
                        }
                    echo'</tbody>
                </table>';
?>