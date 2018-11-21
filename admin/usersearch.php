<?php
session_start();
require '../common.php';

$self = $_SERVER['PHP_SELF'];
$request = $_SERVER['REQUEST_METHOD'];

if ($request !== 'POST') {
    include 'header_get.php';
    include 'topmain.php';
}
echo "<title>$title - User Search</title>\n";

if (!isset($_SESSION['valid_user'])) {

    echo "<table width=100% border=0 cellpadding=7 cellspacing=1>\n";
    echo "  <tr class=right_main_text><td height=10 align=center valign=top scope=row class=title_underline>PHP Timeclock Administration</td></tr>\n";
    echo "  <tr class=right_main_text>\n";
    echo "    <td align=center valign=top scope=row>\n";
    echo "      <table width=200 border=0 cellpadding=5 cellspacing=0>\n";
    echo "        <tr class=right_main_text><td align=center>You are not presently logged in, or do not have permission to view this page.</td></tr>\n";
    echo "        <tr class=right_main_text><td align=center>Click <a class=admin_headings href='../login.php'><u>here</u></a> to login.</td></tr>\n";
    echo "      </table><br /></td></tr></table>\n";
    exit;
}

if ($request !== 'POST') {

    echo "<table width=100% height=89% border=0 cellpadding=0 cellspacing=1>\n";
    echo "  <tr valign=top>\n";
    echo "    <td class=left_main width=180 align=left scope=col>\n";
    echo "      <table class=hide width=100% border=0 cellpadding=1 cellspacing=0>\n";
    echo "        <tr><td class=left_rows height=11></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle>Users</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/user.png' alt='User Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='useradmin.php'>User Summary</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/user_add.png' alt='Create New User' />&nbsp;&nbsp;
                <a class=admin_headings href='usercreate.php'>Create New User</a></td></tr>\n";
    echo "        <tr><td class=current_left_rows height=18 align=left valign=middle><img src='../images/icons/magnifier.png' alt='User Search' />&nbsp;&nbsp;
                <a class=admin_headings href='usersearch.php'>User Search</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=33></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle>Offices</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/brick.png' alt='Office Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='officeadmin.php'>Office Summary</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/brick_add.png' alt='Create New Office' />&nbsp;&nbsp;
                <a class=admin_headings href='officecreate.php'>Create New Office</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=33></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle>Groups</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/group.png' alt='Group Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='groupadmin.php'>Group Summary</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/group_add.png' alt='Create New Group' />&nbsp;&nbsp;
                <a class=admin_headings href='groupcreate.php'>Create New Group</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=33></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle colspan=2>In/Out Status</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/application.png' alt='Status Summary' />
                &nbsp;&nbsp;<a class=admin_headings href='statusadmin.php'>Status Summary</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/application_add.png' alt='Create Status' />&nbsp;&nbsp;
                <a class=admin_headings href='statuscreate.php'>Create Status</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=33></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle colspan=2>Miscellaneous</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/clock.png' alt='Add/Edit/Delete Time' />
                &nbsp;&nbsp;<a class=admin_headings href='timeadmin.php'>Add/Edit/Delete Time</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/database_go.png'
                alt='Upgrade Database' />&nbsp;&nbsp;&nbsp;<a class=admin_headings href='dbupgrade.php'>Upgrade Database</a></td></tr>\n";
    echo "      </table></td>\n";
    echo "    <td align=left class=right_main scope=col>\n";
    echo "      <table width=100% height=100% border=0 cellpadding=10 cellspacing=1>\n";
    echo "        <tr class=right_main_text>\n";
    echo "          <td valign=top>\n";
    echo "            <br />\n";
    echo "            <form name='form' action='$self' method='post'>\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "              <tr>\n";
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/magnifier.png' />&nbsp;&nbsp;&nbsp;Search for User
                </th>\n";
    echo "              </tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Username:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text' 
                      size='25' maxlength='50' name='post_username'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text' 
                      size='25' maxlength='50' name='display_name'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text' 
                      size='25' maxlength='75' name='email_addy'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Barcode:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text' 
                      size='25' maxlength='75' name='barcode'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td><td colspan=2 width=80%
                      style='padding-left:20px;'>
                      <select name='office_name' onchange='group_names();'>\n";
    echo "                      </select></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td><td colspan=2 width=80%
                      style='padding-left:20px;'>
                      <select name='group_name'>\n";
    echo "                      </select></td></tr>\n";

    echo "              <tr><td class=table_rows align=right colspan=3 style='color:#27408b;font-family:Tahoma;'><a class=footer_links
                      href=\"usersearch.php\" style='text-decoration:underline;'>reset form</a>&nbsp;</td></tr>\n";
    echo "            </table>\n";
    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr><td height=40>&nbsp;</td></tr>\n";
    echo "              <tr><td width=30><input type='image' name='submit' value='Create User' align='middle'
                      src='../images/buttons/search_button.png'></td><td><a href='useradmin.php'><img src='../images/buttons/cancel_button.png' 
                      border='0'></td></tr></table></form></td></tr>\n";
    include '../footer.php';
    exit;
}

