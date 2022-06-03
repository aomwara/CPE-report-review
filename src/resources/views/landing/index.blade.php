<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&family=Noto+Sans+Thai&display=swap"
        rel="stylesheet">
    <title>CPE Document Review</title>
</head>

<body>

    <style type="text/css">
        body {
            margin: 0 auto;
            background: url('https://img.freepik.com/free-photo/abstract-smooth-empty-grey-studio-well-use-as-background-business-report-digital-website-template-backdrop_1258-55967.jpg');
            background-size: cover;
            background-position: bottom center;
            position: relative;
            font-family: 'Noto Sans Thai', sans-serif;
            font-weight: normal;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            height: 100%;
            position: relative;
            width: 100%;
        }

        #content {
            background: transparent;
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            text-align: center;
            width: 95%;
        }

        #btn a {
            width: 100px;
            margin: 10px auto auto;
            height: 30px;
            text-align: center;
            cursor: pointer;
            position: relative;
            border-radius: 24px;
            border: 2px solid #242775;
            color: #242775;
            display: inline-block;
            text-decoration: none;
            font-size: 16px;
            line-height: 30px;
            -webkit-transition: background-color .5s;
            -moz-transition: background-color .5s;
            -o-transition: background-color .5s;
            -ms-transition: background-color .5s;
            transition: background-color .5s;
        }

        #btn a:hover {
            border: 2px solid #242775;
            background-color: #242775;
            color: #fff;
        }

    </style>
    <div id="content">
        <a href="/login">
            <img src="/images/logo.png" width="200px" alt="">
        </a>
        <h2 style="color: #242775;">{{ env('APP_NAME') }}</h2>
        <div id="btn">
            <a href="/login">
                Sign in
            </a>
            <a style="margin-left:20px;" href="/register">
                Register
            </a><br />
            <a style=" width:225px; " href="https://discord.gg/Rm2VnWpY" target="_blank">
                Join Discord Server
            </a>

        </div>
    </div>
</body>

</html>
