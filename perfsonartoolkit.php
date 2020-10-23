<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="Provides customized and general URLs for specific OSG/WLCG Toolkits">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>



<!-- Site navigation menu -->



<title>OSG/WLCG perfSONAR Toolkit Info Page</title>
<header>
<a href="https://opensciencegrid.org/"><img style="float:left" src="img/osg_logo-600x380.png" alt="The OSG logo" width="150" height="95"></a>
<a href="http://wlcg.web.cern.ch/"><img style="float:right" align="top" src="img/WLCG-blackback-Logo-590x480.jpg" alt="The WLCG logo" width="150" height="95"></a>
<H2>The perfSONAR Toolkit Information Page</H2>
</header>


<nav>

 <div>
  <?php
    $ip_addr = $_SERVER['REMOTE_ADDR'];
    $geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip_addr) );

    if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {

    $lat = $geoplugin['geoplugin_latitude'];
    $long = $geoplugin['geoplugin_longitude'];
    }
  ?>
 </div>
 <div>
  <?php
    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
      if (($lat1 == $lat2) && ($lon1 == $lon2)) {
        return 0;
      }
      else {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
         return ($miles * 1.609344);
        } else if ($unit == "N") {
         return ($miles * 0.8684);
        } else {
         return $miles;
        }
      }
    }
  ?>
 </div>
 <div>
  <?php
   function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();
   
    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
   }
  ?>
 </div>
 <div>
  <?php
   $csv = array_map('str_getcsv', file('/etc/testpython/testhostscan.csv'));
   foreach($csv as $location => $data)
   {
    $calculated_distance = distance($lat,$long,$data[0],$data[1],"K");
    $distance_array[$location][distance] = $calculated_distance;
    $distance_array[$location][host_name] = $data[2];
    $distance_array[$location][site_name] = $data[3];
   }
   $sorting = array_column($distance_array,'distance');
   array_multisort($sorting, SORT_ASC, $distance_array);
  ?>
 <?div>
 <div>
  <?php
   function alphasort($x,$y) {
    return strcasecmp($x['host_name'],$y['host_name']);
   }
   $alpha = $distance_array;
   uasort($alpha,'alphasort');
  ?>
 </div>

<div class="navbar">
  <div class="dropdown">
    <a href="index.html"><button class="dropbtn">Main Page</button></a>
    <a href="documentation.html"><button class="dropbtn">Documentation</button></a>
    <a href="osgnetworkpipelines.html"><button class="dropbtn">OSG Network Pipelines</button></a>
    <a href="osgnetworkservices.html"><button class="dropbtn">OSG Network Services</button></a>
    <a href="analyticsanddashboards.html"><button class="dropbtn">Analytics and Dashboards</button></a>
    <a href="perfsonartoolkit.php"><button class="dropbtn">Toolkit Specific Page</button></a>
  </div>

 <br> </br>

 <form action="<?php echo '/'. basename(getcwd()) .'/'. basename($_SERVER['PHP_SELF']); ?>" method="get" class='colform'>
 <label for="host" style="color:black; font-size:17px;">Select Host In Alphabetical Order: </label>
 <select id="host" name="host">
  <option value = ''></option>
   <?php
    $alphahosts = $alpha;
    $alphahosts = unique_multidim_array($alphahosts,'host_name');
    foreach($alphahosts as $array) { ?>
     <option value= "<?php echo $array['host_name']; ?>"><?php echo $array['host_name']; ?></option>
   <?php
    }?>
 </select>
 <input type="submit" value='Submit'>
 </form>

 <form action="<?php echo '/'. basename(getcwd()) .'/'. basename($_SERVER['PHP_SELF']); ?>" method="get" class='colform'>
 <label for="host" style="color:black; font-size:17px;">Select Host Based on Distance: </label>
 <select id="host" name="host">
  <option value = ''></option>
   <?php
    $hosts = $distance_array;
    $hosts = unique_multidim_array($hosts,'host_name');
    foreach($hosts as $array) { ?>
     <option value= "<?php echo $array['host_name']; ?>"><?php echo $array['host_name']; ?></option>
   <?php
    }?>
 </select>
 <input type="submit" value='Submit'>
 </form>

<!-- 
 <form action="/developertoolkitinfo/perfsonartoolkit.php" method="get" class='colform'>
 <label for="site" style="color:black; font-size:17px;">Select Site Based on Distance: </label>
 <select id="site" name="site" style='width:150px;'>
  <option value = ''></option>
   <?php
    $site = $distance_array;
    $site = unique_multidim_array($site,'site_name');
    foreach($site as $array) { 
     if (!empty($array['site_name'])) { ?>
      <option value= "<?php echo $array['site_name']; ?>"><?php echo $array['site_name']; ?></option>
   <?php
     } 
    }?>
 </select>
 <input type="submit" value='Submit'>
 </form>
-->


</div>
<p style="color:white">Your selected perfSONAR Toolkit Host is: <b><?php echo htmlspecialchars($_GET[host]); ?></b></p>
<!--
<p style="color:white">Your selected perfSONAR Toolkit Site is: <b><?php echo htmlspecialchars($_GET[site]); ?></b></p>
-->

