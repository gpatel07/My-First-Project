<?php

if (isset($_POST["submit"])) {
    
    $mobNum = $_POST["mobNum"];
    $message = $_POST["message"];

    $fields = array(
    "sender_id" => "TXTIND",
    "message" => "$message",
    "route" => "v3",
    "numbers" => "$mobNum",
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($fields),
      CURLOPT_HTTPHEADER => array(
        "authorization: Add Your Fast2Sms Api key",
        "accept: */*",
        "cache-control: no-cache",
        "content-type: application/json"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "<script> alert('SMS is not Send!');</script>";
    } else {
      echo "<script> alert('SMS Send Successful!');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head></head>
<title>Sms App</title>
<link rel="stylesheet" href="./Style2.css">
</head>

<body>
    <div>
        <form method="POST">
            <h1 class="text-warning text-center pt-5">SMS Application</h1>

            <label>
                <input type="text" class="input" name="mobNum" id="mobNum" placeholder="ENTER MOBILE NUMBER" />
                <div class="line-box">
                    <div class="line"></div>
                </div>
                <div class="clear"></div>
            </label>

            <label>
                <textarea class="textarea" name="message" id="message" cols="20" rows="7" placeholder="ENTER YOUR MESSAGE"></textarea>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>

            <button type="submit" name="submit" id="submit">Send SMS</button>
            <!-- <button type="reset" name="reset" id="reset">Reset</button> -->
            <div class="clear"></div>

        </form>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bubbly-bg@1.0.0/dist/bubbly-bg.js"></script>
<script>bubbly();</script>

</html>
