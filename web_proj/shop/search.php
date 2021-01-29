<?php
$url = 'course.json';
$data = file_get_contents($url); //ดึง data จาก url
$characters = json_decode($data);
$numobj_Data = count((array)$characters->Detail);
echo'<table id="sub_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>หมวดหมู่</th>
                    <th>ชื่อวิชา</th>
                    <th>ราคา</th>
                    <th>&nbsp</th>
                </tr>
                </thead>
                <tbody>';
for($i=0;$i<$numobj_Data;$i++){
    if($_REQUEST["search"]==""){
        //echo'<script>console.log(1111111111111)</script>';
        if(!isset($_REQUEST["cat"])){
                echo "<tr>
                        <td>".$characters->Detail[$i]->ID."</td>
                        <td>".$characters->Detail[$i]->Category."</td>
                        <td>".$characters->Detail[$i]->Name."</td>
                        <td>".$characters->Detail[$i]->Price."</td>
                        <td><a href='detail_page.php?id=".$i."'>ดูรายละเอียด</a></td>
                    </tr>";
        }
        else{
            if($_GET["cat"]==$characters->Detail[$i]->Category){
        echo "<tr>
                    <td>".$characters->Detail[$i]->ID."</td>
                    <td>".$characters->Detail[$i]->Category."</td>
                    <td>".$characters->Detail[$i]->Name."</td>
                    <td>".$characters->Detail[$i]->Price."</td>
                    <td><a href='detail_page.php?id=".$i."'>ดูรายละเอียด</a></td>
                </tr>";
            }
        }
    }
    else if($_REQUEST["search"]!=""){
        $search = $_REQUEST["search"];
        //echo'<script>console.log("'.$characters->Detail[$i]->Name.' = '.$search.'")</script>';
        if(!isset($_REQUEST["cat"])){
            if(strpos($characters->Detail[$i]->Name, $search)!==false){
                echo "<tr>
                        <td>".$characters->Detail[$i]->ID."</td>
                        <td>".$characters->Detail[$i]->Category."</td>
                        <td>".$characters->Detail[$i]->Name."</td>
                        <td>".$characters->Detail[$i]->Price."</td>
                        <td><a href='detail_page.php?id=".$i."'>ดูรายละเอียด</a></td>
                    </tr>";
            }
        }
        else if($_REQUEST["cat"]!=""){
            if($_GET["cat"]==$characters->Detail[$i]->Category){
                if(strpos($characters->Detail[$i]->Name, $search)!==false){
                    echo "<tr>
                            <td>".$characters->Detail[$i]->ID."</td>
                            <td>".$characters->Detail[$i]->Category."</td>
                            <td>".$characters->Detail[$i]->Name."</td>
                            <td>".$characters->Detail[$i]->Price."</td>
                            <td><a href='detail_page.php?id=".$i."'>ดูรายละเอียด</a></td>
                        </tr>";
                }
            }
        }
    }

}
echo '
</tbody>
</table>';
?>