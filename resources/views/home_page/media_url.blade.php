<!DOCTYPE html>
<html lang="en">
<head>
    <title>Desigram</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('assets/js/papaparse.min.js')}}"></script>
</head>
<body style="background: #eeeeee;">
<div class="text-center" style="padding: 0px;border-bottom: 2px solid #ffffff;">
    <div class="navbar-header">
        <a class="navbar-brand logo" href="#"><span>D-Gram</span></a>
        <!-- <a class="navbar-brand" href="#"><img src="{{asset('assets/img/pdf_logo.PNG')}}"></a> -->
    </div>
</div>
<div class="jumbotron text-center" style="left: 70%; top: 50%;">
    <form action="{{url('url-download')}}" method="post">
        {{csrf_field()}}
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4">
                <!-- <input type="submit"value="Find"  /> -->
                <!-- <div class="first-search-add" style="overflow: hidden; padding-right: .5em;">
                  <input type="text" name="searchUser1" class="form-control" placeholder="Search by instagram user name" style="height: 45px;">
                </div> -->
                <h4>Enter your copied image URL in the below field</h4> 

                <button type="submit" class="btn btn-success btn-lg "
                        style="float: right;background-color: #ffffff;color: #000000;border-color: #ccc;border-left: 2px solid #10b3b3;">
                    Download
                </button>
                <div class="first-search-add" style="overflow: hidden; padding-right: 0px;">
                    <input type="text" name="copyLink" class="form-control"
                           placeholder="Enter Copy Link"
                           style="height: 46px;">
                </div>

            </div>
        </div>
        <!-- <div style="margin-top: 15px;">
          <button class="btn btn-success btn-lg">Search</button>
        </div> -->
    </form>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <h4>Select a csv file that contains list of image URL</h4> 
                <button type="submit" class="btn btn-success btn-lg " id="submit-file"
                        style="float: right;background-color: #ffffff;color: #000000;border-color: #ccc;border-left: 2px solid #10b3b3;">
                    Upload
                </button>
                <div class="first-search-add" style="overflow: hidden; padding-right: 0px;">
                    <input type="file" name="multi_image" id="files" class="form-control"
                           accept=".csv" style="height: 46px;">
                </div>
            </div>
        </div>
    </form>
    <div class="row">           
        <div class="col-sm-4 col-sm-offset-4" id="parsed_csv_list">
        </div>
    </div>

    <div id="footer"></div>
</div>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    
    $('#submit-file').on("click",function(e){
        e.preventDefault();
        $('#files').parse({
            config: {
                delimiter: "auto",
                complete: displayHTMLTable,
            },
            before: function(file, inputElem)
            {
                //console.log("Parsing file...", file);
            },
            error: function(err, file)
            {
                //console.log("ERROR:", err, file);
            },
            complete: function()
            {
                //console.log("Done with all files");
            }
        });
    });
    
    function displayHTMLTable(results){
        var table = "<table class='table'>";
        var data = results.data;
         
        for(i=0;i<data.length;i++){
            table+= "<tr>";
            var row = data[i];
            var cells = row.join(",").split(",");
             
            for(j=0;j<cells.length;j++){
                table+= "<td>";
                table+= '<img src="'+cells[j]+'" style="float:left;"';
                table+= "</td>";
                table+= "<td>";
                var temp = "{{url('csv-image-download')}}";
                var temp1 = "/?link="+cells[j];
                var concat = temp + temp1;
                table+= '<a href="'+concat+'"'+' class="btn btn-success" style="margin-top: 50%;">Download</a>';
                table+= "</td>";
            }
            table+= "</tr>";
        }
        table+= "</table>";
        $("#parsed_csv_list").html(table);
    }
  });
</script>
<script type="text/javascript" src="{{asset('assets/js/style.js')}}"></script>
