<?php
include "php/sqlConnection.php";

if( isset($_SESSION["login"]) )
{
  
} else
{
  header("Location:index.php");
}
?>

<?php include "pageHeader.php"; ?>

<table style="width:80%; margin: auto; border: 3px solid rgb(200, 200, 200);">
  <tr>
      <th>
          Yeni Anket
      </th>
  </tr>

  <tr>
      <td >
          <div style="width:80%; margin: auto;" class="vertical-menu">
            <br>
            Anket İsmi
            <br>
              <input type="text" id="sname" value="">
            <br> <br>

            Açıklama
            <br>
              <input type="text" id="info" value="">
            <br> <br>

            <br> <br>
          </div>
      </td>
  </tr>
  <tr>
      <td>
          <button onclick="createSurvey()">
              Anketi Oluştur
          </button>
      </td>
  </tr>
</table>

<?php include "pageFooter.html"; ?>





<script>
  function createSurvey()
  {
    var sid = "getDate().value;"
    var sname = document.getElementById("sname").value;
    var info = document.getElementById("info").value;
    
    post("insertSurvey.php" , {createSurvey:true, sid:sid, sname:sname, info:info });
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