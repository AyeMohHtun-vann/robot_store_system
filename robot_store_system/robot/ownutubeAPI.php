<?php
include("admin/confs/config.php");
$id = $_GET['id'];


$robots = $conn->prepare( "SELECT * FROM robots WHERE id=$id");
		$robots->execute(array( 'id' => $id ));
          $row = $robots->fetch();
require_once (dirname(__FILE__) . '/vendor/autoload.php');
define("API_KEY","AIzaSyAtIqQtvN5DaG2CkGsDT-kEZx7ecex3xsY");
$client = new Google_Client();
$client->setApplicationName("demo");
$client->setDeveloperKey(API_KEY);
$youtube = new Google_Service_YouTube($client);
$keyword = $row['title'];
if( isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
}
$params['q'] = $keyword;
$params['type'] = 'video';
$params['maxResults'] = 10;
$keyword = htmlspecialchars($keyword);
$videos = [];
try {
    $searchResponse = $youtube->search->listSearch('snippet', $params);
    array_map(function ($searchResult) use (&$videos) {
        $videos[] = $searchResult;
    },$searchResponse['items']);
} catch (Google_Service_Exception $e) {
    echo htmlspecialchars($e->getMessage());
    exit;
} catch (Google_Exception $e) {
    echo htmlspecialchars($e->getMessage());
    exit;
}
?>
<!doctype html>
<html>
    <head>
        

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <style>

            body {
                font-family: Arial;
                width: 900px;
                padding: 10px;
            }
            .search-form-container {
                background: #F0F0F0;
                border: #e0dfdf 1px solid;
                padding: 20px;
                border-radius: 2px;
            }
            .input-row {
                margin-bottom: 20px;
            }
            .input-field {
                width: 100%;
                border-radius: 2px;
                padding: 10px;
                border: #e0dfdf 1px solid;
            }
            .btn-submit {
                padding: 10px 20px;
                background: #333;
                border: #1d1d1d 1px solid;
                color: #f0f0f0;
                font-size: 0.9em;
                width: 100px;
                border-radius: 2px;
                cursor:pointer;
            }
            .videos-data-container {
                background: #F0F0F0;
                border: #e0dfdf 1px solid;
                padding: 20px;
                border-radius: 2px;
            }
            
            .response {
                padding: 10px;
                margin-top: 10px;
                border-radius: 2px;
            }

            .error {
                 background: #fdcdcd;
                 border: #ecc0c1 1px solid;
            }

           .success {
                background: #c5f3c3;
                border: #bbe6ba 1px solid;
            }
            .result-heading {
                margin: 20px 0px;
                padding: 20px 10px 5px 0px;
                border-bottom: #e0dfdf 1px solid;
            }
            iframe {
                border: 0px;
            }
            .video-tile {
                display: inline-block;
                margin: 10px 10px 20px 10px;
            }
            
            .videoDiv {
                width: 250px;
                height: 150px;
                display: inline-block;
            }
            .videoTitle {
                text-overflow: ellipsis;
                white-space: nowrap;
                overflow: hidden;
            }
            
            .videoDesc {
                text-overflow: ellipsis;
                white-space: nowrap;
                overflow: hidden;
            }
            .videoInfo {
                width: 250px;
            }
        </style>
        
    </head>
    <body>
        <h2>Have a funny watching!!!</h2>
       
           <?php                               
          if (!empty($keyword))
              {
                $apikey = 'AIzaSyAtIqQtvN5DaG2CkGsDT-kEZx7ecex3xsY'; 
                $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $keyword . '&maxResults=' . 10 . 			'&key=' . $apikey;

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);

                curl_close($ch);
                $data = json_decode($response);
                $value = json_decode(json_encode($data), true);
            ?>

            <div class="result-heading">About <?php echo 10; ?> Results</div>
            <div class="videos-data-container" id="SearchResultsDiv">

            <?php
                for ($i = 0; $i < 10; $i++) {
                    $videoId = $value['items'][$i]['id']['videoId'];
                    $title = $value['items'][$i]['snippet']['title'];
                    $description = $value['items'][$i]['snippet']['description'];
                    ?> 
    
                        <div class="video-tile">
                        <div  class="videoDiv">
                            <iframe id="iframe" style="width:100%;height:100%" src="//www.youtube.com/embed/<?php echo $videoId; ?>" 
                                    data-autoplay-src="//www.youtube.com/embed/<?php echo $videoId; ?>?autoplay=1"></iframe>           </div>
                        <div class="videoInfo">
                        <div class="videoTitle"><b><?php echo $title; ?></b></div>
                        <div class="videoDesc"><?php echo $description; ?></div>
                        </div>
                        </div>
	<?php } 
		}?>
           
		
            </body>
</html>
