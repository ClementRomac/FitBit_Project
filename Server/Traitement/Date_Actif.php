<?php
/**
 * Created by PhpStorm.
 * User: leroy
 * Date: 03/05/2016
 * Time: 15:41
 */
include 'include.php';
include 'Date_ColumnHeadings.php';
$dump = meanDateColumnHeadings($dataSet,"sedentary");
meanDateColumnHeadings($dataSet,"mobile");
meanDateColumnHeadings($dataSet,"active");
meanDateColumnHeadings($dataSet,"very_active");
meanDateColumnHeadings($dataSet,"calories");

print_r($dump["week"][0]);
print_r($dump["month"][0]);
print_r($dump["day"][1]);