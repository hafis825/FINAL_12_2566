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
    <title>MiniProject | Home</title>
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
            <li class="current"><a href="index.php">หน้าแรก</a></li>

            <li><a href="b_borrow.php">ยืม-คืนหนังสือ</a></li>

            <li><a href="statistics.php">ข้อมูลสถิติ</a></li>
            
            
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
            <h1>การจัดการข้อมูลการยืม-คืนหนังสือ</h1>
        </div>
    </header>

    <form action="search.php" method="post">
        <div class="search">
                
                    <input type="text" name="search" required>
                    <button type="submit"  name="submit_search" class="btn">ค้นหา</button>
            
                
        </div>


        <div class="body-info">
            <table>
                <thead>
                    <tr>
                        <th>รหัสหนังสือ</th>
                        <th>ชื่อหนังสือ</th>
                        <th>ผู้ยืม-คืน</th>
                        <th>วันที่ยืม</th>
                        <th>วันที่คืน</th>
                        <th>ค่าปรับ</th>
                    </tr>
                </thead>
                <?php
                    if(isset($_POST['submit_search'])){
                        $search = $_POST['search'];
                        $sql = "SELECT * FROM tb_book INNER JOIN tb_borrow_book ON tb_book.b_id = tb_borrow_book.b_id WHERE tb_book.b_name  LIKE '%$search%' ORDER BY tb_borrow_book.br_date_br DESC";
                        $qry = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($qry) > 0) {
                            while ($result = mysqli_fetch_assoc($qry)) {  
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $result['b_id']; ?></td>
                                        <td><?php echo $result['b_name']; ?></td>
                                        <td><?php echo $result['b_writer']; ?></td>
                                        <td><?php echo $result['br_date_br']; ?></td>
                                        <td><?php echo $result['br_date_rt']; ?></td>
                                        <td><?php echo $result['br_fine']; ?></td>
                                    </tr>
                                </tbody>
                                <?php
                            }
                        } else {
                            echo "<p>No results found.</p>";
                        }
                    }
                    

                    $conn->close();
                ?>
            <table>
        </div>
    </form>



</body>

</html>