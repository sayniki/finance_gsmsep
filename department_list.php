<?php
include 'page_header.php';
?>
<script>
    function deactivate(trans_num)
    {
    	document.getElementById('status').value="deactivate"
    	document.getElementById('user_id').value=trans_num
         document.getElementById('form1').action = 'department_list.php'
            document.form1.submit();
    }
    
    function edit_list(trans_num)
    {
         document.getElementById('form1').action = 'master_department.php?trans_num='+trans_num
            document.form1.submit();
    }
    function check_list(trans_num)
    {
    	document.getElementById('status').value="activate"
    	document.getElementById('user_id').value=trans_num
         document.getElementById('form1').action = 'department_list.php'
            document.form1.submit();
    }
</script>
<?php
if(!empty($_REQUEST['status']) )
{
    $status=1;
    if($_REQUEST['status']=="deactivate")
    $status=0;
    $user_id=$_REQUEST['user_id'];
    $update="update master_department_file set mas_status=$status where department_id='$user_id' limit 1";
    $conn->query($update);
}
echo "<input type='hidden' name='status' id='status' >";
echo "<input type='hidden' name='user_id' id='user_id' >";
echo "<table>";
    echo "<tr>";
        echo "<td style='text-align:right'><a href='master_department.php'>Add New</a>";
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        listMaker('master_department_file','department',array('department','mas_status'),'Department List');
    echo "</tr>";
echo "</table>";?>