

<?php
    $db=mysqli_connect("localhost","root","","tlabdb") or die(mysql_error());

    $q="select distinct SID,specification from spec_ec;";
    $result=mysqli_query($db,$q);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option  > " . @$row[0] . "</option>";
    }
?>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script language="javascript" type="text/javascript">
    function dynamicdropdown(listindex)
    {
        switch (listindex)
        {
        case "manual" :
         <?php
                 $db=mysqli_connect("localhost","root","","tlabdb") or die(mysql_error());

                        $q="select distinct ID,name from faculty;";
                        $result=mysqli_query($db,$q);
                        $i=0;
                        while ($row = mysqli_fetch_array($result)) {
                          //  echo "<option  > " . @$row[0] . "</option>";
                        
                    
           echo " document.getElementById('status').options[0]=new Option('Select status','');";
           echo " document.getElementById('status').options[$i]=new Option('$row[0]','$row[0]');";
          //  document.getElementById("status").options[2]=new Option("DELIVERED","delivered");
            //document.getElementById("status").options[3]=new Option("","");
            $i++;}?>
            break;
        case "online" :
            document.getElementById("status").options[0]=new Option("Select status","");
            document.getElementById("status").options[1]=new Option("OPEN","open");
            document.getElementById("status").options[2]=new Option("DELIVERED","delivered");
            document.getElementById("status").options[3]=new Option("SHIPPED","shipped");
            break;
        }
        return true;
    }
    </script>
    </head>
    <title>Dynamic Drop Down List</title>
    <body>
    <div class="category_div" id="category_div">Source:
        <select id="source" name="source" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
        <option value="">Select source</option>
        <option value="manual">MANUAL</option>
        <option value="online">ONLINE</option>
        </select>
    </div>
    <div class="sub_category_div" id="sub_category_div">Status:
        <script type="text/javascript" language="JavaScript">
        document.write('<select name="status" id="status"><option value="">Select status</option></select>')
        </script>
        <noscript>
        <select id="status" name="status">
            <option value="open">OPEN</option>
            <option value="delivered">DELIVERED</option>
        </select>
        </noscript>
    </div>
    </body>
</html>