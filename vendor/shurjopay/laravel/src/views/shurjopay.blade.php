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
    <link rel="stylesheet" href="{{asset('vendors/dist/css/adminlogin.css') }}">
    <style>
        :root {
            --baseColor: #000000;
        }

        .align {
            display: grid;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            justify-items: center;
            place-items: center;
        }

        .grid {
            width: 41%;
            margin-left: auto;
            margin-right: auto;
            /* max-width: 20rem; */
        }

        .hidden {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        :root {
            --iconFill: var(--baseColor);
        }

        .icons {
            display: none;
        }

        .icon {
            height: 1em;
            display: inline-block;
            fill: #606468;
            fill: var(--iconFill);
            width: 1em;
            vertical-align: middle;
        }

        :root {
            --htmlFontSize: 100%;

            --bodyBackgroundColor: #C4E2BC;
            --bodyColor: var(--baseColor);
            --bodyFontFamily: "Open Sans";
            --bodyFontFamilyFallback: sans-serif;
            --bodyFontSize: 0.875rem;
            --bodyFontWeight: 400;
            --bodyLineHeight: 1.5;
        }

        * {
            -webkit-box-sizing: inherit;
            box-sizing: inherit;
        }

        html {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            font-size: 100%;
            font-size: var(--htmlFontSize);
        }

        body {
        / background-color: #292929; /
        background-color: #C4E2BC;
            color: #06090b;
            color: var(--bodyColor);
            font-family: "Open Sans", sans-serif;
            font-family: var(--bodyFontFamily), var(--bodyFontFamilyFallback);
            font-size: 0.875rem;
            font-size: var(--bodyFontSize);
            font-weight: 400;
            font-weight: var(--bodyFontWeight);
            line-height: 1.5;
            line-height: var(--bodyLineHeight);
            margin: 0;
            min-height: 100vh;
        }

        / modules/anchor.css /

        :root {
            --anchorColor: #0b0a0a;
        }

        a {
            color: #333333;
            color: var(--anchorColor);
            outline: 0;
            text-decoration: none;
        }

        a:focus,
        a:hover {
            text-decoration: underline;
        }

        / modules/form.css /

        :root {
            --formGap: 0.875rem;
        }

        input {
            background-image: none;
            border: 0;
            color: inherit;
            font: inherit;
            margin: 0;
            outline: 0;
            padding: 0;
            -webkit-transition: background-color 0.3s;
            -o-transition: background-color 0.3s;
            transition: background-color 0.3s;
        }

        input[type="submit"] {
            cursor: pointer;
        }

        .form {
            display: grid;
            grid-gap: 0.875rem;
            gap: 0.875rem;
            grid-gap: var(--formGap);
            gap: var(--formGap);
        }

        .form input[type="password"],
        .form input[type="email"],
        .form input[type="text"],
        .form input[type="submit"] {
            width: 100%;
        }

        .form__field {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 7px;
        }

        .form__input {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }

        :root {
            --loginBorderRadus: 0.25rem;
            --loginColor: #eee;

            --loginInputBackgroundColor: #C4E2BC;
            --loginInputHoverBackgroundColor: #3e5c7f;

            --loginLabelBackgroundColor: #CBCBED;

            --loginSubmitBackgroundColor: #009247;
            --loginSubmitColor: #CBCBED;
            --loginSubmitHoverBackgroundColor: #333493;
        }

        .login {
            color: #0c0707;
            color: var(--loginColor);
        }

        .login label,
        .login input[type="text"],
        .login input[type="password"],
        .login input[type="email"],
        .login input[type="submit"] {
            border-radius: 0.25rem;
            border-radius: var(--loginBorderRadus);
            padding: 1rem;
        }

        .login label {
            background-color: #010101;
            background-color: #383938;            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
            padding-left: 1.25rem;
            padding-right: 1.25rem;
        }

        .login input[type="password"],
        .login input[type="email"],
        .login input[type="text"] {
            background-color: #eeeba0;
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
        }

        .login input[type="password"]:focus,
        .login input[type="email"],
        .login input[type="text"]:focus {
            background-color: #3563ec;
            background-color: var(--loginInputBackgroundColor);
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
        }

        .login input[type="password"]:focus,
        .login input[type="password"]:hover,
        .login input[type="email"],
        .login input[type="email"]:hover,
        .login input[type="text"]:focus,
        .login input[type="text"]:hover {
            background-color: #2d6099;
            background-color: var(--loginInputHoverBackgroundColor);
        }

        .login input[type="submit"] {
            background-color: #009247;
            background-color: var(--loginSubmitBackgroundColor);
            color: #333493;
            color: var(--loginSubmitColor);
            font-weight: 700;
            text-transform: uppercase;
        }

        .login input[type="submit"]:focus,
        .login input[type="submit"]:hover {
            background-color: #009247;
            background-color: var(--loginSubmitHoverBackgroundColor);
        }

        / modules/text.css /

        p {
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .text--center {
            text-align: center;
        }

        .logo{
        }
        .footer{
            align-content: center;
            width: 70%;
            margin-top: 2%;
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


    </div>
    <form autocomplete="off" action="{{route('shurjopay')}}" method="POST" class="form login">
        @csrf
{{--        @csrf
        <input type="text" name="username" placeholder="Username" class="">    <br>
        <input type="password" name="password" placeholder="Password" class="">    <br>
        <input type="text" name="uniquekey" placeholder="Prefix" class="">    <br>
        <input type="text" name="returnurl" placeholder="Return Url" class="">    <br>
        <input type="text" name="ipn" placeholder="ipn" class="">    <br>
        <input type="submit" value="Save">--}}
        <div class="form__field">
            <label>  User Name : </label>
            <input id="username" type="text" name="username" class="form__input" placeholder="Username" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" required value="{{ env('MERCHANT_USERNAME') }}" style="color: black;">

        </div>

        <div class="form__field">
            <label>  Password : &nbsp;&nbsp;</label>
            <input id="password" type="text" name="password" class="form__input" placeholder="Password" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" required value="{{ env('MERCHANT_PASSWORD') }}" style="color: black;">

        </div>

        <div class="form__field">
            <label>  Uniquekey : &nbsp;</label>
            <input id="uniquekey" type="text" name="uniquekey" class="form__input" placeholder="Prefix" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" required value="{{ env('MERCHANT_UNIQUE_KEY') }}" style="color: black;">

        </div>

        <div class="form__field">
            <label> Return URL :</label>
            <input id="returnurl" type="text" name="returnurl" class="form__input" placeholder="Return Url" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" required value="{{ env('MERCHANT_RETURN_URL') }}" style="color: black;">

        </div>

        <div class="form__field">
            <label> IPN : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input id="ipn" type="text" name="ipn" class="form__input" placeholder="ipn" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" required value="{{ env('MERCHANT_IPN') }}" style="color: black;">

        </div>

        <div class="form__field">

            <input type="checkbox" id="check"  name="check" value="Demo" style="margin-right: 5px;"><span style="color: black">Demo mode</span>

        </div>


        <div class="form__field">
            <input type="submit" value="Save">
        </div>


    </form>



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

    <img src="https://shurjopay.com.bd/dev/images/sP-support-new-2.png" alt="" width="100%" height="auto">
</div>

</body>
</html>
