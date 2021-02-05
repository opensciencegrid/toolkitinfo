<?php
 $cookievar = $_GET[host];
 $expire = time()+1210000;
 setcookie("host",$cookievar,$expire);
?>

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

  <script src="js/jquery.min.js"></script>
  <script src="dist/js/standalone/selectize.js"></script>
  <script src="js/index.js"></script>
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>



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
   $csv = array_map('str_getcsv', file('/etc/devtestpython/testhostscan.csv'));
   foreach($csv as $location => $data)
   {
    $calculated_distance = distance($lat,$long,$data[0],$data[1],"K");
    $distance_array[$location][distance] = $calculated_distance;
    $distance_array[$location][host_name] = $data[2];
    $distance_array[$location][data_type] = $data[3];
   }
   $sorting = array_column($distance_array,'distance');
   array_multisort($sorting, SORT_ASC, $distance_array);
  ?>
 </div>
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


<div>
<?php
$alpha = array_values($alpha);
$phpjson = json_encode($distance_array);
$alphajson = json_encode($alpha);
?>
<p id="array"></p>
<script type="text/javascript">
 var data = <?php echo $phpjson ?>;
 var alpha = <?php echo $alphajson ?>;
</script>
</div>

<div id="wrapper">
<div class="demo">
<div class="control-group">
	<label for="alpha-tools">Select a Host Based on Alphabetical Order: </label>
	<select id="alpha-tools" placeholder="Search for a toolkit or data type, or enter your own (typo sensitive)..."></select>
</div>
<script>
// <select id="alpha-tools"></select>
$('#alpha-tools').selectize({
	maxItems: null,
	create: true,
	labelField: "data_type",
	valueField: "host_name",
	searchField: ["host_name","data_type"],
	options : alpha,
 	onChange: function(value) {
		var url = new URL('http://toolkitinfo.opensciencegrid.org/developertoolkitinfo/perfsonartoolkit.php');
		var search_params = url.searchParams;
		search_params.set('host', value);
		url.search = search_params.toString();
		console.log(url.search)
		var new_url = url.toString();
		console.log(new_url);
		document.location.replace(new_url);
	},
 	render: {
        	item: function(item, escape) {
            		return '<div>' +
                		(item.host_name ? '<span class="host_name">' + escape(item.host_name) + '</span>' : '') + '<br>' +
                		(item.data_type ? '<span class="data_type">' + escape(item.data_type) + '</span>' : '') +
            		'</div>';
        	},
        	option: function(item, escape) {
            		return '<div>' +
                		'<strong>' + escape(item.host_name) + ' - ' + '</strong>' +
				escape(item.data_type) + 
            		'</div>';
        	}
    	},
	create: function(input) {
		return {
			distance: 0,
			host_name: input,
			data_type: 'both'
		};
	}
});
</script>
</div>


<div class="demo">
<div class="control-group">
	<label for="select-tools">Select a Host Based on Distance:</label>
	<select id="select-tools" placeholder="Search for a toolkit or data type, or enter your own (typo sensitive)..."></select>
</div>
<script>
// <select id="select-tools"></select>
$('#select-tools').selectize({
	maxItems: null,
	create: true,
	labelField: "data_type",
	valueField: "host_name",
	searchField: ["host_name","data_type"],
	options : data,
 	onChange: function(value) {
		var url = new URL('http://toolkitinfo.opensciencegrid.org/developertoolkitinfo/perfsonartoolkit.php');
		var search_params = url.searchParams;
		search_params.set('host', value);
		url.search = search_params.toString();
		console.log(url.search)
		var new_url = url.toString();
		document.location.replace(new_url);
	},
	render: {
        	item: function(item, escape) {
            		return '<div>' +
                		(item.host_name ? '<span class="host_name">' + escape(item.host_name) + '</span>' : '') + '<br>' +
                		(item.data_type ? '<span class="data_type">' + escape(item.data_type) + '</span>' : '') +
            		'</div>';
        	},
        	option: function(item, escape) {
            		return '<div>' +
                		'<strong>' + escape(item.host_name) + ' - ' + '</strong>' +
				escape(item.data_type) + 
            		'</div>';
        	}
    	},
	create: function(input) {
		return {
			distance: 0,
			host_name: input,
			data_type: 'both'
		};
	}
});
</script>
</div>
</div>

