<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['holdings/reports'] = 'reports_controller/inventoryfilter';
$route['holdings/inhousereports'] = 'reports_controller/inhousereports';
$route['holdings/acquireport/acquisitions'] = 'reports_controller/load_pdf';
$route['holdings/acquireport'] = 'reports_controller';

$route['circulation/home'] = 'circulations_controller';

$route['holdings/analytics'] = 'analytics_controller';

$route['holdings/catalog'] = 'holdings/holdings_datatable';

$route['holdings/reprints'] = 'holdings_controller/reprintsindex';
$route['holdings/verticalfiles'] = 'holdings_controller/verticalfilesindex';
$route['holdings/investigatoryprojects'] = 'holdings_controller/investigatoryprojectsindex';
$route['holdings/technicalreports'] = 'holdings_controller/technicalreportsindex';
$route['holdings/nonprints'] = 'holdings_controller/nonprintsindex';
$route['holdings/multimedia'] = 'holdings_controller/multimediaindex';
$route['holdings/subjects'] = 'holdings_controller/subjectsindex';
$route['holdings/serials'] = 'holdings_controller/serialsindex';
$route['holdings/books'] = 'holdings_controller/booksindex';
$route['holdings/theses'] = 'holdings_controller/thesesindex';
$route['holdings/holdingscopy'] = 'holdings_controller/holdingscopyindex';
$route['holdings/authors'] = 'holdings_controller/viewauthor';
$route['holdings/publications'] = 'holdings_controller/publicationsindex';
$route['holdings/all'] = 'holdings_controller/all';
$route['holdings/catalog'] = 'holdings_controller/holdingscatalogindex';
$route['holdings/uncatalog'] = 'holdings_controller/holdingsuncatalogindex';
$route['holdings/frontpage'] = 'holdings_controller/frontpageindex';
$route['holdings/home'] = 'holdings_controller';

$route['admin/userlogs'] = 'accounts_controller/userlogs_view';
$route['admin/transactionlogs'] = 'accounts_controller/transactionlogs_view';
$route['admin/updateprofile'] = 'accounts_controller/updateprofile_view';
$route['admin/changepassword'] = 'accounts_controller/changepassword_view';
$route['admin/datalibrary'] = 'accounts_controller/datalibrary_view';
$route['admin/modules'] = 'accounts_controller/module_view';
$route['admin/consortia'] = 'accounts_controller/consortia_view';
$route['admin/groups'] = 'accounts_controller/group_view';
$route['admin/accounts/accounts'] = 'accounts_controller/accounts';
$route['admin/accounts/(:any)'] = 'accounts_controller/view/$1';
$route['admin/accounts'] = 'accounts_controller';

$route['admin/PatronAccounts'] = 'accounts_controller/PatronAccounts';
$route['admin/ServerSettings'] = 'Cms_controller/ServerSettings';

$route['login/logout'] = 'login/logout';
$route['login/login'] = 'login/login';
$route['login/(:any)'] = 'login/view/$1';
$route['login'] = 'login';

$route['acquisitions/new_acquisitions/newacquisition'] = 'acquisitions_controller/newacquisition';
$route['acquisitions/new_acquisitions/(:any)'] = 'acquisitions_controller/view/$1';
$route['acquisitions/new_acquisitions'] = 'acquisitions_controller';

$route['acquisitions/accession_book/accessionbook'] = 'book_controller/accessionbook';
$route['acquisitions/accession_book/(:any)'] = 'book_controller/view/$1';
$route['acquisitions/accession_book'] = 'book_controller';

$route['acquisitions/monitoring_serial/monitorserialmaterial'] = 'monitoring_controller/monitorserialmaterial';
$route['acquisitions/monitoring_serial/(:any)'] = 'monitoring_controller/view/$1';
$route['acquisitions/monitoring_serial'] = 'monitoring_controller';




$route['PrivateMsg/Pmsg'] = 'Notif_controller/view_privateMsgs';
$route['CMS/Notify'] = 'Notif_controller/Notify';
$route['CMS/news'] = 'Cms_controller/news';
$route['CMS/AddNews'] = 'Cms_controller/AddNews';
$route['CMS/askalib'] = 'Cms_controller/askalib';
$route['CMS/inquiry'] = 'Cms_controller/inqDetails';
$route['CMS/readersCorner'] = 'Cms_controller/readCorn';
$route['CMS/DataLib'] = 'Cms_controller/DataLib';
$route['CMS/AboutUs'] = 'Cms_controller/AboutUs';
$route['CMS/Gallery'] = 'Cms_controller/Gallery';
$route['CMS/SearchOptimization'] = 'Cms_controller/SearchOptimization';
$route['CMS/MonitoringIndex'] = 'Monitoring_controller/MonitoringIndex';



$route['CatalogExport'] = 'CatalogExport_controller/CatalogExport';

$route{'Reservations'} = 'Circulations_controller/reservation';
$route['Returns'] = 'Circulations_controller/returns';

$route['Reports/Downloads'] = 'Reports_controller/Downloads_reports';
$route['DownloadsGenerated'] = 'Reports_controller/generateDownloadsList';
$route['Reports/GenerateTrail'] = 'PatronTrail_controller/generatePatronTrail';
$route['Reports/suggestionsReport'] = 'Suggestions_controller/SuggestionsReport';

$route['GenerateSuggestionsList'] = 'Suggestions_controller/GenerateSuggestions';

$route['MaterialInventory'] = 'Inventory_controller/material_inventory';

$route['PatronTrail'] = 'PatronTrail_controller/PatronTrail';
$route['PatronPassReset'] = 'Accounts_controller/patronResetPass';


//dashboard
$route['SystemOverview'] = 'Dashboard_controller/SystemOverview';
$route['Feedbacks'] = 'Feedback_controller/Feedbacks';

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['manuals'] = 'manuals_controller/index';
$route['manuals/admin'] = 'manuals_controller/admin';
$route['manuals/acquisitions'] = 'manuals_controller/acquisitions';
$route['manuals/patron'] = 'manuals_controller/patron';
$route['manuals/holdings'] = 'manuals_controller/holdings';
$route['manuals/circulations'] = 'manuals_controller/circulations';
$route['manuals/opac'] = 'manuals_controller/opac';
