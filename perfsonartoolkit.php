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



<div class="form" style="display: right">
 <form action="/developertoolkitinfo/perfsonartoolkit.php" method="get">
 <label for="host" style="color:black">Select Host Based on Distance (Closest To): </label>
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

 <form action="/developertoolkitinfo/perfsonartoolkit.php" method="get">
 <label for="site" style="color:black">Select Site Based on Distance (Closest To): </label>
 <select id="site" name="site">
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

 <form action="/developertoolkitinfo/perfsonartoolkit.php" method="get">
 <label for="host" style="color:black">Select Host In Alphabetical Order: </label>
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
</div>


</div>
<p style="color:white">Your selected perfSONAR Toolkit Host is: <b><?php echo htmlspecialchars($_GET[host]); ?></b></p>
<p style="color:white">Your selected perfSONAR Toolkit Site is: <b><?php echo htmlspecialchars($_GET[site]); ?></b></p>

</nav>

 <article>
 <h2> Once a toolkit host is selected, the following links will display corresponding information with said host both as a source and destination </h2>
 <div class='row'>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/82552400-d8cb-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20packetloss.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo htmlspecialchars($_GET[host]); ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo htmlspecialchars($_GET[host]); ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Packetloss%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Do You Suspect a lot of Packetloss When Transmitting Data to Another Site? </button></a>
  </div>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/57e3c0b0-d7f3-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20throughput.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo htmlspecialchars($_GET[host]); ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo htmlspecialchars($_GET[host]); ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Throughput%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Seeing a lot of Throughput Issues for your Site?</button></a>
 </div>
 </article>
 <div>
  <?php
     echo 'User IP is: '.$ip_addr. '<br>';
     echo 'User Latitude is: '.$lat. '<br>';
     echo 'User Longitude is: '.$long. '<br>';
   ?>
 </div>

 <div>
  <?php
  foreach($distance_array as $array) {
   echo 'Host_name: ' .$array['host_name']. ' is ' .$array['distance']. ' kilometers away at site ' .$array['site_name']. ' <br>';
  }
  ?>
 </div>


 <div id="custom-links" style="margin-left: 10px;vertical-align: top;display: none">
Web links for <b><?php echo htmlspecialchars($_GET[toolkits]); ?><b><br>

    <div class="tooltip" style="margin-left: 10px">
        <span class="tooltiptext">This is perfSONAR toolkit web interface, part of the default install of perfSONAR</span>
	<a href="https://<?php echo htmlspecialchars($_GET[toolkits]); ?>/toolkit" target="_blank">This toolkit's web interface</a><br>
    </div><br>
    <div class="tooltip" style="margin-left: 10px">
        <span class="tooltiptext">We use pSConfig and PWA (pSConfig Web Administrator) to manage our testing configuration for OSG/WLCG.  Clicking here will return the JSON configuration details being provided to this Toolkit host.</span>
        <a href="http://psconfig.opensciencegrid.org/pub/auto/<?php echo htmlspecialchars($_GET[toolkits]); ?>" target="_blank">Testing insructions for this toolkit (JSON)</a><br>
    </div><br>
    <div class="tooltip" style="margin-left: 10px">
        <span class="tooltiptext">This link will provide configuration and operational details in JSON format for this specific perfSONAR Toolkit instance.  We recommend installing a JSON parser ("JSON View" or others) in your browser.</span>
        <a href="https://<?php echo htmlspecialchars($_GET[toolkits]); ?>/toolkit/services/host.cgi?method=get_summary" target="_blank">This toolkit's settings and status</a><br>
    </div><br>
    <div class="tooltip" style="margin-left: 10px" id="cl-avail">
        <span class="tooltiptext">This is the Check_MK-based service availabiity timeline for the last 8 days.  The timespace and various filter options can be adjusted on this page using the "monitor/screwdriver" icon</span>
	<a href="https://psetf.opensciencegrid.org/etf/check_mk/index.py?start_url=%2Fetf%2Fcheck_mk%2Fview.py%3Ffilled_in%3Davoptions%26_transid%3D1553115578%252F640181828%26avoptions%3Dset%26avo_rangespec_sel%3D2%26avo_rangespec_13_days%3D0%26avo_rangespec_13_hours%3D0%26avo_rangespec_13_minutes%3D0%26avo_rangespec_13_seconds%3D0%26avo_rangespec_14_0_year%3D2019%26avo_rangespec_14_0_month%3D3%26avo_rangespec_14_0_day%3D20%26avo_rangespec_14_1_year%3D2019%26avo_rangespec_14_1_month%3D3%26avo_rangespec_14_1_day%3D20%26avo_labelling%3D1%26avo_av_levels_value_0%3D99.000%26avo_av_levels_value_1%3D95.000%26avo_outage_statistics_0%3D1%26avo_outage_statistics_1%3D1%26avo_timeformat_0%3D-5096062089839120012%26avo_timeformat_1%3D2860216163255499133%26avo_timeformat_2%3D6179950607411978388%26avo_grouping%3D-7985492147856592190%26avo_dateformat%3D2341086994080993429%26avo_summary%3D-3477289025967913046%26avo_downtimes_p_include%3D2716855627943083503%26avo_consider_p_flapping%3Don%26avo_consider_p_host_down%3Don%26avo_consider_p_unmonitored%3Don%26avo_state_grouping_p_warn%3D-3087914045472848368%26avo_state_grouping_p_unknown%3D-8288641604770303033%26avo_state_grouping_p_host_down%3D2723210965512899648%26avo_av_filter_outages_p_warn%3D0.0%26avo_av_filter_outages_p_crit%3D0.0%26avo_av_filter_outages_p_non-ok%3D0.0%26avo_host_state_grouping_p_unreach%3D-6138262812469222625%26avo_service_period%3D2716855627943083503%26avo_notification_period%3D6279241457472762700%26avo_short_intervals%3D0%26avo_timelimit_days%3D0%26avo_timelimit_hours%3D0%26avo_timelimit_minutes%3D0%26avo_timelimit_seconds%3D30%26avo_logrow_limit%3D5000%26apply%3DApply%26selection%3D9c6dc88e-b7f4-44d1-b8f3-f8e01054e676%26host%3D<?php echo htmlspecialchars($_GET[toolkits]); ?>%26site%3Detf%26view_name%3Dhost%26mode%3Davailability%26av_mode%3Dtimeline" target="_blank">This toolkit's timeline of service availability</a><br>
    </div><br>
   <div class="tooltip" style="margin-left: 10px" id="cl-checkmk">
        <span class="tooltiptext">This is Check_MK-based service monitoring from the Experiments Testing Framework (ETF).  Ideally all tests show "Green".  If not, clicking on specificy tests can provide further details.</span>
        <a href="https://psetf.opensciencegrid.org/etf/check_mk/index.py?start_url=%2Fetf%2Fcheck_mk%2Fview.py%3Fhost%3D<?php echo htmlspecialchars($_GET[toolkits]); ?>%26site%3Detf%26view_name%3Dhost" target="_blank">Monitoring of this toolkit's services/configuration</a><br>
    </div><br>

 </div>
 <div id="no-custom-links">
   <textarea id="no-cust-text" style="vertical-align: middle;min-height: 80px;min-width: 400px;margin-right: 10px; margin-left: 10px">
	You have not selected a toolkit for customized links.
	Please use the above "Select toolkit" drop-down
        to pick a specific toolkit.
   </textarea>	
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
	var toolkit = "<?php echo htmlspecialchars($_GET[toolkits]); ?>";
	if ( typeof toolkit === 'undefined' || toolkit === null || toolkit == "") {
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
