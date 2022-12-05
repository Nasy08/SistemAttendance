<?php
include_once "component/connection.php";
include_once "component/header.php";
include_once "component/nav.php";
$ndp = $_GET['ndp'];
$data = mysqli_query($mysqli, "SELECT * FROM student WHERE ndp='$ndp'");
$info = mysqli_fetch_array($data);
echo $info["nama"];
 ?>
 <img class="object-cover w-full w-28 rounded-lg" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($info["img"]); ?>" />
 
 <center class="underline font-bold text-xl pt-6">HISTORY KEHADIRAN KE KELAS</center>
 <div class="overflow-hidden">
     <div class="flex flex-col pt-6 pr-12 pl-12">
     <div class="overflow-x-auto sm:-mx-8 lg:-mx-8">
         <div class="py-2 inline-block min-w-full sm:px-8 lg:px-8">
         
             <table class="min-w-full border text-center">
             <thead>
                 <tr class="border-b-6 bg-gray-700">
                 <th scope="col" class="text-md font-medium text-white px-4 py-4 border-r">
                     Waktu Kehadiran
                 </th>
                 </tr>
                <?php
                $result = mysqli_query(
                    $mysqli,
                    "SELECT * FROM info_hadir WHERE ndp='$ndp'"
                );
                
                while ($r = mysqli_fetch_array($result)){
                ?>  
                <tr class="border border-black">
                    <td><?php echo $r['waktu_kehadiran']; ?></td>
                </tr>
                <?php 
                }
                ?>
             </thead>
             </table>       
         </div>
     </div>
     </div>
 </div>
 <?php
 include_once "component/footer.php";
 ?>