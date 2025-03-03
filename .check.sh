function host_update() {
	if [ $(git diff --stat "$1".txt | grep -c '1 file changed, 1 insertion(+), 1 deletion(-)') == 0 ]; then
		git add $1.txt && git commit -m "Update $1."
	else
		echo "No update available for $1"
	fi
}

function update_hosts() {
	array=( AdguardMobileAds AdguardMobileSpyware AdguardTracking AdguardDNS AdguardCNAMEAds AdguardCNAMEClickthroughs AdguardCNAMEMicrosites AdguardCNAME EasyPrivacy3rdParty EasyPrivacySpecific )
	for i in "${array[@]}"
	do
		host_update $i
	done
}

update_hosts;
