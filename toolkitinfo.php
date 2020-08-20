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
<div class="navbar">

  <div class="dropdown">
    <a href="index.html"><button class="dropbtn">Main Page</button></a>
    <a href="documentation.html"><button class="dropbtn">Documentation</button></a>
    <a href="osgnetworkpipelines.html"><button class="dropbtn">OSG Network Pipelines</button></a>
    <a href="osgnetworkservices.html"><button class="dropbtn">OSG Network Services</button></a>
    <a href="analyticsanddashboards.html"><button class="dropbtn">Analytics and Dashboards</button></a>
    <a href="perfsonartoolkit.php"><button class="dropbtn">Toolkit Specific Page</button></a>
  </div>
</div>

</nav>
<article>
<h1> Please Select A Category Based on The Question You Have </h1>
<div class="row">
   <div class="column">
      <a href=https://www.google.com target="_blank"><button class="block">Test Button 1</button></a>
      <br> </br>
      <a href=https://www.google.com target="_blank"><button class="block">Test Button 3</button></a>
   </div>     
   <div class="column">
      <a href=https://www.google.com target="_blank"><button class="block">Test Button 2</button></a>
      <br> </br>
      <a href=https://www.google.com target="_blank"><button class="block">Test Button 4</button></a>
   </div>
</div>

</div>
</article>
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
       document.getElementById("Alarms").style.display="none";
       document.getElementById("ifr-nox509").style.display="none";
       <!-- document.getElementById("pS-collector").style.visibility="visible"; -->
       document.getElementById("Ingest").style.visibility="visible";
       document.getElementById("ITB-mon").style.visibility="visible";
       document.getElementById("Prod-mon").style.visibility="visible";
       document.getElementById("PL-alarm").style.visibility="visible";
       document.getElementById("PL-overview").style.visibility="visible";
       document.getElementById("PL-topN").style.visibility="visible";
       document.getElementById("OSG-net-docs").style.visibility="visible";
       document.getElementById("pS-docs").style.visibility="visible";
       document.getElementById("ES-Fasterdata").style.visibility="visible";
       document.getElementById("ES-trouble").style.visibility="visible";
       document.getElementById("MaDDash").style.visibility="visible";
       document.getElementById("pSConfig").style.visibility="visible";
       document.getElementById("psetf").style.visibility="visible";
       document.getElementById("WLCG-grafana").style.visibility="visible";
       document.getElementById("OSG-ELK-Analytics").style.visibility="visible";
       document.getElementById("pS-infrastructure").style.visibility="visible";
       document.getElementById("pS-Overview-PL").style.visibility="visible";
       document.getElementById("SAND").style.visibility="visible";
       document.getElementById("MEPHI-tr").style.visibility="visible";
       document.getElementById("cl-avail").style.visibility="visible";
       document.getElementById("cl-checkmk").style.visibility="visible";
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