<br> </br>


<?php
 $search = array_column($distance_array,'host_name');
 $samplehost = $_GET[host];
 function searchingfunc($z,$a) {
  $key = array_search($z,$a);
  return $key;
 }
 $typekey = searchingfunc($samplehost,$search);
 if(isset($samplehost) and empty($typekey)) {
  if($samplehost != $distance_array[0]['host_name']) {
   $typekey = count($distance_array);
   $distance_array[$typekey]['host_name'] = $samplehost;
   $distance_array[$typekey]['data_type'] = 'both';
   $distance_array[$typekey]['distance'] = 1;
  }
 }
?>

<?php
 if(isset($_COOKIE["host"])) {
  $savedcookie = $_COOKIE["host"];
 }
 $cookietype = searchingfunc($savedcookie,$search);
 if(isset($savedcookie) and empty($cookietype)) {
  if($savedcookie != $distance_array[0]['host_name']) {
   $cookietype = count($distance_array);
   $distance_array[$cookietype]['host_name'] = $savedcookie;
   $distance_array[$cookietype]['data_type'] = 'both';
   $distance_array[$cookietype]['distance'] = 1;
  }
 }
?>


</div>
<div id='normhost'>
<p style="color:white">Your selected perfSONAR Toolkit Host is: <b><?php echo htmlspecialchars($_GET[host]); ?> (<?php echo $distance_array[$typekey]['data_type'];?>)</b></p>
</div>
<div id ='cookie'>
<p style="color:white">The Last perfSONAR Toolkit Host you had selected is: <b><?php echo $savedcookie; ?> (<?php echo $distance_array[$cookietype]['data_type'];?>)</b></p>
</div>
<!--
<p style="color:white">Your selected perfSONAR Toolkit Site is: <b><?php echo htmlspecialchars($_GET[site]); ?></b></p>
-->

