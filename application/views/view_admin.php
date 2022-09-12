<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src='/js/index.js'></script>
    <script src="/js/admin.js"></script>
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/admin.css">
    <title>Admin Panel</title>
</head>
<body>
    <div class="login-form rounded shadow webkit-center" style="<? if($loggedin) echo 'display:none'?>">
        <img src="/assets/yacht-logo.svg" class="my-3" height="64px">
        <form method="POST">
        <p><input class="usr form-control w-100" type="username" placeholder="username">
        <p><input class="pswrd form-control w-100" type="password" placeholder="password">
        <p><a href="/" class="primary float-start">exit</a><a class="btn btn-primary float-end" onclick="login()">log in</a>
        </form>
    </div>
    <div class="modal-bg" style="display:none;" ></div>
    <div id="adminPanel" class="admin-panel" style="<? if(!$loggedin) echo 'display:none'?>">
        <div id="tables" class="table-select bg-midnightblue">
            <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                <li>
                    <a href="#" onclick="showTable('yachts_sale')" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                        <i class="bi-cart fs-1"></i>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="showTable('yachts_rent')" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                        <i class="bi-key-fill fs-1"></i>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="showTable('news')" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                        <i class="bi-newspaper fs-1"></i>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="showTable('reviews')" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
                        <i class="bi-star fs-1"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div id="operations" class="operations">
            <a id="add" onclick="addBtn()" class="btn mx-3 mt-2 fs-5 bi-plus bg-primary">ADD</a>
            <a id="delete" onclick="deleteRows(selectedIds)" class="btn mt-2 fs-5 bi-trash bg-danger">DELETE</a>
            <a id="logout" onclick="logout()" class="btn mx-3 mt-2 fs-5 bi-box-arrow-left bg-primary text-white float-end"> Log out</a>
        </div>
        <div id="data" class="data bg-light">
            
        </div>
    </div>
</body>
</html>