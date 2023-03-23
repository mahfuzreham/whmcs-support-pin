<?php

function supportpin_check_license($licensekey, $localkey = '')
{
   $results['status'] = 'Active';
	return $results;
}

function supportpin_callLicenseCheck($module, $licensekey, $secret)
{
    full_query("CREATE TABLE IF NOT EXISTS `deploymentcode_licenses` (\n                `id` int(11) NOT NULL AUTO_INCREMENT,\n                `module` text NOT NULL,\n                `license` text NOT NULL,\n                `localkey` text NOT NULL,\n                PRIMARY KEY (`id`)\n                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;");
    $LicenseCache = select_query('deploymentcode_licenses', '*', ['module' => $module]);
    while ($data = mysql_fetch_array($LicenseCache)) {
        $localkey = $data['localkey'];
        if (empty($licensekey)) {
            $licensekey = $data['license'];
        }
    }
    if (mysql_num_rows($LicenseCache) == '0') {
        insert_query('deploymentcode_licenses', ['module' => $module]);
    }

    if ($secret !== 'yk82kAifdsjksfjvnm') {
        exit();
    }

    $results = supportpin_check_license($licensekey, $localkey);
    switch ($results['status']) {
        case 'Active':
            update_query('deploymentcode_licenses', ['license' => $licensekey], ['module' => $module]);
            if (!empty($results['localkey'])) {
                update_query('deploymentcode_licenses', ['localkey' => $results['localkey']], ['module' => $module]);
            }

            return ['licensestatus' => 'OK'];
        case 'Invalid':
            return ['licensestatus' => 'Invalid'];
        case 'Expired':
            return ['licensestatus' => 'Expired'];
        case 'Suspended':
            return ['licensestatus' => 'Suspended'];
    }

    return ['licensestatus' => 'InvalidResponse'];
}

?>