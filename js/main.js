/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function pSAlarmsFunc() {
  document.getElementById("pSAlarms").classList.toggle("show");
}
function pSPipelineFunc() {
  document.getElementById("pSPipeline").classList.toggle("show");
}
function ToolkitDropFunc() {
  document.getElementById("ToolkitDrop").classList.toggle("show");
}
function pSDocsFunc() {
  document.getElementById("pSDocs").classList.toggle("show");
}
function pSServicesFunc() {
  document.getElementById("pSServices").classList.toggle("show");
}
function pSAnalyticsFunc() {
  document.getElementById("pSAnalytics").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var pSAlarms = document.getElementById("pSAlarms");
    if (pSAlarms.classList.contains('show')) {
        pSAlarms.classList.remove('show');
    }
    var pSPipeline = document.getElementById("pSPipeline");
    if (pSPipeline.classList.contains('show')) {
        pSPipeline.classList.remove('show');
    }
    var ToolkitDrop = document.getElementById("ToolkitDrop");
    if (ToolkitDrop.classList.contains('show')) {
        ToolkitDrop.classList.remove('show');
    }
    var pSDocs = document.getElementById("pSDocs");
    if (pSDocs.classList.contains('show')) {
        pSDocs.classList.remove('show');
    }
    var pSServices = document.getElementById("pSServices");
    if (pSServices.classList.contains('show')) {
        pSServices.classList.remove('show');
    }
    var pSAnalytics = document.getElementById("pSAnalytics");
    if (pSAnalytics.classList.contains('show')) {
        pSAnalytics.classList.remove('show');
    }
  }
}