</nav>
 <article>



 <div id='both'>
 <h4> You have selected a toolkit host. If any of these issues are prevalent to your problem, please select them and your toolkit host will be both a source and destination </h4>
 <h4> NOTE: The toolkit host you selected is both a throughput and latency host. Therefore, all links are displayed </h4>
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
 </div>

 <div id='throughput'>
 <h4> You have selected a toolkit host. If any of these issues are prevalent to your problem, please select them and your toolkit host will be both a source and destination </h4>
 <h4> NOTE: The toolkit host you selected is a throughput host. Therefore, only links regarding throughput are displayed </h4>
 <div class='row'>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/35976890-d8ca-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20trace.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo htmlspecialchars($_GET[host]); ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo htmlspecialchars($_GET[host]); ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Trace%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Interested in the Path that Data Takes from your Site to Another?</button></a>
   <br> </br>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/68ec3520-d8cc-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20retransmits.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo htmlspecialchars($_GET[host]); ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo htmlspecialchars($_GET[host]); ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Retransmits%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Seeing a lot of Retransmitted Data for your Site?</button></a>
  </div>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/57e3c0b0-d7f3-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20throughput.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo htmlspecialchars($_GET[host]); ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo htmlspecialchars($_GET[host]); ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Throughput%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Seeing a lot of Throughput Issues for your Site?</button></a>
   <br> </br>
  </div>
 </div>
 </div>

 <div id='latency'>
 <h4> You have selected a toolkit host. If any of these issues are prevalent to your problem, please select them and your toolkit host will be both a source and destination </h4>
 <h4> NOTE: The toolkit host you selected is a latency host. Therefore, only links regardling latency are displayed </h4>
 <div class='row'>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/82552400-d8cb-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20packetloss.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo htmlspecialchars($_GET[host]); ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo htmlspecialchars($_GET[host]); ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Packetloss%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Do You Suspect a lot of Packetloss When Transmitting Data to Another Site? </button></a>
   <br> </br>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/35976890-d8ca-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20trace.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo htmlspecialchars($_GET[host]); ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo htmlspecialchars($_GET[host]); ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Trace%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Interested in the Path that Data Takes from your Site to Another?</button></a>
   <br> </br>
  </div>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/a1ce0000-d8d4-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20One-Way%20Delay.',filters:!(('$state':(store:appState),meta:(alias:!n,disabled:!f,index:b1029d00-e61d-11ea-9ef7-e1db34380ad3,key:dest_site,negate:!t,params:(query:IEPSAS-Kosice),type:phrase),query:(match_phrase:(dest_site:IEPSAS-Kosice))),('$state':(store:appState),meta:(alias:!n,disabled:!f,index:b1029d00-e61d-11ea-9ef7-e1db34380ad3,key:src_site,negate:!t,params:(query:IEPSAS-Kosice),type:phrase),query:(match_phrase:(src_site:IEPSAS-Kosice)))),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo htmlspecialchars($_GET[host]); ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo htmlspecialchars($_GET[host]); ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20One-Way%20Delay%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Do you Suspect Slow Connections between your Site and Another?</button></a>
  </div>
 </div>
 </div>

 <div id='neither'>
 <h4> You have selected a toolkit host. If any of these issues are prevalent to your problem, please select them and your toolkit host will be both a source and destination </h4>
 <div class='row'>
  <div class='column'>
    <h3> NOTE: The toolkit host you selected is neither a throughput nor latency host. Therefore, no links are displayed. Please choose another toolkit host and contact the owner of the toolkit host for more information</h3>
  </div>
 </div>
 </div>




 <div id='cboth'>
 <h4> You have selected a toolkit host. If any of these issues are prevalent to your problem, please select them and your toolkit host will be both a source and destination </h4>
 <h4> NOTE: The toolkit host you selected is both a throughput and latency host. Therefore, all links are displayed </h4>
 <div class='row'>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/82552400-d8cb-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20packetloss.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo $savedcookie; ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo $savedcookie; ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Packetloss%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Do You Suspect a lot of Packetloss When Transmitting Data to Another Site? </button></a>
   <br> </br>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/35976890-d8ca-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20trace.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo $savedcookie; ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo $savedcookie; ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Trace%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Interested in the Path that Data Takes from your Site to Another?</button></a>
   <br> </br>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/a1ce0000-d8d4-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20One-Way%20Delay.',filters:!(('$state':(store:appState),meta:(alias:!n,disabled:!f,index:b1029d00-e61d-11ea-9ef7-e1db34380ad3,key:dest_site,negate:!t,params:(query:IEPSAS-Kosice),type:phrase),query:(match_phrase:(dest_site:IEPSAS-Kosice))),('$state':(store:appState),meta:(alias:!n,disabled:!f,index:b1029d00-e61d-11ea-9ef7-e1db34380ad3,key:src_site,negate:!t,params:(query:IEPSAS-Kosice),type:phrase),query:(match_phrase:(src_site:IEPSAS-Kosice)))),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo $savedcookie; ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo $savedcookie; ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20One-Way%20Delay%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Do you Suspect Slow Connections between your Site and Another?</button></a>
  </div>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/57e3c0b0-d7f3-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20throughput.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo $savedcookie; ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo $savedcookie; ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Throughput%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Seeing a lot of Throughput Issues for your Site?</button></a>
   <br> </br>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/68ec3520-d8cc-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20retransmits.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo $savedcookie; ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo $savedcookie; ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Retransmits%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Seeing a lot of Retransmitted Data for your Site?</button></a>
  </div>
 </div>
 </div>

 <div id='cthroughput'>
 <h4> You have selected a toolkit host. If any of these issues are prevalent to your problem, please select them and your toolkit host will be both a source and destination </h4>
 <h4> NOTE: The toolkit host you selected is a throughput host. Therefore, only links regarding throughput are displayed </h4>
 <div class='row'>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/35976890-d8ca-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20trace.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo $savedcookie; ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo $savedcookie; ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Trace%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Interested in the Path that Data Takes from your Site to Another?</button></a>
   <br> </br>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/68ec3520-d8cc-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20retransmits.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo $savedcookie; ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo $savedcookie; ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Retransmits%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Seeing a lot of Retransmitted Data for your Site?</button></a>
  </div>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/57e3c0b0-d7f3-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20throughput.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo $savedcookie; ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo $savedcookie; ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Throughput%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Seeing a lot of Throughput Issues for your Site?</button></a>
   <br> </br>
  </div>
 </div>
 </div>

 <div id='clatency'>
 <h4> You have selected a toolkit host. If any of these issues are prevalent to your problem, please select them and your toolkit host will be both a source and destination </h4>
 <h4> NOTE: The toolkit host you selected is a latency host. Therefore, only links regardling latency are displayed </h4>
 <div class='row'>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/82552400-d8cb-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20packetloss.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo $savedcookie; ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo $savedcookie; ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Packetloss%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Do You Suspect a lot of Packetloss When Transmitting Data to Another Site? </button></a>
   <br> </br>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/35976890-d8ca-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20trace.',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo $savedcookie; ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo $savedcookie; ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20Trace%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Are You Interested in the Path that Data Takes from your Site to Another?</button></a>
   <br> </br>
  </div>
  <div class='column'>
   <a href=https://atlas-kibana.mwt2.org:5601/s/networking/app/kibana#/dashboard/a1ce0000-d8d4-11ea-9344-2da4788d78a4?_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:now-1d,to:now))&_a=(description:'This%20dashboard%20allows%20for%20the%20user%20to%20select%20both%20the%20source%20host,%20as%20well%20as%20any%20destination%20it%20may%20apply%20to,%20so%20to%20give%20all%20of%20the%20relevant%20information%20about%20the%20given%20parameters.%20This%20dashboard%20primarily%20focuses%20on%20the%20One-Way%20Delay.',filters:!(('$state':(store:appState),meta:(alias:!n,disabled:!f,index:b1029d00-e61d-11ea-9ef7-e1db34380ad3,key:dest_site,negate:!t,params:(query:IEPSAS-Kosice),type:phrase),query:(match_phrase:(dest_site:IEPSAS-Kosice))),('$state':(store:appState),meta:(alias:!n,disabled:!f,index:b1029d00-e61d-11ea-9ef7-e1db34380ad3,key:src_site,negate:!t,params:(query:IEPSAS-Kosice),type:phrase),query:(match_phrase:(src_site:IEPSAS-Kosice)))),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:'(src_host:<?php echo $savedcookie; ?>%20AND%20dest_host:*)%20OR%20(src_host:*%20AND%20dest_host:<?php echo $savedcookie; ?>)'),timeRestore:!f,title:'Site-Based%20perfsonar%20One-Way%20Delay%20Breakdown%20ts-ih',viewMode:view) target='_blank'><button class='block'>Do you Suspect Slow Connections between your Site and Another?</button></a>
  </div>
 </div>
 </div>

 </article>

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


