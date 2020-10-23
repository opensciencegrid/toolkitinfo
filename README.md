# toolkitinfo
The web pages for toolkitinfo.opensciencegrid.org that hold user-facing information for perfSONAR Toolkit owners and users

This project is intended to provide a web location that OSG (Open Science Grid) and WLCG (Worldwide LHC Computing Grid) users utilize
to find both specific URLs of relevance to a choosen toolkit instance and to also find additional resources for networking documentation,
monitoring, dashboards and services.

Additionally, new versions of the toolkitinfo.opensciencegrid.org website are continually being developed, with better features that are more user friendly. With new features,
there are continually new releases of the project, despite the production version on toolkitinfo.opensciencegrid.org/toolkitinfo remaining the same. As of version v1.3.0, 
there are many new changes to the website, including an Elasticsearch query to the MWT2 that samples data to allow dynamic dropdown menus. The link to that GitHub Repository is:
https://github.com/shearert/toolkitinfoquery. These menus display hosts on the MWT2 and display them in both alphabetical order, and based on which hosts are closest to the user.
When a host is then selected from either of the dropdowns, dynamic hyperlinks appear that redirect the user to the MWT2 Kibana Dashboards about they data they selected, but also
include the host from the toolkitingo.opensciencegrid.org/toolkitinfo page both as a source host and a destination host.

# INSTALLATION
If one wishes to install their own copy of the webpage and Elasticsearch query, there is an included ZIP file for each release, but there are a few notable lines to change
based on the set up of the machine running it.

perfsonartoolkit.php:
Line 105 contains a directory to the .csv file created by the Elasticsearch query at https://github.com/shearert/toolkitinfoquery
This directory needs to be changed to whichever directory the .csv file is stored in.

Additionally, depending on the set up, Lines 139 and 154 may need to be changed. Currently, it is configured to take the directory above the perfsonartoolkit.php file,
and then add the actual file name. The directory above is REQUIRED to be the first file in /var/www/html. This would look as such.

/var/www/html/developertoolkitinfo/perfsonartoolkit.php

wherein the ?php script takes the file housing perfsonartoolkit.php, developertoolkitinfo. If you system has one more directory before the file housing the .php file, make
sure to include that in Lines 139 and 154, or else the dropdown functionality won't be able to reference you to the Toolkit Specific Page with the host selected.

In regards to the Elasticsearch Query at https://github.com/shearert/toolkitinfoquery, there are also a few changes that need to be made. In Line 102, there is a variable called filepath. This needs to be changed depending on the directory the python script and .csv are housed in.

Additionally, a username and password for the elasticsearch profile need to be changed in Line 112.

To use a different instance of Elasticsearch, change Line 33 to correspond to the respective elasticsearch instance. Additionally, lines 43-62 are a specialized Query for the MWT2, and need to be adjusted accordingly to index names and variable names.

If you have any questions regarding anything, please email me at shearert@umich.edu and I would be more than happy to help.