elseif ($request == 'POST') {

include 'header_post.php';
include 'topmain.php';

@$post_username = $_POST['post_username'];
@$display_name = $_POST['display_name'];
@$email_addy = $_POST['email_addy'];
@$barcode = $_POST['barcode'];
@$office_name = $_POST['office_name'];
@$group_name = $_POST['group_name'];

// begin post validation //

if ((!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $post_username)) || (!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $display_name)) ||
    (!preg_match('/' . "^([[:alnum:]]|_|.|-|@)+$" . '/i', $email_addy))) {

echo "<table width=100% height=89% border=0 cellpadding=0 cellspacing=1>\n";
echo "  <tr valign=top>\n";
echo "    <td class=left_main width=180 align=left scope=col>\n";
echo "      <table class=hide width=100% border=0 cellpadding=1 cellspacing=0>\n";
echo "        <tr><td class=left_rows height=11></td></tr>\n";
echo "        <tr><td class=left_rows_headings height=18 valign=middle>Users</td></tr>\n";
echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/user.png' alt='User Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='useradmin.php'>User Summary</a></td></tr>\n";
echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/user_add.png' alt='Create New User' />&nbsp;&nbsp;
                <a class=admin_headings href='usercreate.php'>Create New User</a></td></tr>\n";
echo "        <tr><td class=current_left_rows height=18 align=left valign=middle><img src='../images/icons/magnifier.png' alt='User Search' />&nbsp;&nbsp;
                <a class=admin_headings href='usersearch.php'>User Search</a></td></tr>\n";
echo "        <tr><td class=left_rows height=33></td></tr>\n";
echo "        <tr><td class=left_rows_headings height=18 valign=middle>Offices</td></tr>\n";
echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/brick.png' alt='Office Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='officeadmin.php'>Office Summary</a></td></tr>\n";
echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/brick_add.png' alt='Create New Office' />&nbsp;&nbsp;
                <a class=admin_headings href='officecreate.php'>Create New Office</a></td></tr>\n";
echo "        <tr><td class=left_rows height=33></td></tr>\n";
echo "        <tr><td class=left_rows_headings height=18 valign=middle>Groups</td></tr>\n";
echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/group.png' alt='Group Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='groupadmin.php'>Group Summary</a></td></tr>\n";
echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/group_add.png' alt='Create New Group' />&nbsp;&nbsp;
                <a class=admin_headings href='groupcreate.php'>Create New Group</a></td></tr>\n";
echo "        <tr><td class=left_rows height=33></td></tr>\n";
echo "        <tr><td class=left_rows_headings height=18 valign=middle colspan=2>In/Out Status</td></tr>\n";
echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/application.png' alt='Status Summary' />
                &nbsp;&nbsp;<a class=admin_headings href='statusadmin.php'>Status Summary</a></td></tr>\n";
echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/application_add.png' alt='Create Status' />&nbsp;&nbsp;
                <a class=admin_headings href='statuscreate.php'>Create Status</a></td></tr>\n";
echo "        <tr><td class=left_rows height=33></td></tr>\n";
echo "        <tr><td class=left_rows_headings height=18 valign=middle colspan=2>Miscellaneous</td></tr>\n";
echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/clock.png' alt='Add/Edit/Delete Time' />
                &nbsp;&nbsp;<a class=admin_headings href='timeadmin.php'>Add/Edit/Delete Time</a></td></tr>\n";
echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/database_go.png'
                alt='Upgrade Database' />&nbsp;&nbsp;&nbsp;<a class=admin_headings href='dbupgrade.php'>Upgrade Database</a></td></tr>\n";
echo "      </table></td>\n";
echo "    <td align=left class=right_main scope=col>\n";
echo "      <table width=100% height=100% border=0 cellpadding=10 cellspacing=1>\n";
echo "        <tr class=right_main_text>\n";
echo "          <td valign=top>\n";
if (!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $post_username)) {
    if ($post_username == "") {
    } else {
        echo "            <br />\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr>\n";
        echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red nowrap>
                    &nbsp;Alphanumeric characters, hyphens, apostrophes, commas, and spaces are allowed when searching for a Username.</td></tr>\n";
        echo "            </table>\n";
        $evil_input = "1";
    }
}
if (!preg_match('/^([[:alnum:]]|\s|\-|\'|\,)+$/i', $display_name)) {
    if ($display_name == "") {
    } else {
        echo "            <br />\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr>\n";
        echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red nowrap>
                    &nbsp;Alphanumeric characters, hyphens, apostrophes, commas, and spaces are allowed when searching for a Display Name.</td></tr>\n";
        echo "            </table>\n";
        $evil_input = "1";
    }
}
if (!preg_match('/^([[:alnum:]]|_|.|-|@)+$/', $email_addy)) {
    if ($email_addy == "") {
    } else {
        echo "            <br />\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr>\n";
        echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red nowrap>
                    &nbsp;Alphanumeric characters, underscores, periods, and hyphens are allowed when searching for an Email Address.</td></tr>\n";
        echo "            </table>\n";
        $evil_input = "1";
    }
}
if (!(has_value($post_username) || has_value($display_name) || has_value($email_addy) || has_value($barcode))) {
    echo "            <br />\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr>\n";
    echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red nowrap>
                    &nbsp;A Username, Display Name, Email Address, or Barcode is required.</td></tr>\n";
    echo "            </table>\n";
    $evil_input = "1";
}

