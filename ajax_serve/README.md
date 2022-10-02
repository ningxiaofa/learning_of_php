Start Server
```bash
php -S localhost:9001 -t ajax_serve
```

URL
```bash
http://localhost:9001/ajax/index.html

will sent ajax request:
http://localhost:9001/serve.php?test=1&aaa=2
```


Raw ajax
```bash
var xmlhttp;
xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "http://0.0.0.0:8000/index/test?name=tp", true);
xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
xmlhttp.setRequestHeader("HTTP_X_REQUESTED_WITH", "XMLHttpRequest");
xmlhttp.send();
```