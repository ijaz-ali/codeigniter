
<div class="header_bg">

    <div class="header container">
        <div class="row">
            <div class="col-md-12">
                <h1>View Employee Data</h1>
                <table id="table" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Cell no</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--code print here through server side pagination using data tables-->
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<script>

    var table;
    $(document).ready(function () {

        //datatables
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "dom": 'Blfrtip',
            'pageLength': 10,
            "columnDefs": [
                {
                    "targets": [6], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],
            // Load data for the table's content from an Ajax source
            ajax: {
                url: "<?php echo base_url('Login/ajax_list') ?>",
                type: "POST",
            },
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csv',
                'pdfHtml5'
                
             ],
            //Set column definition initialisation properties.
            language: {
                buttons: {
                    copyTitle: 'Copy To ClipBoard',
                    copyKeys: 'Appuyez sur <i>ctrl</i> ou <i>\u2318</i> + <i>C</i> pour copier les données du tableau à votre presse-papiers. <br><br>Pour annuler, cliquez sur ce message ou appuyez sur Echap.',
                    copySuccess: {
                        _: '%d lines copies',
                        1: '1 ignore copy'
                    }

                }
            }
            
        });
    });
    function deleteEmp(id) {

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: [
                'No, cancel it!',
                'Yes, I am sure!'
            ],
            dangerMode: true,
        }).then(function (isConfirm) {

            if (isConfirm) {
                swal({
                    title: 'Congratulation!',
                    text: 'successfully Deleted!',
                    icon: 'success'
                }).then(function () {
                    window.location = "<?php echo base_url('Login/DeleteEmployee/'); ?>" + id;
                    //  url: "<?php // echo base_url('Login/DeleteEmployee/');                       ?><?php // echo $e->id;                       ?>",

                });
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    }
</script>
<!-- //header-ends -->