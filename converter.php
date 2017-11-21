<?php

// Add our lists.
$lists = array(
	// Mobile Ads
	'AdguardMobileAds' => 'https://raw.githubusercontent.com/AdguardTeam/AdguardFilters/master/MobileFilter/sections/adservers.txt',

	// Mobile Tracking + Spyware
	'AdguardMobileSpyware' => 'https://raw.githubusercontent.com/AdguardTeam/AdguardFilters/master/MobileFilter/sections/spyware.txt',

	// Adguard Apps
	'AdguardApps' => 'https://github.com/AdguardTeam/AdguardFilters/raw/master/MobileFilter/sections/specific_app.txt',
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

		// Skip exception rules.
		if ( false !== strpos( $filter, '@@' ) ) {
			continue;
		}

		// Replace filter syntax with HOSTS syntax.
		// @todo Perhaps skip $third-party and $popup?
		$filter = str_replace( array( '||', '^', '$third-party', ',third-party', '$popup', '$empty' ), '', $filter );
		$hosts .= "0.0.0.0 {$filter}\n";
	}

	// Output the file.
	file_put_contents( "{$name}.txt", $hosts );

	echo "{$name} converted to HOSTS file - see {$name}.txt\n";
}