var fadeOut;
var appear;
var status = 0;
var kanban = document.getElementById("kanban").style;
var dialog = document.getElementById("dialog").style;
var kanbanHead = ["...", "测试测试", "hehe"];
var kanbanOppai = ["hentai!"];
var kanbanH = ["嗯！？"];
var kanbanBody = ["QAQ"];

// kanban.animation = "kanbanAppear 0.5s";
// console.log(kanban);

function look() {
    if (kanban.display == "block") {
        kanban.display = "none";
        console.log(kanban.display);
    } else {

        kanban.display = "block";
        console.log(kanban.display);
    }
}

function kanbanDialog(say) {
    var time = arguments[1] ? arguments[1] : 5000;
    clearTimeout(fadeOut);
    document.getElementById("dialog").innerHTML = say;
    dialog.opacity = "1";
    fadeOut = setTimeout(function() {
        dialog.opacity = "0";
    }, time);
    // console.log(time);
} //控制对话框

var oneClick = true;
function clickOrNot() {
    oneClick = true;
    console.log(oneClick);
    console.log("done");
}

function clickFrequency(doSth1, doSth2) {
    if (oneClick == true) {
        console.log(oneClick);
        setTimeout(clickOrNot(), 500);
        doSth1;
    } else {
        console.log(oneClick);
        doSth2;
        setTimeout(clickOrNot(), 500);
    }

    oneClick = false;
}

function saySth(part){
    var arrLength = part.length;
    var i; //随机对话
    do {
        i = Math.round(arrLength * Math.random());
    } while (i == arrLength);
    kanbanDialog(part[i]);
    // console.log(i);
}

function kanbanHide(){
    console.log("succeed");
    kanban.animation = "kanbanDisappear 3s"
    kanban.left = "";
    kanban.transform = "";
    status = 1;//这还要改。。。
}

function kanbanSay(part) {
    switch (status) {
        case "0":
            kanban.animation = "kanbanAppear2 3s";
            kanban.left = "-150px";
            var say = "<span style='font-size: 30px;'>喵！！！</span>";
            kanbanDialog(say, 1000);
            status = 1;
            appear = setTimeout(function() {
                // kanban.animation = "kanbanAppear";
                kanban.left = "";
                status = 0;
            }, 60000);
            break;
        case "1":
            clearTimeout(appear);
            kanban.animation = "kanbanAppear3 3s";
            kanban.left = "0px";
            kanban.transform = "rotate(0deg)";
            fadeOut = setTimeout(function() {
                kanbanDialog("既然被你发现，那也没办法了喵~", 3000);
            }, 3000);
            fadeOut = setTimeout(function() {
                kanbanDialog("我是看板娘喵酱，目前只能卖萌喵~");
            }, 6500);
            status = 2;
            break;
        case "2":
            if (oneClick == true) {
                console.log(oneClick);
                saySth(part);
            } else {
                console.log(oneClick);
                kanbanHide();
            }
            oneClick = false;
            console.log(oneClick);
            // setTimeout(clickOrNot());
            setTimeout(function(){clickOrNot();}, 200);
            break;
    }
}