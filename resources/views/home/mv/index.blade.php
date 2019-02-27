<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>因乐 -- MV播放</title>
    <meta http-equiv=”X-UA-Compatible” content=”IE=edge,chrome=1″ />
    <link rel="stylesheet" href="/home/css/Dvideo.css">
    <link rel="stylesheet" href="/home/font-icon/style.css">
    <style>
        body,html{
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            width: 100%;
            height: 100%;
            background-color: #171717;
            }
        .title{
            font: 24px/1.5 weight;
            color: #fff;
            text-align: center;
            margin: 20px 0;
        }
        .centerInfo{
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        .getFullScreen{
            position: absolute;
            bottom:100px;
            right: 100px;
            z-index: 1111;
        }
        .ctrl-c{
            width: 500px;
            height: auto;
            margin: 20px auto;
        }
        .btn{
            padding: 6px 10px;
            background: #5C96D8;
            margin: 5px;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            display: inline-block;
        }
        #testVideo{
            width: 520px;
            height: auto;
            margin: 0 auto;
            outline:2px solid #ccc;
        }
        body,html{
            font-size: 16px;
        }
        .btn{
            font-size: 1rem;
            background: rgba(0,0,0,0.3)!important;
        }
    </style>
</head>
<body>
    <div class="centerInfo">
        <div id="testVideo"></div>
    </div>
</body>
<script src="/home/js/Dvideo.js"></script>
<script>
    // window.onload = function () {
        var videoWrap = document.getElementById('testVideo')
        var fullScreen = document.getElementById('getFullScreen')
        var video = new Dvideo ({
            ele: '#testVideo',
            title: 'Pneumatic Tokyo - EnV',
            nextVideoExtend: function () {
                alert('您点击了下一页')
            },
            showNext: true,
            width: '580px',
            height: '292px',
            src: '/images/Dear.mp4',
            autoplay: true,
            setVideoDefinition: function (type, e, current) {
                if (type === '0') {
                    alert('你点击了标清')
                    // video.setVideoInfo('這是標清','这里填写视频的标清地址',current)
                }
                if (type === '1') {
                    alert('你点击了标清')
                    // video.setVideoInfo('這是標清','这里填写视频的高清地址',current)
                }
                if (type === '2') {
                    alert('你点击了标清')
                    // video.setVideoInfo('這是標清','这里填写视频的超清地址',current)
                }
                video.showLoading(false)
            },
        })

        // 全屏
        function setFullScreen () {
            video.launchFullScreen(videoWrap)
        }

        // 播放
        function play () {
            video.videoPlay()
        }

        // 暂停
        function pause () {
            video.videoPause()
        }

        // 播放暂停
        function playpause () {
            video.videoPlayPause()
        }

        function setVolume (v) {
            video.updateVolume(v)
        }

        function setBackRate (index) {
            video.setPlayBackRate(index)
        }

        function setVideoForward () {
            video.videoForward(10)
        }

        function setVideoRewind () {
            video.videoRewind(10)
        }

        function showLoading () {
            video.showLoading(true, '视频清晰度切换中，请稍等')
        }

        function showTopBottomCtrlNotClose () {
            video.showTopBottomCtrl()
        }

        function hideTopBottomCtrlLi () {
            video.hideTopBottomCtrl(true)
        }

        function showTopBottomCtrl () {
            video.showTopBottomCtrl(true)
        }

        function hideTopBottomCtrl () {
            video.hideTopBottomCtrl()
        }

        function setVideoSize () {
            video.updateVideoSize(720,480)
        }
</script>
</html>