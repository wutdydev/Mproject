<?php echo $header; ?>  
<?php echo $menu; ?>  
<form method="POST" id="Home" name="Home">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">

        <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>JOBMIW</th>
                    <th>ชื่องาน</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <?php
            $i = 0;
            foreach ($query as $res) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $res->JOBMIW ?></td>
                    <td><?php echo $res->jobname ?></td>
                    <td>
                        <button type="button" class="btn btn-outline btn-default btn-sm" onclick="window.open('<?php echo base_url('Salev/Maindata').'/'.$res->data_id ?>')"><i class="fa fa-wrench" ></i> Edit</button>   
                 
                    </td>
                </tr>
                <?php
            }
            ?>  
        </table>


    </div>
</div>
</form>
<footer>

    <?php echo $footer; ?>  
    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