</nav>

 <article>
 <div id='custom-links'>
 <h4> You have selected a toolkit host. If any of these issues are prevalent to your problem, please select them and your toolkit host will be both a source and destination </h4>
 <h4> NOTE: Some hosts may show no data when a link is clicked. This is because the host is for a different type of data. Please select a similar host or different data type </h4>
 <div class='row'>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/82552400-d8cb-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20packetloss.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo htmlspecialchars($_GET[host]); ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo htmlspecialchars($_GET[host]); ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Packetloss%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Do You Suspect a lot of Packetloss When Transmitting Data to Another Site? </button></a>
   <br> </br>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/35976890-d8ca-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20trace.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo htmlspecialchars($_GET[host]); ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo htmlspecialchars($_GET[host]); ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Trace%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Interested in the Path that Data Takes from your Site to Another?</button></a>
   <br> </br>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/a1ce0000-d8d4-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20One-Way%20Delay.',filters:!(('$state':(store:appState),meta:(alias:!n,disabled:!f,index:b1029d00-e61d-11ea-9ef7-e1db34380ad3,key:dest_site,negate:!t,params:(query:IEPSAS-Kosice),type:phrase),query:(match_phrase:(dest_site:IEPSAS-Kosice))),('$state':(store:appState),meta:(alias:!n,disabled:!f,index:b1029d00-e61d-11ea-9ef7-e1db34380ad3,key:src_site,negate:!t,params:(query:IEPSAS-Kosice),type:phrase),query:(match_phrase:(src_site:IEPSAS-Kosice)))),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo htmlspecialchars($_GET[host]); ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo htmlspecialchars($_GET[host]); ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20One-Way%20Delay%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Do you Suspect Slow Connections between your Site and Another?</button></a>
  </div>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/57e3c0b0-d7f3-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20throughput.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo htmlspecialchars($_GET[host]); ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo htmlspecialchars($_GET[host]); ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Throughput%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Seeing a lot of Throughput Issues for your Site?</button></a>
   <br> </br>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/68ec3520-d8cc-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20retransmits.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo htmlspecialchars($_GET[host]); ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo htmlspecialchars($_GET[host]); ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Retransmits%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Seeing a lot of Retransmitted Data for your Site?</button></a>
 </div>
 </div>
 </article>
 </div>
 <div id='no-cust-text'>
 <div class='row'>
  <div class='column'>
   <h3> You have not selected a toolkit host yet. Once a host is selected, links will appear that when selected,
      will display the specified data with the host as both a source and a destination. </h3>
  </div>
 </div>
 <br> </br>
 </div>

 </div>

</div>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-136181829-1', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>


<!-- We want a function that will change visibility of page items based on if we have x.509 credentials or not -->
<script>
   <!-- Implement visibility of elements based upon x.509 presence -->
     if (location.protocol !== 'https:' ) {
       <!-- This is the case if we DO NOT have x.509 credentials -->
       document.getElementById("ifr-psetf").style.display="none";
       document.getElementById("Alarms").style.display="none";
       document.getElementById("ifr-nox509").style.display="inline";
       <!-- document.getElementById("pS-collector").style.visibility="hidden"; -->
       document.getElementById("Ingest").style.visibility="visible";
       document.getElementById("ITB-mon").style.visibility="hidden";
       document.getElementById("Prod-mon").style.visibility="hidden";
       document.getElementById("PL-alarm").style.visibility="visible";
       document.getElementById("PL-overview").style.visibility="visible";
       document.getElementById("PL-topN").style.visibility="visible";
       document.getElementById("OSG-net-docs").style.visibility="visible";
       document.getElementById("pS-docs").style.visibility="visible";
       document.getElementById("ES-Fasterdata").style.visibility="visible";
       document.getElementById("ES-trouble").style.visibility="visible";
       document.getElementById("MaDDash").style.visibility="visible";
       document.getElementById("pSConfig").style.visibility="visible";
       document.getElementById("psetf").style.visibility="hidden";
       document.getElementById("WLCG-grafana").style.visibility="visible";
       document.getElementById("OSG-ELK-Analytics").style.visibility="visible";
       document.getElementById("pS-infrastructure").style.visibility="visible";
       document.getElementById("pS-Overview-PL").style.visibility="visible";
       document.getElementById("SAND").style.visibility="visible";
       document.getElementById("MEPHI-tr").style.visibility="visible";
       document.getElementById("cl-avail").style.visibility="hidden";
       document.getElementById("cl-checkmk").style.visibility="hidden";
     } else {
       <!-- This is the case if we DO have x.509 credentials -->
       document.getElementById("ifr-psetf").style.display="inline";
       document.getElementById("ifr-nox509").style.display="none";
       <!-- document.getElementById("pS-collector").style.visibility="visible"; -->
     }
</script>
<script>
	var host = "<?php echo htmlspecialchars($_GET[host]); ?>";
	if ( typeof host === 'undefined' || host === null || host == "") {
           document.getElementById("no-cust-text").style.display="inline";
           document.getElementById("custom-links").style.display="none";
	} else {
           document.getElementById("custom-links").style.display="inline";
           document.getElementById("no-cust-text").style.display="none";
	}
 </script>
  <footer>
        <a href="https://sand-ci.org/"><img src="img/sand_logo.png" alt="The SAND Project logo" width="95" height="95"></a>
        <a href="https://iris-hep.org/"><img src="img/Iris-hep-6-WHITE-complete.png" alt="The IRIS-HEP logo" width="200" height="80"></a>
        <a href="https://www.nsf.gov/"><img src="img/nsf_round_logo.png" alt="The NSF logo" width="95" height="95"></a>
  </footer>
  <center>
        <a style="padding: 10px 0px;" href="mailto:wlcg-perfsonar-support@cern.ch?subject=ToolkitInfoFeedback">Contact us about this webpage</a>
  </center>


</body>

</html>
