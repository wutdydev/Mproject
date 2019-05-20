<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTables2').DataTable({
            processing: true, // แสดงข้อความกำลังดำเนินการ
            serverSide: true, // ใช้งานในโหมด Server-side processing
            order: [],
            ajax: {
                url: "<?php echo base_url("Salev/Find_test") ?>",
                data: {// เพิ่มตัวแปรที่ต้องกาส่งเข้าไปแบบกำหนดเอง
                    page: function () { // ใข้ข้อมูลตัวแปรชื่อ page
                        var dataTables2 = $('#dataTables2').DataTable(); // จะใช้ข้อมูลอ้างอิงจาก dataTable
                        return dataTables2.page.info().page; // ส่งค่าเลขหน้าปัจจุบันไปไว้ในตัวแปร page ค่าเรี่มต้นนับจาก 0
                    }
                },type: "POST"  // ส่งข้อมูลแบบ post
            },
            columnDefs: [// กำหนดลักษณะพิเสษเฉพาะสำหรับคอลัมน์ตารางที่ต้องการ
                {
                    targets: [0], // เราต้องการกำหนดคอลัมน์แรก ค่าเริ่มต้นที่ 0
                    orderable: false, // ให้ไม่ต้องสามารถเรียงข้อมูลได้ เพราะเป็นลำดับรายการเฉยๆ 
                }
            ]
        });
    });


    $('.confirmation').confirm({
        animation: 'left',
        closeAnimation: 'left',
        animateFromElement: false,
        icon: 'glyphicon glyphicon-exclamation-sign',
        content: 'หากลบข้อมูลแล้วสามารถกู้คืนข้อมูลได้',
        title: 'ต้องการลบข้อมูลหรือไม่',
        autoClose: 'cancel|6000',
        type: 'red',
        confirmButtonColor: "#DD6B55",

        buttons: {

            confirm: {
                text: 'ลบข้อมูล',
                btnClass: 'btn-danger',
                keys: ['Enter', 'y'],
                action: function () {
                    location.href = this.$target.attr('href');
                }
            },
            cancel: {
                text: 'ยกเลิก',
                btnClass: 'btn-default',
                keys: ['ESC', 'n'],
                action: function () {
                }
            },

        }
    });

</script>