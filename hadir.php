<?php
include_once "component/header.php";
include_once "component/connection.php";
include_once "component/nav.php";

if (isset($_POST['ndp'])) {
    $ndp = $_POST['ndp'];
    $password = $_POST['password'];

    $sql = mysqli_query($mysqli, "SELECT * FROM student WHERE ndp='$ndp' AND password='$password'");
    $count = mysqli_num_rows($sql);

    if (mysqli_num_rows($sql) == 0) {
        echo "wrong";
    } else {
        $row = mysqli_fetch_assoc($sql);
        mysqli_query($mysqli, "INSERT INTO kehadiran (ndp) VALUES ('$ndp')");
        mysqli_query($mysqli, "INSERT INTO info_hadir (ndp) VALUES ('$ndp')");
        $_SESSION["ndp"] = $row["ndp"];
        header("Location: index.php");
    }
}
?>
<section class="bg-gray-200">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 shadow-lg shadow-blue-900/80">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Hadir Student
              </h1>
              <form class="space-y-4 md:space-y-6" method="post">
                  <div>
                      <label for="ndp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NDP</label>
                      <input type="ndp" name="ndp" id="ndp" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan NDP Anda" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                  </div>
                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                  <button type="submit" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Done</button>
              </form>
          </div>
      </div>
  </div>
</section>
<?php
include_once "component/footer.php";
?>