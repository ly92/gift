
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>javascript获取访问者设备信息</title>
</head>

<body>
<script type="text/javascript">
    document.write("userAgent: " + navigator.userAgent + "<br><br>");
    document.write("appName: " + navigator.appName + "<br><br>");
    document.write("appCodeName: " + navigator.appCodeName + "<br><br>");
    document.write("appVersion: " + navigator.appVersion + "<br><br>");
    document.write("appMinorVersion: " + navigator.appMinorVersion + "<br><br>");
    document.write("platform: " + navigator.platform + "<br><br>");
    document.write("cookieEnabled: " + navigator.cookieEnabled + "<br><br>");
    document.write("onLine: " + navigator.onLine + "<br><br>");
    document.write("userLanguage: " + navigator.language + "<br><br>");
    document.write("mimeTypes.description: " + navigator.mimeTypes[1].description + "<br><br>");
    document.write("mimeTypes.type: " + navigator.mimeTypes[1].type + "<br><br>");
    document.write("plugins.description: " + navigator.plugins[3].description + "<br><br>");
</script>
</body>
</html>