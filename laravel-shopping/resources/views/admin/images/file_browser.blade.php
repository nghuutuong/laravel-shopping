<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
</head>
    <script>
        $(document).ready(function(){
            var funcNum = <?php echo $_GET['CKEditorFuncNum'].';'; ?>
            $('#fileExplorer').on('click','img',function(){
                var fileUrl = $(this).attr('title');
                window.opener.CKEDITOR.tools.callFunction(funcNum,fileUrl);
                window.close();
            }).hover(function(){
                $(this).css('cursor','pointer');
            });
        });
    </script>
    <style>
        ul.file-list{
            list-style:none;
            padding: 0;
            margin:0;
        }
        ul.file-list li{
            float:left;
            margin:5px;
            border: 1px solid #ddd;
            padding: 10px;
        }
        ul.file-list img{
            display:block;
            margin: 0 auto;
        }
        ul.file-list li:hover{
            background: cornsilk;
            cursor:pointer;
        }
    </style>
<body>
    <div id="fileExplorer">
        @foreach($fileName as $file)
        <div class="thumbnail">
            <ul class="file-list">
                <li><img src="{{asset('/uploads/ckeditor/'.$file)}}" alt="thumb" 
                title="{{asset('/uploads/ckeditor'.$file)}}" width="120" height="130">
                <hr>
                <span style="color:blue">{{$file}}</span>
                </li>
            </ul>
        </div>
        @endforeach
    </div>
</body>
</html>
