var num = new Array();
var white;
var starOrNot = 0;
var step = 0;
var time = 0;
var clock;

function getNum() //生成1到8随机数
{
    return (1 + Math.round(7 * Math.random()));
}

function numbers() //生成一组偶排列的数字
{
    var a, b;
    do {
        var t = 0;
        for (a = 0; a < 8; a++) {
            do {
                var echo = 0;
                num[a] = getNum();
                for (b = 0; b < a; b++) {
                    if (num[a] == num[b]) {
                        echo++;
                    }
                }
            }
            while (echo != 0) //数字与之前是否重复
            for (b = 0; b < a; b++) {
                if (num[a] < num[b]) {
                    ++t;
                }
            }
        }
    } while (t % 2 == 1) //若是奇排列则再来一次
    num[8] = 9;
}

function start() {
    resetData();
    numbers();
    for (var x = 1; x < 4; x++) {
        for (var y = 1; y < 4; y++) {
            var id = x * 10 + y;
            document.getElementById(id).title = num[(x - 1) * 3 + y - 1];
            choose(id);
        }

    }
    white = 33;
    starOrNot = 1;
    document.getElementById("state").innerHTML = "游戏已开始";
    document.getElementById("state").style.color = "green";
    timeStart();
}

function finish() {
    var z = 1;
    for (var x = 1; x < 4; x++) {
        for (var y = 1; y < 4; y++) {
            var id = x * 10 + y;
            document.getElementById(id).title = z;
            choose(id);
            ++z;
        }
    }
    resetData();
}

function choose(unitId) {
    var titleNum = document.getElementById(unitId).title
    var imgNum = titleNum - 1;
    var imgUrl = "background-image:url(img/f-" + imgNum + ".jpg)"
    if (titleNum == 9) {
        document.getElementById(unitId).style = "";
    } else {
        document.getElementById(unitId).style = imgUrl;
    }
}

function act(id) {
    var moveable = [1, 10, -1, -10]
    if (moveable.indexOf(white - id) != -1) {
        move(id);
    }
}

function move(id) {
    //动画移动，切换ID
    test = document.getElementById(id).id;
    console.log(test);
    img = document.getElementById(id).style.backgroundImage;
    //想办法通过图片地址筛选
    text2 = document.querySelector(img).id;
    //实验用代码
    document.getElementById(white).style.backgroundImage = document.getElementById(id).style.backgroundImage;
    document.getElementById(white).title = document.getElementById(id).title;
    document.getElementById(id).style.backgroundImage = "";
    document.getElementById(id).title = 9;
    white = id;
    actStep();
    winOrNot();
};

function keyAct(event) {
    var unitId = [11, 12, 13, 21, 22, 23, 31, 32, 33]
    switch (event.keyCode) {
        case 87: //上
            if (unitId.indexOf(white + 10) != -1) {
                move(white + 10)
            }
            break;
        case 68: //右
            if (unitId.indexOf(white - 1) != -1) {
                move(white - 1)
            }
            break;
        case 83: //下
            if (unitId.indexOf(white - 10) != -1) {
                move(white - 10)
            }
            break;
        case 65: //左
            if (unitId.indexOf(white + 1) != -1) {
                move(white + 1)
            }
            break;
    }
}

function winOrNot() {
    var trueNum = 0;
    for (var i = 0; i < 9; i++) {
        var id, title;
        id = Math.floor(i / 3 + 1) * 10 + i % 3 + 1;
        title = i + 1;
        if (document.getElementById(id).title == title) {
            ++trueNum;
        }
    }
    if (trueNum == 9 && starOrNot == "1") {
        alert("游戏结束 步数：" + step + " 时间：" + document.getElementById("timeNum").innerHTML);
        resetData();
    }
}

function actStep() {
    ++step;
    document.getElementById("stepNum").innerHTML = step;
}

function resetData() {
    white = 0;
    starOrNot = 0;
    step = 0;
    clearTimeout(clock);
    time = 0;
    document.getElementById("33").style = "background-image:url(img/f-8.jpg) ";
    document.getElementById("stepNum").innerHTML = "0";
    document.getElementById("timeNum").innerHTML = "00：00";
    document.getElementById("state").innerHTML = "游戏未开始";
    document.getElementById("state").style.color = "red";
}

function timeStart() {
    clearTimeout(clock);
    document.getElementById("timeNum").innerHTML = checkTimeMinute(time) + "：" + checkTimeSecond(time);
    ++time;
    clock = setTimeout("timeStart()", 1000);
}

function checkTimeSecond(i) {
    var s = i % 60;
    if (s < 10) {
        s = "0" + s
    }
    return s;
}

function checkTimeMinute(i) {
    var m = Math.floor(i / 60);
    if (m < 10) {
        m = "0" + m
    }
    return m;
}

function loadDate() {
    if (localStorage.getItem("date") == undefined) {
        document.getElementById("saveDate").innerHTML = "不存在的";
    } else {
        document.getElementById("saveDate").innerHTML = localStorage.getItem("date");
    }
}

function save() {
    if (starOrNot == 1) {
        for (var x = 1; x < 4; x++) {
            for (var y = 1; y < 4; y++) {
                var z = 3 * (x - 1) + y - 1;
                localStorage.setItem(z, document.getElementById(x * 10 + y).title);
            }
        }
        localStorage.setItem("step", step);
        localStorage.setItem("time", time);
        localStorage.setItem("date", Date());
        // console.log('set white', white, typeof white);
        localStorage.setItem("white", white);
        alert("进度已保存");
        finish();
        loadDate();
    } else if (starOrNot == 0) {
        alert("你压根还没开始游戏！")
    }
}

function loadData() {
    if (localStorage.getItem("date") == undefined) {
        alert("不存在的");
        finish();
    } else {
        for (var x = 1; x < 4; x++) {
            for (var y = 1; y < 4; y++) {
                var z = 3 * (x - 1) + y - 1;
                document.getElementById(x * 10 + y).title = localStorage.getItem(z);
                choose(x * 10 + y);
            }
        }
        white = localStorage.getItem("white");
        // console.log('set white', white, typeof white);
        white = parseInt(white);
        step = localStorage.getItem("step");
        document.getElementById("stepNum").innerHTML = step;
        starOrNot = 1;
        time = localStorage.getItem("time");
        timeStart();
        document.getElementById("state").innerHTML = "游戏开始";
        document.getElementById("state").style.color = "green";
    }
}