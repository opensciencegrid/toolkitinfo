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
  }
}
