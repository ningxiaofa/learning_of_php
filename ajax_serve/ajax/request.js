;
// const xhr = new XMLHttpRequest()

// // xhr 具有一个 open 方法，这个方法的作用类似于初始化，并不会发起真正的请求
// // open 方法具有 5 个参数，但是常用的是前 3 个
// // method： 请求方式 —— get / post
// // url：请求的地址
// // async：是否异步请求，默认为 true（异步）
// xhr.open(method, url, async)

// // send 方法发送请求，并接受一个可选参数
// // 当请求方式为 post 时，可以将请求体的参数传入
// // 当请求方式为 get 时，可以不传或传入 null
// // 不管是 get 还是 post，参数都需要通过 encodeURIComponent 编码后拼接
// xhr.send(data)

// //当readyStatus的状态发生改变时，会触发 xhr 的事件onreadystatechange
// xhr.onreadystatechange = () => {
//     if (xhr.readyStatus === 4) {
//         // HTTP 状态在 200-300 之间表示请求成功
//         // HTTP 状态为 304 表示请求内容未发生改变，可直接从缓存中读取
//         if (xhr.status >= 200 && 
//             xhr.status < 300 || 
//             xhr.status == 304) {
//             console.log('请求成功', xhr.responseText)
//         }
//     }
// }


// // 超时时间单位为毫秒
// xhr.timeout = 1000

// // 当请求超时时，会触发 ontimeout 方法
// xhr.ontimeout = () => console.log('请求超时')

function ajax (options) {
    let url = options.url
    const method = options.method.toLocaleLowerCase() || 'get'
    const async = options.async != false // default is true
    const data = options.data
    const xhr = new XMLHttpRequest()

    if (options.timeout && options.timeout > 0) {
        xhr.timeout = options.timeout
    }

    return new Promise ( (resolve, reject) => {
        xhr.ontimeout = () => reject && reject('请求超时') //为什么前面没有显示出来 ？ TBD
        // xhr.ontimeout = () => console.log('请求超时');//可以打印出来
        xhr.onreadystatechange = () => {
            if (xhr.readyState == 4) {
                if (xhr.status >= 200 && xhr.status < 300 || xhr.status == 304) {
                    resolve && resolve(xhr.responseText)
                } else {
                    reject && reject('请求失败')
                }
            }
        }
        xhr.onerror = err => reject && reject(err)

        let paramArr = []
        let encodeData
        if (data instanceof Object) {
            for (let key in data) {
                // 参数拼接需要通过 encodeURIComponent 进行编码
                paramArr.push( encodeURIComponent(key) + '=' + encodeURIComponent(data[key]) )
            }
            encodeData = paramArr.join('&')
        }

        if (method === 'get') {
              // 检测 url 中是否已存在 ? 及其位置
            const index = url.indexOf('?')
            if (index === -1) url += '?'
            else if (index !== url.length -1) url += '&'
              // 拼接 url
            url += encodeData
        }

        xhr.open(method, url, async)
        if (method === 'get') xhr.send(null)
        else {
            // post 方式需要设置请求头
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded;charset=UTF-8')
            xhr.send(encodeData)
        }
    } )
}
