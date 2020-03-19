<html>

<head>
    <title>Form Validation</title>
    <script type="text/javascript">
        function hello() {
            var Ten, Tuoi; // Khai báo 2 biến để lưu tên và tuổi
            Ten = prompt("Bạn hãy nhập vào tên ", "");
            Tuoi = prompt("Bạn hãy nhập vào Tuổi : ", 20);
            document.write("Chào bạn : <B> " + Ten + "</B>");
            document.write("<BR>"); // Xuống dòng
            document.write("Tuổi của bạn là : <U> " + Tuoi + "</U>");
        }
    </script>
</head>

<body>
    <button type="button" onclick="hello()">hihih</button>
    <p id="test"></p>
    <script>
        document.write("xin chào");
        document.getElementById("test").innerHTML = "hellooooo";
    </script>


</body>

</html>