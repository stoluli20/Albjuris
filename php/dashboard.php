<head>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
       
        th{
            width:70%;
            padding-bottom: 30px;
            text-align: left;
        }
        td{
            width:30%;
            padding-bottom: 30px;
            text-align: center;
        }
        #t-menu{
            width: 100%;
            border: none;
            margin-top: 50%;
        }
        .u-dash{
            position: fixed;
            width: 20%;
            top:0;
            bottom: 0;
            background-color: #3333;
            float: left;
        }
        tr:hover{
            background-color: rgb(189, 177, 177);
            border: none;
        }
        a{
            text-decoration: none;
            color: black;
        }
        .t-user{
            margin-top: 10%;
            margin-left: 40%;
            float: left;
            border: 1px solid;
            width: 30%;
        }
        .t-user td{
            text-align: center;
        }
        .t-user table{
            width: 100%;
        }
        button{
            border: none;
            width: 100%;
        }
        ul{
            margin-top: 50%;           
        }
        li:hover{
            background-color: rgb(189, 177, 177);
        }
        .i{
            height: 5%;
            text-align: center;
            padding: 10%;
        }
        .my_properties{
                margin-top: 10%;
                margin-left: 40%;
                float: left;
                width: 30%;
            }
    </style>
</head>
    <body>
        <?php require __DIR__. '/../html/header.html'; ?>
        <div class='u-dash'>
        <!-- Eshte duke u testuar<ul>
        <li>
            <div class="i">
                <a href="profile.php"role="link"tabindex="0">
                        <div style="width: 30%; float: left;">
                            <i style='font-size:24px' class='fas'> &#xf1e6;</i>
                        </div style="width: 70%;">
                        <div>
                                <span dir="auto"><span>Profile</span></span>
                        </div>
                </a>
            </div>
        </li>
        <li>
            <div class="i">
                <a href="profile.php"role="link"tabindex="0">
                        <div style="width: 30%; float: left;">
                            <i style='font-size:24px' class='fas'> &#xf1e6;</i>
                        </div style="width: 70%;">
                        <div>
                                <span dir="auto"><span>Profile</span></span>
                        </div>
                </a>
            </div>
        </li>
        </ul> -->
           <table id="t-menu" cellspacing="0" cellpadding="0">
           <tr class='pd'>
            <td>
            <i style='font-size:24px' class='fas'>&#xf1e6;</i>
            </td>
            <th><a href="profile.php">My Profile</a></th>       
            </tr> 
           <tr class='pp'>
            <td>
            <i style='font-size:24px' class='fas'>&#xf1e6;</i>
            </td>
            <th><a href="my_properties.php">My properties</a></th>       
            </tr>
            <tr class='ps'>
            <td>
            <i style='font-size:24px' class='fas'>&#xf1e6;</i>
            </td>
            <th><a href="settings.php">Settings</a></th>       
            </tr>
            <tr>
            <td>
            <i style='font-size:24px' class='fas'>&#xf1e6;</i>
            </td>
            <th><a href="login.php">Logout</a></th>       
            </tr>
        </table>
        </div>