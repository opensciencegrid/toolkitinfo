# toolkitinfo
The web pages for toolkitinfo.opensciencegrid.org that hold user-facing information for perfSONAR Toolkit owners and users

This project is intended to provide a web location that OSG (Open Science Grid) and WLCG (Worldwide LHC Computing Grid) users utilize
to find both specific URLs of relevance to a choosen toolkit instance and to also find additional resources for networking documentation,
monitoring, dashboards and services.

Additionally, new versions of the toolkitinfo.opensciencegrid.org website are continually being developed, with better features that are more user friendly. With new features,
there are continually new releases of the project, despite the production version on toolkitinfo.opensciencegrid.org/toolkitinfo remaining the same. As of version v2.2.1, 
there are many new changes to the website, including an Elasticsearch query to the MWT2 that samples data to allow dynamic dropdown menus via Selectize.js. The link to that GitHub Repository is:
https://github.com/shearert/toolkitinfoquery. These menus display hosts on the MWT2 and display them in both alphabetical order, and based on which hosts are closest to the user.
When a host is then selected from either of the dropdowns, dynamic hyperlinks appear that redirect the user to the MWT2 Kibana Dashboards about they data they selected, but also
include the host from the toolkitingo.opensciencegrid.org/toolkitinfo page both as a source host and a destination host.

# INSTALLATION
If one wishes to install their own copy of the webpage and Elasticsearch query, there is an included ZIP file for each release, but there are a few notable lines to change
based on the set up of the machine running it.

__Changes to personartoolkit.php__
Firstly, there is a change to Line 113 for the Elasticsearch Query .csv file, outline in the Elasticsearch Query segment. Lines 135-143 will be changed if other pages are added, with the proper directory. Lines 175 and 225 need to be changed as well, depending on the URL and file path of the personartoolkit.php file and domain name. The URL's in lines 312-424 will also need to be changed in refering to another Kibana Dashboard page. Make sure to include <?php echo *variable*; ?> within the URL's to ensure that the toolkit host is applied to the Kibana Page.

__Elasticsearch Query__
In regards to the Elasticsearch Query at https://github.com/shearert/toolkitinfoquery, there are also a few changes that need to be made. In Line 167 of the es_query.py file in this directory, there is a filepath variable that defines where the .csv file is going to be saved. Within personartoolkit.php, the filepath also needs to be changed depending on the name in Line 113.
Additionally, a username and password for the elasticsearch profile need to be changed in Line 112.

To use a different instance of Elasticsearch, change Line 33 to correspond to the respective elasticsearch instance. Additionally, lines 43-62 are a specialized Query for the MWT2, and need to be adjusted accordingly to index names and variable names.

If you have any questions regarding anything, please email me at shearert@umich.edu and I would be more than happy to help.
