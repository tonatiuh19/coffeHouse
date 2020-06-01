<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF8">
    <title>js-image-zoom Demo</title>
    <script src="package/js-image-zoom.js" type="application/javascript"></script>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <style>
        .wrapper {
            min-height: 400px;
            margin-left: 10px;
            display: flex;
        }
        .imageblock {
            margin-left: 15px;
        }
        .settings {
            width: 400px;
        }

        .settings__button {
            display: block;
            width: 120px;
            margin-bottom: 5px;
        }
        .setting__inputset {
            width: 100px;
        }
        .setting__inputset__fieldset {
            border: 0;
            margin-top: -15px;
        }
        #container {
            margin-top: 200px;
        }

        #container.onehundredpercent {
            width: 350px;
            height: 250px;
        }

        #container.onehundredpercent img {
            max-width: 100%;
        }
    </style>
</head>
<body>
<h4 id="zoomOptions"></h4>
<div class="wrapper">

    <div class="imageblock">
        <div id="container"></div>
    </div>
</div>
<script>
    var currentImage = 1;
    var defaultOptions = {
        width: 400,
        height: 250,
        zoomWidth: 500,
        img: "1.jpg",
        offset: {vertical: 0, horizontal: 10}
    };
    var options;
    resetOptions();

    var container = document.getElementById('container');
    var optionsHeader = document.getElementById('zoomOptions');
    var killButton = document.getElementById('kill');
    var setupButton = document.getElementById('setup');
    var resetButton = document.getElementById('reset');
    optionsHeader.innerHTML = 'Options: ' + JSON.stringify(options);
    window.imageZoom = new ImageZoom(container, options);

    function resetOptions() {
        options = JSON.parse(JSON.stringify(defaultOptions)); // widely supported deep copy
    }

    
</script>
</body>
</html>