if (has_value($office_name)
    and is_null(tc_select_value("officename", "offices", "officename = ?", $office_name))
) {
    echo "Office is not defined.\n";
    exit;
}

if (has_value($group_name)
    and is_null(tc_select_value("groupname", "groups", "groupname = ?", $group_name))
) {
    echo "Group is not defined.\n";
    exit;
}

// end post validation //

if (isset($evil_input)) {

    echo "            <br />\n";
    echo "            <form name='form' action='$self' method='post'>\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "              <tr>\n";
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/magnifier.png' />&nbsp;&nbsp;&nbsp;Search for User
                </th></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Username:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text' style='color:red;' size='25' maxlength='50' 
                      name='post_username' value='$post_username'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text' style='color:red;' size='25' maxlength='50' 
                      name='display_name' value='$display_name'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text style='color:red;' size='25' maxlength='75' 
                      name='email_addy' value='$email_addy'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Barcode:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text style='color:red;' size='25' maxlength='75' 
                      name='barcode' value='$barcode'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td><td colspan=2 width=80%
                      style='padding-left:20px;'>
                      <select name='office_name' onchange='group_names();'>\n";
    echo "                      </select></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td><td colspan=2 width=80%
                      style='padding-left:20px;'>
                      <select name='group_name' onfocus='group_names();'>
                        <option selected>$group_name</option>\n";
    echo "                      </select></td></tr>\n";
    echo "              <tr><td class=table_rows align=right colspan=3 style='color:#27408b;font-family:Tahoma;'><a class=footer_links
                      href=\"usersearch.php\" style='text-decoration:underline;'>reset form</a></td></tr>\n";
    echo "            </table>\n";
    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr><td height=40>&nbsp;</td></tr>\n";
    echo "              <tr><td width=30><input type='image' name='submit' value='Create User' align='middle'
                      src='../images/buttons/search_button.png'></td><td><a href='useradmin.php'><img src='../images/buttons/cancel_button.png' 
                      border='0'></td></tr></table></form></td></tr>\n";
    include '../footer.php';
    exit;

} else {

$query_where = array();
$query_params = array();
$tmp_var = array();

if (has_value($post_username)) {
    $tmp_var[] = "'$post_username' in Username";
    $query_where[] = "empfullname LIKE ?";
    $query_params[] = "%" . $post_username . "%";
}

if (has_value($display_name)) {
    $tmp_var[] = "'$display_name' in Display Name";
    $query_where[] = "displayname LIKE ?";
    $query_params[] = "%" . $display_name . "%";
}

if (has_value($email_addy)) {
    $tmp_var[] = "'$email_addy' in Email Address";
    $query_where[] = "email LIKE ?";
    $query_params[] = "%" . $email_addy . "%";
}

if (has_value($barcode)) {
    $tmp_var[] = "'$barcode' in Barcode";
    $query_where[] = "barcode LIKE ?";
    $query_params[] = "%" . $barcode . "%";
}

if (has_value($office_name)) {
    $query_where[] = "office = ?";
    $query_params[] = $office_name;

    if (has_value($group_name)) {
        $query_where[] = "groups = ?";
        $query_params[] = $group_name;
    }
}

$tmp_var = implode(" AND ", $tmp_var);
$row_count = "0";
$result4 = tc_select("*", "employees", implode(" AND ", $query_where) . " ORDER BY empfullname", $query_params);

while ($row = mysqli_fetch_array($result4)) {

$row_count++;

if ($row_count == "1") {

    echo "            <table width=90% align=center height=40 border=0 cellpadding=0 cellspacing=0>\n";
    echo "              <tr><th class=table_heading_no_color nowrap width=100% halign=left>User Search Summary</th></tr>\n";
    echo "              <tr><td height=40 class=table_rows nowrap halign=left>Search Results for $tmp_var</td></tr>\n";
    echo "            </table>\n";
    echo "            <table class=table_border width=90% align=center border=0 cellpadding=0 cellspacing=0>\n";
    echo "              <tr>\n";
    echo "                <th class=table_heading nowrap width=3% align=left>&nbsp;</th>\n";
    echo "                <th class=table_heading nowrap width=13% align=left>Username</th>\n";
    echo "                <th class=table_heading nowrap width=18% align=left>Display Name</th>\n";
    //echo "                <th class=table_heading nowrap width=23% align=left>Email Address</th>\n";
    echo "                <th class=table_heading nowrap width=10% align=left>Office</th>\n";
    echo "                <th class=table_heading nowrap width=10% align=left>Group</th>\n";
    echo "                <th class=table_heading width=3% align=center>Disabled</th>\n";
    echo "                <th class=table_heading width=3% align=center>Sys Admin</th>\n";
    echo "                <th class=table_heading width=3% align=center>Time Admin</th>\n";
    echo "                <th class=table_heading nowrap width=3% align=center>Reports</th>\n";
    echo "                <th class=table_heading nowrap width=3% align=center>Edit</th>\n";
    echo "                <th class=table_heading width=3% align=center>Chg Pwd</th>\n";
    echo "                <th class=table_heading nowrap width=3% align=center>Delete</th>\n";
    echo "              </tr>\n";
}

$row_color = ($row_count % 2) ? $color2 : $color1;
$empfullname = "" . $row['empfullname'] . "";
$displayname = "" . $row['displayname'] . "";

echo "              <tr class=table_border bgcolor='$row_color'><td class=table_rows width=3%>&nbsp;$row_count</td>\n";
echo "                <td class=table_rows width=13%>&nbsp;<a class=footer_links title=\"Edit User: $empfullname\"
                    href=\"useredit.php?username=$empfullname&officename=" . $row["office"] . "\">$empfullname</a></td>\n";
echo "                <td class=table_rows width=18%>$displayname</td>\n";
//echo "                <td class=table_rows width=23%>".$row["email"]."</td>\n";
echo "<td class=table_rows width=10%>".$row['office']."</td>\n";
echo "<td class=table_rows width=10%>".$row['groups']."</td>\n";

if ("".$row["disabled"]."" == 1) {
echo "<td class=table_rows width=3% align=center><img src='../images/icons/cross.png'/></td>\n";
} else {
$disabled = "";
echo "
<td class=table_rows width=3% align=center>".$disabled."</td>\n";
}
if ("".$row["admin"]."" == 1) {
echo "
<td class=table_rows width=3% align=center><img src='../images/icons/accept.png'/></td>\n";
} else {
$admin = "";
echo "
<td class=table_rows width=3% align=center>".$admin."</td>\n";
}
if ("".$row["time_admin"]."" == 1) {
echo "
<td class=table_rows width=3% align=center><img src='../images/icons/accept.png'/></td>\n";
} else {
$time_admin = "";
echo "
<td class=table_rows width=3% align=center>".$time_admin."</td>\n";
}
if ("".$row["reports"]."" == 1) {
echo "
<td class=table_rows width=3% align=center><img src='../images/icons/accept.png'/></td>\n";
} else {
$reports = "";
echo "
<td class=table_rows width=3% align=center>".$reports."</td>\n";
}


echo "
<td class=table_rows width=3% align=center>
    <a title=\"Edit User: $empfullname\" href=\"useredit.php?username=$empfullname&officename=".$row["office"]."\">
    <img border=0 src='../images/icons/application_edit.png'/></td>\n";
echo "
<td class=table_rows width=3% align=center>
    <a title=\"Change Password: $empfullname\"
    href=\"chngpasswd.php?username=$empfullname&officename=".$row["office"]."\">
    <img border=0 src='../images/icons/lock_edit.png'/></td>\n";
echo "
<td class=table_rows width=3% align=center>
    <a title=\"Delete User: $empfullname\" href=\"userdelete.php?username=$empfullname&officename=".$row["office"]."\">
    <img border=0 src='../images/icons/delete.png'/></td>\n";
echo "              </tr>\n";
}
((mysqli_free_result($result4) || (is_object($result4) && (get_class($result4) == "mysqli_result"))) ? true : false);

if ($row_count == "0") {

echo "            <br/>\n";
echo "
<table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "
    <tr>\n";
        echo "
        <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png'/></td>
        <td class=table_rows_red nowrap>
            &nbsp;A user was not found matching your criteria. Please try again.
        </td>
    </tr>
    \n";
    echo "
</table>\n";
echo "            <br/>\n";
echo "
<form name='form' action='$self' method='post'>\n";
    echo "
    <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
        echo "
        <tr>\n";
            echo "
            <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/magnifier.png'/>&nbsp;&nbsp;&nbsp;Search
                for User
            </th>
        </tr>
        \n";
        echo "
        <tr>
            <td height=15></td>
        </tr>
        \n";
        echo "
        <tr>
            <td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Username:</td>
            <td colspan=2 width=80%
                style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text'
                                                                                              style='color:red;'
                                                                                              size='25' maxlength='50'
                                                                                              name='post_username'
                                                                                              value=\"$post_username\">
            </td>
        </tr>
        \n";
        echo "
        <tr>
            <td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td>
            <td colspan=2 width=80%
                style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text'
                                                                                              style='color:red;'
                                                                                              size='25' maxlength='50'
                                                                                              name='display_name'
                                                                                              value=\"$display_name\">
            </td>
        </tr>
        \n";
        echo "
        <tr>
            <td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td>
            <td colspan=2 width=80%
                style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text style='
                                                                                              color:red;' size='25'
                maxlength='75'
                name='email_addy' value=\"$email_addy\">
            </td>
        </tr>
        \n";
        echo "
        <tr>
            <td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Barcode:</td>
            <td colspan=2 width=80%
                style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text style='
                                                                                              color:red;' size='25'
                maxlength='75'
                name='barcode' value=\"$barcode\">
            </td>
        </tr>
        \n";
        echo "
        <tr>
            <td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td>
            <td colspan=2 width=80%
                style='padding-left:20px;'>
                <select name='office_name' onchange='group_names();'>\n";
                    echo " </select></td>
        </tr>
        \n";
        echo "
        <tr>
            <td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td>
            <td colspan=2 width=80%
                style='padding-left:20px;'>
                <select name='group_name' onfocus='group_names();'>
                    <option selected>$group_name</option>
                    \n";
                    echo " </select></td>
        </tr>
        \n";
        echo "
        <tr>
            <td class=table_rows align=right colspan=3 style='color:#27408b;font-family:Tahoma;'><a class=footer_links
                                                                                                    href=\"usersearch.php\"
                                                                                                    style='text-decoration:underline;'>reset
                    form</a></td>
        </tr>
        \n";
        echo "
    </table>
    \n";
    echo "
    <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "
        <tr>
            <td height=40>&nbsp;</td>
        </tr>
        \n";
        echo "
        <tr>
            <td width=30><input type='image' name='submit' value='Create User' align='middle'
                                src='../images/buttons/search_button.png'></td>
            <td><a href='useradmin.php'><img src='../images/buttons/cancel_button.png'
                                             border='0'></td>
        </tr>
    </table>
</form></td></tr>\n";include '../footer.php'; exit;
} else {

echo "            </table></td></tr>\n";
include '../footer.php'; exit;
}}}}
?>