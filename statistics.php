<?php 
    session_start();
    include "config.php";

    if (!isset($_SESSION['m_user'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniProject | Statistics</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>

    .body {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .header-info {
        text-align: center;

    }

    .body-info {
        margin-top: 3rem;
        text-align: auto;
        padding: 1rem;
        border-radius: 15px;
    }

    .dropdown #user {
        color: #ff5733;
    }

    .search {
        margin: 0 auto;
        text-align: center;
        border-radius: 5px;

        & input, button{
            padding: 8px;
            margin: 0 auto;
            border: 1px solid #ccc;
            outline: none;
            border-radius: 5px;
            
            
        }
    }

    

    table {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-spacing: 1;
        border-collapse: collapse;
        background-color: rgba(211, 211, 211, 1);
        border-radius: 6px;
        overflow: hidden;
        /* max-width: 650px; */
        /* width: 100%; */
        margin: 0 auto;
        position: relative;

        * {
            position: relative
        }

        td,
        th {
            padding-left: 8px
        }

        thead tr {
            height: 60px;
            background: #707070;
            font-size: 16px;
        }

        tbody tr {
            height: 48px;
            border-bottom: 1px solid #E3F1D5;

            &:last-child {
                border: 0;
            }
        }

        td,
        th {
            text-align: left;

            &.l {
                text-align: right
            }

            &.c {
                text-align: center
            }

            &.r {
                text-align: center
            }
        }

        .table-a a {
            color: #ff5733;
            font-size: 18px;
            text-decoration: none;
            padding: 8px;
        }
    }
</style>

<body>
    <section class="header">
        <div class="head-menu">
            <strong>วิทยาลัยการอาชีพปัตตานี</strong>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">หน้าแรก</a></li>

            <li><a href="b_borrow.php">ยืม-คืนหนังสือ</a></li>

            <li class="current"><a href="statistics.php">ข้อมูลสถิติ</a></li>
            
            
            <div class="dropdown">
                <button class="dropbtn" id="user">
                        <?php echo $_SESSION['m_user']; ?>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="logout.php">ออกจากระบบ</a>
                </div>
            </div>

        </ul>


    </section>


    <header>
        <div class="header-info">
            <h1>ข้อมูลสถิติ-ของห้องสมุด</h1>
        </div>
    </header>


</body>

</html>