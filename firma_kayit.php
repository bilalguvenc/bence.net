<?php
include "php/sqlConnection.php";

if( isset($_SESSION["login"]) && (($_SESSION['login'] == 1) || ($_SESSION['login'] == 2)) )
{
  header("Location:index.php");
}

if( isset($_SESSION["error_mail"]) && ($_SESSION["error_mail"] != 0) ) 
{
  $error_mail = $_SESSION["error_mail"];
  $_SESSION["error_mail"] = 0;
} else 
{
  $error_mail = 0;
}

if( isset($_SESSION["error_name"]) && ($_SESSION["error_name"] != 0) ) 
{
  $error_name = $_SESSION["error_name"];
  $_SESSION["error_name"] = 0;
} else 
{
  $error_name = 0;
}

if( isset($_SESSION["error_pass"]) && ($_SESSION["error_pass"] != 0) ) 
{
  $error_pass = $_SESSION["error_pass"];
  $_SESSION["error_pass"] = 0;
} else 
{
  $error_pass = 0;
}

if( isset($_SESSION["error_taxn"]) && ($_SESSION["error_taxn"] != 0) ) 
{
  $error_taxn = $_SESSION["error_taxn"];
  $_SESSION["error_taxn"] = 0;
} else 
{
  $error_taxn = 0;
}
?>

<?php include "pageHeader.php"; ?>

<table style="width:80%; margin: auto; border: 3px solid rgb(200, 200, 200);">
  <tr>
      <th>
          Yeni Firma Kaydı
      </th>
  </tr>

  <tr>
      <td >
          <div style="width:80%; margin: auto;" class="vertical-menu">
            <br>
            Firma İsmi
            <?php 
              if($error_name == 2) echo "(Bu alan boş bırakılamaz.)";
              else if($error_name == 1) echo "(Firma zaten kayıtlı.)";
            ?>
            <br>
              <input type="text" id="fname" value="">
            <br> <br>

            E-Posta Adresi
            <?php 
              if($error_mail == 1) echo "(E-Posta zaten kayıtlı.)";
              else if($error_mail == 2) echo "(Bu alan boş bırakılamaz.)";
              else if($error_mail == 3) echo "(Hatalı E-Posta adresi.)";
            ?>
            <br>
              <input type="text" id="email" value="">
            <br> <br>

            Şifre
            <?php if($error_pass == 2) echo "(Bu alan boş bırakılamaz.)"; ?>
            <br>
              <input type="text" id="password" value="">
            <br> <br>
            
            Vergi Numarası
            <?php 
              if($error_taxn == 1) echo "(Vergi numarası zaten kayıtlı.)";
              else if($error_taxn == 2) echo "(Bu alan boş bırakılamaz.)";
              else if($error_taxn == 3) echo "(Hatalı vergi numarası.)";
            ?>
            <br>
              <input type="text" id="tax_number" value="">
            <br> <br>
            <?php if($error_taxn == 3) echo "Not: Vergi numaraları 10 haneli çift sayılardan oluşur."; ?>
            <br> <br>
          </div>
      </td>
  </tr>
  <tr>
      <td>
          <button onclick="createCompany()">
              Kayıt Ol
          </button>
      </td>
  </tr>
</table>

<?php include "pageFooter.html"; ?>





<script>
  function createCompany()
  {
    var new_fname = document.getElementById("fname").value;
    var new_email = document.getElementById("email").value;
    var new_password = document.getElementById("password").value;
    var new_taxnumber = document.getElementById("tax_number").value;

    post("insertCompany.php" , {createCompany:true, new_fname:new_fname, new_email:new_email, new_password:new_password, new_taxnumber:new_taxnumber });
  }
</script>

<style>
  #studentTable table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #studentTable  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  #studentTable  tr:nth-child(even) {
    background-color: #dddddd;
  }

  .vertical-menu {

    overflow-y: auto;
  }

  /* The container */
  .chkcontainer {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default radio button */
  .chkcontainer input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }

  /* Create a custom radio button */
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
  }

  /* On mouse-over, add a grey background color */
  .chkcontainer:hover input ~ .checkmark {
    background-color: #ccc;
  }

  /* When the radio button is checked, add a blue background */
  .chkcontainer input:checked ~ .checkmark {
    background-color: #2196F3;
  }

  /* Create the indicator (the dot/circle - hidden when not checked) */
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }

  /* Show the indicator (dot/circle) when checked */
  .chkcontainer input:checked ~ .checkmark:after {
    display: block;
  }

  /* Style the indicator (dot/circle) */
  .chkcontainer .checkmark:after {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
  }
</style>