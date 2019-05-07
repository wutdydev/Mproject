<body>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">

                <table border="1" align="center" cellpadding="10" class="table table-bordered">

                    <?php
          
                    $c = 0;
                    for ($i = 1; $i <= $count; $i++) {
                        $c++;
                        if ($c == 0) {
                            echo '<tr>';
                        }
                        ?>
                        <td align="center">
                            <?php
                            echo $img[$i] . "<br>";
                            echo $code[$i];
                            ?>
                        </td>
                        <?php
                        if ($c == 6) {
                            echo '</tr>';
                            $c = 0;
                        }
                        
                    }
                    ?>

                </table>
            </div>
        </div>

    </div>
</body>