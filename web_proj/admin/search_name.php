<?php
session_start();
    $search = $_GET["search"];
require '../connect.php';
$meSql = 'SELECT * FROM member WHERE m_name LIKE \'%'.$search.'%\'';

$meQuery = mysqli_query($conn,$meSql);
echo'<table class="table" id="his_table">
                    <thead class="thead-dark">
                        <tr>
                        <th>username</th>
                          <th>ชื่อ-สกุล</th>
                          <th>&nbsp</th>
                        </tr>
                      </thead>
                      <tbody>';                 
                      while ($meResult = mysqli_fetch_array($meQuery)){
                        echo '<tr>
                          <td>'.$meResult["m_username"].'
                          <td>'.$meResult["m_name"].'</td>';
                            echo '<td>
                            <a href=\'#\' onclick=\'confirmDel("'.$meResult["m_username"].'")\'>
                            <button class="btn btn-danger" style="border-radius: 20px;"><i class="fas fa-trash"></i>ลบสมาชิก</button>
                            </a>
                                        </td>';
                        echo '</tr>';
                      }
                    echo'</tbody>
                </table>';
?>