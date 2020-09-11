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
    <div class="form">
      <form action="/toolkitinfo/perfsonartoolkit.php" method="get">
      <label for="toolkits" style="color:black">Select toolkit: <input list="toolkits" name="toolkits" type="text"></label>
      <input type="submit" value="Submit">
        <datalist id = "toolkits">
        <option value = ''></option>
        <option value = alice14.spbu.ru>alice14.spbu.ru</option>
        <option value = atlas-bwctl.bu.edu>atlas-bwctl.bu.edu</option>
        <option value = atlas-npt1.bu.edu>atlas-npt1.bu.edu</option>
        <option value = atlas-npt2.bu.edu>atlas-npt2.bu.edu</option>
        <option value = atlas-owamp.bu.edu>atlas-owamp.bu.edu</option>
        <option value = atrogr007.nipne.ro>atrogr007.nipne.ro</option>
        <option value = atrogr009.nipne.ro>atrogr009.nipne.ro</option>
        <option value = bdw.scinet.utoronto.ca>bdw.scinet.utoronto.ca</option>
        <option value = btw-bw.grid.kiae.ru>btw-bw.grid.kiae.ru</option>
        <option value = btw-bw.t1.grid.kiae.ru>btw-bw.t1.grid.kiae.ru</option>
        <option value = btw-lat.grid.kiae.ru>btw-lat.grid.kiae.ru</option>
        <option value = btw-lat.t1.grid.kiae.ru>btw-lat.t1.grid.kiae.ru</option>
        <option value = ccperfsonar1.in2p3.fr>ccperfsonar1.in2p3.fr</option>
        <option value = ccperfsonar2.in2p3.fr>ccperfsonar2.in2p3.fr</option>
        <option value = clrperf-bwctl.in2p3.fr>clrperf-bwctl.in2p3.fr</option>
        <option value = clrperf-owamp.in2p3.fr>clrperf-owamp.in2p3.fr</option>
        <option value = cmsps1.rc.ufl.edu>cmsps1.rc.ufl.edu</option>
        <option value = cmsrm-perfsonar1.roma1.infn.it>cmsrm-perfsonar1.roma1.infn.it</option>
        <option value = dice-io-37-00.acrc.bris.ac.uk>dice-io-37-00.acrc.bris.ac.uk</option>
        <option value = epgperf.ph.bham.ac.uk>epgperf.ph.bham.ac.uk</option>
        <option value = fiona-r-uva.vlan7.uvalight.net>fiona-r-uva.vlan7.uvalight.net</option>
        <option value = grid-perf1.physik.rwth-aachen.de>grid-perf1.physik.rwth-aachen.de</option>
        <option value = grid-perf2.physik.rwth-aachen.de>grid-perf2.physik.rwth-aachen.de</option>
        <option value = grid-perfsonar.hpc.susx.ac.uk>grid-perfsonar.hpc.susx.ac.uk</option>
        <option value = gridpp-ps-band.ecdf.ed.ac.uk>gridpp-ps-band.ecdf.ed.ac.uk</option>
        <option value = gridpp-ps-lat.ecdf.ed.ac.uk>gridpp-ps-lat.ecdf.ed.ac.uk</option>
        <option value = hcc-ps01.unl.edu>hcc-ps01.unl.edu</option>
        <option value = hcc-ps02.unl.edu>hcc-ps02.unl.edu</option>
        <option value = hep-ps-bw-bp.pp.rl.ac.uk>hep-ps-bw-bp.pp.rl.ac.uk</option>
        <option value = hep-ps-lt-bp.pp.rl.ac.uk>hep-ps-lt-bp.pp.rl.ac.uk</option>
        <option value = hep-sonar.ecm.ub.es>hep-sonar.ecm.ub.es</option>
        <option value = heplnx129.pp.rl.ac.uk>heplnx129.pp.rl.ac.uk</option>
        <option value = heplnx130.pp.rl.ac.uk>heplnx130.pp.rl.ac.uk</option>
        <option value = hepsonar1.ph.liv.ac.uk>hepsonar1.ph.liv.ac.uk</option>
        <option value = hepsonar2.ph.liv.ac.uk>hepsonar2.ph.liv.ac.uk</option>
        <option value = ingrid-ps01.cism.ucl.ac.be>ingrid-ps01.cism.ucl.ac.be</option>
        <option value = ingrid-ps02.cism.ucl.ac.be>ingrid-ps02.cism.ucl.ac.be</option>
        <option value = iut2-net1.iu.edu>iut2-net1.iu.edu</option>
        <option value = iut2-net2.iu.edu>iut2-net2.iu.edu</option>
        <option value = iut2-net3.iu.edu>iut2-net3.iu.edu</option>
        <option value = iut2-net4.iu.edu>iut2-net4.iu.edu</option>
        <option value = iut2-net5.iu.edu>iut2-net5.iu.edu</option>
        <option value = iut2-net6.iu.edu>iut2-net6.iu.edu</option>
        <option value = iut2-net7.iu.edu>iut2-net7.iu.edu</option>
        <option value = iut2-net8.iu.edu>iut2-net8.iu.edu</option>
        <option value = lapp-ps01.in2p3.fr>lapp-ps01.in2p3.fr</option>
        <option value = lapp-ps02.in2p3.fr>lapp-ps02.in2p3.fr</option>
        <option value = lat.scinet.utoronto.ca>lat.scinet.utoronto.ca</option>
        <option value = lcg-bw.sfu.computecanada.ca>lcg-bw.sfu.computecanada.ca</option>
        <option value = lcg-lat.sfu.computecanada.ca>lcg-lat.sfu.computecanada.ca</option>
        <option value = lcg-psbw.uw.computecanada.ca>lcg-psbw.uw.computecanada.ca</option>
        <option value = lcg-pslat.uw.computecanada.ca>lcg-pslat.uw.computecanada.ca</option>
        <option value = lcg-sonar01.hep.ucl.ac.uk>lcg-sonar01.hep.ucl.ac.uk</option>
        <option value = lcgnetmon02.phy.bris.ac.uk>lcgnetmon02.phy.bris.ac.uk</option>
        <option value = lcgnetmon.phy.bris.ac.uk>lcgnetmon.phy.bris.ac.uk</option>
        <option value = lcgperf.shef.ac.uk>lcgperf.shef.ac.uk</option>
        <option value = lcgperfradar.dnp.fmph.uniba.sk>lcgperfradar.dnp.fmph.uniba.sk</option>
        <option value = lcgperfsonar.dnp.fmph.uniba.sk>lcgperfsonar.dnp.fmph.uniba.sk</option>
        <option value = lcgps01.gridpp.rl.ac.uk>lcgps01.gridpp.rl.ac.uk</option>
        <option value = lcgps02.gridpp.rl.ac.uk>lcgps02.gridpp.rl.ac.uk</option>
        <option value = lhc-bandwidth.twgrid.org>lhc-bandwidth.twgrid.org</option>
        <option value = lhc-latency.twgrid.org>lhc-latency.twgrid.org</option>
        <option value = lhcb-perf.nipne.ro>lhcb-perf.nipne.ro</option>
        <option value = lhcmon.bnl.gov>lhcmon.bnl.gov</option>
        <option value = lhcone-star-opt1.es.net>lhcone-star-opt1.es.net</option>
        <option value = lhcone-wash-opt1.es.net>lhcone-wash-opt1.es.net</option>
        <option value = lhcone.test.manlan.internet2.edu>lhcone.test.manlan.internet2.edu</option>
        <option value = lhcone.test.wix.internet2.edu>lhcone.test.wix.internet2.edu</option>
        <option value = lhcperfmon.bnl.gov>lhcperfmon.bnl.gov</option>
        <option value = llrpsonar1.in2p3.fr>llrpsonar1.in2p3.fr</option>
        <option value = llrpsonar2.in2p3.fr>llrpsonar2.in2p3.fr</option>
        <option value = lpnhe-psb.in2p3.fr>lpnhe-psb.in2p3.fr</option>
        <option value = lpnhe-psl.in2p3.fr>lpnhe-psl.in2p3.fr</option>
        <option value = lpsc-perfsonar2.in2p3.fr>lpsc-perfsonar2.in2p3.fr</option>
        <option value = lpsc-perfsonar.in2p3.fr>lpsc-perfsonar.in2p3.fr</option>
        <option value = lutps1.lunet.edu>lutps1.lunet.edu</option>
        <option value = lutps.lunet.edu>lutps.lunet.edu</option>
        <option value = marperf01.in2p3.fr>marperf01.in2p3.fr</option>
        <option value = marperf02.in2p3.fr>marperf02.in2p3.fr</option>
        <option value = mercury-1.lsr.nectec.or.th>mercury-1.lsr.nectec.or.th</option>
        <option value = mercury-2.lsr.nectec.or.th>mercury-2.lsr.nectec.or.th</option>
        <option value = mwt2-ps01.campuscluster.illinois.edu>mwt2-ps01.campuscluster.illinois.edu</option>
        <option value = mwt2-ps02.campuscluster.illinois.edu>mwt2-ps02.campuscluster.illinois.edu</option>
        <option value = mwt2-ps03.campuscluster.illinois.edu>mwt2-ps03.campuscluster.illinois.edu</option>
        <option value = mwt2-ps04.campuscluster.illinois.edu>mwt2-ps04.campuscluster.illinois.edu</option>
        <option value = nanperfs01.in2p3.fr>nanperfs01.in2p3.fr</option>
        <option value = nanperfs02.in2p3.fr>nanperfs02.in2p3.fr</option>
        <option value = netmon1.atlas-swt2.org>netmon1.atlas-swt2.org</option>
        <option value = netmon2.atlas-swt2.org>netmon2.atlas-swt2.org</option>
        <option value = nettest.lbl.gov>nettest.lbl.gov</option>
        <option value = osg.chic.nrp.internet2.edu>osg.chic.nrp.internet2.edu</option>
        <option value = osg.kans.nrp.internet2.edu>osg.kans.nrp.internet2.edu</option>
        <option value = osg.newy32aoa.nrp.internet2.edu>osg.newy32aoa.nrp.internet2.edu</option>
        <option value = pc138.physics.uoi.gr>pc138.physics.uoi.gr</option>
        <option value = perfbw.ciemat.es>perfbw.ciemat.es</option>
        <option value = perflat.ciemat.es>perflat.ciemat.es</option>
        <option value = perfson1.ppgrid1.rhul.ac.uk>perfson1.ppgrid1.rhul.ac.uk</option>
        <option value = perfson1.zeuthen.desy.de>perfson1.zeuthen.desy.de</option>
        <option value = perfson2.zeuthen.desy.de>perfson2.zeuthen.desy.de</option>
        <option value = perfsonar01-iep-grid.saske.sk>perfsonar01-iep-grid.saske.sk</option>
        <option value = perfsonar1.cc.kek.jp>perfsonar1.cc.kek.jp</option>
        <option value = perfsonar01.cmsaf.mit.edu>perfsonar01.cmsaf.mit.edu</option>
        <option value = perfsonar01.datagrid.cea.fr>perfsonar01.datagrid.cea.fr</option>
        <option value = perfsonar1.ebi.ac.uk>perfsonar1.ebi.ac.uk</option>
        <option value = perfsonar01.ft.uam.es>perfsonar01.ft.uam.es</option>
        <option value = perfsonar01.goegrid.gwdg.de>perfsonar01.goegrid.gwdg.de</option>
        <option value = perfsonar01.grid.cyfronet.pl>perfsonar01.grid.cyfronet.pl</option>
        <option value = perfsonar1.hep.kbfi.ee>perfsonar1.hep.kbfi.ee</option>
        <option value = perfsonar01.hep.wisc.edu>perfsonar01.hep.wisc.edu</option>
        <option value = perfsonar01.hephy.oeaw.ac.at>perfsonar01.hephy.oeaw.ac.at</option>
        <option value = perfsonar1.icepp.jp>perfsonar1.icepp.jp</option>
        <option value = perfsonar1.ihepa.ufl.edu>perfsonar1.ihepa.ufl.edu</option>
        <option value = perfsonar01.lcg.cscs.ch>perfsonar01.lcg.cscs.ch</option>
        <option value = perfsonar1.mi.infn.it>perfsonar1.mi.infn.it</option>
        <option value = perfsonar1.nipne.ro>perfsonar1.nipne.ro</option>
        <option value = perfsonar1.pi.infn.it>perfsonar1.pi.infn.it</option>
        <option value = perfsonar1.recas.ba.infn.it>perfsonar1.recas.ba.infn.it</option>
        <option value = perfsonar1.roma1.infn.it>perfsonar1.roma1.infn.it</option>
        <option value = perfsonar2-de-kit.gridka.de>perfsonar2-de-kit.gridka.de</option>
        <option value = perfsonar2-grid.uaic.ro>perfsonar2-grid.uaic.ro</option>
        <option value = perfsonar02-iep-grid.saske.sk>perfsonar02-iep-grid.saske.sk</option>
        <option value = perfsonar2.cc.kek.jp>perfsonar2.cc.kek.jp</option>
        <option value = perfsonar02.cmsaf.mit.edu>perfsonar02.cmsaf.mit.edu</option>
        <option value = perfsonar02.datagrid.cea.fr>perfsonar02.datagrid.cea.fr</option>
        <option value = perfsonar02.ft.uam.es>perfsonar02.ft.uam.es</option>
        <option value = perfsonar2.hep.kbfi.ee>perfsonar2.hep.kbfi.ee</option>
        <option value = perfsonar02.hep.wisc.edu>perfsonar02.hep.wisc.edu</option>
        <option value = perfsonar02.hephy.oeaw.ac.at>perfsonar02.hephy.oeaw.ac.at</option>
        <option value = perfsonar2.icepp.jp>perfsonar2.icepp.jp</option>
        <option value = perfsonar2.ihep.ac.cn>perfsonar2.ihep.ac.cn</option>
        <option value = perfsonar2.ihepa.ufl.edu>perfsonar2.ihepa.ufl.edu</option>
        <option value = perfsonar02.lcg.cscs.ch>perfsonar02.lcg.cscs.ch</option>
        <option value = perfsonar2.mi.infn.it>perfsonar2.mi.infn.it</option>
        <option value = perfsonar2.na.infn.it>perfsonar2.na.infn.it</option>
        <option value = perfsonar2.nipne.ro>perfsonar2.nipne.ro</option>
        <option value = perfsonar2.physics.science.az>perfsonar2.physics.science.az</option>
        <option value = perfsonar2.pi.infn.it>perfsonar2.pi.infn.it</option>
        <option value = perfsonar2.recas.ba.infn.it>perfsonar2.recas.ba.infn.it</option>
        <option value = perfsonar2.roma1.infn.it>perfsonar2.roma1.infn.it</option>
        <option value = perfsonar2.ultralight.org>perfsonar2.ultralight.org</option>
        <option value = perfsonar3.cc.kek.jp>perfsonar3.cc.kek.jp</option>
        <option value = perfsonar40-otc.hnsc.otc-service.com>perfsonar40-otc.hnsc.otc-service.com</option>
        <option value = perfsonar-1.t2.ucsd.edu>perfsonar-1.t2.ucsd.edu</option>
        <option value = perfsonar-2.t2.ucsd.edu>perfsonar-2.t2.ucsd.edu</option>
        <option value = perfsonar-alice.sut.ac.th>perfsonar-alice.sut.ac.th</option>
        <option value = perfsonar-b.ct.infn.it>perfsonar-b.ct.infn.it</option>
        <option value = perfsonar-bandwidth.esc.qmul.ac.uk>perfsonar-bandwidth.esc.qmul.ac.uk</option>
        <option value = perfsonar-bandwidth.grid.pub.ro>perfsonar-bandwidth.grid.pub.ro</option>
        <option value = perfsonar-bandwidth.grid.surfsara.nl>perfsonar-bandwidth.grid.surfsara.nl</option>
        <option value = perfsonar-bw.sprace.org.br>perfsonar-bw.sprace.org.br</option>
        <option value = perfsonar-bw.tier2.hep.manchester.ac.uk>perfsonar-bw.tier2.hep.manchester.ac.uk</option>
        <option value = perfsonar-bwctl.accre.vanderbilt.edu>perfsonar-bwctl.accre.vanderbilt.edu</option>
        <option value = perfsonar-cms1.itns.purdue.edu>perfsonar-cms1.itns.purdue.edu</option>
        <option value = perfsonar-cms2.itns.purdue.edu>perfsonar-cms2.itns.purdue.edu</option>
        <option value = perfsonar-cms-2.sc.chula.ac.th>perfsonar-cms-2.sc.chula.ac.th</option>
        <option value = perfsonar-collector>perfsonar-collector</option>
        <option value = perfsonar-de-kit.gridka.de>perfsonar-de-kit.gridka.de</option>
        <option value = perfsonar-fra-1.exoscale.ch>perfsonar-fra-1.exoscale.ch</option>
        <option value = perfsonar-grid.uaic.ro>perfsonar-grid.uaic.ro</option>
        <option value = perfsonar-gva-1.exoscale.ch>perfsonar-gva-1.exoscale.ch</option>
        <option value = perfsonar-l.ct.infn.it>perfsonar-l.ct.infn.it</option>
        <option value = perfsonar-latency.esc.qmul.ac.uk>perfsonar-latency.esc.qmul.ac.uk</option>
        <option value = perfsonar-latency.grid.pub.ro>perfsonar-latency.grid.pub.ro</option>
        <option value = perfsonar-latency.grid.surfsara.nl>perfsonar-latency.grid.surfsara.nl</option>
        <option value = perfsonar-lt.sprace.org.br>perfsonar-lt.sprace.org.br</option>
        <option value = perfsonar-lt.tier2.hep.manchester.ac.uk>perfsonar-lt.tier2.hep.manchester.ac.uk</option>
        <option value = perfsonar-ow.cnaf.infn.it>perfsonar-ow.cnaf.infn.it</option>
        <option value = perfsonar-owamp.accre.vanderbilt.edu>perfsonar-owamp.accre.vanderbilt.edu</option>
        <option value = perfsonar-ps2.ndgf.org>perfsonar-ps2.ndgf.org</option>
        <option value = perfsonar-ps-01.desy.de>perfsonar-ps-01.desy.de</option>
        <option value = perfsonar-ps-02.desy.de>perfsonar-ps-02.desy.de</option>
        <option value = perfsonar-ps-03.desy.de>perfsonar-ps-03.desy.de</option>
        <option value = perfsonar-ps-04.desy.de>perfsonar-ps-04.desy.de</option>
        <option value = perfsonar-ps-bandwidth.igfae.usc.es>perfsonar-ps-bandwidth.igfae.usc.es</option>
        <option value = perfsonar-ps-latency.igfae.usc.es>perfsonar-ps-latency.igfae.usc.es</option>
        <option value = perfsonar-ps.cnaf.infn.it>perfsonar-ps.cnaf.infn.it</option>
        <option value = perfsonar-ps.ndgf.org>perfsonar-ps.ndgf.org</option>
        <option value = perfsonar-test1.kek.jp>perfsonar-test1.kek.jp</option>
        <option value = perfsonar-test2.kek.jp>perfsonar-test2.kek.jp</option>
        <option value = perfsonar-test3.kek.jp>perfsonar-test3.kek.jp</option>
        <option value = perfsonar.cscs.ch>perfsonar.cscs.ch</option>
        <option value = perfsonar.dur.scotgrid.ac.uk>perfsonar.dur.scotgrid.ac.uk</option>
        <option value = perfsonar.ihep.ac.cn>perfsonar.ihep.ac.cn</option>
        <option value = perfsonar.na.infn.it>perfsonar.na.infn.it</option>
        <option value = perfsonar.nersc.gov>perfsonar.nersc.gov</option>
        <option value = perfsonar.ornl.gov>perfsonar.ornl.gov</option>
        <option value = perfsonar.physics.science.az>perfsonar.physics.science.az</option>
        <option value = perfsonar.pleiades.uni-wuppertal.de>perfsonar.pleiades.uni-wuppertal.de</option>
        <option value = perfsonar.pnpi.nw.ru>perfsonar.pnpi.nw.ru</option>
        <option value = perfsonar.ultralight.org>perfsonar.ultralight.org</option>
        <option value = perfsonar.unl.edu>perfsonar.unl.edu</option>
        <option value = ps01-l.farm.particle.cz>ps01-l.farm.particle.cz</option>
        <option value = ps01.bfg.uni-freiburg.de>ps01.bfg.uni-freiburg.de</option>
        <option value = ps01.cat.cbpf.br>ps01.cat.cbpf.br</option>
        <option value = ps001.gla.scotgrid.ac.uk>ps001.gla.scotgrid.ac.uk</option>
        <option value = ps01.iihe.ac.be>ps01.iihe.ac.be</option>
        <option value = ps1.kipt.kharkov.ua>ps1.kipt.kharkov.ua</option>
        <option value = ps0001.m45.ihep.su>ps0001.m45.ihep.su</option>
        <option value = ps01.ncg.ingrid.pt>ps01.ncg.ingrid.pt</option>
        <option value = ps1.ochep.ou.edu>ps1.ochep.ou.edu</option>
        <option value = ps02-b.farm.particle.cz>ps02-b.farm.particle.cz</option>
        <option value = ps02.bfg.uni-freiburg.de>ps02.bfg.uni-freiburg.de</option>
        <option value = ps02.cat.cbpf.br>ps02.cat.cbpf.br</option>
        <option value = ps002.gla.scotgrid.ac.uk>ps002.gla.scotgrid.ac.uk</option>
        <option value = ps02.iihe.ac.be>ps02.iihe.ac.be</option>
        <option value = ps2.kipt.kharkov.ua>ps2.kipt.kharkov.ua</option>
        <option value = ps0002.m45.ihep.su>ps0002.m45.ihep.su</option>
        <option value = ps02.ncg.ingrid.pt>ps02.ncg.ingrid.pt</option>
        <option value = ps2.ochep.ou.edu>ps2.ochep.ou.edu</option>
        <option value = ps2.truba.gov.tr>ps2.truba.gov.tr</option>
        <option value = ps3.ochep.ou.edu>ps3.ochep.ou.edu</option>
        <option value = ps-01.lnl.infn.it>ps-01.lnl.infn.it</option>
        <option value = ps-02.lnl.infn.it>ps-02.lnl.infn.it</option>
        <option value = ps-bandwidth.atlas.unimelb.edu.au>ps-bandwidth.atlas.unimelb.edu.au</option>
        <option value = ps-bandwidth.clumeq.mcgill.ca>ps-bandwidth.clumeq.mcgill.ca</option>
        <option value = ps-bandwidth.hep.pnnl.gov>ps-bandwidth.hep.pnnl.gov</option>
        <option value = ps-bandwidth.hepnetcanada.ca>ps-bandwidth.hepnetcanada.ca</option>
        <option value = ps-bandwidth.lhcmon.triumf.ca>ps-bandwidth.lhcmon.triumf.ca</option>
        <option value = ps-bandwidth.sfu.westgrid.ca>ps-bandwidth.sfu.westgrid.ca</option>
        <option value = ps-development.bnl.gov>ps-development.bnl.gov</option>
        <option value = ps-gsdc01.sdfarm.kr>ps-gsdc01.sdfarm.kr</option>
        <option value = ps-gsdc02.sdfarm.kr>ps-gsdc02.sdfarm.kr</option>
        <option value = ps-hpc-management.net.uconn.edu>ps-hpc-management.net.uconn.edu</option>
        <option value = ps-latency.atlas.unimelb.edu.au>ps-latency.atlas.unimelb.edu.au</option>
        <option value = ps-latency.clumeq.mcgill.ca>ps-latency.clumeq.mcgill.ca</option>
        <option value = ps-latency.hep.pnnl.gov>ps-latency.hep.pnnl.gov</option>
        <option value = ps-latency.hepnetcanada.ca>ps-latency.hepnetcanada.ca</option>
        <option value = ps-latency.lhcmon.triumf.ca>ps-latency.lhcmon.triumf.ca</option>
        <option value = ps-londhx1.ja.net>ps-londhx1.ja.net</option>
        <option value = ps.ncp.edu.pk>ps.ncp.edu.pk</option>
        <option value = ps.truba.gov.tr>ps.truba.gov.tr</option>
        <option value = psaanl.yerphi-cluster.grid.am>psaanl.yerphi-cluster.grid.am</option>
        <option value = psb01-gva-100g.cern.ch>psb01-gva-100g.cern.ch</option>
        <option value = psb01-gva.cern.ch>psb01-gva.cern.ch</option>
        <option value = psb01.pic.es>psb01.pic.es</option>
        <option value = psb-ifae.pic.es>psb-ifae.pic.es</option>
        <option value = psb.hpc.utfsm.cl>psb.hpc.utfsm.cl</option>
        <option value = psbud01.kfki.hu>psbud01.kfki.hu</option>
        <option value = psbud02.kfki.hu>psbud02.kfki.hu</option>
        <option value = pse01-gva.cern.ch>pse01-gva.cern.ch</option>
        <option value = psfrascati01.lnf.infn.it>psfrascati01.lnf.infn.it</option>
        <option value = psfrascati02.lnf.infn.it>psfrascati02.lnf.infn.it</option>
        <option value = pship01.csc.fi>pship01.csc.fi</option>
        <option value = pship02.csc.fi>pship02.csc.fi</option>
        <option value = psifca01.ifca.es>psifca01.ifca.es</option>
        <option value = psifca02.ifca.es>psifca02.ifca.es</option>
        <option value = psific01.ific.uv.es>psific01.ific.uv.es</option>
        <option value = psific02.ific.uv.es>psific02.ific.uv.es</option>
        <option value = psl01-gva.cern.ch>psl01-gva.cern.ch</option>
        <option value = psl01.pic.es>psl01.pic.es</option>
        <option value = psl-ifae.pic.es>psl-ifae.pic.es</option>
        <option value = psl.hpc.utfsm.cl>psl.hpc.utfsm.cl</option>
        <option value = psmsu01.aglt2.org>psmsu01.aglt2.org</option>
        <option value = psmsu02.aglt2.org>psmsu02.aglt2.org</option>
        <option value = psmsu05.aglt2.org>psmsu05.aglt2.org</option>
        <option value = psmsu06.aglt2.org>psmsu06.aglt2.org</option>
        <option value = psnr-farm04.slac.stanford.edu>psnr-farm04.slac.stanford.edu</option>
        <option value = psnr-farm10.slac.stanford.edu>psnr-farm10.slac.stanford.edu</option>
        <option value = psonar1.lal.in2p3.fr>psonar1.lal.in2p3.fr</option>
        <option value = psonar2.lal.in2p3.fr>psonar2.lal.in2p3.fr</option>
        <option value = psonar3.fnal.gov>psonar3.fnal.gov</option>
        <option value = psonar4.fnal.gov>psonar4.fnal.gov</option>
        <option value = psonar-bwctl.brazos.tamu.edu>psonar-bwctl.brazos.tamu.edu</option>
        <option value = psonar-owamp.brazos.tamu.edu>psonar-owamp.brazos.tamu.edu</option>
        <option value = psonar.cis.gov.pl>psonar.cis.gov.pl</option>
        <option value = psonartest1.fnal.gov>psonartest1.fnal.gov</option>
        <option value = psonartest2.fnal.gov>psonartest2.fnal.gov</option>
        <option value = psum01.aglt2.org>psum01.aglt2.org</option>
        <option value = psum01.itep.ru>psum01.itep.ru</option>
        <option value = psum02.aglt2.org>psum02.aglt2.org</option>
        <option value = psum02.itep.ru>psum02.itep.ru</option>
        <option value = psum05.aglt2.org>psum05.aglt2.org</option>
        <option value = psum06.aglt2.org>psum06.aglt2.org</option>
        <option value = psuta01.atlas-swt2.org>psuta01.atlas-swt2.org</option>
        <option value = psuta02.atlas-swt2.org>psuta02.atlas-swt2.org</option>
        <option value = pygrid-sonar1.lancs.ac.uk>pygrid-sonar1.lancs.ac.uk</option>
        <option value = pygrid-sonar2.lancs.ac.uk>pygrid-sonar2.lancs.ac.uk</option>
        <option value = repos1.indiacms.res.in>repos1.indiacms.res.in</option>
        <option value = repos.indiacms.res.in>repos.indiacms.res.in</option>
        <option value = sampaps01.if.usp.br>sampaps01.if.usp.br</option>
        <option value = sampaps02.if.usp.br>sampaps02.if.usp.br</option>
        <option value = sbgperfps1.in2p3.fr>sbgperfps1.in2p3.fr</option>
        <option value = sbgperfps2.in2p3.fr>sbgperfps2.in2p3.fr</option>
        <option value = serv04.hep.phy.cam.ac.uk>serv04.hep.phy.cam.ac.uk</option>
        <option value = sonar1.itim-cj.ro>sonar1.itim-cj.ro</option>
        <option value = sonar2.itim-cj.ro>sonar2.itim-cj.ro</option>
        <option value = stashcache.t2.ucsd.edu>stashcache.t2.ucsd.edu</option>
        <option value = switch.tier2-kol.res.in>switch.tier2-kol.res.in</option>
        <option value = t1-pfsn1.jinr-t1.ru>t1-pfsn1.jinr-t1.ru</option>
        <option value = t1-pfsn2.jinr-t1.ru>t1-pfsn2.jinr-t1.ru</option>
        <option value = t2-pfsn1.jinr.ru>t2-pfsn1.jinr.ru</option>
        <option value = t2-pfsn2.jinr.ru>t2-pfsn2.jinr.ru</option>
        <option value = t2ps-bandwidth.physics.ox.ac.uk>t2ps-bandwidth.physics.ox.ac.uk</option>
        <option value = t2ps-latency.physics.ox.ac.uk>t2ps-latency.physics.ox.ac.uk</option>
        <option value = tau.ijs.si>tau.ijs.si</option>
        <option value = tech-ps.hep.technion.ac.il>tech-ps.hep.technion.ac.il</option>
        <option value = uct2-net1.mwt2.org>uct2-net1.mwt2.org</option>
        <option value = uct2-net2.mwt2.org>uct2-net2.mwt2.org</option>
        <option value = uct2-net3.mwt2.org>uct2-net3.mwt2.org</option>
        <option value = uct2-net4.mwt2.org>uct2-net4.mwt2.org</option>
        </datalist>
     </form>
  </div>


