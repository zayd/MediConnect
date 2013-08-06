<pre>                  &lt;select style="color: grey; font-size:16px; width: 227px; border: none;" id="selectHospital"&gt;
                    &lt;option value=""&gt;All Hospitals&lt;/option&gt;
<?php
// all hospitals which are to be listed in the order they're listed
// Aga Khan, NMC, South City, Ziauddin
$list = array(4, 1, 3, 2);
$len = count($list);
for ($k = 0; $k < $len; $k++) {
  $i = $list[$k] - 1;
  echo "                    &lt;option value=\"{$locations[$i]['Location']['id']}\"&gt;{$locations[$i]['Location']['name']}&lt;/option&gt;\n";
}
echo '                    &lt;option value="', join(',', $list), '"&gt;Other&lt;/option&gt;';
?>

                  &lt;/select&gt;</pre>