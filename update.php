<?php
include_once "component/connection.php";
include_once "component/header.php";
include_once "component/nav.php";
if (isset($_POST["update"])) {
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowTypes = ["jpg", "png", "jpeg", "gif"];
    $ndp = $_POST["ndp"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    if (in_array($fileType, $allowTypes)) {
        $image = $_FILES["image"]["tmp_name"];
        $imgContent = addslashes(file_get_contents($image));
        $result = mysqli_query(
            $mysqli,
            "UPDATE student SET
     IMG='$imgContent',nama='$nama',password='$password', WHERE ndp='$ndp'"
        );
    } else {
        $result = mysqli_query(
            $mysqli,
            "UPDATE student SET
     nama='$nama',password='$password' WHERE ndp='$ndp'"
        );
    }
  if($result){
  echo "<script>alert('Berjaya kemaskini')</script>";
  echo "<script>window.location='dashboard_admin.php'</script>";
  }
  else{
    echo "<script>alert('Tidak Berjaya kemaskini')</script>";
    echo "<script>window.location='update.php'</script>";
  }
      }
 ?>
 <div class="fixed top-20 left-10 bg-white rounded-lg">
    <button type="button" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"><a href="dashboard_admin.php">BACK</a></button>
</div>
<?php
$ndp = $_GET['ndp'];
$result = mysqli_query($mysqli, "SELECT * FROM student WHERE ndp='$ndp'");
while($res = mysqli_fetch_array($result))
{
    $id = $res['ndp'];
    $nama = $res['nama'];
    $password = $res['password'];
}
?>
<div class="flex items-center justify-center">
    <div class="px-8 py-6 mt-20 text-left bg-white shadow-lg rounded-lg">
        <h3 class="text-2xl font-bold">UPDATE MAKLUMAT</h3>
          <h4 class="pt-2 text-xl font-semibold"><?php echo $nama ?></h4>
        <form method="post" enctype='multipart/form-data'>
            <div class="mt-4">
            <div class="mt-4">

<label class="block" for="file_input">Select image [LEAVE EMPTY IF NO CHANGE]</label>
<input type="file" name="image">
</div>
            <div class="mt-4">
                <label class="block">NDP</label>
                <input name="ndp" type="text" readonly="readonl" class="w-full px-4 py-2 mt-2 border bg-gray-500 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" maxlength="5" value="<?php echo $id;?>">  
                </div>
                <div class="mt-4">
                <label class="block">Name</label>
                <input name="nama" type="text" required class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"  value="<?php echo $nama;?>">  
                </div>
                <div class="mt-4">
                <label class="block">Password</label>
                <input name="password" type="text" required class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"  value="<?php echo $password;?>">  
                </div>
                <div class="flex items-baseline justify-between">
                    <button type="submit" name="update" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Update</button>
                    <button type="reset"><a class="text-sm text-blue-600 hover:underline">Clear</a></button>
                </div>
            </div>
        </form>
    </div>
</div>
 <?php
 include_once "component/footer.php";
 ?>