</div>

<p style="color:white">Your selected perfSONAR Toolkit is: <b><?php echo htmlspecialchars($_GET[toolkits]); ?></b></p>
</nav>

<div class="flex-container" style="min-height: 220px;">
 <div>
   <iframe id="ifr-psetf" name="ifr-psetf" style="display: none;float:right" src="https://psetf.opensciencegrid.org/etf/check_mk/view.py?filled_in=filter&host_regex=<?php echo htmlspecialchars($_GET[toolkits]); ?>&selection=ff14182e-35bd-412e-a95a-526b80959b00&view_name=searchhost" height="220" width="500"></iframe><br>
 </div>
 <div>
   <textarea id="ifr-nox509" style="display: inline;min-height: 80px;min-width: 410px; float:right;margin-left: 10px;margin-right: 10px;vertical-align: middle" rows=3>
	You don't seem to have an x.509 credential.
	Some items are not accessible without such a credential 
        and are removed from this page and its menus.
   </textarea>	
 </div>

 <div>
   <?php
     $ip_addr = $_SERVER['REMOTE_ADDR'];
     $geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip_addr) );

     if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {

     $lat = $geoplugin['geoplugin_latitude'];
     $long = $geoplugin['geoplugin_longitude'];
     }
     echo 'User IP is: '.$ip_addr. '<br>';
     echo 'User Latitude is: '.$lat. '<br>';
     echo 'User Longitude is: '.$long. '<br>';
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
   echo "Distance between user and Boston Univserity is: " . distance($lat, $long, 42.3451, -71.0993, "M") . " Miles<br>";
  ?>
 </div> 

 <div>
  <?php
   $csv = array_map('str_getcsv', file('test_query_data.csv'));
   
   echo "array (<br>";
   foreach($csv as $location => $data)
   {
    echo " array(<br>";
    echo ' "latitude" => "' . $data[1] / '",<br>';
    echo ' "longitude" => "' . $data[2] / '",<br>';
    echo ' "host name" => "' . $data[3] / '",<br>';
    echo ' "site name" => "' . $data[4] / '",<br>';
    echo " ),<br>";
   }
   echo ");";
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
