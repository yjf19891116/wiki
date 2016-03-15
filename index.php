
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="daterangepicker-bs3.css" />
    <script type="text/javascript" src="jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="bootstrap.min.js"></script>
    <script type="text/javascript" src="moment.js"></script>
    <script type="text/javascript" src="daterangepicker.js"></script>
    <script type="text/javascript" src="layer/layer.js"></script>
</head>
<body>
<h1>工单录入系统beta</h1>
<input type="text" readonly style="width: 200px" name="reservation" id="reservation" class="form-control" />
<a>工单类型：</a>
<select style="width: 110px" class="form-control">
    <option>接入联调</option>
    <option>移动营销</option>
    <option>投诉咨询</option>
</select>
<a>工单内容：</a>
<input type="text" style="width: 200px" name="reservation"  class="form-control" />
<a>录入者：</a>
<input type="text" style="width: 100px" name="reservation"  class="form-control" value="v_jfyang"/>
<input type="button" style="width: auto" class="btn btn-primary" value="查询">
<button class="btn btn-primary" onclick="addgd()">新建工单</button>
<table class="table table-bordered table-hover" id="table">
    <tr class="active">
        <th>录入时间</th>
        <th>解决时间</th>
        <th>申请人</th>
        <th>解决人</th>
        <th>问题类型</th>
        <th>问题</th>
        <th>解决办法</th>
        <th>操作</th>
    </tr>

    <tr>
        <td>2016-03-10 12:00:00</td>
        <td>王小明</td>
        <td>移动营销</td>
        <td>阿斯顿发送到发斯蒂芬</td>
        <td>阿斯顿发送到发斯蒂芬</td>
        <td>张三</td>
        <td>2016-03-10 12:00:00</td>
        <td><a href="javascript:;" onclick="">修改</a>|<a href="javascript:;" onclick="deleteRow(this)">删除</a></td>
    </tr>

    <tr>
        <td>2016-03-10 12:00:00</td>
        <td>刘小芳</td>
        <td>移动营销</td>
        <td>阿斯顿发送到发斯蒂芬</td>
        <td>阿斯顿发送到发斯蒂芬</td>
        <td>张三</td>
        <td>2016-03-10 12:00:00</td>
        <td><a href="javascript:;" onclick="">修改</a>|<a href="javascript:;" onclick="deleteRow(this)">删除</a></td>
    </tr>
    <?php
    $conn=mysqli_connect("localhost","root","root","test");
    mysqli_set_charset($conn, 'utf8');
    mysqli_select_db($conn,"test");
    $result = mysqli_query($conn,"SELECT * FROM `dbtest`");
    while($result_arr=mysqli_fetch_array($result)) {
        //print_r($result_arr);
        $id = $result_arr["id"];
        $lurutime = $result_arr["lurutime"];
        $jiejuetime = $result_arr["jiejuetime"];
        $shenqingren = $result_arr["shenqingren"];
        $jiejueren = $result_arr["jiejueren"];
        $problem = $result_arr["problem"];
        $problemtype = $result_arr["problemtype"];
        $answer = $result_arr["answer"];
        //echo "id=$id<br>";
        echo " <tr> ";
        echo "<td>$lurutime</td>";
        echo "<td>$jiejuetime</td>";
        echo "<td>$shenqingren</td>";
        echo "<td>$jiejueren</td>";
        echo "<td>$problem</td>";
        echo "<td>$problemtype</td>";
        echo "<td>$answer</td>";
        echo "<td><a href='javascript:;' onclick=''>修改</a>|<a href='javascript:;' onclick='deleteRow(this)'>删除</a></td>";
        echo " <tr> ";
    }
    ?>
</table>


<script type="text/javascript">
    var date=new Date();
    var year=date.getFullYear();
    var mon= ("0" + (date.getMonth() + 1)).slice(-2);
    //var nextmon= ("0" + (date.getMonth() + 2)).slice(-2);
    var day=("0" + (date.getDay() + 1)).slice(-2);
    var num=date.getDay();
    var starttime=year+"-"+mon+"-"+day;
    //var endtime=year+"-"+nextmon+"-"+day;
    document.getElementById("reservation").value=starttime+" - "+starttime;
    $(document).ready(function() {
        $('#reservation').daterangepicker(null, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
    function addOne(obj){
        var tbody = document.getElementById('table').lastChild;
        var tr = document.createElement('tr');
        var td = document.createElement("td");
        for(var i=1;i<9;i++){
            switch (i){
                case 1:
                    var td = document.createElement("td");
                    td.innerHTML = "2016-03-10 12:00:00";
                    tr.appendChild(td);
                    break;
                case 2:
                    var td = document.createElement("td");
                    td.innerHTML = "申请人"+Math.round(Math.random()*1000);
                    tr.appendChild(td);
                    break;
                case 3:
                    var td = document.createElement("td");
                    td.innerHTML = "问题";
                    tr.appendChild(td);
                    break;
                case 4:
                    var td = document.createElement("td");
                    td.innerHTML = "问题类型";
                    tr.appendChild(td);
                    break;
                case 5:
                    var td = document.createElement("td");
                    td.innerHTML = "解决办法";
                    tr.appendChild(td);
                    break;
                case 6:
                    var td = document.createElement("td");
                    td.innerHTML = "解决人";
                    tr.appendChild(td);
                    break;
                case 7:
                    var td = document.createElement("td");
                    td.innerHTML = "2016-03-10 12:12:12 ";
                    tr.appendChild(td);
                    break;
                case 8:
                    var td = document.createElement("td");
                    td.innerHTML = "<a href='javascript:;' onclick=''>修改</a>|<a href='javascript:;' onclick='deleteRow(this)'>删除</a>";
                    tr.appendChild(td);
                    break;

            }
        }
//        td.innerHTML = "2016-03-10 12:00:00";
//        tr.appendChild(td);
//
//        td = document.createElement("td");
//        td.innerHTML = Math.round(Math.random()*1000);
//        tr.appendChild(td);
//
//        td = document.createElement("td");
//        td.innerHTML = "xh";
//        tr.appendChild(td);
//
//        td = document.createElement("td");
//        td.innerHTML = "xh";
//        tr.appendChild(td);
//
//        td = document.createElement("td");
//        td.innerHTML = "xh";
//        tr.appendChild(td);
//
//        td = document.createElement("td");
//        td.innerHTML = "xh";
//        tr.appendChild(td);
//
//        td = document.createElement("td");
//        td.innerHTML = "xh";
//        tr.appendChild(td);
//
//        td = document.createElement("td");
//        td.innerHTML = "<a href='javascript:;' onclick=''>修改</a>|<a href='javascript:;' onclick='deleteRow(this)'>删除</a>";
//        tr.appendChild(td);

        tbody.appendChild(tr);
    }
    function deleteRow(obj){
        var tbody = document.getElementById('table').lastChild;
        var tr = obj.parentNode.parentNode;
        tbody.removeChild(tr);
    }
    function addgd(){
        layer.open({
            title:"新增工单",
            type: 1,
            area: ['600px', '600px'],
            shadeClose: true, //点击遮罩关闭
            content: '<h4 class="text-left" style="margin-left: 20px"><strong>问题描述：</strong></h4><input type="text" class="form-control" style="height: 100px;width: 560px;margin-left: 20px;margin-right: 20px">' +
            '<h4 class="text-left" style="margin-left: 20px"><strong>解决办法：</strong></h4><input type="text" class="form-control" style="height: 100px;width: 560px;margin-left: 20px;margin-right: 20px">'
        });
    };
</script>


</body>
</html>
