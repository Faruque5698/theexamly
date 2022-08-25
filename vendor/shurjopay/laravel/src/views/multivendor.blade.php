{{--
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>shurjoPay Online Payment Gateway</title>
</head>
<body style="background-image: url('img_girl.jpg');">
	<h1 align="center">ShurjoPay</h1>
    <div align="center">
        <form action="{{route('shurjopay')}}" method="post">
            @csrf
            <input type="text" name="username" placeholder="Username" class="">    <br>
            <input type="password" name="password" placeholder="Password" class="">    <br>
            <input type="text" name="uniquekey" placeholder="Prefix" class="">    <br>
            <input type="text" name="returnurl" placeholder="Return Url" class="">    <br>
            <input type="text" name="ipn" placeholder="ipn" class="">    <br>
            <input type="submit" value="Save">
        </form>
    </div>

</body>
</html>
--}}<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
{{--    <link rel="stylesheet" href="{{asset('vendors/dist/css/adminlogin.css') }}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        html,
        body {
            height: 100%;
        }

/*        body {
            margin: 0;
            background: linear-gradient(45deg, #49a09d, #5f2c82);
            font-family: sans-serif;
            font-weight: 100;
        }*/

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        table {
            width: 800px;
            overflow: auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border: black;
            border: 1px;
        }

        th,
        td {
            padding: 15px;
            background-color: rgba(255,255,255,0.2);
            color: #000000;
        }

        th {
            text-align: left;
        }

        thead {
        th {
            background-color: #55608f;
        }
        }

        tbody {
        tr {
        &:hover {
             background-color: rgba(255,255,255,0.3);
         }
        }
        td {
            position: relative;
        &:hover {
        &:before {
             content: "";
             position: absolute;
             left: 0;
             right: 0;
             top: -9999px;
             bottom: -9999px;
             background-color: rgba(255,255,255,0.2);
             z-index: -1;
         }
        }
        }
        }
    </style>
</head>
<body class="align" bgcolor="#8fbc8f" >

<div class="grid">
    <div class="logo" align="center" >
        <img src="https://shurjopay.com.bd/dev/images/shurjoPay.png" style="    align-content: center;
    margin-top: 2%;
    margin-bottom: 6%;
    height: 67px;">
        <div class="container" >
            <div>
                <a class="btn btn-primary" href="{{route('shurjopay_multi')}}" style="float: left; background: #5da479; width: 16%;height: 39px;padding-top: 2%;font-size: 19px;color: black;
    text-decoration: none;"><i class="fa fa-plus" style="color: var(--bs-dark);padding: 4px;"></i>Add</a>

            </div>

            <table>
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Store ID</th>
                    <th>Merchent Name</th>
                    <th>Merchent Password</th>
                    <th>Merchent Uniquekey </th>
                    <th>Return URL</th>
                    <th>IPN</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $table_option = "";
                $serial_no = 1;
                foreach ($data as $key => $value) {
                    $table_option .= "<tr>";
                    $table_option .= "<td>" . $serial_no++ . "</td>";
                    $table_option .= "<td>$value->store_id</td>";
                    $table_option .= "<td>$value->username</td>";
                    $table_option .= "<td>$value->password</td>";
                    $table_option .= "<td>$value->uniquekey</td>";
                    $table_option .= "<td>$value->returnurl</td>";
                    $table_option .= "<td>$value->ipn</td>";


                    $table_option .= "</tr>";
                }

                echo $table_option;

                ?>

                </tbody>
            </table>
        </div>

    </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
        <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
    </symbol>
    <symbol id="icon-lock" viewBox="0 0 1792 1792">
        <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
    </symbol>
    <symbol id="icon-user" viewBox="0 0 1792 1792">
        <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
    </symbol>
</svg>
<div class="footer" align="center" >

    <img src="https://shurjopay.com.bd/dev/images/sP-support-new-2.png" alt="" width="100%" height="auto" style="    width: 75%;
    margin-top: 16%;
    padding-top: 6%;">
</div>

</body>
</html>
