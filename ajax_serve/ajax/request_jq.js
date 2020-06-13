;
function req_jq(){
    const url = '../serve.php';
    const method = 'get';
    const async = true;
    const timeout = 1000;
    const dataType = 'json';
    const data = { test: 1, aaa: 2 }; //对象
    let ajaxTimeOut = $.ajax({
        url: url,
        type: method,
        async: async,
        dataType: dataType,
        timeout: timeout,
        data: data,
        success: function (data) {
            console.log("请求成功");
            console.log(data);
        },
        error: function (xhr, status, err) {
            console.log('请求失败:', status, err);
        },
        complete: function (XMLHttpRequest, status) {
            if (status == 'timeout') {//status == 'timeout'意为超时, status的可能取值：success,notmodified, nocontent, error, timeout, abort, parsererror 
                ajaxTimeOut.abort();//取消请求 在completezhiqian
                Modal.warning({//超时提示：网络不稳定
                    title: '友情提示',
                    content: '网络不稳定',
                });
            }
        }
    });
}

//告警对象
const Modal = {
    warning: function({title, content}){
        //  $("body").append(title + ': ' + content); //直接显示页面
        // alert(title + ': ' + content);//弹出警告框
        console.warn(title + ":", content); //控制台输出告警信息
    },

    error: function({title, content}){
        console.error(title, content); //控制台输出告警信息
    }
}