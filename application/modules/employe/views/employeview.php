<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container">
    <form action="">
        <div class="row">
            <div class="col-md-4 form-group">
                <lable>Employe Name</lable>
                <input type="text" class="form-control" name="EMPLOYENAME" id="employename" />
            </div>

            <div class="col-md-4 form-group">
                <lable>Employe ID</lable>
                <input type="text" class="form-control" name="EMPLOYEID" id="employeid" />
            </div>

            <div class="col-md-4 form-group">
                <lable>Employe Email</lable>
                <input type="text" class="form-control" name="EMPLOYEMAIL" id="employemail" />
            </div>

            <input type="button" value="Create" id="createBtn" />
        </div>
    </form>

    <div class="form-group" id="read">
        <table id="table">
            <tbody>
                    <h3>PHP CRUD OPERATIONS</h3>
                <tr>
                    <th>EMPLOYEE ID</th>
                    <th>EMPLOYEE NAME</th>
                    <th>EMPLOYEE EMAIL</th>
                    <th>ACTION</th>
                </tr>
                <?php if(!empty($row)){ ?>
                <?php foreach ($row as $key) { ?>
                <tr>
                    <td><?php echo $key['EMPLOYEID'] ?></td>
                    <td><?php echo $key['EMPLOYENAME'] ?></td>
                    <td><?php echo $key['EMPLOYEMAIL'] ?></td>
                    <td><a href='employe/delete?id=<?php echo $key['EMPLOYEID']?>'>Delete</a></td>
                    <td><a id="updatebtn" href='.'>Update</a></td>
                </tr>
                <?php } } ?>
                </tbody>
            </table>

    </div>
</div>

</div>




<script>
$(function() {
    //  getTableData();
});


$("#createBtn").click(function() {
    var employename = $("#employename").val();
    var employeid = $("#employeid").val();
    var employemail = $("#employemail").val();

    // saveupdate("#createBtn","getTableData");


    // var url = "http://192.168.100.251/priyanka/2291/3643/accounts/Employe/saveEmployee";

    var url = "<?php echo base_url()."employe/saveEmployee" ?>";

    $.post(url, {
            employename,
            employeid,
            employemail
        },
        function(checkdata) {

            checkdata = JSON.parse(checkdata);

            if (checkdata.status == "success") {
                alert("Data save");
            } else {
                alert("failed");
            }

        });


    //FOR READ

});

$("#updatebtn").click(function() {
    var employename = $("#employename").val();
    var employeid = $("#employeid").val();
    var employemail = $("#employemail").val();

    var url = "<?php echo base_url()."employe/update" ?>";

    $.post(url, {
            employename,
            employeid,
            employemail
        },
        function(checkdata) {

            checkdata = JSON.parse(checkdata);

            if (checkdata.status == "success") {
                alert("Data updated");
            } else {
                alert("failed");
            }

        });
});

</script>