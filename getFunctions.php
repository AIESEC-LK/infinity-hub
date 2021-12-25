<?php
require __DIR__ . '/vendor/autoload.php';

// if (php_sapi_name() != 'cli') {
// 	throw new Exception('This application must be run on the command line.');
// }

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Classroom API PHP Quickstart');
    $client->setScopes([
        Google_Service_Classroom::CLASSROOM_COURSES_READONLY,
        Google_Service_Classroom::CLASSROOM_TOPICS_READONLY
    ]);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            return null;
        }
    }
    return $client;
}


//$client = getClient();
//if ($client) {
//    $service = new Google_Service_Classroom($client);
//
//    // Print the first 10 courses the user has access to.
//    $optParams = array(
//        'pageSize' => 10
//    );
//    $results = $service->courses->listCourses($optParams);
//    $topics = $service->courses_topics->listCoursesTopics(406518133777);
//
//    if (count($topics) == 0) {
//        print("no topics");
//    } else {
//        foreach ($topics as $topic) {
//            $t = $topic->getName();
//            echo "<h4>$t</h4>";
//            echo "<br/>";
//        }
//    }
//}
//else{
//    echo "<h3> Server Error</h3>";
//}

function getTopics($courseId)
{
    $client = getClient();
    if ($client) {
        $service = new Google_Service_Classroom($client);

        $topics = $service->courses_topics->listCoursesTopics($courseId);
        $materials = getCMaterials($courseId);

        if (count($topics) == 0) {
            return "no topics";
        } else {
            $set1 = "<div class='enroll-list text-white'>";
            $set2 = "<div class='enroll-list text-white'>";
            foreach ($topics as $index => $topic) {
                if ($index  <= (count($topics) / 2)) {
                    $t = $topic->getName();
                    $set1 = $set1 . "<div class='enroll-list-item'><span>" . ($index + 1) . "</span><h5>" . $t . "</h5>";
                    $mat=filterMaterial($materials, $topic->getTopicId());

                    foreach ($mat as $index=>$stopic) {
                        $set1 = $set1 . "<ul><a>" .($index+1).". ". $stopic[0]."</a>" ;

                        foreach ($stopic[1] as $smat){
                            $set1=$set1."  ".checkext($smat[0],$smat[1])."  ";
                        }
                        $set1 = $set1. "</ul>";
                    }

                    $set1 = $set1 . "</div>";
                }
                elseif ($index > (count($topics) / 2)) {
                    $t = $topic->getName();
                    $set2 = $set2 . "<div class='enroll-list-item'><span>" . ($index + 1) . "</span><h5>" . $t . "</h5>";
                    $mat=filterMaterial($materials, $topic->getTopicId());

                    foreach ($mat as $index=>$stopic) {
                        $set2 = $set2 . "<ul><a>" .($index+1).". ". $stopic[0]."</a>" ;

                        foreach ($stopic[1] as $smat){
                            $set2=$set2."  ".checkext($smat[0],$smat[1])."  ";
                        }
                        $set2 = $set2. "</ul>";
                    }

                    $set2 = $set2 . "</div>";
                }
            }
            $set1 = $set1 . "</div>";
            $set2 = $set2 . "</div>";
            return "<div class='col col-lg-6'>" . $set1 . "</div>" . "<div class='col col-lg-6'>" . $set2 . "</div>";
        }
    } else {
        echo "<h3> Server Error</h3>";
    }
}

function getCMaterials($courseId)
{
    $client = getClient();
    if (@$client) {
        $service = $service = new Google_Service_Classroom($client);
        $options = array('courseWorkMaterialStates' => 'PUBLISHED');
        $materials = $service->courses_courseWorkMaterials->listCoursesCourseWorkMaterials($courseId, $options);
        return ($materials);
    }

}

function filterMaterial($materials, $topicId)
{
    try{
        if ($materials) {
            $flist = array();

            foreach ($materials as $topic) {
                $m=array();
                if ($topic->getTopicId() == $topicId) {
                    foreach ($topic->getMaterials() as $Material) {
                        if($Material->getDriveFile()){
                            array_unshift($m,array($Material->getDriveFile()->getDriveFile()->getTitle(), $Material->getDriveFile()->getDriveFile()->getAlternateLink()));
                        }
                        if($Material->getLink()){
                            array_unshift($m,array($Material->getLink()->getTitle(), $Material->getLink()->getUrl()));
                        }


                    }
                    array_unshift($flist, array($topic->getTitle(),$m));
                }
            }
            return $flist;
        }
    }
    catch (Exception $e){
        echo 'ERROR';
    }

}

function checkext($name,$link){
    $a= pathinfo($name,PATHINFO_EXTENSION);
    $b= pathinfo($name,PATHINFO_FILENAME);
    if($a=="mov"or$a=="mp4"or$a=="wmv"or$a=="flv"or$a=="avi"or$a=="webm"or$a=="mkv"){
        return "<a href= $link><i class='fa fa-file-video-o'></i></a>";
    }
    elseif($a=="pdf"){
        return "<a href= $link><i class='fa fa-file-pdf-o'></i></a>";
    }
    elseif($a=="pptx"){
        return "<a href= $link><i class='fa fa-file-powerpoint-o'></i></a>";
    }
    elseif($a=="docx"){
        return "<a href= $link><i class='fa fa-file-word-o'></i></a>";
    }
    else{
        return "<a href= $link><i class='fa fa-link' aria-hidden='true'></i></a>";
    }
}


//$materials = getCMaterials(406518133777);
//foreach (filterMaterial($materials,419719476225) as $topic){
//    echo $topic[0].$topic[1][0].$topic[1][1]."\n";
//}
//echo getTopics(406518133777);
//$a= pathinfo("3.4 Data and Program Performance.mov",PATHINFO_EXTENSION);
//echo $a;
//echo checkext("3.4 Data and Program Performance.mov","dsa");
filterMaterial(getCMaterials(406525878081),450145633553);