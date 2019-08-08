<?php

// Add our lists.
$lists = array(
	// Mobile Ads
	'AdguardMobileAds' => 'https://raw.githubusercontent.com/AdguardTeam/AdguardFilters/master/MobileFilter/sections/adservers.txt',

	// Mobile Tracking + Spyware
	'AdguardMobileSpyware' => 'https://raw.githubusercontent.com/AdguardTeam/AdguardFilters/master/MobileFilter/sections/spyware.txt',

	// Adguard Apps
	'AdguardApps' => 'https://github.com/AdguardTeam/AdguardFilters/raw/master/MobileFilter/sections/specific_app.txt',

	// Adguard DNS
	'AdguardDNS' => 'https://adguardteam.github.io/AdGuardSDNSFilter/Filters/filter.txt',

	// EasyPrivacy Specific
	'EasyPrivacySpecific' => 'https://github.com/easylist/easylist/raw/master/easyprivacy/easyprivacy_specific.txt',

	// EasyPrivacy Third-Party
	'EasyPrivacy3rdParty' => 'https://raw.githubusercontent.com/easylist/easylist/master/easyprivacy/easyprivacy_thirdparty.txt'
);

foreach ( $lists as $name => $list ) {
	echo "Converting {$name}...\n";

	// Fetch filter list and explode into an array.
	$lines = file_get_contents( $list );
	$lines = explode( "\n", $lines );

	// HOSTS header.
	$hosts  = "# {$name}\n";
	$hosts .= "#\n";
	$hosts .= "# Converted from - {$list}\n";
	$hosts .= "# Last converted - " . date( 'r' ) . "\n";
	$hosts .= "#\n\n";

	$exceptions = array();

	// Loop through each ad filter.
	foreach ( $lines as $filter ) {
		// Skip filter if matches the following:
		if ( false === strpos( $filter, '.' ) ) {
			continue;
		}
		if ( false !== strpos( $filter, '*' ) ) {
			continue;
		}
		if ( false !== strpos( $filter, '/' ) ) {
			continue;
		}
		if ( false !== strpos( $filter, '=' ) ) {
			continue;
		}
		if ( false !== strpos( $filter, '#' ) ) {
			continue;
		}
		if ( false !== strpos( $filter, ' ' ) ) {
			continue;
		}

		// Replace filter syntax with HOSTS syntax.
		// @todo Perhaps skip $third-party, $image and $popup?
		$filter = str_replace( array( '||', '^', '$third-party', ',third-party', '$image', ',image', ',important', '$script', ',script', ',object', '$popup', '$empty', '$object-subrequest', '$subdocument' ), '', $filter );

		// Skip rules matching 'xmlhttprequest' for now.
		if ( false !== strpos( $filter, 'xmlhttprequest' ) ) {
			continue;
		}

		// Skip exclusion rules.
		if ( false !== strpos( $filter, '~' ) ) {
			continue;
		}

		// Trim whitespace.
		$filter = trim( $filter );

		// If starting or ending with '.', skip.
		if ( '.' === substr( $filter, 0, 1 ) || '.' === substr( $filter, -1 ) ) {
			continue;
		}

		// If starting with '-', skip.
		// https://github.com/r-a-y/mobile-hosts/issues/5
		if ( '-' === substr( $filter, 0, 1 ) ) {
			continue;
		}

		// Strip trailing |.
		if ( '|' === substr( $filter, -1 ) ) {
			$filter = str_replace( '|', '', $filter );
		}

		// Save exception to parse later.
		if ( 0 === strpos( $filter, '@@' ) ) {
			$exceptions[] = str_replace( '@@', '', $filter );
			continue;
		}


		$hosts .= "0.0.0.0 {$filter}\n";
	}

	// Remove exceptions.
	if ( ! empty( $exceptions ) ) {
		foreach( $exceptions as $ex ) {
			$find = "0.0.0.0 {$ex}\n";
			if ( false !== strpos( $hosts, $find ) ) {
				$hosts = str_replace( $find, '', $hosts );
			}
		}
	}

	// Output the file.
	file_put_contents( "{$name}.txt", $hosts );

	echo "{$name} converted to HOSTS file - see {$name}.txt\n";
}