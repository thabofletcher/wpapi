<?php
ini_set('display_errors', 'On');

header('Content-Type: application/json');

echo '[';
$child_page_ids = array();
$first = true;
foreach (get_all_page_ids() as $page_id)
{
	$page_data = get_page( $page_id );
	if ($page_data->post_status != 'publish')
		continue;

	if ($first)
		$first = false;
	else echo ',';

	echo '{page_id:' . $page_id . ', page_title:"' . $page_data->post_title . ', page_content:"' . json_encode($page_data->post_content) . '"}';
}
echo ']'
?>