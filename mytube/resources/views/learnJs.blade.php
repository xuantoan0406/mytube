<html>

<head>
    <title>Using Embeded Object</title>

    <script type="text/javascript">
        <!--
        function play() {
            if (!document.demo.IsPlaying()) {
                document.demo.Play();
            }
        }

        function stop() {
            if (document.demo.IsPlaying()) {
                document.demo.StopPlay();
            }
        }

        function rewind() {
            if (document.demo.IsPlaying()) {
                document.demo.StopPlay();
            }
            document.demo.Rewind();
        }
        //
        -->
    </script>

</head>

<body>

    <embed id="demo" name="demo" src="http://www.amrood.com/games/kumite.swf" width="318" height="300" play="false" loop="false" pluginspage="http://www.macromedia.com/go/getflashplayer" swliveconnect="true">
    </embed>

    <form name="form" id="form" action="#" method="get">
        <input type="button" value="Start" onclick="play();" />
        <input type="button" value="Stop" onclick="stop();" />
        <input type="button" value="Rewind" onclick="rewind();" />
    </form>

</body>

</html>