<script>
	var host = "<?php echo htmlspecialchars($_GET[host]); ?>";
        var cookies = "<?php echo $savedcookie; ?>";
        var cookiestype = "<?php echo $distance_array[$cookietype]['data_type']; ?>";
	if ( typeof host === 'undefined' || host === null || host == "") {
           if ( typeof cookies === 'undefined' || cookies === null || cookies == "") {
              document.getElementById("no-cust-text").style.display="inline";
              document.getElementById("both").style.display="none";
              document.getElementById("latency").style.display="none";
              document.getElementById("throughput").style.display="none";
              document.getElementById("cboth").style.display="none";
              document.getElementById("clatency").style.display="none";
              document.getElementById("cthroughput").style.display="none";
              document.getElementById("neither").style.display="none";
              document.getElementById("normhost").style.display="inline";
              document.getElementById("cookie").style.display="none";
          } else {
              if ( cookiestype === 'latency') {
                 document.getElementById("no-cust-text").style.display="none";
                 document.getElementById("both").style.display="none";
                 document.getElementById("latency").style.display="none";
                 document.getElementById("throughput").style.display="none";
                 document.getElementById("cboth").style.display="none";
                 document.getElementById("clatency").style.display="inline";
                 document.getElementById("cthroughput").style.display="none";
                 document.getElementById("neither").style.display="none";
                 document.getElementById("normhost").style.display="none";
                 document.getElementById("cookie").style.display="inline";
              } if ( cookiestype === 'throughput') {
                 document.getElementById("no-cust-text").style.display="none";
                 document.getElementById("both").style.display="none";
                 document.getElementById("latency").style.display="none";
                 document.getElementById("throughput").style.display="none";
                 document.getElementById("cboth").style.display="none";
                 document.getElementById("clatency").style.display="none";
                 document.getElementById("cthroughput").style.display="inline";
                 document.getElementById("neither").style.display="none";
                 document.getElementById("normhost").style.display="none";
                 document.getElementById("cookie").style.display="inline";
              } if ( cookiestype === 'both') {
                 document.getElementById("no-cust-text").style.display="none";
                 document.getElementById("both").style.display="none";
                 document.getElementById("latency").style.display="none";
                 document.getElementById("throughput").style.display="none";
                 document.getElementById("cboth").style.display="inline";
                 document.getElementById("clatency").style.display="none";
                 document.getElementById("cthroughput").style.display="none";
                 document.getElementById("neither").style.display="none";
                 document.getElementById("normhost").style.display="none";
                 document.getElementById("cookie").style.display="inline";
              } if ( cookiestype === 'neither') {
                 document.getElementById("no-cust-text").style.display="none";
                 document.getElementById("both").style.display="none";
                 document.getElementById("latency").style.display="none";
                 document.getElementById("throughput").style.display="none";
                 document.getElementById("cboth").style.display="none";
                 document.getElementById("clatency").style.display="none";
                 document.getElementById("cthroughput").style.display="none";
                 document.getElementById("neither").style.display="inline";
                 document.getElementById("normhost").style.display="none";
                 document.getElementById("cookie").style.display="inline";
              }
          }
	} else {
           var data = "<?php echo $distance_array[$typekey]['data_type']; ?>";
           if ( data === 'latency') {
              document.getElementById("both").style.display="none";
              document.getElementById("no-cust-text").style.display="none";
              document.getElementById("latency").style.display="inline";
              document.getElementById("throughput").style.display="none";
              document.getElementById("cboth").style.display="none";
              document.getElementById("clatency").style.display="none";
              document.getElementById("cthroughput").style.display="none";
              document.getElementById("neither").style.display="none";
              document.getElementById("normhost").style.display="inline";
              document.getElementById("cookie").style.display="none";
           } if ( data === 'throughput') {
              document.getElementById("both").style.display="none";
              document.getElementById("no-cust-text").style.display="none";
              document.getElementById("latency").style.display="none";
              document.getElementById("throughput").style.display="inline";
              document.getElementById("cboth").style.display="none";
              document.getElementById("clatency").style.display="none";
              document.getElementById("cthroughput").style.display="none";
              document.getElementById("neither").style.display="none";
              document.getElementById("normhost").style.display="inline";
              document.getElementById("cookie").style.display="none";
           } if ( data === 'neither') {
              document.getElementById("both").style.display="none";
              document.getElementById("no-cust-text").style.display="none";
              document.getElementById("latency").style.display="none";
              document.getElementById("throughput").style.display="none";
              document.getElementById("cboth").style.display="none";
              document.getElementById("clatency").style.display="none";
              document.getElementById("cthroughput").style.display="none";
              document.getElementById("neither").style.display="inline";
              document.getElementById("normhost").style.display="inline";
              document.getElementById("cookie").style.display="none";
           } if ( data === 'both') {
              document.getElementById("both").style.display="inline";
              document.getElementById("no-cust-text").style.display="none";
              document.getElementById("latency").style.display="none";
              document.getElementById("throughput").style.display="none";
              document.getElementById("cboth").style.display="none";
              document.getElementById("clatency").style.display="none";
              document.getElementById("cthroughput").style.display="none";
              document.getElementById("neither").style.display="none";
              document.getElementById("normhost").style.display="inline";
              document.getElementById("cookie").style.display="none";
           }
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
