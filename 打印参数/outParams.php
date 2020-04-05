<?php

$data = '{"1000":"42","1001":"5","1002":"7","1003":"16","position_title":"just to test create job - local","salary_currency_code":"1","min_monthly_salary":11000,"max_monthly_salary":14300,"position_level_code":"2","years_of_experience_code":"1","work_locations_countryMY":"on","work_locationsMY":"50100","work_location_specific_area":"","selling_points":[],"job_description":"<ul>\r\n\t<li>Candidate must possess at least Primary/Secondary School/SPM/&quot;O&quot; Level in Engineering (Aviation/Aeronautics/Astronautics) or equivalent.</li>\r\n\t<li>At least 1&nbsp;Year(s) of working experience in the related field is required for this position.</li>\r\n\t<li>Preferably Senior Manager specialized in Actuarial Science/Statistics or equivalent.</li>\r\n</ul>\r\n","map_address":"","fieldWorkingHoursOther":"As you wish","youtube_url":"","map":{"address":"","latitude":0,"longitude":0},"replace_map_flag":true,"map_longitude":0,"map_latitude":0,"profile_id":3267,"blind_flag":false,"header":"","field_of_studies":["12"],"specialization":"103","role":"1156","qualifications":["2"],"position_level":"2","years_of_experience":"1","salary_currency":"1","job_requirements":"<ul>\n\t<li>Candidate must possess at least Primary/Secondary School/SPM/&quot;O&quot; Level in Engineering (Aviation/Aeronautics/Astronautics) or equivalent.</li>\n\t<li>At least 1&nbsp;Year(s) of working experience in the related field is required for this position.</li>\n\t<li>Preferably Senior Manager specialized in Actuarial Science/Statistics or equivalent.</li>\n</ul>\n","salary_display_flag":true,"work_auth_relevant_flag":true,"sites":[1],"work_locations":["50100"],"language_requirements":[],"employment_types":1,"has_rr_flag":false,"rr_reference_id":"f33da894-5738-460d-9f54-2f04c7bed4d3","rr_state":"RR_S_RENDER_FAILED","rr_prefer_flag":false,"credit_consumptions":[{"sales_order_item_id":389165,"site":{"code":1},"product_service":{"code":1}}],"realert_flag":false,"Working Hours":"As you wish","post":true}';

$data = json_decode($data, true);//模拟参数

$dump = function ($var){
	echo '<pre>'; // This is for correct handling of newlines
	ob_start();
	var_dump($var);
	$a=ob_get_contents();
	ob_end_clean();
	echo htmlspecialchars($a,ENT_QUOTES); // Escape every HTML special chars (especially > and < )
	echo '</pre>';
};

$dump($data);