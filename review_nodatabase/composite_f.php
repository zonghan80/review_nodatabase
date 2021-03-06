<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ZongHan</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/shop-item.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">合圖</span>
                        <span class="icon-bar">抽獎</span>
                        <span class="icon-bar">列表</span>
                    </button>
                    <a class="navbar-brand">Program</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="composite_f.php">合圖</a>
                        </li>
                        <li>
                            <a href="lottery_f.php">抽獎</a>
                        </li> 
						<li>
                            <a href="list_f.php">列表</a>
                        </li>  						
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <div class="col-md-3">
                    <p class="lead">Review</p>
                    <div class="list-group">
                        <a href="composite_f.php" class="list-group-item active">合圖</a>
                        <a href="lottery_f.php" class="list-group-item">抽獎</a>
                        <a href="list_f.php" class="list-group-item">列表</a>							
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="form-group" id="pick">
                        <!--<h4>FBID:<input id="fbid" type="text" value="000000000000000"/></h4>
                        <h4>朋友FBID:<input id="ffbid" type="text" value="000000000000000"/></h4>-->
                        <h4>名稱:<input id="fbidn" type="text" value="路人甲"/></h4>
                        <h4>朋友名稱:<input id="ffbidn" type="text" value="路人乙"/></h4>
                        <label for="exampleInputPassword1">風格</label>
                        <select  name="taste"  id="taste" class="form-control">            
                            <option value="1">粉紅</option>
                            <option value="2">紫色</option>    
                        </select>
                        <label for="exampleInputPassword1">包材</label>
                        <select  name="pack"  id="pack" class="form-control">            
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        <label for="exampleInputPassword1">花束小卡</label>
                        <select  name="card"  id="card" class="form-control">            
                            <option value="學業順利all pass！">學業順利all pass！</option>
                            <option value="工作事半功倍！">工作事半功倍！</option>
                            <option value="健康好氣色佳！">健康好氣色佳！</option>
                        </select>
                        <form name="other"><label for="exampleInputPassword1">或自己輸入小卡內容</label></br>
                            <input name="talk" id="talk" type="text" maxlength="15"/><br>
                        </form>
                    </div>
                    <input type="button" id="go" name="button" value="選擇" />

                </div>
            </div>           
            <img id="greatphoto" src=""/>
        </div>
        <!-- /.container -->
        <div class="container">
            <hr>
            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Your Website 2019</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script>
            $('#go').click(function () { //按下按鈕後執行function

                /*var fbid = $('#fbid').val();
                var ffbid = $('#ffbid').val();*/
                var fbidn = $('#fbidn').val();
                var ffbidn = $('#ffbidn').val();
                var taste = $('#taste').val();
                var pack = $('#pack').val();
                if (other.talk.value == "")
                {
                    var card = $('#card').val();
                } else {
                    var card = $('#talk').val();
                }
                $.ajax({
                    url: "composite_b.php", //要連線的php
                    data: {
                        //fbid: fbid,
                        //ffbid: ffbid,
                        fbidn: fbidn,
                        ffbidn: ffbidn,
                        taste: taste,
                        pack: pack,
                        card: card
                    }, //要傳的欄位id: $_POST['xx']
                    type: "POST", //連線方式
                    dataType: "json",
                    success: function (msg) {  //成功後 alert訊息 後重整資料
                        if (msg.flag) {
                            $('#pick').hide();
                            $('#go').hide();
                            $('#greatphoto').attr('src', msg.data.imagepath);
                            console.log(msg);
                        }
                    }
                });
            });

        </script>

    </body>

</html>